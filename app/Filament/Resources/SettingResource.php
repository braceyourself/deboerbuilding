<?php

namespace App\Filament\Resources;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Placeholder;
use App\Filament\Resources\SettingResource\Pages;
use Awcodes\Palette\Forms\Components\ColorPickerSelect;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->columnSpanFull()->autofocus()->required(),

            Select::make('type')->live()->options(
                collect([
                    'text',
                    'integer',
                    'float',
                    'boolean',
                    'theme',
                ])->mapWithKeys(fn($type) => [$type => str($type)->headline()])
            )->required(),

            TextInput::make('value')->hidden()->dehydratedWhenHidden()->default(''),

            TextInput::make('value')->live()->columnSpanFull()
                ->default('')
                ->hiddenOn('create')
                ->dehydrated(fn($get) => in_array($get('type'), ['string', 'text', 'integer', 'float']))
                ->visible(fn($get) => in_array($get('type'), ['string', 'text', 'integer', 'float']))
                ->numeric(fn($get) => in_array($get('type'), ['integer', 'float'])),

            Toggle::make("value")->columnSpanFull()
                ->default(false)
                ->hiddenOn('create')
                ->inline(false)
                ->dehydrated(fn($get) => in_array($get('type'), ['boolean']))
                ->visible(fn($get) => in_array($get('type'), ['boolean'])),

            Forms\Components\Section::make('Theme')->statePath('value')
                ->default([])
                ->hiddenOn('create')
                ->formatStateUsing(fn($record) => $record?->value)
                ->live()->schema(function ($state) {

                $colors = [
                    'primary',
                    'secondary',
                    'gray',
                    'success',
                    'danger',
                    'warning',
                    'info',
                ];


                return collect($colors)->map(function ($color) {
                    $color_headline = str($color)->headline();

                    return Forms\Components\Fieldset::make($color_headline)->schema([
                        ColorPicker::make("{$color}.seed.hex.value")
                            ->label("{$color}.seed.hex.value")
                            ->afterStateUpdated(function ($state, $set) use ($color) {
                                $state = str($state)->ltrim('#');
                                $res = Http::get("https://www.thecolorapi.com/scheme?hex={$state}&count=10")->json();
//                                dump("afterStateUpdated");
                                $set($color, $res);
                            }),

                        Placeholder::make("{$color}.image.bare")
                            ->label("Scheme")
                            ->visible(fn($get) => $get("{$color}.seed.hex.clean"))
                            ->content(fn($state, $get): HtmlString => new HtmlString("<img src='https://www.thecolorapi.com/scheme?format=svg&named=false&hex={$get("{$color}.seed.hex.clean")}&mode=monochrome&count=10' />"))
                            ->dehydrated(false)

                    ]);
                })->toArray();

            })
                ->visible(fn($get) => in_array($get('type'), ['theme']))
                ->dehydrated(fn($get) => in_array($get('type'), ['theme']))

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('type'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit'   => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}

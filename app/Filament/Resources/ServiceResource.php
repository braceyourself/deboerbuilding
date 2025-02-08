<?php

namespace App\Filament\Resources;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ServiceResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->columns(3)->schema([
            Forms\Components\Section::make([
                TextInput::make('name')
                    ->visible(fn($get) => empty($get('slug')))
                    ->live()
                    ->afterStateUpdated(function ($set, $state, $get) {
                        $set('slug', str($state)->slug());
                        if($get('show_in_footer') && empty($get('footer_text'))){
                            $set('footer_text', $state);
                        }
                    }),
                TextInput::make('name')->visible(fn($get) => !empty($get('slug'))),
                TextInput::make('slug'),
                Forms\Components\RichEditor::make('description')->columnSpanFull(),
                Forms\Components\RichEditor::make('short_description')->columnSpanFull(),

                CuratorPicker::make('images')
                    ->buttonLabel('Attach Images')
                    ->relationship('images', 'name')
                    ->orderColumn('order')
                    ->multiple(),

            ])->columnSpan(2)->columns(2),

            Forms\Components\Section::make([
                Forms\Components\Toggle::make('enabled')
                    ->saveOnUpdate(),

                Forms\Components\Toggle::make('featured')
                    ->label('Show on Homepage')
                    ->visible(fn($get) => $get('enabled'))
                    ->saveOnUpdate(),

                Forms\Components\Toggle::make('show_in_footer')
                    ->visible(fn($get) => $get('enabled'))
                    ->saveOnUpdate(),

                TextInput::make('footer_text')
                    ->disabled(fn($get) => !$get('enabled'))
                    ->placeholder(fn($record) => $record->name)
                    ->visible(fn($get) => $get('show_in_footer') && $get('enabled')),

                CuratorPicker::make('image_id')
                    ->relationship('image', 'name')
                    ->label('Card Image')
                    ->buttonLabel('Attach')

            ])->columnSpan(1)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\ToggleColumn::make('featured')->label('Show on Homepage'),
                Tables\Columns\ToggleColumn::make('footer')->label('Show on Footer'),
                CuratorColumn::make('image')->size(100)->resolution(1000)
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
            'index'  => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit'   => Pages\EditService::route('/{record}/edit'),
        ];
    }
}

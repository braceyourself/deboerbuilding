<?php

namespace App\Filament\Resources;

use Filament\Panel;
use Filament\Forms\Form;
use Filament\Forms;
use App\Models\PageContent;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Route;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\AboutResource\Pages;
use function Laravel\Prompts\outro;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;
    protected static ?string $navigationGroup = 'Pages';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->extraAttributes([
                'x-data' => '{
                    title: "",
                    slug: $wire.entangle("data.slug").live,
                    slugify(str){
                      str = str.replace(/^\s+|\s+$/g, ""); // trim leading/trailing white space
                      str = str.toLowerCase(); // convert string to lowercase
                      str = str.replace(/[^a-z0-9 -]/g, "") // remove any non-alphanumeric characters
                               .replace(/\s+/g, "-") // replace spaces with hyphens
                               .replace(/-+/g, "-"); // remove consecutive hyphens
                      return str;
                    },
                }',
            ])
            ->schema([
                Select::make('page')
                    ->createOptionForm([
                        TextInput::make('page')
                    ])
                    ->createOptionUsing(function (Select $component, $data) {
                        dd($component->options->push($data['page']));
                    })
                    ->columnSpanFull()
                    ->options(static::pageOptions()),
                TextInput::make('title')->extraAlpineAttributes([
                    '@input' => 'slug = slugify($event.target.value)',
                ]),
                TextInput::make('slug')->extraAlpineAttributes([
                    'x-model' => 'slug',
                ])->required()->live(),
                MarkdownEditor::make('content')->columnSpanFull(),
                Toggle::make('markdown')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('slug'),
                IconColumn::make('markdown')->boolean()->trueColor('success')
            ])->filters([
                Tables\Filters\SelectFilter::make('page')
                    ->options(static::pageOptions())
                    ->native(false)
//                    ->(function ($query) {
//                        $query->where('page', true);
//                    })
            ])->actions([
                Tables\Actions\EditAction::make(),
            ])->bulkActions([
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
            'index'  => Pages\ListPageContent::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit'   => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }

    private static function pageOptions()
    {
        return PageContent::query()->cache()->select('page')->distinct()->pluck('page', 'page');
    }
}
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaResource extends \Awcodes\Curator\Resources\MediaResource
{
    public static function getAdditionalInformationFormSchema(): array
    {
        return collect(parent::getAdditionalInformationFormSchema())
            ->prepend(Forms\Components\Toggle::make('hero'))
            ->toArray();
    }

    public static function table(Table $table): Table
    {
        $table = parent::table($table);


        $table->actions([
            ...$table->getActions(),
            // toggle hero
            Tables\Actions\Action::make('hero')
                ->label('Use as hero image')
                ->visible(fn (Media $media) => !$media->hero)
                ->action(fn (Media $media) => $media->update(['hero' => !$media->hero]))
        ]);

        return $table;
    }

}

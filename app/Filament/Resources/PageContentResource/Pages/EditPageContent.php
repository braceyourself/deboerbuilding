<?php

namespace App\Filament\Resources\PageContentResource\Pages;

use Filament\Panel;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PageContentResource;

class EditPageContent extends EditRecord
{
    protected static string $resource = PageContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

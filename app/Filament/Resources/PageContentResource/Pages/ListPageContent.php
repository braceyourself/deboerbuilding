<?php

namespace App\Filament\Resources\PageContentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Resources\PageContentResource;

class ListPageContent extends ListRecords
{
    public function getTitle(): string|Htmlable
    {
        return str(request()->path())->after('admin/')
            ->singular()
            ->studly()
            ->headline();
    }


    public static function getResource(): string
    {
        return PageContentResource::class;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

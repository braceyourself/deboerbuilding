<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PageContentResource;

class CreatePageContent extends CreateRecord
{
    protected static string $resource = PageContentResource::class;
}

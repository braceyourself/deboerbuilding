<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public function redirectRoute($name, $parameters = [], $absolute = true, $navigate = false)
    {
        $this->redirect(route('filament.admin.resources.clients.index'));
    }
}

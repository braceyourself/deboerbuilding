<?php

namespace App\Filament\Resources\InviteResource\Pages;

use Filament\Tables;
use App\Models\User;
use Filament\Actions\CreateAction;
use App\Filament\Resources\InviteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Junges\InviteCodes\Facades\InviteCodes;

class ListInvites extends ListRecords
{
    protected static string $resource = InviteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->action(function ($data) {
                User::invite([
                    'name' => $data['name'] ?? null,
                    'email' => $data['to'],
                ]);
            }),
        ];
    }
}

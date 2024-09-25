<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Notifications\SimpleNotification;
use Junges\InviteCodes\Facades\InviteCodes;
use Illuminate\Notifications\Messages\MailMessage;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('invite')
                ->form(fn($form) => UserResource::form($form))
                ->action(fn($data) => User::invite($data)),
            Actions\CreateAction::make(),
        ];
    }
}

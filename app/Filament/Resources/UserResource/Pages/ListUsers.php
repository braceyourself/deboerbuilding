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
                ->action(function ($data) {

                    $data['invite-code'] = InviteCodes::create()
                        ->restrictUsageTo($data['email'])
                        ->save()->code;

                    $notification = SimpleNotification::make(function (MailMessage $m) use ($data) {
                        $m->subject('You have been invited to create an account on ' . config('app.name'))
                            ->greeting(' ')
                            ->line("Hello {$data['name']},")
                            ->line('Click the button below to create an account on ' . config('app.name'))
                            ->action('Create Account', route('filament.admin.auth.register', $data))
                            ->salutation(' ');
                    });

                    (new User($data))->notify($notification);
                }),
            Actions\CreateAction::make(),
        ];
    }
}

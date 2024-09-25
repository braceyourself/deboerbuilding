<?php

namespace App\Models\Concerns;

use App\Models\User;
use App\Notifications\SimpleNotification;
use Junges\InviteCodes\Facades\InviteCodes;
use Illuminate\Notifications\Messages\MailMessage;

trait Invitable
{
    public static function invite(array $data)
    {
        (new User($data))->sendInvite();
    }

    public function sendInvite(\Closure $createCallback = null): void
    {
        $factory = InviteCodes::create();

        if ($createCallback) {
            $factory = $createCallback($factory);
        }

        if ($this->email) {
            $factory->restrictUsageTo($this->email);
        }

        $invite = $factory->save();

        $notification = SimpleNotification::make(function (MailMessage $m) use ($invite) {
            $m->subject('You have been invited to create an account on ' . config('app.name'))
                ->greeting(' ')
                ->when($this->name,
                    fn($m, $name) => $m->line("Hello {$name},"),
                    fn($m, $name) => $m->line("Hello,"),
                )
                ->line('Click the button below to create an account on ' . config('app.name'))
                ->action('Create Account', route('filament.admin.auth.register', [
                    'invite-code' => $invite->code,
                    'email'       => $this->email,
                    'name'        => $this->name,
                ]))
                ->salutation(' ');
        });

        $this->notify($notification);
    }
}
<?php

namespace App\Filament\Pages;

use DB;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Facades\Filament;
use Filament\Events\Auth\Registered;
use Junges\InviteCodes\Models\Invite;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Junges\InviteCodes\Facades\InviteCodes;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

class Register extends \Filament\Pages\Auth\Register
{
    public function form(Form $form): Form
    {
        $form = parent::form($form);

        $form->schema([
            TextInput::make('invite-code')
                ->default(request('invite-code'))
                ->required()
                ->exists('invites', 'code')
                ->autofocus(),
            ...collect($form->getComponents())
                ->map->autofocus(false)
                ->map->default(fn($component) => request($component->getName()))
                ->toArray(),
        ]);

        return $form;
    }

    public function register(): ?RegistrationResponse
    {
        InviteCodes::redeem($this->form->getState()['invite-code']);

        try {
            $this->rateLimit(2);
        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/register.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/register.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/register.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return null;
        }

        $user = DB::transaction(function () {
            $data = $this->form->getStateExcept(['invite-code']);

            return $this->getUserModel()::create($data);
        });

        event(new Registered($user));

        $this->sendEmailVerificationNotification($user);

        Filament::auth()->login($user);

        session()->regenerate();

        return app(RegistrationResponse::class);
    }


}

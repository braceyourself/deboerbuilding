<?php

namespace App\Providers;

use Illuminate\Support\Stringable;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Notifications\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Component::macro('saveOnUpdate', function () {
            $this->live()->afterStateUpdated(function ($state, $record, Component $component) {
                $notification = Notification::make()->title('Saved')->success();

                $record->update([
                    $component->statePath => $state
                ]);

                $notification->send();
            });

            return $this;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Stringable::macro('filename', function () {
            return str(pathinfo($this->value, PATHINFO_FILENAME));
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;
use Filament\Support\Enums\Alignment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Notifications\Notification;
use Filament\Support\Enums\VerticalAlignment;
use Filament\Notifications\Livewire\Notifications;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Component::macro('saveOnUpdate', function () {
            $this->live()->afterStateUpdated(function ($state, $record, Component $component) {
                if ($record?->exists()) {
                    $notification = Notification::make()->title('Saved')->success();

                    $record->update([
                        $component->statePath => $state
                    ]);

                    $notification->send();
                }
            });

            return $this;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if (app()->environment('local')) {
            DB::listen(function($query) {
                Log::info(
                    $query->sql,
                    [
                        'bindings' => $query->bindings,
                        'time' => $query->time
                    ]
                );
            });
        }


        Notifications::alignment(Alignment::Center);
        Notifications::verticalAlignment(VerticalAlignment::End);

        Model::unguard();

        Stringable::macro('filename', function () {
            return str(pathinfo($this->value, PATHINFO_FILENAME));
        });

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

    }
}

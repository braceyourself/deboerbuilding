<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms\Form;
use App\Models\FormSubmission;
use Livewire\Attributes\Renderless;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Actions\Action;
use Filament\Support\Enums\VerticalAlignment;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Livewire\Notifications;

class ContactPage extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->statePath('data')->schema([
            TextInput::make('name')->required()->autofocus()->default(fn() => request()->name),
            TextInput::make('email')->email()->required()->default(fn() => request()->email),
            TextArea::make('comment')->required()->autosize()->default(fn() => request()->comment),
            Actions::make([
                Action::make('submit')->action('submitForm')
            ])
        ]);
    }

    #[Renderless]
    public function submitForm()
    {

        try {

            $this->form->validate();

            FormSubmission::query()->create([
                'form' => 'contact',
                'data' => $this->form->getState(),
            ]);

        } catch (\Throwable $e) {

            report($e);

        } finally {

            $this->form->fill();

            Notification::make()
                ->title('Form submitted successfully!')
                ->body("Thank you for your message, we will get back to you soon.")
                ->success()
                ->send();

        }

    }

    public function render()
    {
        return view('livewire.contact-page');
    }
}

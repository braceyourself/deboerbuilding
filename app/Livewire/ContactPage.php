<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms\Form;
use App\Models\FormSubmission;
use Livewire\Attributes\Renderless;
use Illuminate\Validation\Validator;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Actions\Action;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Validation\ValidationException;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Livewire\Notifications;

class ContactPage extends Component implements HasForms
{
    use InteractsWithForms;

    public $data = [];

    public function mount()
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->autofocus(),
            TextInput::make('email')->email()->required(),
            TextArea::make('comment')->required()->autosize(),
        ])->statePath('data');
    }

    public function submitForm()
    {
        try {

            FormSubmission::query()->create([
                'form' => 'contact',
                'data' => $this->form->getState(),
            ]);

            $this->form->fill();

            Notification::make()
                ->title('Form submitted successfully!')
                ->body("Thank you for your message, we will get back to you soon.")
                ->success()
                ->send();

        } catch (\Throwable $e) {
            if ($e instanceof ValidationException) {
                throw $e;
            }

            report($e);

        }

    }

    public function render()
    {
        return view('livewire.contact-page');
    }
}

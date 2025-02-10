<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Forms\Form;
use Livewire\Attributes\Renderless;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;

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
        $this->form->validate();

        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.contact-page');
    }
}

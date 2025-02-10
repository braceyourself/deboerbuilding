<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\PageContent;
use Filament\Actions\Action;
use Livewire\Attributes\Layout;
use Filament\Infolists\Infolist;
use Illuminate\Support\HtmlString;
use Livewire\Attributes\Renderless;
use Filament\Support\Enums\MaxWidth;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Section;
use Filament\Actions\Contracts\HasActions;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Infolists\Concerns\InteractsWithInfolists;

class AboutPage extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function getDataProperty()
    {
        return Employee::query()->get();
    }

    public function jobOpportunitiesAction(): Action
    {
        return PageContent::query()->cache()
            ->firstWhere('slug', 'job-opportunities')
            ->toFilamentModalAction()
            ->extraAttributes(['class' => 'text-5xl']);
    }

    public function theProjectProcessAction(): Action
    {
        return PageContent::query()
            ->cache()
            ->firstWhere('slug', 'the-project-process')
            ->toFilamentModalAction();
    }

    public function render()
    {
        return view('livewire.about-page.index');
    }
}

<?php

namespace App\Models;

use Filament\Actions\Action;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    public function toFilamentModalAction(): Action
    {
        return Action::make(str($this->slug)->camel()->value())
            ->requiresConfirmation()
            ->modalWidth(MaxWidth::ThreeExtraLarge)
            ->stickyModalFooter()
            ->modalContent(
                str($this->content)
                    ->when($this->markdown, fn($str) => $str->markdown())
                    ->toHtmlString()
            )
            ->modalSubmitAction(false)
            ->modalIcon(false)
            ->modalDescription(' ')
            ->stickyModalHeader()
            ->modalCancelActionLabel('Close');;

    }
}

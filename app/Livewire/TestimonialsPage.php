<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class TestimonialsPage extends Component
{
    public $onPage = 5;

    #[Computed]
    public function records()
    {
        return Testimonial::query()->with('client')->latest()->take($this->onPage)->get();
    }

    public function loadMore()
    {
        $this->onPage += 5;
    }

    public function render()
    {
        return view('livewire.testimonials-page')->extends('layouts.guest');
    }
}

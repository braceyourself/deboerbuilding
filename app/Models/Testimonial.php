<?php

namespace App\Models;

use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

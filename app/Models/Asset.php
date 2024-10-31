<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Media
{
    protected $table = 'media';
    /**
     * Accessor for $this->name
     */
    public function name(): Attribute
    {
        return Attribute::get(function ($value) {
            return $value ?: str($this->attributes['path'])->filename();
        })->shouldCache();
    }


    public function scopeHeroImages(Builder $query): Builder
    {
        return $query->where('hero', true);
    }
}

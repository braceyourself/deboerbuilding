<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**********************************************
     * relations
     **********************************************/
    public function image()
    {
        return $this->belongsTo(Media::class);
    }


    /**********************************************
     * attributes
     **********************************************/
    /**
     * Accessor for $this->image_url
     */
    public function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            $image = $this->image;
            $curations = collect($image?->curations)->collapse();

            if ($curations->isNotEmpty()) {
                $c = $curations->firstWhere('key', 'focused');
                $url = data_get($c, 'url');
            }

            return $url ?? $this->image->url;
        })->shouldCache();
    }


    /**********************************************
     * scopes
     **********************************************/

    public function scopeEnabled(Builder $query): Builder
    {
        return $query->where('enabled', true);
    }

    public function scopeInFooter(Builder $query): Builder
    {
        return $query->enabled();
    }
}

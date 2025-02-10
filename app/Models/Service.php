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

    protected $with = ['image'];
    protected $appends = ['image_url', 'url'];

    /**********************************************
     * relations
     **********************************************/
    public function image()
    {
        return $this->belongsTo(Media::class);
    }

    public function images()
    {
        return $this->morphMany(MediaItem::class, 'mediable')->orderBy('order');
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

            return $url ?? $this->image?->url;
        })->shouldCache();
    }

    /**
     * Accessor for $this->url
     */
    public function url(): Attribute
    {
        return Attribute::get(function () {
            return route('services.show', $this);
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

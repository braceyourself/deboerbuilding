<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MediaItem extends Pivot
{
    protected $table = 'media_items';

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}

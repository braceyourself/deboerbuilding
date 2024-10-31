<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends \Awcodes\Curator\Models\Media
{
    protected static function booted()
    {
        static::updating(function (Media $model) {
            if ($model->isDirty('hero') && $model->hero === true) {
                static::query()
                    ->where('hero', true)
                    ->update([
                        'hero' => false
                    ]);
            }
        });
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use App\Http\Clients\N8N\N8N;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    protected $casts = [
        'data' => 'array',
    ];

    protected static function booted()
    {
        static::created(function (FormSubmission $submission) {
            $res = N8N::post('form-submission', [
                $submission->form .' Form Submission' => $submission->data,
                'Received At' => $submission->created_at->format(Carbon::RFC850),
            ]);
        });
    }
}

<?php

namespace App\Http\Controllers\Webhooks;

use App\Models\Media;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\MediaResource;

class MediaWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'file' => 'file|required'
        ]);

        $file = $request->file('file');
        $filename = Str::uuid();
        $ext = $file->getClientOriginalExtension();
        $path = $file->storePubliclyAs('media', "{$filename}.{$ext}", 'public');

        $model = Media::create([
            'disk' => 'public',
            'directory' => 'media',
            'visibility' => 'public',
            'name' => $filename,
            'path' => $path,
            'exif' => $exif ?? null,
            'width' => $width ?? null,
            'height' => $height ?? null,
            'size' => $file->getSize(),
            'type' => $file->getMimeType(),
            'ext' => $ext,
        ]);

        return response()->json(
            $model->fresh()
        );
    }
}

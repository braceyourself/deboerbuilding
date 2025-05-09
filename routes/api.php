<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webhooks\MediaWebhookController;

Route::group(['prefix' => 'webhooks'], function () {
    Route::post('media', MediaWebhookController::class);
});

// webhook routes
Route::post('webhook/{webhook}', function (Request $request, $webhook) {
    Log::info($request->path());

    return match ($webhook){
        'upload-images' => (function ($request) {
            $images = $request->file('images');

            return response()->json([
                'message' => 'images uploaded',
                'images' => $images
            ]);
        })($request),

        default => response()->json([
            'message' => "webhook {$webhook} not found"
        ], 404)
    };
})->middleware('webhook');

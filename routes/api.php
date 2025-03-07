<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webhooks\MediaWebhookController;

Route::group(['prefix' => 'webhooks'], function () {
    Route::post('media', MediaWebhookController::class);
});

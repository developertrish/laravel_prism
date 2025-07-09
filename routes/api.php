<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompletionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/generate-completion', [CompletionController::class, 'generateCompletion'])
    ->name('generate.completion')
    ->middleware('auth:sanctum');

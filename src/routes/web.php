<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\SubscriptionController;

Route::get('/subscribe', [SubscriptionController::class, 'form']);
Route::post('/subscribe', [SubscriptionController::class, 'store']);

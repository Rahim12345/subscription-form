<?php

use Illuminate\Support\Facades\Route;
use RsCode\SubscriptionForm\Http\Controllers\SubscriptionController;

Route::get('/subscribe', [SubscriptionController::class, 'form']);
Route::post('/subscribe', [SubscriptionController::class, 'store']);

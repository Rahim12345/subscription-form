<?php

use App\Http\Controllers\RSCODE\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::resource('/subscribe', SubscriptionController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::post('/order-call', [FormController::class, 'orderCall']);

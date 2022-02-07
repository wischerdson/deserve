<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmoCrmController;

Route::prefix('amocrm')->group(function () {
	Route::get('pipelines', [AmoCrmController::class, 'pipelines']);
	Route::get('users', [AmoCrmController::class, 'users']);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::post('/fill-form/{form_alias}', [FormController::class, 'fillForm']);

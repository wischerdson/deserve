<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SurveyController;

Route::post('/fill-form/{form_alias}', [FormController::class, 'fillForm']);

Route::prefix('surveys')->group(function () {
	Route::get('{surveyType}/{projectAlias}', [SurveyController::class, 'show']);
	Route::post('fields', [SurveyController::class, 'saveFields']);
	Route::get('projects', [SurveyController::class, 'projects']);
	Route::post('projects/setStatus', [SurveyController::class, 'setProjectStatus']);
	Route::post('projects/create', [SurveyController::class, 'createProject']);
});

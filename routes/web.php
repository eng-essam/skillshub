<?php

use Illuminate\Support\Facades\Route;


Route::middleware('Lang')->group(function () {
    Route::get('/', [\App\Http\Controllers\web\HomeController::class, 'index']);
    Route::get('categories/show/{id}', [\App\Http\Controllers\web\Catcontroller::class, 'show']);
    Route::get('skills/show/{id}', [\App\Http\Controllers\web\Skillcontroller::class, 'show']);
    Route::get('exam/show/{id}', [\App\Http\Controllers\web\Examcontroller::class, 'show']);
    Route::get('exam/questions/{id}', [\App\Http\Controllers\web\Examcontroller::class, 'question']);

});

Route::get('lang/set/{lang}', [\App\Http\Controllers\web\LangController::class, 'set']);


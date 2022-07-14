<?php

use Illuminate\Support\Facades\Route;

Route::get('logout/log', [\App\Http\Controllers\web\HomeController::class, 'log']);

Route::middleware('Lang')->group(function () {
    Route::get('/', [\App\Http\Controllers\web\HomeController::class, 'index']);
    Route::get('categories/show/{id}', [\App\Http\Controllers\web\Catcontroller::class, 'show']);
    Route::get('skills/show/{id}', [\App\Http\Controllers\web\Skillcontroller::class, 'show']);
    Route::get('exam/show/{id}', [\App\Http\Controllers\web\Examcontroller::class, 'show']);
    Route::get('contact', [\App\Http\Controllers\web\ContactController::class, 'index']);
    Route::post('contact/msg', [\App\Http\Controllers\web\ContactController::class, 'send']);

});

Route::get('exam/questions/{examId}', [\App\Http\Controllers\web\Examcontroller::class, 'question'])->middleware(['auth','verified','student']);
Route::Post('exam/start/{examId}', [\App\Http\Controllers\web\Examcontroller::class, 'start'])->middleware(['auth','verified','student','can-enter-exam']);
Route::Post('exam/submit/{examId}', [\App\Http\Controllers\web\Examcontroller::class, 'submit'])->middleware(['auth','verified','student']);


Route::get('lang/set/{lang}', [\App\Http\Controllers\web\LangController::class, 'set']);


<?php

use App\Http\Controllers\admin\CatController as AdminCatController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\SkillsController;
use App\Http\Controllers\web\Catcontroller;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\Examcontroller;
use App\Http\Controllers\web\HomeController as WebHomeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\web\Skillcontroller;
use Illuminate\Support\Facades\Route;

Route::get('logout/log', [HomeController::class, 'log']);
Route::get('lang/set/{lang}', [LangController::class, 'set']);

// Users
Route::middleware('Lang')->group(function () {
    Route::get('/', [WebHomeController::class, 'index']);
    Route::get('categories/show/{id}', [Catcontroller::class, 'show']);
    Route::get('skills/show/{id}', [Skillcontroller::class, 'show']);
    Route::get('exam/show/{id}', [Examcontroller::class, 'show']);
    Route::get('contact', [ContactController::class, 'index']);
    Route::post('contact/msg', [ContactController::class, 'send']);
    Route::get('profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified', 'student']);
});

Route::middleware('auth', 'verified', 'student')->group(function () {
    Route::get('exam/questions/{examId}', [Examcontroller::class, 'question']);
    Route::Post('exam/start/{examId}', [Examcontroller::class, 'start'])->middleware('can-enter-exam');
    Route::Post('exam/submit/{examId}', [Examcontroller::class, 'submit']);
});

// Admin Dashboard
Route::prefix('/dashboard')->middleware('auth', 'verified', 'can-enter-dashboard')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('categories', [AdminCatController::class, 'index']);
    Route::post('categories/store', [AdminCatController::class, 'store']);
    Route::post('categories/update', [AdminCatController::class, 'update']);
    Route::get('categories/toggle/{cat}', [AdminCatController::class, 'toggle']);
    Route::get('categories/delete/{cat}', [AdminCatController::class, 'delete']);

    Route::get('skills', [SkillsController::class, 'index']);
    Route::post('skills/store', [SkillsController::class, 'store']);
    Route::post('skills/update', [SkillsController::class, 'update']);
    Route::get('skills/toggle/{skill}', [SkillsController::class, 'toggle']);
    Route::get('skills/delete/{skill}', [SkillsController::class, 'delete']);

});

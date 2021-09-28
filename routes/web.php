<?php

use App\Http\Controllers\Admin\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\FrontendQuizController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');
*/

Route::middleware(['auth'])->group(function () {
    Route::get('panel', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::prefix('quiz/{slug}')->group(function () {
        Route::get('', [FrontendQuizController::class, 'quiz'])->name('quiz');
        Route::get('start', [FrontendQuizController::class, 'quizStart'])->name('quiz.start');
        Route::post('save', [FrontendQuizController::class, 'quizSave'])->name('quiz.save');
    });
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        // https://laravel.com/docs/8.x/controllers
        /*
         * Route::get('quizzes/{id}', [QuizController::class, 'destroy])
         *       ->whereNumber('id')
         *       ->name('quizzes.destroy); 
        */
        Route::resource('quizzes', QuizController::class);
        Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
    });
});
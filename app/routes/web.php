<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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
//ccccccp
//cc c'est kat
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // Ajoutez cette nouvelle route pour la vue 'Evaluation'
    Route::get('/Evaluation', function () {
        // Vous pouvez passer des données supplémentaires à votre composant si nécessaire
        return Inertia::render('Evaluation');
    })->name('Evaluation');

    Route::resource('/questions', QuestionController::class);
    Route::resource('/teachers', TeacherController::class);

    Route::get('questions/delete/{question}', [QuestionController::class, 'deletetest']);
});

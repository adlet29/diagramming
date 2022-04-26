<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/laboratories', [App\Http\Controllers\HomeController::class, 'laboratories'])->name('home');

Route::group([
    'middleware' => 'auth'
], function() {
    Route::group([
        'prefix' => 'teacher'
    ], function() {
        Route::get('/', [App\Http\Controllers\TeacherController::class, 'index'])->name('Преподователь');
        Route::get('/labs', [App\Http\Controllers\LabaController::class, 'index'])->name('Преподователь');
        Route::get('/labs/{id}', [App\Http\Controllers\LabaController::class, 'show'])->name('Преподователь');
    });

    Route::group([
        'prefix' => 'student'
    ], function() {
        Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('Студент');
    });
});
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

Route::get('sink/{laba_id}', [App\Http\Controllers\PlankController::class, 'index']);

Route::post('paper/save', [App\Http\Controllers\LabaController::class, 'create']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/laboratories', [App\Http\Controllers\HomeController::class, 'laboratories'])->name('home');

Route::group([
    'middleware' => 'auth'
], function() {
    Route::group([
        'prefix' => 'teacher'
    ], function() {
        Route::get('/', [App\Http\Controllers\TeacherController::class, 'index']);
        Route::get('/plank', [App\Http\Controllers\LabaController::class, 'plank']);
        Route::get('/labas', [App\Http\Controllers\LabaController::class, 'index']);
        Route::get('/labas/{laba_id}', [App\Http\Controllers\LabaController::class, 'show']);
        Route::get('/task/{task_id}/check/{laba_id}', [App\Http\Controllers\LabaController::class, 'show_done']);
        Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);
        Route::post('/task/create', [App\Http\Controllers\TaskController::class, 'create']);
        Route::post('/task/point', [App\Http\Controllers\TaskController::class, 'point']);
        Route::get('/report', [App\Http\Controllers\TaskController::class, 'report']);
    });

    Route::group([
        'prefix' => 'student'
    ], function() {
        Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('Студент');
        Route::get('/task/{task_id}/laba/{laba_id}', [App\Http\Controllers\PlankController::class, 'index_v2'])->name('Студент');
    });
});

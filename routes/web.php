<?php

use App\Http\Controllers\KeyResultController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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
| All Restful routes will use the singular of the resource. So
| 'objective' rather than 'objectives'.
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest')->name('login');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('objective/create', [ObjectiveController::class, 'create'])->middleware('auth');
Route::post('objective', [ObjectiveController::class, 'store'])->middleware('auth');
Route::get('objective/{objective}', [ObjectiveController::class, 'show'])->name('objective');
Route::get('objective/{objective}/edit', [ObjectiveController::class, 'edit']);
Route::put('objective/{objective}', [ObjectiveController::class, 'update']);
Route::get('objective', [ObjectiveController::class, 'index'])->middleware('auth');

Route::get('objective/{objective}/keyResult/create', [KeyResultController::class, 'create'])->middleware('auth');
Route::post('objective/{objective}/keyResult', [KeyResultController::class, 'store'])->middleware('auth');
Route::get('keyResult/{keyResult}', [KeyResultController::class, 'show'])->middleware('auth');

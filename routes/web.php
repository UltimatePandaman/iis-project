<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', 'App\Http\Controllers\WelcomeController@show');

Route::get('/dashboard', function () {return redirect('/profile');})->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.index');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth'])->name('profile.update');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.edit');

Route::get('/conference/{conference}/create-p', 'App\Http\Controllers\PresentationController@create')->middleware(['auth']);
Route::post('/{key}/request', 'App\Http\Controllers\PresentationController@store')->middleware(['auth']);

Route::get('/conference/{conference}', 'App\Http\Controllers\ConferencesController@show');
Route::get('/c/create', 'App\Http\Controllers\ConferencesController@create')->middleware(['auth']);
Route::post('/c', 'App\Http\Controllers\ConferencesController@store')->middleware(['auth']);

require __DIR__.'/auth.php';

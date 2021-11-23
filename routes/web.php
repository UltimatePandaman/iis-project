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

Route::get('/', function () {return view('welcome');});

Route::get('/dashboard', function () {return redirect('/profile');})->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.index');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth'])->name('profile.update');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.edit');

require __DIR__.'/auth.php';

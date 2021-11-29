<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorsController;
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

//USER
Route::get('/user/{user}/edit', [RegisteredUserController::class, 'edit'])->middleware(['auth'])->name('user.edit');
Route::patch('/user/{user}', [RegisteredUserController::class, 'update'])->middleware(['auth'])->name('user.update');

//PROFILE
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.index');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware(['auth'])->name('profile.update');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.edit');
Route::get('/profile/conferences', 'App\Http\Controllers\ProfileController@conferences')->middleware(['auth']);
Route::get('/profile/rooms', 'App\Http\Controllers\ProfileController@rooms')->middleware(['auth']);

//PRESENTATION
Route::get('/conference/{conference}/create-p', 'App\Http\Controllers\PresentationController@create')->middleware(['auth']);
Route::get('/presentation/pending', 'App\Http\Controllers\PresentationController@pending')->middleware(['auth']);
Route::get('/presentation/edit/{presentation}', 'App\Http\Controllers\PresentationController@edit')->middleware(['auth']);
Route::post('/presentation/accept/{presentation}', 'App\Http\Controllers\PresentationController@accept')->middleware(['auth']);
Route::post('/presentation/delete/{presentation}', 'App\Http\Controllers\PresentationController@delete')->middleware(['auth']);
Route::post('/presentation/reject/{presentation}', 'App\Http\Controllers\PresentationController@reject')->middleware(['auth']);
Route::patch('/presentation/{presentation}', 'App\Http\Controllers\PresentationController@patch')->middleware(['auth']);
Route::post('/p/{key}/create', 'App\Http\Controllers\PresentationController@store')->middleware(['auth']);
Route::get('/conference/{conference}/presentations', 'App\Http\Controllers\PresentationController@showall');
Route::get('/presentation/{presentation}', 'App\Http\Controllers\PresentationController@show');
Route::post('/attend/{presentation}', '\App\Http\Controllers\AttendanceController@store')->name('attend.store');

//ROOM
Route::get('/conference/{conference}/create-r', 'App\Http\Controllers\RoomController@create')->middleware(['auth']);
Route::post('/r/{key}/create', 'App\Http\Controllers\RoomController@store')->middleware(['auth']);
Route::post('/room/delete/{id}', 'App\Http\Controllers\RoomController@delete')->middleware(['auth']);
Route::get('/room/{room}', 'App\Http\Controllers\RoomController@show');
Route::get('/room/{room}/edit', 'App\Http\Controllers\RoomController@edit')->middleware(['auth']);
Route::patch('/room/{room}', 'App\Http\Controllers\RoomController@update')->middleware(['auth']);

//CONFERENCE
Route::post('/conference/delete/{id}', 'App\Http\Controllers\ConferencesController@delete')->middleware(['auth']);
Route::get('/conference/{conference}', 'App\Http\Controllers\ConferencesController@show');
Route::patch('/conference/{conference}', 'App\Http\Controllers\ConferencesController@update')->middleware(['auth']);
Route::get('/conference/{conference}/edit', 'App\Http\Controllers\ConferencesController@edit')->middleware(['auth']);
Route::get('/c/create', 'App\Http\Controllers\ConferencesController@create')->middleware(['auth']);
Route::post('/c', 'App\Http\Controllers\ConferencesController@store')->middleware(['auth']);

//REZERVATION
Route::get('/visit/pending', [VisitorsController::class, 'pending'])->middleware(['auth'])->name('visit.pending');
Route::post('/visit/{conference}', [VisitorsController::class, 'store'])->name('visit.store');
Route::delete('/visit/{pivot}/delete', [VisitorsController::class, 'destroy'])->middleware(['auth']);
Route::patch('/visit/{pivot}', [VisitorsController::class, 'update'])->middleware(['auth']);
Route::get('/visit/{conference}/edit', [VisitorsController::class, 'edit'])->name('visit.edit');

//ADMIN
Route::get('/admin/users', 'App\Http\Controllers\AdminController@view')->middleware(['auth']);
Route::get('/user/{user}/edit', 'App\Http\Controllers\AdminController@edit')->middleware(['auth']);
Route::get('/user/create', 'App\Http\Controllers\AdminController@create')->middleware(['auth']);
Route::post('/user/create', 'App\Http\Controllers\AdminController@store')->middleware(['auth']);
Route::post('/user/{user}/delete', 'App\Http\Controllers\AdminController@delete')->middleware(['auth']);
Route::patch('/user/{user}/edit', 'App\Http\Controllers\AdminController@update')->middleware(['auth']);

require __DIR__.'/auth.php';

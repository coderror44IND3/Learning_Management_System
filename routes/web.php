<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('teacher', [App\Http\Controllers\TeachersControllers::class, 'index'])->name('teacher.index')->middleware('auth');
Route::get('presence_teacher', [App\Http\Controllers\Presence_TeachersControllers::class, 'index'])->name('presence_teacher.index')->middleware('auth');
Route::get('library', [App\Http\Controllers\LibraryController::class, 'index'])->name('library.index')->middleware('auth');
Route::get('table', [App\Http\Controllers\LibraryController::class, 'table'])->name('library.table')->middleware('auth');
Route::get('/searchteacher', [App\Http\Controllers\TeachersControllers::class, 'searchteacher'])->middleware('auth');
Route::get('/searchpresenceT', [App\Http\Controllers\Presence_TeachersControllers::class, 'searchpresenceT'])->middleware('auth');
Route::get('/searchlibrary', [App\Http\Controllers\LibraryController::class, 'searchlibrary'])->middleware('auth');
Route::get('/login', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth');
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');

// Route GET Create ( SweetAlert )
Route::get('upcreate1', [App\Http\Controllers\TeachersControllers::class, 'create'])->name('teacher.create')->middleware('auth');
Route::get('upcreate2  ', [App\Http\Controllers\Presence_TeachersControllers::class, 'create'])->name('presence_teacher.create')->middleware('auth');
Route::get('upcreate3  ', [App\Http\Controllers\LibraryController::class, 'create'])->name('library.create')->middleware('auth');
Route::get('tablelibrary  ', [App\Http\Controllers\LibraryController::class, 'table'])->name('library.table')->middleware('auth');

// Route GET ( 'Edit, Delete' )
Route::get('teacher/{id}', [App\Http\Controllers\TeachersControllers::class, 'edit'])->name('teacher.edit')->middleware('auth');
Route::get('library/{id}', [App\Http\Controllers\LibraryController::class, 'edit'])->name('library.edit')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\TeachersControllers::class, 'destroy'])->name('teacher.destroy')->middleware('auth');

// Route POST, PUT, DELETE ( 'Edit, Created, Delete' )
Route::post('searchteacher/searchteacher', [App\Http\Controllers\TeachersControllers::class, 'searchteacher'])->name('teacher.searchteacher')->middleware('auth');
Route::post('searchpresenceT/searchpresenceT', [App\Http\Controllers\Presence_TeachersControllers::class, 'searchpresenceT'])->name('presence_teacher.search')->middleware('auth');
Route::post('searchlibrary/searchlibrary', [App\Http\Controllers\LibraryController::class, 'searchlibrary'])->name('library.searchlibrary')->middleware('auth');
Route::post('teacher/store', [App\Http\Controllers\TeachersControllers::class, 'store'])->name('teacher.store')->middleware('auth');
Route::post('library/store', [App\Http\Controllers\LibraryController::class, 'store'])->name('library.store')->middleware('auth');
Route::put('teacher/{id}/', [App\Http\Controllers\TeachersControllers::class, 'update'])->name('teacher.update')->middleware('auth');
Route::put('library/{id}/', [App\Http\Controllers\LibraryController::class, 'update'])->name('library.update')->middleware('auth');
Route::delete('teacher/{id}/', [App\Http\Controllers\TeachersControllers::class, 'destroy'])->name('teacher.destroy')->middleware('auth');

Auth::routes();
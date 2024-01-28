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

// Route GET ( 'Teachers', 'Presence Teachers' )
Route::get('teacher', [App\Http\Controllers\TeachersControllers::class, 'index'])->name('teacher.index')->middleware('auth');
Route::get('presence_teacher', [App\Http\Controllers\Presence_TeachersControllers::class, 'index'])->name('presence_teacher.index')->middleware('auth');

// Route GET ( 'Students', 'Presence Students' )
Route::get('student', [App\Http\Controllers\StudentsControllers::class, 'index'])->name('student.index')->middleware('auth');
Route::get('presence_student', [App\Http\Controllers\Presence_StudentsControllers::class, 'index'])->name('presence_student.index')->middleware('auth');

// Route GET ( 'Library', 'Table Library' )
Route::get('library', [App\Http\Controllers\LibraryController::class, 'index'])->name('library.index')->middleware('auth');
Route::get('tablelibraryy', [App\Http\Controllers\LibraryController::class, 'tablelibraryy'])->name('library.table')->middleware('auth');

// Route GET ( 'Classroom', 'Table Classroom' )
Route::get('classroom', [App\Http\Controllers\ClassroomControllers::class, 'index'])->name('classroom.index')->middleware('auth');
Route::get('table', [App\Http\Controllers\ClassroomControllers::class, 'table'])->name('classroom.table')->middleware('auth');

// Route GET ( 'Login' )
Route::get('/login', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth');

// Route GET ( 'Dashboard' )
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');

// Route GET Search
Route::get('/searchteacher', [App\Http\Controllers\TeachersControllers::class, 'searchteacher'])->middleware('auth');
Route::get('/searchpresenceT', [App\Http\Controllers\Presence_TeachersControllers::class, 'searchpresenceT'])->middleware('auth');
Route::get('/searchlibrary', [App\Http\Controllers\LibraryController::class, 'searchlibrary'])->middleware('auth');
Route::get('/searchstudents', [App\Http\Controllers\StudentsControllers::class, 'searchstudents'])->middleware('auth'); 

// Route GET Create ( SweetAlert )
Route::get('upcreate1', [App\Http\Controllers\TeachersControllers::class, 'create'])->name('teacher.create')->middleware('auth');
Route::get('upcreate2', [App\Http\Controllers\Presence_TeachersControllers::class, 'create'])->name('presence_teacher.create')->middleware('auth');
Route::get('upcreate3', [App\Http\Controllers\LibraryController::class, 'create'])->name('library.create')->middleware('auth');
Route::get('upcreate4', [App\Http\Controllers\StudentsControllers::class, 'create'])->name('student.create')->middleware('auth');
Route::get('upcreate5', [App\Http\Controllers\ClassroomControllers::class, 'create'])->name('classroom.create')->middleware('auth');

// Route GET Table ( SweetAlert )
Route::get('tablelibraryy', [App\Http\Controllers\LibraryController::class, 'tablelibraryy'])->name('library.table')->middleware('auth');
Route::get('tablepresenceSTD', [App\Http\Controllers\Presence_StudentsControllers::class, 'index'])->name('presence_student_table.index')->middleware('auth');
Route::get('tableclassroom', [App\Http\Controllers\ClassroomControllers::class, 'tableclassroom'])->name('classroom.table')->middleware('auth');

// Route GET ( 'Edit, Delete' )
Route::get('teacher/{id}', [App\Http\Controllers\TeachersControllers::class, 'edit'])->name('teacher.edit')->middleware('auth');
Route::get('library/{id}', [App\Http\Controllers\LibraryController::class, 'edit'])->name('library.edit')->middleware('auth');
Route::get('student/{id}', [App\Http\Controllers\StudentsControllers::class, 'edit'])->name('student.edit')->middleware('auth');
Route::get('classroom/{id}', [App\Http\Controllers\ClassroomControllers::class, 'edit'])->name('classroom.edit')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\TeachersControllers::class, 'destroy'])->name('teacher.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\LibraryController::class, 'destroy'])->name('library.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\StudentsControllers::class, 'destroy'])->name('student.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\ClassroomControllers::class, 'destroy'])->name('classroom.destroy')->middleware('auth');

// Route POST ( 'Search' )
Route::post('searchteacher/searchteacher', [App\Http\Controllers\TeachersControllers::class, 'searchteacher'])->name('teacher.searchteacher')->middleware('auth');
Route::post('searchpresenceT/searchpresenceT', [App\Http\Controllers\Presence_TeachersControllers::class, 'searchpresenceT'])->name('presence_teacher.search')->middleware('auth');
Route::post('searchlibrary/searchlibrary', [App\Http\Controllers\LibraryController::class, 'searchlibrary'])->name('library.searchlibrary')->middleware('auth');
Route::post('searchstudents/searchstudents', [App\Http\Controllers\StudentsControllers::class, 'searchstudents'])->name('student.searchstudents')->middleware('auth');
Route::post('searchclassroom/searchclassroom', [App\Http\Controllers\ClassroomControllers::class, 'searchclassroom'])->name('classroom.searchclassroom')->middleware('auth');

// Route POST, PUT, DELETE ( 'Edit, Created, Delete' )
Route::post('teacher/store', [App\Http\Controllers\TeachersControllers::class, 'store'])->name('teacher.store')->middleware('auth');
Route::post('library/store', [App\Http\Controllers\LibraryController::class, 'store'])->name('library.store')->middleware('auth');
Route::post('student/store', [App\Http\Controllers\StudentsControllers::class, 'store'])->name('student.store')->middleware('auth');
Route::post('classroom/store', [App\Http\Controllers\ClassroomControllers::class, 'store'])->name('classroom.store')->middleware('auth');
Route::post('presence_teacher/store', [App\Http\Controllers\Presence_TeachersControllers::class, 'store'])->name('presence_teacher.store')->middleware('auth');

Route::put('teacher/{id}/', [App\Http\Controllers\TeachersControllers::class, 'update'])->name('teacher.update')->middleware('auth');
Route::put('library/{id}/', [App\Http\Controllers\LibraryController::class, 'update'])->name('library.update')->middleware('auth');
Route::put('student/{id}/', [App\Http\Controllers\StudentsControllers::class, 'update'])->name('student.update')->middleware('auth');
Route::put('classroom/{id}/', [App\Http\Controllers\ClassroomControllers::class, 'update'])->name('classroom.update')->middleware('auth');

Route::delete('teacher/{id}/', [App\Http\Controllers\TeachersControllers::class, 'destroy'])->name('teacher.destroy')->middleware('auth');
Route::delete('library/{id}/', [App\Http\Controllers\LibraryController::class, 'destroy'])->name('library.destroy')->middleware('auth');
Route::delete('student/{id}/', [App\Http\Controllers\StudentsControllers::class, 'destroy'])->name('student.destroy')->middleware('auth');
Route::delete('classroom/{id}/', [App\Http\Controllers\ClassroomControllers::class, 'destroy'])->name('classroom.destroy')->middleware('auth');


Auth::routes();
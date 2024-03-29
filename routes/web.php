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

// Route GET ( 'Score Students' )
Route::get('grade_class', [App\Http\Controllers\LessonStundetsControllers::class, 'index'])->name('grade_class.index')->middleware('auth');
Route::get('tablegrade', [App\Http\Controllers\LessonStundetsControllers::class, 'tablegrade'])->name('grade_class.index')->middleware('auth');

// Route GET ( 'Money' )
Route::get('money', [App\Http\Controllers\MoneyControllers::class, 'index'])->name('money.index')->middleware('auth');

// Route GET ( 'Assigments' )
Route::get('assigment', [\App\Http\Controllers\AssigmentControllers::class, 'index'])->name('assigment.index')->middleware('auth');
Route::get('tableassigme', [\App\Http\Controllers\AssigmentControllers::class, 'index'])->name('assigment.index')->middleware('auth');

// Route GET ( 'Library', 'Table Library' )
Route::get('library', [App\Http\Controllers\LibraryController::class, 'index'])->name('library.index')->middleware('auth');
Route::get('tablelibraryy', [App\Http\Controllers\LibraryController::class, 'tablelibraryy'])->name('library.table')->middleware('auth');

// Route GET ( 'Classroom', 'Table Classroom' )
Route::get('classroom', [App\Http\Controllers\ClassroomControllers::class, 'index'])->name('classroom.index')->middleware('auth');
Route::get('table', [App\Http\Controllers\ClassroomControllers::class, 'table'])->name('classroom.table')->middleware('auth');

// Route GET ( 'Organization' )
Route::get('organization', [App\Http\Controllers\OrganizationControllers::class, 'index'])->name('organization.index')->middleware('auth');

// Route GET ( 'Login' )
Route::get('/login', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth');

// Route GET ( 'Dashboard' )
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');

// Route GET Search
Route::get('/searchteacher', [App\Http\Controllers\TeachersControllers::class, 'searchteacher'])->middleware('auth');
Route::get('/searchpresenceteachers', [App\Http\Controllers\Presence_TeachersControllers::class, 'searchpresenceteachers'])->middleware('auth');
Route::get('/searchlibrary', [App\Http\Controllers\LibraryController::class, 'searchlibrary'])->middleware('auth');
Route::get('/searchstudents', [App\Http\Controllers\StudentsControllers::class, 'searchstudents'])->middleware('auth'); 
Route::get('/searchstudentspresence', [App\Http\Controllers\Presence_StudentsControllers::class, 'searchstudentspresence'])->middleware('auth'); 
Route::get('/searchclassroom', [App\Http\Controllers\ClassroomControllers::class, 'searchclassroom'])->middleware('auth'); 
Route::get('/searchlesson', [App\Http\Controllers\LessonStundetsControllers::class, 'searchlesson'])->middleware('auth'); 

// Route GET Create ( SweetAlert )
Route::get('upcreate1', [App\Http\Controllers\TeachersControllers::class, 'create'])->name('teacher.create')->middleware('auth');
Route::get('upcreate2', [App\Http\Controllers\Presence_TeachersControllers::class, 'create'])->name('presence_teacher.create')->middleware('auth');
Route::get('upcreate3', [App\Http\Controllers\LibraryController::class, 'create'])->name('library.create')->middleware('auth');
Route::get('upcreate4', [App\Http\Controllers\StudentsControllers::class, 'create'])->name('student.create')->middleware('auth');
Route::get('upcreate5', [App\Http\Controllers\ClassroomControllers::class, 'create'])->name('classroom.create')->middleware('auth');
Route::get('upcreate6', [App\Http\Controllers\Presence_StudentsControllers::class, 'create'])->name('presence_student.create')->middleware('auth');
Route::get('upcreate7', [App\Http\Controllers\AssigmentControllers::class, 'create'])->name('assigment.create')->middleware('auth');
Route::get('upcreate8', [App\Http\Controllers\MoneyControllers::class, 'create'])->name('money.create')->middleware('auth');
Route::get('upcreate9', [App\Http\Controllers\LessonStundetsControllers::class, 'create'])->name('grade_class.create')->middleware('auth');

// Route GET Table ( SweetAlert )
Route::get('tablelibraryy', [App\Http\Controllers\LibraryController::class, 'tablelibraryy'])->name('library.table')->middleware('auth');
Route::get('tablepresenceSTD', [App\Http\Controllers\Presence_StudentsControllers::class, 'index'])->name('presence_student.index')->middleware('auth');
Route::get('tableclassroom', [App\Http\Controllers\ClassroomControllers::class, 'tableclassroom'])->name('classroom.table')->middleware('auth');
Route::get('tablemoney', [App\Http\Controllers\MoneyControllers::class, 'tablemoney'])->name('money.index')->middleware('auth');
Route::get('tablegrade', [App\Http\Controllers\LessonStundetsControllers::class, 'tablegrade'])->name('grade_class.index')->middleware('auth');

// Route GET ( 'Edit, Delete' )
Route::get('teacher/{id}', [App\Http\Controllers\TeachersControllers::class, 'edit'])->name('teacher.edit')->middleware('auth');
Route::get('library/{id}', [App\Http\Controllers\LibraryController::class, 'edit'])->name('library.edit')->middleware('auth');
Route::get('student/{id}', [App\Http\Controllers\StudentsControllers::class, 'edit'])->name('student.edit')->middleware('auth');
Route::get('classroom/{id}', [App\Http\Controllers\ClassroomControllers::class, 'edit'])->name('classroom.edit')->middleware('auth');
Route::get('presence_teacher/{id}', [App\Http\Controllers\Presence_TeachersControllers::class, 'edit'])->name('presence_teacher.edit')->middleware('auth');
Route::get('presence_student/{id}', [App\Http\Controllers\Presence_StudentsControllers::class, 'edit'])->name('presence_student.edit')->middleware('auth');
Route::get('assigment/{id}', [App\Http\Controllers\AssigmentControllers::class, 'edit'])->name('assigment.edit')->middleware('auth');
Route::get('money/{id}', [App\Http\Controllers\MoneyControllers::class, 'edit'])->name('money.edit')->middleware('auth');
Route::get('grade_class/{id}', [App\Http\Controllers\LessonStundetsControllers::class, 'edit'])->name('grade_class.edit')->middleware('auth');

Route::get('destroy/{id}', [App\Http\Controllers\TeachersControllers::class, 'destroy'])->name('teacher.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\LibraryController::class, 'destroy'])->name('library.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\StudentsControllers::class, 'destroy'])->name('student.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\ClassroomControllers::class, 'destroy'])->name('classroom.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\Presence_TeachersControllers::class, 'destroy'])->name('presence_teacher.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\Presence_StudentsControllers::class, 'destroy'])->name('presence_student.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\AssigmentControllers::class, 'destroy'])->name('assigment.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\MoneyControllers::class, 'destroy'])->name('money.destroy')->middleware('auth');
Route::get('destroy/{id}', [App\Http\Controllers\LessonStundetsControllers::class, 'destroy'])->name('grade_class.destroy')->middleware('auth');

// Route POST ( 'Search' )
Route::post('searchteacher/searchteacher', [App\Http\Controllers\TeachersControllers::class, 'searchteacher'])->name('teacher.searchteacher')->middleware('auth');
Route::post('searchpresenceteachers/searchpresenceteachers', [App\Http\Controllers\Presence_TeachersControllers::class, 'searchpresenceteachers'])->name('presence_teacher.searchpresenceteachers')->middleware('auth');
Route::post('searchlibrary/searchlibrary', [App\Http\Controllers\LibraryController::class, 'searchlibrary'])->name('library.searchlibrary')->middleware('auth');
Route::post('searchstudents/searchstudents', [App\Http\Controllers\StudentsControllers::class, 'searchstudents'])->name('student.searchstudents')->middleware('auth');
Route::post('searchclassroom/searchclassroom', [App\Http\Controllers\ClassroomControllers::class, 'searchclassroom'])->name('classroom.searchclassroom')->middleware('auth');
Route::post('searchstudentspresence/searchstudentspresence', [App\Http\Controllers\Presence_StudentsControllers::class, 'searchstudentspresence'])->name('presence_student.searchstudentspresence')->middleware('auth');
Route::post('searchlesson/searchlesson', [App\Http\Controllers\LessonStundetsControllers::class, 'searchlesson'])->name('grade_class.searchlesson')->middleware('auth');

// Route POST, PUT, DELETE ( 'Edit, Created, Delete' )
Route::post('teacher/store', [App\Http\Controllers\TeachersControllers::class, 'store'])->name('teacher.store')->middleware('auth');
Route::post('library/store', [App\Http\Controllers\LibraryController::class, 'store'])->name('library.store')->middleware('auth');
Route::post('student/store', [App\Http\Controllers\StudentsControllers::class, 'store'])->name('student.store')->middleware('auth');
Route::post('classroom/store', [App\Http\Controllers\ClassroomControllers::class, 'store'])->name('classroom.store')->middleware('auth');
Route::post('presence_teacher/store', [App\Http\Controllers\Presence_TeachersControllers::class, 'store'])->name('presence_teacher.store')->middleware('auth');
Route::post('presence_student/store', [App\Http\Controllers\Presence_StudentsControllers::class, 'store'])->name('presence_student.store')->middleware('auth');
Route::post('assigment/store', [App\Http\Controllers\AssigmentControllers::class, 'store'])->name('assigment.store')->middleware('auth');
Route::post('money/store', [App\Http\Controllers\MoneyControllers::class, 'store'])->name('money.store')->middleware('auth');
Route::post('grade_class/store', [App\Http\Controllers\LessonStundetsControllers::class, 'store'])->name('grade_class.store')->middleware('auth');

Route::put('teacher/{id}/', [App\Http\Controllers\TeachersControllers::class, 'update'])->name('teacher.update')->middleware('auth');
Route::put('library/{id}/', [App\Http\Controllers\LibraryController::class, 'update'])->name('library.update')->middleware('auth');
Route::put('student/{id}/', [App\Http\Controllers\StudentsControllers::class, 'update'])->name('student.update')->middleware('auth');
Route::put('classroom/{id}/', [App\Http\Controllers\ClassroomControllers::class, 'update'])->name('classroom.update')->middleware('auth');
Route::put('presence_teacher/{id}/', [App\Http\Controllers\Presence_TeachersControllers::class, 'update'])->name('presence_teacher.update')->middleware('auth');
Route::put('presence_student/{id}/', [App\Http\Controllers\Presence_StudentsControllers::class, 'update'])->name('presence_student.update')->middleware('auth');
Route::put('assigment/{id}/', [App\Http\Controllers\AssigmentControllers::class, 'update'])->name('assigment.update')->middleware('auth');
Route::put('money/{id}/', [App\Http\Controllers\MoneyControllers::class, 'update'])->name('money.update')->middleware('auth');
Route::put('grade_class/{id}/', [App\Http\Controllers\LessonStundetsControllers::class, 'update'])->name('grade_class.update')->middleware('auth');

Route::delete('teacher/{id}/', [App\Http\Controllers\TeachersControllers::class, 'destroy'])->name('teacher.destroy')->middleware('auth');
Route::delete('library/{id}/', [App\Http\Controllers\LibraryController::class, 'destroy'])->name('library.destroy')->middleware('auth');
Route::delete('student/{id}/', [App\Http\Controllers\StudentsControllers::class, 'destroy'])->name('student.destroy')->middleware('auth');
Route::delete('classroom/{id}/', [App\Http\Controllers\ClassroomControllers::class, 'destroy'])->name('classroom.destroy')->middleware('auth');
Route::delete('presence_teacher/{id}/', [App\Http\Controllers\Presence_TeachersControllers::class, 'destroy'])->name('presence_teacher.destroy')->middleware('auth');
Route::delete('presence_student/{id}/', [App\Http\Controllers\Presence_StudentsControllers::class, 'destroy'])->name('presence_student.destroy')->middleware('auth');
Route::delete('assigment/{id}/', [App\Http\Controllers\AssigmentControllers::class, 'destroy'])->name('assigment.destroy')->middleware('auth');
Route::delete('money/{id}/', [App\Http\Controllers\MoneyControllers::class, 'destroy'])->name('money.destroy')->middleware('auth');
Route::delete('grade_class/{id}/', [App\Http\Controllers\LessonStundetsControllers::class, 'destroy'])->name('grade_class.destroy')->middleware('auth');

Auth::routes();
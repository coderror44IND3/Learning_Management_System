<?php

use App\Models\Library;
use App\Models\Classroom;
use App\Models\Teachers;
use App\Models\Students;
namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Library;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroom = DB::table('table_classroom')
                        ->join('table_students', 'table_students.id', '=', 'table_classroom.table_students_id')
                        ->join('table_teachers', 'table_teachers.id', '=', 'table_classroom.table_teachers_id')
                        ->join('table_course', 'table_course.id', '=', 'table_classroom.table_course_id')
                        ->select('table_classroom.*', 'table_teachers.name_teachers as teachers', 'table_students.name_students as students', 'table_course.course_univesity as course')
                        ->get();
                        
        return view('admin.classroom.index', compact('classroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail_classroom = Classroom::all();
        $teachers = Teachers::all();
        $students = Students::all();
        $library = Library::all();
        return view('admin.classroom.create', compact('detail_classroom', 'teachers', 'students', 'library'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

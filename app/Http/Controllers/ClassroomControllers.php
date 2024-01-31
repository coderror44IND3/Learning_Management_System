<?php

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
                        ->select('table_classroom.*', 'table_teachers.name_teachers as teachers', 'table_students.name_students as students', 'table_course.course_univesity as course', 'table_course.deksripsi_univesity as deksripsi')
                        ->get();
        return view('admin.classroom.index', compact('classroom'));
    }

    public function tableclassroom()
    {
        $classroom = DB::table('table_classroom')
                        ->join('table_students', 'table_students.id', '=', 'table_classroom.table_students_id')
                        ->join('table_teachers', 'table_teachers.id', '=', 'table_classroom.table_teachers_id')
                        ->join('table_course', 'table_course.id', '=', 'table_classroom.table_course_id')
                        ->select('table_classroom.*', 'table_teachers.name_teachers as teachers', 'table_students.name_students as students', 'table_course.course_univesity as course', 'table_course.deksripsi_univesity as deksripsi')
                        ->get();
        return view('admin.classroom.table', compact('classroom'));
    }

    public function searchclassroom(Request $request)
    {
        $start_search = $request->start_search;
        $end_search = $request->end_search;

        $classroom = DB::table('table_classroom')
                        ->join('table_students', 'table_students.id', '=', 'table_classroom.table_students_id')
                        ->join('table_teachers', 'table_teachers.id', '=', 'table_classroom.table_teachers_id')
                        ->join('table_course', 'table_course.id', '=', 'table_classroom.table_course_id')
                        ->select('table_classroom.*', 'table_teachers.name_teachers as teachers', 'table_students.name_students as students', 'table_course.course_univesity as course', 'table_course.deksripsi_univesity as deksripsi')
                        ->whereDate('table_classroom.created_at', '>=', $start_search)
                        ->whereDate('table_classroom.created_at', '<=', $end_search)
                        ->get();
        return view('admin.classroom.table', compact('classroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classroom = Classroom::all();
        $teachers = Teachers::all();
        $students = Students::all();
        $library = Library::all();
        return view('admin.classroom.create', compact('classroom', 'teachers', 'students', 'library'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'offline_class' => 'required|max:45',
                'online_class' => 'required|max:250',
                'date_start' => 'required',
                'date_end' => 'required',
                'clock_start' => 'required',
                'clock_end' => 'required',
                'table_teachers_id' => 'required',
                'table_students_id' => 'required',
                'table_course_id' => 'required',
            ],

            /* Message Error Classroom */
            [
                'offline_class.max' => 'Please Input Offline Class Max 45',
                'offline_class.required' => 'Please Input Offline Class',
                'online_class.max' => 'Please Input Online Class Max 250',
                'online_class.required' => 'Please Input Online Class ',
                'date_start.required' => 'Please Input Date Start Class',
                'date_end.required' => 'Please Input Date End Class',
                'clock_start.required' => 'Please Input Clock Start Class',
                'clock_end.required' => 'Please Input Clock End Class',
                'table_teachers_id.required' => 'Please Input ID Teachers Class',
                'table_students_id.required' => 'Please Input ID Students Class',
                'table_course_id.required' => 'Please Input ID Course Class',
            ]
        );

        /* Connection Table DB */
        try {
            DB::table('table_classroom')->insert([
                'offline_class' => $request->offline_class,
                'online_class' => $request->online_class,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'clock_start' => $request->clock_start,
                'clock_end' => $request->clock_end,
                'table_teachers_id' => $request->table_teachers_id,
                'table_students_id' => $request->table_students_id,
                'table_course_id' => $request->table_course_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('classroom.create')->with('success', 'New classroom Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('classroom.create')->with('error', 'New classroom Data Has Been Error Saved');
        }
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
        $classroom_edit = Classroom::find($id);
        $teachers = Teachers::all();
        $students = Students::all();
        $library = Library::all();
        return view('admin.classroom.edit', compact('classroom_edit', 'teachers', 'students', 'library'));
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
        $request->validate(
            [
                'offline_class' => 'required|max:45',
                'online_class' => 'required|max:250',
                'date_start' => 'required',
                'date_end' => 'required',
                'clock_start' => 'required',
                'clock_end' => 'required',
                'table_teachers_id' => 'required',
                'table_students_id' => 'required',
                'table_course_id' => 'required',
            ],

            /* Message Error Classroom */
            [
                'offline_class.max' => 'Please Input Offline Class Max 45',
                'offline_class.required' => 'Please Input Offline Class',
                'online_class.max' => 'Please Input Online Class Max 250',
                'online_class.required' => 'Please Input Online Class ',
                'date_start.required' => 'Please Input Date Start Class',
                'date_end.required' => 'Please Input Date End Class',
                'clock_start.required' => 'Please Input Clock Start Class',
                'clock_end.required' => 'Please Input Clock End Class',
                'table_teachers_id.required' => 'Please Input ID Teachers Class',
                'table_students_id.required' => 'Please Input ID Students Class',
                'table_course_id.required' => 'Please Input ID Course Class',
            ]
        );

        /* Connection Table DB */
        try {
            DB::table('table_classroom')->where('id', $id)->update([
                'offline_class' => $request->offline_class,
                'online_class' => $request->online_class,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'clock_start' => $request->clock_start,
                'clock_end' => $request->clock_end,
                'table_teachers_id' => $request->table_teachers_id,
                'table_students_id' => $request->table_students_id,
                'table_course_id' => $request->table_course_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('classroom.index')->with('success', 'Edit classroom Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('classroom.index')->with('error', 'Edit classroom Data Has Been Error Saved');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_classroom = Classroom::find($id);
        Classroom::where('id', $id)->delete();
        toast('Success Delete Data Classroom', 'success');
        return redirect()->back();
    }
}

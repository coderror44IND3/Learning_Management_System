<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Presence_Students;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Presence_StudentsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presence_students = DB::table('table_presence_students')
                                ->join('table_students', 'table_students.id', '=', 'table_presence_students.table_students_id')
                                ->join('table_classroom', 'table_classroom.id', '=', 'table_presence_students.table_classroom_id')
                                ->select('table_presence_students.*', 'table_students.name_students as students', 'table_classroom.offline_class as offline', 'table_classroom.online_class as online')
                                ->get();
        $snap_Token = 'G860866973';
        return view('admin.student.presence_student.index', compact('presence_students', 'snap_Token'));
    }

    public function searchstudentspresence(Request $request)
    {
        $start_search = $request->start_search;
        $end_search = $request->end_search;
        
        $presence_students = DB::table('table_presence_students')
                                ->join('table_students', 'table_students.id', '=', 'table_presence_students.table_students_id')
                                ->join('table_classroom', 'table_classroom.id', '=', 'table_presence_students.table_classroom_id')
                                ->select('table_presence_students.*', 'table_students.name_students as students', 'table_classroom.offline_class as offline', 'table_classroom.online_class as online')
                                ->whereDate('table_presence_students.created_at', '>=', $start_search)
                                ->whereDate('table_presence_students.created_at', '<=', $end_search)
                                ->get();
        $snap_Token = 'G860866973';
        return view('admin.student.presence_student.index', compact('presence_students', 'snap_Token'));
    }

    public function tablepresenceSTD()
    {
        $presence_students = DB::table('table_presence_students')
            ->join('table_students', 'table_students.id', '=', 'table_presence_students.table_students_id')
            ->join('table_classroom', 'table_classroom.id', '=', 'table_presence_students.table_classroom_id')
            ->select('table_presence_students.*', 'table_students.name_students as students', 'table_classroom.offline_class as offline', 'table_classroom.online_class as online')
            ->get();
        $snap_Token = 'G860866973';
        return view('admin.student.presence_student.index', compact('presence_students', 'snap_Token'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presence_students = Presence_Students::all();
        $classroom = Classroom::all();
        $students = Students::all();
        $snap_Token = 'G860866973';
        return view('admin.student.presence_student.create', compact('presence_students', 'classroom', 'students', 'snap_Token'));
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
                'date_presence' => 'required',
                'clock_presence' => 'required',
                'status_presence' => 'required',
                'table_students_id' => 'required',
                'table_classroom_id' => 'required',
            ],

            /* Message Error Presence Teachers */
            [
                'date_presence.required' => 'Please Input Date Presence Students',
                'clock_presence.required' => 'Please Input Clock Presence Students',
                'status_presence.required' => 'Please Input Status Presence Students',
                'table_students_id.required' => 'Please Input ID Students',
                'table_classroom_id.required' => 'Please Input ID Classroom',
            ]
        );

        /* Connection Table DB */
        try {
            DB::table('table_presence_students')->insert([
                'date_presence' => $request->date_presence,
                'clock_presence' => $request->clock_presence,
                'status_presence' => $request->status_presence,
                'table_students_id' => $request->table_students_id,
                'table_classroom_id' => $request->table_classroom_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('presence_student.create')->with('success', 'New Presence Students Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('presence_student.create')->with('error', 'New Presence Students Data Has Been Error Saved');
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
        $edit_presence_students = Presence_Students::find($id);
        $classroom = Classroom::all();
        $students = Students::all();
        $snap_Token = 'G860866973';
        return view('admin.student.presence_student.edit', compact('classroom', 'edit_presence_students', 'students', 'snap_Token'));
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
                'date_presence' => 'required',
                'clock_presence' => 'required',
                'status_presence' => 'required',
                'table_students_id' => 'required',
                'table_classroom_id' => 'required',
            ],

            /* Message Error Presence Teachers */
            [
                'date_presence.required' => 'Please Input Date Presence Students',
                'clock_presence.required' => 'Please Input Clock Presence Students',
                'status_presence.required' => 'Please Input Status Presence Students',
                'table_students_id.required' => 'Please Input ID Students',
                'table_classroom_id.required' => 'Please Input ID Classroom',
            ]
        );

        /* Connection Table DB */
        try {
            DB::table('table_presence_students')->where('id', $id)->update([
                'date_presence' => $request->date_presence,
                'clock_presence' => $request->clock_presence,
                'status_presence' => $request->status_presence,
                'table_students_id' => $request->table_students_id,
                'table_classroom_id' => $request->table_classroom_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('presence_student.index')->with('success', 'Edit Presence Students Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('presence_student.index')->with('error', 'Edit Presence Students Data Has Been Error Saved');
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
        $delete_presence_students = Presence_Students::find($id);
        Presence_Students::where('id', $id)->delete();
        toast('Success Delete Data Presence Students', 'success');
        return redirect()->back();
    }
}

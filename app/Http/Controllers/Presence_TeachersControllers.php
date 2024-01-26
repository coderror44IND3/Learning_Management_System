<?php

namespace App\Http\Controllers;

use App\Models\Presence_Teachers;
use App\Models\Classroom;
use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Presence_TeachersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presence_teachers = DB::table('table_presence_teachers')
            ->join('table_teachers', 'table_teachers.id', '=', 'table_presence_teachers.table_teachers_id')
            ->join('table_classroom', 'table_classroom.id', '=', 'table_presence_teachers.table_classroom_id')
            ->select('table_presence_teachers.*', 'table_teachers.name_teachers as teachers', 'table_classroom.offline_class as offline', 'table_classroom.online_class as online')
            ->get();

        return view('admin.teacher.presence_teacher.index', compact('presence_teachers'));
    }

    public function searchpresenceT(Request $request)
    {
        $start_search = $request->start_search;
        $end_search = $request->end_search;

        $presence_teachers = Presence_Teachers::whereDate('created_at', '>=', $start_search)
            ->whereDate('created_at', '<=', $end_search)
            ->get();
        return view('admin.teacher.presence_teacher.index', compact('presence_teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presence_teachers = Presence_Teachers::all();
        $classroom_all = Classroom::all();
        $teachers_all = Teachers::all();

        return view('admin.teacher.presence_teacher.create', compact('presence_teachers', 'classroom_all', 'teachers_all'));
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

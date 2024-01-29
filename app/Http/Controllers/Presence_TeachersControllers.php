<?php

namespace App\Http\Controllers;

use App\Models\Presence_Teachers;
use App\Models\Classroom;
use App\Models\Teachers;
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
        $presence_teacher = DB::table('table_presence_teachers')
                            ->join('table_teachers', 'table_teachers.id', '=', 'table_presence_teachers.table_teachers_id')
                            ->join('table_classroom', 'table_classroom.id', '=', 'table_presence_teachers.table_classroom_id')
                            ->select('table_presence_teachers.*', 'table_teachers.name_teachers as teachers', 'table_classroom.offline_class as offline', 'table_classroom.online_class as online')
                            ->get();
        return view('admin.teacher.presence_teacher.index', compact('presence_teacher'));
    }

    public function searchpresenceT(Request $request)
    {
        $start_search = $request->start_search;
        $end_search = $request->end_search;

        $presence_teacher = Presence_Teachers::whereDate('created_at', '>=', $start_search)
            ->whereDate('created_at', '<=', $end_search)
            ->get();
        return view('admin.teacher.presence_teacher.index', compact('presence_teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presence_teacher = Presence_Teachers::all();
        $classroom = Classroom::all();
        $teachers = Teachers::all();
        return view('admin.teacher.presence_teacher.create', compact('presence_teacher', 'classroom', 'teachers'));
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
            'table_teachers_id' => 'required',
            'table_classroom_id' => 'required',
        ],
        
        /* Message Error Presence Teachers */
        [
            'date_presence.required' => 'Please Input Date Presence Teachers',
            'clock_presence.required' => 'Please Input Clock Presence Teachers',
            'status_presence.required' => 'Please Input Status Presence Teachers',
            'table_teachers_id.required' => 'Please Input ID Teachers',
            'table_classroom_id.required' => 'Please Input ID Classroom',
        ]);

        /* Connection Table DB */
        try {
            DB::table('table_presence_teachers')->insert([
                'date_presence' => $request->date_presence,
                'clock_presence' => $request->clock_presence,
                'status_presence' => $request->status_presence,
                'table_teachers_id' => $request->table_teachers_id,
                'table_classroom_id' => $request->table_classroom_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('presence_teacher.create')->with('success', 'New Presence Teachers Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('presence_teacher.create')->with('error', 'New Presence Teachers Data Has Been Error Saved');
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
        $edit_presence_teachers = Presence_Teachers::find($id);
        $classroom = Classroom::all();
        $teachers = Teachers::all();
        return view('admin.teacher.presence_teacher.edit', compact('edit_presence_teachers', 'classroom', 'teachers'));
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
                'table_teachers_id' => 'required',
                'table_classroom_id' => 'required',
            ],
            
            /* Message Error Presence Teachers */
            [
                'date_presence.required' => 'Please Input Date Presence Teachers',
                'clock_presence.required' => 'Please Input Clock Presence Teachers',
                'status_presence.required' => 'Please Input Status Presence Teachers',
                'table_teachers_id.required' => 'Please Input ID Teachers',
                'table_classroom_id.required' => 'Please Input ID Classroom',
            ]);
    
            /* Connection Table DB */
            try {
                DB::table('table_presence_teachers')->where('id', $id)->update([
                    'date_presence' => $request->date_presence,
                    'clock_presence' => $request->clock_presence,
                    'status_presence' => $request->status_presence,
                    'table_teachers_id' => $request->table_teachers_id,
                    'table_classroom_id' => $request->table_classroom_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                return redirect()->route('presence_teacher.index')->with('success', 'Edit Presence Teachers Data Has Been Successfully Saved');
            } catch (\Exception $allerStore) {
                return redirect()->route('presence_teacher.index')->with('error', 'Edit Presence Teachers Data Has Been Error Saved');
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
        $delete_presence_teacher = Presence_Teachers::find($id);
        Presence_Teachers::where('id', $id)->delete();
        toast('Success Delete Data Presence Teachers', 'success');
        return redirect()->back();
    }
}

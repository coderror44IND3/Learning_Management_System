<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleStudent = auth()->user()->role == 'Students';
        $students_users = User::where('role', $roleStudent)->where('isactive', true)->first();

        $students = Students::all();
        return view('admin.student.index', compact('students', 'students_users'));
    }

    public function searchstudents(Request $request)
    {
        $roleStudent = auth()->user()->role == 'Students';
        $students_users = User::where('role', $roleStudent)->where('isactive', true)->first();

        $start_search = $request->start_search;
        $end_search = $request->end_search;

        $students = Students::whereDate('created_at', '>=', $start_search)
            ->whereDate('created_at', '<=', $end_search)
            ->get();
        return view('admin.student.index', compact('students', 'students_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        $users = User::all();
        return view('admin.student.create', compact('students', 'users'));
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

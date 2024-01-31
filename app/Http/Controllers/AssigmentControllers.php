<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Students;

class AssigmentControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameStudent = auth()->user()->name || auth()->user()->role == 'Students';
        $students_users = User::where('name', $nameStudent)->where('isactive', true)->first();

        $assigment = DB::table('table_assigments')
            ->join('table_students', 'table_students.id', '=', 'table_assigments.table_students_id')
            ->where('table_students.name_students', $nameStudent)
            ->select('table_assigments.*', 'table_students.name_students as students')
            ->get();
        return view('admin.student.assigment.index', compact('assigment', 'nameStudent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assigment = Assigment::all();
        $students = Students::all();
        return view('admin.student.assigment.create', compact('assigment', 'students'));
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
                'files_assigments' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,txt,csv,xlsm,pptx|min:2|max:990',
                'datetime_assigments' => 'required',
                'table_students_id' => 'required',
            ],

            /* Message Error Assigments */
            [
                'files_assigments.max' => 'Input File Max 990',
                'files_assigments.mimes' => 'Input pdf,doc,docx,xls,xlsx,txt,csv,xlsm,pptx',
                'files_assigments.file' => 'This File Is Not An File',
                'datetime_assigments' => 'Please Input Date Time Assigments',
                'table_students_id' => 'Please Input Name Valid',
            ]
        );

        if (!empty($request->files_assigments)) {
            $fileName = 'file_' . $request->name_students . '.' . $request->files_assigments->extension();
            $request->files_assigments->move(public_path('admin/assets/assigment/student'), $fileName);
        } else {
            $fileName = '';
        }

        /* Connection Table DB */
        try {
            DB::table('table_assigments')->insert([
                'files_assigments' => $fileName,
                'datetime_assigments' => $request->datetime_assigments,
                'table_students_id' => $request->table_students_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('student.assigment.create')->with('success', 'New Assigments Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('student.assigment.create')->with('error', 'New Assigments Data Has Been Error Saved');
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

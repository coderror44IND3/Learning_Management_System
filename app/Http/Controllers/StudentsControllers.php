<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $request->validate(
            [
                'photo_students' => 'required|image|mimes:jpg,png,gif,svg|min:2|max:280',
                'name_students' => 'required|max:50',
                'birthday_students' => 'required',
                'gender_students' => 'required',
                'telp_students' => 'required|max:15',
                'email_students' => 'required|max:45',
                'address_students' => 'required',
                'users_id' => 'required',
            ],

            /* Message Error Students */
            [
                'photo_students.max' => 'Please Input File Max 280',
                'photo_students.min' => 'Please Input File Min 2 MB',
                'photo_students.mimes' => 'Please Input jpg,png,gif,svg',
                'photo_students.image' => 'This File Is Not An Image',
                'name_students.required' => 'Please Input Full Name Valid',
                'name_students.max' => 'Please Input Full Name Max 50',
                'birthday_students.required' => 'Please Input Birthday Valid',
                'gender_students.required' => 'Please Input Gender Male / Female',
                'telp_students.required' => 'Please Input Telephone Valid',
                'telp_students.max' => 'Please Input Telephone Max 15',
                'email_students.required' => 'Please Input E-Mail Valid',
                'email_students.max' => 'Please Input E-Mail 45',
                'address_students.required' => 'Please Input Address Valid',
                'users_id.required' => 'Please Input users Valid',
            ]
        );

        /* Photo New Students */
        if (!empty($request->photo_students)) {
            $filename = 'students_' . $request->name_students . '.' . $request->photo_students->extension();
            $request->photo_students->move(public_path('admin/assets/img/students'), $filename);
        } else {
            $filename = '';
        }

        /* Connection Table DB */
        try {
            DB::table('table_students')->insert([
                'photo_students' => $filename,
                'name_students' => $request->name_students,
                'birthday_students' => $request->birthday_students,
                'telp_students' => $request->telp_students,
                'gender_students' => $request->gender_students,
                'email_students' => $request->email_students,
                'address_students' => $request->address_students,
                'users_id' => $request->users_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('student.create')->with('success', 'New Student Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('student.create')->with('error', 'New Student Data Has Been Error Saved');
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
        $edit_students = Students::find($id);
        $users = User::all();
        return view('admin.student.edit', compact('edit_students', 'users'));
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
                'photo_students' => 'required|image|mimes:jpg,png,gif,svg|min:2|max:280',
                'name_students' => 'required|max:50',
                'birthday_students' => 'required',
                'gender_students' => 'required',
                'telp_students' => 'required|max:15',
                'email_students' => 'required|max:45',
                'address_students' => 'required',
                'users_id' => 'required',
            ],

            /* Message Error Students */
            [
                'photo_students.max' => 'Please Input File Max 280',
                'photo_students.min' => 'Please Input File Min 2 MB',
                'photo_students.mimes' => 'Please Input jpg,png,gif,svg',
                'photo_students.image' => 'This File Is Not An Image',
                'name_students.required' => 'Please Input Full Name Valid',
                'name_students.max' => 'Please Input Full Name Max 50',
                'birthday_students.required' => 'Please Input Birthday Valid',
                'gender_students.required' => 'Please Input Gender Male / Female',
                'telp_students.required' => 'Please Input Telephone Valid',
                'telp_students.max' => 'Please Input Telephone Max 15',
                'email_students.required' => 'Please Input E-Mail Valid',
                'email_students.max' => 'Please Input E-Mail 45',
                'address_students.required' => 'Please Input Address Valid',
                'users_id.required' => 'Please Input users Valid',
            ]
        );

        $photo_update = DB::table('table_students')
            ->select('photo_students')
            ->where('id', $id)
            ->get();
        foreach ($photo_update as $updatte) {
            $photo_old = $updatte->photo_students;
        }

        if (!empty($request->photo_students)) {
            if (!empty($photo_old)) unlink('admin/assets/img/students/' . $photo_old);
            $filename = 'students_' . $request->name_students . '.' . $request->photo_students->extension();
            $request->photo_students->move(public_path('admin/assets/img/students'), $filename);
        } else {
            $filename = $photo_old;
        }

        /* Connection Table DB */
        try {
            DB::table('table_students')->where('id', $id)->update([
                'photo_students' => $filename,
                'name_students' => $request->name_students,
                'birthday_students' => $request->birthday_students,
                'telp_students' => $request->telp_students,
                'gender_students' => $request->gender_students,
                'email_students' => $request->email_students,
                'address_students' => $request->address_students,
                'users_id' => $request->users_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('student.index')->with('success', 'Edit Student Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('student.index')->with('error', 'Edit Student Data Has Been Error Saved');
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
        $detail_students = Students::find($id);
        if(!empty($detail_students->photo_students))unlink('admin/assets/img/students/' . $detail_students->photo_students);

        Students::where('id', $id)->delete();
        toast('Success Delete Data Students', 'success');
        return redirect()->back();
    }
}

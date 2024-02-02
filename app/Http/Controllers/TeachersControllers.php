<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleTeacher = auth()->user()->role == 'Teachers';
        $teachers_users = User::where('role', $roleTeacher)->where('isactive', true)->first();

        $teachers = Teachers::all();
        $snap_Token = 'G860866973';
        return view('admin.teacher.index', compact('teachers', 'teachers_users', 'snap_Token'));
    }

    public function searchteacher(Request $request)
    {
        $roleTeacher = auth()->user()->role == 'Teachers';
        $teachers_users = User::where('role', $roleTeacher)->where('isactive', true)->first();

        $start_search = $request->start_search;
        $end_search = $request->end_search;

        $teachers = Teachers::whereDate('created_at', '>=', $start_search)
            ->whereDate('created_at', '<=', $end_search)
            ->get();
        $snap_Token = 'G860866973';
        return view('admin.teacher.index', compact('teachers', 'teachers_users', 'snap_Token'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teachers::all();
        $users = User::all();
        $snap_Token = 'G860866973';
        return view('admin.teacher.create', compact('teachers', 'users', 'snap_Token'));
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
                'photo_teachers' => 'required|image|mimes:jpg,png,gif,svg|min:2|max:280',
                'name_teachers' => 'required|max:50',
                'birthday_teachers' => 'required',
                'gender_teachers' => 'required',
                'telp_teachers' => 'required|max:15',
                'email_teachers' => 'required|max:45',
                'address_teachers' => 'required',
                'users_id' => 'required',
            ],

            /* Message Error Teachers */
            [
                'photo_teachers.max' => 'Please Input File Max 280',
                'photo_teachers.min' => 'Please Input File Min 2 MB',
                'photo_teachers.mimes' => 'Please Input jpg,png,gif,svg',
                'photo_teachers.image' => 'This File Is Not An Image',
                'name_teachers.required' => 'Please Input Full Name Valid',
                'name_teachers.max' => 'Please Input Full Name Max 50',
                'birthday_teachers.required' => 'Please Input Birthday Valid',
                'gender_teachers.required' => 'Please Input Gender Male / Female',
                'telp_teachers.required' => 'Please Input Telephone Valid',
                'telp_teachers.max' => 'Please Input Telephone Max 15',
                'email_teachers.required' => 'Please Input E-Mail Valid',
                'email_teachers.max' => 'Please Input E-Mail 45',
                'address_teachers.required' => 'Please Input Address Valid',
                'users_id.required' => 'Please Input users Valid',
            ]
        );

        /* Photo New teachers */
        if (!empty($request->photo_teachers)) {
            $filename = 'teachers_' . $request->name_teachers . '.' . $request->photo_teachers->extension();
            $request->photo_teachers->move(public_path('admin/assets/img/teachers'), $filename);
        } else {
            $filename = '';
        }

        /* Connection Table DB */
        try {
            DB::table('table_teachers')->insert([
                'photo_teachers' => $filename,
                'name_teachers' => $request->name_teachers,
                'birthday_teachers' => $request->birthday_teachers,
                'telp_teachers' => $request->telp_teachers,
                'gender_teachers' => $request->gender_teachers,
                'email_teachers' => $request->email_teachers,
                'address_teachers' => $request->address_teachers,
                'users_id' => $request->users_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('teacher.create')->with('success', 'New Teacher Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('teacher.create')->with('error', 'New Teacher Data Has Been Error Saved');
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
        $edit_teachers = Teachers::find($id);
        $users = User::all();
        $snap_Token = 'G860866973';
        return view('admin.teacher.edit', compact('edit_teachers', 'users', 'snap_Token'));
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
                'photo_teachers' => 'required|image|mimes:jpg,png,gif,svg|min:2|max:280',
                'name_teachers' => 'required|max:50',
                'birthday_teachers' => 'required',
                'gender_teachers' => 'required',
                'telp_teachers' => 'required|max:15',
                'email_teachers' => 'required|max:45',
                'address_teachers' => 'required',
                'users_id' => 'required',
            ],

            /* Message Error Teachers */
            [
                'photo_teachers.max' => 'Please Input File Max 280',
                'photo_teachers.min' => 'Please Input File Min 2 MB',
                'photo_teachers.mimes' => 'Please Input jpg,png,gif,svg',
                'photo_teachers.image' => 'This File Is Not An Image',
                'name_teachers.required' => 'Please Input Full Name Valid',
                'name_teachers.max' => 'Please Input Full Name Max 50',
                'birthday_teachers.required' => 'Please Input Birthday Valid',
                'gender_teachers.required' => 'Please Input Gender Male / Female',
                'telp_teachers.required' => 'Please Input Telephone Valid',
                'telp_teachers.max' => 'Please Input Telephone Max 15',
                'email_teachers.required' => 'Please Input E-Mail Valid',
                'email_teachers.max' => 'Please Input E-Mail 45',
                'address_teachers.required' => 'Please Input Address Valid',
                'users_id.required' => 'Please Input users Valid',
            ]
        );

        $photo_update = DB::table('table_teachers')
            ->select('photo_teachers')
            ->where('id', $id)
            ->get();
        foreach ($photo_update as $updatte) {
            $photo_old = $updatte->photo_teachers;
        }

        if (!empty($request->photo_teachers)) {
            if (!empty($photo_old)) unlink('admin/assets/img/teachers/' . $photo_old);
            $filename = 'teachers_' . $request->name_teachers . '.' . $request->photo_teachers->extension();
            $request->photo_teachers->move(public_path('admin/assets/img/teachers'), $filename);
        } else {
            $filename = $photo_old;
        }

        /* Connection Table DB */
        try {
            DB::table('table_teachers')->where('id', $id)->update([
                'photo_teachers' => $filename,
                'name_teachers' => $request->name_teachers,
                'birthday_teachers' => $request->birthday_teachers,
                'telp_teachers' => $request->telp_teachers,
                'gender_teachers' => $request->gender_teachers,
                'email_teachers' => $request->email_teachers,
                'address_teachers' => $request->address_teachers,
                'users_id' => $request->users_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('teacher.index')->with('success', 'Edit Teacher Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('teacher.index')->with('error', 'Edit Teacher Data Has Been Error Saved');
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
        $delete_teachers = Teachers::find($id);
        if(!empty($delete_teachers->photo_teachers))unlink('admin/assets/img/teachers/' . $delete_teachers->photo_teachers);

        Teachers::where('id', $id)->delete();
        toast('Success Delete Data Teachers', 'success');
        return redirect()->back();
    }
}

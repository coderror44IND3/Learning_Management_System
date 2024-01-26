<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $library = Library::all();
        return view('admin.library.index', compact('library'));
    }

    public function table()
    {
        $library_table = Library::all();
        return view('admin.library.table', compact('library_table'));
    }

    public function searchlibrary(Request $request)
    {
        $start_search = $request->start_search;
        $end_search = $request->end_search;

        $library_table = Library::whereDate('created_at', '>=', $start_search)
            ->whereDate('created_at', '<=', $end_search)
            ->get();
        return view('admin.library.table', compact('library_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $library = Library::all();
        return view('admin.library.create', compact('library'));
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
                'course_univesity' => 'required|max:45',
                'date_univesity' => 'required',
                'deksripsi_univesity' => 'required',
            ],

            /* Message Error Library */
            [
                'course_univesity.max' => 'Please Input Course Max 45',
                'course_univesity.required' => 'Please Input Course Valid',
                'date_univesity.required' => 'Please Input Date Valid',
                'deksripsi_univesity.required' => 'Please Input Deksripsi Course Valid',
            ]
        );

        try {
            DB::table('table_course')->insert([
                'course_univesity' => $request->course_univesity,
                'date_univesity' => $request->date_univesity,
                'deksripsi_univesity' => $request->deksripsi_univesity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('library.index')->with('success', 'New Library Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('library.index')->with('error', 'New Library Data Has Been Error Saved');
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
        $library_show = Library::find($id);
        return view('admin.library.index', compact('library_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $library_edit = Library::find($id);
        return view('admin.library.edit', compact('library_edit'));
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
                'course_univesity' => 'required|max:45',
                'date_univesity' => 'required',
                'deksripsi_univesity' => 'required',
            ],

            /* Message Error Library */
            [
                'course_univesity.max' => 'Please Input Course Max 45',
                'course_univesity.required' => 'Please Input Course Valid',
                'date_univesity.required' => 'Please Input Date Valid',
                'deksripsi_univesity.required' => 'Please Input Deksripsi Course Valid',
            ]
        );

        try {
            DB::table('table_course')->where('id', $id)->update([
                'course_univesity' => $request->course_univesity,
                'date_univesity' => $request->date_univesity,
                'deksripsi_univesity' => $request->deksripsi_univesity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('library.index')->with('success', 'Edit Library Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('library.index')->with('error', 'Edit Library Data Has Been Error Saved');
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
        //
    }
}

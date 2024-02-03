<?php

namespace App\Http\Controllers;

use App\Models\LessonStundets;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonStundetsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesson_score = DB::table('table_score')
            ->join('table_course', 'table_course.id', '=', 'table_score.table_course_id')
            ->select('table_score.*', 'table_course.course_univesity as course')
            ->get();

        foreach ($lesson_score as $score) {
            $score->average_grade = ($score->dailytasks_score + $score->presence_score + $score->uts_score + $score->uas_score) / 4;
            $ketnilai = ($score->average_grade >= 60) ? 'Graduate' : 'Not Pass';

            if ($score->average_grade >= 86 && $score->average_grade <= 100) {
                $grade = 'A';
            } elseif ($score->average_grade >= 76 && $score->average_grade < 86) {
                $grade = 'B';
            } elseif ($score->average_grade >= 60 && $score->average_grade < 76) {
                $grade = 'C';
            } elseif ($score->average_grade >= 31 && $score->average_grade < 60) {
                $grade = 'D';
            } elseif ($score->average_grade >= 0 && $score->average_grade < 31) {
                $grade = 'E';
            } else {
                $grade = ' ';
            }

            switch ($grade) {
                case 'A':
                    $predikat = 'Very Good';
                    break;
                case 'B':
                    $predikat = 'Good';
                    break;
                case 'C':
                    $predikat = 'Enough';
                    break;
                case 'D':
                    $predikat = 'Bad';
                    break;
                case 'E':
                    $predikat = 'Very Bad';
                    break;
                default:
                    $predikat = '';
            };

            $score->grade = $grade;
            $score->predikat = $predikat;
            $score->ketnilai = $ketnilai;
        };
        $snap_Token = 'G860866973';
        return view('admin.student.grade_class.index', compact('lesson_score', 'snap_Token'));
    }

    public function tablegrade()
    {
        $lesson_score = DB::table('table_score')
            ->join('table_course', 'table_course.id', '=', 'table_score.table_course_id')
            ->select('table_score.*', 'table_course.course_univesity as course')
            ->get();

        foreach ($lesson_score as $score) {
            $score->average_grade = ($score->dailytasks_score + $score->presence_score + $score->uts_score + $score->uas_score) / 4;
            $ketnilai = ($score->average_grade >= 60) ? 'Graduate' : 'Not Pass';

            if ($score->average_grade >= 86 && $score->average_grade <= 100) {
                $grade = 'A';
            } elseif ($score->average_grade >= 76 && $score->average_grade < 86) {
                $grade = 'B';
            } elseif ($score->average_grade >= 60 && $score->average_grade < 76) {
                $grade = 'C';
            } elseif ($score->average_grade >= 31 && $score->average_grade < 60) {
                $grade = 'D';
            } elseif ($score->average_grade >= 0 && $score->average_grade < 31) {
                $grade = 'E';
            } else {
                $grade = ' ';
            }

            switch ($grade) {
                case 'A':
                    $predikat = 'Very Good';
                    break;
                case 'B':
                    $predikat = 'Good';
                    break;
                case 'C':
                    $predikat = 'Enough';
                    break;
                case 'D':
                    $predikat = 'Bad';
                    break;
                case 'E':
                    $predikat = 'Very Bad';
                    break;
                default:
                    $predikat = '';
            };

            $score->grade = $grade;
            $score->predikat = $predikat;
            $score->ketnilai = $ketnilai;
        };
        $snap_Token = 'G860866973';
        return view('admin.student.grade_class.index', compact('lesson_score', 'snap_Token'));
    }

    public function searchlesson(Request $request)
    {
        $start_search = $request->start_search;
        $end_search = $request->end_search;

        $lesson_score = LessonStundets::whereDate('created_at', '>=', $start_search)
            ->whereDate('created_at', '<=', $end_search)
            ->get();
        $snap_Token = 'G860866973';
        return view('admin.student.grade_class.index', compact('lesson_score', 'snap_Token'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create_lesson = LessonStundets::all();
        $library = Library::all();
        $snap_Token = 'G860866973';
        return view('admin.student.grade_class.create', compact('create_lesson', 'library', 'snap_Token'));
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
                'name_score' => 'required|max:50',
                'dailytasks_score' => 'required',
                'presence_score' => 'required',
                'uts_score' => 'required',
                'uas_score' => 'required',
                'table_course_id' => 'required',
            ],

            /* Message Error Lesson Students */
            [
                'name_score.required' => 'Please Input Name Students Valid',
                'name_score.max' => 'Please Input Name Students Max 50',
                'dailytasks_score.required' => 'Please Input Score Daily Tasks Final',
                'presence_score.required' => 'Please Input Score Presence Final',
                'uts_score.required' => 'Please Input Score UTS Final',
                'uas_score.required' => 'Please Input Score UAS Final',
                'table_course_id.required' => 'Please Input ID Course',
            ]
        );

        /* Connection Table DB */
        try {
            DB::table('table_score')->insert([
                'name_score' => $request->name_score,
                'dailytasks_score' => $request->dailytasks_score,
                'presence_score' => $request->presence_score,
                'uts_score' => $request->uts_score,
                'uas_score' => $request->uas_score,
                'table_course_id' => $request->table_course_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('grade_class.create')->with('success', 'New Lesson Score Students Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('grade_class.create')->with('error', 'New Lesson Score Students Data Has Been Error Saved');
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
        $edit_lesson = LessonStundets::find($id);
        $library = Library::all();
        $snap_Token = 'G860866973';
        return view('admin.student.grade_class.edit', compact('edit_lesson', 'library', 'snap_Token'));
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
                'name_score' => 'required|max:50',
                'dailytasks_score' => 'required',
                'presence_score' => 'required',
                'uts_score' => 'required',
                'uas_score' => 'required',
                'table_course_id' => 'required',
            ],

            /* Message Error Lesson Students */
            [
                'name_score.required' => 'Please Input Name Students Valid',
                'name_score.max' => 'Please Input Name Students Max 50',
                'dailytasks_score.required' => 'Please Input Score Daily Tasks Final',
                'presence_score.required' => 'Please Input Score Presence Final',
                'uts_score.required' => 'Please Input Score UTS Final',
                'uas_score.required' => 'Please Input Score UAS Final',
                'table_course_id.required' => 'Please Input ID Course',
            ]
        );

        /* Connection Table DB */
        try {
            DB::table('table_score')->where('id', $id)->update([
                'name_score' => $request->name_score,
                'dailytasks_score' => $request->dailytasks_score,
                'presence_score' => $request->presence_score,
                'uts_score' => $request->uts_score,
                'uas_score' => $request->uas_score,
                'table_course_id' => $request->table_course_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('grade_class.index')->with('success', 'Edit Lesson Score Students Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('grade_class.index')->with('error', 'Edit Lesson Score Students Data Has Been Error Saved');
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
        $delete_lesson = LessonStundets::find($id);
        LessonStundets::where('id', $id)->delete();
        toast('Success Delete Data Lesson Students', 'success');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoneyControllers extends Controller
{
    public function index()
    {
        $money_class = Money::all();
        $snap_Token = 'G860866973';
        return view('admin.student.money.index', compact('money_class', 'snap_Token'));
    }

    public function tablemoney(Request $request)
    {
        $money_class = Money::all();

        /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
        composer require midtrans/midtrans-php
                                    
        Alternatively, if you are not using **Composer**, you can download midtrans-php library 
        (https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
        the file manually.

        require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */

        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-QSVk4CCwGZ_GGRUO9OBFhPaQ';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => uniqid(),
                'gross_amount' => 5000,
            ),
            'customer_details' => array(
                'first_name' => 'Raabbaanii',
                'last_name' => 'Islamic School',
                'phone' => '+6282125139270',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('admin.student.money.index', ['snap_Token' => $snapToken], compact('money_class'));
    }

    public function create()
    {
        $create_money = Money::all();
        $snap_Token = 'G860866973';
        return view('admin.student.money.create', compact('create_money', 'snap_Token'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'class_students' => 'required|max:50',
                'money_students' => 'required',
                'date' => 'required',
                'clock' => 'required',
                'status_students' => 'required',
            ],

            /* Message Error Library */
            [
                'name.max' => 'Please Input Name Students Max 50',
                'name.required' => 'Please Input Name Students',
                'class_students.max' => 'Please Input Class Students Max 50',
                'class_students.required' => 'Please Input Class Students',
                'money_students.required' => 'Please Input Money Class Valid',
                'date.required' => 'Please Input Date Valid',
                'clock.required' => 'Please Input Clock Valid',
                'status_students.required' => 'Please Input status Valid',
            ]
        );

        /* Connection Table DB */
        try {
            DB::table('table_money_students')->insert([
                'name' => $request->name,
                'class_students' => $request->class_students,
                'money_students' => $request->money_students,
                'date' => $request->date,
                'clock' => $request->clock,
                'status_students' => $request->status_students,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('money.create')->with('success', 'New Money Class Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('money.create')->with('error', 'New Money Class Data Has Been Error Saved');
        }
    }

    public function edit($id)
    {
        $edit_money = Money::find($id);
        $snap_Token = 'G860866973';
        return view('admin.student.money.edit', compact('edit_money', 'snap_Token'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'class_students' => 'required|max:50',
                'money_students' => 'required',
                'date' => 'required',
                'clock' => 'required',
                'status_students' => 'required',
            ],

            /* Message Error Library */
            [
                'name.max' => 'Please Input Name Students Max 50',
                'name.required' => 'Please Input Name Students',
                'class_students.max' => 'Please Input Class Students Max 50',
                'class_students.required' => 'Please Input Class Students',
                'money_students.required' => 'Please Input Money Class Valid',
                'date.required' => 'Please Input Date Valid',
                'clock.required' => 'Please Input Clock Valid',
                'status_students.required' => 'Please Input status Valid',
            ]
        );

        /* Connection Table DB */
        try {
            DB::table('table_money_students')->where('id', $id)->update([
                'name' => $request->name,
                'class_students' => $request->class_students,
                'money_students' => $request->money_students,
                'date' => $request->date,
                'clock' => $request->clock,
                'status_students' => $request->status_students,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('money.index')->with('success', 'Edit Money Class Data Has Been Successfully Saved');
        } catch (\Exception $allerStore) {
            return redirect()->route('money.index')->with('error', 'Edit Money Class Data Has Been Error Saved');
        }
    }

    public function destroy($id)
    {
        $delete_money = Money::find($id);
        Money::where('id', $id)->delete();
        toast('Success Delete Data Money Class', 'success');
        return redirect()->back();
    }
}

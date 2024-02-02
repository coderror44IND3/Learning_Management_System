<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $snap_Token = 'G860866973';
        return view('admin.dashboard.dashboard', compact('snap_Token'));
    }
}

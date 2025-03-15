<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function member() 
    {
        return view('member.dashboard.index');
    }

    public function admin()
    {
        return view('admin.dashboard.index');
    }
}

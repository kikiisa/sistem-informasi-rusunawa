<?php

namespace App\Http\Controllers;

use App\Models\BerkasUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function member() 
    {
        
        return view('member.dashboard.index');
    }
    
    public function admin()
    {
        $data = BerkasUser::all();
        return view('admin.dashboard.index',[
            "totalBerkas" => $data->count(),
            "totalBerkasBulanIni" => BerkasUser::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count()
        ]);
        
    }
}

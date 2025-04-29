<?php

namespace App\Http\Controllers;

use App\Models\BerkasUser;
use App\Models\PerizinanFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function member() 
    {   
        $information = BerkasUser::with("user")->where("id_user", Auth::user()->id)->get();
        $totalPerizinan = PerizinanFile::all()->count();
        
        return view('member.dashboard.index',[
            'information' => collect($information),
            'perizinan'   => $totalPerizinan,
           
        ]);
    }
    
    public function admin()
    {
        $data = BerkasUser::all();
        $user = User::count();
        
        return view('admin.dashboard.index',[
            "user" => $user,
            "totalBerkas" => $data->count(),
            "totalBerkasBulanIni" => BerkasUser::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count()
        ]);
        
    }
}

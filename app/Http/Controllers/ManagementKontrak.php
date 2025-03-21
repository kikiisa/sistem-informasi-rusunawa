<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class ManagementKontrak extends Controller
{
    public function index()
    {
        $data = Kamar::all();
        return view('member.kontrak.index',compact("data"));
    }
}

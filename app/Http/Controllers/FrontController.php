<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        if($request->has("search"))
        {
            $search = $request->search;
            $data = Kamar::where('no_kamar', 'LIKE', "%{$search}%")->paginate(5);

        }else{
            $data = Kamar::paginate(5);
        }
        return view('front.index',compact("data"));
    }
}

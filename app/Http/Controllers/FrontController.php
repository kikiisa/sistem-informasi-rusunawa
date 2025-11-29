<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Order;
use App\Models\User;
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
        $total_kamar = Kamar::all()->count();
        $pengguna = User::all()->count();
        $transaksi = Order::all()->count();
        return view('front.index',compact("data","total_kamar","pengguna","transaksi"));
    }

    public function detail_kamar($id)
    {
         $data = Kamar::all()->where("uuid", $id)->first();
        return view('front.detail',compact("data"));
    }
}

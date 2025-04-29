<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Order;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $data = Kamar::all();
        
        return view('admin.kamar.index',compact("data"));
    }

    public function edit($id)
    {
        $kamar = Kamar::find($id);
        return view('admin.kamar.edit',compact("kamar"));
    }
    public function update(Request $request, $id)
    {
        $data = Kamar::find($id);
        $data->update($request->all());
        if($data)
        {
            return redirect()->route('kamar.index')->with("success", "Data Berhasil Update");
        }
        return redirect()->route('kamar.index')->with("error", "Data Gagal Update");
        
    }

    public function destroy($id)
    {
        
        $cek = Order::where("kamar_id",$id)->exists();
        if($cek)
        {
            return back()->with("error","Data Kamar Tidak Bisa Di Hapus Karena Ada Pada Order");
        }
        $data = Kamar::find($id);
        $data->delete();
        return back()->with("success","Berhasil Di Hapus");
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "no_kamar" => "required|numeric",
            "lt_kamar" => "required|numeric",
            "fasilitas" => "required",
            "harga" => "required|numeric",
        ],[
            "no_kamar.required" => "No Kamar Harus Diisi",
            "no_kamar.numeric" => "No Kamar Harus Berupa Angka",
            "lt_kamar.required" => "Lantai Harus Diisi",
            "lt_kamar.numeric" => "Lantai Harus Berupa Angka",
            "fasilitas.required" => "Fasilitas Harus Diisi",
            "harga.required" => "Harga Harus Diisi",
            "harga.numeric" => "Harga Harus Berupa Angka",
        ]);
        Kamar::create($request->all());
        return redirect()->route('kamar.index')->with("success","Berhasil Di Tambahkan");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PerizinanFile;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PerizinanFileController extends Controller
{
    public function index()
    {
        $data = PerizinanFile::all();
        return view('admin.perizinan.index',compact("data"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama_file" => "required",
            "deskripsi" => "required",
        ]);
        $data = PerizinanFile::create([
            "uuid"      => Uuid::uuid4()->toString(),
            "nama_file" => $request->nama_file,
            "deskripsi" => $request->deskripsi,
        ]);
        if($data)
        {
            return back()->with("success","Berhasil Di Tambahkan");
        }
        return back()->with("error","Gagal Di Tambahkan");

    }
    
    public function show(string $id)
    {
        $data = PerizinanFile::find($id);
        return view("admin.perizinan.edit",compact("data")); 


    }

    public function destroy(string $id)
    {
        $data = PerizinanFile::find($id);
        
        $data->delete();
        if($data)
        {
            return back()->with("success","Berhasil Di Hapus");
        }
        return back()->with("error","Gagal Di Hapus");
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            "nama_file" => "required",
            "deskripsi" => "required",
        ]);
        $data = PerizinanFile::find($id);
        $data->update([
            "nama_file" => $request->nama_file,
            "deskripsi" => $request->deskripsi,
        ]);
        if($data)
        {
            return back()->with("success","Berhasil Di Update");
        }
        return back()->with("error","Gagal Di Update");
    }
}

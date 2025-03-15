<?php

namespace App\Http\Controllers;

use App\Models\BerkasUser;
use App\Models\PerizinanFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BerkasUserController extends Controller
{
    private $path = "data/berkas/";
    
    public function index()
    {
        $data = PerizinanFile::all();
        return view('member.berkas.index', compact('data'));
    }

    public function edit($id)
    {
        $id_user = Auth::user()->id;
        $id_perizinan = $id;
        
        $data = BerkasUser::with(["user", "perizinan_file"])->where("id_perizinan_file", $id_perizinan)->where("id_user", $id_user)->first();
        if($data)
        {
            return view("member.berkas.detail",compact("data"));
        }
        $data = PerizinanFile::find($id);
        return view("member.berkas.create",compact("data"));
        
    }

    public function store(Request $request) 
    {
        $id_user = Auth::user()->id;
        $id_perizinan = $request->id_perizinan;
        $request->validate([
            "file" => "required|mimes:pdf|max:5000" 
        ],[
            "file.required" => "File wajib diisi !",
            "file.mimes" => "Format File Harus PDF !",
            "file.max" => "Ukuran File Maksimal 5MB !"
        ]);
        if($request->hasFile("file"))   
        {
            $file = $request->file("file");
            $filename = $file->hashName();
            $file->move($this->path, $filename);
            BerkasUser::create([
                "id_user" => $id_user,
                "id_perizinan_file" => $id_perizinan,
                "berkas" => $filename
            ]);
            return redirect()->back()->with("success","Berhasil Di Unggah");
        }
    }

    public function update(Request $request,$id)
    {
        
        $id_user = Auth::user()->id;
        $id_perizinan = $id;
        $data = BerkasUser::with(["user", "perizinan_file"])->where("id_perizinan_file", $id_perizinan)->where("id_user", $id_user)->first();
        $request->validate([
            "file" => "required|mimes:pdf|max:5000" 
        ],[
            "file.required" => "File wajib diisi !",
            "file.mimes" => "Format File Harus PDF !",
            "file.max" => "Ukuran File Maksimal 5MB !"
        ]);
        if($request->hasFile("file"))   
        {
            if(File::exists($this->path.$data->berkas))
            {
                File::delete($this->path.$data->berkas);
            }
            $file = $request->file("file");
            $filename = $file->hashName();
            $file->move($this->path, $filename);
            $data->update([
                "berkas" => $filename,
            ]);
            return redirect()->back()->with("success","Berhasil Di Ubah");
        }
        
    }
}

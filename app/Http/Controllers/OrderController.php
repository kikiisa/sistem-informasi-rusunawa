<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{

    private $path = "data/transaksi/";
    public function index()
    {
        
        $data = Order::with(["kamar","user"])->get();
        return view('admin.order.index',compact("data"));
        
    }

    public function edit($id)
    {
        $data = Order::with(["kamar","user"])->find($id);
        return view('admin.order.edit',compact("data"));
    }
    public function show($id)
    {
        $data = Order::with(["kamar","user"])->find($id);
        return view('member.history.detail',compact("data"));
    }

    public function destroy($id)
    {
        $data = Order::find($id);
        $room = Kamar::find($data->kamar_id);
        $room->update([
            "status" => "tersedia"
        ]);
        if(File::exists($this->path.$data->file))
        {
            File::delete($this->path.$data->file);
        }
        $data->delete();
        return back()->with("success","Berhasil Di Hapus");
    }

    public function update(Request $request, $id)
    {
        $data = Order::find($id);
        if($request->hasFile("file")) 
        {
            
            $request->validate([
                "file" => "required|mimes:png,jpg,jpeg,pdf|max:2000",
            ],[
                "file.required" => "File Harus Diisi",
                "file.mimes" => "Format File Harus PNG, JPG, JPEG, PDF",
                "file.max" => "Ukuran File Maksimal 2MB",
            ]);
            if(File::exists($this->path.$data->file))
            {
                File::delete($this->path.$data->file);
            }
            $file = $request->file("file");
            $filename = $file->hashName();
            $file->move($this->path, $filename);
            $data->update([
                "file" => $filename,
                "waktu_kontrak" => $request->masa_kontrak,
            ]);
            return redirect()->route("riwayat-kontrak")->with("success","Berhasil Di Update");

        }else{
            
            $request->validate([
                "status_kontrak" => "required|sometimes",
                "tanggal_order" => "nullable|date|sometimes",
                "waktu_berakhir" => "nullable|date|sometimes",
                "file" => "nullable|mimes:pdf|max:5000|sometimes",
            ]);
            
            if($request->status_kontrak == "approved")
            {
                $kamar = Kamar::find($data->kamar_id);
                $kamar->update([
                    "status" => "tidak_tersedia",
                ]);
                
            }
            $data->update([
                "status_order" => $request->status_kontrak,
                "tanggal_order" => $request->tanggal_order,
                "waktu_berakhir" => $request->waktu_berakhir,
            ]);
            return redirect()->back()->with("success","Berhasil Di Update");
        }  
         
    }

    public function riwayat_kontrak()
    {
        $data = Order::with(["kamar","user"])->where("user_id",Auth::user()->id)->get();
        return view('member.history.index',compact("data"));
    }
}

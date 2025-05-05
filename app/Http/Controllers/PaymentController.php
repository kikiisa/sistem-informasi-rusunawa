<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $path = "data/bank/";
    public function index()
    {
        $data = Payment::all();
        return view('admin.payment.index',compact("data"));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('image'))
        {
            $request->validate([
                'providers' => 'required',
                'rekening' => 'required|sometimes',
                
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],[
                'name.required' => 'Nama wajib diisi !',
                'image.required' => 'Gambar wajib diisi !',
                'image.image' => 'File harus berupa gambar !',
                'image.mimes' => 'File harus berupa gambar !',
                'image.max' => 'Ukuran File Maksimal 2MB !',
            ]);

            $file = $request->file('image');
            
            $filename = $file->hashName();
            
            $file->move($this->path, $filename);
            
            Payment::create([
                'providers' => $request->providers,
                'rekening' => $request->rekening ? $request->rekening : "null",
                'qrcode' => $filename,
            ]);
            return redirect()->route('payment.index')->with("success","Berhasil Di Tambahkan");
        }else{
            $request->validate([
                'providers' => 'required',
                'rekening' => 'sometimes|required',
              
            ],[
                'providers.required' => 'Nama wajib diisi !',
                'rekening.required' => 'Rekening wajib diisi !',
            ]);

            Payment::create([
                'providers' => $request->providers,
                'rekening' => $request->rekening ? $request->rekening : "null",
                'qrcode' => "null",
            ]);
            return redirect()->route('payment.index')->with("success","Berhasil Di Tambahkan");

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Payment::findOrFail($id);
        return view('admin.payment.edit',compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->hasFile("image"))
        {
            $request->validate([
                'providers' => 'required',
                'rekening' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],[
                'name.required' => 'Nama wajib diisi !',
                'image.required' => 'Gambar wajib diisi !',
                'image.image' => 'File harus berupa gambar !',
                'image.mimes' => 'File harus berupa gambar !',
                'image.max' => 'Ukuran File Maksimal 2MB !',
            ]);
            $data = Payment::findOrFail($id);
            if(File::exists($this->path.$data->qrcode))
            {
              File::delete($this->path.$data->qrcode);
            }
            $file = $request->file('image');
            $filename = $file->hashName();
            $file->move($this->path, $filename);
            $data->update([
                'providers' => $request->providers,
                'rekening' => $request->rekening,
                'qrcode' => $filename,
            ]);
            if($data)
            {
                return redirect()->route('payment.index')->with("success","Berhasil Di Update");
            }
            return redirect()->route('payment.index')->with("error","Gagal Di Update");
        }else{
            $data = Payment::findOrFail($id);
            $data->update([
                'providers' => $request->providers,
                'rekening' => $request->rekening,
            ]);
            if($data)
            {
                return redirect()->route('payment.index')->with("success","Berhasil Di Update");
            }
            return redirect()->route('payment.index')->with("error","Gagal Di Update");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Payment::findOrFail($id);
        if(File::exists($this->path.$data->qrcode))
        {
          File::delete($this->path.$data->qrcode);
        }
        $data->delete();
        return redirect()->back()->with("success","Berhasil Di Hapus");
        
    }
}

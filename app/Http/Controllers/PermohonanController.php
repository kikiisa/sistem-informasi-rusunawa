<?php

namespace App\Http\Controllers;

use App\Models\BerkasUser;
use App\Models\User;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = User::with("berkas")->get();
        
        return view('admin.permohonan.index',compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = BerkasUser::with(["user", "perizinan_file"])->where("id_user", $id)->get();
        return view("admin.permohonan.edit",compact("data"));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = BerkasUser::findOrFail($id);
        
        $data->update([
            "status" => $request->status,
            "keterangan" => $request->keterangan,
        ]);

        if($data)
        {
            return redirect()->back()->with("success", "Data berhasil diupdate");
        }
        return redirect()->back()->with("error", "Data gagal diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

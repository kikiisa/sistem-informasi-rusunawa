<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileOperator extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = Operator::find(Auth::guard('operator')->user()->id);
       
        return view('admin.profile.index',compact("user")); 
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Operator::find($id);
    
        if($request->password != null){
            
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'confirm' => 'required|same:password'
            ],[
                'name.required' => 'Nama wajib diisi !',
                'email.required' => 'Email wajib diisi !',
                'email.email' => 'Email tidak valid !',
                'password.required' => 'Password wajib diisi !',
                'password_confirmation.required' => 'Konfirmasi Password wajib diisi !',
                'password_confirmation.same' => 'Konfirmasi Password tidak sama !'
            ]);
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password), 
            ]);
            return redirect()->back()->with("success", "Data Berhasil Update");
        }else{

            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
            ],[
                'name.required' => 'Nama wajib diisi !',
                'email.required' => 'Email wajib diisi !',
                'email.email' => 'Email tidak valid !',
                'phone.required' => 'No Telepon wajib diisi !',
                
            ]);
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            return redirect()->back()->with("success", "Data Berhasil Update");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class OperatorController extends Controller
{
    public function index()
    {
        $data = Operator::all();
        return view("admin.operator.index",compact("data"));
    }

    public function edit($id)
    {
        $user = Operator::findOrFail($id);
        return view('admin.profile.index',compact("user")); 
    }

    public function destroy($id)
    {
        if(Auth::guard('operator')->user()->id == $id){
            return back()->with("error","Tidak bisa menghapus diri sendiri");
        }
        $data = Operator::find($id);
        $data->delete();
        return back()->with("success","Berhasil Di Hapus");
    }
    public function create()
    {
        return view("admin.operator.create");
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ],[
            'name.required' => 'Nama wajib diisi !',
            'email.required' => 'Email wajib diisi !',
            'email.email' => 'Email tidak valid !',
            'password.required' => 'Password wajib diisi !',
            'role.required' => 'Role wajib diisi !',
        ]);
        Operator::create([
            'uuid' =>Uuid::uuid4()->toString(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password), 
            'role' => $request->role,
        ]);
        return redirect()->route('operator.index')->with("success","Berhasil Di Tambahkan");
    }    

}

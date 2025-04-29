<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.user.index',compact("data"));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
        $user = User::findOrFail($id);
        return view('admin.user.edit',[
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        if($request->password != null){
            
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'status' => 'required',
                'confirm' => 'required|same:password'
            ]);
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password), 
                'status' => $request->status,
            ]);
            return redirect()->route('user.index')->with("success", "Data Berhasil Update");
        }else{

            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'status' => 'required',
                
           
            ]);
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
            ]);
            return redirect()->route('user.index')->with("success", "Data Berhasil Update");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cek = Order::where('user_id',$id)->exists();
        if($cek)
        {
            return redirect()->back()->with('error','User tidak dapat dihapus karena terdapat transaksi');
        }else{
            User::destroy($id);
            return redirect()->back()->with('success','User berhasil dihapus');
        }
    }
}

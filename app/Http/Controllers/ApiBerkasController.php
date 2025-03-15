<?php

namespace App\Http\Controllers;

use App\Models\BerkasUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ApiBerkasController extends Controller
{
    private $path = "data/berkas/";
    
    public function getBerkasByUserAndPerizinan(Request $request)
    {
        $id_user = $request->get("id_user");
        $id_perizinan = $request->get("id_perizinan");
        $data = BerkasUser::with(["user", "perizinan_file"])->where("id_perizinan_file", $id_perizinan)->where("id_user", $id_user)->first();
        
        if($data)
        {
            return response()->json([
                
                "status" => true,
                "data" => $data
            ]);    
        }
        return response()->json([
            "status" => false,
            "data" => null
        ]);
    }   

    public function uploadBerkas(Request $request)
    {
        $id_user = $request->user_id;
        $id_perizinan = $request->id_perizinan;
        $data = BerkasUser::with(["user", "perizinan_file"])->where("id_perizinan_file", $id_perizinan)->where("id_user", $id_user)->first();

        if($data)
        {
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
                return response()->json([
                    "message" =>"upload berhasil",
                    
                ]);
            }else{
                return response()->json([
                    "message" =>"upload gagal",
                    
                ],500);
            }
        }else{
            if($request->hasFile("file"))
            {
                $file = $request->file("file");
                $filename = $file->hashName();
                $file->move($this->path, $filename);
                BerkasUser::create([
                    "id_perizinan_file" => $id_perizinan,
                    "id_user" => $id_user,
                    "berkas" => $filename
                ]);
                return response()->json([
                    "message" =>"upload berhasil",
                ]);
            }else{
                return response()->json([
                    "message" =>"upload gagal",
                ],500);
            }
        }

           
    }
}

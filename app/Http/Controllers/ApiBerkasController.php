<?php

namespace App\Http\Controllers;

use App\Models\BerkasUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ApiBerkasController extends Controller
{
    private $path = "data/berkas/";
    
    public function getUserAllMonth(Request $request)
    {
        $year = now()->year;
        $users = DB::table('users')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = array_fill(0, 12, 0);

        foreach ($users as $user) {
            $index = $user->month - 1; // karena index array mulai dari 0
            $data[$index] = $user->total;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
        
    }

    public function getAllTransaksiMonth(Request $request)
    {
        $year = now()->year;
        $users = DB::table('orders')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = array_fill(0, 12, 0);

        foreach ($users as $user) {
            $index = $user->month - 1; // karena index array mulai dari 0
            $data[$index] = $user->total;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
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

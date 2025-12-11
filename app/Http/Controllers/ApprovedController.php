<?php

namespace App\Http\Controllers;

use App\Models\ApprovedBerkas;
use Illuminate\Http\Request;

class ApprovedController extends Controller
{
    public function status_permohonan($id)
    {
        $data = ApprovedBerkas::find($id);
        if($data->status == "approved"){
            $data->status = "rejected";
        }else{
            $data->status = "approved";
        }
        $data->save();
        if($data)
        {
            return redirect()->back()->with("success", "Data berhasil " . $data->status);
        }else{
            return redirect()->back()->with("error", "Data " . $data->status);
        }
    }
}

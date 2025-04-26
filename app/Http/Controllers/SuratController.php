<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function surat_izin()
    {
        
        return view('template_surat.surat_izin');
    }
}

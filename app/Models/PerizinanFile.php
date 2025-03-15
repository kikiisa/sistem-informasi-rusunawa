<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerizinanFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nama_file',
        'deskripsi',
        
    ];


}

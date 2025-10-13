<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerizinanFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'nama_file',
        'deskripsi',
    ];

    public static function boot()
    {
        parent::boot();
        
    }


}

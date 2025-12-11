<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ApprovedBerkas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'status',
        'keterangan'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_perizinan_file',
        'status',
        'berkas',
        'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"id_user");
    }

    public function perizinan_file()
    {
        return $this->belongsTo(PerizinanFile::class, 'id_perizinan_file');
    }

    




}

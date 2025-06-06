<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ["id"];    

    public function kamar()
    {
        return $this->belongsTo(Kamar::class,"kamar_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}

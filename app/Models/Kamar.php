<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kamar extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kamar) {
            $kamar->uuid = (string) Str::uuid();
        });
    }
}

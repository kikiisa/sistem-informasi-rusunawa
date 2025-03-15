<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthServices
{
    public function register(Array $data)
    {
        return User::create($data);
        
    }

    public function login(Array $data)
    {
        if (Auth::attempt($data)) {
            
            return true;
        }
        return false;
    }

    public function loginOperator(Array $data)
    {
        if (Auth::guard("operator")->attempt($data)) {
            
            return true;
        }
        return false;
    }
}

<?php

namespace App\Business\Admin;

use Illuminate\Support\Facades\Auth;

class AuthenticationService implements AuthenticationServiceInterface
{

    public function login($payload)
    {
        if(Auth::guard('admin')->attempt($payload,null)){
            return true;
        }
        throw \Illuminate\Validation\ValidationException::withMessages([
            'mobile' => 'مشخصات وارد شده صحیح نمیباشد',
        ]);

    }
}

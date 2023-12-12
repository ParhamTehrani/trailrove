<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\AuthenticationServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    private $admin;
    public function __construct(AuthenticationServiceInterface $admin)
    {
        $this->admin = $admin;
    }

    public function loginPage()
    {
        return view('Admin.auth.login');
    }

    public function login(Request $request)
    {
        if ($this->admin->login($request->only('mobile','password'))){
            return redirect('/admin/home');
        }else{
            throw \Illuminate\Validation\ValidationException::withMessages([
                'credential' => "Credentials are not true",
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(url('/'));
    }
}

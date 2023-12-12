<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\UserServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private $user;
    public function __construct(UserServiceInterface $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        if (Gate::allows('user_index')) {
            $users = $this->user->getUserListWithSearch();
            return view('Admin.user.user-info', compact('users'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }
}

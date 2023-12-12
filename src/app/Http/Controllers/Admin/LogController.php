<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\LogServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LogController extends Controller
{
    protected $log;
    public function __construct(LogServiceInterface $log)
    {
        $this->log = $log;
    }

    public function index()
    {
        if (Gate::allows('log_index'))
        {
            $log = $this->log->getLogListWithSearch();
            $admins = $this->log->getAdmins();
            return view('Admin.log.log-info', compact('log','admins'));
        }
        else{
            return redirect(url('/admin/dashboard'))->with('fail','You have not access to this page');
        }
    }


}

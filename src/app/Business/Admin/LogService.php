<?php

namespace App\Business\Admin;



use App\Repository\AdminRepositoryInterface;
use App\Repository\LogRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LogService implements LogServiceInterface
{

    private $log;
    private $admin;
    public function __construct(LogRepositoryInterface $log,AdminRepositoryInterface $admin)
    {
        $this->log = $log;
        $this->admin = $admin;
    }

    public function getLogListWithSearch()
    {
        return $this->log->allLogsWithSearch();
    }

    public function getAdmins()
    {
        return $this->admin->all();
    }
}

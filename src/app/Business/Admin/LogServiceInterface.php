<?php

namespace App\Business\Admin;

interface LogServiceInterface
{
    public function getLogListWithSearch();

    public function getAdmins();
}

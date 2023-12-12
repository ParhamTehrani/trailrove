<?php

namespace App\Business\Admin;

interface AuthenticationServiceInterface
{
    public function login($payload);
}

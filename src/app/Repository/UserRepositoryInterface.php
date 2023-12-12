<?php

namespace App\Repository;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function findUserByEmail($email);
}

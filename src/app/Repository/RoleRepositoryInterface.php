<?php

namespace App\Repository;

interface RoleRepositoryInterface extends BaseRepositoryInterface
{
    public function getRolesWithSearch();
}

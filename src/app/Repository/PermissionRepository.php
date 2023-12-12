<?php

namespace App\Repository;

use App\Models\Permission;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    protected $model;
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}

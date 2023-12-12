<?php

namespace App\Repository;

interface PermissionCategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function allPermissionCategoriesWithSearch();
}

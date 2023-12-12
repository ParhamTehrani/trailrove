<?php

namespace App\Repository;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function getCategoriesWithChildren();

    public function getCategoryListWithSearch();

    public function getParentCategories();

    public function getChildCategories();
}

<?php

namespace App\Business\Admin;

interface CategoryServiceInterface
{
    public function getCategoryListWithSearch();

    public function create($payload);

    public function update($id,$payload);

    public function delete($id);

    public function getParentCategories();
}

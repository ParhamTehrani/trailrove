<?php

namespace App\Business\Admin;

interface RoleServiceInterface
{
    public function getRoleListWithSearch();

    public function create($payload);

    public function update($id,$payload);

    public function delete($id);

    public function getPermissionCategory($relations = []);
}

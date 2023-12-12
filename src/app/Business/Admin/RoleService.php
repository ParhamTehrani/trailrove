<?php

namespace App\Business\Admin;

use App\Repository\AdminRepositoryInterface;
use App\Repository\PermissionCategoryRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RoleService implements RoleServiceInterface
{
    private $role;
    private $permissionCategory;
    public function __construct(RoleRepositoryInterface $role,PermissionCategoryRepositoryInterface $permissionCategory)
    {
        $this->role = $role;
        $this->permissionCategory = $permissionCategory;
    }

    public function getRoleListWithSearch()
    {
        return $this->role->getRolesWithSearch();
    }

    public function create($payload)
    {
        $permissionIds = $payload['permission_id'];
        unset($payload['permission_id']);
        $model = $this->role->create($payload);
        return $model->permissions()->sync($permissionIds);
    }

    public function update($id, $payload)
    {
        $permissionIds = $payload['permission_id'];
        unset($payload['permission_id']);
        $model = $this->role->findById($id);
        $model->permissions()->sync($permissionIds);
        $this->role->update($id,$payload);
    }

    public function delete($id)
    {
        $model = $this->role->findById($id);
        $model->permissions()->detach();
        $this->role->deleteById($id);
    }

    public function getPermissionCategory($relations = [])
    {
        return $this->permissionCategory->all(['*'],$relations);
    }
}

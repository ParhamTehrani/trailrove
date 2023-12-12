<?php

namespace App\Business\Admin;



use App\Repository\AdminRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AdminService implements AdminServiceInterface
{
    private $admin;
    private $role;
    public function __construct(AdminRepositoryInterface $admin,RoleRepositoryInterface $role)
    {
        $this->admin = $admin;
        $this->role = $role;
    }

    public function getAdminListWithSearch()
    {
        return $this->admin->allAdminsWithSearch();
    }

    public function create($payload)
    {
        $payload['password'] = Hash::make($payload['password']);
        $roleIds = $payload['role_id'];
        unset($payload['role_id']);
        $model = $this->admin->create($payload);
        return $model->role()->sync($roleIds);
    }

    public function update($id, $payload)
    {
        if (isset($payload['password'])) {
            $payload['password'] = Hash::make($payload['password']);
        }else{
            unset($payload['password']);
        }
        $roleIds = $payload['role_id'];
        unset($payload['role_id']);
        $this->admin->findById($id)->role()->sync($roleIds);
        return $this->admin->update($id,$payload);
    }

    public function delete($id)
    {
        $this->admin->findById($id)->role()->detach();
        return $this->admin->deleteById($id);
    }
    public function getRoles()
    {
        return $this->role->all();
    }
}

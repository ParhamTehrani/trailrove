<?php

namespace App\Business\Admin;

interface AdminServiceInterface
{
    public function getAdminListWithSearch();

    public function create($payload);

    public function update($id,$payload);

    public function delete($id);

    public function getRoles();
}

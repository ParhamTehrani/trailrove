<?php

namespace App\Business\Admin;

interface UserServiceInterface
{
    public function getUserListWithSearch();

    public function create($payload);

    public function update($id,$payload);

    public function delete($id);
}

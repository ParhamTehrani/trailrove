<?php


namespace App\Business\Admin;


interface MenuServiceInterface
{
    public function getMenus();

    public function storeMenu($payload);

    public function updateMenu($id,$payload);

    public function deleteMenu($id);
}

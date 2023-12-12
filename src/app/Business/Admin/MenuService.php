<?php


namespace App\Business\Admin;



use App\Repository\MenuRepositoryInterface;

class MenuService implements MenuServiceInterface
{
    private $menu;
    public function __construct(MenuRepositoryInterface $menu)
    {
        $this->menu = $menu;
    }

    public function updateMenu($id,$payload)
    {
        return $this->menu->update($id,$payload);
    }

    public function getMenus()
    {
        return $this->menu->getMenusWithSearch();
    }

    public function storeMenu($payload)
    {
        return $this->menu->create($payload);
    }

    public function deleteMenu($id)
    {
        return $this->menu->deleteById($id);
    }
}

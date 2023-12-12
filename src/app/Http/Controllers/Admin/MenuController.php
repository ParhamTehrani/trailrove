<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\MenuServiceInterface;
use App\Business\Admin\PageServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    private $menu;
    private $page;

    public function __construct(MenuServiceInterface $menu, PageServiceInterface $page)
    {
        $this->menu = $menu;
        $this->page = $page;
    }

    public function index()
    {
        if (Gate::allows('menu_index')) {
            $menus = $this->menu->getMenus();
            return view('Admin.menu.menu-info', compact('menus'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }

    public function create()
    {
        if (Gate::allows('menu_create')) {
            $page = $this->page->getPages();
            $menus = $this->menu->getMenus();
            return view('Admin.menu.menu-create', compact('page','menus'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'url' => 'nullable',
            'active' => 'required',
            'page_id' => 'nullable|exists:pages,id',
            'menu_id' => 'nullable|exists:menus,id',
            'sort' => 'required',
        ]);

        $this->menu->storeMenu($validatedData);
        Log::createLog( ' منو ' . $request->title . ' افزوده شد');

        return redirect(url('admin/menu'))->with('success', 'منو با موفقیت افزوده شد');
    }


    public function edit(Menu $menu)
    {

        if (Gate::allows('menu_edit')) {
            $page = $this->page->getPages();
            $menus = $this->menu->getMenus();
            return view('Admin.menu.menu-edit', compact('menu', 'page','menus'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }

    }

    public function update(Request $request, Menu $menu)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'url' => 'nullable',
            'menu_id' => 'nullable|exists:menus,id',
            'active' => 'required',
            'page_id' => 'nullable|exists:pages,id',
            'sort' => 'required',
        ]);
        Cache::forget('api_menu');
        $this->menu->updateMenu($menu->id,$validatedData);
        Log::createLog( ' منو ' . $menu->title . ' ویرایش شد');
        return redirect(url('admin/menu'))->with('success', 'منو با موفقیت ویرایش شد');
    }

    public function destroy(Menu $menu)
    {
        $this->menu->deleteMenu($menu->id);
        return redirect(url('admin/menu'))->with('success', 'منو با موفقیت حذف شد');
    }
}

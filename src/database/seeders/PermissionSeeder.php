<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\PermissionCategory;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissionCategory = [
            'log' => 'لاگ ها',
            'admin' => 'ادمین ها',
            'user' => 'کاربر ها',
            'page' => 'صفحه ها',
            'category' => 'دسته بندی ها',
            'slider' => 'اسلایدر ها',
            'news' => 'خبر ها',
            'menu' => 'منو ها',
//            'gallery' => 'گالری ها',
//            'config' => 'تنظیمات',
            'call_center' => 'ارتباط با مشتری',
        ];
        foreach ($permissionCategory as $key => $value) {
            $this->createPermissionCategory($key, $value);
        }

        $permission = [
            'admin_index' => ['admin', 'مشاهده ادمین ها'],
            'admin_create' => ['admin', 'افزودن ادمین ها'],
            'admin_edit' => ['admin', 'ویرایش ادمین ها'],
            'admin_delete' => ['admin', 'حذف ادمین ها'],
//
//            'gallery_index' => ['gallery', 'مشاهده گالری ها'],
//            'gallery_create' => ['gallery', 'افزودن گالری ها'],
//            'gallery_edit' => ['gallery', 'ویرایش گالری ها'],
//            'gallery_delete' => ['gallery', 'حذف گالری ها'],

            'role_index' => ['admin', 'مشاهده نقش ها'],
            'role_create' => ['admin', 'افزودن نقش ها'],
            'role_edit' => ['admin', 'ویرایش نقش ها'],
            'role_delete' => ['admin', 'حذف نقش ها'],

            'page_index' => ['page', 'مشاهده صفحه ها'],
            'page_edit' => ['page', 'ویرایش صفحه ها'],
            'page_create' => ['page', 'افزودن صفحه ها'],
            'page_delete' => ['page', 'حذف صفحه ها'],


            'menu_index' => ['menu', 'مشاهده منو ها'],
            'menu_create' => ['menu', 'افزودن منو ها'],
            'menu_edit' => ['menu', 'ویرایش منو ها'],
            'menu_delete' => ['menu', 'حذف منو ها'],

            'category_index' => ['category', 'مشاهده دسته بندی'],
            'category_create' => ['category', 'افزودن دسته بندی'],
            'category_edit' => ['category', 'ویرایش دسته بندی'],
            'category_delete' => ['category', 'حذف دسته بندی'],

            'news_index' => ['news', 'مشاهده خبرها'],
            'news_create' => ['news', 'افزودن خبرها'],
            'news_edit' => ['news', 'ویرایش خبرها'],
            'news_delete' => ['news', 'حذف خبرها'],

            'slider_index' => ['slider', 'مشاهده اسلایدرها'],
            'slider_create' => ['slider', 'افزودن اسلایدرها'],
            'slider_edit' => ['slider', 'ویرایش اسلایدرها'],
            'slider_delete' => ['slider', 'حذف اسلایدرها'],

            'user_index' => ['user', 'مشاهده کاربران'],

//            'config_index' => ['config', 'تنظیمات'],

            'log_index' => ['log', 'مشاهده لاگ ها'],
            'call_center_index' => ['call_center', 'ارتباط با مشتریان'],
        ];
        $role = Role::create([
            'name_en' => 'admin',
            'name_fa' => 'ادمین'
        ]);
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->role()->sync($role->id);
        }
        foreach ($permission as $key => $value) {
            $this->createPermission($key, $value);
        }
        $permissions = Permission::all()->pluck('id');
        $role->permissions()->sync($permissions);

    }

    public function createPermission($nameEn, $catAndNameFa)
    {
        $permissionCategoryId = PermissionCategory::where('name_en', $catAndNameFa[0])->first()->id;
        Permission::create([
            'name_en' => $nameEn,
            'name_fa' => $catAndNameFa[1],
            'permission_category_id' => $permissionCategoryId
        ]);
    }

    public function createPermissionCategory($nameEn, $nameFa)
    {
        PermissionCategory::create([
            'name_en' => $nameEn,
            'name_fa' => $nameFa
        ]);
    }

}

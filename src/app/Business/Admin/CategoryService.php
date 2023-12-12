<?php

namespace App\Business\Admin;

use App\Repository\AdminRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\PermissionCategoryRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class CategoryService implements CategoryServiceInterface
{

    protected $category;
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }


    public function getCategoryListWithSearch()
    {
        return $this->category->getCategoryListWithSearch();
    }

    public function create($payload)
    {
        if (@$payload['promote_one']){
            if (@$payload['category_id']){
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'promote_one' => 'فقط دسته بندی های اصلی میتوانند پروموت اصلی شوند.',
                ]);
            }
        }
        if (@$payload['promote_two']){
            if (@$payload['category_id']){
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'promote_two' => 'فقط دسته بندی های اصلی میتوانند پروموت اصلی شوند.',
                ]);
            }
        }
        return $this->category->create($payload);
    }

    public function update($id, $payload)
    {
        if (@$payload['promote_one']){
            if (@$payload['category_id']){
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'promote_one' => 'فقط دسته بندی های اصلی میتوانند پروموت اصلی شوند.',
                ]);
            }
        }
        if (@$payload['promote_two']){
            if (@$payload['category_id']){
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'promote_two' => 'فقط دسته بندی های اصلی میتوانند پروموت اصلی شوند.',
                ]);
            }
        }
        return $this->category->update($id,$payload);
    }

    public function delete($id)
    {
        $model = $this->category->findById($id);
        if ($model->children && count($model->children) > 0){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'child' => 'این دسته بندی دارای زیردسته میباشد',
            ]);
        }elseif($model->news && count($model->news) > 0){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'news' => 'این دسته بندی دارای خبر میباشد',
            ]);
        }else{
            return $this->category->deleteById($id);
        }
    }

    public function getParentCategories()
    {
        return $this->category->getParentCategories();
    }

}

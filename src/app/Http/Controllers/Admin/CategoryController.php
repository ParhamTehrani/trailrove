<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\CategoryServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    protected $category;
    public function __construct(CategoryServiceInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        if (Gate::allows('category_index'))
        {
            $categories = $this->category->getCategoryListWithSearch();
            return view('Admin.category.category-info', compact('categories'));
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function create()
    {
        if (Gate::allows('category_create'))
        {
            $categories = $this->category->getParentCategories();
            return view('Admin.category.category-create',compact('categories'));
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('category_create'))
        {
            $validatedData = $request->validate([
                'category_id' => 'nullable',
                'title' => 'required|unique:categories',
                'priority' => 'required|int',
                'meta_keyword' => 'nullable',
                'meta_description' => 'nullable',
            ]);
            $this->category->create($validatedData);
            Log::createLog( "دسته بندی $request->title اضافه شد");
            return redirect(url('/admin/category'))->with('success','دسته بندی با موفقیت افزوده شد');
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function edit(Category $category)
    {
        if (Gate::allows('category_edit'))
        {
            $categories = $this->category->getParentCategories();
            return view('Admin.category.category-edit', compact('category','categories'));
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function update(Request $request,Category $category)
    {
        if (Gate::allows('category_edit'))
        {
            $validatedData = $request->validate([
                'category_id' => 'nullable',
                'title'=>'nullable|string|unique:categories,title,' . $category->id,
                'priority' => 'required|int',
                'meta_keyword' => 'nullable',
                'meta_description' => 'nullable',
            ]);
            $this->category->update($category->id,$validatedData);
            Log::createLog( "دسته بندی $request->title ویرایش شد");
            return redirect(url('/admin/category'))->with('success','دسته بندی با موفقیت ویرایش شد');
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function destroy(Category $category)
    {
        if (Gate::allows('category_delete'))
        {
            $this->category->delete($category->id);
            Log::createLog( "دسته بندی $category->title حذف شد");
            return redirect(url('/admin/category'))->with('success', 'دسته بندی با موفقیت حذف شد');
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }
}

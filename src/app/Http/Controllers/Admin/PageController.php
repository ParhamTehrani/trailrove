<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\PageServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{

    private $page;

    public function __construct(PageServiceInterface $page)
    {
        $this->page = $page;
    }

    public function index()
    {
        if (Gate::allows('page_index')) {
            $pages = $this->page->getPages();
            return view('Admin.page.page-info', compact('pages'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function create()
    {
        if (Gate::allows('page_create')) {
            return view('Admin.page.page-create');
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'nullable|string|unique:pages',
            'body'=>'nullable|string',
            'meta_description'=>'nullable|string|max:500',
            'meta_keyword'=>'nullable|string|max:500',
            'active'=>'required|bool',
        ]);
        $this->page->storePage($validatedData);
        Log::createLog( ' صفحه' . $request->title . ' افزوده شد');

        return redirect(url('admin/page'))->with('success', 'صفحه با موفقیت افزوده شد');
    }


    public function edit(Page $page)
    {
        if (Gate::allows('page_edit')) {
            return view('Admin.page.page-edit', compact('page'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function update(Request $request, Page $page)
    {
        $validatedData = $request->validate([
            'title'=>'nullable|string|unique:pages,title,' . $page->id,
            'body'=>'nullable|string',
            'meta_description'=>'nullable|string|max:500',
            'meta_keyword'=>'nullable|string|max:500',
            'active'=>'required|bool',
        ]);
        $this->page->updatePage($page->id,$validatedData);
        Log::createLog( ' صفحه ' . $page->title . ' ویرایش شد');
        return redirect(url('admin/page'))->with('success', 'صفحه با موفقیت ویرایش شد');
    }


    public function destroy(Page $page)
    {
        $this->page->deletePage($page->id);
        Log::createLog( ' صفحه ' . $page->title . ' حذف شد');
        return redirect(url('admin/page'))->with('success', 'صفحه با موفقیت حذف شد');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\NewsServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    protected $news;
    public function __construct(NewsServiceInterface $news)
    {
        $this->news = $news;
    }

    public function index()
    {
        if (Gate::allows('news_index'))
        {
            $news = $this->news->getNews();
            return view('Admin.news.news-info', compact('news'));
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function create()
    {
        if (Gate::allows('news_create'))
        {
            $categories = $this->news->getChildCategories();
            $tags = Tag::all();
            return view('Admin.news.news-create',compact('categories','tags'));
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function store(Request $request)
    {
        if (Gate::allows('news_create'))
        {
            $validatedData = $request->validate([
                'category_id' => 'required',
                'title' => 'required|unique:news',
                'canonical' => 'nullable',
                'thumbnail' => 'nullable',
                'short_description' => 'nullable',
                'meta_keyword' => 'nullable',
                'meta_description' => 'nullable',
                'body' => 'required',
                'status' => 'required|in:publish,draft',
                'trending' => 'required|bool',
                'faq1' => 'nullable',
                'faq1Ans' => 'nullable',
                'faq2' => 'nullable',
                'faq2Ans' => 'nullable',
                'faq3' => 'nullable',
                'faq3Ans' => 'nullable',
                'faq4' => 'nullable',
                'faq4Ans' => 'nullable',
                'tags' => 'nullable|array'
            ]);
            $this->news->storeNews($validatedData);
            Log::createLog( "خبر $request->title اضافه شد");
            return redirect(url('/admin/news'))->with('success','خبر با موفقیت افزوده شد');
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function edit(News $news)
    {
        if (Gate::allows('news_edit'))
        {
            $categories = $this->news->getChildCategories();
            $tags = Tag::all();
            return view('Admin.news.news-edit', compact('news','categories','tags'));
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function update(Request $request,News $news)
    {
        if (Gate::allows('news_edit'))
        {
            $validatedData = $request->validate([
                'category_id' => 'required',
                'title'=>'nullable|string|unique:news,title,' . $news->id,
                'canonical' => 'nullable',
                'thumbnail' => 'nullable',
                'short_description' => 'nullable',
                'meta_keyword' => 'nullable',
                'meta_description' => 'nullable',
                'body' => 'required',
                'status' => 'required|in:publish,draft',
                'faq1' => 'nullable',
                'faq1Ans' => 'nullable',
                'faq2' => 'nullable',
                'faq2Ans' => 'nullable',
                'faq3' => 'nullable',
                'faq3Ans' => 'nullable',
                'faq4' => 'nullable',
                'faq4Ans' => 'nullable',
                'tags' => 'nullable|array'
            ]);
            $this->news->updateNews($news->id,$validatedData);
            Log::createLog( "خبر $request->title ویرایش شد");
            return redirect(url('/admin/news'))->with('success','خبر با موفقیت ویرایش شد');
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function destroy(News $news)
    {
        if (Gate::allows('news_delete'))
        {
            $this->news->deleteNews($news->id);
            Log::createLog( "خبر $news->title حذف شد");
            return redirect(url('/admin/news'))->with('success', 'خبر با موفقیت حذف شد');
        }
        else{
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }
}

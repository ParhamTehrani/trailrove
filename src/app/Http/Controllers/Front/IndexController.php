<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Page;
use App\Models\Slider;
use App\Models\User;
use App\Repository\CategoryRepository;
use App\Repository\NewsRepository;
use App\Repository\SliderRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {

        $sliders = (new SliderRepository(new Slider()))->getActive();
        $recentNews = (new NewsRepository(new News()))->getLatestPublish(7);
        $categories = (new CategoryRepository(new Category()))->getParentCategories();
        return view('front.home',compact('recentNews','sliders','categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->has('childNews')->with('children')->firstOrFail();
        $ids = [];
        $ids[] = $category->id;
        $ids[] = $category->children->pluck('id')->toArray();
        $newsList = News::where('status','publish')->whereIn('category_id',$ids)->paginate(12);
        return view('front.list',compact('category','newsList'));
    }

    public function article($slug)
    {
        $article = News::where('slug',$slug)->where('status','publish')->with('tag','faqable','publishComment')->firstOrFail();
        $similarArticles = News::where('status','publish')->where('id','!=',$article->id)->where('category_id',$article->category_id)->take(3)->get();
        return view('front.single',compact('article','similarArticles'));
    }

    public function articles()
    {
        $articles = News::where('status','publish')->with('tag','faqable','publishComment')->latest()->paginate(12);
        return view('front.list-article',compact('articles'));
    }


    public function page($slug)
    {
        $page = Page::where('slug',$slug)->where('active','1')->firstOrFail();
        return view('front.single-page',compact('page'));
    }

    public function comment(Request $request,$id)
    {
        $validatedData = $request->validate([
            "comment" => "required",
            "author" => "required",
            "email" => "required|email",
            "url" => 'nullable'
        ]);

        $news = News::findOrFail($id);
        $news->comment()->create([
            'full_name' => $validatedData['author'],
            'url' => $validatedData['url'],
            'email' => $validatedData['email'],
            'message' => $validatedData['comment'],
        ]);
        return redirect()->back()->with('success-comment','Your comment will appear when it is accepted.');
    }

    public function search(Request $request)
    {
        $validateData = $request->validate([
            'q' => 'required'
        ]);

        $q = $validateData['q'];

        $news = News::where('status','publish')->where('title','like','%'. $q .'%')->get();
        $page = Page::where('active',1)->where('title','like','%'. $q .'%')->get();


        return view('front.search',compact('news','page','q'));
    }

    public function subscription(Request $request)
    {
        $request->validate([
            'email' => 'email'
        ]);

        User::firstOrCreate([
            'email'  => $request->email
        ]);

        return redirect()->back()->with('success-rss','Your Email added to our subscription list successfully');
    }
}

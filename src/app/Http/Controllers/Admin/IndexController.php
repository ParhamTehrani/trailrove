<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Service\Admin\IndexServiceInterface;
use App\Models\Category;
use App\Models\Config;
use App\Models\ContactUs;
use App\Models\File;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index()
    {
        return view('Admin.index.index');
    }
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $filename=time()."-".Str::random(8).'.'.$file->getClientOriginalExtension();
        $path = '/upload/Admin/editor' . '/' . $filename;
        $imgpath = $file->move(public_path('upload/Admin/editor'), $filename);
        return json_encode(['location' => $path]);
    }

    public function home()
    {
        $data = Cache::get('home_page');
        if ($data && request()->get('cache') != 'clear'){
            return view('front.home',$data);
        }else{
            $magCat = Category::where('category_id',11)->get()->pluck('id');
            $featuredNews = News::with('category')->whereIn('category_id',$magCat)->take(10)->latest()->get();
            $promoteMainOne = Category::where('promote_one',true)->with('children.news.category')->first();
            $promoteMainTwo = Category::where('promote_two',true)->with('children.news.category')->first();
            $promoteColumnOne = Category::where('column_one',true)->with('children.news.category')->first();
            $promoteColumnTwo = Category::where('column_two',true)->with('children.news.category')->first();
            $latestNews = News::where('status','publish')->take(5)->latest()->get();
            $popularNews = News::where('status','publish')->take(5)->orderBy('seen','desc')->get();
            $categoriesWithPosts = Category::whereNotNull('category_id')->withCount('news')->get();
            $sliders = Slider::where('active',true)->with('news')->get()->groupBy('position');
            $gallery = Gallery::where('active',true)->get();
            $config = Config::first();

            $data = [
                'featuredNews' =>$featuredNews,
                'promoteMainOne' =>$promoteMainOne,
                'promoteMainTwo' =>$promoteMainTwo,
                'promoteColumnOne' =>$promoteColumnOne,
                'promoteColumnTwo' =>$promoteColumnTwo,
                'latestNews' =>$latestNews,
                'popularNews' =>$popularNews,
                'categoriesWithPosts' => $categoriesWithPosts,
                'sliders' => $sliders,
                'gallery' => $gallery,
                'config' => $config
            ];
            Cache::put('home_page',$data);
            return view('front.home',$data);
        }

    }

    public function rss(Request $request)
    {
        $request->validate([
            'email' => 'email'
        ]);

        User::firstOrCreate([
            'email'  => $request->email
        ]);

        return redirect()->back()->with('success-rss','با تشکر. ایمیل شما در خبرنامه ثبت شد.');
    }

    public function searchAuto(Request $request)
    {
        $news = News::where('status','publish')
            ->where(function ($q) use ($request){
                $q->where('title','like','%'.$request->q.'%')
                    ->orwhere('short_description','like','%'.$request->q.'%')
                    ->orwhere('meta_description','like','%'.$request->q.'%')
                    ->orwhere('meta_keyword','like','%'.$request->q.'%');
            })
            ->take(10)
            ->get(['id','thumbnail','title','slug','created_at']);

        return response()->json($news);
    }

    public function category(Request $request,$slug)
    {
        $list = Category::where('slug',$slug)->with('news','childNews')->firstOrFail();
        $news = collect(array_merge($list->toArray()['news'],$list->toArray()['child_news']))->paginate(10);
        $config = Config::first();
        $latestNews = News::where('status','publish')->take(5)->latest()->get();
        $popularNews = News::where('status','publish')->take(5)->orderBy('seen','desc')->get();
        return view('front.list',compact('list','config','latestNews','popularNews','news'));
    }

    public function search(Request $request)
    {
        $news = News::where('status','publish')
            ->where(function ($q) use ($request){
                $q->where('title','like','%'.$request->q.'%')
                    ->orwhere('short_description','like','%'.$request->q.'%')
                    ->orwhere('meta_description','like','%'.$request->q.'%')
                    ->orwhere('meta_keyword','like','%'.$request->q.'%');
            })
            ->paginate(10);
        $list = ([
            'title' => "جستجو: $request->q"
        ]);

        $config = Config::first();
        $latestNews = News::where('status','publish')->take(5)->latest()->get();
        $popularNews = News::where('status','publish')->take(5)->orderBy('seen','desc')->get();
        return view('front.list',compact('list','config','latestNews','popularNews','news'));
    }

    public function tag($id)
    {
        $list = Tag::where('id',$id)->firstOrFail();
        $news = $list->news()->paginate(10);
        $title = $list->title;
        $config = Config::first();
        $latestNews = News::where('status','publish')->take(5)->latest()->get();
        $popularNews = News::where('status','publish')->take(5)->orderBy('seen','desc')->get();
        return view('front.list',compact('title','list','config','latestNews','popularNews','news'));
    }

    public function news($slug)
    {
        $news = News::where('slug',$slug)->with('faqable')->where('status','publish')->firstOrFail();
        $news->increment('seen');
        $config = Config::first();
        $latestNews = News::where('status','publish')->take(5)->latest()->get();
        $popularNews = News::where('status','publish')->take(5)->orderBy('seen','desc')->get();
        return view('front.single-news',compact('config','latestNews','popularNews','news'));
    }

    public function gallery($slug)
    {
        $gallery = Gallery::where('slug',$slug)->where('active',true)->firstOrFail();
        $config = Config::first();
        $latestNews = News::where('status','publish')->take(5)->latest()->get();
        $popularNews = News::where('status','publish')->take(5)->orderBy('seen','desc')->get();
        return view('front.single-gallery',compact('config','latestNews','popularNews','gallery'));
    }

    public function comment($id,Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'url' => 'nullable',
            'email' => 'nullable',
            'message' => 'required',
        ]);
        if (!$request['g-recaptcha-response']){
            Session::flash('failMessage','لطفا من ربات نیستم را تیک بزنید.');
            return redirect()->back();
        }
        $news = News::findOrFail($id);
        $news->comment()->create($validatedData);
        return redirect()->back()->with('success-comment','با تشکر. نظر شما ثبت و پس از تایید نمایش داده میشود.');;
    }

    public function contactUsShow()
    {
        return view('front.contact-us');
    }

    public function contactUs(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'nullable',
            'last_name' => 'nullable',
            'email'     => 'nullable|email',
            'message'   => 'required'
        ]);
        ContactUs::create($validatedData);
        return redirect()->back();
    }

    public function page($slug)
    {
        $page = Page::where('slug',$slug)->where('active',1)->firstOrFail();
        $config = Config::first();
        $latestNews = News::where('status','publish')->take(5)->latest()->get();
        $popularNews = News::where('status','publish')->take(5)->orderBy('seen','desc')->get();
        return view('front.single-page',compact('config','page','latestNews','popularNews'));
    }
}

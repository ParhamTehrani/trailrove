<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\SliderServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\News;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SliderController extends Controller
{
    private $slider;
    public function __construct(SliderServiceInterface $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        if (Gate::allows('slider_index')) {
            $sliders = $this->slider->getSliders();
            return view('Admin.slider.slider-info', compact('sliders'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function create()
    {
        if (Gate::allows('slider_create')) {
            $news = News::all();
            return view('Admin.slider.slider-create',compact('news'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|string',
            'src'=>'nullable',
            'url' => 'nullable',
            'active'=>'required|bool',
        ]);
        $this->slider->storeSlider($validatedData);
        Log::createLog( ' اسلایدر ' . $request->title . ' افزوده شد');

        return redirect(url('admin/slider'))->with('success', 'اسلایدر  با موفقیت افزوده شد');
    }


    public function edit(Slider $slider)
    {
        if (Gate::allows('slider_edit')) {
            $news = News::all();
            return view('Admin.slider.slider-edit', compact('slider','news'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function update(Request $request, Slider $slider)
    {
        $validatedData = $request->validate([
            'title'=>'required|string',
            'url' => 'nullable',
            'src'=>'nullable',
            'active'=>'required|bool',
        ]);
        $this->slider->updateSlider($slider->id,$validatedData);
        Log::createLog( ' اسلایدر  ' . $slider->title . ' ویرایش شد');
        return redirect(url('admin/slider'))->with('success', 'اسلایدر  با موفقیت ویرایش شد');
    }


    public function destroy(Slider $slider)
    {
        $this->slider->deleteSlider($slider->id);
        Log::createLog( ' اسلایدر  ' . $slider->title . ' حذف شد');
        return redirect(url('admin/slider'))->with('success', 'اسلایدر  با موفقیت حذف شد');
    }
}

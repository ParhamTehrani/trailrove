<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\GalleryServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GalleryController extends Controller
{
    private $gallery;
    public function __construct(GalleryServiceInterface $gallery)
    {
        $this->gallery = $gallery;
    }

    public function index()
    {
        if (Gate::allows('gallery_index')) {
            $gallery = $this->gallery->getGallery();
            return view('Admin.gallery.gallery-info', compact('gallery'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function create()
    {
        if (Gate::allows('gallery_create')) {
            return view('Admin.gallery.gallery-create');
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'iframe'=>'required',
            'body'=>'nullable',
            'src'=>'nullable',
            'meta_description'=>'nullable|max:500',
            'meta_keyword'=>'nullable|max:500',
            'short_description'=>'nullable|max:500',
            'active'=>'required|bool',
        ]);
        $this->gallery->storeGallery($validatedData);
        Log::createLog( ' گالری' . $request->title . ' افزوده شد');

        return redirect(url('admin/gallery'))->with('success', 'گالری با موفقیت افزوده شد');
    }


    public function edit(Gallery $gallery)
    {
        if (Gate::allows('gallery_edit')) {
            return view('Admin.gallery.gallery-edit', compact('gallery'));
        } else {
            return redirect(url('/admin/home'))->with('fail', 'شما به این قسمت دسترسی ندارید');
        }
    }


    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'iframe'=>'required',
            'src'=>'nullable',
            'body'=>'nullable',
            'meta_description'=>'nullable|max:500',
            'meta_keyword'=>'nullable|max:500',
            'short_description'=>'nullable|max:500',
            'active'=>'required|bool',
        ]);
        $this->gallery->updateGallery($gallery->id,$validatedData);
        Log::createLog( ' گالری ' . $gallery->title . ' ویرایش شد');
        return redirect(url('admin/gallery'))->with('success', 'گالری با موفقیت ویرایش شد');
    }


    public function destroy(Gallery $gallery)
    {
        $this->gallery->deleteGallery($gallery->id);
        Log::createLog( ' گالری ' . $gallery->title . ' حذف شد');
        return redirect(url('admin/gallery'))->with('success', 'گالری با موفقیت حذف شد');
    }
}

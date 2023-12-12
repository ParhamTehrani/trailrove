@extends('layouts.admin')
@section('title')
    ویرایش اسلایدر
@endsection
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">ویرایش اسلایدر</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30"  action="/admin/slider/{{$slider->id}}update" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title',$slider->title) }}" id="title" aria-describedby="title" placeholder="عنوان">
                                    @if($errors->has('title'))
                                        <span>{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="url">لینک</label>
                                    <input type="text" class="form-control" name="url" value="{{ old('url',$slider->url) }}" id="url" aria-describedby="url" placeholder="لینک">
                                    @if($errors->has('url'))
                                        <span>{{ $errors->first('url') }}</span>
                                    @endif
                                </div>






                                <div class="form-group">
                                    <p>سایز عکس  : 1200 در 300</p>
                                    <label for="src">عکس</label>
                                    <input type="file" class="form-control" name="src" value="" id="src" aria-describedby="src" placeholder="عکس ">
                                    @if($errors->has('src'))
                                        <span>{{ $errors->first('src') }}</span>
                                    @endif
                                    @if(file_exists(public_path($slider['src'])) && $slider['src'])
                                        <img src="{{($slider['src'])}}" alt="" width="auto" height="300">
                                    @endif
                                </div>


                                <div class="form-group row p-t-20">
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="active" value="1" @if($slider->active == 1 ) checked @endif  class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">فعال</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="active" value="0" @if($slider->active == 0 ) checked @endif class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">غیرفعال</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">ذخیره</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


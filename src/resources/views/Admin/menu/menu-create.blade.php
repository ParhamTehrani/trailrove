@extends('layouts.admin')
@section('title')
    افزودن منو
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
                            <h4 class="card-title">افزود منو</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/menu" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control"  name="title" value="{{ old('title') }}" id="title" aria-describedby="title" placeholder="عنوان">
                                    @if($errors->has('title'))
                                        <span>{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="url">لینک</label>
                                    <input type="text" class="form-control" name="url" value="{{ old('url') }}" id="url" aria-describedby="url" placeholder="لینک">
                                    @if($errors->has('url'))
                                        <span>{{ $errors->first('url') }}</span>
                                    @endif
                                </div>


{{--                                <div class="form-group">--}}
{{--                                    <label>صفحات</label>--}}
{{--                                    <select class="form-control custom-select" name="page_id">--}}
{{--                                        <option value="" disabled selected>انتخاب</option>--}}
{{--                                        @foreach($page as $item)--}}
{{--                                            <option value="{{ $item->id }}">{{ $item->title }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @if($errors->has('page_id'))--}}
{{--                                        <span>{{ $errors->first('page_id') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label for="sort">اولویت</label>
                                    <input type="number" class="form-control"  name="sort" value="{{ old('sort') }}" id="sort" aria-describedby="sort" placeholder="ترتیب">
                                    @if($errors->has('sort'))
                                        <span>{{ $errors->first('sort') }}</span>
                                    @endif
                                </div>
                                <div class="form-group row p-t-20">
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="active" value="1" checked  class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">فعال</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="active" value="0"   class="custom-control-input">
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


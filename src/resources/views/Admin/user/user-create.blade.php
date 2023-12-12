@extends('layouts.admin')
@section('title')
    افزودن کاربر
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">افزودن کاربر</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/users" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="full_name"> نام و نام خانوادگی</label>
                                    <input type="text" class="form-control" required name="full_name" value="{{ old('full_name') }}" id="full_name" placeholder="نام و نام خانوادگی">
                                    @if($errors->has('full_name'))
                                        <span>{{ $errors->first('full_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mobile">موبایل</label>
                                    <input type="text" class="form-control" required name="mobile" value="{{ old('mobile') }}" id="mobile" placeholder="موبایل">
                                    @if($errors->has('mobile'))
                                        <span>{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">تلفن</label>
                                    <input type="text" class="form-control" required name="phone" value="{{ old('phone') }}" id="phone" placeholder="تلفن">
                                    @if($errors->has('phone'))
                                        <span>{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="address">آدرس</label>
                                    <input type="text" class="form-control" required name="address" value="{{ old('address') }}" id="address" placeholder="آدرس">
                                    @if($errors->has('address'))
                                        <span>{{ $errors->first('address') }}</span>
                                    @endif
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

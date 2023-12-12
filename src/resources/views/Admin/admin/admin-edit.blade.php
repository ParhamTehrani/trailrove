@extends('layouts.admin')
@section('title')
    ویرایش کارمند
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
                            <h4 class="card-title">ویرایش {{ $admin->username }}</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/admins/{{$admin->id}}update" method="post">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="full_name">نام کاربری</label>
                                    <input type="text" class="form-control" required name="full_name" value="{{ old('full_name',$admin->full_name) }}" id="full_name" aria-describedby="full_name" placeholder="نام کاربری">
                                    @if($errors->has('full_name'))
                                        <span>{{ $errors->first('full_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mobile">شماره موبایل</label>
                                    <input type="text" class="form-control" required name="mobile" value="{{ old('mobile',$admin->mobile) }}" id="mobile" aria-describedby="mobile" placeholder="موبایل">
                                    @if($errors->has('mobile'))
                                        <span>{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">رمز عبور</label>
                                    <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="رمزعبور">
                                    @if($errors->has('password'))
                                        <span>{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>نقش</label>
                                    <select class="form-control custom-select" name="role_id" required>
                                        @foreach($role as $item)
                                        <option value="{{$item->id}}" @if($admin->role[0]->id == $item->id) selected @endif>{{ $item->name_fa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row p-t-20">
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="active" value="1" @if($admin->active == 1) checked @endif class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">فعال</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="active" value="0" @if($admin->active == 0) checked @endif  class="custom-control-input">
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


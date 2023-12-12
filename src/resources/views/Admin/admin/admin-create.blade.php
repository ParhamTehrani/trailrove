@extends('layouts.admin')
@section('title')
    افزودن کارمند
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
                            <h4 class="card-title">افزود کارمند</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/admins" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="full_name">نام کاربری</label>
                                    <input type="text" class="form-control" required name="full_name" value="{{ old('full_name') }}" id="full_name" aria-describedby="full_name" placeholder="نام کاربری">
                                    @if($errors->has('full_name'))
                                        <span>{{ $errors->first('full_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="mobile">شماره موبایل</label>
                                    <input type="text" class="form-control" required name="mobile" value="{{ old('mobile') }}" id="mobile" aria-describedby="mobile" placeholder="موبایل">
                                    @if($errors->has('mobile'))
                                        <span>{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">رمز عبور</label>
                                    <input type="password" class="form-control" required name="password" id="password" aria-describedby="password" placeholder="رمزعبور">
                                    @if($errors->has('password'))
                                        <span>{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>نقش</label>
                                    <select class="form-control custom-select" name="role_id" required>
                                        <option value="" selected disabled> انتخاب نقش</option>
                                        @foreach($role as $item)
                                        <option value="{{$item->id}}">{{ $item->name_fa }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('role_id'))
                                        <span>{{ $errors->first('role_id') }}</span>
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


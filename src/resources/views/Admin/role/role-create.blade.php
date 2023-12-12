@extends('layouts.admin')
@section('title')
    افزودن نقش
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
                            <h4 class="card-title">افزود نقش</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/role" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name_fa">نام فارسی</label>
                                    <input type="text" class="form-control" required name="name_fa" value="{{ old('name_fa') }}" id="name_fa" aria-describedby="name_fa" placeholder="نام فارسی">
                                    @if($errors->has('name_fa'))
                                        <span>{{ $errors->first('name_fa') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name_en">نام انگلیسی</label>
                                    <input type="text" class="form-control" required name="name_en" value="{{ old('name_en') }}" id="name_en" aria-describedby="name_en" placeholder="نام انگلیسی">
                                    @if($errors->has('name_en'))
                                        <span>{{ $errors->first('name_en') }}</span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">دسترسی ها</h4>
                                                <div class="row">
                                                    @foreach($permissionCategory as $value)
                                                        <div class="col-4">
                                                            <p>{{ $value->name_fa }}</p>
                                                        @foreach($value->permission as $item)
                                                        <div class="col-md-6">
                                                            <fieldset class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="permission_id[]" value="{{ $item->id }}" style="margin-left: 8px">{{ $item ->name_fa }}
                                                                </label>
                                                            </fieldset>
                                                        </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
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


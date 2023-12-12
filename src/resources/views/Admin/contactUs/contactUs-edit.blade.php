@extends('layouts.admin')
@section('title')
    مشاهده پیام تماس با ما
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
                            <h4 class="card-title">مشاهده پیام تماس با ما</h4>
                            <div class="form-group">
                                <label for="title">نام</label>
                                <p>{{ $contactUs->first_name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="title">نام خانوادگی</label>
                                <p>{{ $contactUs->last_name }}</p>
                            </div>
                            <div class="form-group">
                                <label for="title">ایمیل</label>
                                <p>{{ $contactUs->email }}</p>
                            </div>
                            <div class="form-group">
                                <label for="title">متن پیام</label>
                                <p>{{ $contactUs->message }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


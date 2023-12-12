@extends('layouts.admin')
@section('title')
    داشبورد
@endsection
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            @include('Admin.index.messages')

            <div class="row">
{{--                <div class="col-sm-6">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <div class="card text-center">--}}
{{--                            <div class="card-body">--}}
{{--                                <h4>آخرین کاربران</h4>--}}
{{--                                <table class="table table-hover">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th class="border-top-0">نام</th>--}}
{{--                                        <th class="border-top-0">نام خوانوادگی</th>--}}
{{--                                        <th class="border-top-0">ایمیل</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach ($users as $item)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ $item->first_name }}</td>--}}
{{--                                            <td> {{ @$item->last_name }}</td>--}}
{{--                                            <td> {{ @$item->email }}</td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <form action="/admin/user">--}}
{{--                                    <button type="submit" class="btn btn-outline-primary btn-block">--}}
{{--                                        لیست کاربران--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

        </div>
    </div>
@endsection

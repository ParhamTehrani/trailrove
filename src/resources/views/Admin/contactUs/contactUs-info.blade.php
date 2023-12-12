@extends('layouts.admin')
@section('title')
    لیست تماس با ما
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
            <!-- File export -->
            @include('Admin.index.messages')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">لیست تماس با ما</h4>
                            <div class="table-responsive">
                                <div id="file_export_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <table id="file_export" class="table table-striped table-bordered display dataTable"
                                           role="grid" aria-describedby="file_export_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 0px;">نام
                                            </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="file_export"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                aria-sort="descending" style="width: 0px;">نام خانوادگی
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 0px;">ایمیل
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 0px;">متن پیام
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 0px;">وضعیت
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 0px;">زمان
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 0px;">مشاهده
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @if(isset($contactUs))
                                            @foreach($contactUs as $item)
                                                <tr role="row" class=" @if($i%2==0) even @else odd @endif">
                                                    <td class="">{{ $item['first_name'] }}</td>
                                                    <td class="">{{ $item['last_name'] }}</td>
                                                    <td >{{ $item['email'] }}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($item['message'],100,'...') }}</td>
                                                    <td>
                                                        @if($item->seen)
                                                            دیده شده
                                                        @else
                                                            دیده نشده
                                                        @endif
                                                    </td>
                                                    <td class="sorting_1">{{ \App\Helper\JDate::jdate($item->created_at) }}</td>
                                                    <td><a href="/admin/contact-us/{{ $item['id'] }}/edit" class="btn btn-primary"> مشاهده </a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">نام</th>
                                            <th rowspan="1" colspan="1">نام خانوادگی</th>
                                            <th rowspan="1" colspan="1">ایمیل</th>
                                            <th rowspan="1" colspan="1">متن پیام</th>
                                            <th rowspan="1" colspan="1">وضعیت</th>
                                            <th rowspan="1" colspan="1">زمان</th>
                                            <th rowspan="1" colspan="1">مشاهده </th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    {{ $contactUs->appends($_GET)->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="/admin/js/dataTables.buttons.min.js"></script>
    <script src="/admin/js/buttons.flash.min.js"></script>
    <script src="/admin/js/jszip.min.js"></script>
    <script src="/admin/js/pdfmake.min.js"></script>
    <script src="/admin/js/vfs_fonts.js"></script>
    <script src="/admin/js/buttons.html5.min.js"></script>
    <script src="/admin/js/buttons.print.min.js"></script>
    <script src="/admin/dist/js/pages/datatable/datatable-advanced.init.js"></script>
@endsection
@section('style')
    <link href="/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <style>
        div#file_export_paginate{
            display: none;
        }
    </style>
@endsection

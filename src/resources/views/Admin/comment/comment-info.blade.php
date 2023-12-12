@extends('layouts.admin')
@section('title')
    کامنت ها
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            @include('Admin.index.messages')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">لیست کامنت ها</h4>
                            <div class="table-responsive col-sm-12">
                                <div id="file_export_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <table id="file_export" class="table table-striped table-bordered display dataTable"
                                           role="grid" aria-describedby="file_export_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 0px;"> مرتبط با خبر
                                            </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="file_export"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                aria-sort="descending" style="width: 0px;">کامنت
                                            </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="file_export"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                aria-sort="descending" style="width: 0px;">کامنت گذار
                                            </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="file_export"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                aria-sort="descending" style="width: 0px;"> وضعیت
                                            </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="file_export"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                aria-sort="descending" style="width: 0px;"> تاریخ
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @if(isset($comments))
                                            @foreach($comments as $item)
                                                <tr role="row" class=" @if($i%2==0) even @else odd @endif">
                                                    <td class="sorting_1">
                                                        <a href="/news/{{ $item->commentable->title }}">{{ $item->commentable->title }}</a>
                                                    </td>
                                                    <td class="sorting_1">
                                                        {!! $item->message !!}
                                                    </td>
                                                    <td class="sorting_1">
                                                        @if($item->admin_id)
                                                        ادمین : {{ $item->admin->full_name }}
                                                        @else
                                                            <p>ایمیل: {{ $item->email }}</p>
                                                            <p>نام: {{ $item->full_name }}</p>
                                                            <p>آدرس: {{ $item->url }}</p>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @switch($item->status)
                                                            @case('pending')
                                                            <span class="status badge badge-warning" style="cursor: pointer"
                                                                  data-id="{{ $item->id }}">بررسی نشده</span>
                                                            @break
                                                            @case('accepted')
                                                            <span class="status badge badge-success" style="cursor: pointer"
                                                                  data-id="{{ $item->id }}">تایید شده</span>
                                                            @break
                                                            @case('rejected')
                                                            <span class="status badge badge-danger" style="cursor: pointer"
                                                                  data-id="{{ $item->id }}">رد شده</span>
                                                            @break
                                                        @endswitch
                                                    </td>
                                                    <td>{{ $item->created_at ? \App\Helper\JDate::jdate($item->created_at) : '-' }}</td>

                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">مرتبط با خبر</th>
                                            <th rowspan="1" colspan="1">کامنت</th>
                                            <th rowspan="1" colspan="1">کامنت گذار</th>
                                            <th rowspan="1" colspan="1">وضعیت</th>
                                            <th rowspan="1" colspan="1">تاریخ</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    {{ $comments->appends($_GET)->links('pagination::bootstrap-4') }}
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
    <script>
        $(document).ready(function () {
            $(".status").click(function () {
                var id = $(this).attr('data-id');
                var _this = $(this);
                $.ajax({
                    url: '/admin/comment/change-status',
                    type: "POST",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (Res) {
                        if (Res.status) {
                            _this.removeClass('badge-warning');
                            _this.removeClass('badge-danger');
                            _this.addClass('badge-success');
                        } else {
                            _this.addClass('badge-warning');
                            _this.addClass('badge-danger');
                            _this.removeClass('badge-success');
                        }
                        _this.html(Res.text)
                    },
                })
            });
        });

    </script>
@endsection
@section('style')
    <link href="/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <style>
        div#file_export_paginate{
            display: none;
        }
    </style>
@endsection

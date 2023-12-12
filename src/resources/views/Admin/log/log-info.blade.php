@extends('layouts.admin')
@section('title')
    لاگ کاربران
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
                            <h4 class="card-title">لیست لاگ ها</h4>

                            <form action="/admin/log">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>توضیحات</span>
                                            <input type="text" name="description" value="{{ Request::input('description') }}"
                                                   style="margin-top: 10px" class="form-control"
                                                   placeholder="توضیحات">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>انتخاب ادمین</span>
                                            <select name="admin_id" id="" class="form-control" style="margin-top: 10px">
                                                <option value="">انتخاب کنید</option>
                                                @foreach($admins as $admin)
                                                    <option value="{{$admin->id}}" @if(Request::input('admin_id') == $admin->id) selected @endif>{{ $admin->full_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info"><i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <div id="file_export_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <table id="file_export" class="table table-striped table-bordered display dataTable"
                                           role="grid" aria-describedby="file_export_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 0px;">توضیحات
                                            </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="file_export"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                aria-sort="descending" style="width: 0px;">نام کاربر
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 0px;">زمان
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @if(isset($log))
                                            @foreach($log as $item)
                                                <tr role="row" class=" @if($i%2==0) even @else odd @endif">
                                                    <td class="">{{ $item['description'] }}</td>
                                                    <td class="sorting_1">{{ $item->admin->full_name }}</td>
                                                    <td>{{ \App\Helper\JDate::jdate($item->created_at) }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">توضیحات</th>
                                            <th rowspan="1" colspan="1">نام کاربر</th>
                                            <th rowspan="1" colspan="1">زمان</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    {{ $log->appends($_GET)->links('pagination::bootstrap-4') }}

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
    <script>
        jQuery(document).ready(function($) {

            // Remove empty fields from GET forms
            // Author: Bill Erickson
            // URL: http://www.billerickson.net/code/hide-empty-fields-get-form/

            // Change 'form' to class or ID of your specific form
            $("form").submit(function () {
                $(this).find(":input").filter(function () {
                    return !this.value;
                }).attr("disabled", "disabled");
                return true; // ensure form still submits
            });

            // Un-disable form fields when page loads, in case they click back after submission
            $("form").find(":input").prop("disabled", false);
        })
    </script>
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

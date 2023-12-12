@extends('layouts.admin')
@section('title')
    کاربران
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
                            <h4 class="card-title">لیست کاربران </h4>
                            <form action="/admin/user">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>ایمیل</span>
                                            <input type="text" name="email" value="{{ Request::input('email') }}"
                                                   style="margin-top: 10px" class="form-control"
                                                   placeholder="ایمیل">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>موبایل</span>
                                            <input type="text" name="mobile" value="{{ Request::input('mobile') }}"
                                                   style="margin-top: 10px" class="form-control"
                                                   placeholder="email">
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

                            <div class="table-responsive col-12">
                                <div id="file_export_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <table id="file_export" class="table table-striped table-bordered display dataTable"
                                           role="grid" aria-describedby="file_export_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 0px;">نام
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 0px;">موبایل
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="file_export" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 0px;">ایمیل
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @if(isset($users))
                                            @foreach($users as $item)
                                                <tr role="row" class=" @if($i%2==0) even @else odd @endif">
                                                    <td class="sorting_1">{{ $item['name'] }}</td>
                                                    <td class="sorting_1">{{ $item['mobile'] }}</td>
                                                    <td class="sorting_1">{{ $item['email'] }}</td>

                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">نام</th>
                                            <th rowspan="1" colspan="1">موبایل</th>
                                            <th rowspan="1" colspan="1">ایمیل</th>

                                        </tr>
                                        </tfoot>
                                    </table>
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
            $(".delete").click(function (event) {
                var id = $(this).attr('data-id');
                if (!confirm('از حذف این مورد اطمینان دارید؟؟')) {
                    event.preventDefault();
                } else {
                    $("#delete" + id).submit()
                }
            });
        });
    </script>
@endsection
@section('style')
    <link href="/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@extends('layouts.admin')
@section('title')
    نقش  ها
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
                            <h4 class="card-title">لیست نقش ها</h4>
                            <a href="/admin/role/create">
                                <button class="btn btn-success" style="margin-bottom: 10px"><i class="mdi mdi-plus"></i>
                                </button>
                            </a>
                            <form action="/admin/role">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>نام فارسی</span>
                                            <input type="text" value="{{ Request::input('name_fa') }}" name="name_fa"
                                                   style="margin-top: 10px" class="form-control"
                                                   placeholder="نام فارسی">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>نام انگلیسی</span>
                                            <input type="text" name="name_en" value="{{ Request::input('name_en') }}"
                                                   style="margin-top: 10px" class="form-control"
                                                   placeholder="نام انگلیسی">
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
                                                style="width: 0px;">نام فارسی
                                            </th>
                                            <th class="sorting_desc" tabindex="0" aria-controls="file_export"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                aria-sort="descending" style="width: 0px;">نام انگلیسی
                                            </th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @if(isset($role))
                                            @foreach($role as $item)
                                                <tr role="row" class=" @if($i%2==0) even @else odd @endif">
                                                    <td class="">{{ $item['name_fa'] }}</td>
                                                    <td class="sorting_1">{{ $item['name_en'] }}</td>
                                                    <td>
                                                        @can('role_edit')
                                                            <a href="/admin/role/{{$item['id']}}/edit">
                                                                <i class="mdi mdi-pencil"
                                                                   style="font-size: 20px; color: blue"></i>
                                                            </a>
                                                        @endcan
                                                        @can('role_delete')
                                                            <form action="{{url('admin/role/'.$item->id).'destroy'}}"
                                                                  method="post" id="delete{{$item['id']}}">
                                                                @method('delete')
                                                                @csrf
                                                                <i class="mdi mdi-delete delete"
                                                                   style="font-size: 20px; color: red; cursor: pointer"
                                                                   data-id="{{ $item['id'] }}"></i>
                                                            </form>
                                                        @endcan

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">نام فارسی</th>
                                            <th rowspan="1" colspan="1">نام انگلیسی</th>
                                            <th rowspan="1" colspan="1">عملیات</th>

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
@endsection
@section('style')
    <link href="/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

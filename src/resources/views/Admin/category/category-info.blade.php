@extends('layouts.admin')
@section('title')
    دسته بندی ها
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            @include('Admin.index.messages')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">لیست دسته بندی ها</h4>
                            <a href="/admin/category/create">
                                <button class="btn btn-success" style="margin-bottom: 10px"><i class="mdi mdi-plus"></i>
                                </button>
                            </a>
                            <form action="/admin/category/" class="mb-2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span>عنوان</span>
                                            <input type="text" value="{{ Request::input('title') }}" name="title"
                                                   style="margin-top: 10px" class="form-control" placeholder="عنوان">
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
                                                style="width: 0px;">عنوان دسته بندی
                                            </th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @if(isset($categories))
                                            @foreach($categories as $item)
                                                <tr role="row" class=" @if($i%2==0) even @else odd @endif">
                                                    <td class="">
                                                        <a href="/category/{{ $item->slug }}">{{ $item->title }}</a>
                                                    </td>
                                                    <td>
                                                        @can('category_edit')
                                                            <a href="/admin/category/{{$item['id']}}/edit">
                                                                <i class="mdi mdi-pencil"
                                                                   style="font-size: 20px; color: blue"></i>
                                                            </a>
                                                        @endcan
                                                        @can('category_delete')
                                                            <form action="{{url('admin/category/'.$item->id.'destroy')}}"
                                                                  method="post" id="delete{{$item['id']}}">
                                                                @method('delete')
                                                                {{csrf_field()}}
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
                                            <th rowspan="1" colspan="1">عنوان دسته بندی</th>
                                            <th rowspan="1" colspan="1">عملیات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    {{ $categories->appends($_GET)->links('pagination::bootstrap-4') }}
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

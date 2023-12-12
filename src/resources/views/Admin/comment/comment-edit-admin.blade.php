@extends('layouts.admin')
@section('title')
    ویرایش نظر
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
                            <h4 class="card-title">ویرایش منو</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30"  action="/admin/comments/{{$comment->id}}/editAdmin" method="post">
                                @method('patch')
                                @csrf
                                <div class="card">
                                    <div class="card-header" style="text-align: center; font-weight: bold">
                                         نظر
                                    </div>
                                    <div class="card-body row">
                                        <div class="col-12 mb-3">
                                            <p class="mb-2">پاسخ</p>
                                            <textarea name="comment" id="comment" class="form-control" rows="5">{{ $comment->comment }}</textarea>
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
@section('script')
    <script src="/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

    <!--tinymce js-->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        tinymce.init({
            directionality : "rtl",
            language : 'fa',
            height: "400px",
            extended_valid_elements : "script[src|async|defer|type|charset]",
            selector: "#comment",
            plugins: 'image directionality code print preview searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat |undo redo | image code| link fontsizeselect  | ',


            // without images_upload_url set, Upload tab won't show up
            images_upload_url: 'upload.texteditor',

            // override default upload handler to simulate successful upload
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '/admin/upload');

                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
        });
    </script>
@endsection

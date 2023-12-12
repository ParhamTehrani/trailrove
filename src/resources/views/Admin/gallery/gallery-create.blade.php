@extends('layouts.admin')
@section('title')
    افزودن گالری
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
                            <h4 class="card-title">افزودن گالری</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/gallery" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" aria-describedby="title" placeholder="عنوان">
                                    @if($errors->has('title'))
                                        <span>{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="body">متن</label>
                                    <textarea type="text" class="form-control editor" name="body"  id="body" aria-describedby="body" placeholder="متن">{{ old('body') }}</textarea>
                                    @if($errors->has('body'))
                                        <span>{{ $errors->first('body') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="iframe"> کد iframe </label>
                                    <textarea type="text" class="form-control"  name="iframe" id="iframe" aria-describedby="iframe" placeholder="کد iframe">{{ old('iframe') }}</textarea>
                                    @if($errors->has('iframe'))
                                        <span>{{ $errors->first('iframe') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <p>سایز عکس : 1200 در 800</p>
                                    <label for="src">عکس </label>
                                    <input type="file" class="form-control" name="src" value="{{ old('src') }}"
                                           id="src" aria-describedby="src" placeholder="عکس">
                                    @if($errors->has('src'))
                                        <span>{{ $errors->first('src') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="short_description"> توضیحات کوتاه </label>
                                    <textarea type="text" class="form-control"  name="short_description" id="short_description" aria-describedby="short_description" placeholder="توضیحات کوتاه">{{ old('short_description') }}</textarea>
                                    @if($errors->has('short_description'))
                                        <span>{{ $errors->first('short_description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="meta_description"> توضیحات متا </label>
                                    <textarea type="text" class="form-control"  name="meta_description" id="meta_description" aria-describedby="meta_description" placeholder="توضیحات متا">{{ old('meta_description') }}</textarea>
                                    @if($errors->has('meta_description'))
                                        <span>{{ $errors->first('meta_description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword"> کلمات کلیدی </label>
                                    <input type="text" class="form-control"  name="meta_keyword" value="{{ old('meta_keyword') }}" id="meta_keyword" aria-describedby="meta_keyword" placeholder="کلمات کلیدی">
                                    @if($errors->has('meta_keyword'))
                                        <span>{{ $errors->first('meta_keyword') }}</span>
                                    @endif
                                    <p>کلمات کلیدی را با "," جدا نمایید</p>
                                </div>
                                <div class="form-group row p-t-20">
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="active" value="1" checked class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">فعال</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="active" value="0"  class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">غیرفعال</label>
                                        </div>
                                    </div>
                                    @if($errors->has('active'))
                                        <span>{{ $errors->first('active') }}</span>
                                    @endif
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

    <!--tinymce js-->
    <script src="/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
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
            selector: ".editor",
            plugins: 'image directionality code print preview searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat |undo redo | image code| link fontsizeselect  | ',


            // without images_upload_url set, Upload tab won't show up
            images_upload_url: 'upload.texteditor',

            // override default upload handler to simulate successful upload
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{url('/admin/upload')}}');

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

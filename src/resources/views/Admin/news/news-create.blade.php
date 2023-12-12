@extends('layouts.admin')
@section('title')
    افزودن خبر
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
                            <h4 class="card-title">افزود خبر</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/news" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control"  name="title" value="{{ old('title') }}" id="title" aria-describedby="title" placeholder="عنوان">
                                    @if($errors->has('title'))
                                        <span>{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>دسته بندی</label>
                                    <select class="form-control custom-select" name="category_id">
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                        <span>{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="canonical">کنونیکال</label>
                                    <input type="text" class="form-control"  name="canonical" value="{{ old('canonical') }}" id="canonical" aria-describedby="canonical" placeholder="کنونیکال">
                                    @if($errors->has('canonical'))
                                        <span>{{ $errors->first('canonical') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <p>سایز عکس : 1200 در 800</p>
                                    <label for="thumbnail">عکس </label>
                                    <input type="file" class="form-control" name="thumbnail" value="{{ old('thumbnail') }}"
                                           id="thumbnail" aria-describedby="thumbnail" placeholder="عکس">
                                    @if($errors->has('thumbnail'))
                                        <span>{{ $errors->first('thumbnail') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="short_description">توضیحات کوتاه</label>
                                    <input type="text" class="form-control" name="short_description" value="{{ old('short_description') }}"  aria-describedby="short_description" placeholder="توضیحات کوتاه">
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
                                <div class="form-group">
                                    <label for="body">متن </label>
                                    <textarea type="text" class="form-control editor" name="body"  id="body" aria-describedby="body" placeholder="متن ">{{ old('body') }}</textarea>
                                    @if($errors->has('body'))
                                        <span>{{ $errors->first('body') }}</span>
                                    @endif
                                </div>


                                <div class="form-group row p-t-20">
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="status" value="publish" checked  class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio3">وضغیت خبر انتشار</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio4" name="status" value="draft"  class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio4">وضغیت خبر پیشنویس</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="tags">تگ ها</label>
                                    <select class="select2 form-control" multiple="multiple" name="tags[]" id="tags" style="height: 36px;width: 100%;">
                                        @foreach($tags as $item)
                                            <option value="{{$item->title}}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tags'))
                                        <span>{{ $errors->first('tags') }}</span>
                                    @endif
                                </div>

                                <div class="row">
                                    <h3>FAQ</h3>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h6>faq 1</h6>
                                            <input type="text" class="form-control"  name="faq1" value="{{ old('faq1') }}" placeholder="سوال">
                                            <br>
                                            <input type="text" class="form-control"  name="faq1Ans" value="{{ old('faq1Ans') }}" placeholder="جواب">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <h6>faq 2</h6>
                                            <input type="text" class="form-control"  name="faq2" value="{{ old('faq2') }}" placeholder="سوال">
                                            <br>
                                            <input type="text" class="form-control"  name="faq2Ans" value="{{ old('faq2Ans') }}" placeholder="جواب">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <h6>faq 3</h6>
                                            <input type="text" class="form-control"  name="faq3" value="{{ old('faq3') }}" placeholder="سوال">
                                            <br>
                                            <input type="text" class="form-control"  name="faq3Ans" value="{{ old('faq3Ans') }}" placeholder="جواب">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <h6>faq 4</h6>
                                            <input type="text" class="form-control"  name="faq4" value="{{ old('faq4') }}" placeholder="سوال">
                                            <br>
                                            <input type="text" class="form-control"  name="faq4Ans" value="{{ old('faq4Ans') }}" placeholder="جواب">
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

@section('style')
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="/admin/assets/libs/select2/dist/css/select2.min.css">
    <style>
        .select2-selection__choice{
            background-color: #137eff !important;
        }
    </style>
@endsection

@section('script')
    <!-- This Page JS -->
    <script src="/admin/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="/admin/assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="/admin/dist/js/pages/forms/select2/select2.init.js"></script>

    <script>
        $(".select2").select2({
            tags: true
        });
    </script>

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

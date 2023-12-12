@extends('layouts.admin')
@section('title')
    ویرایش تنظیمات
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
                            <h4 class="card-title">ویرایش تنظیمات</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/config/{{$config->id}}update" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label for="short_description"> توضیحات کوتاه </label>
                                    <textarea type="text" class="form-control"  name="short_description" id="short_description" aria-describedby="short_description" placeholder="توضیحات کوتاه">{{ old('short_description',$config->short_description) }}</textarea>
                                    @if($errors->has('short_description'))
                                        <span>{{ $errors->first('short_description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="meta_description"> توضیحات متا </label>
                                    <textarea type="text" class="form-control"  name="meta_description" id="meta_description" aria-describedby="meta_description" placeholder="توضیحات متا">{{ old('meta_description',$config->meta_description) }}</textarea>
                                    @if($errors->has('meta_description'))
                                        <span>{{ $errors->first('meta_description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword"> کلمات کلیدی </label>
                                    <input type="text" class="form-control"  name="meta_keyword" value="{{ old('meta_keyword',$config->meta_keyword) }}" id="meta_keyword" aria-describedby="meta_keyword" placeholder="کلمات کلیدی">
                                    @if($errors->has('meta_keyword'))
                                        <span>{{ $errors->first('meta_keyword') }}</span>
                                    @endif
                                    <p>کلمات کلیدی را با "," جدا نمایید</p>
                                </div>


                                <div class="form-group">
                                    <label for="aparat">آدرس آپارات</label>
                                    <input type="text" class="form-control" name="aparat" value="{{ old('aparat',$config->aparat) }}" id="aparat" aria-describedby="aparat" placeholder="آدرس آپارات">
                                    @if($errors->has('aparat'))
                                        <span>{{ $errors->first('aparat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="aparat_count">تعداد دنبال کنندگان آپارات</label>
                                    <input type="text" class="form-control" name="aparat_count" value="{{ old('aparat_count',$config->aparat_count) }}" id="aparat_count" aria-describedby="aparat_count" placeholder="تعداد دنبال کنندگان آپارات">
                                    @if($errors->has('aparat_count'))
                                        <span>{{ $errors->first('aparat_count') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="youtube">آدرس یوتوب</label>
                                    <input type="text" class="form-control" name="youtube" value="{{ old('youtube',$config->youtube) }}" id="youtube" aria-describedby="youtube" placeholder="آدرس یوتوب">
                                    @if($errors->has('youtube'))
                                        <span>{{ $errors->first('youtube') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="youtube_count">تعداد دنبال کنندگان یوتوب</label>
                                    <input type="text" class="form-control" name="youtube_count" value="{{ old('youtube_count',$config->youtube_count) }}" id="youtube_count" aria-describedby="youtube_count" placeholder="تعداد دنبال کنندگان یوتوب">
                                    @if($errors->has('youtube_count'))
                                        <span>{{ $errors->first('youtube_count') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="facebook">آدرس فیسبوک</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook',$config->facebook) }}" id="facebook" aria-describedby="facebook" placeholder="آدرس فیسبوک">
                                    @if($errors->has('facebook'))
                                        <span>{{ $errors->first('facebook') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="facebook_count">تعداد دنبال کنندگان فیسبوک</label>
                                    <input type="text" class="form-control" name="facebook_count" value="{{ old('facebook_count',$config->facebook_count) }}" id="facebook_count" aria-describedby="facebook_count" placeholder="تعداد دنبال کنندگان فیسبوک">
                                    @if($errors->has('facebook_count'))
                                        <span>{{ $errors->first('facebook_count') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="twitter">آدرس توییتر</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ old('twitter',$config->twitter) }}" id="twitter" aria-describedby="twitter" placeholder="آدرس توییتر">
                                    @if($errors->has('twitter'))
                                        <span>{{ $errors->first('twitter') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="twitter_count">تعداد دنبال کنندگان توییتر</label>
                                    <input type="text" class="form-control" name="twitter_count" value="{{ old('twitter_count',$config->twitter_count) }}" id="twitter_count" aria-describedby="twitter_count" placeholder="تعداد دنبال کنندگان توییتر">
                                    @if($errors->has('twitter_count'))
                                        <span>{{ $errors->first('twitter_count') }}</span>
                                    @endif
                                </div>


                                <h6>برای وارد کردن قیمت لطفا ابتدا عنوان سپس خط فاصله سپس قیمت را وارد کنید(مثال: آهن-25000 تومان)</h6>
                                <div class="form-group">
                                    <label for="price_1">قیمت</label>
                                    <input type="text" class="form-control" name="price_1" value="{{ old('price_1',$config->price_1) }}" id="price_1" aria-describedby="price_1" placeholder="">
                                    @if($errors->has('price_1'))
                                        <span>{{ $errors->first('price_1') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price_2">قیمت</label>
                                    <input type="text" class="form-control" name="price_2" value="{{ old('price_2',$config->price_2) }}" id="price_2" aria-describedby="price_2" placeholder="">
                                    @if($errors->has('price_2'))
                                        <span>{{ $errors->first('price_2') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price_3">قیمت</label>
                                    <input type="text" class="form-control" name="price_3" value="{{ old('price_1',$config->price_3) }}" id="price_3" aria-describedby="price_3" placeholder="">
                                    @if($errors->has('price_3'))
                                        <span>{{ $errors->first('price_3') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price_4">قیمت</label>
                                    <input type="text" class="form-control" name="price_4" value="{{ old('price_4',$config->price_4) }}" id="price_4" aria-describedby="price_4" placeholder="">
                                    @if($errors->has('price_4'))
                                        <span>{{ $errors->first('price_4') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price_5">قیمت</label>
                                    <input type="text" class="form-control" name="price_5" value="{{ old('price_5',$config->price_5) }}" id="price_5" aria-describedby="price_5" placeholder="">
                                    @if($errors->has('price_5'))
                                        <span>{{ $errors->first('price_5') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price_6">قیمت</label>
                                    <input type="text" class="form-control" name="price_6" value="{{ old('price_6',$config->price_6) }}" id="price_6" aria-describedby="price_6" placeholder="">
                                    @if($errors->has('price_6'))
                                        <span>{{ $errors->first('price_6') }}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <p>سایز عکس : 600 در 100</p>
                                    <label for="logo_header">لوگوی هدر</label>
                                    <input type="file" class="form-control" name="logo_header" value="" id="logo_header" aria-describedby="logo_header" placeholder="لوگوی هدر ">
                                    @if($errors->has('logo_header'))
                                        <span>{{ $errors->first('logo_header') }}</span>
                                    @endif
                                    @if(file_exists(public_path($config['logo_header'])) && $config['logo_header'])
                                        <img src="{{($config['logo_header'])}}" alt="" width="500" height="200">
                                    @endif
                                </div>


                                <div class="form-group">
                                    <p>سایز عکس : 600 در 100</p>
                                    <label for="logo_footer">لوگوی فوتر</label>
                                    <input type="file" class="form-control" name="logo_footer" value="" id="logo_footer" aria-describedby="logo_footer" placeholder="لوگوی فوتر ">
                                    @if($errors->has('logo_footer'))
                                        <span>{{ $errors->first('logo_footer') }}</span>
                                    @endif
                                    @if(file_exists(public_path($config['logo_footer'])) && $config['logo_footer'])
                                        <img src="{{($config['logo_footer'])}}" alt="" width="500" height="200">
                                    @endif
                                </div>


                                <h2>هدرهای سایت</h2>

                                <button class="btn btn-success add-header" type="button" style="margin-bottom: 10px" ><i class="mdi mdi-plus"></i></button>


                                @if($config->header && count(json_decode($config->header,true)) > 0)
                                    @foreach(json_decode($config->header,true) as $header)
                                        <div class="form-group">
                                            <label for="header[]">هدر های سایت</label>
                                            <input type="text" class="form-control" name="header[]" value="{{ old('header[]',$header) }}" id="header" aria-describedby="header" placeholder="هدر های سایت">
                                            @if($errors->has('header'))
                                                <span>{{ $errors->first('header') }}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif

                                <div class="wrapper-head" style="display: none">
                                    <div class="form-group">
                                        <label for="header[]">هدر های سایت</label>
                                        <input type="text" class="form-control" name="header[]" value="" id="header" aria-describedby="header" placeholder="هدر های سایت">
                                        @if($errors->has('header'))
                                            <span>{{ $errors->first('header') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="wrapper-inside">

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
    <script>
        $(document).on('click','.add-header',function (){
            $('.wrapper-inside').append($('.wrapper-head').html())
        })
    </script>
@endsection


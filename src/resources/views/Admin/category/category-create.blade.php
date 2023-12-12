@extends('layouts.admin')
@section('title')
    افزودن دسته بندی
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
                            <h4 class="card-title">افزود دسته بندی</h4>
                            @include('Admin.index.messages')

                            <form class="m-t-30" action="/admin/category" method="post" enctype="multipart/form-data">
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
                                        <option value="" selected>دسته بندی سرگروه</option>
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                        <span>{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="priority">اولویت</label>
                                    <input type="number" class="form-control"  name="priority" value="{{ old('priority') }}" id="priority" aria-describedby="priority" placeholder="ترتیب">
                                    @if($errors->has('priority'))
                                        <span>{{ $errors->first('priority') }}</span>
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
    <link rel="stylesheet" type="text/css" href="/admin/assets/libs/@claviska/jquery-minicolors/jquery.minicolors.css">
@endsection
@section('script')
    <!-- This Page JS -->
    <script src="/admin/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="/admin/assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="/admin/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="/admin/assets/libs/@claviska/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script>
        $('.demo').each(function() {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                format: $(this).attr('data-format') || 'hex',
                keywords: $(this).attr('data-keywords') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom left',
                swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
    </script>
@endsection

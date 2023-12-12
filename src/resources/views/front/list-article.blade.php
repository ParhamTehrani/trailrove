@extends('layouts.front')
@section('title')
    Latest articles
@endsection
@section('head')
    <link rel="canonical" href="{{ url()->current() }}">
    <style>
        .pagination{
            display: flex;
            justify-content: space-between;
            list-style-type: none;
        }
        .page-item a:hover:not(.disabled){
            color: #be9656 !important;
        }
        .page-item.disabled{
            color: grey !important;
        }
    </style>
@endsection

@section('content')

    <div id="page_caption" class="  ">

        <div class="page_title_wrapper">
            <div class="page_title_inner">
                <h1 >Latest articles</h1>
            </div>
        </div>

    </div>
    <!-- Begin content -->
    <div id="page_content_wrapper" class="">
        <div class="inner three_cols">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="sidebar_content full_width three_cols">

                    @foreach($articles as $news)
                    <!-- Begin each blog post -->
                    <div id="post-79" class="post-79 post type-post status-publish format-standard has-post-thumbnail hentry category-art category-lifestyle tag-nature tag-photography tag-travel" >

                        <div class="post_wrapper">

                            <div class="post_content_wrapper">

                                <div class="post_header">

                                    <div class="post_img static">
                                        <a href="/article/{{ $news->slug }}">
                                            <img width="700" height="529" src="{{  $news->thumbnail }}" alt="" class="" style="width:700px;height:529px;"/>
                                        </a>
                                    </div>

                                    <br class="clear"/>

                                    <div class="post_header_title">
                                        <h5><a href="/article/{{ $news->slug }}" title="Beauty of Nature">{{ $news->title }}</a></h5>
                                        <div class="post_detail post_date"><span class="post_info_date"><span> {{ \Carbon\Carbon::parse($news->created_at)->format('F d, Y') }}</span></span>
                                        </div>
                                    </div>

                                    <p><p>{{ $news->short_description }}</p></p>
                                    <div class="post_button_wrapper">
                                        <a class="readmore" href="/article/{{ $news->slug }}">Read More</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- End each blog post -->
                    @endforeach


                        {{ $articles->appends($_GET)->links('pagination::simple-bootstrap-5') }}

                </div>

            </div>
            <!-- End main content -->
        </div>
    </div>
@endsection

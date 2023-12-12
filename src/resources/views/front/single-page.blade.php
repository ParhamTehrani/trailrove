@extends('layouts.front')
@section('title')
{{ $page->title }}
@endsection
@section('head')
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="description" content="{{$page['meta_description']}}">
    <meta name="keyword" content="{{$page['meta_keyword']}}">
    <meta property="og:url" content="{{ \Illuminate\Support\Facades\Request::url() }}"/>
    <meta property="og:title" content="{{ @$page->title }}"/>
    <meta property="twitter:title" content="{{ @$page->title }}"/>
    <meta property="og:description" content="{{$page['meta_description']}}">
@endsection
@section('content')


    <!-- Begin content -->
    <div id="page_content_wrapper" class="hasbg ">
        <div class="inner">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="sidebar_content full_width">

                    <div class="post_header">
                        <div class="post_header_title">
                            <h1>{{ $page->title }}</h1>
                            <div class="post_detail post_date">
				      		<span class="post_info_date">
				      			<span> {{\Carbon\Carbon::parse($page->created_at)->format('F d, Y')}}</span>
				      		</span>
                            </div>
                        </div>
                    </div>


                    <!-- Begin each blog post -->
                    <div id="post-36" class="post-36 post type-post status-publish format-standard has-post-thumbnail hentry category-art category-food category-top tag-cooking tag-food tag-lifestyle">

                        <div class="post_wrapper">

                            <div class="post_content_wrapper">


                                <div class="post_header single">

                                    {!! $page->body !!}
                                </div>


                            </div>

                        </div>

                    </div>
                    <!-- End each blog post -->
                </div>

            </div>
            <!-- End main content -->

        </div>

        <br class="clear"/>
    </div>
@endsection

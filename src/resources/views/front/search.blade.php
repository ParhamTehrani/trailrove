@extends('layouts.front')
@section('title')
    Search result for: {{ $q }}
@endsection
@section('content')
    <div id="page_content_wrapper">
        <div class="inner">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="sidebar_content">
                    <div class="search_form_wrapper">
                        Search results for <strong>a</strong>. If you didn't find what you were looking for, try a new search.<br/><br/>

                        <form class="searchform" role="search" method="get" action="/search">
                            <input style="width:100%" type="text" class="field searchform-s" name="q" value="{{ $q }}" title="Type to search and hit enter...">
                        </form>
                    </div>

                    @foreach($news as $item)
                    <!-- Begin each blog post -->
                    <div id="post-366" class="post-366 galleries type-galleries status-publish hentry">

                        <div class="post_wrapper">

                            <div class="post_content_wrapper">

                                <div class="post_header search">

                                    <div class="post_header_title one">
                                        <h5><a href="/article/{{ $item->slug }}" title="{{ $item->title }}">{{ $item->title }}</a></h5>
                                        <div class="post_detail post_date">
                                            <span class="post_info_date search">{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y')  }}</span>
                                            </span>
                                        </div>
                                        <p><p></p></p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <br class="clear"/>
                    <!-- End each blog post -->
                    @endforeach

                    @foreach($page as $item)
                        <!-- Begin each blog post -->
                        <div id="post-366" class="post-366 galleries type-galleries status-publish hentry">

                            <div class="post_wrapper">

                                <div class="post_content_wrapper">

                                    <div class="post_header search">

                                        <div class="post_header_title one">
                                            <h5><a href="/page/{{ $item->slug }}" title="{{ $item->title }}">{{ $item->title }}</a></h5>
                                            <div class="post_detail post_date">
                                            <span class="post_info_date search">{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y')  }}</span>
                                            </span>
                                            </div>
                                            <p><p></p></p>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <br class="clear"/>
                        <!-- End each blog post -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

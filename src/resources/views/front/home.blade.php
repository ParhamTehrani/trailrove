@extends('layouts.front')
@section('title')
    Home
@endsection
@section('head')
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="{{ \Illuminate\Support\Facades\Request::url() }}"/>
    <meta property="og:title" content=""/>
    <meta property="twitter:title" content=""/>
    <meta property="og:description" content="">
@endsection
@section('content')
    <div id="post_featured_slider" class="slider_wrapper">
        <div class="flexslider" data-height="550">
            <ul class="slides">
                @foreach($sliders as $item)
                <li>
                    <a href="{{ $item->url }}">
                        <div class="slider_image" style="background-image:url('{{ $item->src }}');">
                            <div class="slide_post">
                                <div class="slide_post_date">{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y')  }}</div>
                                <h2>{{ $item->title }}</h2>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="page_content_wrapper">
        <div class="inner">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="sidebar_content two_cols mixed">

                    @if(@$recentNews->first())
                    <!-- Begin each blog post -->
                    <div id="post-79" class="post-79 post type-post status-publish format-standard has-post-thumbnail hentry category-art category-lifestyle tag-nature tag-photography tag-travel">

                        <div class="post_wrapper">

                            <div class="post_content_wrapper">

                                <div class="post_header">
                                    <div class="post_header_title">
                                        <h5><a href="/article/{{ $recentNews->first()->slug }}" title="Beauty of Nature">{{ $recentNews->first()->title }}</a></h5>
                                        <div class="post_detail post_date"><span class="post_info_date"><span>{{ \Carbon\Carbon::parse($recentNews->first()->created_at)->format('F d, Y')  }}</span></span>
                                        </div>
                                    </div>
                                    <div class="post_img static">
                                        <a href="/article/{{ $recentNews->first()->slug }}">
                                            <img width="960" height="640" src="{{ $recentNews->first()->thumbnail }}" alt="{{ $recentNews->first()->thumbnail }}" class="" style="width:960px;height:640px;">
                                        </a>
                                    </div>
                                    <br class="clear">
                                    <p>{{ $recentNews->first()->short_description }}</p>
                                    <div class="post_button_wrapper">
                                        <a class="readmore" href="/article/{{ $recentNews->first()->slug }}">Read More</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <br class="clear">
                    <!-- End each blog post -->
                    @endif

                    @if(@$recentNews->skip(1)->count())
                        @foreach(@$recentNews->skip(1) as $news)
                            <!-- Begin each blog post -->
                            <div id="post-{{ $news->id }}" class="post-{{ $news->id }} post type-post status-publish format-standard has-post-thumbnail hentry category-art category-lifestyle category-movie tag-model tag-photography tag-portrait tag-travel">

                                <div class="post_wrapper">

                                    <div class="post_content_wrapper">

                                        <div class="post_header">

                                            <div class="post_img static">
                                                <a href="/article/{{ $news->slug }}">
                                                    <img width="700" height="529" src="{{ $news->thumbnail }}" alt="{{ $news->thumbnail }}" class="" style="width:700px;height:529px;">
                                                </a>
                                            </div>
                                            <br class="clear">

                                            <div class="post_header_title">
                                                <h5><a href="/article/{{ $news->slug }}" title="Fashion Model Shoot">{{ $news->title }}</a></h5>
                                                <div class="post_detail post_date"><span class="post_info_date"><span>{{ \Carbon\Carbon::parse($news->created_at)->format('F d, Y')  }}</span></span>
                                                </div>
                                            </div>
                                            <p></p><p>{{ $news->short_description }}</p><p></p>
                                            <div class="post_button_wrapper">
                                                <a class="readmore" href="/article/{{ $news->slug }}">Read More</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End each blog post -->
                        @endforeach
                    @endif

                    <div class="pagination"><p><a href="/articles" class="prev_button">Older Posts<i class="fa fa-angle-double-right"></i></a></p></div>

                </div>

                <div class="sidebar_wrapper">

                    <div class="sidebar">

                        <div class="content">

                            <ul class="sidebar_widget">
                                <li id="text-2" class="widget widget_text"><h2 class="widgettitle">About Me</h2>
                                    <div class="textwidget"><p><img width="1440" height="810" src="/img/nature.png" alt="" style="margin-bottom:10px;"><br>
                                            Our website is a window to the world. Discover and enjoy our articles about nature and travel.
                                    </div>
                                </li>
                                <li id="mc4wp_form_widget-2" class="widget widget_mc4wp_form_widget"><h2 class="widgettitle">Subscribe to My Newsletter</h2>
                                    <form id="mc4wp-form-1" action="/subscription" class="mc4wp-form mc4wp-form-437 mc4wp-form-basic" method="post" data-id="437" data-name="Default sign-up form">
                                        @csrf
                                        <div class="mc4wp-form-fields">
                                            <p>
                                                <input type="email" id="subs-email" name="EMAIL" placeholder="Your email address" required="">
                                            </p>
                                        </div>
                                        <div class="mc4wp-response">
                                            @if(\Illuminate\Support\Facades\Session::has('success-rss'))
                                                <p>{{\Illuminate\Support\Facades\Session::get('success-rss')}}</p>
                                            @endif
                                        </div>
                                    </form><!-- / Mailchimp for WordPress Plugin --></li>
                                <li id="social_profiles_posts-3" class="widget Social_Profiles_Posts"><h2 class="widgettitle"><span>Follow Me On</span></h2><div class="textwidget"><div class="social_wrapper shortcode light small"><ul><li class="facebook"><a target="_blank" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li><li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/#"><i class="fa fa-twitter"></i></a></li><li class="pinterest"><a target="_blank" title="Pinterest" href="https://pinterest.com/#"><i class="fa fa-pinterest"></i></a></li><li class="instagram"><a target="_blank" title="Instagram" href="https://instagram.com/themegoodsphotography"><i class="fa fa-instagram"></i></a></li></ul></div></div></li>
                                <li id="custom_ads-2" class="widget Custom_Ads"><img width="100%" height="350" src="/img/nature-2.png" alt=""></li>
                                @if(@$categories)
                                <li id="categories-2" class="widget widget_categories"><h2 class="widgettitle">Categories</h2>
                                    <ul>
                                        @foreach($categories as $cat)
                                        <li class="cat-item cat-item-8"><a href="/category/{{ $cat->slug }}">{{ $cat->title }}</a></li>
                                        @endforeach
                                    </ul>

                                </li>
                                @endif
                            </ul>

                        </div>

                    </div>
                    <br class="clear">
                </div>

            </div>
            <!-- End main content -->
        </div>
    </div>
@endsection

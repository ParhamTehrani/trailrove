@extends('layouts.front')
@section('title')
{{ $article->title }}
@endsection
@section('head')
    <link rel="canonical" href="{{ @$article['canonical'] ?? url()->current() }}">
    <meta name="description" content="{{$article['meta_description']}}">
    <meta name="keyword" content="{{$article['meta_keyword']}}">
    <meta property="og:image" content="/{{$article['thumbnail']}}">
    <meta property="og:url" content="{{ \Illuminate\Support\Facades\Request::url() }}"/>
    <meta property="og:title" content="{{ @$article->title }}"/>
    <meta property="twitter:title" content="{{ @$article->title }}"/>
    <meta property="og:description" content="{{$article['meta_description']}}">

        @if(@$article->toArray()['faqable'])
            @php
                $faq = [];
                foreach ($article->toArray()['faqable'] as $faqs){
                    $answer = $faqs['answer'];
                    $question = $faqs['question'];
                    $faq[] = [
                        "@type"=> "Question",
                        "name"=> "$question",
                        "acceptedAnswer"=> [
                          "@type"=> "Answer",
                          "text"=> "$answer"
                       ]
                    ];
                }
            @endphp
            <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "FAQPage",
          "mainEntity": {!! json_encode($faq,false) !!}
                }
    </script>
        @endif

        <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "item": {
          "@id": "{{url('/')}}",
          "name": "Home",
          "image": "/img/logo.png"
        }
      },{
        "@type": "ListItem",
        "position": 2,
        "item": {
          "@id": "{{url('category/' . @$article->category->slug )}}",
          "name": "{{@$article->category->title}}",
          "image": "/img/logo.png"
        }
      },{
        "@type": "ListItem",
        "position": 3,
        "item": {
          "@id": "{{url('article/'.@$article->slug)}}",
          "name": "{{ @$article->title }}",
          "image": "{{url($article->thumbnail)}}"
        }
      }]
    }

        </script>


@endsection
@section('content')
    <div id="page_caption" class="hasbg parallax  ">

        <div id="bg_regular" style="background-image:url({{ $article->thumbnail }});"></div>
    </div>

    <!-- Begin content -->
    <div id="page_content_wrapper" class="hasbg ">
        <div class="inner">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="sidebar_content full_width">

                    <div class="post_header">
                        <div class="post_header_title">
                            <h1>{{ $article->title }}</h1>
                            <div class="post_detail post_date">
				      		<span class="post_info_date">
				      			<span> {{\Carbon\Carbon::parse($article->created_at)->format('F d, Y')}}</span>
				      		</span>
                            </div>
                        </div>
                    </div>


                    <!-- Begin each blog post -->
                    <div id="post-36" class="post-36 post type-post status-publish format-standard has-post-thumbnail hentry category-art category-food category-top tag-cooking tag-food tag-lifestyle">

                        <div class="post_wrapper">

                            <div class="post_content_wrapper">


                                <div class="post_header single">

                                    {!! $article->body !!}
                                </div>

                                <div class="post_excerpt post_tag">
                                    <i class="fa fa-tags"></i>
                                    @foreach($article->tag as $tag)
                                    <a href="/tag/{{ $tag->title }}" rel="tag">{{ $tag->title }}</a>
                                    @endforeach
                                    <br />
                                </div>

                                <br class="clear"/>
                                <div class="post_info_cat"><span>
			    			        <a href="/category/{{ $article->category->parent->slug }}">{{ $article->category->parent->title }}</a>
			    			        &nbsp;/
			    			        <a href="/category/{{ $article->category->slug }}">{{ $article->category->title }}</a>
			    			    </span>
                                </div>
                                <br class="clear"/>

{{--                                <div id="about_the_author">--}}
{{--                                    <div class="gravatar"><img alt='' src='https://secure.gravatar.com/avatar/db6f032dce962144efc9b625779461a1?s=200&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/db6f032dce962144efc9b625779461a1?s=400&#038;d=mm&#038;r=g 2x' class='avatar avatar-200 photo' height='200' width='200' loading='lazy' decoding='async'/></div>--}}
{{--                                    <div class="author_detail">--}}
{{--                                        <div class="author_content">--}}
{{--                                            <strong>John Philipe</strong><br/>--}}
{{--                                            Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue.			     	</div>--}}
{{--                                    </div>--}}
{{--                                    <br class="clear"/>--}}
{{--                                </div>--}}


                                <h2 class="widgettitle"><span class="content_title">You might also like</span></h2>
                                <div class="post_related">
                                    @foreach($similarArticles as $key => $item)
                                        <div class="one_third @if($key+1 == $similarArticles->count()) last @endif">
                                            <!-- Begin each blog post -->
                                            <div id="post-13" class="post-13 post type-post status-publish format-standard has-post-thumbnail hentry category-lifestyle category-music category-travel tag-lifestyle tag-sport tag-travel">

                                                <div class="post_wrapper grid_layout">


                                                    <div class="post_img small static">
                                                        <a href="/article/{{ $item->slug }}">
                                                            <img width="700" height="529" src="{{ $item->thumbnail }}" alt="" class="" style="width:700px;height:529px;"/>
                                                        </a>
                                                    </div>


                                                    <div class="blog_grid_content">
                                                        <div class="post_header grid">
                                                            <strong><a href="/article/{{ $item->slug }}" title="Playing skateboard">{{ $item->title }}</a></strong>
                                                            <div class="post_attribute">{{  \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- End each blog post -->
                                        </div>
                                    @endforeach
                                </div>


                            </div>

                        </div>

                    </div>
                    <!-- End each blog post -->


                    <div class="fullwidth_comment_wrapper">
                        <h2 class="widgettitle"><span class="content_title">{{ $article->comment->count() }} Comments</span></h2><br class="clear"/>


                        @if($article->comment->count() > 0)
                        <div>
                            @foreach($article->comment as $comment)
                                <div class="comment" id="comment-4">
                                    <div class="right">
                                        <h7>{{ $comment->author }}</h7>
                                        <div class="comment_date">{{  \Carbon\Carbon::parse($comment->created_at)->format('F d, Y') }}</div>
                                        <br class="clear"/>
                                        <p>{{ $comment->message }}</p>

                                    </div>
                                </div>
                                <br class="clear"/><hr/><div style="height:20px"></div>
                            @endforeach
                        </div>
                        @endif

                        <!-- End of thread -->
                        <div style="height:10px"></div>


                        <div id="respond">

                            <div id="respond" class="comment-respond">
                                <form action="/comment/{{ $article->id }}"
                                      method="post" id="commentform" class="comment-form">
                                    @csrf
                                    <p class="comment-notes">
                                        <span id="email-notes">Your email address will not be published.</span> <span
                                            class="required-field-message">Required fields are marked <span
                                                class="required">*</span></span>
                                        @if(\Illuminate\Support\Facades\Session::has('success-comment'))
                                            <p style="color: red;font-size: 18px;margin: 15px 0">{{\Illuminate\Support\Facades\Session::get('success-comment')}}</p>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Session::has('failMessage'))
                                            <p style="color: red;font-size: 18px;margin: 15px 0">{{\Illuminate\Support\Facades\Session::get('failMessage')}}</p>
                                        @endif
                                    </p>
                                    <p class="comment-form-comment"><label for="comment">Comment <span class="required">*</span></label>
                                        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"
                                                  required="required"></textarea></p>
                                    <p class="comment-form-author"><label for="author">Name <span
                                                class="required">*</span></label> <input placeholder="Name*" id="author"
                                                                                         name="author" type="text"
                                                                                         value="" size="30"
                                                                                         maxlength="245"
                                                                                         autocomplete="name"
                                                                                         required="required"/></p>
                                    <p class="comment-form-email"><label for="email">Email <span
                                                class="required">*</span></label> <input type="email"
                                                                                         placeholder="Email*" id="email"
                                                                                         name="email" value="" size="30"
                                                                                         maxlength="100"
                                                                                         aria-describedby="email-notes"
                                                                                         autocomplete="email"
                                                                                         required="required"/></p>
                                    <p class="comment-form-url"><label for="url">Website</label> <input
                                            placeholder="Website" id="url" name="url" type="url" value="" size="30"
                                            maxlength="200" autocomplete="url"/>

                                    </p>
                                    <p class="comment-form-url">
                                        <button class="btn" style="cursor:pointer;background-color: #888888;color: #ffffff;border: none;padding: 0.5em 1.5em 0.5em 1.5em;line-height: 1.5!important;letter-spacing: 2px;">Submit</button>
                                    </p>

                                </form>
                            </div><!-- #respond -->
                        </div>

                    </div>


                </div>

            </div>
            <!-- End main content -->

        </div>

        <br class="clear"/>
    </div>
@endsection

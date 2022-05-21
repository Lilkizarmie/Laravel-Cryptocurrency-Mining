@extends('layout')
@section('css')

@stop
@section('content')
<section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <div class="heading-sup-title">{{$xcat->categories}}</div>
                    <h2 class="heading-title heading--half-colored">{{$post->title}}</h2>     
                </header>

                <div class="post-details-wrap">
                    <div class="post__date">
                        <a href="#" class="number">{{date("j", strtotime($post->created_at))}}</a>
                        <time class="published" datetime="2018-03-14 12:00:00">
                            {{date("M", strtotime($post->created_at))}},
                            <span>{{date("Y", strtotime($post->created_at))}}</span>
                        </time>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-d">
                <div class="post-wrapper">
                    <article class="post post-signle">
                        <div class="post-thumb">
                            <img src="{{url('/')}}/asset/thumbnails/{{$post->image}}" alt="">
                        </div>
                        <div class="blog-content">
                            <p class="post__text">{!!$post->details!!}</p>                           
                            <div class="single-blog-bottom-content">
                                <div class="blog-share">
                                    <div class="share-title">
                                        <p>Share:</p>
                                    </div>
            @include('partials.share')
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            @include('partials.sidebar')
        </div>
        <!-- NAV -->
    </div>
</section>
@stop
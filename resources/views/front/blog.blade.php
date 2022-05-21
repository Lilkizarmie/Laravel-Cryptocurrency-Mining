@extends('layout')
@section('css')

@stop
@section('content')
<section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <h2 class="heading-title heading--half-colored"> Latest news</h2>     
                </header>
            </div>
        </div>
    </div>
</section>
<div class="blog-post-archive pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left-blog-d">
                <div class="post-wrapper post-wrapper-v2">
                    @foreach($posts as $vblog)
					<article class="hentry post post-standard has-post-thumbnail">
						<div class="row">
							<div class="col-lg-1">
								<div class="post__date">
									<a href="#" class="number">{{date("j", strtotime($vblog->created_at))}}</a>
									<time class="published" datetime="2018-01-15 12:00:00">
                                    {{date("M", strtotime($vblog->created_at))}}, {{date("Y", strtotime($vblog->created_at))}}
									</time>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="post-thumb">
									<img src="{{url('/')}}/asset/thumbnails/{{$vblog->image}}" alt="post">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="post__content">

									<a href="{{url('/')}}/single/{{$vblog->id}}/{{str_slug($vblog->title)}}" class="h3 post__title entry-title">{{$vblog->title}}</a>

									<p class="post__text">{!!  str_limit($vblog->content, 60);!!}..</p>

									<div class="post-additional-info">
										<a href="{{url('/')}}/single/{{$vblog->id}}/{{str_slug($vblog->title)}}" class="btn btn--large btn--secondary btn--transparent btn--with-icon btn--icon-right">
											Read More
										</a>
									</div>

								</div>
							</div>
						</div>
					</article>
                    @endforeach
                    <div class="text-center margin-50px-top margin-50px-bottom sm-margin-50px-top wow fadeInUp">
                        {{$posts->render()}}
                    </div>
                </div>
            </div>
            @include('partials.sidebar')
        </div>
    </div>
</div>
@stop
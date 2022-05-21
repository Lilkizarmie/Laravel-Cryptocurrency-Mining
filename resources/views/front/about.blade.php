@extends('layout')
@section('css')

@stop
@section('content')
<section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <h2 class="heading-title heading--half-colored"> About us</h2>     
                </header>
            </div>
        </div>
    </div>
</section>
<section class="medium-padding120 responsive-align-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <div class="heading-sup-title">{{$set->site_name}}</div>
                </header>
                <p>{!!$about->about!!}</p>
            </div>
        </div>
    </div>
</section>
@if(count($review)>0)
<section class="pt-mobile-80">
		<div class="container">
			<div class="row medium-padding100">
            @foreach($review as $vreview)
				<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 mb30">
					<div class="crumina-module crumina-testimonial-item testimonial-item--with-bg">
						<div class="testimonial-content">
							<h6 class="testimonial-text">
								<svg class="woox-icon icon-quote-icon quote"><use xlink:href="svg-icons/sprites/icons.svg#icon-quote-icon"></use></svg>
								<svg class="woox-icon icon-quote-icon2 quote quote-close"><use xlink:href="svg-icons/sprites/icons.svg#icon-quote-icon2"></use></svg>
								{{$vreview->review}}
							</h6>
							<div class="author-block">
								<div class="avatar avatar80">
									<img src="{{url('/')}}/asset/review/{{$vreview->image_link}}" alt="avatar">
								</div>
								<div class="author-content">
									<a href="#" class="author-name">{{$vreview->name}}</a>
									<div class="author-prof">{{$vreview->occupation}}</div>
									<ul class="rait-stars">
										<li>
											<svg class="woox-icon icon-star-1"><use xlink:href="{{url('/')}}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1"></use></svg>
										</li>
										<li>
											<svg class="woox-icon icon-star-1"><use xlink:href="{{url('/')}}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1"></use></svg>
										</li>

										<li>
											<svg class="woox-icon icon-star-1"><use xlink:href="{{url('/')}}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1"></use></svg>
										</li>
										<li>
											<svg class="woox-icon icon-star-1"><use xlink:href="{{url('/')}}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1"></use></svg>
										</li>
										<li>
											<svg class="woox-icon icon-star-1"><use xlink:href="{{url('/')}}/asset/frontend/svg-icons/sprites/icons.svg#icon-star-1"></use></svg>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
                </div>
                @endforeach
			</div>
		</div>
    </section>
@endif

@stop
@extends('layout')
@section('css')

@stop
@section('content')
<section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <h2 class="heading-title heading--half-colored">Contact us</h2>     
                </header>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="wow soneFadeUp" data-wow-delay="0.3s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-froms">
                    <form action="{{route('contact-submit')}}" method="post" class="contact-form" data-saasone="contact-froms">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                            <input type="text" name="name" class="form-control input--squared input--dark" placeholder="Name" required>
                            <input type="text" name="mobile" class="form-control input--squared input--dark" placeholder="Mobile" required>
                            </div>
                        </div>
                        <input type="email" name="email" placeholder="Email" class="form-control input--squared input--dark" required>
                        <textarea name="message" placeholder="Your Comment" class="form-control input--squared input--dark height-170" required></textarea> 

                        <button type="submit" class="btn btn--large btn--primary">Send Your Massage</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services address-contact">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="title">Don’t hesitate to contact us for<br>any information.</h2>
        </div>
        
        <div class="medium-padding120">

            <div class="col-lg-4">
              <div class="services-box-wrapper text-center">
                <h5 class="mb-5 fw-500">Our Location</h5>
                <p>{{$set->address}}</p>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="services-box-wrapper text-center">
                <h5 class="mb-5 fw-500 color-2">Email & Phone</h5>
                <p>
                <a href="">{{$set->email}}</a>
                <br>
                <a href="">{{$set->mobile}}</a>
                </p>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="services-box-wrapper text-center">
                <h5 class="mb-5 fw-500">Get In Touch</h5>
                <p>Also find us social media below</p>
				<div class="widget w-contacts">
					<ul class="socials socials--white">
                    @foreach($social as $socials)
                        @if(!empty($socials->value))
						<li class="social-item">
							<a href="{{$socials->value}}">
								<i class="fab fa-{{$socials->type}} woox-icon"></i>
							</a>
                        </li>
                        @endif
                    @endforeach 
					</ul>
				</div>
              </div>
            </div>

        </div>
    </div>
</section>
@stop
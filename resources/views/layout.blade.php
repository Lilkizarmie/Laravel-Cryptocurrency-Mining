<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{url('/')}}"/>
        <title>{{ $title }} | {{$set->site_name}}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
        <meta name="application-name" content="{{$set->site_name}}"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="description" content="{{$set->site_desc}}" />
        <link rel="shortcut icon" href="{{url('/')}}/asset/{{ $logo->image_link2}}" />
        <link rel="apple-touch-icon" href="{{url('/')}}/asset/{{ $logo->image_link2}}" />
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/asset/{{ $logo->image_link2}}" />
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/asset/{{ $logo->image_link2}}" />
        <link rel="stylesheet" href="{{url('/')}}/asset/global_assets/css/icons/fontawesome/styles.min.css" />
        <link rel="stylesheet" href="{{url('/')}}/asset/css/plugins.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/frontend/css/theme-styles.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/frontend/css/blocks.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/frontend/css/widgets.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/frontend/css/font-awesome.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,600,700&display=swap">
        <link rel="stylesheet" href="{{url('/')}}/asset/frontend/css/sweetalert.css" type="text/css">
         @yield('css')
    </head>
<!-- header begin-->
<body class="crumina-grid">

<!-- Preloader -->

<div id="hellopreloader">
	<div class="preloader">
		<svg width="135" height="140" fill="#fff">
			<rect width="15" height="120" y="10" rx="6">
				<animate attributeName="height" begin="0.5s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0.5s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
			<rect width="15" height="120" x="30" y="10" rx="6">
				<animate attributeName="height" begin="0.25s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0.25s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
			<rect width="15" height="140" x="60" rx="6">
				<animate attributeName="height" begin="0s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
			<rect width="15" height="120" x="90" y="10" rx="6">
				<animate attributeName="height" begin="0.25s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0.25s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
			<rect width="15" height="120" x="120" y="10" rx="6">
				<animate attributeName="height" begin="0.5s" calcMode="linear" dur="1s" repeatCount="indefinite" values="120;110;100;90;80;70;60;50;40;140;120" />
				<animate attributeName="y" begin="0.5s" calcMode="linear" dur="1s" repeatCount="indefinite" values="10;15;20;25;30;35;40;45;50;0;10" />
			</rect>
		</svg>

		<div class="text">Loading ...</div>
	</div>
</div>
<header class="header" id="site-header">
	<div class="container">
		<div class="header-content-wrapper">
			<a href="{{route('home')}}" class="site-logo">
				<img src="{{url('/')}}/asset/{{$logo->image_link}}" alt="Woox">
			</a>

			<nav id="primary-menu" class="primary-menu">

				<!-- menu-icon-wrapper -->
				<a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
					<span id="menu-icon-wrapper" class="menu-icon-wrapper">
						<svg width="1000px" height="1000px">
							<path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
							<path id="pathE" d="M 300 500 L 700 500"></path>
							<path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
						</svg>
					</span>
                </a>
				<ul class="primary-menu-menu">
					<li class="menu-item-has-children">
						<a href="javascript:void;">Blog</a>
						<ul class="sub-menu">
                            @foreach($cat as $vcat)
                                <li>
                                    <a href="{{url('/')}}/cat/{{$vcat->id}}/1">
                                        {{$vcat->categories}}
                                    </a>
                                </li>
                            @endforeach
						</ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void;">More</a>
                        <ul class="sub-menu">
                            @foreach($pages as $vpages)
                                @if(!empty($vpages))
                                <li>
                                    <a href="{{url('/')}}/page/{{$vpages->id}}">{{$vpages->title}}</a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void;">Help</a>
                        <ul class="sub-menu">
                            <li><a href="{{route('faq')}}">FAQs</a></li>
                            <li><a href="{{route('blog')}}">Supporting articles</a></li>
                            <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                            <li><a href="{{route('privacy')}}">Privacy policy</a></li>
                            <li><a href="{{route('contact')}}">Contact us</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('about')}}" >About us</a>
                    </li>
                    <li>
                        <a href="{{route('login')}}" >Login</a>
                    </li>                    
                    <li>
                        <a href="{{route('register')}}" >Register</a>
                    </li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<div class="main-content-wrapper">
<!-- header end -->

@yield('content')


<!-- footer begin -->
</div>
<footer id="site-footer" class="footer ">

	<canvas id="can"></canvas>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 col-xs-12">
				<div class="widget w-info">
					<a href="javascript:void" class="site-logo">
						<img src="{{url('/')}}/asset/{{$logo->image_link}}" alt="Woox">
					</a>
					<p>{{$set->site_desc}}</p>
				</div>

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

	<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 col-xs-12">

					<span>© All right reserved {{date('Y')}}.</span>
					<span>{{$set->site_name}} - {{$set->title}}.</span>
				</div>

			</div>
		</div>
	</div>

	<a class="back-to-top" href="#">
		<svg class="woox-icon icon-top-arrow">
			<use xlink:href="{{url('/')}}/asset/frontend/svg-icons/sprites/icons.svg#icon-top-arrow"></use>
		</svg>
	</a>
</footer>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/620193ba9bd1f31184db6b5f/1frb2i4es';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
        <!-- end footer -->


    <!-- Dependency Scripts -->
<script src="{{url('/')}}/asset/frontend/js/method-assign.js"></script>
<script src="{{url('/')}}/asset/frontend/js/jquery-3.3.1.js"></script>
<script src="{{url('/')}}/asset/frontend/js/sweetalert.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/leaflet.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/MarkerClusterGroup.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/crum-mega-menu.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/waypoints.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/jquery-circle-progress.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/segment.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/bootstrap.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/imagesLoaded.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/jquery.matchHeight.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/jquery-countTo.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/Headroom.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/jquery.magnific-popup.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/popper.min.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/particles.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/perfect-scrollbar.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/jquery.datetimepicker.full.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/svgxuse.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/select2.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/smooth-scroll.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/sharer.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/isotope.pkgd.min.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/ajax-pagination.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/swiper.min.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/material.min.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/orbitlist.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/highstock.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/bootstrap-datepicker.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/TimeCircles.js"></script>
<script src="{{url('/')}}/asset/frontend/js/js-plugins/ion.rangeSlider.js"></script>
<!-- FontAwesome 5.x.x JS -->
<script defer src="{{url('/')}}/asset/frontend/fonts/fontawesome-all.js"></script>
<script src="{{url('/')}}/asset/frontend/js/main.js"></script>

@include('sweetalert::alert')
@yield('script')
@if (session('success'))
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
    <script>
    @if(Session::has('message'))
    "use strict";
    var type = "{{Session::get('alert-type','info')}}";
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>


</body>

</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href="{{url('/')}}"/>
    <title>{{ $title }} | {{$set->site_name}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
    <meta name="application-name" content="{{$set->site_name}}"/>
    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="description" content="{{$set->site_desc}}" />
    <link rel="shortcut icon" href="{{url('/')}}/asset/{{ $logo->image_link2}}" />
    <link rel="apple-touch-icon" href="{{url('/')}}/asset/{{ $logo->image_link2}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/asset/{{ $logo->image_link2 }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/asset/{{ $logo->image_link2 }}" />
    <link rel="stylesheet" href="{{url('/')}}/asset/frontend/css/sweetalert.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/asset/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/asset/global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/asset/user/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/asset/user/assets/css/bootstrap_limitless.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/asset/user/assets/css/layout.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/asset/user/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/asset/user/assets/css/colors.css" rel="stylesheet" type="text/css">
    <script src="{{url('/')}}/asset/global_assets/js/main/jquery.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/ui/ripple.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/pickers/daterangepicker.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/ui/prism.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/plugins/forms/styling/switch.min.js"></script>
    <script src="{{url('/')}}/asset/user/assets/js/app.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/dashboard.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/login.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/datatables_advanced.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/datatables_basic.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/form_layouts.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/form_select2.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/form_validation.js"></script>
    <script src="{{url('/')}}/asset/global_assets/js/demo_pages/datatables_responsive.js"></script>
    <script src="{{url('/')}}/asset/tinymce/tinymce.min.js"></script>
    <script src="{{url('/')}}/asset/tinymce/init-tinymce.js"></script>
    @yield('css')
    </head>

<body class="">
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light navbar-static">
    <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
        <div class="navbar-brand navbar-brand-md">
          <a href="{{url('/')}}" class="d-inline-block">
		  	<img src="{{url('/')}}/asset/{{ $logo->image_link }}">
          </a>
        </div>
        
        <div class="navbar-brand navbar-brand-xs">
          <a href="{{url('/')}}" class="d-inline-block">
		  	<img src="{{url('/')}}/asset/{{ $logo->image_link }}">
          </a>
        </div>
    </div>
		<div class="d-md-none">
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
          				<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
			<span class="navbar-text ml-md-3 mr-md-auto">
				<span class="badge badge-mark border-orange-300 mr-2"></span>
				Welcome back, {{Auth::guard('admin')->user()->username}}
			</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="{{url('/')}}/asset/profile/react.jpg" class="rounded-circle" alt="">
						<span>{{Auth::guard('admin')->user()->username}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{route('admin.account')}}" class="dropdown-item"><i class="icon-lock"></i> Account information</a>
						<a href="{{route('admin.logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="page-content">


		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">
				
				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<h6 class="mb-0 text-white text-shadow-dark">{{$set->site_name}}</h6>
							<span class="font-size-sm text-white text-shadow-dark">{{$set->title}}</span>
						</div>
					</div>
					<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
				</div>
				<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="{{route('admin.account')}}" class="nav-link">
									<i class="icon-lock"></i>
									<span>Account information</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('admin.logout')}}" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				<!-- /user menu -->
	
				
				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item">
							<a href="{{route('admin.dashboard')}}" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-lan2"></i><span>Transfer</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Transfer">
								<li class="nav-item"><a href="{{route('admin.transfers')}}" class="nav-link"><i class="icon-office"></i>Transfer logs</a></li>
								<li class="nav-item"><a href="{{route('admin.referrals')}}" class="nav-link"><i class="icon-city"></i>Referral earnings</a></li>
							</ul>
						</li>											
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-user-plus"></i> <span>User Manangement</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="User Manangement">
								<li class="nav-item"><a href="{{route('admin.users')}}" class="nav-link"><i class="icon-user"></i> Client accounts</a></li>
								<li class="nav-item"><a href="{{route('admin.ticket')}}" class="nav-link"><i class="icon-bubbles5"></i>Support ticket</a></li>
								<li class="nav-item"><a href="{{route('user.promo')}}" class="nav-link"><i class="icon-envelope"></i>Promotional Emails</a></li>
								<li class="nav-item"><a href="{{route('admin.message')}}" class="nav-link"><i class="icon-bubbles5"></i>Messages</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-cogs spinner"></i> <span>System configuration</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="System configuration">
								<li class="nav-item"><a href="{{route('admin.setting')}}" class="nav-link"><i class="icon-hammer-wrench"></i>Settings</a></li>
								<li class="nav-item"><a href="{{route('admin.email')}}" class="nav-link"><i class="icon-envelope"></i>Email</a></li>
								<li class="nav-item"><a href="{{route('admin.sms')}}" class="nav-link"><i class="icon-bubble"></i>Sms</a></li>
								<li class="nav-item"><a href="{{route('admin.account')}}" class="nav-link"><i class="icon-user"></i>Account information</a></li>
							</ul>
						</li>						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-pulse2"></i> <span>Investment</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="PY scheme">
								<li class="nav-item"><a href="{{route('admin.plan.create')}}" class="nav-link"><i class="icon-quill4"></i>Create plan</a></li>
								<li class="nav-item"><a href="{{route('admin.py.plans')}}" class="nav-link"><i class="icon-puzzle4"></i>Plans</a></li>
								<li class="nav-item"><a href="{{route('admin.py.completed')}}" class="nav-link"><i class="icon-cup2"></i>Completed</a></li>
								<li class="nav-item"><a href="{{route('admin.py.pending')}}" class="nav-link"><i class="icon-spinner2 spinner"></i>Pending</a></li>
							</ul>
						</li>												
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-credit-card"></i><span>Deposit system</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Deposit">
								<li class="nav-item"><a href="{{route('admin.deposit.method')}}" class="nav-link"><i class="icon-puzzle4"></i>Payment gateways</a></li>
								<li class="nav-item"><a href="{{route('admin.deposit.log')}}" class="nav-link"><i class="icon-list-unordered"></i>Deposit log</a></li>
								<li class="nav-item"><a href="{{route('admin.deposit.pending')}}" class="nav-link"><i class="icon-spinner2 spinner"></i>Pending deposit</a></li>
								<li class="nav-item"><a href="{{route('admin.deposit.approved')}}" class="nav-link"><i class="icon-thumbs-up2"></i>Approved deposit</a></li>
								<li class="nav-item"><a href="{{route('admin.deposit.declined')}}" class="nav-link"><i class="icon-thumbs-down2"></i>Declined deposit</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-share2"></i><span>Withdraw system</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Withdraw">
								<li class="nav-item"><a href="{{route('admin.withdraw.log')}}" class="nav-link"><i class="icon-list-unordered"></i>Withdraw log</a></li>
								<li class="nav-item"><a href="{{route('admin.withdraw.unpaid')}}" class="nav-link"><i class="icon-spinner2 spinner"></i>Unpaid withdrawal</a></li>
								<li class="nav-item"><a href="{{route('admin.withdraw.approved')}}" class="nav-link"><i class="icon-thumbs-up2"></i>Approved withdrawal</a></li>
								<li class="nav-item"><a href="{{route('admin.withdraw.declined')}}" class="nav-link"><i class="icon-accessibility"></i>Declined withdrawal</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-magazine"></i> <span>News Section</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="News Section">
								<li class="nav-item"><a href="{{route('blog.create')}}" class="nav-link"><i class="icon-quill4"></i>New Post</a></li>
								<li class="nav-item"><a href="{{route('admin.blog')}}" class="nav-link"><i class="icon-newspaper"></i>Articles</a></li>
								<li class="nav-item"><a href="{{route('admin.cat')}}"class="nav-link"><i class="icon-clipboard6"></i>Category</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-home4"></i> <span>Web control</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="News Section">
								<li class="nav-item"><a href="{{route('homepage')}}" class="nav-link"><i class="icon-home4"></i>Homepage</a></li>
								<li class="nav-item"><a href="{{route('admin.logo')}}" class="nav-link"><i class="icon-image2"></i>Logo & Favicon</a></li>	
								<li class="nav-item"><a href="{{route('admin.review')}}"class="nav-link"><i class="icon-clipboard6"></i>Platform Review</a></li>
								<li class="nav-item"><a href="{{route('admin.service')}}"class="nav-link"><i class="icon-accessibility"></i>Services</a></li>
								<li class="nav-item"><a href="{{route('admin.page')}}" class="nav-link"><i class="icon-stack"></i>Webpages</a></li>
								<li class="nav-item"><a href="{{route('admin.currency')}}" class="nav-link"><i class="icon-coin-euro"></i>Currency</a></li>
								<li class="nav-item"><a href="{{route('admin.faq')}}" class="nav-link"><i class="icon-question4"></i>FAQs</a></li>
								<li class="nav-item"><a href="{{route('admin.terms')}}" class="nav-link"><i class="icon-file-check"></i>Terms & Condition</a></li>
								<li class="nav-item"><a href="{{route('privacy-policy')}}" class="nav-link"><i class="icon-file-check"></i>Privacy policy</a></li>
								<li class="nav-item"><a href="{{route('about-us')}}" class="nav-link"><i class="icon-file-check"></i>About us</a></li>
								<li class="nav-item"><a href="{{route('social-links')}}" class="nav-link"><i class="icon-share2"></i>Social Links</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<div class="content-wrapper">
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><span class="font-weight-semibold">{{$title}}</span></h4>
					</div>
				</div>
			</div>
@yield('content')


<!-- footer begin -->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/{{$set->tawk_id }}/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
  <script src="{{url('/')}}/asset/frontend/js/sweetalert.js"></script>
	</div>
	<!-- /page content -->

</body>
</html>
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
<script type="text/javascript">
  $(window).on('load', function () {
    $('#modal-notification').modal('show');
  });
</script>


@extends('loginlayout')

@section('content')
<div class="main-content bg-dark" style="background-image:url('{{url('/')}}/asset/frontend/img/bg-2.png');">
    <!-- Header -->
    <div class="header py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">{{ __('Reset Password') }}</h1>
              <p class="text-lead text-white">{{$ui['header_body']}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-white text-center mt-2 mb-3">Recover your account</div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" action="{{ route('user.password.email') }}" method="post">
              @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83 text-dark"></i></span>
                    </div>
                    <input class="form-control text-dark" placeholder="Email" type="email" name="email">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-default my-4">Proceed</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="{{route('login')}}" class="text-white"><small>Sign in</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="{{route('register')}}" class="text-white"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop
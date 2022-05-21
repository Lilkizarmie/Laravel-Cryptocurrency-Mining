@extends('userlayout')

@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-6">
        <div class="card bg-dark">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0 text-white">Change Password</h3>
          </div>
          <div class="card-body">
            <form action="{{route('change.password')}}" method="post">
            @csrf
                <div class="form-group row">
                  <label class="col-form-label col-lg-3 text-white">Old</label>
                  <div class="col-lg-9">
                    <input type="password" name="current_password" class="form-control bg-dark text-white" required>
                    @if ($errors->has('current_password'))
                        <span class="error form-error-msg ">
                            {{ $errors->first('current_password') }}
                        </span>
                    @endif
                  </div>
                </div>
              <div class="form-group row">
                  <label class="col-form-label col-lg-3 text-white">New</label>
                  <div class="col-lg-9">
                    <input type="password" name="password" class="form-control bg-dark text-white" required>
                    @if ($errors->has('password'))
                        <span class="error form-error-msg ">
                          {{ $errors->first('password') }}
                        </span>
                    @endif
                  </div>
                </div>  
              <div class="form-group row">
                  <label class="col-form-label col-lg-3 text-white">Confirm</label>
                  <div class="col-lg-9">
                    <input type="password" name="password_confirmation" class="form-control bg-dark text-white" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="error form-error-msg ">
                            {{ $errors->first('password_confirmation') }}
                        </span>
                    @endif
                  </div>
                </div>                
              <div class="text-right">
                <button type="submit" class="btn btn-neutral">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <!-- Basic layout-->
        <div class="card bg-dark">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0 text-white">Change Pin <span>(Default pin on registration is <span class="">0000</span></span>)</h3>
          </div>

          <div class="card-body">
            <form action="{{route('change.pin')}}" method="post">          
              @csrf
                <div class="form-group row">
                  <label class="col-form-label col-lg-3 text-white">Old</label>
                  <div class="col-lg-9">
                    <input type="password" name="current_pin" class="form-control bg-dark text-white" required>
                    @if ($errors->has('current_pin'))
                        <span class="error form-error-msg ">
                            {{ $errors->first('current_pin') }}
                        </span>
                    @endif
                  </div>
                </div>
              <div class="form-group row">
                  <label class="col-form-label col-lg-3 text-white">New</label>
                  <div class="col-lg-9">
                    <input type="password" name="pin" class="form-control bg-dark text-white" required>
                    @if ($errors->has('pin'))
                        <span class="error form-error-msg ">
                            {{ $errors->first('pin') }}
                        </span>
                    @endif
                  </div>
                </div>  
              <div class="form-group row">
                  <label class="col-form-label col-lg-3 text-white">Confirm</label>
                  <div class="col-lg-9">
                    <input type="password" name="pin_confirmation" class="form-control bg-dark text-white" required>
                    @if ($errors->has('pin_confirmation'))
                        <span class="error form-error-msg ">
                            {{ $errors->first('pin_confirmation') }}
                        </span>
                    @endif
                  </div>
                </div>                
              <div class="text-right">
                <button type="submit" class="btn btn-neutral">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /basic layout -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-dark">
          <div class="card-header header-elements-inline">
            <h3 class="mb-0 text-white">Two-Factor Security Option</h3>
          </div>
          <div class="card-body text-white">
            <div class="align-item-sm-center flex-sm-nowrap text-left">
              <div class="">
                <p>
                  Two-factor authentication is a method for protection your web account. 
                  When it is activated you need to enter not only your password, but also a special code. 
                  You can receive this code by in mobile app. 
                  Even if third person will find your password, then can't access with that code.
                </p>
                <span class="badge badge-pill badge-primary">
                  @if($user->fa_status==0)
                    Disabled
                  @else
                    Active
                  @endif
                </span>
                <p>
                  1) Install an authentication app on your device. 
                  Any app that supports the Time-based One-Time Password (TOTP) protocol should work.
                </p>
                <p>2) Use the authenticator app to scan the barcode below.</p>
                <img src="{{$image}}" style="max-width:100%; height:auto;"><br><br>
                <p>3) Enter the code generated by the authenticator app</p>
                <form action="{{route('change.2fa')}}" method="post">          
                  @csrf
                  <div class="form-group row">
                    <div class="col-lg-6">
                      <input type="number" name="code" class="form-control bg-dark text-white" required>
                        <input type="hidden"  name="vv" value="{{$secret}}">
                      @if($user->fa_status==0)
                        <input type="hidden"  name="type" value="1">
                      @elseif($user->fa_status==1)
                        <input type="hidden"  name="type" value="0">
                      @endif
                    </div>
                  </div>             
                  <div class="text-left">
                    <button type="submit" class="btn btn-neutral">
                      @if($user->fa_status==0)
                        Enable
                      @else
                        Disable
                      @endif
                    </button>
                  </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@extends('userlayout')
@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <h1 class="display-2 text-default">
      @if(Auth::user()->status == 1 )
      Account has been blocked
      @else
      Account verification
      @endif</h1>
    @if(Auth::user()->email_verify == 0 )
      <div class="card">
        <div class="card-header header-elements-inline">
          <h3 class="mb-0">Verify account</h3>
        </div>
        <div class="card-body">
          <form action="{{route('user.send-emailVcode') }}" method="post">
            @csrf
            <div class="form-group row">
              <label class="col-form-label col-lg-2">Email</label>
              <div class="col-lg-10">
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                  <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly required>
              </div>
            </div>               
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Send code</button>
            </div>
          </form>
        </div>        
        <div class="card-body">
          <form action="{{ route('user.email-verify')}}" method="post">
            @csrf
            <div class="form-group row">
              <label class="col-form-label col-lg-2">Enter Code</label>
              <div class="col-lg-10">
                <input type="hidden"  name="id" value="{{Auth::user()->id}}">
                  <input type="text" name="email_code" class="form-control" placeholder="Verification Code" required>
              </div>
            </div>               
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    @elseif(Auth::user()->phone_verify == 0)
    <div class="card">
        <div class="card-header header-elements-inline">
          <h3 class="mb-0">Verify account</h3>
        </div>
        <div class="card-body">
          <form action="{{route('user.send-vcode') }}" method="post">
            @csrf
            <div class="form-group row">
              <label class="col-form-label col-lg-2"> Mobile No</label>
              <div class="col-lg-10">
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                  <input type="text" class="form-control" value="{{Auth::user()->phone}}" readonly required>
              </div>
            </div>               
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Send code</button>
            </div>
          </form>
        </div>        
        <div class="card-body">
          <form action="{{ route('user.sms-verify')}}" method="post">
            @csrf
            <div class="form-group row">
              <label class="col-form-label col-lg-2">Enter Code</label>
              <div class="col-lg-10">
                <input type="hidden"  name="id" value="{{Auth::user()->id}}">
                  <input type="text" name="sms_code" class="form-control" placeholder="Verification Code" required>
              </div>
            </div>               
            <div class="text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
  @endif
@stop
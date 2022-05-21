@extends('userlayout')
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="bg-transparent">
        <div class="">
          <div class="align-item-sm-center flex-sm-nowrap text-center">
            <div class="">
              <h6 class="text-dark"> PLEASE SEND EXACTLY <span class="text-green"> {{ $bcoin }}</span> BTC</h6>
              <h5 class="text-dark">TO <span class="text-green"> {{ $wallet}}</span></h5>
              {!! $qrurl !!}
              <br><br>
              <h4 class="text-dark" >SCAN TO SEND</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
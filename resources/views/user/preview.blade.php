@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-dark">
          <div class="card-body text-dark">
            <div class="">
              <h3 class="text-yellow">{{$gate->gateway['name']}}</h3>
              <span class="mt-0 mb-5 text-white">Amount: {{$currency->symbol.number_format($gate->amount)}}</span><br>
              <span class="mt-0 mb-5 text-white">Charge: {{$currency->symbol.number_format($gate->charge)}}</span><br>
              <span class="mt-0 mb-5 text-white">Total: {{$currency->symbol.number_format($gate->amount+$gate->charge)}}</span><br><br>
              <a href="{{route('osit.confirm')}}" class="btn btn-neutral btn-sm">{{__('Confirm')}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop
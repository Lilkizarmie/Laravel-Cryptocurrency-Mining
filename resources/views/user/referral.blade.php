@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div class="card bg-dark">
        <div class="card-header bg-transparent">
          <h3 class="mb-0 text-white">Referrals</h3>
        </div>
        <div class="table-responsive py-4">
          <table class="table align-items-center table-flush table-dark">
            <thead class="thead-dark">
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Username</th>
                <th>Created</th>
                <th>Updated</th>
              </tr>
            </thead>
            <tbody>  
              @foreach($referral as $k=>$val)
                <tr>
                  <td>{{++$k}}.</td>
                  <td>{{$val->user->name}}</td>
                  <td>{{$val->user->username}}</td>
                  <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                  <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>   
    <div class="col-lg-12">
      <div class="card bg-dark">
        <div class="card-header bg-transparent">
          <h3 class="mb-0 text-white">Earnings</h3>
        </div>
        <div class="table-responsive py-4">
        <table class="table align-items-center table-flush table-dark">
          <thead class="thead-dark">
            <tr>
              <th>S/N</th>
              <th>Amount</th>
              <th>Name</th>
              <th>Username</th>
              <th>Created</th>
              <th>Updated</th>
            </tr>
          </thead>
          <tbody>  
            @foreach($earning as $k=>$val)
              <tr>
                <td>{{++$k}}.</td>
                <td>{{$currency->symbol.substr($val->amount,0,9)}}</td>
                <td>{{$val->user->name}}</td>
                <td>{{$val->user->username}}</td>
                <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
@stop
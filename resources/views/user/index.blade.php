@extends('userlayout')

@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
          <div class="col-lg-6">
            <div class="card bg-dark border-0">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  
                  <div class="col">
                    <h5 class="card-title text-muted mb-0 text-white">Available profit</h5>
                    <span class="h2 font-weight-bold mb-0 text-yellow">{{substr($user->profit,0,9)}}BTC</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
          <div class="card bg-dark border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-muted mb-0 text-white">Referral earnings</h5>
                  <span class="h2 font-weight-bold mb-0 text-yellow">{{substr($user->ref_bonus,0,6)}}BTC</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="">
          @if($set->upgrade_status==1)
            @if($user->upgrade==0)
            <div class="card bg-dark shadow">
              <!-- Card header -->
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-8">
                    <!-- Title -->
                    <h5 class="h4 mb-0 text-white">Start receiving bonuses</h5>
                  </div>
                </div>
                <p class="card-text mb-4 text-white">You can now receive certain bonus of total profit after mining activity ends.</p>
                <a href="#" data-toggle="modal" data-target="#modal-formx" class="btn btn-sm btn-neutral">Upgrade account</a>
                <div class="modal fade" id="modal-formx" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-body p-0">
                        <div class="card border-0 mb-0">
                          <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-left mt-2 mb-3">Don't let your money sit there, upgrade your account & start receiving bonuses</div> 
                            <div class="text-left mt-2 mb-3">Upgrade fee costs {{$set->upgrade_fee}}BTC</div> 
                              <div class="text-left">
                              <a href="{{route('user.upgrade')}}" class="btn btn-neutral">Upgrade</a>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          @endif 
        @endif 

          </div>
        </div> 
        <div class="col-md-6">
        <div class="card bg-dark border-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h3 class="card-title mb-0 text-white">2fa security</h3>
                  <span class="badge badge-pill badge-primary">
                    @if($user->fa_status==0)
                      Disabled
                    @else
                      Active
                    @endif
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="card bg-dark">
            <!-- Card header -->
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col-8">
                  <!-- Surtitle -->
                  <h6 class="surtitle text-yellow">Last 5 mining operations</h6>
                  <!-- Title -->
                  <h5 class="h3 mb-0 text-white">Progress track</h5>
                </div>
              </div>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <!-- List group -->
              <ul class="list-group list-group-flush list my--3">
              @foreach($profit as $k=>$val)
                <li class="list-group-item px-0 bg-dark">
                  <div class="row align-items-center">
                    <div class="col">
                      <h5 class="text-white">{{$val->trx}} <span class="text-yellow">@ {{$val->plan->hashrate}}</span></h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-yellow" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{($val->profit*100)/$val->amount}}%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>      
      </div>
    </div>
     <div class="col-lg-4">
      @if($set->kyc==1)
      <div class="card bg-dark">
        <!-- Card image -->
        <!-- List group -->
        <!-- Card body -->
        <div class="card-body">
          <h3 class="card-title mb-3 text-white">Identity verification</h3>
          <p class="card-text mb-4 text-white">Upload an identity document, for example, driver licence, voters card, international passport, national ID.</p>
          <span class="badge badge-pill text-yellow">
            @if($user->kyc_status==0)
              Unverified
            @else
              Verified
            @endif
          </span>

            @if(empty($user->kyc_link))
            <div class="row align-items-center">
                <div class="col-12 text-right">
                  <a href="{{route('user.profile')}}#kyc" class="btn btn-sm btn-neutral">Upload</a>
                </div>
            </div>
            @endif
        </div>
      </div>
      @endif
      @if($set->referral==1)
      <div class="card bg-dark">
        <div class="card-header bg-transparent header-elements-inline">
          <h3 class="mb-0 text-white">Referral link</h3>
        </div>
        <div class="card-body">
          <p class="text-white">Automatically top up your account balance by sharing your referral link, Earn a percentage of whatever plan your referred user buys.</p>
          <form action="javascript:void;" method="post">
             <div class="form-group row">
                <div class="col-lg-12">
                <input type="url" readonly  class="form-control bg-dark text-yellow" value="{{url('/')}}/referral/{{$user->username}}">
                </div>
              </div>                  
          </form>
        </div>
      </div>
      @endif
  </div>  </div>
@stop
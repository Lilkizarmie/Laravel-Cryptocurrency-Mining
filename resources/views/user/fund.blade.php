
@extends('userlayout')

@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">  
      @foreach($gateways as $val)   
       <div class="col-md-4">
          <div class="card bg-dark">
            <!-- Card body -->
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col">
                  <h4 class="mb-0 text-yellow">
                    <a href="#" data-toggle="modal" data-target="#modal-form{{$val->id}}">{{$val->name}}</a>
                  </h4>
                  <p class="text-sm text-white mb-0">Limit: {{$currency->symbol.number_format($val->minamo).' - '.$currency->symbol.number_format($val->maxamo)}}</p>
                  <p class="text-sm text-white mb-0">Charge: {{$currency->symbol.$val->fixed_charge}} + {{$val->percent_charge}}%</p>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal fade" id="modal-form{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary border-0 mb-0">
                <div class="card-header bg-transparent pb-5">
                  <div class="text-dark text-center mt-2 mb-3"><small>Deposit via</small></div>
                  <div class="btn-wrapper text-center">
                    <a href="javascript:void;" class="btn btn-neutral btn-icon">
                      <span class="btn-inner--icon"><img src="{{url('/')}}/asset/payment_gateways/{{$val->gateimg}}"></span>
                    </a>
                  </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">
                  <form role="form" action="{{route('fund.submit')}}" method="post">
                  @csrf
                    <div class="form-group mb-3">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text">{{$currency->symbol}}</span>
                        </div>
                        <input type="number" step="any" class="form-control" placeholder="" name="amount" required>
                        <input type="hidden" name="gateway" value="{{$val->id}}">  
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary my-4">Preview</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      @endforeach
    </div>
    <div class="card bg-dark" id="other">
      <div class="card-header header-elements-inline bg-transparent">
        <h3 class="mb-0 text-white">Deposit logs</h3>
      </div>
      <div class="table-responsive py-4">
        <table class="table table-flush table-dark" id="datatable-basic">
          <thead class="thead-dark">
            <tr>
              <th>S/N</th>
              <th>Reference ID</th>
              <th>Amount</th>
              <th>BTC</th>
              <th>Method</th>
              <th>Status</th>
              <th>Charge</th>
              <th>Created</th>
              <th>Updated</th>
            </tr>
          </thead>
          <tbody>  
            @foreach($deposits as $k=>$val)
              <tr>
                <td>{{++$k}}.</td>
                <td>#{{$val->trx}}</td>
                <td>{{$currency->symbol.number_format($val->amount)}}</td>
                <td>{{substr($val->btc_amo,0,9)}}BTC</td>
                <td>{!!$val->gateway['name']!!}</td>
                <td>
                @if($val->status==1)
                  <span class="badge badge-success">Approved</span>
                @elseif($val->status==0)
                  <span class="badge badge-danger">Pending</span>                  
                @elseif($val->status==2)
                  <span class="badge badge-info">Declined</span>
                @endif
                </td>
                <td>{{$currency->symbol.number_format($val->charge)}}</td>
                <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@stop
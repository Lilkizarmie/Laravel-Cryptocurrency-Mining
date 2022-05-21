@extends('userlayout')

@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">

        <!-- Basic layout-->
        <div class="card bg-dark">
          <div class="card-header header-elements-inline bg-transparent">
            <h3 class="mb-0 text-yellow">Start request</h3>
          </div>

          <div class="card-body">
            <form action="{{route('withdraw.submit')}}" method="post">
              @csrf
              <div class="form-group row">
                <label class="col-form-label col-lg-2 text-white">Amount</label>
                <div class="col-lg-10">
                  <div class="input-group input-group-merge">
                    <div class="input-group-prepend bg-secondary">
                      <span class="input-group-text text-white bg-dark">BTC</span>
                    </div>
                    <input type="number" step="any" name="amount" maxlength="10" class="form-control bg-dark text-white" placeholder="0.0000001" required="">
                  </div>
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-form-label col-lg-2 text-white">Withdraw type</label>
                <div class="col-lg-10">
                  <select class="form-control select bg-dark text-white" name="type" required>
                    <option value="1">Trading profit</option>
                    <option value="2">Account balance</option>
                    <option value="3">Referral earnings</option>
                  </select>
                </div>
              </div> 
              <div class="form-group row">
                <label class="col-form-label col-lg-2 text-white">Wallet address</label>
                <div class="col-lg-10">
                <input type="text" name="details"  class="form-control bg-dark text-white" placeholder="ygiuvfygr3847t7364g7" required="">
                </div>
              </div>                
              <div class="text-right">
                <button type="submit" class="btn btn-secondary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /basic layout -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-dark" id="logs">
          <div class="card-header header-elements-inline bg-transparent">
            <h3 class="mb-0 text-white">Cashout History</h3>
          </div>
          <div class="table-responsive py-4">
            <table class="table table-flush table-dark" id="datatable-buttons">
              <thead class="thead-dark">
                <tr>
                <th>S/n</th>
                <th>Amount</th>
                <th>Wallet address</th>                                                                        
                <th>Status</th>  
                <th>Type</th>  
                <th>Created</th>  
                <th>Updated</th>  
                </tr>
              </thead>
              <tbody> 
              @foreach($withdraw as $k=>$val) 
              <tr>
                <td>{{++$k}}.</td>
                <td>{{substr($val->amount,0,9)}}BTC</td>
                <td>{{$val->details}}</td>
                <td>          
                  @if($val->status==1)
                    <span class="badge badge-success">Approved</span>
                  @elseif($val->status==0)
                    <span class="badge badge-danger">Pending</span>                  
                  @elseif($val->status==2)
                    <span class="badge badge-info">Declined</span>
                  @endif
                </td>                
                <td>          
                  @if($val->type==1)
                    <span class="badge badge-info">Trading profit</span>
                  @elseif($val->type==2)
                    <span class="badge badge-info">Account balance</span>                  
                  @elseif($val->type==3)
                    <span class="badge badge-info">Referral bonus</span>
                  @endif
                </td>
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
</div>
@stop
@extends('master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Update account information</h6>
                </div>
                <div class="card-body">
                        <form action="{{url('admin/profile-update')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Username:</label>
                            <div class="col-lg-10">
                                <input type=""hidden value="{{$client->id}}" name="id">
                                <input type="text" name="username" class="form-control" value="{{$client->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name:</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" value="{{$client->name}}">
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Email:</label>
                            <div class="col-lg-10">
                                <input type="email" name="email" class="form-control" readonly value="{{$client->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Mobile:</label>
                            <div class="col-lg-10">
                                <input type="text" name="mobile" class="form-control" value="{{$client->phone}}">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Country:</label>
                            <div class="col-lg-10">
                                <input type="text" name="country" class="form-control" value="{{$client->country}}">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">City:</label>
                            <div class="col-lg-10">
                                <input type="text" name="city" class="form-control" value="{{$client->city}}">
                            </div>
                        </div>                       
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Zip code:</label>
                            <div class="col-lg-10">
                                <input type="text" name="zip_code" class="form-control" value="{{$client->zip_code}}">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Address:</label>
                            <div class="col-lg-10">
                                <input type="text" name="address" class="form-control" value="{{$client->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Balance:</label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">BTC</span>
                                    </span>
                                    <input type="number" name="balance"step="any" max-length="10" value="{{convertFloat($client->balance)}}" class="form-control">
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Status<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                        @if($client->email_verify==1)
                                            <input type="checkbox" name="email_verify" class="form-check-input-switchery" value="1" checked>
                                        @else
                                            <input type="checkbox" name="email_verify" class="form-check-input-switchery" value="1">
                                        @endif  
                                        Email verification  
                                    </label>
                                </div>                                
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                        @if($client->phone_verify==1)
                                            <input type="checkbox" name="phone_verify" class="form-check-input-switchery" value="1" checked>
                                        @else
                                            <input type="checkbox" name="phone_verify" class="form-check-input-switchery" value="1">
                                        @endif  
                                        Phone verification  
                                    </label>
                                </div>                                  
                                <div class="form-check form-check-inline form-check-switchery">
                                    <label class="form-check-label">
                                        @if($client->upgrade==1)
                                            <input type="checkbox" name="upgrade" class="form-check-input-switchery" value="1" checked>
                                        @else
                                            <input type="checkbox" name="upgrade" class="form-check-input-switchery" value="1">
                                        @endif  
                                        Upgrade account
                                    </label>
                                </div>                                
                            </div>
                        </div>                
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Update<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" src="{{url('/')}}/asset/profile/{{$client->image}}" width="120" height="120" alt="">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>Joined: <span class="font-weight-semibold">{{date("Y/m/d h:i:A", strtotime($client->created_at))}}</span></li>
                                <li>Last Login: <span class="font-weight-semibold">{{date("Y/m/d h:i:A", strtotime($client->last_login))}}</span></li>
                                <li>Last Updated: <span class="font-weight-semibold">{{date("Y/m/d h:i:A", strtotime($client->updated_at))}}</span></li>
                                <li>IP Address: <span class="font-weight-semibold">{{$client->ip_address}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
            @if($set->kyc==1)
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Kyc verification</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    @if($client->kyc_status==0)
                                        Unverified
                                    @else
                                        Verified
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(!empty($client->kyc_link))
                                        <a href="{{url('/')}}/asset/profile/{{$client->kyc_link}}">View</a>
                                    @else
                                        No file
                                    @endif
                                </td>
                                <td class="text-center">
                                @if($client->kyc_status!=1)
                                    @if(!empty($client->kyc_link)) 
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class='dropdown-item' href ="{{url('/')}}/admin/approve-kyc/{{$client->id}}"><i class="icon-eye mr-2"></i>Approve</a>
                                                <a class='dropdown-item' href ="{{url('/')}}/admin/reject-kyc/{{$client->id}}"><i class="icon-eye-blocked2 mr-2"></i>Reject</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                </td>             
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Deposit Logs</h6>
                </div>
                <div class="">
                    <table class="table datatable-show-all">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Amount</th>                                                                       
                                <th>BTC</th>                                                                       
                                <th>Method</th>
                                <th>Ref</th>
                                <th>Charge</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-center">Action</th>    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($deposit as $k=>$val)
                            <tr>
                                <td>{{++$k}}.</td>
                                <td>{{number_format($val->amount).$currency->name}}</td>
                                <td>{{convertFloat($val->btc_amo)}}BTC</td>
                                <td>{{$val->gateway['name']}}</td>
                                <td>{{$val->trx}}</td> 
                                <td>{{number_format($val->charge).$currency->name}}</td> 
                                <td>
                                    @if($val->status==0)
                                        <span class="badge badge-danger">Pending</span>
                                    @elseif($val->status==1)
                                        <span class="badge badge-success">Approved</span> 
                                    @endif
                                </td>  
                                <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                                <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            @if($val->status==0)
                                                <a class='dropdown-item' href="{{url('/')}}/admin/approvedeposit/{{$val->id}}"><i class="icon-thumbs-up3 mr-2"></i>Approve request</a>
                                            @endif
                                                <a data-toggle="modal" data-target="#{{$val->id}}delete" class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>                   
                            </tr>
                            <div id="{{$val->id}}delete" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">   
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="font-weight-semibold">Are you sure you want to delete this?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            <a  href="{{url('/')}}/admin/deposit/delete/{{$val->id}}" class="btn bg-danger">Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach               
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Withdraw logs</h6>
                </div>
                <div class="">
                    <table class="table datatable-show-all">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Amount</th>                                                                     
                                <th>Details</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-center">Action</th>    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($withdraw as $k=>$val)
                            <tr>
                                <td>{{++$k}}.</td>
                                <td>{{substr($val->amount,0,9)}}BTC</td>
                                <td>{{$val->details}}</td>
                                <td>
                                    @if($val->status==0)
                                        <span class="badge badge-danger">Unpaid</span>
                                    @elseif($val->status==1)
                                        <span class="badge badge-success">Paid</span> 
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
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            @if($val->status==0)
                                                <a class='dropdown-item' href="{{url('/')}}/admin/approvewithdraw/{{$val->id}}"><i class="icon-thumbs-up3 mr-2"></i>Approve request</a>
                                                <a class='dropdown-item' href="{{url('/')}}/admin/declinewithdraw/{{$val->id}}"><i class="icon-thumbs-down3 mr-2"></i>Decline request</a>
                                            @endif
                                                <a data-toggle="modal" data-target="#{{$val->id}}delete" class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>                   
                            </tr>
                            <div id="{{$val->id}}delete" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">   
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="font-weight-semibold">Are you sure you want to delete this?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            <a  href="{{url('/')}}/admin/withdraw/delete/{{$val->id}}" class="btn bg-danger">Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach               
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Investment</h6>
                </div>
                <div class="">
                    <table class="table datatable-show-all">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Ref</th>
                                <th>Amount</th>                                                                       
                                <th>Plan</th>
                                <th>Daily percent</th>
                                <th>Duration</th>
                                <th>Profit</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-center">Action</th>    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($profit as $k=>$val)
                            <tr>
                                <td>{{++$k}}.</td>
                                <td>{{$val->trx}}</td>
                                <td>{{substr($val->amount,0,9)}}BTC</td>
                                <td>{{$val->plan->name}}</td>
                                <td>{{$val->plan->percent}}%</td>
                                <td>{{$val->plan->duration.$val->plan->period}}(s)</td>
                                <td>{{substr($val->profit,0,9)}}BTC</td>
                                <td>{{date("Y/m/d", strtotime($val->created_at))}}</td>  
                                <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-toggle="modal" data-target="#{{$val->id}}delete" class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>                   
                            </tr>
                            <div id="{{$val->id}}delete" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">   
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="font-weight-semibold">Are you sure you want to delete this?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            <a  href="{{url('/')}}/admin/py/delete/{{$val->id}}" class="btn bg-danger">Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach               
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
    </div>   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Ticket</h6>
                </div>
                <div class="">
                    <table class="table datatable-show-all">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Username</th>
                                <th>Priority</th>
                                <th>Ticket ID</th>                                                                      
                                <th>Status</th>
                                <th>Subject</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="text-center">Action</th>    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ticket as $k=>$val)
                            <tr>
                                <td>{{++$k}}.</td>
                                <td>{{$val->user->username}}</td>
                                <td>{{$val->priority}}</td>
                                <td>{{$val->ticket_id}}</td>
                                <td>
                                    @if($val->status==0)
                                        <span class="badge badge-info">Open</span>
                                    @elseif($val->status==1)
                                        <span class="badge badge-danger">Closed</span>                                        
                                    @elseif($val->status==2)
                                        <span class="badge badge-success">Resolved</span> 
                                    @endif
                                </td>   
                                <td>{{$val->subject}}</td> 
                                <td>{{date("Y/m/d", strtotime($val->date))}}</td>  
                                <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class='dropdown-item' href="{{url('/')}}/admin/manage-ticket/{{$val->id}}"><i class="icon-bubbles5 mr-2"></i>Manage ticket</a>
                                                @if($val->status==0)
                                                    <a class='dropdown-item' href="{{url('/')}}/admin/close-ticket/{{$val->id}}"><i class="icon-eye-blocked2 mr-2"></i>Close ticket</a>
                                                @endif    
                                                <a data-toggle="modal" data-target="#{{$val->id}}delete" class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>                   
                            </tr>
                            <div id="{{$val->id}}delete" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">   
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="font-weight-semibold">Are you sure you want to delete this?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                            <a  href="{{url('/')}}/admin/ticket/delete/{{$val->id}}" class="btn bg-danger">Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach               
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Transfer logs</h6>
                </div>
                <div class="">
                    <table class="table datatable-show-all">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Ref</th>
                                <th>Sender</th>
                                <th>Receiver</th>
                                <th>Amount</th>                                                                       
                                <th>Created</th>
                                <th>Updated</th>   
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($transfer as $k=>$val)
                            <tr>
                                <td>{{++$k}}.</td>
                                <td>{{$val->ref_id}}</td>
                                <td>{{$val->sender->name}}</td>
                                <td>{{$val->receiver->name}}</td>
                                <td>{{substr($val->amount,0,9)}}BTC</td>
                                <td>{{date("Y/m/d", strtotime($val->created_at))}}</td>  
                                <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                            @endforeach               
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Earnings</h6>
                </div>
                <div class="">
                    <table class="table datatable-show-all">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Amount</th>
                                <th>Username</th>
                                <th>Created</th>
                                <th>Updated</th>  
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($earning as $k=>$val)
                            <tr>
                                <td>{{++$k}}.</td>
                                <td>{{substr($val->amount,0,9)}}BTC</td>
                                <td>{{$val->user['username']}}</td>
                                <td>{{date("Y/m/d", strtotime($val->created_at))}}</td>  
                                <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                            @endforeach               
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Referrals</h6>
                </div>
                <div class="">
                    <table class="table datatable-show-all">
                        <thead>
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
                                <td>{{date("Y/m/d", strtotime($val->created_at))}}</td>  
                                <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                            @endforeach               
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

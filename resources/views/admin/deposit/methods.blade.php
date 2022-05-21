@extends('master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Payment gateways</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Main name</th>
                                    <th>Name for users</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="text-center">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($gateway as $k=>$val)
                                <tr>
                                    <td>{{++$k}}.</td>
                                    <td>{{$val->main_name}}</td>
                                    <td>{{$val->name}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <span class="badge badge-danger">Disabled</span>
                                        @elseif($val->status==1)
                                            <span class="badge badge-success">Active</span> 
                                        @endif
                                    </td>  
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->created_at))}}</td>
                                    <td>{{date("Y/m/d h:i:A", strtotime($val->updated_at))}}</td>
                                    <td class="text-center">
                                    <a data-toggle="modal" data-target="#{{$val->id}}edit" class="" >
                                        <i class="icon-pencil7 mr-2"></i>Edit
                                    </a>
                                    </td>                   
                                </tr>
                                <div id="{{$val->id}}edit" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$val->main_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <form action="{{url('admin/storegateway')}}" method="post">
                                            @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Name of gateway</label>
                                                                <input value="{{$val->id}}"type="hidden" name="id">
                                                                <input type="text" value="{{$val->name}}" name="name" class="form-control">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="">Rate:</label>
                                                                <div class="">
                                                                    <div class="input-group">
                                                                        <span class="input-group-prepend">
                                                                            <span class="input-group-text">1 USD =</span>
                                                                         </span>
                                                                        <input type="number" name="rate" maxlength="10" class="form-control"value="{{$val->rate}}">
                                                                        <span class="input-group-append">
                                                                            <span class="input-group-text">{{$currency->name}}</span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Minimun Deposit</label>
                                                                <div class="input-group">
                                                                    <input type="number" name="minamo" maxlength="10" class="form-control"value="{{$val->minamo}}">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text">{{$currency->name}}</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Maximum Deposit</label>
                                                                <div class="input-group">
                                                                    <input type="number" name="maxamo" maxlength="10" class="form-control"value="{{$val->maxamo}}">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text">{{$currency->name}}</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Deposit fixed charge</label>
                                                                <div class="input-group">
                                                                    <input type="number" step="any" name="chargefx" maxlength="10" class="form-control"value="{{$val->fixed_charge}}">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text">{{$currency->name}}</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Charge in percentage</label>
                                                                <div class="input-group">
                                                                    <input type="number" step="any" name="chargepc" maxlength="10" class="form-control"value="{{$val->percent_charge}}">
                                                                    <span class="input-group-append">
                                                                        <span class="input-group-text">%</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($val->id==101)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>PAYPAL BUSINESS EMAIL</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    @elseif($val->id==102)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Perfect Money USD account</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Alternate passphrase</label>
                                                                    <input type="text" value="{{$val->val2}}" class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @elseif($val->id==103)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Publishable key</label>
                                                                    <input type="text" value="{{$val->val2}}" class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @elseif($val->id==104)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Merchant email</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key</label>
                                                                    <input type="text" value="{{$val->val2}}" class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        @elseif($val->id==107)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Public key</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key</label>
                                                                    <input type="text" value="{{$val->val2}}" class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                        @elseif($val->id==108)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Public key</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key</label>
                                                                    <input type="text" value="{{$val->val2}}" class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @elseif($val->id==501)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Api key</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Xpub code</label>
                                                                    <input type="text" value="{{$val->val2}}" class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>                                                       
                                                        @elseif($val->id==502)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Api key</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Api pin</label>
                                                                    <input type="text" value="{{$val->val2}}" class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @elseif($val->id==505)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Public key</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Private key</label>
                                                                    <input type="text" value="{{$val->val2}}" class="form-control" id="val2" name="val2">
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                                        @elseif($val->id==512)
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Secret key key</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Payment Details</label>
                                                                    <input type="text" value="{{$val->val1}}" class="form-control" id="val1" name="val1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control select" name="status">
                                                                <option value="1" 
                                                                    @if($val->status==1)
                                                                        selected
                                                                    @endif
                                                                    >Active
                                                                </option>
                                                                <option value="0"  
                                                                    @if($val->status==0)
                                                                        selected
                                                                    @endif
                                                                    >Deactive
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn bg-primary">Save changes</button>
                                                </div>
                                            </form>
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
    </div>
@stop
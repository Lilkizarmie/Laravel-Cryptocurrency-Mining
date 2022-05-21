@extends('master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Currency</h6>
                    </div>
                    <table class="table datatable-show-all">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Currency</th>
                                <th>Symbol</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cur as $k=>$val)
                            <tr>
                                <td>{{++$k}}.</td>
                                <td>{{$val->name}}</td>
                                <td>{{$val->currency}}</td>
                                <td>{{$val->symbol}}</td>
                                <td>                                    
                                    @if($val->status==1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>                               
                                <td class="text-center">
                                @if($val->status==0)
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            @if($val->status==0)
                                                <a class='dropdown-item' href="{{url('/')}}/admin/pcurrency/{{$val->id}}"><i class="icon-eye mr-2"></i>Set as default</a>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif  
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
                                            <a  href="{{url('/')}}/admin/branch/delete/{{$val->id}}" class="btn bg-danger">Proceed</a>
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
@stop
@extends('master')

@section('content')
    <div class="content">
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
                                    <td><a href="{{url('admin/manage-user')}}/{{$val->user->id}}">{{$val->user->name}}</a></td>
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
    </div>
@stop
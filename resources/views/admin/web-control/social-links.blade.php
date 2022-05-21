@extends('master')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title font-weight-semibold">Social links</h6>
            </div>
            <table class="table datatable-show-all">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th class="text-center">Action</th>    
                    </tr>
                </thead>
                <tbody>
                @foreach($links as $k=>$val)
                    <tr>
                        <td>{{++$k}}.</td>
                        <td>{{$val->type}}</td>
                        <td>{{$val->value}}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                        <a data-toggle="modal" data-target="#{{$val->id}}update" class="dropdown-item"><i class="icon-pencil7 mr-2"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </td>                   
                    </tr>                              
                    <div id="{{$val->id}}update" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">   
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{route('social-links.update')}}" method="post">
                                @csrf
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-form-label col-lg-2">Link:</label>
                                            <div class="col-lg-10">
                                                <input type="url" name="link" class="form-control" value="{{$val->value}}">
                                                <input type="hidden" name="id" value="{{$val->id}}">
                                            </div>
                                        </div>               
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn bg-dark">Update<i class="icon-paperplane ml-2"></i></button>
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
@stop
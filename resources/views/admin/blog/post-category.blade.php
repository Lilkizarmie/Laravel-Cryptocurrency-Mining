@extends('master')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Create category</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/createcategory')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Category:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>               
                            <div class="text-right">
                                <button type="submit" class="btn bg-dark">Submit<i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Category</h6>
                    </div>
                    <table class="table datatable-show-all">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th class="text-center">Action</th>    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cat as $k=>$val)
                            <tr>
                                <td>{{++$k}}.</td>
                                <td>{{$val->categories}}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                                <a data-toggle="modal" data-target="#{{$val->id}}update" class="dropdown-item"><i class="icon-pencil7 mr-2"></i>Edit</a>
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
                                            <a  href="{{url('/')}}/admin/category/delete/{{$val->id}}" class="btn bg-danger">Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>                              
                            <div id="{{$val->id}}update" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">   
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form action="{{url('admin/updatecategory')}}" method="post">
                                        @csrf
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-2">Category:</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="name" class="form-control" value="{{$val->categories}}">
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
    </div>
@stop
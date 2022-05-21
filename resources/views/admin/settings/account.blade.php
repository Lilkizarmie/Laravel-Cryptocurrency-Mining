@extends('master')

@section('content')
<div class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Account information</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.account.update')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Username:</label>
                            <div class="col-lg-10">
                                <input type="text" name="username" value="{{$val->username}}" class="form-control">
                            </div>
                        </div>                         
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Password:</label>
                            <div class="col-lg-10">
                                <input type="tpassword" name="password"  class="form-control" required>
                            </div>
                        </div>          
                    <div class="text-right">
                        <button type="submit" class="btn bg-dark">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>
@stop
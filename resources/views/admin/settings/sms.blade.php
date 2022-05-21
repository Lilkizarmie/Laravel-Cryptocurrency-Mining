@extends('master')

@section('content')
<div class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">SMS Template</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CODE</th>
                                <th>DESCRIPTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> 1 </td>
                            <td> &#123;&#123;message&#125;&#125;</td>
                            <td> Details Text From the Script</td>
                        </tr>
                        <tr>
                            <td> 2 </td>
                            <td> &#123;&#123;number&#125;&#125; </td>
                            <td> Users Mobile Number. Will be Pulled From Database</td>
                        </tr>
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Congifure template</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.sms.update')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">smsapi:</label>
                            <div class="col-lg-10">
                                <input type="text" name="smsapi" value="{{$val->smsapi}}" class="form-control">
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
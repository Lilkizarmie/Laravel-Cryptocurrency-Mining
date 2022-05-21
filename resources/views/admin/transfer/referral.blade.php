@extends('master')

@section('content')
    <div class="content">
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
                                    <td><a href="{{url('admin/manage-user')}}/{{$val->user['id']}}">{{$val->user['username']}}</a></td>
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
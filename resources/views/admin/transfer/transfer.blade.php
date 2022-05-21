@extends('master')

@section('content')
    <div class="content">
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
                                    <td><a href="{{url('admin/manage-user')}}/{{$val->sender->id}}">{{$val->sender->name}}</a></td>
                                    <td><a href="{{url('admin/manage-user')}}/{{$val->receiver->id}}">{{$val->receiver->name}}</a></td>
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
    </div>
@stop
@extends('master')

@section('content')
    <div class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Edit</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="{{route('admin.plan.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="{{$plan->name}}" reqiured>
                                    <input type="hidden" name="id" value="{{$plan->id}}">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Monthly percent:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="percent" value="{{$plan->percent}}" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>                             
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Minimum amount:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="min_amount" value="{{$plan->min_deposit}}" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">BTC</span>
                                        </span>
                                    </div>
                                </div>
                            </div>                             
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Maximum amount:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="max_amount" value="{{$plan->amount}}" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">BTC</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Upgrade:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="number" step="any" name="upgrade" value="{{$plan->upgrade}}" class="form-control">
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Duration:</label>
                                <div class="col-lg-10">
                                    <input type="number" name="duration" pattern="[0-9]+(\.[0-9]{0,2})?%?" value="{{$plan->duration}}" class="form-control" placeholder="1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Period:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="period" data-fouc required>    
                                        <option value="day" 
                                            @if($plan->period=='day')
                                                selected
                                            @endif
                                            >Day
                                        </option>                                         
                                        <option value="week" 
                                            @if($plan->period=='week')
                                                selected
                                            @endif
                                            >Week
                                        </option>                                         
                                        <option value="month" 
                                            @if($plan->period=='month')
                                                selected
                                            @endif
                                            >Month
                                        </option>                                         
                                        <option value="year" 
                                            @if($plan->period=='year')
                                                selected
                                            @endif
                                            >year
                                        </option>                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Referral percent:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="ref_percent" maxlength="10" placeholder="2.5" value="{{$plan->ref_percent}}" class="form-control" required>
                                        <span class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </span>
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Hashrate:</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" name="hashrate" placeholder="20Ph/s" class="form-control" value="{{$plan->hashrate}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Status:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="status">
                                        <option value="1" 
                                            @if($plan->status==1)
                                                selected
                                            @endif
                                            >Active
                                        </option>
                                        <option value="0"  
                                            @if($plan->status==0)
                                                selected
                                            @endif
                                            >Deactive
                                        </option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Image:</label>
                                <div class="col-lg-10">
                                    <input type="file" name="image" class="form-input-styled" data-fouc> 
                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 1Mb</span>
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
    </div>

@stop
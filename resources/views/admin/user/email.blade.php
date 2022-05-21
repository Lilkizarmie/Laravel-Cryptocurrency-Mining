@extends('master')

@section('content')
<div class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Send email</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('user.email.send')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">To:</label>
                            <div class="col-lg-10">
                                <input type="text" name="to" maxlength="200" value="{{$email}}" class="form-control readonly" required>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name:</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" maxlength="200" value="{{$name}}" class="form-control readonly" required>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Subject:</label>
                            <div class="col-lg-10">
                                <input type="text" name="subject" maxlength="200" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Message:</label>
                            <div class="col-lg-10">
                                <textarea type="text" name="message" rows="4" class="form-control" required></textarea>
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
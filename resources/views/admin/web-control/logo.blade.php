@extends('master')

@section('content')
<div class="content"> 
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Change logo</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/updatelogo')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <label>Your logo:</label>
                            <input type="file" name="logo" class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted formats: jpg. Max file size 1Mb</span>
                            @if ($errors->has('image'))
                                <div class="error">{{ $errors->first('logo') }}</div>
                            @endif
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Upload<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Logo</h6>
                </div>
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/{{$logo->image_link}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Change favicon</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/updatefavicon')}}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="form-group">
                            <label>Your Favicon:</label>
                            <input type="file" name="favicon" class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted formats: jpg, ico. Max file size 1Mb</span>
                        </div>              
                        <div class="text-right">
                            <button type="submit" class="btn bg-dark">Upload<i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font-weight-semibold">Favicon</h6>
                </div>
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/{{$logo->image_link2}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@stop
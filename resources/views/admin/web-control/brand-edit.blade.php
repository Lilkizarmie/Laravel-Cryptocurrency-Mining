@extends('master')

@section('content')
    <div class="content"> 
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Edit brand</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="{{route('brand.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control" value="{{$val->title}}">
                                    <input type="hidden" name="id" value="{{$val->id}}">
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
            <div class="col-md-4">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{url('/')}}/asset/review/{{$val->image_link}}" alt="">
                        <img class="img-fluid" src="{{url('/')}}/asset/review/{{$val->image_link}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
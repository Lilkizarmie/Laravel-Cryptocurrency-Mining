@extends('master')

@section('content')
    <div class="content"> 
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Compose article</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="{{route('blog.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control" value="{{$post->title}}" reqiured>
                                    <input type="hidden" name="id" value="{{$post->id}}">
                                </div>
                                @if ($errors->has('title'))
                                    <div class="error">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Category:</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="cat_id" data-dropdown-css-class="bg-info-800" data-fouc required> 
                                    @foreach($category as $val)
                                        <option value="{{$val->id}}" 
                                        @if($cat->id==$val->id)
                                            selected
                                        @endif
                                        >{{$val->categories}}</option>     
                                    @endforeach             
                                    </select>
                                    @if ($errors->has('cat_id'))
                                        <div class="error">{{ $errors->first('cat_id') }}</div>
                                    @endif
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Thumbnail:</label>
                                <div class="col-lg-10">
                                    <input type="file" name="image" class="form-input-styled" data-fouc> 
                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 1Mb</span>
                                </div>
                                @if ($errors->has('image'))
                                    <div class="error">{{ $errors->first('image') }}</div>
                                @endif
                            </div>              
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Content:</label>
                                <div class="col-lg-10">
                                    <textarea type="text" name="details"  class="tinymce form-control">{{$post->details}}</textarea>
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
                        <img class="img-fluid" src="{{url('/')}}/asset/thumbnails/{{$post->image}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
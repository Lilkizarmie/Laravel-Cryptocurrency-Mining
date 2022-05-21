@extends('master')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title font-weight-semibold">Update About us</h6>
            </div>
            <div class="card-body">
                <form action="{{route('about-us.update')}}" method="post">
                @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Details:</label>
                        <div class="col-lg-10">
                        <textarea type="text" name="details" class="tinymce form-control">{{$value->about}}</textarea>
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
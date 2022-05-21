@extends('layout')
@section('css')

@stop
@section('content')
<section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <h2 class="heading-title heading--half-colored">{{$page->title}}</h2>     
                </header>
            </div>
        </div>
    </div>
</section>
<section class="medium-padding120 responsive-align-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>{!!$page->content!!}</p>
            </div>
        </div>
    </div>
</section>
@stop
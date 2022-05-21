@extends('layout')
@section('css')

@stop
@section('content')
<section data-settings="particles-1" class="main-section crumina-flying-balls particles-js bg-1 medium-padding120">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <h2 class="heading-title heading--half-colored"> Frequently asked questions</h2>     
                </header>
            </div>
        </div>
    </div>
</section>
<section class="medium-padding120 responsive-align-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <header class="crumina-module crumina-heading heading--h2 heading--with-decoration">
                    <div class="heading-sup-title">Frequent questions</div>
                    <h2 class="heading-title weight-normal">{{$ui->s5_title}}</h2>
                </header>
                <p>{{$ui->s5_body}}</p>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mt30">
                <ul class="crumina-module crumina-accordion accordion--style3" id="accordion4">
                    @foreach($faq as $vfaq)
                    <li class="accordion-panel">
                        <div class="panel-heading">
                            <a href="#{{$vfaq->id}}" class="accordion-heading collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                                <span class="icons">
                                    <svg class="woox-icon icon-plus-sign"><use xlink:href="{{url('/')}}/asset/frontend/svg-icons/sprites/icons.svg#icon-plus-sign"></use></svg>
                                    <svg class="woox-icon active icon-min-sign"><use xlink:href="{{url('/')}}/asset/frontend/svg-icons/sprites/icons.svg#icon-min-sign"></use></svg>
                                </span>
                                <span class="title">{{$vfaq->question}}</span>
                            </a>
                        </div>

                        <div id="{{$vfaq->id}}" class="panel-collapse collapse" aria-expanded="false" role="tree">
                            <div class="panel-info">
                                {!! $vfaq->answer!!}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@stop
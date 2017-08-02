@extends('index')  

@section('content')

@include('_common._banner')

    <div class="container-fluid">

    <div class="row breadcrumb-wrapper">

        <div class="col-md-12">

            <ol class="breadcrumb">

                <li>

                    <a href="/">Главная</a>

                </li>

                <li class="active">Сертификаты</li>

            </ol>

        </div>

    </div>

</div>

<div class="container-fluid page-content">

    <div class="row">

        <div class="col-md-12">

            <h1 class="text-uppercase">Сертификаты</h1>



            <div class="baguetteBox row">

                @foreach ($certificates as $certificate)

                <div class="col-xs-12 col-sm-6 col-md-4 sert-image-block">

                    <a href="{{$certificate->img_path}}" style="background-image: url('{{$certificate->prev}}');"></a>

                    <p>{!!$certificate->title!!}</p>

                </div>

                @endforeach

                <div class="clearfix"></div>

            </div>





            <div class="clearfix"></div>

            <div class="text-center">

                <div class="seo-text text-left">

                    <h2>{!!$material->title!!}</h2>

                    <p>{!!$material->body!!}</p>

                </div>

            </div>

        </div>

    </div>

</div>

@stop




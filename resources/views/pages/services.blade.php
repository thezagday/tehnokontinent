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
            	<li class="active">Услуги</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-uppercase">Услуги</h1>
            @foreach ($services as $service)
            <div class="share-block news-block">
                <div class="share-image" style="background-image:url('{{$service->img_path}}');"></div>
                <div class="share-info">
                    <div class="share-header">
                        <h4>
                            {!!$service->title!!}
                        </h4>
                        <p>{!!$service->short_body!!}</p>
                        <a href="service_page?id={{$service->id}}" class="orange-color more-link">Подробнее<span class="fa fa-long-arrow-right"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="text-center">
                <ul class="pagination">
                    {{$services->render()}}
                </ul>
            </div>
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


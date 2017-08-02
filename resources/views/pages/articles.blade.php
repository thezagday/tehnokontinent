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
                <li class="active">Статьи</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-uppercase">Статьи</h1>
            
            @foreach ($articles as $article)
            <div class="col-xs-12 share-block news-block">
                <div class="share-status">
                    <p><span class="fa fa-clock-o"></span> {{$article->date}}</p>
                </div>
                <div class="share-image" style="background-image:url('{{$article->img_path}}');"></div>
                <div class="share-info">
                    <div class="share-header">
                        <h4>
                            {!!$article->title!!}
                        </h4>
                        <p>{!!$article->short_body!!}</p>
                        <a href="article_page?id={{$article->id}}" class="orange-color more-link">Подробнее<span class="fa fa-long-arrow-right"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
            <div class="col-md-12 text-center">
                <ul class="pagination">
                    {{$articles->render()}}
                </ul>
            </div>
            <div class="col-md-12 text-center">
                <div class="seo-text text-left">
                    <h2>{!!$material->title!!}</h2>
                    <p>{!!$material->body!!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


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
                <li>
                    <a href="articles">Статьи</a>
                </li>
                <li class="active">{{strip_tags($article->title)}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-uppercase">{!!$article->title!!}</h1>
            <p>{!!$article->body!!}</p>
        </div>
    </div>
</div>
@stop


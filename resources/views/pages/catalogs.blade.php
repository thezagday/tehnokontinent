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
                    <a href="catalogs">Каталог</a>
                </li>
                @if (isset($breadcrumbs) && $breadcrumbs != NULL)
                    @foreach ($breadcrumbs as $item)
                        @if ($item != end($breadcrumbs))
                        <li>
                            <a href="catalogs?id={{$item->id}}">{{$item->title}}</a>
                        </li>
                        @else
                        <li>
                            <a class="active" href="catalogs?id={{$item->id}}">{{$item->title}}</a>
                        </li>
                        @endif
                    @endforeach
                @endif
               
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-12 view-mode">
                    <a href="catalogs" class="fa fa-th active"></a>
                    <a href="catalogs_list" class="hidden-xs fa fa-th-list"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">

                    @include('_common._menu')

                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($parent_catalogs as $item)
                        <div class="col-md-4 product-block">
                            <div>
                                <div class="image-block" style="background-image: url({{$item->default_img}});">
                                    <a href="catalogs?id={{$item->id}}">В РАЗДЕЛ<span class="fa fa-long-arrow-right"></span></a>
                                </div>
                                <div class="info-block">
                                    <h4>{!!$item->title!!}</h4>
                                    @if (isset($item->min_price) && ($item->min_price!=null))
                                        <p>от <span class="orange-color">{{$item->min_price}}<small>руб./ м.п</small></span></p>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <ul class="pagination">
                </ul>
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

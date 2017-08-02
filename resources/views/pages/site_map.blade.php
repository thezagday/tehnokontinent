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
                <li class="active">Карта сайта</li>
            </ol>
        </div>
    </div>
</div>


<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-uppercase">Карта сайта</h1>
            <div class="row">
                <div class="col-md-12 site-map-block">
                    <section>
        				<a href="catalogs">Каталог продукции</a>
        				<ul>
                        @foreach ($catalogs as $catalog)
                            @if ($catalog->parent == 0)
        					   @include("partials.map",$catalog)
        					 @endif  
                        @endforeach
        				</ul>
        			</section>
                    @foreach($main_menu as $item)
        			<section>
        				<a href="{{$item->link}}">{{$item->title}}</a>
        			</section>
        			@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop

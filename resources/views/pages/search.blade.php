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
                <li class="active">Результаты поиска</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                 @if (count($search_results))

                    @if (isset($catalog))
                        <h2 style="color:#f0623f">По запросу "{{$search}}" в каталоге {{$catalog->title}} найдено</h2>
                    @else
                        <h2 style="color:#f0623f">По запросу "{{$search}}" во всех каталогах найдено</h2>
                    @endif

                @else
                    @if (isset($catalog))
                        <h2 style="color:#f0623f">По запросу "{{$search}}" в каталоге {{$catalog->title}} ничего не найдено </h2>
                    @else
                        <h2 style="color:#f0623f">По запросу "{{$search}}" во всех каталогах ничего не найдено </h2>
                    @endif 
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 view-mode">
                    <a href="search-result.php" class="fa fa-th active"></a>
                    <a href="search-result-list.php" class="hidden-xs fa fa-th-list"></a>
                </div>
                <form action="search" method="get" id="count_form">
                    <div class="col-sm-3 filter-products">
                        <p class="font-regular">Показано:
                            <select name="count" id="" class="inline-select" onchange="document.getElementById('count_form').submit()">
                                @if (isset($_GET['count']))
                                    @php
                                        switch ($_GET['count'])
                                        {
                                            case 10: 
                                                echo '<option value="10" selected>10</option>';
                                                echo '<option value="20">20</option>';
                                                echo '<option value="30">30</option>';
                                            break;
                                            case 20: 
                                                echo '<option value="10">10</option>';
                                                echo '<option value="20" selected>20</option>';
                                                echo '<option value="30">30</option>';
                                            break;
                                            case 30: 
                                                echo '<option value="10">10</option>';
                                                echo '<option value="20">20</option>';
                                                echo '<option value="30" selected>30</option>';
                                            break;
                                        }
                                    @endphp
                                @else
                                    <option value="10" selected>10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                @endif
                            </select>
                            <label for="select-count">
                                <b class="caret"></b>
                            </label>
                            из {{$amount}}
                        </p>
                    </div>
                </form>
                <form action="search" method="get" id="filter_form">
                    <div class="col-sm-6 filter-products">
                        <p class="font-regular">Сортировать по:
                            <select name="filter" id="" class="inline-select select-width-auto" onchange="document.getElementById('filter_form').submit()">
                                @if (isset($_GET['filter']))
                                    @foreach ($filters as $item)
                                        @if ($item->value == $_GET['filter'])
                                            <option value="{{$item->value}}" selected="">{{$item->title}}</option>
                                        @else
                                            <option value="{{$item->value}}" >{{$item->title}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($filters as $item)
                                        @if ($item->value == null)
                                            <option value="{{$item->value}}" selected="">{{$item->title}}</option>
                                        @else
                                            <option value="{{$item->value}}" >{{$item->title}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            <label for="select-count">
                                <b class="caret"></b>
                            </label>
                        </p>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-3">

                  
                    @include ("_common._menu")
                    

                </div>
                <div class="col-md-9">
                    <div class="row">

                        @if (count($search_results)) 
                        @foreach ($search_results as $search_result)
                        <div class="col-md-4 product-block">
                            <div>
                                <div class="image-block" style="background-image: url({{ $search_result->default_img }});">
                                    <a href="product_page?id={{$search_result->id}}">ПОДРОБНЕЕ<span class="fa fa-long-arrow-right"></span></a>
                                </div>
                                <div class="info-block">
                                    <h4>{!!$search_result->title!!}</h4>
                                    <p>от <span class="orange-color">{!!$search_result->price!!}<small>руб./ м.п</small></span></p>
                                </div>
                                @if ($search_result->is_new)
                                <div class="status-block status-new">
                                    <span>Новинка</span>
                                </div>
                                @endif
                                <a data-toggle="modal" href="#buy" class="btn btn-warning text-uppercase"><span class="fa fa-shopping-cart"></span>Заказать</a>
                            </div>
                            </div>
                        @endforeach
                        @else    
                
                        <div class="col-md-4 product-block">
                            <div>
                                <div class="image-block" style="background-image: url(images/no_photo.gif);">
                                </div>
                                <div class="info-block">
                                    <h4>Пусто</h4>
                                    <p><span class="orange-color"><small></small></span></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <ul class="pagination">
                    {{$search_results->render()}}
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



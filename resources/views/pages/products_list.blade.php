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
                @else
                    <a href="">В массиве breadcrumbs пусто!</a>
                @endif
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-3 view-mode">
                    <a href="products?parent={{$_GET['parent']}}" class="fa fa-th active"></a>
                    <a href="products_list?parent={{$_GET['parent']}}" class="hidden-xs fa fa-th-list"></a>
                </div>
                <form action="products_list" method="get" id="count_form">
                <input type="hidden" name="parent" value="{{$parent}}">
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
                <form action="products_list" method="get" id="filter_form">
                <input type="hidden" name="parent" value="{{$parent}}">
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
               
                    @include('_common._menu')
                    
                </div>
                <div class="col-md-9 catalog-list">
                    <div class="row">
                        @if (count($products)==0)
                        <div class="col-md-12 product-block">
                            <div>
                                <div class="image-block" style="background-image: url(images/no_photo.gif);">
                                    <a href="catalog-page.php">В РАЗДЕЛ<span class="fa fa-long-arrow-right"></span></a>
                                </div>
                                <div class="info-block">
                                    <h4>Товаров нет</h4>
                                    <p>от <span class="orange-color"><small></small></span></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endif    
                        @foreach ($products as $product)
                        <div class="col-md-12 product-block">
                            <div>
                                <div class="image-block" style="background-image: url({{$product->default_img}});">
                                    <a href="product_page?id={{$product->id}}">ПОДРОБНЕЕ<span class="fa fa-long-arrow-right"></span></a>
                                </div>
                                <div class="info-block">
                                    <h4>{{$product->title}}</h4>
                                    <p>от <span class="orange-color">{{$product->price}}<small>руб./ м.п</small></span></p>
                                </div>
                                @if ($product->is_new)
                                <div class="status-block status-new">
                                    <span>Новинка</span>
                                </div>
                                @endif
                                <a data-toggle="modal" href="#buy" class="btn btn-warning text-uppercase"><span class="fa fa-shopping-cart"></span>Заказать</a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <ul class="pagination">
                {{$products->render()}}
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


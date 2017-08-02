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
                <li class="active">Новости</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid page-content">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-uppercase">Новости</h1>
            <div class="row">
                <div class="col-sm-6">
                    <p>Сортировать по Дате: <a href="news?f=1" class="orange-color">Сначала свежие записи<b class="caret" style="margin-left:5px"></b></a></p>
                </div>
                <form action="news" method="get" id="count_form">
                    <div class="col-sm-6">
                        <p>Показать:
                            <select name="count" id="select-count" class="form-control inline-select" required="required" onchange="document.getElementById('count_form').submit()">
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
                        </p>
                    </div>
                </form>

            </div>
            @foreach ($news as $item)
            <div class="share-block news-block">
                <div class="share-status">
                    <p><span class="fa fa-clock-o"></span> {{$item->date}}</p>
                </div>
                <div class="share-image" style="background-image:url('{{$item->img_path}}');"></div>
                <div class="share-info">
                    <div class="share-header">
                        <h4>
                            {!!$item->title!!}
                        </h4>
                        <p>{{$item->short_body}}</p>
                        <a href="news_page?id={{$item->id}}" class="orange-color more-link">Подробнее<span class="fa fa-long-arrow-right"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="text-center">
                <ul class="pagination">
                    {{$news->render()}}
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


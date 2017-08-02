@extends('index')  

@section('content')

@include('_common._banner')

<div class="container-fluid">

    <div class="row breadcrumb-wrapper">

        <div class="col-md-12">

            <ol class="breadcrumb">

                <li>
                    <a href="index.php">Главная</a>
                </li>
                <li>
                    <a href="catalog.php">Каталог</a>
                </li>
                <li>
                    <a href="catalog.php">Аксессуары</a>
                </li>
            </ol>

        </div>

    </div>

</div>

<div class="container-fluid page-content">

    <div class="row">

        <div class="col-md-12">

            <div class="row hidden-xs">

                <br>

                <br>

            </div>

            <div class="row">

                <div class="col-md-3 hidden-xs">



                     @include ('_common._menu')



                </div>

                <div class="col-md-9">

                    <div class="row">

                        <div class="col-md-6 product-page-carousel-wrapper">

                            <div class="product-page-carousel baguetteBox">

                                


                                <div>

                                    <a href="{{$accessory->img_path}}">

                                        <img src="{{$accessory->img_path}}" alt="image">

                                    </a>

                                </div>

                            </div>


                        </div>

                        <div class="col-md-6 product-info-wrapper">

                            <h1>{!!$accessory->title!!}</h1>

                            <table class="table table-hover">

                                <tbody>

                                    <tr>

                                    <td>Описание</td>

                                        <td>{!!$accessory->body!!}</td>

                                    </tr>

                                </tbody>

                            </table>


                            <div class="buy-block">

                                <p>от <span class="orange-color font-bold">{!!$accessory->price!!}<small>руб./м.п</small></span></p>

                                <a data-toggle="modal" href="#buy" class="btn btn-warning text-uppercase"><span class="fa fa-shopping-cart"></span>Заказать</a>

                            </div>

                            <div class="links-block">

                                <a href="shares.php" target="_blank" class="orange-color"><span class="fa fa-certificate"></span>Акции</a>

                                <a data-toggle="modal" href="#pay"><span class="fa fa-money"></span>Оплата</a>

                                <a data-toggle="modal" href="#garanty"><span class="fa fa-shield"></span>Гарантии</a>

                                <a data-toggle="modal" href="#buy-info"><span class="fa fa-shopping-cart"></span>Как купить</a>

                                <a data-toggle="modal" href="#delivery"><span class="fa fa-truck"></span>Доставка</a>

                            </div>

                            <div class="links-share">

                                <span>Поделиться:</span>

                                <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>

                                <script src="//yastatic.net/share2/share.js"></script>

                                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber,telegram" data-counter="" data-limit="3"></div>

                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">

                            <hr>

                        </div>


                    </div>

                </div>

            </div>

            <div class="text-center">

                <div class="seo-text text-left">

                    <h2>{!!$material->title!!}</h2>

                    {!!$material->body!!}</p>

                </div>

            </div>

            <div class="product-carousel-block">

                <h2 class="title">Похожие товары</h2>

                <div class="hidden-xs owl-prev fa fa-angle-left"></div>

                <div class="hidden-xs owl-next fa fa-angle-right"></div>

            </div>

            <div class="clearfix"></div>

            <div>

                <div class="product-slider">

                    

                    @foreach ($related as $accessory)

                    <div>

                        <div class="image-block" style="background-image: url({{$accessory->img_path}});">

                            <a href="">ПОДРОБНЕЕ<span class="fa fa-long-arrow-right"></span></a>

                        </div>

                        <div class="info-block">

                            <h4>{!!$accessory->title!!}</h4>

                            <p>от <span class="orange-color">{!!$accessory->price!!}<small>руб./ м.п</small></span></p>

                        </div>

                        

                        <a data-toggle="modal" href="#buy" class="btn btn-warning text-uppercase"><span class="fa fa-shopping-cart"></span>Заказать</a>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>

@stop


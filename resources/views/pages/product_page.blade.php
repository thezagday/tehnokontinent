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

                            @if($product->discount != null)

                            <div class="status-block status-share">

                                <span>{!!$product->discount!!}</span>

                            </div>

                            @endif

                            <div class="product-page-carousel baguetteBox">

                                

                                @foreach ($images as $image)

                                <div>

                                    <a href="{{$image->img_path}}">

                                        <img src="{{$image->img_path}}" alt="image">

                                    </a>

                                </div>

                                @endforeach

                                

                            </div>
                            @if (count($images) > 1)
                            <div class="product-page-carousel-thumb">

                                @foreach ($images as $image)

                                <div style="background-image: url('{{$image->img_path}}')"></div>

                                @endforeach

                            </div>

                           

                            <div class="owl-prev">

                                <div>

                                    <img src="images/icons/left-arrow.png" alt="left">

                                </div>

                            </div>

                            <div class="owl-next">

                                <div>

                                    <img src="images/icons/right-arrow.png" alt="right">

                                </div>

                            </div>

                            @endif

                        </div>

                        <div class="col-md-6 product-info-wrapper">

                            <h1>{!!$product->title!!}</h1>

                            <table class="table table-hover">

                            	<tbody>

                                    <tr>

                            		<td>Ширина полная, мм</td>

                                        <td>{!!$product->width_full!!}</td>

                                    </tr>

                                    <tr>

                                        <td>Ширина полезная, мм</td>

                                        <td>{!!$product->width_useful!!}</td>

                                    </tr>

                                    <tr>

                                        <td>Шаг волны, мм</td>

                                        <td>{!!$product->wave!!}</td>

                                    </tr>

                                    <tr>

                                        <td>Высота профиля, мм</td>

                                        <td>{!!$product->height!!}</td>

                                    </tr>

                            	</tbody>

                            </table>

                            <div class="colors-block">

                                <ul>

                                    <li>Цвет:</li>

                                    @foreach ($colors as $color)
                                    <input type="color" name="bg" value="{{$color->title}}">
                                    @endforeach

                                </ul>

                            </div>

                            <div class="buy-block">

                                <p>от <span class="orange-color font-bold">{!!$product->price!!}<small>руб./м.п</small></span></p>

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

                        <div class="col-md-12 tabs">

                            <ul  class="nav nav-pills">

                                <li class="active">

                                    <a  href="#1b" data-toggle="tab">Подробное описание</a>

                                </li>

                                <li><a href="#2b" data-toggle="tab">Тех. характеристика</a>

                                </li>

                                <li><a href="#3b" data-toggle="tab">Аксессуары</a>

                                </li>

                                <li><a href="#4b" data-toggle="tab">Инструкции</a>

                                </li>

                                <li><a href="#5b" data-toggle="tab">Сертификаты</a>

                                </li>

                            </ul>

                            <div class="tab-content clearfix">

                                <div class="tab-pane active" id="1b">

                                    <h3>Преимущества: </h3>

                                    @foreach ($descriptions as $description)

                                    <div class="tab-item">

                                        <div class="item-image">

                                            <img src="{{$description->img_path}}" alt="icon">

                                        </div>

                                        <div class="item-text">

                                            <h4 class="orange-color">{!!$description->title!!}</h4>

                                            <p>{!!$description->body!!}</p>

                                        </div>

                                    </div>

                                    @endforeach

                                </div>

                                <div class="tab-pane" id="2b">

                                    <h3>Техническая характеристика:</h3>

                                    <table class="table table-hover" style="max-width: 500px">

                                        <tbody>

                                    <tr>

                            		<td>Ширина полная, мм</td>

                                        <td>{!!$product->width_full!!}</td>

                                    </tr>

                                    <tr>

                                        <td>Ширина полезная, мм</td>

                                        <td>{!!$product->width_useful!!}</td>

                                    </tr>

                                    <tr>

                                        <td>Шаг волны, мм</td>

                                        <td>{!!$product->wave!!}</td>

                                    </tr>

                                    <tr>

                                        <td>Высота профиля, мм</td>

                                        <td>{!!$product->height!!}</td>

                                    </tr>

                            	</tbody>

                                    </table>

                                </div>

                                <div class="tab-pane" id="3b">

                                    <h3>Аксессуары:</h3>

                                    <div class="catalog-list">

                                        @foreach($accessories as $accessory)

                                        <div class="col-md-12 product-block">

                                            <div>

                                                <div class="image-block" style="background-image: url({{$accessory->img_path}}});">

                                                    <a href="accessory_page?id={{$accessory->id}}">ПОДРОБНЕЕ<span class="fa fa-long-arrow-right"></span></a>

                                                </div>

                                                <div class="info-block">

                                                    <h4>{!!$accessory->title!!}</h4>

                                                    <p>от <span class="orange-color">{!!$accessory->price!!}<small>руб./комплект</small></span></p>

                                                </div>

                                                <a data-toggle="modal" href="#buy" class="btn btn-warning text-uppercase"><span class="fa fa-shopping-cart"></span>Заказать</a>

                                                <div class="clearfix"></div>

                                            </div>

                                        </div>

                                        @endforeach

                                    </div>

                                </div>

                                <div class="tab-pane" id="4b">

                                    <h3>Инструкции:</h3>

                                    @foreach ($instructions as $instruction)

                                    <div class="tab-item">

                                        <div class="item-image">

                                            <img src="{{URL::asset ('/images/pdf.svg')}}" alt="icon">

                                        </div>

                                        <div class="item-text">

                                            <h4>{{$instruction->title}}</h4>

                                            <a href="{{$instruction->link}}" class="orange-color more-link" download>Скачать</a>

                                        </div>

                                    </div>

                                    @endforeach

                                </div>

                                <div class="tab-pane" id="5b">

                                    <h3>Сертификаты: </h3>

                                     <div class="baguetteBox row">

                                        @foreach($certificates as $certificate)

                                        <div class="col-xs-12 col-sm-6 col-md-4 sert-image-block">

                                            <a href="{{$certificate->img_path}}" style="background-image: url('{{$certificate->prev}}');"></a>

                                            <p>{!!$certificate->title!!}</p>

                                        </div>

                                        @endforeach

                                        <div class="clearfix"></div>

                                    </div>

                                </div>

                            </div>

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

                    

                    @foreach ($related as $product)

                    <div>

                        <div class="image-block" style="background-image: url({{$product->default_img}});">

                            <a href="">ПОДРОБНЕЕ<span class="fa fa-long-arrow-right"></span></a>

                        </div>

                        <div class="info-block">

                            <h4>{!!$product->title!!}</h4>

                            <p>от <span class="orange-color">{!!$product->price!!}<small>руб./ м.п</small></span></p>

                        </div>
                        @if ($product->is_new != null)
                        <div class="status-block status-new">

                            <span>Новинка</span>

                        </div>
                        @endif
                        <a data-toggle="modal" href="#buy" class="btn btn-warning text-uppercase"><span class="fa fa-shopping-cart"></span>Заказать</a>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>

@stop


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

                <li class="active">О Компании</li>

            </ol>

        </div>

    </div>

</div>

<div class="container-fluid page-content company">

    <div class="row">

        <div class="col-md-12">

            <h1 class="text-uppercase">О Компании</h1>

            <div>

                <h2>{!!$material->title!!}</h2>

                <p>{!!$material->short_body!!}</p>

            </div>

            <div class="baguetteBox row">

                @if (isset($images[0]))
                <div class="col-xs-12 col-sm-6 col-md-4 sert-image-block">

                    <a href="{!! $images[0]->img_path!!}" style="background-image: url('{!! $images[0]->img_path!!}');"></a>

                </div>
                @endif
                @if (isset($images[1]))
                <div class="col-xs-12 col-sm-6 col-md-4 sert-image-block">

                    <a href="{!!$images[1]->img_path!!}" style="background-image: url('{!!$images[1]->img_path!!}');"></a>

                </div>
                @endif
                @if (isset($images[2]))
                <div class="col-xs-12 col-sm-6 col-md-4 sert-image-block">

                    <a href="{!!$images[2]->img_path!!}" style="background-image: url('{!!$images[2]->img_path!!}');"></a>

                </div>
                @endif

                <div class="clearfix"></div>

            </div>

            <div>

                <p>{!!$material->body!!}</p>

            </div>

            <div class="clearfix"></div>

            <div class="product-carousel-block">

                <h2 class="title">Отзывы о нас</h2>

                <div class="owl-prev fa fa-angle-left"></div>

                <div class="owl-next fa fa-angle-right"></div>

            </div>

            <div class="clearfix"></div>

            <div>

                <div class="product-slider text-center">

                    @foreach ($comments as $comment)

                    <div>

                        <div class="comment-block">

                            <p><i>{!!$comment->short_body!!}</i></p>

                        </div>

                        <div class="comment-author">

                            <div class="author-image" style="background-image: url('{!!$comment->img_path!!}');"></div>

                            <h4 class="text-uppercase">{!!$comment->name!!}</h4>

                            <p style="color:#b8b8b8">{!!$comment->city!!}</p>

                        </div>

                    </div>

                    @endforeach

                </div>

                <a href="comments" class="orange-color more-link">Все отзывы<span class="fa fa-long-arrow-right"></span></a>

            </div>

        </div>

    </div>

</div>

@stop




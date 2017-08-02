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

            	<li class="active">Акции</li>

            </ol>

        </div>

    </div>

</div>

<div class="container-fluid page-content">

    <div class="row">

        <div class="col-md-12">

            <h1 class="text-uppercase">Акции</h1>

            <div class="checkbox filter-check">

            	<label>
                @if (isset($rel) && ($rel == 1))
            		<input type="checkbox" checked="" onchange='location.href="shares"'>
                @else
                    <input type="checkbox" value="" id="" onchange='location.href="shares?rel=1"'>
                @endif
            		Только актуальные

            	</label>

            </div>

            @foreach ($shares as $share)

            @if ($share->relevance == 1)

            <div class="col-xs-12 share-block active">

                <div class="share-status">

                    <p>Акция актуальна</p>

                </div>

            @else

            <div class="col-xs-12 share-block">

                <div class="share-status">

                    <p>Акция не актуальна</p>

                </div>

            @endif

                <div class="share-image" style="background-image:url('{{$share->img_path}}');"></div>

                <div class="share-info">

                    <div class="share-header">

                        <h4>

                            {!!$share->title!!}

                        </h4>

                        <div class="share-price">

                            <p>Стоимость от <span class="font-bold">{!!$share->price!!}</span></p>

                        </div>

                        <p>{{$share->short_body}}</p>

                        <a href="share_page?id={{$share->id}}" class="orange-color more-link">Подробнее об акции<span class="fa fa-long-arrow-right"></span></a>

                    </div>

                </div>

            </div>

            @endforeach

            <div class="clearfix"></div>

            <div class="col-md-12 text-center">

                <ul class="pagination">

                   {{$shares->render()}}

                </ul>

            </div>



            <div class="col-md-12 text-center">

                <div class="row seo-text text-left">

                    <h2>{!!$material->title!!}</h2>

                    <p>{!!$material->body!!}</p>

                </div>

            </div>

        </div>

    </div>

</div>

@stop


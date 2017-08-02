@extends('index')  
@section('content')
    <div class="container-fluid">
		<div class="row main-slider-wrapper">
			<div class="main-slider">
			@foreach ($slider as $item)
				<div style="background-image:url({{ $item->img_path }})">
					<div class="col-md-12">
						<div class="grey-block">
							<p class="text-uppercase">{!!$item->title!!}</p>
							<h2>{!!$item->body!!}</h2>
						</div>
						<div class="clearfix"></div>
						<div class="price-block">
							<p>{!!$item->price!!}</p>
						</div>
						<div class="btn-block">
							@if ($item->share!=null)
							<a href="share_page?id={{$item->share}}" class="text-uppercase btn btn-default">Подробнее</ahref>
							@endif
							<a data-toggle="modal" href="#buy" class="text-uppercase btn btn-warning">Купить по акции</a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
			<div class="owl-prev">
				<img src="{{ asset('images/icons/left-arrow.png') }}" alt="left">
			</div>
			<div class="owl-next">
				<img src="{{ asset('images/icons/right-arrow.png') }}" alt="right">
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="advantages">
                                        @foreach ($advantages as $advantage)
					<div class="col-md-3">
						<div class="adv-icon">
							<img src="{{ $advantage->img }}" alt="icon">
						</div>
						<h5 class="text-uppercase font-bold">{{$advantage->title}}</h5>
						<p>{{$advantage->body}} </p>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 product-carousel-block">
				<h2 class="title">Хиты продаж</h2>
				<div class="owl-prev fa fa-angle-left"></div>
				<div class="owl-next fa fa-angle-right"></div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12">
				<div class="product-slider">
                                    @if ($bestsellers!= null)
                                    @foreach ($bestsellers as $item)
                                        <div>
						<div class="image-block" style="background-image: url({{ $item->default_img }});">
							<a href="product_page?id={{$item->id}}">ПОДРОБНЕЕ<span class="fa fa-long-arrow-right"></span></a>
						</div>
						<div class="info-block">
							<h4>{!!$item->title!!}</h4>
							<p>от <span class="orange-color">{!!$item->price!!}<small>руб./ м.п</small></span></p>
						</div>
                                            @if ($item->is_new)
						<div class="status-block status-new">
							<span>Новинка</span>
						</div>
                                            @endif
						<a data-toggle="modal" href="#buy" class="btn btn-warning text-uppercase"><span class="fa fa-shopping-cart"></span>Заказать</a>
					</div>
                                    @endforeach
                                    @endif
				</div>
			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div class="row catalog-block">
			<div class="col-md-12">
				<h2 class="title">Каталог</h2> 
                    <!--Если каталогов меньше чем 10, то один столбец -->
                    @if (  ($parent_catalogs != null)  &&   (count($parent_catalogs)!=0)   &&    (count($parent_catalogs)<10)    )
                    	<div class="col-sm-3">
                            <ul><!-- у них нет родителей но и не обязательно у них есть дети-->
                                @for ($j = 0; $j < count($parent_catalogs); $j++)
                                    @if (DB::table('catalogs')->where('parent',$parent_catalogs[$j]->id)->first()!= null)
                                        <li><a href="catalogs?id={{$parent_catalogs[$j]->id}}">{{$parent_catalogs[$j]->title}}</a></li> <!--У них есть дети-->
                                    @else
                                        <li><a href="products?parent={{$parent_catalogs[$j]->id}}">{{$parent_catalogs[$j]->title}}</a></li><!--У них нет детей-->
                                    @endif
                                @endfor	
                            </ul> 
                         </div> 

                     <!--Если каталогов больше чем 10, то расчитывается количество столбцов -->

                    @elseif (($parent_catalogs != null) && (count($parent_catalogs)!=0))
                        <?php $count_catalogs = count($parent_catalogs)?>
                        <?php $cols = intval($count_catalogs/10)?>
                        <?php $ost = $count_catalogs % 10?>
                        <?php $i = 0?>
                        <?php $k = 0?>
                        <?php $z = 10?>
                        @while($i <= $cols)
                            <div class="col-sm-3">
                                <ul>
                                    @for ($j = $k; $j < $z; $j++)
                                        @if (DB::table('catalogs')->where('parent',$parent_catalogs[$j]->id)->first()!= null)
                                            <li><a href="catalogs?id={{$parent_catalogs[$j]->id}}">{{$parent_catalogs[$j]->title}}</a></li> <!--У них есть дети-->
                                        @else
                                            <li><a href="products?parent={{$parent_catalogs[$j]->id}}">{{$parent_catalogs[$j]->title}}</a></li><!--У них нет детей-->
                                        @endif
                                    @endfor		
                                    <?php $k = $j?>
                                    <?php $z += 10?>
                                    @if ($z > $count_catalogs)
                                        <?php $z = $z - 10 + $ost?>
                                    @endif
                                </ul>   
                            </div>
                                    <?php $i++?>
                        @endwhile
                    @endif
                  
			</div>
		</div>
	</div>




	<div class="container-fluid">
		<div class="row company">
			<div class="col-md-12">
				<h2 class="title">О компании «техноконтинент»</h2>
				<hr><br>
				<div class="row">
					<div class="col-md-3">
						<div class="comment-slider-wrapper">
							<h4 class="font-bold text-center">ОТЗЫВЫ</h4>
							<hr style="border-color:#f0623f;">
							<div class="comment-slider text-center">
                                @foreach ($comments as $comment)	
                                <div>
									<div class="comment-block">
										<p><i>“{{$comment->short_body}}"</i></p>
									</div>
									<div class="comment-author">
										<div class="author-image" style="background-image: url('{{$comment->img_path}}');"></div>
										<h4 class="text-uppercase">{{$comment->name}}</h4>
										<p style="color:#b8b8b8">{{$comment->city}}</p>
									</div>
								</div>
                                @endforeach
							</div>
							<div class="owl-nav text-center">
								<div class="owl-prev fa fa-angle-left"></div>
								<div class="owl-next fa fa-angle-right"></div>
							</div>
							<a href="comments" class="orange-color more-link">Все отзывы<span class="fa fa-long-arrow-right"></span></a>
						</div>
					</div>
					<div class="col-md-9">
						<h2>{!!$material[0]->title!!}</h2>
						<p>{!!$material[0]->short_body!!}</p>
						<a href="company" class="orange-color more-link">Читать дальше<span class="fa fa-long-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row question">
			<div class="col-md-12 text-center">
				<p>Не нашли ответ на интересующий вопрос?</p>
				<p>Оставьте ваш номер телефона, и наш специалист с радостью ответит на любой вопрос!</p>
				<br>
				<form action="mail" method="POST" class="form-inline" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<input type="phone" class="form-control" id="" required="required" placeholder="Номер телефона" name="phone">
					</div>
					<button type="submit" class="btn btn-default">ЗАКАЗАТЬ БЕСПЛАТНУЮ КОНСУЛЬТАЦИЮ</button>
				</form>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 product-carousel-block post-slider-wrapper">
				<h2 class="title">Статьи</h2>
				<div class="owl-prev fa fa-angle-left"></div>
				<div class="owl-next fa fa-angle-right"></div>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-12">
				<div class="post-slider">
                 @foreach ($articles as $article)
					<div class="post">
						<div class="image-block" style="background-image: url({{ $article->img_path }});">
							<div class="post-date text-center">
								<b>{!!$article->date!!}</b>
								<hr style="border-color: #f0623f">
								<p>{!!$article->month!!}</p>
							</div>
						</div>
						<div class="info-block">
							<h4>{!!$article->title!!}</h4>
							<br>
							<a href="article_page?id={{$article->id}}" class="orange-color more-link">Читать далее<span class="fa fa-long-arrow-right"></span></a>
						</div>
					</div>
                @endforeach
				</div>
			</div>
			<div class="col-md-12 text-center">
				<div class="seo-text text-left">
					<h1>{!!$material[1]->title!!}</h1>
					<p>{!!$material[1]->body!!}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row partners">
			<div class="col-md-12 partners-wrapper">
				<div class="owl-prev fa fa-angle-left"></div>
				<div class="owl-next fa fa-angle-right"></div>
				<div class="partners-slider">
				@foreach ($brands as $brand)
					<div><img src="{{ $brand->img_path }}" alt="logo"></div>
				@endforeach
					<!--<div><img src="{{ asset('images/partners/8824310-fedex-logo-650-a542d8629a-1484575865.jpg') }}" alt="logo"></div>
					<div><img src="{{ asset('images/partners/google_logo_2015.jpg') }}" alt="logo"></div>
					<div><img src="{{ asset('images/partners/logo_blum.png') }}" alt="logo"></div>
					<div><img src="{{ asset('images/partners/logo-kronospan.png') }}" alt="logo"></div>
					<div><img src="{{ asset('images/partners/8824310-fedex-logo-650-a542d8629a-1484575865.jpg') }}" alt="logo"></div>
					<div><img src="{{ asset('images/partners/google_logo_2015.jpg') }}" alt="logo"></div>
					<div><img src="{{ asset('images/partners/logo_blum.png') }}" alt="logo"></div>
					<div><img src="{{ asset('images/partners/logo-kronospan.png') }}" alt="logo"></div><div><img src="images/partners/8824310-fedex-logo-650-a542d8629a-1484575865.jpg" alt="logo"></div>
					<div><img src="{{ asset('images/partners/google_logo_2015.jpg') }}" alt="logo"></div>
					<div><img src="{{ asset('images/partners/logo_blum.png') }}" alt="logo"></div>-->
				</div>
			</div>
		</div>
	</div>
@stop


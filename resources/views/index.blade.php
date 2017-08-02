<!DOCTYPE html>

<html lang="ru">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{URL:: asset('images/favicon.png') }}" type="image/x-icon">

    <title>Техноконтинент</title>

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.2/baguetteBox.min.css">

    <!-- Main css -->

    <link rel="stylesheet" href=" {{ URL::asset('css/style.css') }} ">



	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
   

</head>

<body>

<div class="content-wrapper">

	<div class="floating-block">

		<div class="float-item">

			<a data-toggle="modal" href="#call-back">

				<div class="head-img">

					<img src="{{ asset('images/icons/phone-call.png') }}" alt="icon">

				</div>

				<div class="link-text font-light">

					Заказать звонок

				</div>

			</a>

		</div>

		<div class="clearfix"></div>

		<div class="float-item">

			<a data-toggle="modal" href="#measure">

				<div class="head-img">

					<img src="{{ asset('images/icons/measuring-tape.png') }}" alt="icon">

				</div>

				<div class="link-text font-light">

					Заказать замер

				</div>

			</a>

		</div>

		<div class="clearfix"></div>

		<div class="float-item">

			<a data-toggle="modal" href="#calculator">

				<div class="head-img">

					<img src="{{ asset('images/icons/calculator.png') }}" alt="icon">

				</div>

				<div class="link-text font-light">

					Калькулятор стоимости

				</div>

			</a>

		</div>

		<div class="clearfix"></div>

		<div class="float-item">

			<a data-toggle="modal" href="#consultation">

				<div class="head-img">

					<img src="{{ asset('images/icons/consulting-message.png') }}" alt="icon">

				</div>

				<div class="link-text font-light">

					Заказать консультацию

				</div>

			</a>

		</div>

	</div>



	<div class="container-fluid">

		<div class="row info-panel">

			<div class="col-md-12">

				<div class="left-block">

                    <span><span class="fa fa-map-marker"></span>Ваш регион: <a href="" id="region"></a></span>
                     <script>
                        /*function showCity(o)
                        {
                        
                            document.getElementById('region').after(o.country+' - '+o.city);

                        }*/
                    </script>
                   <!--<script src="http://ip-api.com/json/?fields=country,city&callback=showCity"></script>-->


					<ul class="info-nav">

                    @foreach ($menu as $item)

                        @if (! $item->modal)

						<li class="hidden-xs"><a href="{{$item->link}}">{{$item->title}}</a></li>

                        @else

						<li class="hidden-xs"><a data-toggle="modal" href="{{$item->link}}">{{$item->title}}</a></li>

                        @endif

                    @endforeach   

					</ul>

				</div>

				<div class="right-block">

					<span><span class="fa fa-clipboard"></span><a data-toggle="modal" href="#partners-registration">Стать партнером</a></span>

					<span class="orange-color"><span class="fa fa-sign-in"></span><a data-toggle="modal" href="#partners-enter">Вход для партнеров</a></span>

				</div>

				<div class="clearfix"></div>

			</div>

		</div>

	</div>

  <nav class="navbar navbar-default" role="navigation">

  	<div class="container-fluid">

  		<div class="row">

  			<div class="col-md-12">

		  		<!-- Brand and toggle get grouped for better mobile display -->

		  		<div class="navbar-header">

		  			<div class="row">

		  				<div class="col-sm-3">

		  					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

				  				<span class="sr-only">Toggle navigation</span>

				  				<span class="icon-bar"></span>

				  				<span class="icon-bar"></span>

				  				<span class="icon-bar"></span>

				  			</button>

				  			<a class="navbar-brand" href="/">

								<img src="{{ asset('images/logo.png') }}" alt="logo">

				  			</a>

		  				</div>

		  				<div class="col-sm-5 hidden-xs">

		  					<div class="row header-info">

		  						<div class="col-sm-6">

		  							<span class="fa fa-phone"></span>

									<div class="dropdown">

	  									<a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! $contacts[0]->phone_mts!!}</a>

	  									<ul class="dropdown-menu">

	  										<a href="#">{!! $contacts[0]->phone_velcome!!}</a>

                                            <a href="#">{!! $contacts[0]->phone!!}</a>

	  									</ul>

	  								</div>

	  								<span style="color:#898989;font-size: 0.9em;">{!! $contacts[0]->work!!}</span>

	  								<a data-toggle="modal" href="#call-back" class="orange-color more-link">Вам перезвонить?</a>



		  						</div>

		  						<div class="col-sm-6">

		  							<span class="fa fa-map-marker"></span>

		  							<p>{!! $contacts[0]->address!!}</p>

		  						</div>

		  					</div>

		  				</div>

						<div class="clearfix visible-xs"></div>

		  				<div class="col-sm-4">

		  					<form class="navbar-form navbar-right search-form" action="search" role="search">

				  				<div class="form-group">

				  					<select name="id" id="input" class="form-control">

				  						<option value="">Все категории</option>

                                            @if ($catalogs!= null)
                                                @foreach ($catalogs as $catalog)
                                                    <option value="{{$catalog->id}}">{{$catalog->title}}</option>
                                                @endforeach
                                            @endif

				  					</select>

				  					<input type="text" class="form-control" required="required" placeholder="Искать продукцию" name="search">

				  				</div>

				  				<button type="submit" class="fa fa-search"></button>

				  			</form>

		  				</div>

		  			</div>

		  		</div>

		  	</div>

		</div>

		<div class="row main-menu">

		  	<div class="col-md-12">

		  		<!-- Collect the nav links, forms, and other content for toggling -->

		  		<div class="collapse navbar-collapse navbar-ex1-collapse">

		  			<ul class="nav navbar-nav text-uppercase">

		  				<li class="dropdown hidden-xs">

		  					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bars"></span>Каталог продукции</a>

		  					<ul class="dropdown-menu container text-capitalize">

		  						<div class="row">

                                <!--Если каталогов меньше чем 10, то один столбец -->

                                @if (($parent_catalogs != null) && (count($parent_catalogs) !=0)&& (count($parent_catalogs)<10))

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

		  					</ul>

		  				</li>

                        @foreach ($main_menu as $item )

                            <li><a href="{{$item->link}}">{{$item->title}}</a></li>

                        @endforeach

		  			</ul>

		  		</div><!-- /.navbar-collapse -->

		  	</div>

  		</div>

  	</div>

  </nav>

    

    

    

        @yield('content', 'Default Content')

        

        

        

  

<div class="container-fluid">

    <div class="row distribution" style="background-image: url('{{ asset('images/distribution.jpg') }}');">

        <div class="col-md-12 text-center">

            <h2>РАССЫЛКА</h2>

            <p>Подпишитесь на нашу рассылку<br>

                и получайте актуальные цены на кровельные материалы!</p>

            <br>

            <form action="user_dispatch" method="POST" class="form-inline" role="form">
            {{csrf_field()}}
                <div class="form-group">

                    <input type="email" class="form-control" id="" required="required" name="email" placeholder="Email">

                </div>

                <button type="submit" class="btn btn-warning">ПОДПИСАТЬСЯ</button>

            </form>
             <?php
                session_start();
                if(isset($_SESSION['sended']) && ($_SESSION['sended'])) : ?>
                 <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.css">
                 <script src="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.js"></script>
               <script>
                swal({
                    title: 'Успешно отправлено!',
                    timer: 3000,
                    type: 'success',
                    showCancelButton: false,
                    showConfirmButton: false
                   });
            </script>
             <?php $_SESSION['sended'] = null; endif; ?>

        </div>

    </div>

</div>

<div class="container-fluid text-center map">

    <div class="row map-wrapper">

        <div id="map"></div>

    </div>

</div>

<div class="container-fluid">

    <div class="row footer">

        <div class="col-md-12 text-center">

            <div class="row text-left">

                <div class="col-sm-3">

                    <h4 class="text-uppercase">Контакты</h4>

                    <ul class="contacts-list">

                        <li><span class="fa fa-phone"></span>{!! $contacts[0]->phone_mts!!}<br>{!! $contacts[0]->phone_velcome!!} <br>{!! $contacts[0]->phone!!}</li>

                        <li><span class="fa fa-map-marker"></span>{!! $contacts[0]->address!!}</li>

                        <li><span class="fa fa-clock-o"></span>{!! $contacts[0]->work!!}</li>

                        <li><span class="fa fa-envelope" style="font-size: 1em"></span>{!! $contacts[0]->mail!!}</li>

                    </ul>

                </div>

                <div class="col-sm-3 footer-product-wrapper">

                    <h4 class="text-uppercase">Продукция</h4>

                    <div class="owl-nav">

                        <div class="owl-prev fa fa-angle-left"></div>

                        <div class="owl-next fa fa-angle-right"></div>

                    </div>

                    <div class="footer-product-slider">

                         <!--Если каталогов меньше чем 10, то один столбец -->

                        @if (($parent_catalogs != null) && (count($parent_catalogs) !=0)&& (count($parent_catalogs)<10))

                            <!--<div class="col-sm-3">-->

                                <ul><!-- у них нет родителей но и не обязательно у них есть дети-->

                                    @for ($j = 0; $j < count($parent_catalogs); $j++)

                                        @if (DB::table('catalogs')->where('parent',$parent_catalogs[$j]->id)->first()!= null)

                                            <li><a href="catalogs?id={{$parent_catalogs[$j]->id}}">{{$parent_catalogs[$j]->title}}</a></li> <!--У них есть дети-->

                                        @else

                                            <li><a href="products?parent={{$parent_catalogs[$j]->id}}">{{$parent_catalogs[$j]->title}}</a></li><!--У них нет детей-->

                                        @endif

                                    @endfor	

                                </ul>   

                            <!--</div>-->

                        <!--Если каталогов больше чем 10, то расчитывается количество столбцов -->

                        @elseif (($parent_catalogs != null) && (count($parent_catalogs)!=0))

                            <?php $count_catalogs = count($parent_catalogs)?>

                            <?php $cols = intval($count_catalogs/10)?>

                            <?php $ost = $count_catalogs % 10?>

                            <?php $i = 0?>

                            <?php $k = 0?>

                            <?php $z = 10?>

                            @while($i <= $cols)

                                <div>

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

                <div class="col-sm-3">

                    <h4 class="text-uppercase">Услуги</h4>

                    <ul>

                        @foreach ($services as $service)

                        <li><a href="service_page?id={{$service->id}}">{!!$service->title!!}</a></li>

                        @endforeach

                    </ul>

                </div>

                <div class="col-sm-3">

                    <h4 class="text-uppercase">Клиентам</h4>

                    <ul>

                        @foreach ($menu as $item)
                            @if (! $item->modal)
                                <li><a href="{{$item->link}}">{{$item->title}}</a></li>
                            @else
                                <li><a data-toggle="modal" href="{{$item->link}}">{{$item->title}}</a></li>
                            @endif
                        @endforeach 

                    </ul>

                    <br>

                    <a href="site_map" style="color:#a9a9a9;text-decoration:underline;font-size:1.1em;">Карта сайта</a>

                    <ul class="contacts-links">

                        <li><a href="https://{!!$contacts[0]->inst!!}" target="_blank"><span class="fa fa-instagram"></span></a></li>

                        <li><a href="https://{!!$contacts[0]->vk!!}" target="_blank"><span class="fa fa-vk"></span></a></li>

                        <li><a href="https://{!!$contacts[0]->fb!!}" target="_blank"><span class="fa fa-facebook"></span></a></li>

                    </ul>

                </div>

            </div>

            <div class="footer-back">

                <div class="footer-logo">

                    <img src="{{ asset('images/logo-footer.png') }}" alt="logo">

                </div>

                <p>{!!$contacts[0]->footer!!}</p>

                <!--<div class="carts">

                    <img src="{{ asset('images/footer-icons.png') }}" alt="icons">

                </div>-->

            </div>



        </div>

    </div>

</div>

</div>





<div class="modal fade" id="partners-enter">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

				<h2 class="modal-title orange-color">Вход для партнеров</h2>

                <p class="font-light">Введите ваш ID, и пароль выданные <br>

                    нашей компанией при регистрации</p>

			</div>

			<div class="modal-body">

				<form action="" method="POST" role="form">

                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="id" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Ваш ID</label>

                    </div>

                    <div class="form-group">

                        <input type="password" required value="" class="form-control" name="password" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="phone">Пароль</label>

                    </div>

                    <button type="submit" class="btn btn-warning">Войти в аккаунт</button>

				</form>

                <small><span class="orange-color">*</span>Ваши личные данные в безопасности, и не будут переданы третьим лицам.</small>

			</div>

		</div><!-- /.modal-content -->

	</div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="partners-registration">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Стать нашим партнером</h2>

                <p class="font-light">Оставьте ваши контактные данные в форме ниже,<br>

                    и наш менеджер свяжется с Вами для уточнения предоставленных данных</p>

            </div>

            <div class="modal-body">

                <form action="" method="POST" role="form">

                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="name" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Ваше имя</label>

                    </div>

                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="organization" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Организация, ИП или частное лицо</label>

                    </div>

                    <div class="form-group">

                        <input type="tel" value="" required class="form-control" name="phone" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Номер телефона</label>

                    </div>

                    <div class="form-group">

                        <input type="email" value="" required class="form-control" name="email" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Электронная почта</label>

                    </div>

                    <button type="submit" class="btn btn-warning">Стать партнером</button>

                </form>

                <small><span class="orange-color">*</span>Ваши личные данные в безопасности, и не будут переданы третьим лицам.</small>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="call-back">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Заказать обратный звонок</h2>

                <p class="font-light">Оставьте ваши контактные данные в форме ниже,<br>

                    и наш менеджер сам перезвонит вам, и ответит на все вопросы. </p>

            </div>

            <div class="modal-body">

                <form action="mail" method="POST" role="form">
                    {{csrf_field()}}
                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="name" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Ваше имя</label>

                    </div>

                    <div class="form-group">

                        <input type="tel" value="" required class="form-control" name="phone" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Номер телефона</label>

                    </div>

                    <button type="submit" class="btn btn-warning">Заказать обратный звонок</button>

                </form>

                <small><span class="orange-color">*</span>Ваши личные данные в безопасности, и не будут переданы третьим лицам.</small>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="for-partners">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Партнерам</h2>

            </div>

            <div class="modal-body">

                <p>{!!$modals[0]->partners!!}</p>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="pay">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Оплата</h2>

            </div>

            <div class="modal-body">

                <p>{!!$modals[0]->payment!!}</p>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="delivery">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Доставка</h2>

            </div>

            <div class="modal-body">

                <p>{!!$modals[0]->leave!!}</p>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="buy-info">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Купить</h2>

            </div>

            <div class="modal-body">

                <p>{!!$modals[0]->buy!!}</p>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="garanty">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Гарантии</h2>

            </div>

            <div class="modal-body">

                <p>Информация о гарантиях</p>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="buy">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Заказать</h2>

                <p class="font-light">Оставьте ваши контактные данные в форме ниже,<br>

                    и наш менеджер сам перезвонит вам для уточнения деталей заказа.</p>

            </div>

            <div class="modal-body">

                <form action="mail" method="POST" role="form">
                    {{csrf_field()}}
                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="name" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Ваше имя</label>

                    </div>

                    <div class="form-group">

                        <input type="tel" value="" required class="form-control" name="phone" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Номер телефона</label>

                    </div>



                    <input type="hidden" name="product_name" id="product-name">

                    <input type="hidden" name="product_color" id="product-color">



                    <button type="submit" class="btn btn-warning">Заказать</button>

                </form>

                <small><span class="orange-color">*</span>Ваши личные данные в безопасности, и не будут переданы третьим лицам.</small>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="measure">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Заказать замер</h2>

                <p class="font-light">Оставьте ваши контактные данные в форме ниже,<br>

                    и наш менеджер сам перезвонит вам, и ответит на все вопросы. </p>

            </div>

            <div class="modal-body">

                <form action="mail" method="post" role="form">
                    {{csrf_field()}}
                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="name" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Ваше имя</label>

                    </div>

                    <div class="form-group">

                        <input type="tel" value="" required class="form-control" name="phone" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Номер телефона</label>

                    </div>

                    <button type="submit" class="btn btn-warning">Заказать замер</button>

                </form>

                <small><span class="orange-color">*</span>Ваши личные данные в безопасности, и не будут переданы третьим лицам.</small>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->



<div class="modal fade" id="consultation">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Заказать консультацию</h2>

                <p class="font-light">Оставьте ваши контактные данные в форме ниже,<br>

                    и наш менеджер сам перезвонит вам, и ответит на все вопросы. </p>

            </div>

            <div class="modal-body">

                <form action="mail" method="POST" role="form">
                    {{csrf_field()}}
                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="name" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Ваше имя</label>

                    </div>

                    <div class="form-group">

                        <input type="tel" value="" required class="form-control" name="phone" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Номер телефона</label>

                    </div>

                    <button type="submit" class="btn btn-warning">Заказать консультацию</button>

                </form>

                <small><span class="orange-color">*</span>Ваши личные данные в безопасности, и не будут переданы третьим лицам.</small>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->






<div class="modal fade" id="comment">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Оставить отзыв</h2>

            </div>

            <div class="modal-body">

                <form action="feedback" method="POST" role="form" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="name" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Ваше имя</label>

                    </div>

                    <div class="form-group">

                        <input type="text" value="" required class="form-control" name="city" onkeyup="this.setAttribute('value', this.value);">

                        <label class="font-light" for="fio">Откуда вы?</label>

                    </div>

                    <div class="form-group">

                        <textarea name="text" id="input" class="form-control" rows="3" required="required" onkeyup="this.setAttribute('value', this.value);" value=""></textarea>

                        <label class="font-light" for="fio">Ваш отзыв</label>

                    </div>

                    <div class="text-left">

                        <p class="font-regular" style="margin-bottom: 0">Прикрепить фото:</p>

                        <div class="clearfix"></div>

                        <label for="file" class="font-bold text-left file-label">

                            <input type="file" id="file" multiple="" name="img_path">

                            <span class="fa fa-paperclip"></span>

                            Выбрать файл на компьютере

                      </label>

                    </div>

                   

                    <button type="submit" class="btn btn-warning">Оставить отзыв</button>

                </form>

                <small><span class="orange-color">*</span>Ваши личные данные в безопасности, и не будут переданы третьим лицам.</small>

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->





<div class="modal fade" id="calculator">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">

                    <img src="{{ asset('images/icons/close-modal.png') }}" alt="close">

                </button>

                <h2 class="modal-title orange-color">Калькулятор стоимости</h2>

            </div>

            <div class="modal-body">

                Содержимое калькулятора стоимости

            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div><!-- /.modal -->











<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.2.0/readmore.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.2/baguetteBox.min.js"></script>

<script src="{{ URL::asset('js/multiple-accordion.js') }}"></script>

<script src="{{ URL::asset('js/script.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('js/yandex_api.min.js') }}"></script>

<script>

    ymaps.ready(function () {

        var myMap = new ymaps.Map('map', {

                center: [53.13683607128403,26.011338999999936],

                zoom: 17,

                controls: ['zoomControl', 'typeSelector',  'fullscreenControl', 'geolocationControl', 'rulerControl']

            }, {

                searchControlProvider: 'yandex#search'

            }),



            myPlacemark = new ymaps.Placemark([53.13683607128403,26.011338999999936], {

                hintContent: 'г.Барановичи ул. Брестская, 86',

                balloonContent: 'ООО «Техноконтинент»<br>г.Барановичи ул. Брестская, 86<br>Пн-Пт с 9:00 до 18:00<br>Сб-Вс с 9:00 до 15:00<br>МТС 673-6-999<br>VEL 683-6-999'

            }, {

                // Опции.

                // Необходимо указать данный тип макета.

                iconLayout: 'default#image',

                // Своё изображение иконки метки.

                iconImageHref: '{{ asset('images/logo-footer.png') }}',

                // Размеры метки.

                iconImageSize: [201, 31],

                // Смещение левого верхнего угла иконки относительно

                // её "ножки" (точки привязки).

                iconImageOffset: [-100, -31]

            });

        myMap.geoObjects

            .add(myPlacemark);

    });

</script>



</body>

</html>




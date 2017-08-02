$(document).ready(function(){
	var main_slider = $(".main-slider").owlCarousel({
		items: 1,
		nav:false,
		loop:true,
		dots:true,
		margin:1,
		autoplay:true
	});
   $('.main-slider-wrapper .owl-prev').click(function() {
    main_slider.trigger('prev.owl.carousel');
  });
  $('.main-slider-wrapper .owl-next').click(function() {
    main_slider.trigger('next.owl.carousel');
  });

  var product_slider = $(".product-slider").owlCarousel({
		nav:false,
		loop:false,
		dots:true,
		margin:30,
		responsive:{
	      0:{
	          items:1,
	      },
	      640:{
	          items:2,
	      },
	      768:{
	          items:3,
	      },
	      1080:{
	      	items:4,
	      }
	    } 
	});
  $('.product-carousel-block .owl-prev').click(function() {
    product_slider.trigger('prev.owl.carousel');
  });
  $('.product-carousel-block .owl-next').click(function() {
    product_slider.trigger('next.owl.carousel');
  });
  var comment_slider = $(".comment-slider").owlCarousel({
		items: 1,
		nav:false,
		loop:true,
		dots:true,
		margin:1,
		autoplay:true
	});
  $('.comment-slider-wrapper .owl-prev').click(function() {
    comment_slider.trigger('prev.owl.carousel');
  });
  $('.comment-slider-wrapper .owl-next').click(function() {
    comment_slider.trigger('next.owl.carousel');
  });
  var post_slider = $(".post-slider").owlCarousel({
		nav:false,
		loop:false,
		dots:true,
		margin:30,
		responsive:{
	      0:{
	          items:1,
	      },
	      640:{
	          items:1,
	      },
	      768:{
	          items:2,
	      },
	      1080:{
	      	items:3,
	      }
	    } 
	});
  $('.post-slider-wrapper .owl-prev').click(function() {
    post_slider.trigger('prev.owl.carousel');
  });
  $('.post-slider-wrapper .owl-next').click(function() {
    post_slider.trigger('next.owl.carousel');
  });
  $('.seo-text').readmore({
		collapsedHeight: 290,
	    heightMargin: 16,
	  lessLink: '<a href="#" class="readmorebtn text-uppercase">Свернуть</a>',
	  moreLink: '<a href="#" class="readmorebtn text-uppercase">Развернуть</a>'
	});
  var partners_slider = $(".partners-slider").owlCarousel({
		nav:false,
		loop:false,
		dots:false,
		margin:30,
		responsive:{
	      0:{
	          items:2,
	      },
	      640:{
	          items:3,
	      },
	      768:{
	          items:4,
	      },
	      1080:{
	      	items:6,
	      }
	    } 
	});
  $('.partners-wrapper .owl-prev').click(function() {
    partners_slider.trigger('prev.owl.carousel');
  });
  $('.partners-wrapper .owl-next').click(function() {
    partners_slider.trigger('next.owl.carousel');
  });
  $('.map-wrapper').readmore({
		collapsedHeight: 0,
	    heightMargin: 16,
	  lessLink: '<a href="#" class="mapbtn text-uppercase">Скрыть карту<span class="fa fa-angle-up"></span></a>',
	  moreLink: '<a href="#" class="mapbtn text-uppercase">Показать карту<span class="fa fa-angle-down"></span></a>'
	});
  var footer_product_slider = $(".footer-product-slider").owlCarousel({
		nav:false,
		loop:false,
		dots:false,
		items:1
	});
  $('.footer-product-wrapper .owl-prev').click(function() {
    footer_product_slider.trigger('prev.owl.carousel');
  });
  $('.footer-product-wrapper .owl-next').click(function() {
    footer_product_slider.trigger('next.owl.carousel');
  });
	$('.banner-close').click(function(e){
		e.preventDefault();
		$('.banner').remove();
	});
	baguetteBox.run('.baguetteBox');

	$(".catalog-nav").accordion({
		accordion:false,
		speed: 500,
		closedSign: '<b class="caret"></b>',
		openedSign: '<b class="caret invert"></b>'
	});

	var product_page_slider = $(".product-page-carousel").owlCarousel({
		items: 1,
		nav:false,
		loop:false,
		dots:false,
		margin:1,
		autoplay:false,
		lazyLoad:true
	});
	var product_page_slider_thumb = $(".product-page-carousel-thumb").owlCarousel({
		items: 4,
		nav:false,
		loop:false,
		dots:false,
		margin:15,
		autoplay:false,
		mouseDrag:false
	});
	$('.product-page-carousel-thumb .owl-item').click(function() {
		var active = $(this).index();
		product_page_slider.trigger('to.owl.carousel',active);
	});


	$('.product-page-carousel-wrapper .owl-prev').click(function() {
		product_page_slider_thumb.trigger('prev.owl.carousel');
	});
	$('.product-page-carousel-wrapper .owl-next').click(function() {
		product_page_slider_thumb.trigger('next.owl.carousel');
	});

	$('.colors-block .color').click(function(){
		$('.colors-block .color').removeClass('active');
		$(this).addClass('active');
	});
	$('[data-toggle="tooltip"]').tooltip({'placement': 'top'});

	$('[href="#buy"]').click(function(e){
		var product_name = $(this).parent().find('h4').text();
		if (product_name == ''){
			product_name = $(this).parent().parent().find('h1').text();
		}
		var product_color = $(this).parent().parent().find('.color.active span').attr('data-original-title');
		if (product_color == undefined){
			product_color = 'Не выбран';
		}
		$('#buy #product-name').attr('value',product_name);
		$('#buy #product-color').attr('value',product_color);
	});

});
jQuery(function($){

	$('.instagram-feed').slick({
		centerMode:!0,
		slidesToShow:4,
		centerPadding:'60px',
		infinite:!0,
		nextArrow: "<div data-u='arrowright' class='cen-y jssora031 aleft' style='width:25px;height:25px;right:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>",
		prevArrow:"<div data-u='arrowleft' class='cen-y jssora031 aright' style='width:25px;height:25px;left:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>"
	});
	$('.slider').slick({
		centerMode:!0,
		slidesToShow:1,
		dots:!0,
		centerPadding:'120px',
		infinite:!0,
		  adaptiveHeight: true,
		nextArrow: "<div data-u='arrowright' class='cen-y jssora031 aleft' style='width:25px;height:25px;right:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>",
		prevArrow:"<div data-u='arrowleft' class='cen-y jssora031 aright' style='width:25px;height:25px;left:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>"
	});

	$('.gallery').slick({
		infinite: !0,
		nextArrow: "<div data-u='arrowright' class='cen-y jssora031 aleft' style='width:25px;height:25px;right:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>",
		prevArrow:"<div data-u='arrowleft' class='cen-y jssora031 aright' style='width:25px;height:25px;left:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>"
	


		});

$original = $('.slick-active > img').height();
	$('.slider .slick-arrow, .slider .slick-dots').click(function(){
		$ui = $('.slick-active img').height();
		
		$('.slick-list').css('height', $ui );

	}) 
	$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    	if (scroll > 130) {
    		$('#masthead').addClass('fixed-header');
    		$('#content').addClass('marg');

    	} else {


    	

    	}
});
	function fadeInLI() {
		var bi = $('.bnm > .opasso > div:first');
		bi.hide();
		bi.remove()
		$('.bnm > .opasso').append(bi);
		bi.show();

	}
	var _intervalId;
	if ($('.home-page').length > 0 ){
		$('.hpost-box').hover(function() {
			var intervalD = 200;
			var t = 0;
			$('.dfirs').addClass('opassz');
			$classes = $(this).attr('class').split(/\s+/);
			var id = document.getElementById($classes[1]);
			$('.bnm > div').each(function() {
					if ($(this).attr('id') == $classes[1]) {
							$(this).addClass('opasso');
	
	
	
					} else {
							$(this).removeClass('opasso');
							
	
					}
	
			});
			
			var c = id.children;
			for (j = 0; j < c.length; j++) {
				if ( ! $(c[j]).hasClass(' sou-' + j)) {
					$(c[j]).addClass(' sou-' + j);
				} 
			}
	
			if ($('.bnm > div').hasClass('opasso')) {
				_intervalID = setInterval(function() {
					fadeInLI()
					
				}, intervalD);
	
			}
	
		}, function () {
			clearInterval(_intervalID);
			$('.bnm > div').removeClass('opasso');
			$('.dfirs').removeClass('opassz');
	
		});
	}
		function fadeIne() {
			$('.tu-one prp-1 > img').addClass('opassz');
			var bi = $('.tu-one prp-1 > img:first');
			bi.removeClass('opassz');
			console.log(bi);
		bi.hide();
		bi.remove()
		$('.tu-two .prp-1').append(bi);
		bi.show();
		}	
		function fadeInr() {
			var bi = $('.tu-one prp-2 > img:first-child ');
			bi.removeClass('opassz');
			
			bi.hide();
			bi.remove()
			$('.tu-two .prp-2').append(bi);
			bi.show();
		}
		
		function fadeInt() {

			var bi = $('.tu-one prp-3 > img:first-child');
			bi.removeClass('opassz');
			
			bi.hide();
			bi.remove()
			$('.tu-two .prp-3').append(bi);
			bi.show();
		}
	
	$('.tu-two a').hover(function() {
		var intervalD = 200;

		$('#dfirst').addClass('opassz');
		if ($(this).hasClass('prp-1')) {
			$('.tu-one .prp-1').addClass('opasso');
			$('.tu-one .prp-2').removeClass('opasso');
			$('.tu-one .prp-3').removeClass('opasso');

			_intervalID = setInterval(function() {
				fadeIne();
				
			}, intervalD);

			
		}
		if ($(this).hasClass('prp-2')) {
			$('.tu-one .prp-2').addClass('opasso');
			$('.tu-one .prp-1').removeClass('opasso');
			$('.tu-one .prp-3').removeClass('opasso');


			_intervalID = setInterval(function() {
			fadeInr();
				
				
			}, intervalD);

		}
		if ($(this).hasClass('prp-3')) {
			$('.tu-one .prp-3').addClass('opasso');
			$('.tu-one .prp-1').removeClass('opasso');
			$('.tu-one .prp-2').removeClass('opasso');



			_intervalID = setInterval(function() {
			fadeInt();
								
			}, intervalD);

		}
	}, function() {
		clearInterval(_intervalID);
		$('.tu-one .prp-2').removeClass('opasso');
			$('.tu-one .prp-3').removeClass('opasso');
			$('.tu-one .prp-1').removeClass('opasso');

		$('#dfirst').removeClass('opassz');

	});
	$('.jobs .hpost-box').click(function() {

		$(this).next().children('.bod.description').addClass('stretch');
	})
});
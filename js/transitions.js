jQuery(function($){


$(document).ready(function(){
    if ($('.home-page').length > 0 ) {
    	$(this).scrollTop(0);
    }
});

$home = $('#menu-item-45 > a');
$ss = $('.site-title a');
var g = $home.attr('href') + '#';
$home.attr('href', g);
$ss.attr('href', g);
if ($(window).width() < 690 ) {
$('#nav-icon3').css('display', 'block');
$('#primary-menu').addClass('opasso');
	$('#primary-menu').css('display', 'inline-flex');
}
if ($('.contact-page').length > 0 ) {
	$('#content').addClass('cen-xyz');
}
	$('.instagram-feed').slick({
		centerMode:!0,
		slidesToShow:4,
		centerPadding:'60px',
		infinite:!0,
		nextArrow: "<div data-u='arrowright' class='cen-y jssora031 aleft' style='width:25px;height:25px;right:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>",
		prevArrow:"<div data-u='arrowleft' class='cen-y jssora031 aright' style='width:25px;height:25px;left:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>",
		responsive: [{
			breakpoint:800,
			settings: {
				slidesToShow:2,
				centerPadding:'40px'
			}
		}]
		});
	$('.slider').slick({
		centerMode:!0,
		slidesToShow:1,
		dots:!0,
		centerPadding:'200px',
		infinite:!0,
		draggable:false,

		  nextArrow: "<div class='yrp' style='width:120px;height:calc(100% - 80px);top:80px;right:0px;'><div data-u='arrowright' class='cen-y jssora031 aleft' style='width:35px;height:35px;right:40px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div></div>",
		prevArrow:"<div class='yrp' style='width:120px;height:calc(100% - 80px);left:0px;'><div data-u='arrowleft' class='cen-y jssora031 aright' style='width:35px;height:35px;left:40px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div></div>",
		responsive: [{
			breakpoint:945,
			settings: {
				centerPadding:'80px'
			},
			breakpoint:690, 
			settings: {
				centerPadding:'0px'
			}
		}]
	});

$('.sliderr').slick({
		slidesToShow:1,
		dots:!0,
		centerPadding:'120px',
		infinite:!0,
		nextArrow: "<div data-u='arrowright' class='cen-y jssora031 aleft' style='width:40px;height:40px;right:-55px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>",
		prevArrow:"<div data-u='arrowleft' class='cen-y jssora031 aright' style='width:40px;height:40px;left:-55px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>"

	});
	Marquee3k({
    selector: '.marquee',
    randomSpeed: 0, // if true, each marquee will be assigned a random speed between 10-50px/sec
    resizeDebounce: 500, // in ms, defaults to 500ms
    spacing:500 // number in px, space between copies - defaults to 30 // define a custom classname
});
$('#content').removeClass('fade-in');

var original = $('.slick-active').height();
$('.slick-slide.slick-active').addClass('zorro');

if ($('.sliderr').length > 0 ) {
	$('.slick-dots').css('bottom', -60 );

}

if ($('.slider').length > 0 ) {
	var ui = $('.slick-active img').height();
		if (original > ui ) {
			var dif = (original - ui)/2 - 47;
			
			var adjDif = dif;
		} else {
			var adjDif = 0;
		}
		$('.slick-dots').css('bottom', adjDif );


}
	$('.sliderr .slick-arrow, .sliderr .slick-dots').click(function(){
		var ui = $('.slick-active img').height();
		original = $('.slick-slide').height();

		if (original > ui ) {
			var dif = (original - ui)/2 - 27;
			
			var adjDif = dif;
		} else {
			var adjDif = 0;
		}
		$('.slick-dots').css('bottom', adjDif );

	}) 
$('.slider .slick-arrow, .slider .slick-dots').click(function(){
		var ui = $('.slick-active img').height();
		original = $('.slick-slide').height();

		if (original > ui ) {
			var dif = (original - ui)/2 - 47;
			console.log(dif);
			console.log(original);
			var adjDif = dif;
		} else {
			var adjDif = 0;
		}
		$('.slick-dots').css('bottom', adjDif );

	}) 

if ($('.slick-track > div').length == 1 ) {
	$('.slick-dots').css('display', 'none');
}

var timeout = false;
var delta = 100;
$(window).resize(function() {
	if ($(window).width() > 690 ) {
		$('#nav-icon3').css('display', 'none');
	} else {
		$('#nav-icon3').css('display', 'block');
		$('#primary-menu').css('display', 'inline-flex');
		

	}
	if ($('.home-page').length > 0 ){
		
		
	fixmeTop = $('.home-page').offset().top - 60; 
	if ($(window).width() > 690 ) {

			var currentScroll = $(window).scrollTop();
			if (currentScroll <= fixmeTop) {
			$('#masterhead').removeClass('fixee');

			}
		}

}
if (($('.slider').length > 0 ) || ($('.sliderr').length > 0 )){

    if (timeout === false) {
        timeout = true;
        setTimeout(resizeend, delta);
    }


	}
});

function resizeend() {
	var ui = $('.slick-active img').height();
		original = $('.slick-slide').height();

		if (original > ui ) {
			var dif = (original - ui)/2 - 27;
			
			var adjDif = dif;
		} else {
			var adjDif = 0;
		}
		$('.slick-dots').css('bottom', adjDif );

		 timeout = false;

}

	$('.hpost-box').hover(function() {
		if ( !$('.stretch').length > 0 ) {
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			 // some code..
			} else {
							$(this).addClass('hovee');
				$(this).find('.hpost-title').addClass('hoveep');
							

			}
		}

			}, function() {
		if ( !$('.stretch').length > 0 ) {

				$(this).removeClass('hovee');
				$(this).find('.hpost-title').removeClass('hoveep');
		}
	});
		if ($('.home-page').length > 0 ){
	
	var fixmeTop = $('.home-page').offset().top - 60; 

}
	$(window).scroll(function (event) {
		if ($(window).width() > 690 ) {
				if ($('.home-page').length > 0 ){
		
							var currentScroll = $(window).scrollTop();
						if (currentScroll >= fixmeTop) {           
				        $('#masterhead').addClass('fixee');
				         $('#masterhead').removeClass('rell');

				        $('body').addClass('marg');
				    } else {                                   
				        $('#masterhead').addClass('rell');
				         $('#masterhead').removeClass('fixee');
				        $('body').removeClass('marg');
				    }    
				} else {
			    var scroll = $(window).scrollTop();
			    	if (scroll > 130) {
			    		$('#masthead').addClass('fixed-header');
			    		$('#content').addClass('marg');
		
			    	} 
			    }
	}
});

		
	function fadeInLI() {
		var bi = $('.bnm > .opasso > div:first');
		bi.hide();
		bi.remove()
		$('.bnm > .opasso').append(bi);
		bi.fadeIn(100);

	}
	var _intervalId;
	if ($('.home-page').length > 0 ){
		$('.hpost-box').hover(function() {
			var intervalD = 400;
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
				if ($('.opasso').children().length > 1) {
					

					_intervalID = setInterval(function() {
						fadeInLI()
						
					}, intervalD);
				}
			}
	
		}, function () {
			clearInterval(_intervalID);
			$('.bnm > div').removeClass('opasso');
			$('.dfirs').removeClass('opassz');
	
		});
	}
		function fadeIne() {
			$('.tu-one .prp-1 img').addClass('opassz');

			var bi = $('.tu-one .prp-1 > img:first');
			bi.removeClass('opassz');
		bi.hide();
		bi.remove();
		$('.tu-one .prp-1').append(bi);
		bi.fadeIn(300);
		}	
		function fadeInr() {
			$('.tu-one .prp-2 img').addClass('opassz');
			var bi = $('.tu-one .prp-2 > img:first-child ');
			bi.removeClass('opassz');
			
			bi.hide();
			bi.remove();
			$('.tu-one .prp-2').append(bi);
			bi.fadeIn(300);
		}
		
		function fadeInt() {
			$('.tu-one .prp-3 img ').addClass('opassz');

			var bi = $('.tu-one .prp-3 > img:first-child');
			bi.removeClass('opassz');
			
			bi.hide();
			bi.remove();
			$('.tu-one .prp-3').append(bi);
			bi.fadeIn(300);
		}
	
	$('.tu-two a').hover(function() {
		var intervalD = 400;

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
	$('.ex').click(function() {
	$(this).siblings('.bod.description').removeClass('stretch');
		$(this).addClass('opassz');
	});
	$('.jobs .hpost-box').click(function() {

		if( ! $(this).next().children('.bod.description').hasClass('stretch')){
			if ($('.stretch').length > 0 ) {
				$('.stretch').siblings('.ex').addClass('opassz');
				$('.stretch').removeClass('stretch');
				$('.stretch').removeClass('dlay');
				$('.hovee').removeClass('hovee');
			} 
		}
		$(this).addClass('hovee');
		$('.hoveep').removeClass('hoveep');	

		$(this).children('.hpost-title').addClass('hoveep');	
		$(this).next().children('.bod.description').addClass('stretch');
		$(this).next().children('.ex').removeClass('opassz');
	})

$('#nav-icon3').click(function() {
	$(this).toggleClass('open');
	$('#primary-menu').toggleClass('flexxed');
})
});
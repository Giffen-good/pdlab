jQuery(function($){

	$('.instagram-feed').slick({
		centerMode:!0,
		slidesToShow:4,
		centerPadding:'60px',
		infinite:!0,
		nextArrow: "<div data-u='arrowright' class='cen-y jssora031 aleft' style='width:25px;height:25px;right:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>",
		prevArrow:"<div data-u='arrowleft' class='cen-y jssora031 aright' style='width:25px;height:25px;left:20px;'' data-autocenter='2'><svg viewbox='-12986 -2977 16000 16000' style='width:100%;height:100%;'><polygon class='a' points='-8594.7,12825.5 -8984.8,12435.4 -1572.3,5023 -8984.8,-2389.4 -8594.7,-2779.5 -792,5023'></polygon></svg></div>"
	})

	function swerve(id) {
		var c = id.children;
		var co = [].slice.call(c);
		var i = 0;
			var clone = co.slice(0);
			var index = co.indexOf(co[i]);
			$(c[i]).removeClass('opassz');
			var g = c.length - 1;
			if (clone.length > g) {
    			clone.splice(index, 1);
				for (k = 0; k < clone.length; k++) {
					$(clone[k]).addClass('opassz');
				}				

			
			}
			i++;
			if (i >= c.length) {
				i = 0;
			}
			
	}
	
	function fadeInLI() {
		var bi = $('.bnm > .opasso > div:first');
		bi.hide();
		bi.remove()
		$('.bnm > .opasso').append(bi);
		bi.show();

	}
	var _intervalId;
	$('.hpost-box').hover(function() {
		var intervalD = 300;
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
});
jQuery(function($){

function find_page_number( element ) {
		var pnum = element.find('span').html();
		pnum++;
		$('.learn-more').find('span').html(pnum);
		return pnum;
	}

	$('.learn-more').click(function(event) {
	   event.preventDefault();
	   page = find_page_number( $(this).clone() );
	   if ($('.log').length > 0 ) {
		    $.ajax({
		   		url: ajaxpagination.ajaxurl,
		   		type: 'post',
		   		
		   		data: {
		   			action: 'ajaxx_pagination',
		   			page:page
		   		},
		   		success: function( result ) {
		   			$('.ajax_posts').append( result );
		   			if ($('.nil').length > 0 ) {
		   				$('.learn-more').remove();
		   			}
		   		}
		   	})
		} else if ($('.projects-in-page').length > 0 ) {
			cat = $('.category-id').html();
			 $.ajax({
		   		url: ajaxpagination.ajaxurl,
		   		type: 'post',
		   		data: {
		   			action: 'ajax_pagination',
		   			page:page,
		   			cat:cat
		   		},
		   		success: function( result ) {
		   			$('.ajax_posts').append( result );
		   			if ($('.nil').length > 0 ) {
		   				$('.learn-more').remove();
		   			}

		   		}
		   	})
		}
	 
	}); 
});
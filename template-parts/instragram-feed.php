<div class="feed-container">
	<div class="gradient gleft"></div>
	<div class="gradient gright"></div>
	<div class="instagram-feed">
		
		<?php	
		

		  $json = fetchData("https://api.instagram.com/v1/users/self/media/recent/?access_token=1446294298.1677ed0.0dcf8b7babbf49b7baf0de51bb8d522d");
		  $data = json_decode($json);
			// to get the array with all resolutions
			$images = array();
			$links = array();
			$links_parsed= array();

			foreach( $data->data as $user_data ) {
			    $images[] = (array) $user_data->images;
			}
			foreach( $data->data as $user_data ) {
			    $links[] = (array) $user_data->link;
			}
			
			// print_r( $images );

			// to get the array with standard resolutions
			$standard = array_map( function( $item ) {
			    return $item['standard_resolution']->url;
			}, $images );
			$width = array_map( function( $item ) {
			    return $item['standard_resolution']->width;
			}, $images );
			$height = array_map( function( $item ) {
			    return $item['standard_resolution']->height;
			}, $images );
		$r = 0;
		
		  foreach ($standard as $posted) {
		  	
	  		if ($width[$r]!= $height[$r]) { ?>
		    <div class='ig-post da-post pp' style="background-image:url(<?php echo $posted; ?>)"><a class=" ig-tag variable-width" target="_blank" href="<?php echo $links[$r][0]; ?>"></a></div>
		    	<?php
	  		} else{
	?>

		    <div class='ig-post da-post pp' style="background-image:url(<?php echo $posted; ?>)"><a class="ig-tag" target="_blank" href="<?php echo $links[$r][0]; ?>"></a></div>
		    	
		    

		  <?php	

			}
				$r++;

		}

		    
		    
		  
		  ?>


		
	</div>
</div>		
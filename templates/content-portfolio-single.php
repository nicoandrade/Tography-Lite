<div class="row single-portfolio2">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            	<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-4' ) ?>>
            		<div class="ql_single-portfolio_content" >

        			<h1 class="post-title"><?php the_title(); ?></h1>
        			<hr class="hr-small">

        			<div class="entry">
        				<?php the_content(); ?>
            			<div class="clearfix"></div>
            		</div><!-- /entry -->

                    <div class="clearfix"></div>

                	<ul class="ql_categories">
                		<?php the_category() ?>
                    </ul>
                </article>
    	<?php endwhile; 

		else: ?>

            <?php get_template_part( "/templates/content", "none" ); ?>

    	<?php endif; ?>

	<div class="col-md-8 ql_single-portfolio_images">

		<?php
	    $is_portrait = false;
		$featured_image = "";

	    

	    $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		if($featured_image){

				$image_data = wp_get_attachment_metadata(get_post_thumbnail_id());
				$image_caption = "";
				if (get_post(get_post_thumbnail_id())->post_excerpt != "") {
					$image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
				}

			    // If the image is portrait show as it is..
			    if($image_data['height'] > $image_data['width']){
			    	echo '<div class="item portrait" style="width: auto;">';
			    	$is_portrait = true;
			    }else{
			    	echo '<div class="item">';
			    	$is_portrait = false;
			    }
					echo '<div class="ql_wrap_img">';
						echo '<a href="'. esc_url( $featured_image[0] ) .'" data-width="'. esc_attr( $image_data['width'] ) .'" data-height="'. esc_attr( $image_data['height'] ) .'">';
							if($is_portrait){
						    	$cropped_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-single_portrait2');
						    	echo "<img class='ql-slider-image' src='". esc_url( $cropped_image[0] ) . "' />";
						    }else{
						    	$cropped_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'portfolio-single_landscape');
						    	echo "<img class='ql-slider-image' src='". esc_url( $cropped_image[0] ) . "' />";
						    }//if portrait
						    
					    echo '</a>';


					
					$ql_img_info = array();
	                if ($image_data['image_meta']['aperture']) {
	                        	array_push( $ql_img_info, '<li><i class="ql-icon-aperture"></i>&fnof;&sol;'. esc_html( $image_data['image_meta']['aperture'] ).'</li>' );
	                }
	                if ($image_data['image_meta']['focal_length']) {
	                        	array_push( $ql_img_info, '<li><i class="ql-icon-lens"></i>'. esc_html( $image_data['image_meta']['focal_length'] ).' mm</li>' );
	                }
	                if ($image_data['image_meta']['iso']) {
	                        	array_push( $ql_img_info, '<li><i class="ql-icon-iso"></i>'. esc_html( $image_data['image_meta']['iso'] ).'</li>' );
	                }
	                if ($image_data['image_meta']['shutter_speed']) {
	                	if ($image_data['image_meta']['shutter_speed'] < 1) {
	                		$shutter_speed = 1 / $image_data['image_meta']['shutter_speed'];
	                		array_push( $ql_img_info, '<li><i class="ql-icon-clock"></i>1/'.$shutter_speed.'</li>' );
	                	}else{
	                		array_push( $ql_img_info, '<li><i class="ql-icon-clock"></i>'. esc_html( $image_data['image_meta']['shutter_speed'] ).' s</li>' );
	                	}	
	                }
	                if ($image_data['image_meta']['camera']) {
	                        	array_push( $ql_img_info, '<li><i class="ql-icon-camera"></i>'. esc_html( $image_data['image_meta']['camera'] ).'</li>' );
	                }

	                if ($ql_img_info) {
	                	echo '<div class="ql_img_info">';
	                		echo '<a href="#" class="ql_img_info_btn"><i class="fa fa-info"></i></a>';
	                		echo '<ul class="ql_img_meta">';
			                    foreach ($ql_img_info as $key => $value) {
			                    	echo $value ;
								}
							echo '</ul>';
						echo "</div><!-- /ql_img_info -->";
	                }
	                echo "</div><!-- /ql_wrap_img -->";
				    	
				    if ($image_caption) {
				    	echo '<div class="ql_caption">'. esc_html( $image_caption ) .'</div>';
				    }
				    
				echo "</div><!-- /item -->";
		}//if thumbnail






		$post_content = get_the_content();
		$array_id = array();
		preg_match( '/\[gallery.*ids=.(.*).\]/', $post_content, $ids );
		if ( $ids ) {
			$array_id = explode(",", $ids[1]);
		}
		

		if ( count( $array_id ) > 1 ) {
			foreach ( $array_id as $image_id ) {

				    $image_data = wp_get_attachment_metadata( $image_id );

				    $image_full_src = wp_get_attachment_image_src( $image_id, 'full' );

					// If the image is portrait show as it is..
				    if($image_data['height'] > $image_data['width']){
				    	echo '<div class="item portrait" style="width: auto;">';
				    	$is_portrait = true;
				    }else{
				    	echo '<div class="item">';
				    	$is_portrait = false;
				    }


				    echo '<div class="ql_wrap_img">';
						echo '<a href="'. esc_url( $image_full_src[0] ) .'" data-width="'. esc_attr( $image_data['width'] ) .'" data-height="'. esc_attr( $image_data['height'] ) .'">';
						    if($is_portrait){
						    	$cropped_image = wp_get_attachment_image_src($image_id, 'portfolio-single_portrait2');
						    	echo "<img class='ql-slider-image' src='". esc_url( $cropped_image[0] ) . "' />";
						    }else{
						    	$cropped_image = wp_get_attachment_image_src($image_id, 'portfolio-single_landscape');
						    	echo "<img class='ql-slider-image' src='". esc_url( $cropped_image[0] ) . "' />";
						    }//if portrait
					    echo '</a>';


					    $ql_img_info = array();
	                    if ( $image_data['image_meta']['aperture'] ) {
	                            	array_push( $ql_img_info, '<li><i class="ql-icon-aperture"></i>&fnof;&sol;'. esc_html( $image_data['image_meta']['aperture'] ) .'</li>' );
	                    }
	                    if ( $image_data['image_meta']['focal_length'] ) {
	                            	array_push( $ql_img_info, '<li><i class="ql-icon-lens"></i>'. esc_html( $image_data['image_meta']['focal_length'] ) .' mm</li>' );
	                    }
	                    if ( $image_data['image_meta']['iso'] ) {
	                            	array_push( $ql_img_info, '<li><i class="ql-icon-iso"></i>'. esc_html( $image_data['image_meta']['iso'] ) .'</li>');
	                    }
	                    if ( $image_data['image_meta']['shutter_speed'] ) {
	                    	if ( $image_data['image_meta']['shutter_speed'] < 1 ) {
	                    		$shutter_speed = 1 / $image_data['image_meta']['shutter_speed'];
	                    		array_push( $ql_img_info, '<li><i class="ql-icon-clock"></i>1/'. esc_html( $shutter_speed ) .'</li>');
	                    	}else{
	                    		array_push( $ql_img_info, '<li><i class="ql-icon-clock"></i>'. esc_html( $image_data['image_meta']['shutter_speed'] ) .' s</li>' );
	                    	}	
	                    }
	                    if ( $image_data['image_meta']['camera'] ) {
	                            	array_push( $ql_img_info, '<li><i class="ql-icon-camera"></i>'. esc_html( $image_data['image_meta']['camera'] ) .'</li>' );
	                    }

	                    if ( $ql_img_info ) {
	                    	echo '<div class="ql_img_info">';
	                    		echo '<a href="#" class="ql_img_info_btn"><i class="fa fa-info"></i></a>';
	                    		echo '<ul class="ql_img_meta">';
				                    foreach ($ql_img_info as $key => $value) {
				                    	echo $value;
									}
								echo '</ul>';
							echo "</div><!-- /ql_img_info -->";
	                    }

				    echo "</div><!-- /ql_wrap_img -->";
				    
				    if( get_post( $image_id )->post_excerpt != "" ){
				    	echo "<p class='ql_caption'>". get_post( $image_id )->post_excerpt ."</p>";
				    }
					
				    echo "</div>";

			}
		}//if $portfolio_images

		if( count( $array_id ) > 2 ) {
		?>
			<p style="text-align:center;"><button class="btn btn-sm ql_scroll_top" href="#">Scroll to top <i class="fa fa-caret-up"></i></button></p>
		<?php 
		}
		?>

				
	</div>  <!-- /single_portfolio_slider -->
	<div class="clearfix"></div>
</div><!-- row-->
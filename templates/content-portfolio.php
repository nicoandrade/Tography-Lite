<?php
$_termsToPrint = "portfolio_item";

if ( has_post_thumbnail() ) {

	$image_data = wp_get_attachment_metadata(get_post_thumbnail_id());
	
	 // If the image is portrait show as it is..
    if( $image_data['height'] > $image_data['width'] ){
    	$_termsToPrint .= " layout_portrait1";
    	$thumbnail_size = "portfolio-thirds-layout_portrait1";
    }else{
    	$_termsToPrint .= " layout_landscape";
    	$thumbnail_size = "portfolio-thirds-layout_landscape";
    }
}

//get the categories for Isotope
$post_category = wp_get_post_categories( $post->ID );
if ( $post_category ) {																				
	foreach( $post_category as $c ){
		$cat = get_category( $c );
		$_termsToPrint .= " _" . $cat->slug . " ";
	}
}

?>
<div <?php post_class( esc_attr( $_termsToPrint ) ); ?> id="post-<?php echo esc_attr( get_the_ID() ); ?>" data-id="<?php echo esc_attr( get_the_ID() ); ?>" data-category="<?php echo esc_attr( $_termsToPrint ); ?>">

	<a href="<?php echo esc_url( get_permalink() ); ?>">
        		<div class="ql_border_hover"></div>
		<?php
        // check if the post has a Post Thumbnail assigned to it.
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $thumbnail_size );
		} 
        ?>
        <div class="ql_hover">
        	<?php the_title( '<h2 class="portfolio_item_title">', '</h2>' ); ?>	                        	
        </div><!-- /ql_hover -->
    </a>



	<div class="clearfix"></div>
</div><!-- /portfolio_item -->

<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>

	<?php get_template_part( "/templates/beforeloop", "portfolio" ) ?> 


		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php get_template_part( "/templates/content", "page" ) ?> 

        <?php endwhile; else: ?>

            <?php get_template_part( "/templates/content", "none" ) ?> 

    	<?php endif; ?>




		<?php 	
		/*
		* Create portfolio from posts
		*/
		//Get the Portfolio Amount
		$portfolio_amount = get_theme_mod( 'portfolio_amount' );
		if ( ! is_int( $portfolio_amount ) ) { $portfolio_amount = 11; }
		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => intval( $portfolio_amount ),
			'paged' => $paged,
		);

		//Get the Portfolio Category
		$portfolio_category = get_theme_mod( 'portfolio_category' );
		//If Portfolio Category doesn't exists, show all posts
		if ( $portfolio_category ) {
			$args['category_name'] = $portfolio_category;
		}


		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {

			//Get the Portfolio filters for Isotope
			tography_lite_portfolio_filters( $the_query );
			
			?>
			<div class="clearfix"></div>
			<div id="portfolio_thirds_container" class="">
				<div class="portfolio_thumbnails visible-lg-block">
		            <div class="p_thumbnails_content"></div><div class="clearfix"></div>
		        </div>
				<?php
				while ( $the_query->have_posts() ) { $the_query->the_post();

					get_template_part( "/templates/content", "portfolio" );

				}//while
				?>
				<div class="clearfix"></div>     	
			</div> <!-- #portfolio_container -->
			
			<?php get_template_part( "pagination", "portfolio" ); ?>

			<?php

		}// if have posts
		wp_reset_postdata();
		?>




	<?php  get_template_part( "/templates/afterloop", "portfolio" ) ?> 

<?php get_footer(); ?>
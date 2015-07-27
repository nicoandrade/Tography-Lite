<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<?php get_template_part( "post_image", "index" ); ?>

	<div class="post_content row">
        <div class="col-md-6">

			<?php the_title( sprintf( '<h2 class="post_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php get_template_part( "meta", "index" ); ?>

		</div><!-- /col-md-6 -->

		<div class="col-md-6">
			<div class="entry">
				<?php the_content(); //Read more button is in framework/functions/single_functions.php?>
				<div class="clearfix"></div>
			</div>
			
		</div><!-- /col-md-6 -->
	</div><!-- /post_content -->

	<div class="clearfix"></div>
</article>
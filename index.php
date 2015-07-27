<?php get_header(); ?>

<?php get_template_part( "/templates/beforeloop", "index" ); ?>   

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part( "/templates/content", "index" ); ?>
				
	<?php endwhile; ?>

	<div class="clearfix"></div>

	<div class="pagination_wrap">
	    <?php get_template_part( "pagination", "index" ); ?>
	</div><!-- /pagination_wrap -->

	<?php else : ?>

		<?php get_template_part( "/templates/content", "none" ); ?>

	<?php endif; ?>

<?php get_template_part( "/templates/afterloop", "index" ) ?> 

<?php get_footer(); ?>
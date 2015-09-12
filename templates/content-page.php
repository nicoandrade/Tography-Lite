<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<div class="entry">

		<?php the_content(); ?>

		<div class="clearfix"></div>
	</div>

	<?php
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => esc_attr__( 'Page', 'tography-lite' ) . ' %',
        'separator'   => '',
    ) );
    ?>
</article>
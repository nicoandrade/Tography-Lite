<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    
    <?php
    if ( ! tography_lite_is_portfolio_item() ){
        get_template_part( "post_image", "content" );
    }
    ?>
    
    <?php 
    if ( is_single() ) :
        the_title( '<h1 class="post_title">', '</h1>' );
    else :
        the_title( sprintf( '<h2 class="post_title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
    endif;
    ?>
    
    

    <div class="entry">
        <?php the_content(); //Read more button is in framework/functions/single_functions.php?>
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

    <div class="metadata">
        <?php get_template_part( "meta", "content" ); ?>
        <div class="clearfix"></div>
    </div><!-- /metadata -->

    <div class="clearfix"></div>
</article>
<?php get_header(); ?>

    <?php get_template_part( "/templates/beforeloop", "search" ) ?> 

        <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'tography-lite' ), get_search_query() ); ?></h1>

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                   <?php get_template_part( "/templates/content", "archive" ) ?>
        
                <?php endwhile; ?>
        

                    <?php get_template_part( "pagination", "search" ); ?>

        
                <?php else : ?>

                    <?php get_template_part( "/templates/content", "none" ); ?>
        
                <?php endif; ?>
                    
              <?php get_template_part( "/templates/afterloop", "search" ) ?> 

<?php get_footer(); ?>
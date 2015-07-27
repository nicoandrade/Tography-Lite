<?php get_header(); ?>

    <?php
    if ( tography_lite_is_portfolio_item() ){
    ?>

        <?php get_template_part( "/templates/beforeloop-portfolio", "single" ) ?> 
    

        
            <?php get_template_part( "/templates/content-portfolio", "single" ) ?>
            


        <?php get_template_part( "/templates/afterloop-portfolio", "single" ) ?> 





    <?php }else{ ?>






        <?php get_template_part( "/templates/beforeloop", "single" ) ?> 

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            
            
            <?php get_template_part( "/templates/content", "single" ) ?>

            <div class="clearfix"></div>
                    
            <?php 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

            <?php tography_lite_the_post_navigation(); ?>

    
        <?php endwhile; else: ?>
                
            
                <?php get_template_part( "/templates/content", "none" ); ?>
            
                
        <?php endif; ?>
                    
            <?php get_template_part( "/templates/afterloop", "single" ) ?>

    <?php } ?>

<?php get_footer(); ?>
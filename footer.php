	<?php
	wp_reset_query();
	?>
	<?php if(!is_page_template('gallery-fullscreen.php') && !is_page_template('page-home.php') && !is_page_template('page-home-fullscreen.php') && !is_page_template('page-fullscreen.php')){ ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <footer id="footer">
                        <div class="pull-left">
                            <p>
                            <?php esc_html_e( 'Powered by ', 'tography-lite' ); ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tography-lite' ) ); ?>"><?php esc_html_e( 'WordPress', 'tography-lite' ); ?></a>. <?php esc_html_e( 'Tography Lite theme designed by ', 'tography-lite' ); ?><a rel="nofollow" href="<?php echo esc_url( __( 'http://www.quemalabs.com/', 'tography-lite' ) ); ?>"><?php esc_html_e( 'Quema Labs', 'tography-lite' ); ?></a>.
                            </p>
                            
                                    
                        </div>

                        <?php get_template_part( '/templates/menu', 'social' ); ?>

                        <div class="clearfix"></div>
                    </footer>

                </div><!-- /col-md-12 -->
            </div><!-- /row -->
        </div><!-- /container -->


    <?php }//if fullscreen gallery?>

</div><!-- /wrap -->

    
        
    <!-- WP_Footer --> 
    <?php wp_footer(); ?>
    <!-- /WP_Footer --> 

      
    </body>
</html>
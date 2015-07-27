	<header id="header">
		<div class="container">
 			<div class="row">

	    		<div class="logo_container col-md-12">
	    			 <?php
                    if ( is_front_page() && is_home() ) :
                    ?>
                        <h1><a href="<?php echo esc_url( home_url() ); ?>/" class="ql_logo" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <a class="ql_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                    <?php endif; ?>
	                <?php

	                $show_desc = get_theme_mod( 'show_desc' );
	                
	                
	                global $wp_customize;
	                if ( $show_desc ) {
	                ?>
	                	<div class="logo_desc_wrap">
                            <hr class="hr-small">
		            		<p class="logo_desc"><?php bloginfo('description'); ?></p>
		            	</div>
		            <?php
		            }else if (!$show_desc && isset( $wp_customize )) {
		            ?>
		            	<div class="logo_desc_wrap">
                            <hr class="hr-small">
		            		<p class="logo_desc hidden"><?php bloginfo('description'); ?></p>
		            	</div>
		            <?php
		            }else if ($show_desc && isset( $wp_customize )) {
		            ?>
		            	<div class="logo_desc_wrap">
                            <hr class="hr-small">
		            		<p class="logo_desc"><?php bloginfo('description'); ?></p>
		            	</div>
		            <?php
		            }
	                ?>
	            </div><!-- /logo_container -->


	            <button class="ql_nav_btn"><i class="fa fa-navicon"></i><i class="fa fa-arrow-left"></i></button>


				<div class="clearfix"></div>
			</div><!-- row-->
		</div><!-- /container -->
    </header>
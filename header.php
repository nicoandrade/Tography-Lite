<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5shiv.js"></script>
    <![endif]-->
    
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

   <!-- WP_Head -->
    <?php wp_head(); ?>
   <!-- /WP_Head -->
</head>
    
    
	<body <?php body_class( esc_attr( TOGRAPHY_LITE_SLUG.' ver'.TOGRAPHY_LITE_VERSION. ' no-touch' . ' ql_with_header1' ) ); ?>>


	<div class="nav_sidebar">
        <a href="#" class="ql_nav_close hero_color contrast_bck"><i class="fa fa-times"></i></a>

        <div class="nav_sidebar_wrap">


                <div class="table-wrap">
                    <div class="table-top">

                        <nav id="jqueryslidemenu" class="jqueryslidemenu navbar " role="navigation">

							<?php            

		                    if ( has_nav_menu( 'menu-1' ) ){ 
								wp_nav_menu( array(                     
		                        'theme_location'  => 'menu-1',
		                        'container'       => '',
		                        'items_wrap'      => '<ul id="nav" class="nav">%3$s</ul>',
		                    )); 
							}else{
								echo "<ul id='nav' class='nav'>";
								wp_list_pages( array(
									'title_li'     => '')
								);
								echo "</ul>";
							}; 
		            		?>
                        </nav>


                    </div><!-- /table-top -->

                    <div class="table-center">




                    </div><!-- /table-center -->


                    <div class="table-bottom">


                    </div><!-- /table-bottom -->

                    <div id="header_bottom">
                        <hr class="hr-small">
                            <p><?php echo "Copyright &copy; ". date( 'Y' ) ." <a href='". esc_url( home_url() )."' title='". get_bloginfo( 'name' ) ."'>".get_bloginfo( 'name' )."</a>."; ?></p>
                        
                    </div><!-- /header_bottom -->

                </div><!-- table-wrap-->

            </div><!-- nav_sidebar_wrap -->

        <div class="clearfix"></div>
    </div><!-- /nav_sidebar -->







 	<div id="wrap">



 		<?php get_template_part( "/templates/header"); ?>
       
        
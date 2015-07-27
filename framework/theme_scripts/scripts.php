<?php
	
	//=============================================================
	//Theme Scripts
	//=============================================================
	
	//Register JS Scripts for later use
if ( ! function_exists( 'tography_lite_enqueue_scripts' ) ){
	function tography_lite_enqueue_scripts() {
		
		//hoverIntent Plugin ==============================================
		wp_register_script('hoverIntent', TOGRAPHY_LITE_JS . '/jquery.hoverIntent.js', array('jquery'), '6.0', true );
		wp_enqueue_script('hoverIntent');
		//=================================================================

		//Modernizr Plugin ==============================================
		wp_register_script('modernizr', TOGRAPHY_LITE_JS . '/modernizr.custom.67069.js', '2.8.3', true );
		wp_enqueue_script('modernizr');
		//=================================================================

		//Nice Scroll ==============================================
		wp_register_script('nicescroll', TOGRAPHY_LITE_JS . '/jquery.nicescroll.js', array('jquery'), '3.6.0', true );
		wp_enqueue_script('nicescroll');
		//=================================================================	

		//Pace  =============================================
		wp_register_script('pace', TOGRAPHY_LITE_JS . '/pace.js', array(), '0.2.0', true);
		wp_enqueue_script('pace');
		//=================================================================
		
		//Bootstrap JS ========================================
		wp_register_script('bootstrap', TOGRAPHY_LITE_JS . '/bootstrap.js', array(), '3.3.5', true);
		wp_enqueue_script('bootstrap');
		//=================================================================
		
		
		//Comment Reply ===================================================
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		//=================================================================




		wp_reset_query();
		$format = get_post_format();
		if ( is_page_template('page-portfolio-thirds.php') || is_single() || is_archive() ) {


			//Isotope =======================================================
			wp_register_script('isotope', TOGRAPHY_LITE_JS . '/isotope.pkgd.js', array('jquery'), '2.0.1', true );
			wp_enqueue_script('isotope');
			//=================================================================
			
			//Packery =======================================================
			wp_register_script('packery', TOGRAPHY_LITE_JS . '/packery-mode.pkgd.js', array('jquery', 'isotope'), '1.5.19', true );
			wp_enqueue_script('packery');
			//=================================================================

			//PhotoSwipe =======================================================
			wp_register_script('photoswipe', TOGRAPHY_LITE_JS . '/photoswipe-and-ui.js', '4.0.6', true );
			wp_enqueue_script('photoswipe');
			//=================================================================

			//imagesloaded =======================================================
			wp_register_script('imagesloaded', TOGRAPHY_LITE_JS . '/imagesloaded.pkgd.js', array('jquery'), '3.1.8', true );
			wp_enqueue_script('imagesloaded');
			//=================================================================
			
			//Portfolios Script ========================================
			wp_register_script('portfolio-scripts', TOGRAPHY_LITE_JS . '/portfolio-scripts.js', array('jquery', 'isotope', 'packery', 'imagesloaded', 'nicescroll', 'photoswipe'), '1.0', true);
			wp_enqueue_script('portfolio-scripts');

			wp_localize_script( 'portfolio-scripts', 'WP_info', array(
				  			'theme_uri' => TOGRAPHY_LITE_URI 
			));
			//=================================================================
			
		}





		
		//Customs Scripts =================================================
		wp_register_script( 'theme-custom', TOGRAPHY_LITE_JS . '/script.js', array( 'jquery', 'bootstrap' ), '1.0', true );
		wp_enqueue_script( 'theme-custom' );
		

	    wp_localize_script( 'theme-custom', 'WP_Main', array(
	  			'theme_uri' => TOGRAPHY_LITE_URI
		));
		//=================================================================
	}
}//end if function_exists
	add_action( 'wp_enqueue_scripts', 'tography_lite_enqueue_scripts' );
?>
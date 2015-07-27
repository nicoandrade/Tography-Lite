<?php
	
	//=============================================================
	//Theme Stylesheets
	//=============================================================
if ( ! function_exists( 'tography_lite_enqueue_stylesheets' ) ){
	function tography_lite_enqueue_stylesheets() {
		
		//Bootstrap =======================================================
		wp_register_style('bootstrap', TOGRAPHY_LITE_CSS . '/bootstrap.css', array(), '3.1', 'all');  
		wp_enqueue_style('bootstrap');  
		//=================================================================


		if( is_page_template('page-portfolio-thirds.php') || is_archive()){

			//Isotope ================================================
			wp_register_style('isotope', TOGRAPHY_LITE_CSS . '/isotope.css', array(), '1.0', 'all');  
			wp_enqueue_style('isotope');  
			//=================================================================

			//Photoswipe ======================================================
			wp_register_style('photoswipe', TOGRAPHY_LITE_CSS . '/photoswipe.css', array(), '2.0.0', 'all');  
			wp_enqueue_style('photoswipe');  
			//=================================================================

			//Photoswipe Skin ======================================================
			wp_register_style('photoswipe-skin', TOGRAPHY_LITE_CSS . '/default-skin/default-skin.css', array(), '2.0.0', 'all');  
			wp_enqueue_style('photoswipe-skin');  
			//=================================================================
			
		}
		
		if (is_single() || is_archive() ) {
			//Photoswipe ======================================================
			wp_register_style('photoswipe', TOGRAPHY_LITE_CSS . '/photoswipe.css', array(), '2.0.0', 'all');  
			wp_enqueue_style('photoswipe');  
			//=================================================================

			//Photoswipe Skin ======================================================
			wp_register_style('photoswipe-skin', TOGRAPHY_LITE_CSS . '/default-skin/default-skin.css', array(), '2.0.0', 'all');  
			wp_enqueue_style('photoswipe-skin');  
			//=================================================================
		}




		//Main Stylesheet =================================================
		wp_register_style('main-stylesheet', get_bloginfo('stylesheet_url'), array('bootstrap'), '1.0', 'all');  
		wp_enqueue_style('main-stylesheet');  
		//=================================================================


	}
}
	add_action('wp_enqueue_scripts', 'tography_lite_enqueue_stylesheets');




if ( ! function_exists( 'tography_lite_enqueue_admin_stylesheets' ) ){
	function tography_lite_enqueue_admin_stylesheets() {
		//Admin Stylesheet =================================================
			wp_register_style('admin-stylesheet', TOGRAPHY_LITE_CSS . '/admin_styles.css', array(), '1.0', 'all');  
			wp_enqueue_style('admin-stylesheet');  
		//=================================================================
	}
}




	add_action( 'admin_print_styles', 'tography_lite_enqueue_admin_stylesheets' );
?>
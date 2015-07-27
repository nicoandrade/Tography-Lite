<?php

// Load function
//	this functions check if the files exists in the Child Theme's folder first.
//------------------------------------------------------->
if ( ! function_exists( 'tography_lite_require_file' ) ) :
	function tography_lite_require_file($file, $parent_path, $child_path) {
		if (file_exists($child_path . $file)) {
		    require_once ($child_path . $file);
		} else {
		    require_once ($parent_path . $file);
		}	
	}    
endif;// if function_exists


/* Set the Full Width Image value */
if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}

/* Load the Theme class. */
require_once ( get_template_directory() . '/framework/Theme.php' );

//Theme Information
$tography_lite_theme_info = include( get_template_directory() . '/framework/info.php' );

//Instance of the Theme
$tography_lite_Theme = new tography_lite_Theme( $tography_lite_theme_info );


	
// Load jQuery------------------------------------------------------->
if ( ! function_exists( 'tography_lite_jquery_script' ) ) :
	function tography_lite_jquery_script() {
		wp_enqueue_script( 'jquery' );
	}    
endif;// if function_exists
add_action( 'wp_enqueue_scripts', 'tography_lite_jquery_script' );
// Load jQuery-------------------------------------------------------<
	






//You can start adding your code below
//==================================================================
	







?>
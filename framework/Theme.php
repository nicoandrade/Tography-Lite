<?php
if( ! class_exists( 'tography_lite_Theme' ) ){
/**
 * Theme Class
 */
class tography_lite_Theme {

	/**
	 * Here are loaded all the initial files, constant, etc.
	 */
	function __construct( $theme_info ){
	
		/* Define theme's constants. */
		$this->constants( $theme_info );

		/* Add Stylesheets for the Theme (CSS) */
		$this->stylesheets();

		/* Add JS Scripts for the Theme (JS) */
		$this->scripts();

		/* Add Theme support */
		$this->theme_support();
		
		/* Add Theme Functions */
		$this->theme_functions();
		
		/* Create all the widget areas */
		$this->widget_areas();

		/* Customizer */
		$this->customizer();
		
		
	}
	
	
	
	
	/**
	 * Defines the constant paths for use within the theme.
	 */
	private function constants($theme_info) {
		define('TOGRAPHY_LITE_NAME', $theme_info['theme_name']);
		define('TOGRAPHY_LITE_SLUG', $theme_info['theme_slug']);
		define('TOGRAPHY_LITE_VERSION', $theme_info['theme_version']);
		define('TOGRAPHY_LITE_AUTHOR', $theme_info['theme_author']);
		define('TOGRAPHY_LITE_AUTHOR_URI', $theme_info['theme_author_uri']);

		define('TOGRAPHY_LITE_DIR', get_template_directory());
		define('TOGRAPHY_LITE_URI', get_template_directory_uri());

		
		define('TOGRAPHY_LITE_CSS', TOGRAPHY_LITE_URI . '/css');
		define('TOGRAPHY_LITE_JS', TOGRAPHY_LITE_URI . '/js');
		define('TOGRAPHY_LITE_IMAGES', TOGRAPHY_LITE_URI . '/images');


		define('TOGRAPHY_LITE_FRAMEWORK', TOGRAPHY_LITE_DIR . '/framework');
		define('TOGRAPHY_LITE_FRAMEWORK_URI', TOGRAPHY_LITE_URI . '/framework');

		define('TOGRAPHY_LITE_ADMIN', TOGRAPHY_LITE_FRAMEWORK_URI . '/admin');
		define('TOGRAPHY_LITE_FUNCTIONS', TOGRAPHY_LITE_FRAMEWORK . '/functions');
		define('TOGRAPHY_LITE_SCRIPTS', TOGRAPHY_LITE_FRAMEWORK . '/theme_scripts');
		define('TOGRAPHY_LITE_POST_TYPES', TOGRAPHY_LITE_FRAMEWORK . '/post_types');
		define('TOGRAPHY_LITE_META_BOXES', TOGRAPHY_LITE_FRAMEWORK . '/meta_boxes');
		define('TOGRAPHY_LITE_META_BOXES_URI', TOGRAPHY_LITE_FRAMEWORK_URI . '/meta_boxes');
		define('TOGRAPHY_LITE_WIDGET_AREAS', TOGRAPHY_LITE_FRAMEWORK . '/widget_areas');
		define('TOGRAPHY_LITE_WIDGETS', TOGRAPHY_LITE_FRAMEWORK . '/widgets');
		define('TOGRAPHY_LITE_SHORTCODES', TOGRAPHY_LITE_FRAMEWORK . '/shortcodes');
		define('TOGRAPHY_LITE_FULLSCREEN', TOGRAPHY_LITE_FRAMEWORK . '/fullscreen');
		define('TOGRAPHY_LITE_PLUGINS', TOGRAPHY_LITE_FRAMEWORK . '/plugins');
		define('TOGRAPHY_LITE_PLUGINS_URI', TOGRAPHY_LITE_FRAMEWORK_URI . '/plugins');

		


		//Constant for Child Themes
		define('CHILD_TOGRAPHY_LITE_DIR', get_stylesheet_directory());
		define('CHILD_TOGRAPHY_LITE_URI', get_stylesheet_directory_uri());
		
		define('CHILD_TOGRAPHY_LITE_CSS', CHILD_TOGRAPHY_LITE_URI . '/css');
		define('CHILD_TOGRAPHY_LITE_JS', CHILD_TOGRAPHY_LITE_URI . '/js');
		define('CHILD_TOGRAPHY_LITE_IMAGES', CHILD_TOGRAPHY_LITE_URI . '/images');

		define('CHILD_TOGRAPHY_LITE_FRAMEWORK', CHILD_TOGRAPHY_LITE_DIR . '/framework');
		define('CHILD_TOGRAPHY_LITE_FRAMEWORK_URI', CHILD_TOGRAPHY_LITE_URI . '/framework');

		define('CHILD_TOGRAPHY_LITE_ADMIN', CHILD_TOGRAPHY_LITE_FRAMEWORK_URI . '/admin');
		define('CHILD_TOGRAPHY_LITE_FUNCTIONS', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/functions');
		define('CHILD_TOGRAPHY_LITE_SCRIPTS', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/theme_scripts');
		define('CHILD_TOGRAPHY_LITE_POST_TYPES', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/post_types');
		define('CHILD_TOGRAPHY_LITE_META_BOXES', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/meta_boxes');
		define('CHILD_TOGRAPHY_LITE_META_BOXES_URI', CHILD_TOGRAPHY_LITE_FRAMEWORK_URI . '/meta_boxes');
		define('CHILD_TOGRAPHY_LITE_WIDGET_AREAS', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/widget_areas');
		define('CHILD_TOGRAPHY_LITE_WIDGETS', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/widgets');
		define('CHILD_TOGRAPHY_LITE_SHORTCODES', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/shortcodes');
		define('CHILD_TOGRAPHY_LITE_FULLSCREEN', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/fullscreen');
		define('CHILD_TOGRAPHY_LITE_PLUGINS', CHILD_TOGRAPHY_LITE_FRAMEWORK . '/plugins');
		define('CHILD_TOGRAPHY_LITE_PLUGINS_URI', CHILD_TOGRAPHY_LITE_FRAMEWORK_URI . '/plugins');

		
	}
	
	
	

	
	/**
	 * Add Stylesheets for the Theme (CSS)
	 */
	public function stylesheets(){

		//Stylesheets
		tography_lite_require_file("/stylesheets.php", TOGRAPHY_LITE_SCRIPTS, CHILD_TOGRAPHY_LITE_SCRIPTS);
		
	}



	/**
	 * Add JS Scripts for the Theme (JS)
	 */
	public function scripts(){

		//Stylesheets
		tography_lite_require_file("/scripts.php", TOGRAPHY_LITE_SCRIPTS, CHILD_TOGRAPHY_LITE_SCRIPTS);
		
	}



	
	
	
	/**
	 * Add Theme Support
	 */
	public function theme_support(){
		function tography_lite_setup() {
		//Activate post-image functionality (WP 2.9+)

			load_theme_textdomain( 'tography-lite', get_template_directory() . '/languages' );

			//Thumbnails
			//----------------------------------------------------
			add_theme_support( 'post-thumbnails' );

			if ( function_exists( 'add_image_size' ) ) {

				//Blog Thumbnails
				add_image_size( 'post', 848, 476, true );

				//Portfolio Thirds
				add_image_size( 'portfolio-thirds-layout_landscape', 366, 243, true );
				add_image_size( 'portfolio-thirds-layout_portrait1', 366, 549, true );

				//Single Portfolio Thumbnails
				add_image_size( 'portfolio-single_landscape', 900, 600, true );
				add_image_size( 'portfolio-single_portrait2', 750, 1071, true );
			}

			// Add RSS links to <head> section
			add_theme_support('automatic-feed-links');

			//Title support---------------------------
		   	add_theme_support( 'title-tag' );
			
			//Add Menu Manager---------------------------
			add_theme_support( 'nav-menus' );

			register_nav_menus( array( 'menu-1' => esc_attr__( 'Navigation Menu' , 'tography-lite' ) ) );
			register_nav_menus( array( 'social' => esc_attr__( 'Social' , 'tography-lite' ) ) );

			//HTML5 support
			add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
			) );

			// Styles for TinyMCE
		    add_editor_style( TOGRAPHY_LITE_CSS . '/custom-editor-style.css' );
		    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    		add_editor_style( $font_url );

		}

		add_action( 'after_setup_theme', 'tography_lite_setup' );
	}
	
	
	
	/**
	 * Add Theme Functions
	 */
	public function theme_functions(){

		//Custom Comments		
		tography_lite_require_file("/custom_comments.php", TOGRAPHY_LITE_FUNCTIONS, CHILD_TOGRAPHY_LITE_FUNCTIONS);

		//Custom Functions
		tography_lite_require_file( "/custom_functions.php", TOGRAPHY_LITE_FUNCTIONS, CHILD_TOGRAPHY_LITE_FUNCTIONS);	

	}
	
	

	
	
	/**
	 * Create all the widget areas
	 */
	public function widget_areas(){
		tography_lite_require_file("/widget_areas.php", TOGRAPHY_LITE_WIDGET_AREAS, CHILD_TOGRAPHY_LITE_WIDGET_AREAS);
	}





	/**
	 * Front End Customizer
	 *
	 * WordPress 3.4 Required
	 */
	public function customizer(){
		tography_lite_require_file('/theme_customizer.php', TOGRAPHY_LITE_FUNCTIONS, CHILD_TOGRAPHY_LITE_FUNCTIONS);
	}
	
	

}//class Theme

}//if !class_exists
?>
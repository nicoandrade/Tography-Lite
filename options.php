<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {


	//CUSTOM QUEMA LABS-----------------------------------------
	 // $optionsframework_settings = of_get_option('optionsframework');
	 // $optionsframework_settings['id'] = 'quemalabs_options';
	 // update_option('optionsframework', $optionsframework_settings);


	return 'quemalabs_options';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fie lds, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'quemalabs_admin'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	//Fonts options
	$font_options = array(
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica',
		'Verdana' => 'Verdana',
		'Georgia' => 'Georgia',
		'Trebuchet' => 'Trebuchet',
		'Tahoma' => 'Tahoma' 
		);

	// Test data
	$test_array = array(
		'one' => __('One', 'quemalabs_admin'),
		'two' => __('Two', 'quemalabs_admin'),
		'three' => __('Three', 'quemalabs_admin'),
		'four' => __('Four', 'quemalabs_admin'),
		'five' => __('Five', 'quemalabs_admin')
		);


	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'quemalabs_admin'),
		'two' => __('Pancake', 'quemalabs_admin'),
		'three' => __('Omelette', 'quemalabs_admin'),
		'four' => __('Crepe', 'quemalabs_admin'),
		'five' => __('Waffle', 'quemalabs_admin')
		);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
		);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '13px',
		'face' => 'Helvetica',
		'style' => 'normal',
		'color' => '#737373' );

	// Typography Options
	$typography_options = array(
		'sizes' => false,
		'faces' => array( 'Helvetica' => '"Helvetica Neue", Helvetica, sans-serif','Verdana' => 'Verdana','Georgia' => 'Georgia','Trebuchet' => 'Trebuchet', 'Tahoma' => 'Tahoma' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => '#737373'
		);

	//True/False options
	$options_true_false = array("true" => "True","false" => "False");


	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  TOGRAPHY_LITE_IMAGES ;


	$shortname = "ql_"; //deprecated








	$options = array();

	$options[] = array(
		'name' => __('General Settings', 'quemalabs_admin'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('Theme Info', 'quemalabs_admin'),
		'desc' => '<strong>Name:</strong> '. TOGRAPHY_LITE_NAME . '<br />' .
		'<strong>Version:</strong> '. TOGRAPHY_LITE_VERSION . '<br />' .
		'<strong>Author:</strong> ' . TOGRAPHY_LITE_AUTHOR,
		'type' => 'info');



	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
		);


    $options[] = array(
		'name' => __('', 'quemalabs_admin'),
		'desc' => __('', 'quemalabs_admin'),
		'type' => 'info');

	







	$options[] = array(
		'name' => __('Header', 'quemalabs_admin'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Custom Logo', 'quemalabs_admin'),
		'desc' => __("Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)", 'quemalabs_admin'),
		'id' =>  'logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Custom Logo Retina size', 'quemalabs_admin'),
		'desc' => __("Upload the logo for retina screens. (Same logo, twice the size)", 'quemalabs_admin'),
		'id' =>  'logo_retina',
		'type' => 'upload');


















	$options[] = array( "name" => "Footer",
		"type" => "heading");    


	$options[] = array(
		'name' => __('Footer Text', 'quemalabs_admin'),
		'desc' => __('Custom HTML and Text that will appear at the bottom of your site.', 'quemalabs_admin'),
		'id' =>  'footer_text',
		'type' => 'textarea',
		'std' => "Copyright &copy; ".date('Y')." <a href='".esc_url(home_url())."' title='".get_bloginfo('name')."'>".get_bloginfo('name')."</a>.");

	$options[] = array(
		'name' => __('Designed by Quema Labs', 'quemalabs_admin'),
		'desc' => __('If you are happy with the Theme you can give us credit just by adding a small link.', 'quemalabs_admin'),
		'id' =>  'quemalabs_credit',
		'std' => true,
		'type' => 'checkbox' );


	$options[] = array(
		'name' => __('Footer Social Icons', 'quemalabs_admin'),
		'desc' => __('', 'quemalabs_admin'),
		'type' => 'info');


	$options[] = array( "name" => "Facebook Link",
		"desc" => "The URL for the social icons on the header. Example: http://facebook.com/MyCompany",
		"id" =>  "hlink_facebook",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Twitter Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_twitter",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Flickr Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_flickr",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Youtube Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_youtube",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Vimeo Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_vimeo",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "LinkedIn Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_linkedin",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Skype Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_skype",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Forrst Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_forrst",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Google +1 Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_google",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Tumblr Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_tumblr",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Dribbble Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_dribbble",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Instagram Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_instagram",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Foursquare Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_foursquare",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "Pinterest Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_pinterest",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		);
	$options[] = array( "name" => "500px Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_500px",
		"std" => "",
		"type" => "text",
		"subheading" => "h4"
		); 
	$options[] = array( "name" => "RSS Link",
		"desc" => "The URL for the social icons on the header.",
		"id" =>  "hlink_rss",
		"std" => get_bloginfo('rss2_url'),
		"type" => "text",
		"subheading" => "h4"
		); 















	return $options;
}


/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */

tography_lite_require_file( '/theme_customizer.php', TOGRAPHY_LITE_FUNCTIONS, CHILD_TOGRAPHY_LITE_FUNCTIONS );












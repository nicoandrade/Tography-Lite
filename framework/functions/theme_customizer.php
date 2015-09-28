<?php
/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */
 
add_action( 'customize_register', 'tography_lite_quemalabs_options_register' );

function tography_lite_quemalabs_options_register( $wp_customize ) {

	class tography_lite_Pro_Version extends WP_Customize_Control
	{
		public function render_content()
		{
			$args = array(
			    'a' => array(
			        'href' => array(),
			        'title' => array()
			    ),
			    'br' => array(),
			    'em' => array(),
			    'strong' => array(),
			);
			echo wp_kses( $this->label, $args );
		}
	}

	/*
    *Get all categories
    */
    function tography_lite_categories_ar(){
        $categories = get_categories();
        $cat_ar = array();
        if ( $categories ) {
            foreach ( $categories as $key ) {
                $cat_ar[$key->slug] = $key->name;
            }
        }
        return $cat_ar;
    }





	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting('header_textcolor')->transport='postMessage';





	$wp_customize->add_setting( 'show_desc', array(
		'default' => '1',
		'transport'  => 'postMessage',
        'sanitize_callback' => 'tography_lite_checkbox'
	) );
	$wp_customize->add_control( 'show_desc', array(
		'label' => esc_attr__( 'Show Tagline', 'tography-lite' ),
		'section' => 'title_tagline',
		'settings' => 'show_desc',
		'type' => 'checkbox' 
	) );




	/*
    Theme Options
    =====================================================
    */
    $wp_customize->add_section( 'theme_options', array(
         'title'    => esc_attr__( 'Theme Options', 'tography-lite' ),
         'priority' => 130,
    ) );
    $wp_customize->add_setting( 'portfolio_category', array(
        'sanitize_callback' => 'tography_lite_sanitize_categories'
    ) );
    $wp_customize->add_control( 'portfolio_category', array(
            'label'    => esc_attr__( 'Portfolio Category', 'tography-lite' ),
            'section'  => 'theme_options',
            'settings' => 'portfolio_category',
            'type'     => 'select',
            'choices'  => tography_lite_categories_ar()
        )
    );

    $wp_customize->add_setting( 'portfolio_amount', array(
    	'default'        => '11',
        'sanitize_callback' => 'tography_lite_sanitize_integer'
    ) );
    $wp_customize->add_control( 'portfolio_amount', array(
            'label'    => esc_attr__( 'Portfolio Amount', 'tography-lite' ),
            'description' => esc_attr__( 'Number of portfolio items to display per page.', 'tography-lite' ),
            'section'  => 'theme_options',
            'settings' => 'portfolio_amount'
        )
    );




    /*
    Logo
    ===================================================== */
    $section_args = array(
    	'wp_customize' => $wp_customize,
    	'title' => esc_html__( 'Logo', 'tography-lite' ),
    	'label' => sprintf( __( 'Check out the <a href="%s" target="_blank">PRO version</a> to change logo.', 'tography-lite' ), esc_url( 'http://www.quemalabs.com/theme/tography/?utm_source=Tography%20Lite%20Theme&utm_medium=Pro%20Button&utm_campaign=Tography' ) ),
    	'priority' => 100
    );
    tography_lite_pro_btns( $section_args );

    /*
    Header Layout
    ===================================================== */
    $section_args = array(
    	'wp_customize' => $wp_customize,
    	'title' => esc_html__( 'Header Layout', 'tography-lite' ),
    	'label' => sprintf( __( 'Check out the <a href="%s" target="_blank">PRO version</a> to change the header layout.', 'tography-lite' ), esc_url( 'http://www.quemalabs.com/theme/tography/?utm_source=Tography%20Lite%20Theme&utm_medium=Pro%20Button&utm_campaign=Tography' ) ),
    );
    tography_lite_pro_btns( $section_args );

    /*
    Create Portfolio
    ===================================================== */
    $section_args = array(
    	'wp_customize' => $wp_customize,
    	'title' => esc_html__( 'Create New Portfolio', 'tography-lite' ),
    	'label' => sprintf( __( 'Check out the <a href="%s" target="_blank">PRO version</a> to create unlimited portfolios.', 'tography-lite' ), esc_url( 'http://www.quemalabs.com/theme/tography/?utm_source=Tography%20Lite%20Theme&utm_medium=Pro%20Button&utm_campaign=Tography' ) ),
    );
    tography_lite_pro_btns( $section_args );

    /*
    Portfolio Layout
    ===================================================== */
    $section_args = array(
    	'wp_customize' => $wp_customize,
    	'title' => esc_html__( 'Portfolio Layout', 'tography-lite' ),
    	'label' => sprintf( __( 'Check out the <a href="%s" target="_blank">PRO version</a> to change the portfolio layout (Thirds, Masonry, Horizontal).', 'tography-lite' ), esc_url( 'http://www.quemalabs.com/theme/tography/?utm_source=Tography%20Lite%20Theme&utm_medium=Pro%20Button&utm_campaign=Tography' ) ),
    );
    tography_lite_pro_btns( $section_args );






}




/*
Enqueue Script for Live previw in the Theme Customizer

*/
if ( ! function_exists( 'tography_lite_customizer_live_preview' ) ){
	function tography_lite_customizer_live_preview()
	{
		wp_enqueue_script( 'tography_lite_customizer_script',			//Give the script an ID
			  TOGRAPHY_LITE_JS . '/theme-customizer-preview.js',//Point to file
			  array( 'jquery','customize-preview' ),	//Define dependencies
			  '',						//Define a version (optional) 
			  true						//Put script in footer?
		);
	}
}//end if function_exists
add_action( 'customize_preview_init', 'tography_lite_customizer_live_preview' );



/*
Enqueue Script for top buttons
*/
if ( ! function_exists( 'tography_lite_customizer_controls' ) ){
	function tography_lite_customizer_controls(){

		wp_register_script( 'tography_lite_customizer_top_buttons', TOGRAPHY_LITE_JS . '/theme-customizer-top-buttons.js', array( 'jquery' ), true  );
		wp_enqueue_script( 'tography_lite_customizer_top_buttons' );

		wp_localize_script( 'tography_lite_customizer_top_buttons', 'topbtns', array(
			'pro' => esc_html__( 'View PRO version', 'tography-lite' ),
            'documentation' => esc_html__( 'Documentation', 'tography-lite' )
		) );
	}
}//end if function_exists
add_action( 'customize_controls_enqueue_scripts', 'tography_lite_customizer_controls' );






/*
Sanitize Callbacks
*/

/*
*Sanitize for post's categories
*/
function tography_lite_sanitize_categories( $value ) {
    if ( ! array_key_exists( $value, tography_lite_categories_ar() ) )
        $value = '';
    return $value;
}


/*
*Sanitize return an Integer
*/
function tography_lite_sanitize_integer( $value ) {
    return intval( $value );
}


/*
* Sanitize return pro version text
*/
function tography_lite_pro_version( $input ) {
    return $input;
}


/*
* Sanitize checkbox
*/
function tography_lite_checkbox( $input ) {
    return $input;
}



/*
Create the "PRO version" buttons
*/
if ( ! function_exists( 'tography_lite_pro_btns' ) ){
	function tography_lite_pro_btns( $args ){

		$wp_customize = $args['wp_customize'];
		$title = $args['title'];
		$label = $args['label'];
		if ( isset( $args['priority'] ) || array_key_exists( 'priority', $args ) ) {
			$priority = $args['priority'];
		}else{
			$priority = 120;
		}

		$section_id = sanitize_title( $title );

		$wp_customize->add_section( $section_id , array(
			'title'       => $title,
			'priority'    => $priority
		) );
		$wp_customize->add_setting( $section_id, array(
			'sanitize_callback' => 'tography_lite_pro_version'
		) );
		$wp_customize->add_control( new tography_lite_Pro_Version( $wp_customize, $section_id, array(
	        'section' => $section_id,
	        'label' => $label
		   )
		) );
	}
}//end if function_exists

?>
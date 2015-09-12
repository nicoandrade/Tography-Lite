<?php



if ( ! function_exists( 'tography_lite_new_content_more' ) ){
	function tography_lite_new_content_more($more) {
	       global $post;
	       return ' <br><a href="' . esc_url( get_permalink() ) . '" class="more-link btn btn-ql">'.__('Read more', 'tography-lite').'</a>';
	}   
}// end function_exists
	add_filter( 'the_content_more_link', 'tography_lite_new_content_more' );


if ( ! function_exists( '_wp_render_title_tag' ) ) :
	function tography_lite_render_title() {
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
	}
	add_action( 'wp_head', 'tography_lite_render_title' );
endif;



if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'tography-lite' ); ?></h2>
		<div class="nav-links">
			<?php
			previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
			next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;




if ( ! function_exists( 'tography_lite_the_post_navigation' ) ) :
/**
 * Display navigation to next/previous portfolio item when applicable.
 */
function tography_lite_the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php
			$in_same_term = false;
			if ( tography_lite_is_portfolio_item() ) {
				$in_same_term = true;
			}
			previous_post_link( '<div class="nav-previous">%link</div>', '%title', $in_same_term );
			next_post_link( '<div class="nav-next">%link</div>', '%title', $in_same_term );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;






if ( ! function_exists( 'tography_lite_exclude_portfolio_category' ) ) :
/**
* Remove all posts from the index that has the Portfolio Category
*/
function tography_lite_exclude_portfolio_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
    	//Get the Portfolio Category
		$portfolio_category = get_theme_mod( 'portfolio_category' );
		if ( $portfolio_category  ) {
			//Get the ID of the category
			$cat = get_category_by_slug( $portfolio_category );
			//Remove all posts from the index that has the Portfolio Category
    		$query->set( 'category__not_in', $cat->term_id );
		}
    }
}
endif;
add_action( 'pre_get_posts', 'tography_lite_exclude_portfolio_category' );






if ( ! function_exists( 'tography_lite_portfolio_filters' ) ) :
/**
* Create the portfolio filters for Isotope
* @param $the_query receive a query with the posts to extract the categories
*/
function tography_lite_portfolio_filters( $the_query ) {

	$post_categories = array();
	//Get the Portfolio Category
	$portfolio_category = get_theme_mod( 'portfolio_category' );
	foreach ( $the_query->posts as $post ) {
		$post_category = wp_get_post_categories( $post->ID );
		$cats = array();

		if ($post_category) {
			foreach($post_category as $c){
				$cat = get_category( $c );
				//We don't add the Portfolio Category (selected by user) to the Isotope filters
				if ( $portfolio_category != $cat->slug ) {							
					$post_categories[$c] = array( 'name' => $cat->name, 'slug' => $cat->slug );;
				}
			}
		}
	}

	function sortByOrder($a, $b) {
	    return strcmp($a["slug"], $b["slug"]);
	}
	usort($post_categories, 'sortByOrder');

	if ($post_categories) {
		?>
		<div class="ql_filter filter_list">                
			<ul>
			<li class="active"><a href="#" data-filter="*" ><?php esc_html_e( 'All', 'tography-lite' ); ?><span></span></a></li>
			<?php
				foreach($post_categories as $cat){
					?>
					<li><a href="#" data-filter="._<?php echo esc_attr( $cat['slug'] ); ?>"><?php echo esc_html( $cat['name'] ); ?></a></li>
					<?php
				}
			?>
			</ul>
			<div class="clearfix"></div>
		</div><!-- /ql_filter -->

		<?php
	}// if post_categories
}
endif;



if ( ! function_exists( 'tography_lite_is_portfolio_item' ) ) :
/**
* Checks if the current post has the Portfolio Category selected by user
* @param $id (opcional) array with the post ID. Ex: array( 'id' => 14)
*/
function tography_lite_is_portfolio_item( $id = NULL) {
	//Get the Portfolio Category
	$portfolio_category = get_theme_mod( 'portfolio_category' );
	if ( $portfolio_category ) {
		if ( $id ) {
			return has_category( $portfolio_category, $id );
		}else{
			return has_category( $portfolio_category );
		}
	}else{
		return FALSE;
	}
}
endif;
?>
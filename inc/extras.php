<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package StartPress
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function start_press_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'start_press_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function start_press_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'start_press_pingback_header' );


function start_press_coures_modules($before_modules = null , $after_moudlues = null ){

	$modules = get_terms('module',array('orderby' => 'term_id' , 'order' => 'ASC'));

	echo $before_modules;

	foreach ($modules as $module ){
		
		$module_id 		= $module->term_id;
		$title 	   		= $module->name;
		$description 	= $module->description;
		$meta_image_id 	= get_term_meta($module_id,'pix_term_icon',true);
		$image_src 		= wp_get_attachment_url($meta_image_id);
		$term_link		= get_term_link($module_id);

	?>
	 <div class="courese-module col-md-4">
	   <a href="<?php echo esc_url($term_link);?>">
		   <img src="<?php echo $image_src; ?>" class="img-responsive" alt="<?php echo $title; ?>">
		   <h4><?php echo $title ;?></h4>
	   </a>
	 </div>
	<?php

	}

	echo $after_moudlues;

}

function get_featured_image_as_background ( $id ){

	if(has_post_thumbnail($id )){

		echo 'style="background-image:url('.get_the_post_thumbnail_url($id,'full').')"';
	}
}




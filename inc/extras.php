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

function modify_quest_post_type () {


	$args = array(

		'label'					=> __('Quests', 'start-press'),
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page'
	);

	register_post_type('quest' ,$args );

}

add_action( 'init' , 'modify_quest_post_type' );

function start_press_quests_types() {

	$labels = array(
		'name'                       => _x( 'Quest Types', 'Taxonomy General Name', 'start-press' ),
		'singular_name'              => _x( 'Quest Type', 'Taxonomy Singular Name', 'start-press' ),
		'menu_name'                  => __( 'Quest Types', 'start-press' ),
		'all_items'                  => __( 'All Types', 'start-press' ),
		'parent_item'                => __( 'Parent Type', 'start-press' ),
		'parent_item_colon'          => __( 'Parent Type:', 'start-press' ),
		'new_item_name'              => __( 'New Type Name', 'start-press' ),
		'add_new_item'               => __( 'Add New Type', 'start-press' ),
		'edit_item'                  => __( 'Edit Type', 'start-press' ),
		'update_item'                => __( 'Update Type', 'start-press' ),
		'view_item'                  => __( 'View Type', 'start-press' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'start-press' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'start-press' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'start-press' ),
		'popular_items'              => __( 'Popular types', 'start-press' ),
		'search_items'               => __( 'Search Types', 'start-press' ),
		'not_found'                  => __( 'Not Found', 'start-press' ),
		'no_terms'                   => __( 'No Types', 'start-press' ),
		'items_list'                 => __( 'Types list', 'start-press' ),
		'items_list_navigation'      => __( 'Types list navigation', 'start-press' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'quest-category', array( 'quest' ), $args );

}

add_action( 'init', 'start_press_quests_types', 0 );





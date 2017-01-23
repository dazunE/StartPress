<?php
/**
 * Implementation of the short-codes for LMS
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package StartPress
 */

function start_press_get_post_types ( $atts ) {

	$atts = shortcode_atts(

		array(

			'type'  => false,
			'count' => -1,
			'order' => false
		),

		$atts,
		'sp_post_type'
	);

	$args = array(

		'post_type' 	=> $atts['type'],
		'post_status' 	=> 'publish',
		'post_per_page' => $atts['count'],
		'order' 		=> $atts['order'],
		'orderby'		=> 'date'
	);
	
	$query = new WP_Query( $args );

	ob_start();

	echo '<div class="all-'.$atts['type'].'__wrapper all-types__wrapper"><div class="row">';

	if($query->have_posts()){

		while($query->have_posts()){

			$query->the_post();

			get_template_part('post-loops/content', $atts['type']);
		}
	}

	echo '</div></div>';

	return ob_get_clean();

}

add_shortcode( 'sp_post_type' , 'start_press_get_post_types');
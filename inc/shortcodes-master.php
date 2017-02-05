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

// Get Main Coures Cats

function start_press_get_taxonomies ( $atts ) {

	$atts = shortcode_atts(

		array(

			'taxonomy'   => 'category',
			'parent'	 =>  0,
		),
		$atts,
		'sp_post_categories'
	);

	$args = array(

		'taxonomy'	=> $atts['taxonomy'],
		'parent'	=> $atts['parent'],
		'hide_empty' => false,
	);

	//var_dump($args);

	$terms = get_terms($args);

	ob_start();

    echo '<div class="row post-taxonomies wow">';

    $i = 1;

	foreach ($terms as $term) {

		//var_dump($term);
		
		$id 		= $term->term_id;
		$icon_id 	= get_term_meta($id,'pix_term_icon',true);
		$icon_src 	= wp_get_attachment_url($icon_id);

		$link = get_term_link($id);

		

	?>

	<div class="col-md-4 text-center wow rotateIn" data-wow-delay="<?php echo $i; ?>s" >
		<a href="<?php echo esc_url($link);?>">
			<img src="<?php echo $icon_src; ?>" class="img-responsive" alt="<?php echo $term->name?>">
		</a>
		<h4><?php echo $term->name;?></h4>
	</div>

	<?php

	$i ++;

	}

	echo '</div>';

	return ob_get_clean();
}

add_shortcode( 'sp_post_categories' , 'start_press_get_taxonomies' );
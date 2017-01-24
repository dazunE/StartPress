<?php 

/**
 * @package start-press
 * @subpackage sensei-integartions
 * @author Dasun Edirisinghe
 *
 * @since 1.0.0
*/

// Remove Sensei Defult Wrappers

global $woothemes_sensei;

remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );

function start_press_sensei_wrapper_start(){
?>

<div class="inner-pages banner-wapper">
<div class="header-banner" <?php get_featured_image_as_background(get_the_ID());?>>
	<div class="banner-caption justify-content-center">
		<div class="container">
			<?php the_title( '<h2>','</h2>' );?>
		</div>
	</div>
</div>
</div>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-pages block'); ?>>
	<div class="container">
		<div class="all-course__wrapper all-types__wrapper">
<?php
	
}

function start_press_sensei_wrapper_end(){

echo '</div></div></div></div>';
	
}

add_action('sensei_before_main_content', 'start_press_sensei_wrapper_start', 10);
add_action('sensei_after_main_content', 'start_press_sensei_wrapper_end', 10);

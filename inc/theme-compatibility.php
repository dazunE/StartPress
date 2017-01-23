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

	echo '<div class="sensei-courese-wrapper"><div class="courese__inner>';
}

function start_press_sensei_wrapper_end(){

	echo '</div></div>';
}

add_action('sensei_before_main_content', 'start_press_sensei_wrapper_start', 10);
add_action('sensei_after_main_content', 'start_press_sensei_wrapper_end', 10);

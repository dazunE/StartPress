<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StartPress
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-pages block'); ?>>
	<div class="container">
		<?php the_content();?>
	</div>
</div><!-- #post-## -->

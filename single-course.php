<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StartPress
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		?>

		<div class="single-course banner-wapper">
				<div class="header-banner">
					<div class="banner-caption justify-content-center">
						<div class="container">
						<?php the_title( '<h2>','</h2>' );?>
						<h4><?php the_excerpt();?></h4>
						</div>
					</div>
				</div>
		    </div>

		<?php

			get_template_part( 'template-parts/content', 'course');

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

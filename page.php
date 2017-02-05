<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StartPress
 */

get_header(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('page-content block'); ?>>

			<?php
			while ( have_posts() ) : the_post();

			?>

			<div class="inner-pages banner-wapper">
				<div class="header-banner" <?php get_featured_image_as_background(get_the_ID());?>>
					<div class="banner-caption justify-content-center">
						<div class="container">
							<?php the_title( '<h2>','</h2>' );?>
							<h4><?php the_excerpt();?></h4>
						</div>
					</div>
				</div>
		    </div>

		    <?php

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

	</div><!-- #primary -->
 
<?php
//get_sidebar();
get_footer();

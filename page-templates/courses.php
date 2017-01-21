<?php

/**
 * Template Name: Courses
 *
 * @package StartPress
 * @since StartPress 1.0
 */

get_header();

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<!-- Page Content By Editor -->
		<?php
			while ( have_posts() ) : the_post();

		?>

		<div class="inner-pages banner-wapper">
			<div class="header-banner">
				<div class="banner-caption justify-content-center">
					<div class="container">
						<?php the_title( '<h2>','</h2>' );?>
					<h4>The function of education is to teach one to think intensively and to think critically. Intelligence plus character - that is the goal of true education.</h4>
					</div>
				</div>
			</div>
		</div>

		<?php

				get_template_part( 'template-parts/content', 'courses' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>
		<!-- End by Editor -->
	</main>
</div>

<?php

get_footer();

?>

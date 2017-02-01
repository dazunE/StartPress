<?php

/**
 * Template Name: Front Page
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
		<!-- Home Page Banner -->
		<div class="front-page banner-wapper">
			<div class="header-banner">
				<div class="banner-caption justify-content-center">
					<h3>GET THE HEAD START YOU DESERVE</h3>
					<h1>Increase your chances of being employed</h1>
					<button class="btn btn-lg sign-up">Get Started</button>
				</div>
			</div>
		</div>
		<!-- End Home Page Banner -->

		<?php

				get_template_part( 'template-parts/content', 'front' );

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

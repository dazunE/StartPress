<?php
/**
 * The template for displaying coures archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StartPress
 */

get_header();

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php

		/**
		 * This action before course archive loop. This hook fires within the archive-course.php
		 * It fires even if the current archive has no posts.
		 *
		 * @since 1.9.0
		 *
		 * @hooked Sensei_Course::course_archive_sorting 20
		 * @hooked Sensei_Course::course_archive_filters 20
		 * @hooked Sensei_Templates::deprecated_archive_hook 80
		 */

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

		<div class="all-courese block">
   			
   			<div class="container all-courese__wrapper">

				<?php

				do_action( 'sensei_archive_before_course_loop' );

				if ( have_posts() ) {

				  sensei_load_template( 'page-templates/loop-course.php' ); 

				} else { 

				?>

					<p><?php _e( 'No courses found that match your selection.', 'woothemes-sensei' ); ?></p>

				<?php } 

				/**
				 * This action runs after including the course archive loop. This hook fires within the archive-course.php
				 * It fires even if the current archive has no posts.
				 *
				 * @since 1.9.0
				 */
				do_action( 'sensei_archive_after_course_loop' );

				?>
			</div>

		</div>

	</main>
</div>

<?php

get_footer();

?>
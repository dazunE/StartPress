<?php ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-pages single-course'); ?>>
	<div class="container single-coures__wrapper">
		<div class="row">
			<div class="col-md-8 coures-content">
			  <?php the_content();?>
			  <?php start_press_coures_modules('<div class="row">','</div>');?>
			</div>
			<div class="col-md-4">
			  	Sidebar
			</div>
		</div>
	</div>
</div><!-- #post-## -->
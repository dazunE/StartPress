<?php ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-pages single-course'); ?>>
	<div class="container single-coures__wrapper">
		<figure class="mx-auto">
			<?php the_post_thumbnail();?>
		</figure>
		<div class="row">
			<div class="col-md-9">
			  <?php the_content();?>	
			</div>
			<div class="col-md-3">
			  	Sidebar
			</div>
		</div>
	</div>
</div><!-- #post-## -->
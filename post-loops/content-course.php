<?php

global $post;

//var_dump($post);

?>

<div class="col-md-4 coures__item">
    <a href="<?php the_permalink();?>">
	  	<div class="courese__tumbnail">
	  		<figure>
	  			<?php the_post_thumbnail();?>
	  		</figure>
	  	</div>
  	</a>
  	<div class="courese__description">
  		<?php the_title('<h3>','</h3>');?>
  		<?php the_excerpt(); ?>
  	</div>

</div>
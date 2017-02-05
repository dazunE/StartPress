<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StartPress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<nav class="navbar navbar-toggleable-md main-navigation">
			<!-- Site Branding -->
		  	<a class="navbar-brand" href="<?php echo esc_url(home_url('/'));?>">
				<img src="<?php echo get_stylesheet_directory_uri()?>/media/svg/logo.png" width="100" height="100" class="d-inline-block" alt="">
				<span><?php echo bloginfo('name');?></span>
			</a>
			<!-- end branding -->
		  	<!-- navigation -->
			  <?php

			  	   /**
			  		* Displays a navigation menu
			  		* @param array $args Arguments
			  		*/
			  		$args = array(
			  			'theme_location' 	=> 'main-nav',
			  			'menu_class'	 	=> 'nav justify-content-end',
			  			'container'			=> 'nav',
			  			'container_class'	=> 'collapse navbar-collapse'
			  		);
			  	
			  		wp_nav_menu( $args );

			  ?>
		  	<!--end navigation -->
		</nav>
	</header>
	<!-- Header Login -->
	<div class="modal fade sp-login" id="loginPoup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      <div class="modal-body">
	        <?php login_with_ajax(); ?>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- End Header Login Widget -->
	<div id="content" class="site-content">

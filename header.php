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
	<header id="masthead" class="site-header font-page_header">
		<nav class="navbar navbar-toggleable-md main-navigation">
			<!-- Site Branding -->
		  	<a class="navbar-brand" href="<?php echo esc_url(home_url('/'));?>">
				<img src="<?php echo get_stylesheet_directory_uri()?>/media/svg/logo.png" width="100" height="100" class="d-inline-block" alt="">
				<span><?php echo bloginfo('name');?></span>
			</a>
			<!-- end branding -->
		  	<!-- navigation -->
			  <div class="collapse navbar-collapse">
					<ul class="nav justify-content-end">
					  <li class="nav-item">
					    <a class="nav-link" href="#">Courses</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="#">Instructors</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="#">About Us</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="#">Sign In</a>
					  </li>
					</ul>
			  </div>
		  	<!--end navigation -->
		</nav>
	</header>

	<div id="content" class="site-content">

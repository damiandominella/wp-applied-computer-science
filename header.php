<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package applied-computer-science
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<header id="header" class="site-header">
		<!-- Topbar (for socials etc...) -->
		<div class="topbar">
			<ul class="socials">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-skype"></i></a></li>
                <li><a href="#"><i class="fab fa-foursquare"></i></a></li>
                <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                <li><a href="#"><i class="fas fa-rss"></i></a></li>
            </ul>
		</div>
		<!-- Topbar -->

	    <!-- Logo and menu wrapper -->
		<div class="logo-menu-wrapper">
			<img id="logo" src="<?php echo home_url('assets/logo_sti_new.png') ?>" alt="Logo">
			<div class="menu-toggler">
                <i class="fas fa-bars"></i>
			</div>
			<div class="menu">
				<?php get_main_menu(); // Adjust using Menus in Wordpress Admin ?>
			</div>
		</div>
		<!-- Logo and menu wrapper -->

		<!-- Sidebar menu (for mobile) -->
		<div class="sidebar-menu">
			<h1><?php echo get_bloginfo();?></h1>
			<div class="menu-toggler">
                <i class="fas fa-bars"></i>
			</div>
			<div class="menu">
				<?php get_main_menu(); // Adjust using Menus in Wordpress Admin ?>
			</div>
			<!-- Topbar (for socials etc...) -->
			<div class="topbar">
				<ul class="socials">
             	   <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
             	   <li><a href="#"><i class="fab fa-twitter"></i></a></li>
             	   <li><a href="#"><i class="fab fa-skype"></i></a></li>
             	   <li><a href="#"><i class="fab fa-foursquare"></i></a></li>
              	  <li><a href="#"><i class="fas fa-envelope"></i></a></li>
              	  <li><a href="#"><i class="fas fa-rss"></i></a></li>
            	</ul>
			</div>
		<!-- Topbar -->
		</div>
		<!-- Sidebar menu -->

		<!-- <img class="main-logo" src="<?php echo home_url('assets/logo_sti_new.png') ?>" alt="Logo"> -->
	</header>

	<div id="content" class="site-content">

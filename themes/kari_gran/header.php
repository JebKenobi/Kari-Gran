<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<a href="<?php bloginfo ( 'url' ); ?>" id="logo"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/kari-gran.gif" height="79" width="201" alt="Kari Gran - Be Kind to Your Skin" /></a>
			<span id="nav-toggle"><div data-icon="m" class="icon"></div><div data-icon="x" class="icon close"></div></span>
			<ul id="nav-super">
				<li><a>Free Shipping</a></li>
				<li><a href="https://karigran.com/customer/account/login/">My Account</a></li>
			</ul>
			<nav id="nav-main" class="site-navigation primary-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>

			</nav>
		</div>
	</header><!-- #masthead -->

	<section id="blog-main">
			<header class="banner">
				<h1>The Kari Blog</h1>
			</header>

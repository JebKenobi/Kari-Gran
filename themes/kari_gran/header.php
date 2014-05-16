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
	<? if (is_single()) { ?>
		<?php $image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id,'large', true);
		  ?>
		<meta name="twitter:card" content="summary">
	    <meta name="twitter:creator" content="@KariGranSkin">
	    <meta property="og:title" content="<?php the_title(); ?>" />
	    <meta property="og:type" content="article" />
	    <meta property="og:url" content="<?php the_permalink(); ?>" />
	    <meta property="og:image" content="<?php echo $image_url[0]; ?>" />
	    <meta property="og:description" content="" />
	<?php } ?>
	<?php wp_head(); ?>
	<!-- BEGIN GOOGLE ANALYTICS CODEs -->

	<noscript>
		<iframe src="//www.googletagmanager.com/ns.html?id=GTM-TW4GFW" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>

	<script type="text/javascript">
	//<![CDATA[
	    var _gaq = _gaq || [];
			
	_gaq.push(['_setAccount', 'UA-32937763-1']);
	_gaq.push(['_trackPageview']);
					
	    	(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-TW4GFW');
	//]]>
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<a href="<?php bloginfo ( 'url' ); ?>" id="logo"><img src="http://karigran.com/skin/frontend/default/karigran/images/kg-logo.png" height="66" width="201" alt="Kari Gran - Be Kind to Your Skin" /></a>
			<span id="nav-toggle"><div data-icon="m" class="icon"></div><div data-icon="x" class="icon close"></div></span>
			<ul id="nav-super">
				<li>Free Shipping</li>
				<li><a href="https://karigran.com/customer/account/login/">My Account</a></li>
			</ul>
			<nav id="nav-main" class="site-navigation primary-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>

			</nav>
		</div>
	</header><!-- #masthead -->

	<section id="blog-main">
			<header class="banner">
				<a href="<?php bloginfo ( 'url' ); ?>"></a>
			</header>

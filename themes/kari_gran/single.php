<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<section class="col-main">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					?>
					<script>
						var controller;
					</script>
					<?php
					get_template_part( 'content', get_post_format() );
					?>
					<script>
						$(document).ready(function($) {
							// init controller
							controller = new ScrollMagic();
							// build scene
							var scrollHeight = ($('div.entry-content').height()) - 275;
							var scene = new ScrollScene({triggerElement: "#trigger1", duration: scrollHeight}).setPin("#socialPin", {pushFollowers: false}).addTo(controller);
							// Bind to the resize event of the window object
							$(window).on("load", function() {
								var w = $(window).width();
								if ( w < 600 || ((w > 768) && (w < 960))) {
									$('body').addClass('stuck');
								}
							});
							$(window).on("resize", function () {
								scene.removePin(true);
								console.log(scene.progress());
							    var w = $(window).width();
								if ( w < 600 || ((w > 768) && (w < 960))) {
									console.log('Fixed', $( window ).width());
									$('body').addClass('stickySocial');
									var triggerOffset = 0;
								} else {
									$('.scrollmagic-pin-spacer').css({
										"left": "-55px !important",
										"top": "0px !important"
									})
									$('.SocialPin').css({
										"position": "absolute"
									})
									console.log('Follow', $( window ).width());
									$('body').removeClass('stickySocial');
									var triggerOffset = 0;
									scene.setPin("#socialPin", {pushFollowers: false});
								}
							}).resize();
						});
					</script>
					<?php
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<div id="comment-area">
		<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>

					<div class="pagination">
						<?php previous_post_link('%link', '<span><</span> Previous Post'); ?>
						<?php next_post_link( '%link', 'Next post <span>></span>'); ?>
						
					</div>
					<?php

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
	</div>
</section>

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();

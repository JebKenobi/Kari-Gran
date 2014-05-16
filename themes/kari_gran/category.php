<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section class="col-main">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

				<?php if ( have_posts() ) : ?>
				<?php $category = get_the_category(); 
				$slug = $category[0]->cat_ID; ?>
				<header class="archive-header">
					<h1 class="archive-title cat-<?php echo $slug; ?>"><?php printf( __( '%s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>

					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
				</header><!-- .archive-header -->

				<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

						endwhile;
						// Previous/next page navigation.
						?>
						<div id="pagination">
							<?php
							twentyfourteen_paging_nav(); ?>
						</div>
						<?php

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

					endif;
				?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</section><!-- #main-content -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();

<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<?php if ( is_front_page() || is_category() || is_archive() ) { ?>
	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php } else { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php } ?>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<div class="diamond"></div>
			<?php
				if ( 'post' == get_post_type() )
					twentyfourteen_posted_on();

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<br /><span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_category() || is_archive() || is_front_page() ) : ?>
	<?php
		$category = get_the_category(); 
		$slug = $category[0]->cat_ID;
	?>
	<div class="entry-content summary">
		<span class="cat cat-<?php echo $slug; ?>"><?php echo $category[0]->cat_name; ?></span>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php twentyfourteen_post_thumbnail(); ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<span class="cat cat-<?php echo $slug; ?>"><?php echo $category[0]->cat_name; ?></span>
		<h1><?php the_title(); ?></h1>
		<?php twentyfourteen_post_thumbnail(); ?>
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
<?php if ( is_front_page() || is_category() || is_archive() ) { ?>
	</section><!-- #post-## -->
<?php } else { ?>
	</article><!-- #post-## -->
<?php } ?>

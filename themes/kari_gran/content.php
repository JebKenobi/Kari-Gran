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
		<?php if (!is_category() || !is_archive()) { ?><span class="cat cat-<?php echo $slug; ?>"><?php echo $category[0]->cat_name; ?></span><?php } ?>
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php twentyfourteen_post_thumbnail(); ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<?php
		$category = get_the_category(); 
		$slug = $category[0]->cat_ID;
	?>
	<div class="entry-content">
		<span class="cat cat-<?php echo $slug; ?>"><?php echo $category[0]->cat_name; ?></span>
		<h1><?php the_title(); ?></h1>
		<?php twentyfourteen_post_thumbnail(); ?>
		<? if (is_single()) { ?>
			<!-- SOCIAL -->
			<?php $the_permalink = get_permalink();
			$thumb = get_the_post_thumbnail();
			$title = get_the_title(); ?>
			<span id="socialPin">
				<ul id="socialCount">
					<li id="comment_icon"><a href="<?php echo $the_permalink; ?>#comments"><div data-icon="d" class="icon"></div></a> <span class="count" id="comment_count"><?php echo get_comments_number(); ?></span> <span class="text">Comments</span></li>
					<span class="text">Share post</span>
					<li class="facebook"><span id="fb_icon"></span><span class="count" id="fb_count"></span></li>
					<li class="twitter"><span id="tw_icon"></span><span class="count" id="tw_count"></span></li>
					<li class="pinterest"><span id="pin_icon"></span><span class="count" id="pin_count"></span></li>
					<li id="mail"><a href="mailto:?subject=Check%20out%20this%20article!&body=I%20found%20this%20and%20I%20think%20you'll%20like%20it:%20<?php echo $the_permalink; ?>"><div data-icon="c" class="icon"></div></a></li>
				</ul>
			</span>
				<script> 
					$('#pin_icon').sharrre({
					  share: {
					    pinterest: true
					  },
					  urlCurl: 'http://staging.karigran.com/wp-content/themes/kari_gran/js/sharrre.php',
					  template: '<a href="#" class="pinterest"><div data-icon="p" class="icon"></div></a>',
					  enableHover: false,
					  enableTracking: true,
					  render: function(api, options){
						  $(api.element).on('click', '.pinterest', function() {
						    api.openPopup('pinterest');
						  });
						  document.getElementById('pin_count').innerHTML = '<span>' + (options.count.pinterest) + '</span>';
						},
						pinterest: {
						  url: '<?php echo $the_permalink; ?>',
						  media: '<?php echo $thumb; ?>',
						  description: '<?php echo $title; ?>',
						  layout: 'horizontal'
						} 
					});
					$('#fb_icon').sharrre({
					  share: {
					    facebook: true
					  },
					  template: '<a href="#" class="facebook"><div data-icon="f" class="icon"></div></a>',
					  enableHover: false,
					  enableTracking: true,
					  render: function(api, options){
						  $(api.element).on('click', '.facebook', function() {
						    api.openPopup('facebook');
						  });
						  document.getElementById('fb_count').innerHTML = '<span>' + (options.count.facebook) + '</span>';
						},
					});
					$('#tw_icon').sharrre({
					  share: {
					    twitter: true
					  },
					  template: '<a href="#" class="twitter"><div data-icon="t" class="icon"></div></a>',
					  enableHover: false,
					  enableTracking: true,
					  render: function(api, options){
						  $(api.element).on('click', '.twitter', function() {
						    api.openPopup('twitter');
						  });
						  document.getElementById('tw_count').innerHTML = '<span>' + (options.count.twitter) + '</span>';
						}
					});
					
				</script>
				<div class="triggerToggle" id="trigger1"></div>
		<?php } ?>
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

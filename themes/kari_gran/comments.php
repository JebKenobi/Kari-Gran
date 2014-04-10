<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<span><?php printf( _n( '%1$s', get_comments_number() ), number_format_i18n( get_comments_number() )); ?></span> Comments
	</h2>
	<?php $comment_args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => __( '' ),
	  'title_reply_to'    => __( 'Reply >' ),
	  'cancel_reply_link' => __( 'Cancel' ),
	  'label_submit'      => __( 'Add Comment' ),

	  'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Add a comment">' .
	    '</textarea>',

	  'must_log_in' => '<p class="must-log-in">' .
	    sprintf(
	      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</p>',

	  'logged_in_as' => '<p class="logged-in-as">' .
	    sprintf(
	    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>',

	  'comment_notes_before' => '<p class="comment-notes">' . ( $req ? $required_text : '' ) .
	    '</p>',

	  'comment_notes_after' => '',

	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '' .
	      '<label>' . ( $req ? '<span class="required">*</span>' : '' ) . __( 'Name:', 'domainreference' ) .
	      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	      '" size="30"' . $aria_req . ' /></label>',

	    'email' =>
	      '<label>' . ( $req ? '<span class="required">*</span>' : '' ) . __( 'Email:', 'domainreference' ) .
	      '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      '" size="30"' . $aria_req . ' /></label>',

	    'url' => ''
	    )
	  ),
	); ?>
	<?php comment_form($comment_args); ?>

	<ol class="comment-list">
		<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>
</div><!-- #comments -->

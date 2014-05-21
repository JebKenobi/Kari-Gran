<?php
// Custom Function to Include scripts
function karigran_scripts() {  
 
  wp_deregister_script('jquery');
  wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), null, false );

  wp_register_script( 'basic-js', get_stylesheet_directory_uri() . '/js/javascript.js', array( 'jquery' ), true );
  wp_register_script( 'sharre', get_stylesheet_directory_uri() . '/js/jquery.sharrre.js', array( 'jquery' ), true );
  wp_register_script( 'animation_lib', get_stylesheet_directory_uri() . '/js/TweenMax.min.js', array(), true);
  wp_register_script( 'scrollMagic', get_stylesheet_directory_uri() . '/js/jquery.scrollmagic.js', array( 'jquery' ), true );
  
  wp_enqueue_script('jquery');
  wp_enqueue_script('basic-js');



  if (is_single()) {
    wp_enqueue_script('sharre');
    wp_enqueue_script('animation_lib');
    wp_enqueue_script('scrollMagic');
  }


}
add_action( 'wp_enqueue_scripts', 'karigran_scripts' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

remove_action('wp_head', 'wp_generator');
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'post-hero', 512, 288, true ); //(cropped)
}

function contributors() {
  global $wpdb;

  $authors = $wpdb->get_results("SELECT ID, user_nicename from  $wpdb->users WHERE display_name <> 'portent' AND display_name <> 'Amanda' AND display_name <> 'admin' ORDER BY  display_name");

  foreach ($authors as $author ) { ?>
    <li><a href="<?php echo get_bloginfo('url'); ?>/author/<?php echo the_author_meta('user_nicename', $author->ID); ?>"><?php echo userphoto($author->ID); ?> <?php echo the_author_meta('display_name', $author->ID); ?></a></li>
  <?php }
}

function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    
    <div class="comment-meta">
      <div class="diamond"></div>
      <div class="comment-author vcard">
      <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
          <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
      <?php endif; ?>

      <span class="date">
        <?php
          /* translators: 1: date, 2: time */
          printf( __('%1$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
      </span>
  </div>
  <div class="comment-content">
    <span class="arrow"></span>
    <div class="container">
      <?php comment_text() ?>

      <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
    </div>
    
  </div>
<?php
        }

  
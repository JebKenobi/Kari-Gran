<?php
// Custom Function to Include scripts
function karigran_scripts() {  
 
  wp_deregister_script('jquery');
  wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), null, false );

  wp_register_script( 'basic-js', get_stylesheet_directory_uri() . '/js/javascript.js', array( 'jquery' ), true );

  wp_enqueue_script('jquery');
  wp_enqueue_script('basic-js');


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

  $authors = $wpdb->get_results("SELECT ID, user_nicename from  $wpdb->users WHERE display_name <> 'portent' ORDER BY  display_name");

  foreach ($authors as $author ) { ?>
    <li><a href="<?php echo get_bloginfo('url'); ?>/author/<?php echo the_author_meta('user_nicename', $author->ID); ?>"><?php echo userphoto($author->ID); ?> <?php echo the_author_meta('display_name', $author->ID); ?></a></li>
  <?php }
}

  
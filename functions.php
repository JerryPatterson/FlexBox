<?php
/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );
add_image_size('post', 855, 425, true);

register_nav_menus( array(
		'primary' => __( 'Primary Menu'),
		'footer'  => __( 'Footer Links Menu'),
	) );


function pwd_create_widget( $name, $id, $description ) {

  register_sidebar(array(
      'name'          => __( $name ),
      'id'            => $id,
      'description'   => __( $description ),
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>'
  ));
}

pwd_create_widget( 'Blog Sidebar', 'blog', 'Displays on side of blog page' );

function pwd_theme_styles() {

  wp_enqueue_style( 'googlefont_css' , 'http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,300italic,400italic');

  wp_enqueue_style( 'googlefont_css' , 'https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet');

  wp_enqueue_style( 'fontawesome_css' , 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

  wp_enqueue_style( 'main_css' , get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts' , 'pwd_theme_styles');

function pwd_theme_js() {

  wp_enqueue_script('main_js' , get_template_directory_uri() . '/js/theme.js' , array('jquery') ,'', true );

}
add_action( 'wp_enqueue_scripts' , 'pwd_theme_js');

//
// WooCommerce
//

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Remove Actions
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Add Actions
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);

add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div id="content" role="main" class="container">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}
// End
//enqueues customizer. Uncomment to start using the customizer
// @include(get_template_directory().'/customizer/customizer-functions.php')
?>

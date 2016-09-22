<?php

add_filter( 'wp_image_editors', 'change_graphic_lib' );

function change_graphic_lib($array) {
return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}

add_image_size( 'thumb-large', 1300, 591, true );

    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );

  function wpt_excerpt_length( $length ){
    return 16;
  }
  add_filter( 'excerpt_length', 'wpt_excerpt_length', 999 );
  function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


  function register_theme_menus(){
    register_nav_menus(
      array(
        'primary-menu' => __( 'Primary Menu' )
      )
    );
  }
  add_action( 'init', 'register_theme_menus' );

// load styles
function wpt_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>'
	));

}

wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );



  function wpt_theme_styles(){



    // wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/css/normalise.css' );

    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'googleFonts_css', 'https://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,700,600,600italic,400italic' );
  }

  // must call this function after to actually load scripts.
  add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

// load scripts
// jquery is already installed on wp
  function wpt_theme_js(){
    // pay attention to parameters - first is dependencies and last is  where script will be loaded -boolean- true = footer false = head of doc. * not sure what second is at the moment.
    // wp_enqueue_script( 'modernizer_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false );
    //
    // wp_enqueue_script( 'foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true );
    // wp_enqueue_script( 'slick_js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '', true );

    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/app.js', array('jquery'), '', true );

  }
  add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );

// Stops images from being wrapped in P tags


function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );



function filter_ptags_on_images($content){
return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');


 ?>

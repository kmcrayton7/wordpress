<?php

function learningWordPress_resources() {

    wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'learningWordPress_resources');



// Get top ancester
function get_top_ancestor_id() {
    //makes sure the $post variable is available to the function
    global $post;

    if ($post-> post_parent) {
        // reverses the order that the array is stored in so that the top most ancestor is the first value [0]
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;
}

// Does page have children?
function has_children() {

    global $post;

    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);

}

// Customize excerpt word count length
function custom_excerpt_length() {
    return 50;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme setup
function learningWordPress_setup() {
  // Navigation Menus
  register_nav_menus(array(
      'primary' => __( 'Primary Menu' ),
      'footer' => __( 'Footer Menu')
  ));

    // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, array('left', 'top'));
}

add_action('after_setup_theme', 'learningWordPress_setup');

<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/assets/styles/slick.css' );
    wp_enqueue_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/assets/styles/slick-theme.css' );
    wp_enqueue_style( 'basic-style', get_stylesheet_directory_uri() . '/assets/styles/basicStyle.css' );
    wp_enqueue_style( 'responsive-style', get_stylesheet_directory_uri() . '/assets/styles/responsiveStyle.css' );
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_script( 'slick_script', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'app_script', get_stylesheet_directory_uri() . '/assets/js/myScript.js', array('jquery'), '1.0.0', true );
    wp_localize_script( 'app_script', 'ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

add_action( 'after_setup_theme', 'tu_remove_dynamic_css' );
function tu_remove_dynamic_css() {
    remove_action( 'wp_enqueue_scripts', 'generate_enqueue_dynamic_css', 50 );
}

function custom_dequeue() {
    wp_dequeue_style('generate-style');
    wp_deregister_style('generate-style');
}
add_action( 'wp_enqueue_scripts', 'custom_dequeue', 9999 );
//add_image_size('feature_thumbnail',370,275, true);
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
add_image_size('large_thumbnail',860,476, true);
add_image_size('medium_thumbnail',600,400, true);
add_image_size('post_thumbnail',400,229, true);
add_image_size('square_thumbnail',252,252, true);
include_once __DIR__. '/post-types/products.php';


if (!function_exists('listProductsCallback')):
    function listProductsCallback($atts)
    {
        $param = shortcode_atts( array(
            'category' => 'products',
            'post_id' => 0,
        ), $atts );

        $args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'post_type' => 'products',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_products',
                    'field' => 'slug',
                    'terms' => $param['category']
                )
            )
        );

        $posts = get_posts($args);
        $html = '';
        $id = !empty($param['post_id']) ? 'id="subNavsp"' : '';
        if (!empty($posts)) {
            $html .= '<ul class="dssp" '.$id.'>';
            foreach ($posts as $post) {
                $class = $param['post_id'] == $post->ID ? 'class="active"' : '';
                $html .= '<li '.$class.' data-tab=".item'.$post->ID.'">';
                    $html .= '<a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">';
                        $html .= get_the_post_thumbnail($post->ID);
                        $html .= '<span>'.$post->post_title.'</span><br>';
                        $html .= '</a>';
                        if($param['post_id'])
                            $html .= '<i class="icon"></i>';
                    $html .= '</li>';
            }
            $html .= '</ul>';
        }
        return $html;
    }
    add_shortcode('list_products', 'listProductsCallback');
endif;

if (!function_exists('listBuildingCallback')):
    function listBuildingCallback($atts)
    {
        $param = shortcode_atts( array(
            'category' => 'builds',
        ), $atts );

        $args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'post_type' => 'products',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_products',
                    'field' => 'slug',
                    'terms' => $param['category']
                )
            )
        );

        $posts = get_posts($args);
        $html = '';
        if (!empty($posts)) {
            $html .= '<div class="dskhachhang ">';
            foreach ($posts as $post) {
                $html .= '<div class="item">';
                $html .= get_the_post_thumbnail($post->ID,'large_thumbnail');
                $html .= '<h3>'.$post->post_title.'</h3>';
                $html .= '<p>'.$post->post_content.'</p>';
                $html .= '</div>';
            }
            $html .= '</div>';
        }
        return $html;
    }
    add_shortcode('list_builds', 'listBuildingCallback');
endif;

if (!function_exists('listBuildingV2Callback')):
    function listBuildingV2Callback($atts)
    {
        $param = shortcode_atts( array(
            'category' => 'builds',
        ), $atts );

        $args = array(
            'posts_per_page' => -1,
            'offset' => 0,
            'post_type' => 'products',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_products',
                    'field' => 'slug',
                    'terms' => $param['category']
                )
            )
        );

        $posts = get_posts($args);
        $html = '';
        if (!empty($posts)) {
            $html .= '<div class="dscongtrinh">';
            foreach ($posts as $key => $post) {
                if($key % 2 == 0 ){
                    $html .= '<div class="item">';
                    $html .= '<div class="dac"></div>';
                    $html .= '<div class="dac dac2"></div>';
                    $html .= '<div class="rong"></div>';
                    $html .= '<div class="wrapper1k2">';
                }
                $html .= '<div class="congtrinh1">';
                $html .= get_the_post_thumbnail($post->ID,'large_thumbnail');
                $html .= '<div class="noidung">';
                $html .= '<h3>'.$post->post_title.'</h3>';
                $html .= '<p>'.$post->post_content.'</p>';
                $html .= '</div>';
                $html .= '<div class="clearDiv"></div>';
                $html .= '</div>';
                if($key % 2 != 0 ){
                    $html .= '</div>';
                    $html .= '</div>';
                }
            }
            $html .= '</div>';
        }
        return $html;
    }
    add_shortcode('list_builds_2', 'listBuildingV2Callback');
endif;
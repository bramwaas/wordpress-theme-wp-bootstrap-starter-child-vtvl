<?php
/**
 * WP Bootstrap Starter Child vtvl extra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 * 2017-07-16 vertaling toegevoegd ook voor parent theme
 */
function wp_bootstrap_starter_child_vtvl_enqueue_styles() {

    $parent_style = 'wp-bootstrap-starter'; // 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_child_vtvl_enqueue_styles' );
function wp_bootstrap_starter_child_vtvl_setup() {
    load_theme_textdomain( 'wp-bootstrap-starter', get_stylesheet_directory() . '/languages/wp-bootstrap-starter' );
    load_child_theme_textdomain( 'wp-bootstrap-starter-child-vtvl', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_child_vtvl_setup' );
?>

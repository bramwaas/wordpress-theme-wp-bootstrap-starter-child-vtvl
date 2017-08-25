<?php
/**
 * WP Bootstrap Starter Child vtvl extra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 * 2017-07-16 vertaling toegevoegd ook voor parent theme
 * 2017-08-25 magnificpopup toegevoegd
 */
/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_starter_child_vtvl_enqueue_styles() {

    $parent_style = 'wp-bootstrap-starter'; // 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'wp-bootstrap-starter-style',  // naam vernaderd, omdat parent onder deze naam 'child-style'.css al ophaalt
		                                     // met wp_enqueue_style( 'wp-bootstrap-starter-style', get_stylesheet_uri() );
		                                     // (later in de lijst trouwens) aan versie is te zien welke gebruikt wordt.
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'magnificpopup-style',
        get_stylesheet_directory_uri() . '/css/magnificpopup.css',
        array( 'wp-bootstrap-starter-style' ),
        wp_get_theme()->get('Version')
    );	
    wp_enqueue_script( 'magnificpopup-script', 
	get_stylesheet_directory_uri() . '/js/MagnificPopupV1-1-a.js',
	array( 'jquery' ), 
	 wp_get_theme()->get('Version'), 
	true );	
   wp_add_inline_script( 'magnificpopup-script', 
			'jQuery(document).ready(function(){
     jQuery(\'a[rel*="lightbox"], a[data-wsmodal], a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]\').each(function(){
        if ($(this).parents(\'.gallery\').length == 0) {
            $(this).magnificPopup({
		type: \'image\'
		, closeMarkup : \'<button title="%title%" type="button" class="mfp-close">&nbsp;</button>\'
                });
            }
        });
     jQuery(\'.gallery\').each(function() {
        $(this).magnificPopup({
            delegate: \'a\',
            type: \'image\',
            gallery: {enabled: true}
            });
        });
   ',
			'after');
	
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_starter_child_vtvl_enqueue_styles' );

function wp_bootstrap_starter_child_vtvl_setup() {
    load_theme_textdomain( 'wp-bootstrap-starter', get_stylesheet_directory() . '/languages/wp-bootstrap-starter' );
    load_child_theme_textdomain( 'wp-bootstrap-starter-child-vtvl', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wp_bootstrap_starter_child_vtvl_setup' );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_starter_child_widgets_init() {
	unregister_sidebar( 'footer-1' );
	unregister_sidebar( 'footer-2' );
	unregister_sidebar( 'footer-3' );

   register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'wp-bootstrap-starter' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'wp-bootstrap-starter' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wp_bootstrap_starter_child_widgets_init', 11 );


?>

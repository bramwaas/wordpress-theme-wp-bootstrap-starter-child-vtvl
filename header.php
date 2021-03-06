<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 * BW 2017-07-01: Condition is_home removed from page-subheader.
 * 20170807 baseurl toegevoegd.
 * 20171013 Link naar home op header image
 * 20171030 nav classes aangepast ivm update parent theme 2.5.4 Upgrade the bootstrap 4 alpha to bootstrap 4 beta
 * en css daarin (oude classes nog niet verwijderd):
 *  navbar-toggleable-md   => navbar-expand-md 
 *  nieuw aanvulling op navbar-light; bg-light
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?php echo (home_url('/')); ?>" />	
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-toggleable-md navbar-light bg-light">

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a title="<?php esc_html_e( 'Home', 'wp-bootstrap-starter' ); ?>" href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo get_theme_mod( 'wp_bootstrap_starter_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a title="<?php esc_html_e( 'Home', 'wp-bootstrap-starter' ); ?>" class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <?php
                wp_nav_menu([
                    'theme_location'    => 'primary',
                    'container'       => 'div',
                    'container_id'    => '',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                ]);
                ?>

            </nav>
        </div>
	</header><!-- #masthead -->
    <div id="page-sub-header" class="content-area col-sm-12 col-md-12 col-lg-12 col-12">
        <div class="container">
	<?php if(has_header_image() ): ?>
			<a title="<?php esc_html_e( 'Home', 'wp-bootstrap-starter' ); ?>" href="<?php echo esc_url( home_url( '/' )); ?>">
            <img id="page-sub-header-img" src="<?php echo header_image(); ?>" alt="<?php esc_url(bloginfo('name')); ?>"  class="img-fluid">
			</a>
        <?php else : ?>
            <h1><?php esc_url(bloginfo('name')); ?></h1>
            <p><?php bloginfo( 'description'); ?></p>
	<?php endif; ?>
        </div>
    </div><!-- #page-sub-header -->
 	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <?php endif; ?>

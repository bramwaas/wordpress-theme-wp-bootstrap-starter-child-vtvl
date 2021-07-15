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
 * 20210715 aantal dingen overgenomen uit standaard en login poppetje fa
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<base href="<?php echo (home_url('/')); ?>" />	
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-toggleable-md navbar-light bg-light">

                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a title="<?php esc_html_e( 'Home', 'wp-bootstrap-starter' ); ?>" href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo get_theme_mod( 'wp_bootstrap_starter_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a title="<?php esc_html_e( 'Home', 'wp-bootstrap-starter' ); ?>" class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler  ml-auto" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu([
                    'theme_location'    => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                ]);
                ?>
                <div class="navbar-item"  label="Login logout">
					<?php
					global $wp;
					$redirect_url = add_query_arg( $wp->query_vars, home_url( $wp->request ) );
					if (is_user_logged_in()){
                    	echo '<a class="nav-link" href="', wp_logout_url($redirect_url), '"  title="', esc_attr_e('Logout', 'default' ), '" rel="home">'; 
                        echo '<i class="fas fa-user"></i>';
                    	echo '</a>';
			        } else {
                    	echo '<a class="nav-link" href="', wp_login_url($redirect_url), '" title="', esc_attr_e('Login', 'default' ), '" rel="home">'; 
                        echo '<i class="far fa-user"></i>';
                    	echo '</a>';
					} 
					?>
                </div>

            </nav>
        </div>
	</header><!-- #masthead -->
	<!-- ?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ? -->
    <div id="page-sub-header" class="content-area col-sm-12 col-md-12 col-lg-12 col-12">
        <div class="container">
	<?php if(has_header_image() ): ?>
			<a title="<?php esc_html_e( 'Home', 'wp-bootstrap-starter' ); ?>" href="<?php echo esc_url( home_url( '/' )); ?>">
            <img id="page-sub-header-img" src="<?php echo header_image(); ?>" alt="<?php esc_url(bloginfo('name')); ?>"  class="img-fluid">
			</a>
        <?php else : ?>
            <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_title_setting' ) );
                    }else{
                        echo 'WordPress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_tagline_setting' ) );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                    }
                    ?>
                </p>
	<?php endif; ?>
        </div>
    </div><!-- #page-sub-header -->
	<!-- ?php endif; ? (is_front_page) -->
 	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <?php endif; ?>

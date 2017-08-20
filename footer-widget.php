<?php

if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) {?>
        <div id="footer-widget">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                        <div class="col-md-4"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                    <?php endif; ?>
           <div class="site-info col-md-4">
		<div class="widget"><p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p></div>
                    <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    <?php endif; ?>
            </div><!-- close .site-info -->
                   <?php if ( is_active_sidebar( 'footer-3' )) : ?>
                        <div class="col-md-4"><?php dynamic_sidebar( 'footer-3' ); ?></div>
                    <?php endif; ?>
                </div>
        </div>

<?php } else {?>
           <div class="site-info">
		<p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y');?></p>
            </div><!-- close .site-info -->
<?php } 


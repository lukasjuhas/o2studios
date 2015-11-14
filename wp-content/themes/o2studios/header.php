<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <link rel="dns-prefetch" href="//google-analytics.com">
        <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
        <?php wp_head(); ?>
        <!--[if lt IE 10]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
        <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
        <![endif]-->
    </head>
    <body <?php body_class(); ?>>
      <div class="wrapper">
        <header class="header" role="banner">
            <div class="container">
                <div class="header__graphic"></div>
                <div class="site-branding">
    								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
    						        <?php if( is_front_page() ) : ?><h1><?php endif; ?>
		                        <img src="<?php echo bloginfo('template_directory'); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" />
					               <?php if( is_front_page() ) : ?></h1><?php endif; ?>
				             </a>
                 </div>

                 <div class="mobile-links">
                     <?php if ( is_active_sidebar( 'header_widget_area' ) ) : ?>
                        <div class="social">
                            <?php dynamic_sidebar( 'header_widget_area' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="languages">
                        <ul>
                            <li><a href="<?php bloginfo('url'); ?>/deutsch/" class="de">Deutsch</a></li>
                            <li><a href="<?php bloginfo('url'); ?>" class="en">English</a></li>
                        </ul>
                    </div>
                </div>

                 <a class="menu-toggle" href="#">
                    <span class="layer-top"></span>
                    <span class="layer-middle"></span>
                    <span class="layer-bottom"></span>
                  </a>
                  <nav class="nav nav--main main-nav">
                   <?php wp_nav_menu( array( 'theme_location' => 'header' ) ); ?>
                 </nav>
            </div>
        </header>

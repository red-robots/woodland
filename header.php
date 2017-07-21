<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <?php $active = get_field("popup_active","option");
    if(strcmp($active,"yes")===0):?>
        <div class="hidden-popup">
            <?php $popup_header = get_field("popup_header","option");
            $popup_text = get_field("popup_text","option");?>
            <div id="header-popup">
                <?php if($popup_header):?>
                    <header><h2><?php echo $popup_header;?></h2></header>
                <?php endif;
                if($popup_text):?>
                    <div class="copy">
                        <?php echo $popup_text;?>
                    </div><!--.copy-->
                <?php endif;?>
            </div><!--#header-popup-->
        </div><!--.hidden-popup-->
    <?php endif;?>
    <header id="masthead" class="site-header" role="banner">
        <div class="row-1">
            <div class="col-1">
				<?php if ( is_home() ) { ?>
                    <h1 class="logo">
                        <a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png"; ?>" alt="<?php bloginfo("name");?>"></a>
                    </h1>
				<?php } else { ?>
                    <div class="logo">
                        <a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png"; ?>" alt="<?php bloginfo("name");?>"></a>
                    </div>
				<?php } ?>
            </div><!--.col-1-->
            <div class="col-2">
                <div class="row-1">
					<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_id' => 'header-menu' ) ); ?>
                    <div class="search">
                        <i class="fa fa-search"></i>
                    </div><!--.search-->
                    <?php $facebook = get_field( "facebook_link", "option" );?>
                    <?php if ( $facebook ): ?>
                        <a class="facebook" href="<?php echo $facebook; ?>" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                    <?php endif; ?>
                </div><!--.row-1-->
                <div class="row-2">
					<?php get_template_part( "template-parts/search", "form" ); ?>
                </div><!--.row-2-->
            </div><!--.col-2-->
        </div><!--.row-1-->
        <div class="row-2">
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e( 'Menu', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav><!-- #site-navigation -->
        </div><!--.row-2-->
    </header><!-- #masthead -->

    <div id="content" class="site-content wrapper">

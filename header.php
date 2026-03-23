<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="header-container">
        <div class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <span class="logo-icon"><img class="custom-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo"></span>
            </a>
        </div>
        
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'nav-list',
            ) );
            ?>
        </nav>
    </div>
</header>
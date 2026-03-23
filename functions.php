<?php
/**
 * Mosser Construction Theme Functions
 */

// 1. ASSETS (CSS & JS)
function mosser_theme_assets() {
    wp_enqueue_style( 'mosser-style', get_stylesheet_uri() );

    $js_path = get_template_directory() . '/js/main.js';
    $version = file_exists($js_path) ? filemtime($js_path) : '1.0.0';

    wp_enqueue_script('mosser-main-js', get_template_directory_uri() . '/js/main.js', array(), $version, true);
}
add_action('wp_enqueue_scripts', 'mosser_theme_assets');

// 2. THEME SETUP (Menus & Titles)
function mosser_theme_setup() {
    add_theme_support( 'title-tag' );
    register_nav_menus( array(
        'primary-menu' => __( 'Primary Menu', 'mosser' ),
    ) );
}
add_action( 'after_setup_theme', 'mosser_theme_setup' );

// 3. ADMIN CUSTOMIZATION (Hide Editor)
function mosser_hide_gutenberg_editor() {
    remove_post_type_support( 'page', 'editor' );
}
add_action( 'init', 'mosser_hide_gutenberg_editor' );

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');
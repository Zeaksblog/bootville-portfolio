<?php

// Enqueue stylesheets. Bootswatch style first, then parent then child
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
	//wp_enqueue_style( 'bootswatch-style', get_stylesheet_directory_uri() . '/css/cosmo.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style')  );
}


// load scripts
function bootville_portfolio_scripts() {
 		wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '2.0.1', true );
 		wp_enqueue_script( 'isotope-main-js', get_stylesheet_directory_uri() . '/js/isotope-main.js', array('jquery'), '1.0.0', true );
 		wp_enqueue_script( 'imagesloaded-js', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '3.1.8', true );
}
add_action( 'wp_enqueue_scripts', 'bootville_portfolio_scripts' );


/**
 * Custom Post Types
 */
require get_stylesheet_directory() . '/inc/post-types/CPT.php';

//Portfolio Custom Post Type
require get_stylesheet_directory() . '/inc/post-types/register-portfolio.php';
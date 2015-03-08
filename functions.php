<?php

/**
*	Use latest jQuery release
*/
if( !is_admin() ){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://code.jquery.com/jquery-latest.min.js"), false, '');
	wp_enqueue_script('jquery');
}


add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
	wp_enqueue_style( 'custom-bootstrap', get_stylesheet_directory_uri() . '/css/cosmo.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style')  );
}


//Import parent styles add other stylesheets if necessary.
// function wpchildthemes12122_enqueue_parent_styles() {
	// wp_enqueue_style( 'custom-bootstrap', get_template_directory_uri() . '/css/cerulean.min.css', array(), '1.0.0', 'all' );
	// wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
// }

// add_action( 'wp_enqueue_scripts', 'wpchildthemes12122_enqueue_parent_styles' );


/* ======[ Change default thumbnail size ]====== */
function tto_twentytwelve_setup() {
	add_image_size( 'grid-thumbnail', 350, 225, true ); // Grid Thumbnails
}
add_action( 'after_setup_theme', 'tto_twentytwelve_setup', 11 );

	set_post_thumbnail_size( 825, 510, true );

// load scripts
function bootville_portfolio_scripts() {

 		wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '2.0.1', true );
 		wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
		//wp_enqueue_script( 'roll-js', get_stylesheet_directory_uri() . '/js/roll.js', array('jquery'), '1.0.0', true );
 		wp_enqueue_script( 'imagesloaded-js', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '3.1.8', true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
}
add_action( 'wp_enqueue_scripts', 'bootville_portfolio_scripts' );


// trim excerpt for grid page
function custom_excerpt_length( $length ) {
        return 20;
    }
 add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	


/**
 * Custom Post Types
 */
require get_stylesheet_directory() . '/inc/post-types/CPT.php';

//Portfolio Custom Post Type
require get_stylesheet_directory() . '/inc/post-types/register-portfolio.php';
<?php

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


function property_scripts(){
	// if( is_home() || is_front_page() ) {
	  	wp_enqueue_script( 'jssor', get_stylesheet_directory_uri() . '/inc/js/jssor.js', array('jquery'), '2.2.2', true );
	  	wp_enqueue_script( 'jssor.slider', get_stylesheet_directory_uri() . '/inc/js/jssor.slider.js', array('jquery'), '2.2.2', true );
	  	wp_enqueue_script( 'default', get_stylesheet_directory_uri() . '/inc/js/default.js', array('jquery'), '2.2.2', true );
	// }
}


add_action( 'wp_enqueue_scripts', 'property_scripts' );

?>
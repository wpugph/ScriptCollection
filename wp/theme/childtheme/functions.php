<?php

function my_theme_enqueue_styles() {

	$parent_style = 'bootstrapfast-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/sass/themestyle.css' );
	wp_enqueue_style( 'child-style',
	    get_stylesheet_directory_uri() . '/css/child-style.css',
	    array( $parent_style ),
	    wp_get_theme()->get( 'Version' )
	);

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>

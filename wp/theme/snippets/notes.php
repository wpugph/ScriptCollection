<?php

//template naming convention for custom post tidy_parse_string
archive-{post_type}.php
single-{post_type}.php

// Add post formats to a cpt, used in child theme
add_action('after_setup_theme', 'my_theme_slug_add_post_formats_to_page', 11);

function my_theme_slug_add_post_formats_to_page(){

	add_theme_support( 'post-formats', array( 'gallery' ) );

	add_post_type_support( 'page', 'post-formats' );
	register_taxonomy_for_object_type( 'post_format', 'page' );

	add_post_type_support( 'project', 'post-formats' );
	register_taxonomy_for_object_type( 'post_format', 'project' );
}

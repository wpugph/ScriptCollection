<?php
function add_async_attribute($tag, $handle) {
    $scripts_to_async = array(
	   'footerjs',
   );

   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' async="async" src', $tag);
      }
   }
   return $tag;
}

function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array(
	   'jquery',
	   'jquery-core',
	   'jquery-migrate',
   );

   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}

function wpdocs_dequeue_script() {
	if ( is_front_page() ) {

		wp_scripts()->add_data( 'jquery', 'group', 1 );
		wp_scripts()->add_data( 'jquery-core', 'group', 1 );
		wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

		wp_dequeue_script( 'jquery' );
		wp_dequeue_script( 'jquery-core' );
		wp_dequeue_script( 'jquery-migrate' );

		wp_dequeue_script( 'modernizr' );
		wp_dequeue_script( 'flexslider' );
		wp_dequeue_script( 'front-slider' );
		wp_dequeue_script( 'mainjs' );

		wp_enqueue_script( 'footerjs', get_template_directory_uri() . '/opt/optfooter.min.js', array(), '20170101', true );

		wp_dequeue_script( 'contact-form-7' );
		wp_deregister_script( 'contact-form-7' );

		wp_dequeue_script( 'google-maps' );
		wp_deregister_script( 'google-maps' );

		wp_dequeue_script( 'jquery-form' );
		wp_deregister_script( 'jquery-form' );

		wp_dequeue_script( 'jquery-ui' );
		wp_deregister_script( 'jquery-ui' );

		wp_dequeue_script( 'jquery-ui-mouse' );
		wp_deregister_script( 'jquery-ui-mouse' );

		wp_dequeue_script( 'jquery-ui-sortable' );
		wp_deregister_script( 'jquery-ui-sortable' );

		wp_dequeue_script( 'jquery-ui-widget' );
		wp_deregister_script( 'jquery-ui-widget' );

		wp_dequeue_script( 'skroller' );
		wp_deregister_script( 'skroller' );

		wp_dequeue_script( 'touchjs' );
		wp_deregister_script( 'touchjs' );

		wp_dequeue_style( 'contact-form-7' );
		wp_deregister_style( 'contact-form-7' );

		wp_dequeue_style( 'open-sans' );
		wp_deregister_style( 'open-sans' );

		wp_deregister_script( 'wp-embed' );

		add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
		add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
	}

}
 add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_script', 110 );

function load_styles_in_footer() {
	wp_enqueue_style('google-fontsmain', '//fonts.googleapis.com/css?family=Cinzel:400,700|Droid+Sans:700|Josefin+Sans:400,600,700|Playball:400|Reenie+Beanie:400');
	wp_enqueue_style( 'jquerycss', get_template_directory_uri() . '/css/jquery-ui.min.css' );
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'flexcss', get_template_directory_uri() . '/css/flexslider.css' );
	if ( is_front_page() ) {

		wp_deregister_style('jquerycss');
		wp_dequeue_style('jquerycss');

		wp_deregister_style('main-style');
		wp_dequeue_style('main-style');

		wp_dequeue_style('flexcss');
		wp_deregister_style('flexcss');

		wp_dequeue_style('google-fontsmain');

//		wp_enqueue_style( 'optcss', get_template_directory_uri() . '/styleopt.min.css' );
		wp_enqueue_style( 'optcss', get_template_directory_uri() . '/style.css' );

	}

}
add_action( 'get_footer', 'load_styles_in_footer', 120 );

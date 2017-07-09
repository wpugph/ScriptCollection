<?php

 if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) {
	 echo 'your ga here then inser to action';
 }
 

function wpsanitize() {
	if ( is_front_page() ) {

// 		wp_dequeue_script( 'jquery' );
// wp_dequeue_script( 'jquery-core' );
// wp_dequeue_script( 'jquery-migrate' );

		// wp_scripts()->add_data( 'jquery', 'group', 1 );
		// wp_scripts()->add_data( 'jquery-core', 'group', 1 );
		// wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );


		wp_dequeue_style( 'OpenSans' );
		wp_dequeue_style( 'Montserrat' );
		wp_dequeue_style( 'contact-form-7' );
		wp_dequeue_style( 'ls-google-fonts' );
		wp_dequeue_style( 'layerslider-front' );
		wp_dequeue_style( 'wp-pagenavi' );
		wp_dequeue_style( 'wprmenu-font' );

		wp_dequeue_style( 'fontawesome' );
		wp_dequeue_style( 'bootstrap' );


		wp_dequeue_style( 'mg-custom-css' );
		wp_dequeue_style( 'layerslider' );
		wp_dequeue_style( 'wprmenu.css' );
		wp_dequeue_style( 'mla-style' );


		wp_dequeue_script( 'mla-navigation' );
		wp_deregister_script( 'mla-navigation' );
		wp_dequeue_script( 'contact-form-7' );
		wp_deregister_script( 'contact-form-7' );
		wp_dequeue_script( 'theme-js' );
		wp_deregister_script( 'theme-js' );
		wp_dequeue_script( 'mla-skip-link-focus-fix' );
		wp_deregister_script( 'mla-skip-link-focus-fix' );
		wp_dequeue_script( 'wp-embed' );
		wp_deregister_script( 'wp-embed' );


		wp_dequeue_script( 'greensock' );
		// wp_deregister_script( 'greensock' );
		wp_dequeue_script( 'layerslider' );
		// wp_deregister_script( 'layerslider' );
		wp_dequeue_script( 'layerslider-transitions' );
		// wp_deregister_script( 'layerslider-transitions' );

		wp_dequeue_script( 'jquery.transit' );
	//	wp_deregister_script( 'jquery.transit' );
		wp_dequeue_script( 'wprmenu.js' );
	//	wp_deregister_script( 'wprmenu.js' );
		wp_dequeue_script( 'sidr' );
	//	wp_deregister_script( 'sidr' );


	// wp_enqueue_script( 'jshead', get_template_directory_uri() . '/js/jshead.js', array(), '20170101', false );

//	add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
	add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

	}
}
 add_action( 'wp_enqueue_scripts', 'wpsanitize', 110 );



function footloose() {
	if ( is_front_page() ) {

wp_dequeue_style( 'gg-custom-css' );
//		wp_enqueue_style( 'gfonts', '//fonts.googleapis.com/css?family=Montserrat|Open+Sans');
	wp_enqueue_style( 'gfonts', '//fonts.googleapis.com/css?family=Montserrat');
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

//	wp_enqueue_style( 'mainstyle', get_template_directory_uri() . '/styles.css' );
//	wp_enqueue_style( 'mainstyle', get_template_directory_uri() . '/styled.css' );

wp_enqueue_script( 'greensock' );
wp_enqueue_script( 'layerslider' );
wp_enqueue_script( 'layerslider-transitions' );

wp_enqueue_script( 'jquery.transit' );
wp_enqueue_script( 'wprmenu.js' );
wp_enqueue_script( 'sidr' );

//	wp_enqueue_script( 'jsfoot', get_template_directory_uri() . '/js/jsfoot.js', array('jquery'), '201701', true );

	add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

	}
}
add_action( 'get_footer', 'footloose', 120 );

function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array(
	//    'jquery',
	//    'jquery-core',
	//    'jquery-migrate',

	   'jshead',
	   'jsfoot',

	   'mgom-overlays-js',
	   'mg-frontend-js',

	   'wprmenu.js',
	   'jquery.transit',
	   'sidr',

	    'greensock',
	    'layerslider',
    	'layerslider-transitions',

   );

   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}

function lazyboyz() {
	if ( is_front_page() ) { ?>
		<noscript id="deferred-styles">
	      <link rel="stylesheet" type="text/css" href="http://www.mlawebdesigns.co.uk/wp-content/themes/mla/styles.css"/>
	    </noscript>
	    <script>
	      var loadDeferredStyles = function() {
	        var addStylesNode = document.getElementById("deferred-styles");
	        var replacement = document.createElement("div");
	        replacement.innerHTML = addStylesNode.textContent;
	        document.body.appendChild(replacement)
	        addStylesNode.parentElement.removeChild(addStylesNode);
	      };
	      var raf = requestAnimationFrame || mozRequestAnimationFrame ||
	          webkitRequestAnimationFrame || msRequestAnimationFrame;
	      if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
	      else window.addEventListener('load', loadDeferredStyles);
	    </script> <?php
	}
}
add_action( 'wp_footer', 'lazyboyz', 200 );

?>

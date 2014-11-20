<?php

function weblizar_scripts() {
	wp_enqueue_style ( 'enigma-style', get_stylesheet_uri () );
	wp_enqueue_style ( 'bootstrap', WL_TEMPLATE_DIR_URI . '/css/bootstrap.css' );
	wp_enqueue_style ( 'default', WL_TEMPLATE_DIR_URI . '/css/default.css' );
	wp_enqueue_style ( 'enigma-theme', WL_TEMPLATE_DIR_URI . '/css/enigma-theme.css' );
	wp_enqueue_style ( 'media-responsive', WL_TEMPLATE_DIR_URI . '/css/media-responsive.css' );
	wp_enqueue_style ( 'animations', WL_TEMPLATE_DIR_URI . '/css/animations.css' );
	wp_enqueue_style ( 'theme-animtae', WL_TEMPLATE_DIR_URI . '/css/theme-animtae.css' );
	wp_enqueue_style ( 'font-awesome', WL_TEMPLATE_DIR_URI . '/css/font-awesome-4.2.0/css/font-awesome.min.css' );
	wp_enqueue_style ( 'OpenSansRegular', '/fonts/font.css?family=Open+Sans' );
	wp_enqueue_style ( 'OpenSansBold', '/fonts/font.css?family=Open+Sans:700' );
	wp_enqueue_style ( 'OpenSansSemiBold', '/fonts/font.css?family=Open+Sans:600' );
	wp_enqueue_style ( 'RobotoRegular', '/fonts/font.css?family=Roboto' );
 	wp_enqueue_style ( 'RobotoBold', '/fonts/font.css?family=Roboto:700' );
 	wp_enqueue_style ( 'RalewaySemiBold', '/fonts/font.css?family=Raleway:600' );
 	wp_enqueue_style ( 'Courgette', '/fonts/font.css?family=Courgette' );
	
	// Js
	wp_enqueue_script ( 'menu', WL_TEMPLATE_DIR_URI . '/js/menu.js', array (
			'jquery' 
	) );
	wp_enqueue_script ( 'bootstrap-min-js', WL_TEMPLATE_DIR_URI . '/js/bootstrap.min.js' );
	wp_enqueue_script ( 'enigma-theme-script', WL_TEMPLATE_DIR_URI . '/js/enigma_theme_script.js' );
	if (is_front_page ()) {
		/* Carofredsul Slides */
		wp_enqueue_script ( 'jquery.carouFredSel', WL_TEMPLATE_DIR_URI . '/js/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js' );
		wp_enqueue_script ( 'carouFredSel-element', WL_TEMPLATE_DIR_URI . '/js/carouFredSel-6.2.1/caroufredsel-element.js' );
		/* PhotoBox JS */
		wp_enqueue_script ( 'photobox-js', WL_TEMPLATE_DIR_URI . '/js/jquery.photobox.js' );
		wp_enqueue_style ( 'photobox', WL_TEMPLATE_DIR_URI . '/css/photobox.css' );
		// Footer JS//
		wp_enqueue_script ( 'enigma-footer-script', WL_TEMPLATE_DIR_URI . '/js/enigma-footer-script.js', '', '', true );
		wp_enqueue_script ( 'waypoints.min', WL_TEMPLATE_DIR_URI . '/js/waypoints.min.js', '', '', true );
		wp_enqueue_script ( 'scroll', WL_TEMPLATE_DIR_URI . '/js/scroll.js', '', '', true );
	}
	if (is_singular ())
		wp_enqueue_script ( "comment-reply" );
}
add_action ( 'wp_enqueue_scripts', 'weblizar_scripts' );
?>
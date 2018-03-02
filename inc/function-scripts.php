<?php
function nkSpartaScripts() {
	// Dodavanje skripti
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array( ), '1.0.0.', true );

	// Dodavanje style-a
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all' );
}
add_action('wp_enqueue_scripts', 'nkSpartaScripts');


?>
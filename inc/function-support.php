<?php 
// Theme support -- Dodavanje sadrzaja koje ce tema podrzavati
if (! function_exists('nkSpartaSupport')):
	function nkSpartaSupport() {
		add_theme_support( 'post-thumbnails' ); 
		add_theme_support('post-formats', array(
																		'aside',
																		'gallery',
																		'quote',
																		'image',
																		'video'
		));
	}
endif;
add_action('after_setup_theme', 'nkSpartaSupport');
?>
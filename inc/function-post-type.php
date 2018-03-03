<?php 
// Registracija post type
function postTypeIgraci() {
	register_post_type( 'igraci', array( 
		                          	'public' => true,
		                          	'labels' => array(
		                          		'name' => __('Igraci'),
		                          		'singular_name' => __('Igrac'),
		                          		'add_new_item' => __('Add new Igrac')          
		                          	),
		                          	'has_archive' => false,
		                          	'menu_icon' => get_template_directory_uri() . '/img/dashicon/igraci.png',
		                          	'rewrite' => array('slug', 'igraci'),
		                          	'supports' => array('excerpt', 'title', 'thumbnail', 'editor', 'custom-fields')	                          	
	));
}
add_action('init', 'postTypeIgraci', 1);

// Registracija taksonomije
function nkSpartaTaksonomija() {
	// Selekcije
	register_taxonomy( 'selekcija', array('igraci'), array(
																	'hierarchical' => true,
																	'show_ui' => true,
																	'show_admin_column' => true,
																	'query_var' => true,
																	'rewrite' => array('slug', 'selekcija'),
																	'labels' => array(
																		'name' => __('Selekcije'),
																		'singular_name' => __('Selekcija')
																	),

	));
	register_taxonomy( 'pozicija', array('igraci'), array( 
																									'hierarchical' => true,
																									'show_ui' => true,
																									'show_admin_column' => true,
																									'query_var' => true,
																									'rewrite' => array('slug', 'pozicija'),
																									'labels' => array(
																										'name' => __('Pozicije'),
																										'singular_name' => __('Pozicija')
																									),
  ));
}
add_action('init', 'nkSpartaTaksonomija');



 ?>


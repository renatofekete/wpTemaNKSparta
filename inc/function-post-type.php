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

function igraciMetabox() {
	// Metabox koji ce sadrzavati polja za ispunjavanje
	add_meta_box( 'nkSpartaIgraciMetabox', 'Informacije o igracu', 'igraciMetaboxCallback', 'igraci', 'normal', 'high');
}
add_action('add_meta_boxes', 'igraciMetabox');


// Polja za metabox
function igraciMetaboxCallback( $post ) {
	// Za zastitu
	wp_nonce_field( basename( __FILE__ ), 'igraciMetabox_nonce' );
	$igraciMetaboxMeta = get_post_meta( $post->ID );
	// Ime igraca
	$imeValue = esc_attr($igraciMetaboxMeta['imeIgraca'][0]);
	$prezimeValue = esc_attr($igraciMetaboxMeta['prezimeIgraca'][0]);

	echo '<div class="igrac-metabox"><label for="imeIgraca">Ime: </label> <input type="text" name="imeIgraca" id="imeIgraca" class="regular-text" value="'. $imeValue .'"/></div>';
	// Prezime
	echo '<div class="igrac-metabox"><label for="prezimeIgraca">Prezime: </label> <input type="text" name="prezimeIgraca" id="prezimeIgraca" class="regular-text" value="'. $prezimeValue .'" /></div>';
	// Datum rodenja
	echo '<div class="igrac-metabox"><label for="datumRodenjaIgraca">Datum rodenja: </label> <input type="date" name="datumRodenjaIgraca" id="datumRodenjaIgraca" value="" /></div>';	
}

function igraciMetaboxSave( $post_id ) {
	// Vudu magija

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['igraciMetabox_nonce'] ) && wp_verify_nonce( $_POST['igraciMetabox_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if ( $is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}

	if ( isset($_POST['imeIgraca'] ) ) {
		update_post_meta( $post_id, 'imeIgraca', sanitize_text_field( $_POST['imeIgraca']));
	}
	if ( isset($_POST['prezimeIgraca'] ) ) {
		update_post_meta( $post_id, 'prezimeIgraca', sanitize_text_field( $_POST['prezimeIgraca']));
	}
}
add_action('save_post', 'igraciMetaboxSave' )



 ?>


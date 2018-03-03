<?php 
function nkSpartaAdminPage() {
	// Dodavanje glavnog admin page
	add_menu_page( 'NK Sparta Options', 'NK Sparta', 'manage_options', 'nksparta_admin_page', 'nkSpartaMainAdminPage', get_template_directory_uri() . '/img/dashicon/dashicon.png', 58 );
	// Dodavanje podmenua
	add_submenu_page( 'nksparta_admin_page', 'NK Sparta Options', 'General', 'manage_options', 'nksparta_admin_page', 'nkSpartaMainAdminPage' );
	add_submenu_page( 'nksparta_admin_page', 'NK Sparta Style', 'Style', 'manage_options', 'nksparta_admin_style', 'nkSpartaMainAdminStyle' );
	// Dodavanje sadrzaja na menu stranice
	add_action( 'admin_init', 'nkSpartaMainAdminPageSettings');
}
add_action('admin_menu' , 'nkSpartaAdminPage');


// Izgled i sadrzaj naslova admin page-a
function nkSpartaMainAdminPage() {
	require_once(get_template_directory() . '/inc/templates/admin-general.php');
}
function nkSpartaMainAdminStyle() {
	require_once(get_template_directory() . '/inc/templates/admin-style.php');	
}

// Sadrzaj admin pagea
function nkSpartaMainAdminPageSettings() {
	// registracija polja za bazu podataka
	register_setting('nkSpartaOpcenito', 'puno_ime_kluba');
	register_setting('nkSpartaOpcenito', 'skraceno_ime_kluba');
	register_setting('nkSpartaOpcenito', 'grad');
	register_setting('nkSpartaOpcenito', 'postanski_broj');
	register_setting('nkSpartaOpcenito', 'ulica' );
	register_setting('nkSpartaOpcenito', 'kucni_broj');
	register_setting('nkSpartaOpcenito', 'oib');
	register_setting('nkSpartaOpcenito', 'telefonski_broj');
	register_setting('nkSpartaOpcenito', 'email');

	// Grupacija polja
	add_settings_section('nkSparta-opcenito', 'Opcenite Informacije', 'nkSpartaOpceniteInfo', 'nksparta_admin_page' );
	add_settings_section('nkSparta-kontakt', 'Kontakt Informacije', 'nkSpartaKontaktInfo', 'nksparta_admin_page' );

	// Posebno polje
		//Opcenito
	add_settings_field('nkSpartaPunoImeKluba', 'Puno ime kluba', 'nkSpartaPunoIme', 'nksparta_admin_page', 'nkSparta-opcenito');
	add_settings_field('nkSpartaSkracenoImeKluba', 'Skraceno ime kluba', 'nkSpartaSkracenoIme', 'nksparta_admin_page', 'nkSparta-opcenito');
	add_settings_field('nkSpartaGrad', 'Grad', 'nkSpartaImeGrada', 'nksparta_admin_page', 'nkSparta-opcenito');
	add_settings_field('nkSpartaPostanskiBroj', 'Postanski broj', 'nkSpartaPostBroj', 'nksparta_admin_page', 'nkSparta-opcenito');
	add_settings_field('nkSpartaUlica', 'Ulica', 'nkSpartaUlica', 'nksparta_admin_page', 'nkSparta-opcenito');
	add_settings_field('nkSpartaKucniBroj', 'Kucni broj', 'nkSpartaKucniBroj', 'nksparta_admin_page', 'nkSparta-opcenito');
	add_settings_field('nkSpartaOib', 'OIB', 'nkSpartaOib', 'nksparta_admin_page', 'nkSparta-opcenito');
		//Kontakt
	add_settings_field('nkSpartaKontaktTelefon', 'Broj Telefona', 'nkSpartaKontaktTelefon', 'nksparta_admin_page', 'nkSparta-kontakt');
	add_settings_field('nkSpartaEmail', 'Email', 'nkSpartaEmail', 'nksparta_admin_page','nkSparta-kontakt');

}
// Sadrzaj grupe polja
function nkSpartaOpceniteInfo() {
	// Provjeriti sto tu ide
}
function nkSpartaKontaktInfo() {

}

// Sadrzaj individualnog polja 
function nkSpartaPunoIme() {
	$punoImeKluba = esc_attr(get_option('puno_ime_kluba'));
	echo '<input type="text" name="puno_ime_kluba" value="'.$punoImeKluba.'" placeholder="Puno Ime Kluba" class="regular-text"></input>';
}
function nkSpartaSkracenoIme() {
	$skracenoImeKluba = esc_attr( get_option('skraceno_ime_kluba'));
	echo '<input type="text" name="skraceno_ime_kluba" value="'.$skracenoImeKluba.'" placeholder="Skraceno Ime Kluba" class="regular-text"></input>';
}
function nkSpartaImeGrada() {
	$imeGrada = esc_attr(get_option('grad'));
	echo '<input type="text" name="grad" value="'.$imeGrada.'" placeholder="Grad" class="regular-text"></input>';
}
function nkSpartaPostBroj() {
	$postanskiBroj = esc_attr(get_option('postanski_broj'));
	echo '<input type="text" name="postanski_broj" value="'.$postanskiBroj.'" placeholder="Postanski broj" class="regular-text"></input>';
}
function nkSpartaUlica() {
	$ulica = esc_attr(get_option('ulica'));
	echo '<input type="text" name="ulica" value="'.$ulica.'" placeholder="Ulica" class="regular-text"></input>';
}
function nkSpartaKucniBroj() {
	$kucniBroj = esc_attr( get_option('kucni_broj') );
	echo '<input type="text" name="kucni_broj" value="'.$kucniBroj.'" placeholder="Kucni broj" class="regular-text"></input>';
}
function nkSpartaOib() {
	$oib = esc_attr( get_option('oib') );
	echo '<input type="text" name="oib" value="'.$oib.'" placeholder="OIB" class="regular-text"></input>';
}
// Kontakt
function nkSpartaKontaktTelefon() {
	$brojTelefona = esc_attr(get_option('telefonski_broj'));
	echo '<input type="text" name="telefonski_broj" value="'.$brojTelefona.'" placeholder="Broj Telefona" class="regular-text"></input>';
}
function nkSpartaEmail() {
	$email = esc_attr(get_option('email'));
		echo '<input type="text" name="email" value="'.$email.'" placeholder="Email" class="regular-text"></input>';

}















?>
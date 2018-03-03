<h1>NK Sparta Postavke</h1>
<?php settings_errors(); ?>
<form method="POST" action="options.php">
	<!-- renderiranje wp inputa -->
	<?php settings_fields('nkSpartaOpcenito'); ?>
	<?php do_settings_sections('nksparta_admin_page'); ?>
	<?php submit_button(); ?>
</form>
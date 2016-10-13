<?php
function tempera_child_styles() {
wp_deregister_style( 'tempera-style');
wp_register_style('tempera-style', get_template_directory_uri(). '/style.css');
wp_enqueue_style('tempera-style', get_template_directory_uri(). '/style.css');
wp_enqueue_style( 'childtheme-style', get_stylesheet_directory_uri().'/style.css', array('tempera-style') );
}
add_action( 'wp_enqueue_scripts', 'tempera_child_styles' );

/**
 * Site info
 */
function tempera_site_info_new() {
	$temperas = tempera_get_theme_options();
	foreach ($temperas as $key => $value) { ${"$key"} = $value ; }	?>
	<?php
} // tempera_site_info()
 
function child_remove_theme_siteinfo() {
  // remove old function from the 'wp_footer' hook
  remove_action('cryout_footer_hook','tempera_site_info',99);
  // add our own function to the 'wp_footer' hook
  add_action('cryout_footer_hook','tempera_site_info_new');
}
 
add_action('init','child_remove_theme_siteinfo');
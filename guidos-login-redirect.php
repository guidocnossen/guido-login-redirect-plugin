<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/guido-cnossen-2110a3170/
 * @since             1.0.0
 * @package           Guidos_login_redirect
 *
 * @wordpress-plugin
 * Plugin Name:       Guido's Login Redirect
 * Plugin URI:        https://www.linkedin.com/in/guido-cnossen-2110a3170/
 * Description:       Deze plugin zorgt ervoor dat de site alleen toegankelijk is voor ingelogde gebruikers. Alle niet ingelogde gebruikers worden geredirect naar de login-pagina.
 * Version:           1.0.0
 * Author:            Guido
 * Author URI:        https://www.linkedin.com/in/guido-cnossen-2110a3170/
 * Text Domain:       guidos-login-redirect
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function activate_guidos_login_redirect() {
	add_option( 'Activated_Plugin', 'guidos-login-redirect' );
}

function deactivate_guidos_login_redirect() {
	delete_option('Activated_Plugin', 'guidos-login-redirect'); 
}

register_activation_hook( __FILE__, 'activate_guidos_login_redirect' );
register_deactivation_hook( __FILE__, 'deactivate_guidos_login_redirect' );

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function guidos_login_redirect() {

    if (!is_user_logged_in()) {
        wp_redirect(wp_login_url()); 
        exit; 
    }
}

add_action('template_redirect', 'guidos_login_redirect');

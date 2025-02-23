<?php
/**
 * Plugin Name:       Disable Theme Migration
 * Plugin URI:        https://wp.bcitwebdeveloper.ca/
 * Description:       This plugin disable the Theme migration option for WP Migrate. This plugin should only be installed if you are working in a team on the School site.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Jonathon Leathers
 * Author URI:        https://wp.bcitwebdeveloper.ca/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fwd-capstone
 *
 * @package FWD_Capstone
 */

/**
 * Enqueue a script that prevents clicking on the Themes checkbox in the WP Migrate plugin.
 *
 * @param string $hook The value of the last part of the admin URL.
 */
function fwd_enqueue_admin_script( $hook ) {
	if ( false === strpos( $hook, 'wp-migrate-db-pro' ) ) {
		return;
	}
	wp_enqueue_style( 'disable-themes', plugins_url( '/disable-themes.css', __FILE__ ), array(), '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'fwd_enqueue_admin_script' );


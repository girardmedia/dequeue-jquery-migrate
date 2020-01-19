<?php
/**
 * jMigrate Fix
 *
 * @package   JMigrateFix
 * @author    Sevak Girard
 * @link      https://girardmedia.com/
 * @copyright Copyright (c) 2020 Girard Media LLC
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       jMigrate Fix
 * Plugin URI:        https://github.com/girardmedia/jmigrate-fix
 * Description:       Remove the jquery-migrate.js script dependency.
 * Version:           1.0.0
 * Author:            Girard Media
 * Author URI:        https://girardmedia.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * GitHub Plugin URI: girardmedia/jmigrate-fix
 */

/**
 * Remove the migrate script from the list of jQuery dependencies.
 *
 * @since 1.0.0
 *
 * @param WP_Scripts $scripts WP_Scripts scripts object. Passed by reference.
 */
function jmigrate_fix( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$jquery_dependencies = $scripts->registered['jquery']->deps;
		$scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
	}
}
add_action( 'wp_default_scripts', 'jmigrate_fix' );

<?php
/**
 * One-click updater for Cascade
 *
 * @package EDD Theme Updater
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://devpress.com',
		'item_name' => 'Cascade',
		'theme_slug' => 'cascade',
		'version' => '0.3.0',
		'author' => 'DevPress',
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'cascade' ),
		'enter-key' => __( 'Enter your theme license key.', 'cascade' ),
		'license-key' => __( 'License Key', 'cascade' ),
		'license-action' => __( 'License Action', 'cascade' ),
		'deactivate-license' => __( 'Deactivate License', 'cascade' ),
		'activate-license' => __( 'Activate License', 'cascade' ),
		'status-unknown' => __( 'License status is unknown.', 'cascade' ),
		'renew' => __( 'Renew?', 'cascade' ),
		'unlimited' => __( 'unlimited', 'cascade' ),
		'license-key-is-active' => __( 'License key is active.', 'cascade' ),
		'expires%s' => __( 'Expires %s.', 'cascade' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'cascade' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'cascade' ),
		'license-key-expired' => __( 'License key has expired.', 'cascade' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'cascade' ),
		'license-is-inactive' => __( 'License is inactive.', 'cascade' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'cascade' ),
		'site-is-inactive' => __( 'Site is inactive.', 'cascade' ),
		'license-status-unknown' => __( 'License status is unknown.', 'cascade' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'cascade' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'cascade' )
	)

);
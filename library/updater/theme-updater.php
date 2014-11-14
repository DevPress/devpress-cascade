<?php
/**
 * One-click updater for Cascade.
 *
 * @package Cascade
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'DevPress_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new DevPress_Theme_Updater_Admin(

	array(
		'remote_api_url' => 'https://devpress.com', // Site where EDD is hosted
		'item_name' => 'Cascade', // Name of theme
		'theme_slug' => 'cascade', // Theme slug
		'version' => '0.2.1', // The current version of this theme
		'author' => 'DevPress' // The author of this theme
	)

);
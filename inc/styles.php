<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Cascade
 */

if ( ! function_exists( 'cascade_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function cascade_styles() {

	// Site Title Font
	$setting = 'site-header-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title',
				'.site-description'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Primary Font
	$setting = 'primary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body',
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Secondary Font
	$setting = 'secondary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1, h2, h3, h4, h5, h6',
				'.menu-toggle',
				'.main-navigation',
				'.entry-meta',
				'.loop-pagination',
				'.comment-author',
				'.comment-metadata',
				'#colophon'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Header Background Color
	$setting = 'header-background-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'background-color' => sanitize_hex_color( $mod )
			)
		) );

	} else {

		// If header is black and primary menu is active
		// Let's reduce the padding
		if ( has_nav_menu( 'primary' ) ) {
			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.site-branding'
				),
				'declarations' => array(
					'padding-top' => '18px'
				)
			) );
		}
	}

	// Header Background Image
	$setting = 'header-background-image';
	$mod = get_theme_mod( $setting, false );

	if ( $mod ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'background-image' => 'url(' . esc_url( $mod ) . ')'
			)
		) );

	}

	// Header Background Image Styles
	$setting = 'header-background-image-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'background-size' => 'auto auto',
				'background-repeat' => 'repeat',
				'background-position' => '0 0'
			)
		) );

	}

	// Site Title Color
	$setting = 'site-title-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title a'
			),
			'declarations' => array(
				'color' => sanitize_hex_color( $mod )
			)
		) );

	}

	// Site Title Hover Color
	$setting = 'site-title-hover-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title a:hover'
			),
			'declarations' => array(
				'color' => sanitize_hex_color( $mod )
			)
		) );

	}

	// Site Tagline Color
	$setting = 'site-tagline-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-description'
			),
			'declarations' => array(
				'color' => sanitize_hex_color( $mod )
			)
		) );

	}

	// Menu Toggle
	if ( has_nav_menu( 'secondary' ) ) {
		$mod = get_theme_mod( 'background_color' );
		if ( $mod != '' ) {
			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'#secondary-navigation .menu-toggle span'
				),
				'declarations' => array(
					'background' => sanitize_hex_color( '#' . $mod )
				)
			) );
		}
	}

}
endif;

add_action( 'customizer_library_styles', 'cascade_styles' );

if ( ! function_exists( 'cascade_display_customizations' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function cascade_display_customizations() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Cascade Custom CSS -->\n<style type=\"text/css\" id=\"cascade-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Cascade Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'cascade_display_customizations', 11 );

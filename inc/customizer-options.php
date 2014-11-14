<?php
/**
 * Theme Customizer
 *
 * @package Cascade
 */

/**
 * Cascade Options
 *
 * @since  1.0.0
 *
 * @return array $options
 */
function cascade_options() {

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Header section
	$section = 'title_tagline';

	$options['header-background-color'] = array(
		'id' => 'header-background-color',
		'label'   => __( 'Header Background Color', 'cascade' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#000000',
		'priority' => 30,
	);

	$options['header-background-image'] = array(
		'id' => 'header-background-image',
		'label'   => __( 'Header Background Image', 'cascade' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'priority' => 40,
	);

	$choices = array(
		'image-scale' => 'Image Scale',
		'image-repeat' => 'Image Repeat'
	);

	$options['header-background-image-style'] = array(
		'id' => 'header-background-image-style',
		'label'   => __( 'Background Image Style', 'cascade' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'image-scale',
		'priority' => 50,
	);

	// Logo
	$section = 'logo';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Logo', 'cascade' ),
		'priority' => '20'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'cascade' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
	);

	$options['logo-favicon'] = array(
		'id' => 'logo-favicon',
		'label'   => __( 'Favicon', 'cascade' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description'  => __( 'File must be <strong>.png</strong> format. Optimal dimensions: <strong>32px x 32px</strong>.', 'cascade' ),
	);

	$options['logo-apple-touch'] = array(
		'id' => 'logo-apple-touch',
		'label'   => __( 'Apple Touch Icon', 'cascade' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => '',
		'description'  => __( 'File must be <strong>.png</strong> format. Optimal dimensions: <strong>152px x 152px</strong>.', 'cascade' ),
	);

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'cascade' ),
		'priority' => '80'
	);

	$options['site-title-color'] = array(
		'id' => 'site-title-color',
		'label'   => __( 'Site Title Color', 'cascade' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#ffffff'
	);

	$options['site-title-hover-color'] = array(
		'id' => 'site-title-hover-color',
		'label'   => __( 'Site Title Hover Color', 'cascade' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#aaaaaa',
	);

	$options['site-tagline-color'] = array(
		'id' => 'site-tagline-color',
		'label'   => __( 'Site Tagline Color', 'cascade' ),
		'section' => $section,
		'type'    => 'color',
		'default' => '#999999',
	);

	// Typography
	$section = 'typography';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Typography', 'cascade' ),
		'priority' => '75'
	);

	$options['site-header-font'] = array(
		'id' => 'site-header-font',
		'label'   => __( 'Site Header Font', 'cascade' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Crimson Text'
	);

	$options['primary-font'] = array(
		'id' => 'primary-font',
		'label'   => __( 'Primary Font', 'cascade' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Crimson Text'
	);

	$options['secondary-font'] = array(
		'id' => 'secondary-font',
		'label'   => __( 'Secondary Font', 'cascade' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Oswald'
	);

	// Archive Settings
	$section = 'archive';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Archive', 'cascade' ),
		'priority' => '80'
	);

	$options['archive-excerpts'] = array(
		'id' => 'archive-excerpts',
		'label'   => __( 'Display Excerpts', 'cascade' ),
		'description'   => __( 'Display excerpts instead of full content.', 'cascade' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	$options['archive-featured-images'] = array(
		'id' => 'archive-featured-images',
		'label'   => __( 'Display Featured Images', 'cascade' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	// Post Settings
	$section = 'post';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Post', 'cascade' ),
		'priority' => '80'
	);

	$options['display-post-dates'] = array(
		'id' => 'display-post-dates',
		'label'   => __( 'Display Post Dates', 'cascade' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['post-featured-images'] = array(
		'id' => 'post-featured-images',
		'label'   => __( 'Display Featured Images', 'cascade' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	// Footer Settings
	$section = 'footer';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Footer', 'cascade' ),
		'priority' => '100'
	);

	$options['footer-text'] = array(
		'id' => 'footer-text',
		'label'   => __( 'Footer Text', 'cascade' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => cascade_get_default_footer_text(),
	);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// customizer_library_remove_theme_mods();

}
add_action( 'init', 'cascade_options', 100 );

/**
 * Alters some of the defaults for the theme customizer
 *
 * @since  1.0.0.
 *
 * @param  object $wp_customize The global customizer object.
 * @return void
 */
function cascade_customizer_defaults( $wp_customize ) {

	$wp_customize->get_section( 'title_tagline' )->title = 'Header';

}
add_action( 'customize_register', 'cascade_customizer_defaults', 100 );

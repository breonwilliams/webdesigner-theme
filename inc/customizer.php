<?php
/**
 * Logo Customizer
 */

function m1_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'm1_logo' ); // Add setting for logo uploader

	// Add control for logo uploader (actual uploader)
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm1_logo', array(
		'label'    => __( 'Upload Logo (replaces text)', 'm1' ),
		'section'  => 'title_tagline',
		'settings' => 'm1_logo',
	) ) );
}
add_action( 'customize_register', 'm1_customize_register' );

function copyright_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'example_section_one',
		array(
			'title' => 'Copyright',
			'description' => 'This will appear in the footer.',
			'priority' => 35,
		)
	);

	$wp_customize->add_setting(
		'copyright_textbox',
		array(
			'default' => 'FunctionalMovement.com',
		)
	);

	$wp_customize->add_control(
		'copyright_textbox',
		array(
			'label' => 'Copyright text',
			'section' => 'example_section_one',
			'type' => 'text',
		)
	);

}

add_action( 'customize_register', 'copyright_customizer' );
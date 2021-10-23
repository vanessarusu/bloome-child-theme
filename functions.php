<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'hello-elementor','hello-elementor','hello-elementor-theme-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION




add_action('customize_register','bloome_customizer_options');
/*
 * Add in our custom Accent Color setting and control to be used in the Customizer in the Colors section
 *
 */
function bloome_customizer_options( $wp_customize ) {
	$wp_customize->add_section( 'bloome_settings', array(
        'title'          => 'NEW! Bloome Shop Information',
        'priority'       => 35,
    ) );
	
	$wp_customize->add_setting(
		  'store_address', //give it an ID
		  array(
			  'default' => 'Enter Location Here', 
		  )
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'store_address', //give it an ID
			array(
				'label'      => __( 'Store Address' ), //set the label to appear in the Customizer
				'section'    => 'bloome_settings', //select the section for it to appear under  
				'description' => __( 'Your physical store address' ),
				'settings'   => 'store_address', //pick the setting it applies to
				'type'    => 'text'
			)
		)
	);
	
	$wp_customize->add_setting(
		  'instagram_url', //give it an ID
		  array(
			  'default' => '', 
		  )
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'instagram_url', //give it an ID
			array(
				'label'      => __( 'Instagram URL' ), //set the label to appear in the Customizer
				'section'    => 'bloome_settings', //select the section for it to appear under  
				'settings'   => 'instagram_url', //pick the setting it applies to
				'description' => __( 'Please paste the full url of your Instagram profile' ),
				'type'    => 'url'
			)
		)
	);
	
		$wp_customize->add_section( 'privacy_policy' , array(
    		'title'      => __( 'NEW! Privacy Policy', 'textdomain' ),
		'priority'   => 40,
	) );

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'privacy_policy_page', array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'privacy_policy_page', array(
			'label'    => __( 'Select Page', 'textdomain' ),
			'section'  => 'privacy_policy',
			'type'     => 'dropdown-pages'
		) );
}

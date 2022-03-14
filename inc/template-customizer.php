<?php
/**
 * Functions associated with WordPress Customizer and Theme/Site Options
 *
 * @package Tobias
 */

/**
 * Add Customizer options for the "Tobias Images"
 * 
 * @link https://developer.wordpress.org/reference/hooks/customize_register/
 */
function tobias_images_customizer( $wp_customize ){
     
	// Add Tobias Images section
    $wp_customize->add_section(
		'tobias_images',
		array(
        	'title'			=> __('Tobias Images', 'tobias'),
        	'description'	=> 'Images associated with the Tobias theme.',
        	'priority'		=> 10,
    	)
	);

	// Add header logo
    $wp_customize->add_setting(
		'tobias_images[header_logo]',
		array(
        	'default'		=> '',
        	'capability'	=> 'edit_theme_options',
        	'type'			=> 'option',
    	)
	);
    $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'header_logo',
			array(
        		'label'    => __('Header Logo', 'tobias'),
				'description'	=> 'Image that appears in the header. Recommended max height: 40px',
        		'section'  => 'tobias_images',
        		'settings' => 'tobias_images[header_logo]',
    		)
		)
	);

	// Add mobile logo
    $wp_customize->add_setting(
		'tobias_images[mobile_logo]',
		array(
        	'default'		=> '',
        	'capability'	=> 'edit_theme_options',
        	'type'			=> 'option',
    	)
	);
    $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'mobile_logo',
			array(
        		'label'    => __('Mobile Logo', 'tobias'),
				'description'	=> 'Image that appears in the mobile menu. Recommended max height: 33px',
        		'section'  => 'tobias_images',
        		'settings' => 'tobias_images[mobile_logo]',
    		)
		)
	);

	// Add footer logo
    $wp_customize->add_setting(
		'tobias_images[footer_logo]',
		array(
        	'default'		=> '',
        	'capability'	=> 'edit_theme_options',
        	'type'			=> 'option',
    	)
	);
    $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'footer_logo',
			array(
        		'label'    => __('Footer Logo', 'tobias'),
				'description'	=> 'Image that appears in the footer. Recommended max height: 65px',
        		'section'  => 'tobias_images',
        		'settings' => 'tobias_images[footer_logo]',
    		)
		)
	);

	// Add admin login logo
    $wp_customize->add_setting(
		'tobias_images[admin_logo]',
		array(
        	'default'		=> '',
        	'capability'	=> 'edit_theme_options',
        	'type'			=> 'option',
    	)
	);
    $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'admin_logo',
			array(
        		'label'    => __('Admin Logo', 'tobias'),
				'description'	=> 'Image that appears on the WordPress login screen. Recommended dimensions: 250px by 250px',
        		'section'  => 'tobias_images',
        		'settings' => 'tobias_images[admin_logo]',
    		)
		)
	);
	
}
add_action( 'customize_register', 'tobias_images_customizer' );

/**
 * Add Customizer options for the "Tobias Socials"
 * 
 * @link https://developer.wordpress.org/reference/hooks/customize_register/
 */
function tobias_socials_customizer( $wp_customize ){
     
	// Add Tobias Socials section
    $wp_customize->add_section(
		'tobias_socials',
		array(
        	'title'			=> __('Tobias Socials', 'tobias'),
        	'description'	=> 'Social media links associated with the Tobias theme.',
        	'priority'		=> 10,
    	)
	);

    // Facebook
    $wp_customize->add_setting(
        'tobias_socials[facebook]',
        array(
            'default'        => '#',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'facebook',
        array(
            'label'      => __('Facebook', 'tobias'),
            'section'    => 'tobias_socials',
            'settings'   => 'tobias_socials[facebook]',
        )
    );

    // Instagram
    $wp_customize->add_setting(
        'tobias_socials[instagram]',
        array(
            'default'        => '#',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'instagram',
        array(
            'label'      => __('Instagram', 'tobias'),
            'section'    => 'tobias_socials',
            'settings'   => 'tobias_socials[instagram]',
        )
    );

    // Twitter
    $wp_customize->add_setting(
        'tobias_socials[twitter]',
        array(
            'default'        => '#',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'twitter',
        array(
            'label'      => __('Twitter', 'tobias'),
            'section'    => 'tobias_socials',
            'settings'   => 'tobias_socials[twitter]',
        )
    );

    // LinkedIn
    $wp_customize->add_setting(
        'tobias_socials[linkedin]',
        array(
            'default'        => '#',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'linkedin',
        array(
            'label'      => __('LinkedIn', 'tobias'),
            'section'    => 'tobias_socials',
            'settings'   => 'tobias_socials[linkedin]',
        )
    );

    // YouTube
    $wp_customize->add_setting(
        'tobias_socials[youtube]',
        array(
            'default'        => '',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'youtube',
        array(
            'label'      => __('YouTube', 'tobias'),
            'section'    => 'tobias_socials',
            'settings'   => 'tobias_socials[youtube]',
        )
    );

    // Pinterest
    $wp_customize->add_setting(
        'tobias_socials[pinterest]',
        array(
            'default'        => '',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'pinterest',
        array(
            'label'      => __('Pinterest', 'tobias'),
            'section'    => 'tobias_socials',
            'settings'   => 'tobias_socials[pinterest]',
        )
    );

    // Github
    $wp_customize->add_setting(
        'tobias_socials[github]',
        array(
            'default'        => '',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'github',
        array(
            'label'      => __('Github', 'tobias'),
            'section'    => 'tobias_socials',
            'settings'   => 'tobias_socials[github]',
        )
    );

    // Icon options
    $wp_customize->add_setting(
        'tobias_socials_icon_type',
        array(
            'default'        => 'normal',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'icon_options',
        array(
            'settings' => 'tobias_socials_icon_type',
            'label'   => 'Icon Type',
            'section' => 'tobias_socials',
            'type'    => 'select',
            'choices'    => array(
                'normal' => 'Normal',
                'square' => 'Square',
            ),
        )
    );

}
add_action( 'customize_register', 'tobias_socials_customizer' );
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
if ( ! function_exists( 'tobias_images_customizer' ) ) {

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

}
add_action( 'customize_register', 'tobias_images_customizer' );

/**
 * Add Customizer options for the "Tobias Socials"
 * 
 * @link https://developer.wordpress.org/reference/hooks/customize_register/
 */
if ( ! function_exists( 'tobias_socials_customizer' ) ) {
    
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
                'default'        => '',
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
                'default'        => '',
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
                'default'        => '',
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
                'default'        => '',
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

}
add_action( 'customize_register', 'tobias_socials_customizer' );

/**
 * Add Customizer options for the "Tobias Options"
 * 
 * @link https://developer.wordpress.org/reference/hooks/customize_register/
 */
if ( ! function_exists( 'tobias_options_customizer' ) ) {

    function tobias_options_customizer( $wp_customize ){
        
        // Add Tobias Options section
        $wp_customize->add_section(
            'tobias_options',
            array(
                'title'			=> __('Tobias Options', 'tobias'),
                'description'	=> 'Miscellaneous settings and options associated with the Tobias theme.',
                'priority'		=> 10,
            )
        );

        // Header Button Text
        $wp_customize->add_setting(
            'tobias_options[header_button_text]',
            array(
                'default'        => 'Get Started',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            )
        );
        $wp_customize->add_control(
            'header_button_text',
            array(
                'label'      => __('Header Button Text', 'tobias'),
                'description' => 'Text displayed in the button that appars in the primary navbar/header.',
                'section'    => 'tobias_options',
                'settings'   => 'tobias_options[header_button_text]',
            )
        );

        // Header Button Link
        $wp_customize->add_setting(
            'tobias_options[header_button_link]',
            array(
                'default'        => '#link',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            )
        );
        $wp_customize->add_control(
            'header_button_link',
            array(
                'label'      => __('Header Button Link', 'tobias'),
                'description' => 'Link URL (absolute or reative) of the button that appars in the primary navbar/header.',
                'section'    => 'tobias_options',
                'settings'   => 'tobias_options[header_button_link]',
            )
        );

        // Copyright Text
        $wp_customize->add_setting(
            'tobias_options[copyright]',
            array(
                'default'        => 'All rights reserved.',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            )
        );
        $wp_customize->add_control(
            'copyright',
            array(
                'label'      => __('Copyright Text', 'tobias'),
                'description' => 'Text that accompanies the copyright in the footer.',
                'section'    => 'tobias_options',
                'settings'   => 'tobias_options[copyright]',
            )
        );

        // Posts order
        $wp_customize->add_setting(
            'tobias_options[posts_order]',
            array(
                'default'        => 'DESC',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            )
        );
        $wp_customize->add_control(
            'posts_order',
            array(
                'settings' => 'tobias_options[posts_order]',
                'label'   => 'Posts Order',
                'description' => 'How to order the posts according to their publish date.',
                'section' => 'tobias_options',
                'type'    => 'select',
                'choices'    => array(
                    'DESC' => 'Descending (Default)',
                    'ASC' => 'Ascending',
                ),
            )
        );

    }

}
add_action( 'customize_register', 'tobias_options_customizer' );

/**
 * Add Customizer options for the "Tobias Scripts"
 * 
 * @link https://developer.wordpress.org/reference/hooks/customize_register/
 */
if ( ! function_exists( 'tobias_scripts_customizer' ) ) {

    function tobias_scripts_customizer( $wp_customize ){
        
        // Add Tobias Scripts section
        $wp_customize->add_section(
            'tobias_scripts',
            array(
                'title'			=> __('Tobias Scripts', 'tobias'),
                'description'	=> 'Various JavaScript tags and includes to be used with the theme.',
                'priority'		=> 10,
            )
        );

        // Google Tag Manager ID
        $wp_customize->add_setting(
            'tobias_scripts[gtm]',
            array(
                'default'        => '',
                'sanitize_callback' => 'sanitize_text_field',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            )
        );
        $wp_customize->add_control(
            'gtm',
            array(
                'label'      => __('Google Tag Manager ID', 'tobias'),
                'description' => 'The ID of a Google Tag Manager container',
                'section'    => 'tobias_scripts',
                'settings'   => 'tobias_scripts[gtm]',
            )
        );

        // Scripts (head)
        $wp_customize->add_setting(
            'tobias_scripts[scripts_head]',
            array(
                'default'        => '',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Code_Editor_Control(
                $wp_customize,
                'scripts_head',
                array(
                    'label'     => 'Scripts (Head)',
                    'description' => 'Any custom JS or script tags to include in the site\'s &#60;head&#62; tag. Must include opening and closing &#60;script&#62;&#60;/script&#62; tags.',
                    'code_type' => 'htmlmixed',
                    'settings'  => 'tobias_scripts[scripts_head]',
                    'section'   => 'tobias_scripts',
                )
            )
        );

        // Scripts (body)
        $wp_customize->add_setting(
            'tobias_scripts[scripts_body]',
            array(
                'default'        => '',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Code_Editor_Control(
                $wp_customize,
                'scripts_body',
                array(
                    'label'     => 'Scripts (Body)',
                    'description' => 'Any custom JS or script tags to include immediately after the site\'s &#60;body&#62; tag. Must include opening and closing &#60;script&#62;&#60;/script&#62; tags.',
                    'code_type' => 'htmlmixed',
                    'settings'  => 'tobias_scripts[scripts_body]',
                    'section'   => 'tobias_scripts',
                )
            )
        );

        // Scripts (footer)
        $wp_customize->add_setting(
            'tobias_scripts[scripts_footer]',
            array(
                'default'        => '',
                'capability'     => 'edit_theme_options',
                'type'           => 'option',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Code_Editor_Control(
                $wp_customize,
                'scripts_footer',
                array(
                    'label'     => 'Scripts (Footer)',
                    'description' => 'Any custom JS or script tags to before the site\'s closing &#60;/body&#62; tag. Must include opening and closing &#60;script&#62;&#60;/script&#62; tags.',
                    'code_type' => 'htmlmixed',
                    'settings'  => 'tobias_scripts[scripts_footer]',
                    'section'   => 'tobias_scripts',
                )
            )
        );

    }

}
add_action( 'customize_register', 'tobias_scripts_customizer' );
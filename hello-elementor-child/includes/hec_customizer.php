<?php
/**
* Hello Elementor Child theme Customizer settings
* These options/settings should be applied to Elementor elements and overwrite defaults!
*/

function kariboo_hec_customize_register( $wp_customize ) {

    // Create Colors panel
    $wp_customize->add_panel( 'hec_colors', array(
        'priority'       => 369,
        'title'          => esc_attr__('Colors', 'hello-elementor-child'),
        'description'    => esc_attr__('Kariboo Hello Elementor Child theme colors Set the default hyperlink colors button colors etc', 'hello-elementor-child'),
    ) );
            
    // Create Colors section: Hyperlinks
    $wp_customize->add_section( 'hec_hyperlinks' , array(
        'title'             => esc_attr__('Hyperlinks', 'hello-elementor-child'),
        'priority'          => 10,
        'panel'             => 'hec_colors',
    ) );
    // Create Colors section: Buttons
    $wp_customize->add_section( 'hec_buttons' , array(
        'title'             => esc_attr__('Buttons', 'hello-elementor-child'),
        'priority'          => 20,
        'panel'             => 'hec_colors',
    ) );
        // link color
    $wp_customize->add_setting( 'hec_link[hyperlink_color]', array(
        'default'           => '#f27f6f',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hyperlink_color', array(
        'label'    => esc_attr__('Link Color', 'hello-elementor-child'),
        'section'  => 'hec_hyperlinks',
        'settings' => 'hec_link[hyperlink_color]',
    )));
    // link color hover
    $wp_customize->add_setting( 'hec_link[hyperlink_color_hover]', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hyperlink_color_hover', array(
        'label'    => esc_attr__('Link Color - Hover', 'hello-elementor-child'),
        'section'  => 'hec_hyperlinks',
        'settings' => 'hec_link[hyperlink_color_hover]',
    )));
       // title link color
    $wp_customize->add_setting( 'hec_link[title_hyperlink_color]', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_hyperlink_color', array(
        'label'    => esc_attr__('Title Link Color', 'hello-elementor-child'),
        'section'  => 'hec_hyperlinks',
        'settings' => 'hec_link[title_hyperlink_color]',
    )));
       // title link color hover
    $wp_customize->add_setting( 'hec_link[title_hyperlink_color_hover]', array(
        'default'           => '#f27f6f',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_hyperlink_color_hover', array(
        'label'    => esc_attr__('Title Link Color - Hover', 'hello-elementor-child'),
        'section'  => 'hec_hyperlinks',
        'settings' => 'hec_link[title_hyperlink_color_hover]',
    )));
       // default button color - text
    $wp_customize->add_setting( 'hec_butt[def_button_text_color]', array(
        'default'           => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'def_button_text_color', array(
        'label'    => esc_attr__('Button Text Color', 'hello-elementor-child'),
        'section'  => 'hec_buttons',
        'settings' => 'hec_butt[def_button_text_color]',
    )));
       // default button color - background
    $wp_customize->add_setting( 'hec_butt[def_button_bg_color]', array(
        'default'           => '#f27f6f',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'def_button_bg_color', array(
        'label'    => esc_attr__('Button Background Color', 'hello-elementor-child'),
        'section'  => 'hec_buttons',
        'settings' => 'hec_butt[def_button_bg_color]',
    )));
       // default button color - text - hover
    $wp_customize->add_setting( 'hec_butt[def_button_text_color_hover]', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'def_button_text_color_hover', array(
        'label'    => esc_attr__('Button Text Color - Hover', 'hello-elementor-child'),
        'section'  => 'hec_buttons',
        'settings' => 'hec_butt[def_button_text_color_hover]',
    )));
       // default button color - background - hover
    $wp_customize->add_setting( 'hec_butt[def_button_bg_color_hover]', array(
        'default'           => '#f5a46c',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'def_button_bg_color_hover', array(
        'label'    => esc_attr__('Button Background Color - Hover', 'hello-elementor-child'),
        'section'  => 'hec_buttons',
        'settings' => 'hec_butt[def_button_bg_color_hover]',
    )));

}
add_action( 'customize_register', 'kariboo_hec_customize_register' );
<?php
//theme title 
add_theme_support('title-tag');

//themes js and css file calling
function t_css_js_file_call(){
    //CSS
    wp_enqueue_style('t_style', get_locale_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '5.3.0', 'all');
    wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom');

    //jQuery
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.3.0', 'true' );
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true' );
}

add_action('wp_enqueue_scripts', 't_css_js_file_call'); 

/*===================================
    Website Logo Customization
=====================================*/
function ab_customizer_register($wp_customize){
    $wp_customize->add_section('ab_header_aria', array(
        'title' =>__('Header Aria', 'portfolio'),
        'description' => 'Update website logo'
    ));
    $wp_customize->add_setting('ab_logo', array(
        'default' => get_bloginfo('template_directory'). '/img/logo.png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'ab_logo', array(
        'label' => 'Logo Upload',
        'setting' => 'ab_logo',
        'section' => 'ab_header_aria'
    )));
}

add_action('customize_register', 'ab_customizer_register');
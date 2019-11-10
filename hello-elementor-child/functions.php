<?php
/**
 * Hello Elementor Child theme functions and definitions
 * hec - hello elementor child
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 *
 */

/**
 * Loads the child theme textdomain.
 */
function kariboo_hec_languages() {

	load_child_theme_textdomain( 'hello-elementor-child', get_stylesheet_directory() . '/languages' );
	
}
add_action( 'after_setup_theme', 'kariboo_hec_languages' );

/**
 * Child Theme Stylesheet
 */
function kariboo_hec_stylesheet() {
	
    /* Parent Theme Stylesheet */
    wp_enqueue_style( 'kariboo-hec', get_stylesheet_directory_uri(). '/style.css', array(), '10112019' );

    /* Gutenberg front-end */
	wp_enqueue_style( 'kariboo-hec-gutenberg-front', get_stylesheet_directory_uri() . '/assets/css/gutenberg-styles.css', NULL, NULL, FALSE );
	
}
add_action( 'wp_enqueue_scripts', 'kariboo_hec_stylesheet', 99 );

/* Hello Child theme Sidebar */
function kariboo_hec_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hello-elementor-child' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Hello Elementor Child theme sidebar.', 'hello-elementor-child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    
}
add_action( 'widgets_init', 'kariboo_hec_widgets_init' );

/* Hello Child theme comments button - add Elementor's default classes */
function kariboo_hec_add_comments_button_class( $argz ) {

	$argz[ 'class_submit' ] = 'elementor-button-link elementor-button elementor-size-sm';
	return $argz;

}
add_action( 'comment_form_defaults', 'kariboo_hec_add_comments_button_class' );


/* Hello Child theme back-end stuff */
function kariboo_hec_scripts_admin() {

	wp_enqueue_style( 'kariboo-hec-admin', get_stylesheet_directory_uri() . '/assets/css/style-admin.css', NULL, NULL, FALSE );

}
add_action( 'admin_enqueue_scripts', 'kariboo_hec_scripts_admin' );
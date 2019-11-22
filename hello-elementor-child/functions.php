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
    $parent_style = 'hello-elementor';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'kariboo-hec',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get( 'Version' )
	);
	
	/* inline style that are soming from Customizer */
	wp_add_inline_style( 'kariboo-hec', kariboo_hec_apply_customizer_styles() );

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

/* Hello Child theme Customizer stuff ----------------------------------------- */
include_once( get_stylesheet_directory() . '/includes/hec_customizer.php' );
/* how to apply Customizer settings ? ----------------------------------------- */
function kariboo_hec_apply_customizer_styles() {

	// links
	$link_color = get_theme_mod( 'hyperlink_color', '#f27f6f' );
	$link_color_hover = get_theme_mod( 'hyperlink_color_hover', '#000000' );
	// titles
	$title_link_color = get_theme_mod( 'title_hyperlink_color', '#000000' );
	$title_link_color_hover = get_theme_mod( 'title_hyperlink_color_hover', '#f27f6f' );
	// buttons
	$button_text_color = get_theme_mod( 'def_button_text_color', '#FFFFFF' );
	$button_bg_color = get_theme_mod( 'def_button_bg_color', '#f27f6f' );
	$button_text_color_hover = get_theme_mod( 'def_button_text_color_hover', '#000000' );
	$button_bg_color_hover = get_theme_mod( 'def_button_bg_color_hover', '#f5a46c' );

	// header styles
	$css  = '';
	// 1. regular links
	$css .= '
	body[class*="elementor-"] *:not(.menu-item):not(.elementor-tab-title):not(.elementor-image-box-title):not(.elementor-icon-box-title):not(.elementor-post__title):not(.elementor-heading-title) > a:not(:hover):not(:active):not(.elementor-item-active):not([role="button"]):not(.button):not(.elementor-button):not(.elementor-post__read-more):not(.elementor-post-info__terms-list-item), 
	body[class*="elementor-"] .elementor-tab-title.elementor-active, 
	body[class*="elementor-"] .elementor-post-info__terms-list-item, 
	body[class*="elementor-"] .elementor-post__title, 
	body[class*="elementor-"] .elementor-post__title a, 
	body[class*="elementor-"] .elementor-heading-title a, 
	body[class*="elementor-"] .elementor-post__read-more, 
	body[class*="elementor-"] .elementor-image-box-title a, 
	body[class*="elementor-"] .elementor-icon-box-title a {
		color: ' . $link_color . ';
	}';
	$css .= '
	body[class*="elementor-"] *:not(.menu-item):not(.elementor-tab-title):not(.elementor-image-box-title):not(.elementor-icon-box-title):not(.elementor-post__title):not(.elementor-heading-title) > a:hover:not(.elementor-item-active):not([role="button"]):not(.button):not(.elementor-button):not(.elementor-post__read-more):not(.elementor-post-info__terms-list-item), 
	body[class*="elementor-"] .elementor-tab-title.elementor-active:hover, 
	body[class*="elementor-"] .elementor-post-info__terms-list-item:hover, 
	body[class*="elementor-"] .elementor-post__title:hover, 
	body[class*="elementor-"] .elementor-post__title a:hover, 
	body[class*="elementor-"] .elementor-heading-title a:hover, 
	body[class*="elementor-"] .elementor-post__read-more:hover, 
	body[class*="elementor-"] .elementor-image-box-title a:hover, 
	body[class*="elementor-"] .elementor-icon-box-title a:hover, 
	body[class*="elementor-"] *:not(.menu-item):not(.elementor-tab-title):not(.elementor-image-box-title):not(.elementor-icon-box-title):not(.elementor-post__title):not(.elementor-heading-title) > a:focus:not(.elementor-item-active):not([role="button"]):not(.button):not(.elementor-button):not(.elementor-post__read-more):not(.elementor-post-info__terms-list-item), 
	body[class*="elementor-"] .elementor-tab-title.elementor-active:focus, 
	body[class*="elementor-"] .elementor-post-info__terms-list-item:focus, 
	body[class*="elementor-"] .elementor-post__title:focus, 
	body[class*="elementor-"] .elementor-post__title a:focus, 
	body[class*="elementor-"] .elementor-heading-title a:focus,
	body[class*="elementor-"] .elementor-post__read-more:focus, 
	body[class*="elementor-"] .elementor-image-box-title a:focus, 
	body[class*="elementor-"] .elementor-icon-box-title a:focus {
		color: ' . $link_color_hover . ';
   }';
   // 2. heading titles
   $css .= '
   body[class*="elementor-"] h1.elementor-heading-title a, 
   body[class*="elementor-"] h2.elementor-heading-title a, 
   body[class*="elementor-"] h3.elementor-heading-title a, 
   body[class*="elementor-"] h4.elementor-heading-title a, 
   body[class*="elementor-"] h5.elementor-heading-title a, 
   body[class*="elementor-"] h6.elementor-heading-title a, 
   body[class*="elementor-"] h1.elementor-heading-title a:visited, 
   body[class*="elementor-"] h2.elementor-heading-title a:visited, 
   body[class*="elementor-"] h3.elementor-heading-title a:visited, 
   body[class*="elementor-"] h4.elementor-heading-title a:visited, 
   body[class*="elementor-"] h5.elementor-heading-title a:visited, 
   body[class*="elementor-"] h6.elementor-heading-title a:visited {
		color: ' . $title_link_color . ';
   }';
   $css .= '
   body[class*="elementor-"] h1.elementor-heading-title a:hover, 
   body[class*="elementor-"] h2.elementor-heading-title a:hover, 
   body[class*="elementor-"] h3.elementor-heading-title a:hover, 
   body[class*="elementor-"] h4.elementor-heading-title a:hover, 
   body[class*="elementor-"] h5.elementor-heading-title a:hover, 
   body[class*="elementor-"] h6.elementor-heading-title a:hover, 
   body[class*="elementor-"] h1.elementor-heading-title a:focus, 
   body[class*="elementor-"] h2.elementor-heading-title a:focus, 
   body[class*="elementor-"] h3.elementor-heading-title a:focus, 
   body[class*="elementor-"] h4.elementor-heading-title a:focus, 
   body[class*="elementor-"] h5.elementor-heading-title a:focus, 
   body[class*="elementor-"] h6.elementor-heading-title a:focus {
	color: ' . $title_link_color_hover . ';
   }';
   // 3. default buttons, a.k.a. buttons without styles
   $css .= '
   body[class*="elementor-"] .elementor-button, 
   body[class*="elementor-"] [type="button"], 
   body[class*="elementor-"] [type="submit"], 
   body[class*="elementor-"] button, 
   body[class*="elementor-"] .elementor-button:visited, 
   body[class*="elementor-"] [type="button"]:visited, 
   body[class*="elementor-"] [type="submit"]:visited, 
   body[class*="elementor-"] button:visited {
		color: ' . $button_text_color . ';
		background-color: ' . $button_bg_color . ';
   }';
   $css .= '
   body[class*="elementor-"] .elementor-button:hover, 
   body[class*="elementor-"] [type="button"]:hover, 
   body[class*="elementor-"] [type="submit"]:hover, 
   body[class*="elementor-"] button:hover, 
   body[class*="elementor-"] .elementor-button:focus, 
   body[class*="elementor-"] [type="button"]:focus, 
   body[class*="elementor-"] [type="submit"]:focus, 
   body[class*="elementor-"] button:focus {
		color: ' . $button_text_color_hover . ';
		background-color: ' . $button_bg_color_hover . ';
   }';

	return wp_strip_all_tags( apply_filters( 'kariboo_hec_apply_customizer_styles', $css ) );

}
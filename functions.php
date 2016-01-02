<?php
/**
 * vina functions and definitions
 *
 * @package vina
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
    $content_width = 640; /* pixels */
}

if ( !function_exists( 'vina_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function vina_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on vina, use a find and replace
         * to change 'funy' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'funy', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'funy' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio'
        ) );

        add_theme_support( "title-tag" );
        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'vina_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }

endif; // vina_setup
add_action( 'after_setup_theme', 'vina_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function vina_widgets_init() {
    global $theme_options_data;
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'funy' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
    if ( isset( $theme_options_data['vina_header_style'] ) && $theme_options_data['vina_header_style'] == 'header_v2' ) {
        register_sidebar( array(
            'name'          => __( 'Menu Left', 'funy' ),
            'id'            => 'menu_left',
            'description'   => 'header right using width header layout 02',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }


    register_sidebar( array(
        'name'          => 'Menu Right',
        'id'            => 'menu_right',
        'description'   => __( 'Menu Right', 'funy' ),
        'before_widget' => '<li class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Offcanvas Sidebar', 'funy' ),
        'id'            => 'offcanvas_sidebar',
        'description'   => 'Offcanvas Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Main Bottom', 'funy' ),
        'id'            => 'main-bottom',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer', 'funy' ),
        'id'            => 'footer',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', 'vina_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vina_scripts() {
    global $current_blog, $theme_options_data;
    wp_enqueue_style( 'vina-fonts', TP_THEME_URI . 'assets/fonts/fonts.css', array() );
    wp_enqueue_style( 'vina-css-style',TP_THEME_URI . 'assets/css/custom-style.css', array() );

    if ( is_multisite() ) {
        if ( file_exists( TP_THEME_DIR . 'style-' . $current_blog->blog_id . '.css' ) ) {
            wp_enqueue_style( 'vina-style', get_template_directory_uri() . '/style-' . $current_blog->blog_id . '.css', array() );
        } else {
            wp_enqueue_style( 'vina-style', get_stylesheet_uri() );
        }
    } else {
        wp_enqueue_style( 'vina-style', get_stylesheet_uri() );
    }


    if ( isset( $theme_options_data['vina_rtl_support'] ) && $theme_options_data['vina_rtl_support'] == '1' ) {
        wp_enqueue_style( 'vina-css-style-rtl',TP_THEME_URI . 'rtl.css', array() );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_script( 'vina-main', TP_THEME_URI . 'assets/js/main.min.js', array(), '', true );
    wp_enqueue_script( 'vina-custom-script', TP_THEME_URI . 'assets/js/custom-script.js', array(), '', true );

}

add_action( 'wp_enqueue_scripts', 'vina_scripts' );

function vina_custom_admin_scripts() {
    wp_enqueue_style( 'vina-custom-admin', TP_THEME_URI . 'assets/css/custom-admin.css', array() );
}

add_action( 'admin_enqueue_scripts', 'vina_custom_admin_scripts' );
/**
 * load framework
 */
require_once get_template_directory() . '/framework/tp-framework.php';


// require
require TP_THEME_DIR . 'inc/custom-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

require TP_THEME_DIR . 'inc/aq_resizer.php';

/**
 * Customizer additions.
 */
require TP_THEME_DIR . 'inc/header/logo.php';

require TP_THEME_DIR . 'inc/admin/customize-options.php';

//
require TP_THEME_DIR . 'inc/widgets/widgets.php';

// tax meta
require TP_THEME_DIR . 'inc/tax-meta.php';

// edit params pixcodes
//require TP_THEME_DIR . 'templates/filter-shortcodes.php';

if ( class_exists( 'WooCommerce' ) ) {
    // Woocomerce
//	WC_Post_types::register_taxonomies();
    require get_template_directory() . '/woocommerce/woocommerce.php';
}

if ( is_admin() ) {
    //require TP_THEME_DIR . 'inc/admin/plugins-require.php';
}
//pannel Widget Group
function vina_widget_group( $tabs ) {
    $tabs[] = array(
        'title'  => __( 'Vina Widget', 'funy' ),
        'filter' => array(
            'groups' => array( 'vina_widget_group' )
        )
    );
    return $tabs;
}

add_filter( 'siteorigin_panels_widget_dialog_tabs', 'vina_widget_group', 19 );

function vina_row_style_fields( $fields ) {
    $fields['parallax'] = array(
        'name'        => __( 'Parallax', 'funy' ),
        'type'        => 'checkbox',
        'group'       => 'design',
        'description' => __( 'If enabled, the background image will have a parallax effect.', 'funy' ),
        'priority'    => 8,
    );

    $fields['overlay'] = array(
        'name'        => __( 'Overlay', 'funy' ),
        'type'        => 'select',
        'group'       => 'design',
        'description' => __( 'If enabled, the background image will have a Overlay effect.', 'funy' ),
        'priority'    => 11,
        'options'	  => array(
            '' 			=> 'No',
            'vina-overlay' 	=> 'Simple Color',
            'vina-overlay-gradient'	=> 'Gradient Color',
        )
    );


    return $fields;
}

add_filter( 'siteorigin_panels_row_style_fields', 'vina_row_style_fields' );

function vina_row_style_attributes( $attributes, $args ) {
    if ( !empty( $args['parallax'] ) ) {
        array_push( $attributes['class'], 'article__parallax' );
    }

    if ( !empty( $args['row_stretch'] ) && $args['row_stretch'] == 'full-stretched' ) {
        array_push( $attributes['class'], 'vina-fix-stretched' );
    }

    if ( !empty( $args['overlay'] ) ) {
        array_push( $attributes['class'], $args['overlay'] );
    }

    return $attributes;
}

add_filter( 'siteorigin_panels_row_style_attributes', 'vina_row_style_attributes', 10, 2 );

function remove_post_custom_fields() {
    remove_meta_box( 'erm_menu_shortcode', 'erm_menu', 'side' );
    remove_meta_box( 'erm_footer_item', 'erm_menu', 'normal' );
}

add_action( 'add_meta_boxes', 'remove_post_custom_fields' );

add_action( 'init', 'vina_add_excerpts_to_pages' );
function vina_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
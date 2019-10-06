<?php
/**
 * ImnaJimna functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ImnaJimna
 */

if ( ! function_exists( 'imnajimna_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function imnajimna_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ImnaJimna, use a find and replace
		 * to change 'imnajimna' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'imnajimna', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'imnajimna' ),
			'menu-2' => esc_html__( 'Footer', 'imnajimna' ),
			'menu-3' => esc_html__( 'Copyright', 'imnajimna' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'imnajimna_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'imnajimna_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function imnajimna_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'imnajimna_content_width', 640 );
}
add_action( 'after_setup_theme', 'imnajimna_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function imnajimna_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'imnajimna' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'imnajimna' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Custom widget', 'imnajimna' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Show logos of your clients here.', 'imnajimna' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'imnajimna_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function imnajimna_scripts() {
	wp_enqueue_style( 'imnajimna-font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css' );
	wp_enqueue_style( 'imnajimna-ionicons','https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css' );
	// wp_enqueue_style( 'imnajimna-font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css' );
	wp_enqueue_style( 'imnajimna-owl-theme', get_template_directory_uri() . '/css/owl.theme.default.min.css' );
	wp_enqueue_style( 'imnajimna-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'imnajimna-owl-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'imnajimna-aos', get_template_directory_uri() . '/css/aos.css' );
	wp_enqueue_style( 'imnajimna-animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'imnajimna-font', 'https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&display=swap' );
	wp_enqueue_style( 'imnajimna-style', get_stylesheet_uri() );

	wp_enqueue_script( 'imnajimna-popper', get_template_directory_uri() . '/js/popper.min.js', array(), '', true );
	wp_enqueue_script( 'imnajimna-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'imnajimna-aos', get_template_directory_uri() . '/js/aos.js', array(), '', true );
	wp_enqueue_script( 'imnajimna-scroll', get_template_directory_uri() . '/js/parallax.min.js', array(), '', true );
	wp_enqueue_script( 'imnajimna-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '', true );
	wp_enqueue_script( 'imnajimna-custom', get_template_directory_uri() . '/js/main.js', array(), '', true );

	wp_enqueue_script( 'imnajimna-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'imnajimna_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/bs4navwalker.php';
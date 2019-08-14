<?php
/**
 * applied-computer-science functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package applied-computer-science
 */

if ( ! function_exists( 'applied_computer_science_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function applied_computer_science_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on applied-computer-science, use a find and replace
		 * to change 'applied-computer-science' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'applied-computer-science', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'applied-computer-science' ),
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
		add_theme_support( 'custom-background', apply_filters( 'applied_computer_science_custom_background_args', array(
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
add_action( 'after_setup_theme', 'applied_computer_science_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function applied_computer_science_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'applied_computer_science_content_width', 640 );
}
add_action( 'after_setup_theme', 'applied_computer_science_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function applied_computer_science_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'applied-computer-science' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'applied-computer-science' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'applied_computer_science_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function applied_computer_science_scripts() {
	wp_enqueue_style( 'applied-computer-science-style', get_stylesheet_uri() );
	wp_enqueue_style( 'applied-computer-science-css', get_template_directory_uri() . '/css/styles.min.css');

	// wp_enqueue_script( 'applied-computer-science-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'applied-computer-science-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'applied-computer-science-js', get_template_directory_uri() . '/js/applied-computer-science.js');

	// Fontawesome 5.x
	wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/b868260b9e.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'applied_computer_science_scripts' );

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

function get_main_menu() {
	// display the wp3 menu if available
    wp_nav_menu(array( 
    	'container' => false,                           // remove nav container
    	'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
    	'menu' => 'The Main Menu',                           // nav name
    	'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
    	//'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	//'fallback_cb' => 'bones_main_nav_fallback'      // fallback function
	));
}

// Shortcodes
function get_last_bulletin_posts( $atts ){
	$a = shortcode_atts( array(
		'num_posts' => '5',
	), $atts );

	$num_posts = (int)$a['num_posts'];

	$query = new WP_Query(array(
		'post_type' => 'bulletin_board',
		'posts_per_page' => $num_posts,
		'meta_query' => array(
			array(
				'key ' => 'expiry_date',
				'value' => date('Ymd'),
				'compare' => '>=',
				'type' => 'DATE'
			)
		)
	));

	$output = '';

	while ( $query->have_posts() ) :
		ob_start();
		$query->the_post();
		include 'template-parts/card.php';
		$output .= ob_get_contents();
		ob_end_clean();
	endwhile;

	return $output;
}
add_shortcode( 'last_bulletin_posts', 'get_last_bulletin_posts' );

function get_bulletin_board() {

	$query = new WP_Query(array(
		'post_type' => 'bulletin_board',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key ' => 'expiry_date',
				'value' => date('Ymd'),
				'compare' => '>=',
				'type' => 'DATE'
			)
		)
	));

	$output = '<div class="bulletin-board">';

	while ( $query->have_posts() ) :
		ob_start();
		$query->the_post();
		include 'template-parts/article.php';
		$output .= ob_get_contents();
		ob_end_clean();
	endwhile;

	$output .= '</div>';

	return $output;
}
add_shortcode('bb_archive', 'get_bulletin_board');
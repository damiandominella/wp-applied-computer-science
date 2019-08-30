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
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'applied-computer-science' ),
		'id' => 'footer',
		'description' => esc_html__( 'Add widgets here.', 'applied-computer-science' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col col-6">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'applied_computer_science_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function applied_computer_science_scripts() {
	wp_enqueue_style( 'applied-computer-science-style', get_stylesheet_uri() );
	wp_enqueue_style( 'applied-computer-science-css', get_template_directory_uri() . '/css/styles.min.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'applied-computer-science-js', get_template_directory_uri() . '/js/applied-computer-science.js');

	// Fontawesome 5.x
	wp_enqueue_style('fontawesome-style',
	'https://use.fontawesome.com/releases/v5.8.2/css/all.css');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'applied_computer_science_scripts' );


// Custom post types
require_once('custom-post-types/bulletin_board.php');
require_once('custom-post-types/seminars.php');
require_once('custom-post-types/teachers.php');


function get_main_menu($lang = 'IT') {
	// display the wp3 menu if available
    wp_nav_menu(array( 
    	'container' => false,                           // remove nav container
    	'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
    	'menu' => 'Menu '.$lang,                           // nav name
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

// Numeric Page Navigation
function page_navigation($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 3;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ul>'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		echo '<li class="first-page-link"><a href="'.get_pagenum_link().'" title="1">1</a></li><li class="dots">...</li>';
	}
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="current"><span>'.$i.'</span></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	if ($end_page < $max_page) {
		if ($end_page < ($max_page - 2)) {
			echo '<li class="dots">...</li>';
		}
		echo '<li class="last-page-link"><a href="'.get_pagenum_link($max_page).'" title="'.$max_page.'">'.$max_page.'</a></li>';
	}
	echo '</ul></nav>'.$after."";
}

// ------------- Excerpt Fixes ----------
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function custom_excerpt_more($more) {
	global $post;
	return '... <a class="read-more" href="'. get_permalink($post->ID) . '" title="Read '.get_the_title($post->ID).'">' . __('Read more', 'applied-computer-science') . '</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');


// ------------- Shortcodes -------------
function get_last_bulletin_posts( $atts ){
	$a = shortcode_atts( array(
		'num_posts' => '5',
		'show_content' => true
	), $atts );

	$num_posts = (int)$a['num_posts'];
	$show_content = (bool)$a['show_content'];

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
		include 'template-parts/post-preview.php';
		$output .= ob_get_contents();
		ob_end_clean();
	endwhile;

	return $output;
}
add_shortcode( 'last_bulletin_posts', 'get_last_bulletin_posts' );

function get_latests_posts($atts) {

	$a = shortcode_atts( array(
		'cat_id' => '',
		'num_posts' => '5',
		'show_content' => true
	), $atts );

	$cat_id = (int)$a['cat_id'];
	$num_posts = (int)$a['num_posts'];
	$show_content = (bool)$a['show_content'];

	$query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => $num_posts,
		'cat' => $cat_id,
		'order' => 'DESC',
		'orderby' => 'date'
	));
	
	$output = '';
	
	while ($query->have_posts() ) :
		ob_start();
		$query->the_post();
		include 'template-parts/post-preview.php';
		$output .= ob_get_contents();
		ob_end_clean();
	endwhile;
    
    wp_reset_query();
    
    return $output;
}
add_shortcode('latests_posts', 'get_latests_posts');

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

function get_seminars() {
    $query = new WP_Query(array(
		'post_type' => 'seminars',
		'posts_per_page' => -1,
		// 'meta_query' => array(
		// 	array(
		// 		'key ' => 'expiry_date',
		// 		'value' => date('Ymd'),
		// 		'compare' => '>=',
		// 		'type' => 'DATE'
		// 	)
		// )
	));

	$output = '<div class="seminars">';

	while ( $query->have_posts() ) :
		ob_start();
		$query->the_post();
		include 'template-parts/seminary.php';
		$output .= ob_get_contents();
		ob_end_clean();
	endwhile;

	$output .= '</div>';

	return $output;
}
add_shortcode('seminars', 'get_seminars');

function get_teachers($atts) {
	$a = shortcode_atts( array(
		'special' => false,
	), $atts );

	$isSpecial = (bool)$a['special'];

	$queryParams = array(
		'post_type' => 'teachers',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key ' => 'is_special',
				'value' => $isSpecial ? '1' : '0'
			)
		)
	);

    $query = new WP_Query($queryParams);

	$class = $isSpecial ? 'special' : '';
	$output = '<div class="teachers row ' . $class . '">';

	while ( $query->have_posts() ) :
		ob_start();
		$query->the_post();
		include 'template-parts/teacher.php';
		$output .= ob_get_contents();
		ob_end_clean();
	endwhile;

	$output .= '</div>';

	return $output;
}
add_shortcode('teachers', 'get_teachers');

function sti_comment_shortcode($atts, $content) {
    return '';
}
add_shortcode('comment', 'sti_comment_shortcode');


function col_shortcode($atts, $content) {
    
    extract(shortcode_atts(array(
        'n' => '4',
        'c' => ''
	), $atts));
	
	$class = 'col col-' . $n;

    if ($c)
		$class .= ' ' . $c;
    
    $div = '<div class="' . $class . '">';
            
    return $div . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('col', 'col_shortcode');


function row_shortcode($atts, $content) {    
    return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'row_shortcode');

function get_content_shortcode($atts) {
    extract(shortcode_atts(array(
        'url' => '',
    ), $atts));
	
	echo '<script type="text/javascript">location.href = "'. $url .'";</script>';
}
add_shortcode('get_content', 'get_content_shortcode');
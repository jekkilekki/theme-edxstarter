<?php
/**
 * EdxStarter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage EdxStarter
 * @since 1.0.0
 */

/**
 * Enqueues the Stylesheet for EdxStarter.
 */
function edxstarter_enqueue_scripts() {
	wp_enqueue_style( 'edxstarter-style', get_template_directory_uri() . '/style.css', array(), '20191213' );

	wp_enqueue_style( 'edxstarter-google-fonts', 'https://fonts.googleapis.com/css?family=Bebas+Neue|Montserrat:100,200,300,400,500,600,700,800,900|Crimson+Text:400,400i,600,600i,700,700i|Oswald:200,300,400,500,600,700', array(), '20200124' );
}
add_action( 'wp_enqueue_scripts', 'edxstarter_enqueue_scripts' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edxstarter_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 600;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'edxstarter-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'edxstarter' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}

add_action( 'after_setup_theme', 'edxstarter_theme_support' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function edxstarter_menus() {

	$locations = array(
		'header'  => __( 'Main Menu', 'edxstarter' ),
		'footer'  => __( 'Footer Menu', 'edxstarter' ),
		'sidebar' => __( 'Sidebar Menu', 'edxstarter' ),
		'social'  => __( 'Social Menu', 'edxstarter' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'edxstarter_menus' );

/**
 * Fallback if the Header Menu isn't set.
 */
function custom_primary_menu_fallback() {
	?>
	<ul id="menu">
		<li><a href="/">Home</a></li>
		<li><a href="/wp-admin/nav-menus.php">Set primary menu</a></li>
	</ul>
	<?php
}

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edxstarter_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Sidebar Widget Area.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Sidebar', 'edxstarter' ),
				'id'          => 'sidebar',
				'description' => __( 'Widgets in this area will be displayed in the sidebar.', 'edxstarter' ),
			)
		)
	);

	// Footer Widget Area.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer', 'edxstarter' ),
				'id'          => 'sidebar-footer',
				'description' => __( 'Widgets in this area will be displayed in the footer.', 'edxstarter' ),
			)
		)
	);

}

add_action( 'widgets_init', 'edxstarter_sidebar_registration' );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function edxstarter_excerpt_more( $more ) {
	if ( ! is_single() ) {
			$more = '<a class="read-more" href="' . get_permalink( get_the_ID() ) . '">&ctdot;</a>';
	}

	return $more;
}
add_filter( 'excerpt_more', 'edxstarter_excerpt_more' );

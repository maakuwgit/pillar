<?php
/**
 * Pillar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Pillar
 * @since 1.0
 * @version 2.8.7
 */

/**
 * Pillar only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pillar_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/pillar
	 * If you're building a theme based on Pillar, use a find and replace
	 * to change 'pillar' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pillar' );

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

	add_image_size( 'pillar-featured-image', 2000, 1200, true );

	add_image_size( 'pillar-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'pillar' ),
		'header' => __( 'Header Menu', 'pillar' ),
		'social' => __( 'Social Menu', 'pillar' ),
		'footer' => __( 'Footer Menu', 'pillar' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 141,
		'height'      => 46,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css' ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'pillar' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'pillar' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'pillar' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'pillar' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Menu', 'pillar' ),
				'items' => array(
					'link_twitter',
					'link_linkedin',
				),
			),
		),
	);

	/**
	 * Filters Pillar array of starter content.
	 *
	 * @since Pillar 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'pillar_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
	
	/**
	 * Admin functions
	 */
	require get_parent_theme_file_path( '/inc/admin-functions.php' );
}
add_action( 'after_setup_theme', 'pillar_setup' );

/**
 * Adds SEO meta tags to the head tag content
 *
 * @since Pillar 2.3
 * @author MaakuW
 */
function pillar_seo_tags() {
	$use_ga = false;
	$obj = get_queried_object();
	$title = $description = '';
	if( $obj ) {
		if ( !is_archive() ) {
			$id = $obj->ID;
			$title = get_the_title();
			$description = get_post_meta( $id, '_pillar_seo_description', true );
	
			if( $description ) {
				echo '<meta property="description" content="' . $description . '">';
				echo '<meta name="twitter:description" content="' . $description . '">';
				echo '<meta property="og:description" content="' . $description . '">';
			}
			echo '<meta property="og:title" content="' . $title . '">';
			echo '<meta name="twitter:title" content="' . $title . '">';
		}else{
			$title = $obj->label;
			$description = get_bloginfo( 'description');
			
			echo '<meta property="description" content="' . $description . '">';
			echo '<meta name="twitter:description" content="' . $description . '">';
			echo '<meta property="og:description" content="' . $description . '">';
			echo '<meta property="og:title" content="' . $title . '">';
			echo '<meta name="twitter:title" content="' . $title . '">';
		}
	}
	echo '<meta property="og:locale" content="en_US">';
	echo '<meta property="og:type" content="article">';
	echo '<meta property="og:url" content="' . get_bloginfo('url') . '">';
	echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '">';
	echo '<meta name="twitter:card" content="summary">';
	
	if( $use_ga ) {
		echo '<script>';
	  echo "     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');";
	
		echo ' ga("create", "UA-82804149-1", "auto");';
	  echo ' ga("send", "pageview");';
	  echo '</script>';
	}
	
}
add_action( 'wp_head', 'pillar_seo_tags', 0 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pillar_content_width() {

	$content_width = $GLOBALS['content_width'];

	$content_width = 1800;

	/**
	 * Filter Pillar content width of the theme.
	 *
	 * @since Pillar 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'pillar_content_width', $content_width );
}
add_action( 'template_redirect', 'pillar_content_width', 0 );

/**
 * Register custom fonts.
 */
function pillar_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto = _x( 'on', 'Roboto font: on or off', 'pillar' );

	if ( 'off' !== $roboto ) {
		$font_families = array();

		$font_families[] = 'Roboto:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Pillar 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function pillar_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'pillar-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'pillar_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pillar_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar', 'pillar' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'pillar' ),
		'before_widget' => '<dd id="%1$s" class="widget cell %2$s">',
		'after_widget'  => '</dd>',
		'before_title'  => '<dt class="widget-title">',
		'after_title'   => '</dt>',
	) );
}
add_action( 'widgets_init', 'pillar_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Pillar 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function pillar_excerpt_more( $link ) {
	
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( '[more]', 'pillar' ), get_the_title( get_the_ID() ) )
	);
	return '&nbsp;' . $link;
}
add_filter( 'excerpt_more', 'pillar_excerpt_more' );

/**
 * Shortens the excerpt text length
 *
 * @since Pillar 2.8.7
 */
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Pillar 1.0
 */
function pillar_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'pillar_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function pillar_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'pillar_pingback_header' );

/**
 * Register scripts and styles.
 */
function pillar_register() {
	$template_dir = get_template_directory_uri();
	
	// Add custom fonts, used in the main stylesheet.
	wp_register_style( 'core-css', get_theme_file_uri( '/assets/css/core.css' ), array(), '2.9');
	wp_register_style( 'xlarge-css', get_theme_file_uri( '/assets/css/screen_xlarge.css' ), array('core-css'), '1.0');
	wp_register_style( 'fonts', pillar_fonts_url(), array(), null );
	wp_register_style( 'font-awesome' , get_theme_file_uri( 'assets/css/font-awesome.min.css' ) );
	wp_register_style( 'animation', get_theme_file_uri( 'assets/css/animation.css'), array(), '2.5.8' );
	
	//Libraries
	wp_register_script( 'backgrounder', get_theme_file_uri( '/assets/js/backgrounder.js' ), array( 'jquery' ), '1.6' );
	wp_register_script( 'breakpoints', get_theme_file_uri( '/assets/js/breakpoints.js' ), array(), '0.1', true );

	wp_register_script( 'parallax', get_theme_file_uri( '/assets/js/parallax.min.js' ), array( 'jquery' ), '1.4.2', true );
	wp_register_script( 'animation.gsap', get_theme_file_uri( '/assets/js/animation.gsap.js' ), array( 'jquery', 'scrollmagic', 'tweenmax' ), '2.0.5', true );
	wp_register_script( 'scrollmagic', get_theme_file_uri( '/assets/js/ScrollMagic.min.js' ), array( 'jquery' ), '2.0.5', true );
	wp_register_script( 'scrollmagic-indicators', get_theme_file_uri( 'assets/js/debug.addIndicators.min.js' ), array( 'jquery', 'scrollmagic' ), '2.0.5', true );
	wp_register_script( 'tweenmax', get_theme_file_uri( '/assets/js/TweenMax.min.js' ), array( 'jquery' ), '1.18.0', true );
	wp_register_script( 'scrollto', get_theme_file_uri( '/assets/js/ScrollToPlugin.min.js' ), array( 'jquery' ), '1.8.1', true );
	wp_register_script( 'cssplugin', get_theme_file_uri( '/assets/js/CSSPlugin.min.js' ), array( 'jquery' ), '1.18.0', true );

}
add_action( 'wp_loaded', 'pillar_register' );

/**
 * Enqueue scripts and styles.
 */
function pillar_enqueue() {
	$template_dir = get_template_directory_uri();
	
	// Theme stylesheet.
	wp_enqueue_style( 'style', get_stylesheet_uri(), array('core-css'), '2.5' );
	
	//Core functions
	wp_enqueue_script( 'global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery', 'backgrounder', 'breakpoints', 'tweenmax', 'parallax', 'scrollmagic'), '2.7.1', true );
	
	//Enqueue applicable scripts
	wp_enqueue_script( 'backgrounder' );
	wp_enqueue_script( 'breakpoints' );
	wp_enqueue_script( 'tweenmax' );
	wp_enqueue_script( 'scrollto' );
	wp_enqueue_script( 'cssplugin' );
	wp_enqueue_script( 'parallax' );
	wp_enqueue_script( 'animation.gsap' );
	wp_enqueue_script( 'scrollmagic' );
	wp_enqueue_script( 'scrollmagic-indicators' );
	
	//Enqueue applicable stypes
	wp_enqueue_style( 'animation' );
	wp_enqueue_style( 'core-css' );
	wp_enqueue_style( 'xlarge-css' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'fonts' );
}
add_action( 'wp_enqueue_scripts', 'pillar_enqueue' );

/**
 * Enqueues adminscripts and styles.
 *
 * @since Pillar 2.3
 */
function pillar_admin_scripts() {
	$screen = get_current_screen();
	// Core Functions.
	wp_enqueue_script( 'admin-functions', get_template_directory_uri() . '/assets/js/admin.js', array('backgrounder', 'breakpoints' ), '2.8.9' );
	wp_enqueue_script( 'meta-boxes', get_template_directory_uri() . '/assets/js/meta-boxes.js', array('jquery' ), '0.1' );
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script(
      'iris',
      admin_url( 'js/iris.min.js' ),
      array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
      false,
      1
  );
  wp_enqueue_script(
      'wp-color-picker',
      admin_url( 'js/color-picker.min.js' ),
      array( 'iris' ),
      false,
      1
  );
  $colorpicker_l10n = array(
      'clear' => __( 'Clear' ),
      'defaultString' => __( 'Default' ),
      'pick' => __( 'Select Color' ),
      'current' => __( 'Current Color' ),
  );
  wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n ); 
 
	//Enqueue applicable scripts
	wp_enqueue_script( 'backgrounder' );
	wp_enqueue_script( 'breakpoints' );
	
	wp_enqueue_style( 'animation' );
	//Enqueue applicable stypes
	if($screen->id == 'page'){
		wp_enqueue_style( 'core-css' );
		wp_enqueue_style( 'font-awesome' );
	}
	wp_enqueue_style( 'fonts' );
}

add_action( 'admin_enqueue_scripts', 'pillar_admin_scripts' );

/**
 * Simplifies the post menu names in the admin so they make sense with our theme
 *
 * @since Pilllar 2.8.3
 * @author MaakuW
 *
 */
function pillar_rename_post_menus() {
	global $menu, $submenu;
	$menu[5][0] = 'Blog';
	$menu[10][0] = 'Assets';
	$submenu['edit.php'][10][0] = 'Assets';
	echo '';
}
add_action( 'admin_menu', 'pillar_rename_post_menus' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Pillar 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function pillar_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'pillar_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Pillar 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function pillar_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'pillar_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Pillar 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function pillar_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'pillar_post_thumbnail_sizes_attr', 10, 3 );

/**
* Removes the auto paragraphs, which can throw off the grid and cause nested paragraphs
* and random, unnecessary br tag inserts
*
* @since Pillar 1
* @author MaakuW
*/
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function random_id(){
	return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Pillar 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function pillar_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'pillar_front_page_template' );

/**
 * User Field additions.
 */
require get_parent_theme_file_path( '/inc/user-fields.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Global Template and Homepage settings
 */
require get_parent_theme_file_path( '/inc/template-settings.php' );

/**
 * Page and Post Custom Meta Boxes
 */
require get_parent_theme_file_path( '/inc/meta-boxes.php' );

/**
 * Custom Post Types
 */
require get_parent_theme_file_path( '/inc/post-types.php' );
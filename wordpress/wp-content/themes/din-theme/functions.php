<?php
/**
 * din-theme functions and definitions
 *
 * @package din-theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1140; /* pixels */
}

if ( ! function_exists( 'din_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function din_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on din-theme, use a find and replace
	 * to change 'din-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'din-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'din-theme' ),
	) );

    register_nav_menus( array(
        'quick-menu' => 'Quick Access Menu',
        'quick-menu' => 'Quick Access Menu in Header',
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
    /*
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
    */

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'din_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // din_theme_setup
add_action( 'after_setup_theme', 'din_theme_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function din_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'din-theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    register_sidebar( array(
        'name' => 'Latest Section',
        'id' => 'latest-section',
        'description' => 'Some feature content after title',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
    register_sidebar( array(
        'name' => 'Video Player',
        'id' => 'video-player',
        'description' => 'ID of Youtube Video for fullscreen player',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
    register_sidebar( array(
        'name' => 'Shop Section',
        'id' => 'shop-section',
        'description' => 'Appears before the blog at the end of all sections',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Terms Area',
        'id' => 'terms-area',
        'description' => 'Appears as a modal window',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
    register_sidebar( array(
        'name' => 'Contact Area',
        'id' => 'contact-area',
        'description' => 'Appears in dynamic footer',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => 'Booking Area',
        'id' => 'booking-area',
        'description' => 'Appears in dynamic footer',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'din_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function din_theme_scripts() {
	wp_enqueue_style( 'din-theme-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'din_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Remove Admin Bar from Frontend
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Set Post Counts
 * @param $postID
 * @return string
 *
 */
function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/**
 * Register Custom Post Type: Products
 */
// Register Custom Post Type
function products_post_type() {

    $labels = array(
        'name'                => _x( 'Products', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Product', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Product:', 'text_domain' ),
        'all_items'           => __( 'All Products', 'text_domain' ),
        'view_item'           => __( 'View Product', 'text_domain' ),
        'add_new_item'        => __( 'Add New Product', 'text_domain' ),
        'add_new'             => __( 'New Product', 'text_domain' ),
        'edit_item'           => __( 'Edit Product', 'text_domain' ),
        'update_item'         => __( 'Update Product', 'text_domain' ),
        'search_items'        => __( 'Search products', 'text_domain' ),
        'not_found'           => __( 'No products found', 'text_domain' ),
        'not_found_in_trash'  => __( 'No products found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'product', 'text_domain' ),
        'description'         => __( 'Product information pages', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-cart',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'product', $args );

}

// Hook into the 'init' action
add_action( 'init', 'products_post_type', 0 );

/**
 * Secondary Thumbnail for alternative portrait format */
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'post'
        )
    );
}


/* Additional Thumbnails fb optimized */
add_image_size( 'og-image', 1200, 630, true ); // Landscape for OG:Image
add_image_size( 'blog-image', 1140 ); //


/** 
 * Post Navigation for more posts, next & previous */
if ( ! function_exists( 'din_theme_content_nav' ) ) :
    /**
     * Display navigation to next/previous pages when applicable.
     *
     * @since Twenty Eleven 1.0
     * @author wearepictures
     * @param string $html_id The HTML id attribute.
     */
    function din_theme_content_nav( $html_id ) {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo esc_attr( $html_id ); ?>">
                <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyeleven' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
            </nav><!-- #nav-above -->
        <?php endif;
    }
endif; // din_theme_content_nav

/*
 * JQuery
 */

//Making jQuery Google API
function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');

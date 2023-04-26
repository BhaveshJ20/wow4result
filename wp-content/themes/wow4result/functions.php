<?php
/**
 * wow4result functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress 
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wow4result_setup() {
	load_theme_textdomain( 'wow4result' ); 
	//add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'wow4result-featured-image', 2000, 1200, true );

	add_image_size( 'wow4result-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'wow4result' ) 
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) ); 

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array( 
		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		), 

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'wow4result' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			), 
		),
	);
	
	$starter_content = apply_filters( 'wow4result_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'wow4result_setup' );

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
	global $post;
	$postid = $post->ID;
	
	wp_enqueue_style('material-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons');
	wp_enqueue_style('bootstrap-material-design', get_stylesheet_directory_uri() . '/assets/css/bootstrap-material-design.css');
	wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
	wp_enqueue_style('google-montserrat-font', 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css'); 
	wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/assets/css/style.css');
	wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css');  
	if (is_singular('our_offering')):
		wp_enqueue_style('mCustomScrollbar-css', get_stylesheet_directory_uri() . '/assets/css/jquery.mCustomScrollbar.css');  
	endif;	
}
add_action('get_footer', 'enqueue_styles_footer');

function enqueue_styles_footer() {
	global $wp_query;
	wp_enqueue_script('jquery-js', get_stylesheet_directory_uri() .'/assets/js/jquery.js', false); 
	wp_enqueue_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js', false); 	
	wp_enqueue_script('popper-min', 'https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js', false); 
	
	//wp_enqueue_script('mCustomScrollbar-ja', get_stylesheet_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', false); 
	wp_enqueue_script('bootstrap-material-design', get_stylesheet_directory_uri() . '/assets/js/bootstrap-material-design.js', false, true); 
	wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', false); 
	if (is_page('video')):    	
		wp_enqueue_script('video-js', get_stylesheet_directory_uri() . '/assets/js/video.js', false); 
	endif; 
	if (is_singular('our_offering')): 
		wp_enqueue_script('mCustomScrollbar-js', get_stylesheet_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', false); 
		wp_enqueue_script('what_we_offer', get_stylesheet_directory_uri() . '/assets/js/what_we_offer.js', false); 
	endif;
	if ( $wp_query->is_posts_page ) :
		wp_enqueue_script('insights-js', get_stylesheet_directory_uri() . '/assets/js/insights.js', false); 
	endif; 
}
/**
 * Register custom fonts.
 */
function wow4result_fonts_url() {
	$fonts_url = ''; 
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'wow4result' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
} 
// Remove emoji script
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
add_filter( 'emoji_svg_url', '__return_false' );  

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function wow4result_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'wow4result_front_page_template' );

function wow4result_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
function wow4result_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'wow4result' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'wow4result' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * Twenty Seventeen doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}
if ( ! function_exists( 'wow4result_edit_link' ) ) :
	function wow4result_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'wow4result' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

//add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) || in_array('current-menu-ancestor', $classes))
		$classes[] = 'active';
	return $classes;
}

class Wow4result_Nav_Menu extends Walker_Nav_Menu {
	private $curItem;

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
	{
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		}
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		global $nav_menu_id; 

		$indent = str_repeat("\t", $depth); 
		$classes = array( 'sub-menu' );  
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		
		
		$output .= "{$n}{$indent}";
		$output .= '<div id="collapse_'.$nav_menu_id.'" class="collapse submenu" aria-labelledby="menu-item-'.$nav_menu_id.'" data-parent="#accordion">'; 
		$output .= "<ul$class_names>{$n}";
		
		//$output .= "\n$indent\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\n";
		$output .= "</ul></div>\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) { 
	/*print "<pre>";
	print_r($item);*/
	$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	$classes = empty( $item->classes ) ? array() : (array) $item->classes; 
	
	$wdm_postid    = url_to_postid( $item->url ); 
	$have_children    = false;

	$active_class = '';
	
	if (in_array('current-menu-item', $classes ) || in_array('current-menu-ancestor', $classes)){
            $active_class = 'active';
        }

	if(in_array('menu-item-has-children',$item->classes))
		$have_children = true;
	
	$submenu_class = '';
	
	if ( $have_children ) {
		$classes[] = ' menudropdown ' ;
		$new_class = " class='menudropdown ".$active_class."'" ;
		$submenu_class = "class='menu-link collapsed'";

	} else {
		$classes[] = '';
		$new_class = " class='".$active_class."'" ; 
		$submenu_class = "class='menu-link'";
	} 
	 
	/* -End of Wdm changes- */
	$class_names    = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	$class_names    = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';	 

	$id    = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );

	$id    = $id ? ' id="' . esc_attr( $id ) . '111"' : '';
	
	$output .= $indent . '<li' . $id . $new_class . '>';
	$atts            = array();
	
	$atts[ 'title' ]    = ! empty( $item->title ) ? $item->title : '';
	$atts[ 'target' ]   = ! empty( $item->target ) ? $item->target : '';
	$atts[ 'rel' ]      = ! empty( $item->xfn ) ? $item->xfn : '';
	$atts[ 'href' ]     = ! empty( $item->url ) ? $item->url : '';
	
	if ( $have_children ) {
		$atts['data-toggle']    = "collapse";
		$atts['aria-expanded']  = "false"; 
		$atts['id']  			= "parent_".$item->ID;
		$atts['data-target']  	= "#collapse_".$item->ID; 
		$atts['aria-controls']  = "collapse_".$item->ID;  
	} 

	$page_name = apply_filters( 'the_title', $item->title, $item->ID );
	$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
	$attributes = '';
 
	foreach ( $atts as $attr => $value ) {
		if ( ! empty( $value ) ) {
			$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
			$attributes .= ' ' . $attr . '="' . $value . '"';
		}
	}
	
	$item_output = $args->before;


	if($item->menu_item_parent > 0)
	{
		$submenu_class = '';
	}
	
	$item_output .= '<a '.$submenu_class.'';
	
	$item_output .= $attributes . '>';
	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ). $args->link_after;
	
	$item_output .= '</a>';
	$item_output .= $args->after;
	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
public function end_el( &$output, $item, $depth = 0, $args = array() ) {
	$output .= "</li>\n";
}


} 

function add_menu_id( $item_output, $item, $depth, $args ) {
	global $nav_menu_id;
	$nav_menu_id = __( $item->ID );
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'add_menu_id', 10, 4);
?>
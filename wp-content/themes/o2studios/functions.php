<?php
/**
 * Custom functions / External files
 */

require_once 'functions/example.php';



/**
 * Add support for useful stuff
 */

if ( function_exists( 'add_theme_support' ) )
{
    // Add support for document title tag
    add_theme_support( 'title-tag' );

    // Add Thumbnail Theme Support
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'custom-size', 700, 200, true );

    // Add Support for post formats
    // add_theme_support( 'post-formats', ['post'] );
    // add_post_type_support( 'page', 'excerpt' );

    // Localisation Support
    load_theme_textdomain( 'barebones', get_template_directory() . '/languages' );
}



/**
 * Remove junk
 */

define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
define( 'ICL_DONT_LOAD_LANGUAGES_JS', true );

add_filter('show_admin_bar', '__return_false');

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function barebones_remove_comments_rss( $for_comments )
{
    return;
}

add_filter( 'post_comments_feed_link', 'barebones_remove_comments_rss' );



/**
 * jQuery the right way
 */

function barebones_scripts()
{
    /*
     * For IE8 to play nice, you'll need to include your CSS here, for example:
     */
    // wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Font+Family' );
    // wp_enqueue_style( 'icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3', true );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.min.js', ['jquery'], null, true );
}

add_action( 'wp_enqueue_scripts', 'barebones_scripts' );



/**
 * Nav menus
 */

if ( function_exists( 'register_nav_menus' ) )
{
    register_nav_menus([
        'header' => 'Header',
        'footer' => 'Footer'
    ]);
}

function barebones_nav_menu_args( $args = '' )
{
    $args['container']       = false;
    $args['container_class'] = false;
    $args['menu_id']         = false;
    $args['items_wrap']      = '<ul class="%2$s">%3$s</ul>';

    return $args;
}

add_filter( 'wp_nav_menu_args', 'barebones_nav_menu_args' );



/**
 * Email
 */

function barebones_mail_from( $email )
{
    return get_option( 'admin_email' );
}

add_filter( 'wp_mail_from', 'barebones_mail_from' );


function barebones_mail_from_name( $name )
{
    return get_bloginfo( 'name' );
}

add_filter( 'wp_mail_from_name', 'barebones_mail_from_name' );



/**
 * Shortcodes ([button] shortcode included)
 */

function button_shortcode( $atts, $content = null )
{
    $atts['class']  = $atts['class'] ? $atts['class'] : 'btn';

    return '<a class="' . $atts['class'] . '" href="' . $atts['link'] . '">' . $content . '</a>';
}

add_shortcode( 'button', 'button_shortcode' );



/**
 * TinyMCE
 */

function barebones_mce_buttons_2( $buttons )
{
    array_unshift( $buttons, 'styleselect' );
    $buttons[] = 'hr';

    return $buttons;
}

add_filter( 'mce_buttons_2', 'barebones_mce_buttons_2' );


function barebones_tiny_mce_before_init( $settings )
{
    $style_formats = [
        // [
        //     'title'    => '',
        //     'selector' => '',
        //     'classes'  => ''
        // ]
    ];

    $settings['style_formats'] = json_encode( $style_formats );
    $settings['style_formats_merge'] = true;

    return $settings;
}

add_filter( 'tiny_mce_before_init', 'barebones_tiny_mce_before_init' );



/**
 * Get image URL for whatever size.
 */

function wp_get_attachment_image_url( $id, $size = 'full', $attrs = [] )
{
    $image = wp_get_attachment_image_src( $id, $size, $attrs );

    return $image[0];
}

function o2s_theme_setup() {
    add_image_size( 'section-thumbnail', 400, 99999 );
}
add_action( 'after_setup_theme', 'o2s_theme_setup' );

function get_the_multicol_content($content, $share_available = true, $special_columns = false){
	// run through a couple of essential tasks to prepare the content
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	// the first "more" is converted to a span with ID
	$columns = preg_split('/(<span id="more-\d+"><\/span>)|(<!--more-->)<\/p>/', $content);
	$col_count = count($columns);

  $spec_class = 'container';
  $match_height = '';
  if($special_columns) {
    $spec_class = 'content';
    $match_height = 'match-height';
  }

	if($col_count > 1) {
		for($i=0; $i<$col_count; $i++) {
			// check to see if there is a final </p>, if not add it
			if(!preg_match('/<\/p>\s?$/', $columns[$i]) )  {
				$columns[$i] .= '</p>';
			}
			// check to see if there is an appending </p>, if there is, remove
			$columns[$i] = preg_replace('/^\s?<\/p>/', '', $columns[$i]);
			// now add the div wrapper
			$columns[$i] = '<div class="dynamic-col-'.($i+1).' col col--xs-12 col--sm-12 col--md-6 col--lg-6 '.$match_height.'"><div class="'.$spec_class.'">'.$columns[$i].'</div></div>';
		}
		$content = join($columns, "\n").'<div class="clear"></div>';
	}	else {
		// this page does not have dynamic columns
		$content = '<div class="col col--xs-12 col--sm-12 col--md-12 col--lg-12"><div class="'.$spec_class.'">'.wpautop($content).'</div></div>';
	}
	// remove any left over empty <p> tags
	$content = str_replace('<p></p>', '', $content);
	return $content;
}

require 'includes/posttypes.php';

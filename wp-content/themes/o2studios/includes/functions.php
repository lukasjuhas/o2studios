<?php
//enable links
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

/**
 * Register widgets used in theme
 * @author Lukas Juhas
 * @version [version]
 * @date    2015-08-17
 * @return  [type]     [description]
 */
function register_widgets() {

  register_sidebar( array(
		'name'          => 'Header Widget Area',
		'id'            => 'header_widget_area',
		'before_widget' => '<div class="widget-area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'register_widgets' );

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

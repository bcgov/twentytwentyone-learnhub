<?php
/* enqueue scripts and style from parent theme */
   
function twentytwentyone_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_uri(),
	array( 'twenty-twenty-one-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyone_styles');

function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('course'));
    }
	return $query;
}
 
add_filter('pre_get_posts','searchfilter');
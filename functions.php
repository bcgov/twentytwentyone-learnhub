<?php
/* enqueue scripts and style from parent theme */
   
function twentytwentyone_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_uri(),
	array( 'twenty-twenty-one-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyone_styles');

function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('orderby', 'name');
        $query->set('order', 'ASC');
        $query->set('post_type', array('course'));
        
    }
	return $query;
}
 
add_filter('pre_get_posts','searchfilter');

// My Learning https://learning.gov.bc.ca/psc/CHIPSPLM/EMPLOYEE/ELM/c/LM_OD_EMPLOYEE_FL.LM_MYCOURSES_FL.GBL
// Approve Learning https://learning.gov.bc.ca/psc/CHIPSPLM/EMPLOYEE/ELM/c/NUI_FRAMEWORK.PT_LANDINGPAGE.GBL?&lp=ELM.EMPLOYEE.LM_HR_SELF_SERVICE_GBL&lp=ELM.EMPLOYEE.LM_HR_SELF_SERVICE_GBL

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
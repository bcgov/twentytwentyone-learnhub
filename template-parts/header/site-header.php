<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
$blog_info    = get_bloginfo( 'name' );
?>

<div id="bcgovmast">
<header id="mainheader" class="mainhead" role="banner">
<div class="alignwide">


<div style="display: flex; flex-direction: row;">
<div style="flex: 1;">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wordmark">
	<?php //the_custom_logo(); ?>
	Learning<span style="color: #ebba44; font-weight: bold;">HUB</span>
</a>
</div>
<div style="flex: 2 right;">
<nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'twentytwentyone' ); ?>">

    <a href="/">Home</a>
    <a href="/about/">About</a>
    <a href="/corporate-learning-partners/">Partners</a>
    <a href="/course/">All Courses</a>
    <a href="https://learning.gov.bc.ca/CHIPSPLM/signon.html" target="_blank" rel="noopener">
        PSA Learning System
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
        </svg>
    </a>

</nav><!-- #site-navigation -->
</div>
</div>
</div>

</header><!-- #masthead -->
</div>
<div id="searchbar" style="background-color: #01284f; ">
<div class="alignwide"> <!-- searchwrap -->
    <form method="get" action="https://wordpress.virtuallearn.ca/" class="searchform">
        <label for="coursesearch" class="sr-only" style="display: none">Search</label>
        <input type="search" id="coursesearch" class="coursesearchfield" name="s" required value="<?= esc_html( get_search_query() ) ?>">
        <input type="hidden" name="post_type" value="course">
        <button type="submit" class="searchsubmit" aria-label="Submit Search" style="font-size: 18px">
            Search
        </button>
    </form>
</div>
</div>
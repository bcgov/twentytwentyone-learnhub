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


<div class="headwrap">
<div style="flex: 1;">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wordmark">
	<?php //the_custom_logo(); ?>
	Learning<span style="color: #ebba44; font-weight: bold;">HUB</span>
</a>
</div>
<div style="flex: 2 right;">
<nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'twentytwentyone' ); ?>">
<div>
    <a href="/learninghub/">Home</a>
    <a href="/learninghub/about/">About</a>
    <a href="/learninghub/corporate-learning-partners/">Partners</a>
    <a href="/learninghub/learning-systems/">Learning Systems</a>
    <a href="/learninghub/course/">All Courses</a>
</div>
</nav><!-- #site-navigation -->
</div>
</div>
</div>

</header><!-- #masthead -->
</div>
<div id="searchbar" style="background-color: #01284f;">
<div class="alignwide"> <!-- searchwrap -->
    <form method="get" action="/learninghub/" class="searchform" style="float:right">
        <label for="s" class="sr-only" style="">Search</label>
        <input type="search" id="s" class="s" name="s" placeholder="Enter keywords here" required value="<?= esc_html( get_search_query() ) ?>">
        <button type="submit" class="searchsubmit" aria-label="Submit Search" style="font-size: 18px">
            Search
        </button>
    </form>
    <div style="clear:both"></div>
</div>
</div>

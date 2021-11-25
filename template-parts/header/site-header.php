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

<form role="search" 
        method="get" 
        action="https://learningcentre.gww.gov.bc.ca/learninghub/" 
        class=""
		style="float: right; margin-top: .75em">

    <label for="" class="sr-only">Search</label>
    <input type="search" 
            id="" 
            class="" 
            name="s"
			style="background-color: #28537d; border: 0; color: #FFF; font-size: 16px; width: 20em">

    <input type="hidden" name="post_type" value="courses">
    <button type="submit" class="" style="background-color: #145693; font-size: 16px; padding: .5em 1em;" aria-label="Submit Search">
        Search
    </button>

</form>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wordmark">
	<?php //the_custom_logo(); ?>
	Learning <span style="color: #ebba44">HUB</span>
</a>
</div>
</header><!-- #masthead -->

<?php get_template_part( 'template-parts/header/site-nav' ); ?>
</div>
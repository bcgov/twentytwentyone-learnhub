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

<div id="bcgovmast" style="background-color: #003265">
<header id="mainheader" class="mainhead" role="banner">
<div class="alignwide" style="padding: 1.4em 0;">

<img alt="Where Ideas Work logo" 
		class="wiw-logo" 
		height="48" 
		src="https://lc.virtuallearn.ca/portal/wp-content/uploads/sites/6/2021/07/where-ideas-work.png" 
		width="220">
		
<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php the_custom_logo(); ?>
</a>



</div>
</header><!-- #masthead -->

<?php get_template_part( 'template-parts/header/site-nav' ); ?>
</div>
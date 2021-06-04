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
<header id="" class="" role="banner">
<div class="alignwide" style="padding: 1em;">
<?php if ( has_custom_logo() ) : ?>
<?php the_custom_logo(); ?>
<?php endif; ?>
<a style="font-size: 1.5em; font-weight: bold; text-decoration: none;" href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php echo esc_html( $blog_info ); ?>
</a>
</div>
</header><!-- #masthead -->

<?php get_template_part( 'template-parts/header/site-nav' ); ?>
</div>
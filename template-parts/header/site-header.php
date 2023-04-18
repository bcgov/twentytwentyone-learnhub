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
<div style="">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wordmark">
	<?php //the_custom_logo(); ?>
	Learning<span style="color: #ebba44; font-weight: bold;">HUB</span>
</a>
</div>


<nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'twentytwentyone' ); ?>">
    <div class="menu-button-container">
        <button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list" aria-expanded="false">
            <span class="dropdown-icon open"><?php esc_html_e( 'Menu', 'twentytwentyone' ); ?>
                <?php echo twenty_twenty_one_get_icon_svg( 'ui', 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </span>
            <span class="dropdown-icon close"><?php esc_html_e( 'Close', 'twentytwentyone' ); ?>
                <?php echo twenty_twenty_one_get_icon_svg( 'ui', 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
            </span>
        </button><!-- #primary-mobile-menu -->
    </div><!-- .menu-button-container -->
    <?php
    wp_nav_menu(
        array(
            'theme_location'  => 'primary',
            'menu_class'      => 'menu-wrapper',
            'container_class' => 'primary-menu-container',
            'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
            'fallback_cb'     => false,
        )
    );
    ?>

</nav><!-- #site-navigation -->
</div>

</header><!-- #masthead -->
</div>
<div id="searchbar" style="background-color: #01284f; ">
<div class="alignwide">

<?php
$args = array(
    'post_type' => 'course',
    'order' => 'ASC',
	'numberposts' => -1
);
$courses = get_posts( $args ); 
?>






<form method="get" action="https://wordpress.virtuallearn.ca/" class="searchform">
<label for="coursesearch" class="sr-only" style="display: none">Search</label>
<input type="search" id="coursesearch" class="coursesearchfield" name="s" required value="<?= esc_html( get_search_query() ) ?>">
<input type="hidden" name="post_type" value="courses">
<button type="submit" class="searchsubmit" aria-label="Submit Search" style="font-size: 18px">
    Search
</button>
<!-- <span style="color:#FFF; font-size: 14px;">Suggested searches: <a href="/?s=flexiblebcps">#flexiblebcps</a> <a href="/?s=bcpsbelonging">#bcpsbelonging</a></span> -->
</form>





</div>
</div>
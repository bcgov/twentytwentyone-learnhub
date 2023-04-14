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
<div style="display:flex; flex-direction: row;">

<div style="">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="wordmark">
	<?php //the_custom_logo(); ?>
	Learning<span style="color: #ebba44; font-weight: bold;">HUB</span>
</a>
</div>

<div style="align-self: flex-end;">
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
</div>
</header><!-- #masthead -->
</div>
<div id="searchbar" style="background-color: #01284f; border-top: 1px solid #FFF;  position: relative; z-index: 100; height: auto;">
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
<input type="text" id="coursesearch" class="coursesearchfield" name="s" required>
<input type="hidden" name="post_type" value="courses">
<button type="submit" class="searchsubmit" aria-label="Submit Search">
    Search
</button>
<!-- <span style="color:#FFF; font-size: 14px;">Suggested searches: <a href="/?s=flexiblebcps">#flexiblebcps</a> <a href="/?s=bcpsbelonging">#bcpsbelonging</a></span> -->
</form>
<div id="courseresults"></div>





<script>
var data = [
<?php foreach($courses as $c) : ?>
<?php 
$linktopost = get_post_permalink($c->ID);
$desc = trim(strip_tags($c->post_content));
$description = preg_replace('/[^a-z0-9.]+/i', ' ', $desc);
$dm = get_the_terms( $c->ID, 'delivery_method');
$dm_name = trim($dm[0]->name);
$dm_slug = trim($dm[0]->slug);
$partner = get_the_terms( $c->ID, 'learning_partner');
$partner_name = trim($partner[0]->name);
$partner_slug = trim($partner[0]->slug);
$keys = get_the_terms( $c->ID, 'keywords');
$keys_string = join(', ', wp_list_pluck($keys, 'name'));
$exsys = get_the_terms( $c->ID, 'external_system', '', ', ', ' ' );
$system = $exsys[0]->name;
$exlink = get_post_meta($c->ID,'course_link');
?>
{
    "post_title": "<?= $c->post_title ?>",
    "post_link": "<?= $linktopost ?>",
    "post_content": "<?= $description ?>",
    "delivery_name": "<?= $dm_name ?>",
    "delivery_slug": "<?= $dm_slug ?>",
    "post_keywords": "<?= $keys_string ?>",
    "external_system": "<?= $system ?>",
    "partner_name": "<?= $partner_name ?>",
    "partner_slug": "<?= $partner_slug ?>",
    "course_link": "<?= $exlink[0] ?>"
},
<?php endforeach ?>
    ];

var txtbox = document.getElementById('coursesearch');
// txtbox.onfocus = function(e) {
//   document.getElementById('searchbar').style.height = '400px';
// }
txtbox.onkeyup = function(e) {
    var searchfield = txtbox.value;

    if(searchfield === '' || searchfield.length < 3)  {
      document.getElementById('courseresults').innerHTML = '';
      document.getElementById('searchbar').style.height = '80px';
      return;
    }
    if(searchfield.length > 2)  {
    document.getElementById('searchbar').style.height = '400px';
    var regex = new RegExp(searchfield, "i");
    var output = '<div class="coursebox" style="margin: 0 1em 1em 1em;">';
    data.forEach(function(item,index){
    if (
            (item.post_link.search(regex) != -1) || 
            (item.post_content.search(regex) != -1) || 
            (item.post_keywords.search(regex) != -1) || 
            (item.post_title.search(regex) != -1)
        ) {

            output += '<details class="course">';
            output += '<summary class="coursename">';
            output +=  item.post_title;
            output += '</summary>';
            //output += '<div style="padding: 0 1em;">';
            output += item.post_content;
            output += '<div style="color: #003366; font-size: 16px; font-weight: bold; padding: .5em 0 .75em 0">';
            output += '<a style="color: #003366;" href="/delivery_method/' + item.delivery_slug + '">' + item.delivery_name + '</a> offered by ';
            output += '<a style="color: #003366;" href="/learning_partner/' + item.partner_slug + '">' + item.partner_name + '</a> ';
            if(item.external_system) {
                output += ' in the <span style="">' + item.external_system + '</span> ';
            }
            output += '</div>';
            output += '<div><a class="outboundlink" href="' + item.course_link + '" target="_blank">';
            output += 'Launch <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/></svg>';
            output += '</a>';
            output += ' <span style="font-size: 12px"><a title="Permanent link to this course\'s page" style="text-decoration: none;" href="' + item.post_link + '"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16"><path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/><path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/></svg></a></span>';
            //output += '</div>';
            output += '</div>';
            output += '</details>';
        }
    });
    output += '</div>';
    document.getElementById('courseresults').innerHTML = output;
  }
};
</script>















</div>
</div>
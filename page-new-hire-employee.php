<?php
/**
 * The template for displaying Learning Journeys
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

?>
<style>
.groupbadge a {
    background-color: tomato;
    border-radius: .5em;
    color: #FFF;
    display: inline-block;
    font-size: 14px;
    padding: 0 1em;
    text-decoration: none;
}
</style>
<div class="wp-block-cover alignfull hero" 
	style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;background-color:#FFF;min-height:150px">
        <h1 class="alignfull has-text-align-center heroheader has-black-color has-text-color">Learning Journeys</h1>
</div>
<div class="alignwide">
<div style="margin-bottom: 0; text-align: center">
    <a style="background-color: #FFF; border: 1px solid #333; border-bottom: 0; border-top-left-radius: .5em; border-top-right-radius: .5em; display: inline-block; margin: .25em .25em 0 .25em; padding: .25em 2em; text-decoration: none;" 
        href="/learninghub/learning-journeys/new-hire-employee/">All Employees</a>
    <a style="background-color: #FFF; border-top-left-radius: .5em; border-top-right-radius: .5em; display: inline-block; margin: .25em .25em 0 .25em; padding: .25em 2em; text-decoration: none;"
        href="/learninghub/learning-journeys/new-people-leader/">People Leaders</a>
</div>
<div style="text-align: center">
    <a style="background-color: #FFF; border: 1px solid #333; border-bottom: 0; border-top-left-radius: .5em; border-top-right-radius: .5em; display: inline-block; margin: .25em .25em 0 .25em; padding: .25em 2em; text-decoration: none;" 
        href="/learninghub/learning-journeys/new-hire-employee/">New Hire Employees</a>
    <a style="background-color: #FFF; border-top-left-radius: .5em; border-top-right-radius: .5em; display: inline-block; margin: .25em .25em 0 .25em; padding: .25em 2em; text-decoration: none;"
        href="/learninghub/learning-journeys/existing-employees/">Existing Employees</a>
</div>

<div class="wp-block-columns alignwide">
	<div class="wp-block-column menus" style="background-color: #FFF; border-radius: .5em; flex: 50%; padding: 2%; margin-right: 1%;">
    <?php the_title( '<h2 class="has-extra-large-font-size">', '</h2>' ); ?>

<?php
$termID = 638;
$taxonomyname = "journey";
$custom_terms = get_term_children( $termID, $taxonomyname ); 
$children = array();
foreach ($custom_terms as $child) {
    $term = get_term_by( 'id', $child, $taxonomyname );
    $children[$term->term_order] = $term;
}
ksort($children);

foreach($children as $custom_term) {

    $term = get_term_by( 'id', $custom_term, $taxonomyname );
    wp_reset_query();
    $args = array(
        'post_type' => 'course',
        'orderby'   => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => 'journey',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<h3>'.$custom_term->name.'</h3>';

        while($loop->have_posts()) : $loop->the_post();
            echo '<div style="background-color: #fcf6ea; padding: 1em;">';
            echo '<div class="groupbadge">'; 
            echo the_terms( $post->ID, 'groups', '', ', ', ' ' ); 
            echo '</div>';
            echo '<div><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
            $refresh_cycle = get_post_meta(get_the_ID(), 'refresh_cycle', true);
            echo '<div>' . $refresh_cycle . '</div>';
            echo '</div>';
        endwhile;

     }
}
?>

</div>

</div>
<div style="height: 300px; width: 100%"></div>
<?php get_footer() ?>
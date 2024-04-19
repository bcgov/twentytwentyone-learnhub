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
<div style="text-align: center">
    <a style="background-color: #fcf6ea; display: inline-block; margin: 1em; padding: 1em;" 
        href="/learninghub/learning-journeys/new-hire-employee/">All Employees</a>
    <a style="background-color: #FFF; display: inline-block; margin: 1em; padding: 1em;" 
        href="/learninghub/learning-journeys/new-people-leader/">People Leaders</a>
</div>
<div style="text-align: center">
    <a style="background-color: #FFF; display: inline-block; margin: 1em; padding: 1em;" 
        href="/learninghub/learning-journeys/new-hire-employee/">New Hire Employees</a>
    <a style="background-color: #fcf6ea; display: inline-block; margin: 1em; padding: 1em;" 
        href="/learninghub/learning-journeys/existing-employees/">Existing Employees</a>
</div>

<div class="wp-block-columns alignwide" style="padding-top: 2em;">
	<div class="wp-block-column menus" style="background-color: #FFF; border-radius: .5em; flex: 50%; padding: 2%; margin-right: 1%;">
    <?php the_title( '<h2 class="has-extra-large-font-size">', '</h2>' ); ?>

    <?php
    wp_reset_query();
    $args = array(
        'post_type' => 'course',
        'orderby'   => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                
                'taxonomy' => 'journey',
                'field' => 'slug',
                'terms' => 'existing-employee',
            ),
        ),
     );

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        while($loop->have_posts()) : $loop->the_post();
            echo '<div style="background-color: #fcf6ea; padding: 1em;">';
            echo '<div class="groupbadge">'; 
            echo the_terms( $post->ID, 'groups', '', ', ', ' ' ); 
            echo '</div>';
            echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br>';
            $refresh_cycle = get_post_meta(get_the_ID(), 'refresh_cycle', true);
            echo $refresh_cycle;
            echo '</div>';
        endwhile;
     }

?>
</div>
<!-- <div class="wp-block-column menus" style="background-color: #FFF; border-radius: .5em; flex: 50%; padding: 2%; margin-right: 1%;">
<h2 class="has-extra-large-font-size">Existing Employees</h2>

</div> -->
</div>
<div style="height: 300px; width: 100%"></div>
<?php get_footer() ?>
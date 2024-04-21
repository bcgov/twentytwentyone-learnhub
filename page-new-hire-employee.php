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
<div>
<style>
.journeywrap {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
}
.clearboth {
    border-right: 2px solid #333; 
    flex: none; 
    grid-column-start: 1;
    grid-column-end: 3;
    height: 1em; 
    width: 50%;
}
.journeycourse {
    background-color: #fcf6ea;
    border-radius: .5em;
    padding: 1em;
    position: relative;
}
.journeycourse .time {
    background-color: #FFF;
    height: 1.45em;
    padding: 0;
    position: absolute;
    right: -29px;
    top: 41%;
    width: 1em;
}
.journeycourse .line {
    background-color: #003366;
    height: 100%;
    position: absolute;
    right: -20px;
    top: 0;
    width: 2px;
}
.course1 {
    grid-column: 1;
    grid-row: 1;
    margin-right: 1em;
    text-align: right;
}
.course2 .time {
    right: auto;
    left: -32px;
}
.course2 .line {
    right: auto;
    left: -22px;
}
.course2 {
    grid-column: 2;
    grid-row: 2;
    margin-left: 1em;
}
.course3 {
    grid-column: 1;
    grid-row: 3;
    margin-right: 20px;
    text-align: right;
}
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
    <a style="background-color: #FFF; border-top-left-radius: .5em; border-top-right-radius: .5em; display: inline-block; margin: .25em .25em 0 .25em; padding: .25em 2em; text-decoration: none;" 
        href="/learninghub/learning-journeys/new-hire-employee/">All Employees</a>
    <a style="background-color: transparent; border-top-left-radius: .5em; border-top-right-radius: .5em; display: inline-block; margin: .25em .25em 0 .25em; padding: .25em 2em; text-decoration: none;"
        href="/learninghub/learning-journeys/new-people-leader/">People Leaders</a>
</div>
<div style="text-align: center">
    <a style="background-color: #FFF; border-top-left-radius: .5em; border-top-right-radius: .5em; display: inline-block; margin: .25em .25em 0 .25em; padding: .25em 2em; text-decoration: none;" 
        href="/learninghub/learning-journeys/new-hire-employee/">New Hire Employees</a>
    <a style="background-color: transparent; border-top-left-radius: .5em; border-top-right-radius: .5em; display: inline-block; margin: .25em .25em 0 .25em; padding: .25em 2em; text-decoration: none;"
        href="/learninghub/learning-journeys/existing-employees/">Existing Employees</a>
</div>

<div class="wp-block-columns alignwide">
	<div class="wp-block-column menus" style="background-color: #FFF; border-radius: .5em; flex: 50%; padding: 2%; margin-right: 1%;">
    <?php the_title( '<h2 class="has-extra-large-font-size" style="text-align: center">', '</h2>' ); ?>


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
foreach($children as $custom_term) :
    $count = 0;

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
     if($loop->have_posts()): ?>

    <h3 style="font-weight: bold; text-align: center;"><?= $custom_term->name ?></h3>
    <div class="clearboth" style="margin-bottom: 0 !important;"></div>
    <div class="journeywrap" style="margin-top: 0 !important;">
    <?php while($loop->have_posts()) : $loop->the_post(); ?>
    <?php $count++ ?>
    <?php $c = 'two' ?>
    <?php if($count % 2 > 0) $c = 'one' ?>
    <div class="course<?= $count ?> <?= $c ?> journeycourse">
        <div class="head">
            <div class="groupbadge"> 
                <?php echo the_terms( $post->ID, 'groups', '', ', ', ' ' ); ?>
            </div>    
            <div><a href="<?= get_permalink() ?>"> <?= get_the_title() ?></a></div>
        </div>
        <div class="body">
            <?php $refresh_cycle = get_post_meta(get_the_ID(), 'refresh_cycle', true); ?>
            <div><?= $refresh_cycle ?></div>
            <!-- <div>Menu order: <?= $post->menu_order ?></div> -->
        </div>
        <div class="line"></div>
        <div class="time"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-352a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg></div>
    </div>
    <?php endwhile; // endof course loop ?>
    <?php endif; // are there posts? ?>
    <div class="clearboth"></div>
    </div>
<?php endforeach; // endof term loop ?>
    </div>

</div>
</div>
</div>
</div>
<div style="height: 300px; width: 100%"></div>
<?php get_footer() ?>
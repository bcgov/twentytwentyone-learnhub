<?php
/**
 * The template for displaying the course index page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0 
 */

get_header();


while ( have_posts() ) : // Start the Loop
	the_post();
	the_content();
endwhile; // End of the loop.
?>
<div class="wp-block-columns alignfull has-white-background-color has-background is-layout-flex wp-container-core-columns-layout-2 wp-block-columns-is-layout-flex" id="whatisthehub" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
    <div class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">
        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
            <h2 class="wp-block-heading has-extra-large-font-size">What is the LearningHUB?</h2>

            <p>In the B.C. Public Service, corporate learning is a shared space. 
                The Learning Centre and its partners offer hundreds of courses, 
                available to all BCPS employees. The Learning Hub is the place 
                to see that full catalogue.</p>
        </div>

        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)" id="homesearchbox">
            <form role="search" method="get" action="https://wordpress.virtuallearn.ca/learninghub/" class="wp-block-search__button-outside wp-block-search__text-button aligncenter wp-block-search">
                <label class="wp-block-search__label" for="wp-block-search__input-1">Search the full catalog</label>
                <div class="wp-block-search__inside-wrapper ">
                    <input class="wp-block-search__input" id="wp-block-search__input-1" placeholder="" value="" type="search" name="s" required/>
                    <button aria-label="Search" class="wp-block-search__button has-text-color has-white-color wp-element-button" type="submit">Search</button>
                </div>
            </form>
            <details>
                <summary>Suggested Searches</summary>
                <div style="background-color: #F1F1F1; border-radius: 5px; padding: .5em;">
                    <div><a href="/learninghub/?s=flexibleBCPS">#flexibleBCPS</a></div>
                    <p>Flexible workplaces? Managing remote teams? The courses and resources you need.</p>
                    </div>
                    <div style="background-color: #F1F1F1; border-radius: 5px; margin-top: 1em; padding: .5em;">
                    <div><a href="/learninghub/?s=BCPSBelonging">#BCPSBelonging</a></div>
                    <p>Great courses that cover equity, diversity and inclusion.</p>
                </div>
		    </details>
        </div>
    </div>
</div>
</div>
<div class="alignwide">
    <h3>How is learning organized?</h3>
    <p>Four types of categorization help you find exactly what you’re looking for: 
        group, topic, audience and delivery.</p>
<div style="background-color: #FFF; border-radius: .5em; margin: 1em 0; padding: 1em;">
<h4 class="alignwide" style="flex:none">Groups</h4>
<div class="wp-block-columns alignfull">
<?php 
$groups = get_terms( array(
    'taxonomy' => 'groups',
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'   => 'DESC'
) );

?>
<?php foreach($groups as $g): ?>
    <div class="wp-block-column" style="padding: 1em;">
    <a href="/learninghub/groups/<?= $g->slug ?>" style="text-decoration: none">
        <div class="groupicon group-<?= $g->slug ?>" style="color: #003366;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path style="color: #003366;" d="M448 256A192 192 0 1 0 64 256a192 192 0 1 0 384 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 80a80 80 0 1 0 0-160 80 80 0 1 0 0 160zm0-224a144 144 0 1 1 0 288 144 144 0 1 1 0-288zM224 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg></div>
        <div><span style="font-weight: bold; text-decoration: underline;"><?= $g->name ?></span></div>
        <div><?= $g->description ?></div>
    </a>
    </div>
<?php endforeach ?>

</div>
</div>
<div class="wp-block-columns alignfull">
<div class="wp-block-column"  style="background-color: #FFF; border-radius: .5em; padding: 1em;">
<h4 class="alignwide">Topics</h4>
<?php 
$topics = get_terms( array(
    'taxonomy' => 'topics',
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'   => 'DESC'
) ); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 

?>
<div style="columns:2 auto">
<?php foreach($topics as $t): ?>
<div><a style="font-weight: bold;" href="/learninghub/topics/<?= $t->slug ?>"><?= $t->name ?></a></div>
<?php endforeach ?>
</div>
</div>
</div>
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column">
<?php 
$audiences = get_terms( array(
    'taxonomy' => 'audience',
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'   => 'DESC'
) ); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 

?>
<div class="wp-block-column">
    <div style="background-color: #FFF; border-radius: .5em; margin-right: 1em; margin-top: 0; padding: 1em;">
    <h4>Audiences</h4>
    <?php foreach($audiences as $a): ?>
    <div class="" style="">
        <div>
            <a style="font-weight: bold;" href="/learninghub/audience/<?= $a->slug ?>"><?= $a->name ?></a>:
            <?= $a->description ?>
        </div>
    </div>
    <?php endforeach ?>
</div>
</div>
</div>
<div class="wp-block-column">
    <div style="background-color: #FFF; border-radius: .5em; padding: 1em;">
        <h4>Delivery Method</h4>
    <?php 
$delivery = get_terms( array(
    'taxonomy' => 'delivery_method',
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'   => 'DESC',
    'include' => array(3,37,82,236,410)
    ) ); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 
    
?>
<?php foreach($delivery as $d): ?>
    <div class="" style="">
        <div>
            <a style="font-weight: bold;" href="/learninghub/delivery_method/<?= $d->slug ?>"><?= $d->name ?></a>:
            <?= $d->description ?>
        </div>
    </div>

<?php endforeach ?>
</div>
</div>
</div>

<?php get_footer() ?>

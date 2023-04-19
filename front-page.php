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

?>




<?php
while ( have_posts() ) : // Start the Loop
	the_post();
	the_content();
endwhile; // End of the loop.
?>
<div class="alignwide">
<!-- wp:columns {"align":"full"} -->
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column" style="padding: 1em;">


    
<h3 class="alignwide">Learning Partners</h3>
<?php 
$learningpartners = get_terms( array(
    'taxonomy' => 'learning_partner',
    'hide_empty' => false,
    'orderby'    => 'count',
    'number' => 5,
    'order'   => 'DESC',
    'exclude' => [121,372,144]
) ); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 

?>
<?php foreach($learningpartners as $p): ?>
<a style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;" href="/learning_partner/<?= $p->slug ?>"><?= $p->name ?></a> 
<?php endforeach ?>
&hellip;<br> <a style="display: inline-block; margin-top: 1em;" class="" href="/learning-hub/corporate-learning-partners">See All Partners</a>


</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column" style="padding: 1em;">


<!-- wp:heading {"align":"wide"} -->
<h3 class="alignwide">Suggested Courses</h3>
<!-- /wp:heading -->
<!-- wp:buttons {"align":"wide"} -->
<div class="wp-block-buttons alignwide"><!-- wp:button {"style":{"color":{"background":"#003366"}}} -->
<a href="#" class="" style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;">Foundational/Mandatory</a> 
<!-- /wp:button -->

<!-- wp:button {"style":{"color":{"background":"#003366"}}} -->
<a href="#" class="" style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;">Supervisors and Managers</a>
<!-- /wp:button -->

<!-- wp:button {"style":{"color":{"background":"#003366"}}} -->
<a href="#" class="" style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;">People Leaders</a>
<!-- /wp:button --></div>
<!-- /wp:buttons -->



<h3 class="alignwide">Learning Systems</h3>
<?php 
$learningsystems = get_terms( array(
    'taxonomy' => 'external_system',
    'hide_empty' => false,
    'orderby'    => 'count',
    'number' => 5,
    'order'   => 'DESC'
) ); 

?>
<?php foreach($learningsystems as $s): ?>
<a style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;" href="/external_system/<?= $s->slug ?>"><?= $s->name ?></a> 
<?php endforeach ?>



</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column" style="padding: 1em;">
    

<?php 
$news_args = array(
    'post_type'                => 'post',
    'post_status'              => 'publish',
    'posts_per_page'           => 3,
    'ignore_sticky_posts'      => 0,
    'child_of'                 => 0,
    'parent'                   => 0,
    'orderby'                  => array('post_date' =>'ASC'),
    'hide_empty'               => 0,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'pad_counts'               => true, 
);
$news = null;
$news = new WP_Query($news_args);
if( $news->have_posts() ) : ?>

    <h3 class="alignwide">Recent News</h3>
    <?php while ($news->have_posts()) : $news->the_post(); ?>
    <div style="background: #FFF; padding: 1em;">
    <h4>
        <a href="<?= the_permalink() ?>">
            <?= the_title() ?>
        </a>
    </h4>
    <div>
        <?= the_excerpt() ?>
    </div>
    </div>
    <?php endwhile ?>
    
    <?php else: ?>
        <p>No news is bad news?</p>
    <?php endif; ?>
    <?php wp_reset_query($news); ?>


</div>
<!-- /wp:columns -->
</div>
</div>

<?php get_footer() ?>

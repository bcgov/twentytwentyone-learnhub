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
<div class="alignwide">
<!-- wp:columns {"align":"full"} -->
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column" style="padding: 1em;">


<h3>Suggested Searches</h3>
<div style="background-color: #FFF; border-radius: 5px; padding: .5em;">
<div><a style="font-weight: bold;" href="/learninghub/?s=flexibleBCPS">#flexibleBCPS</a></div>
<p>Flexible workplaces? Managing remote teams? The courses and resources you need.</p>
</div>
<div style="background-color: #FFF; border-radius: 5px; margin-top: 1em; padding: .5em;">
<div><a style="font-weight: bold;" href="/learninghub/?s=BCPSBelonging">#BCPSBelonging</a></div>
<p>Great courses that cover equity, diversity and inclusion.</p>
</div>


<?php 
$mand_args = array(
    'post_type'                => 'course',
    'post_status'              => 'publish',
    'posts_per_page'           => 100,
    'ignore_sticky_posts'      => 0,
    'child_of'                 => 0,
    'parent'                   => 0,
    'orderby'                  => array('date' =>'ASC'),
    'hide_empty'               => 0,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'pad_counts'               => true, 
    'tax_query' => array(
        array(
            'taxonomy' => 'keywords',
            'field'    => 'slug',
            'terms'    => 'mandatoryforall',
        )
    )
);
$mandatories = null;
$mandatories = new WP_Query($mand_args);
if( $mandatories->have_posts() ) : ?>

<h3 class="alignwide">Mandatory Courses</h3>
<?php while ($mandatories->have_posts()) : $mandatories->the_post(); ?>
<?php get_template_part( 'template-parts/course/single-course' );?>
<?php endwhile ?>
    

<?php endif; ?>
<?php wp_reset_query($mandatories); ?>
<a style="background-color: #FFF; border-radius: 5px; display: inline-block; font-weight: bold; padding: .5em 1em; margin: .1em; text-decoration: none;" class="" href="/learninghub/foundational-courses/">Learn More</a>




</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column" style="padding: 1em;">


<h3 class="alignwide">Suggested Courses</h3>

<a href="/learninghub/foundational-courses/" style="background-color: #FFF; border-radius: 5px; display: block; padding: .25em; margin: .1em; text-decoration: none;">Mandatory &amp; Foundational</a>
<a href="/learninghub/supervisors-and-managers/" style="background-color: #FFF; border-radius: 5px; display: block; padding: .25em; margin: .1em; text-decoration: none;">Supervisors &amp; Managers</a>
<a href="/learninghub/leadership/" style="background-color: #FFF; border-radius: 5px; display: block; padding: .25em; margin: .1em; text-decoration: none;">Leadership in the BCPS</a>



<h3 class="alignwide">Delivery Methods</h3>
<?php 
$deliverymethods = get_terms( array(
    'taxonomy' => 'delivery_method',
    'hide_empty' => false,
    'orderby'    => 'count',
    'number' => 5,
    'order'   => 'DESC'
) ); 

?>
<?php foreach($deliverymethods as $dm): ?>
<a style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;" href="/learninghub/delivery_method/<?= $dm->slug ?>"><?= $dm->name ?></a> 
<?php endforeach ?>

<!-- <h3 class="alignwide">Learning Systems</h3> -->
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
<!-- <a style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;" href="/learninghub/external_system/<?= $s->slug ?>"><?= $s->name ?></a>  -->
<?php endforeach ?>

    
<h3 class="alignwide">Learning Partners</h3>
<?php 
$learningpartners = get_terms( array(
    'taxonomy' => 'learning_partner',
    'hide_empty' => false,
    'orderby'    => 'count',
    'number' => 8,
    'order'   => 'DESC',
    'exclude' => [121,372,144]
) ); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 

?>
<?php foreach($learningpartners as $p): ?>
<a style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;" href="/learninghub/learning_partner/<?= $p->slug ?>"><?= $p->name ?></a> 
<?php endforeach ?>
and many more &hellip; <br> <a style="background-color: #FFF; border-radius: 5px; display: inline-block; font-weight: bold; padding: .5em 1em; margin: .1em; text-decoration: none;" class="" href="/learninghub/corporate-learning-partners">See All Partners</a>


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
<div style="background: #FFF; border-radius: 5px; padding: .5em;">
    <div style="background-color: #ebf6ff; border-radius: 5px; float: right; font-size: 14px; line-height: 1.3em; margin: 0 0 3em 1em; padding: .5em; text-align: center; text-transform: uppercase; width: 3.5em;">
        <?php echo get_the_date('M') ?>
        <span style="font-size: 20px; font-weight: bold;"><?php echo get_the_date('d') ?></span>
    </div>
    <div>
        <a style="font-weight: bold;" href="<?= the_permalink() ?>">
            <?= the_title() ?>
        </a>
    </div>
    <div>
        <?= the_excerpt() ?>
    </div>
</div>
<?php endwhile ?>
    
<?php else: ?>
    <p>No news is bad news?</p>
<?php endif; ?>
<?php wp_reset_query($news); ?>
<a style="background-color: #FFF; border-radius: 5px; display: inline-block; font-weight: bold; padding: .5em 1em; margin: .1em; text-decoration: none;" class="" href="/learninghub/foundational-courses/">
    Read Past News
</a>

</div>
<!-- /wp:columns -->
</div>
</div>

<?php get_footer() ?>

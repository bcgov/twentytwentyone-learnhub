<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<header class="alignfull" style="background: #FFF; padding: 2em;">
    <div class="alignwide">
        <h1><?= the_title() ?></h1>
    </div>
</header><!-- .page-header -->
	
<div class="alignwide">


<!-- wp:columns {"align":"full"} -->
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column" style="flex: 66%;">

		<?php the_content(); ?>

</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column" style="flex: 29%; padding: 0 2%;">

<h4>Suggested Courses</h4>
<div style="background-color: #FFF; border-radius: 5px; padding: .5em;">
<div>
    <a href="/learninghub/foundational-courses/">Mandatory &amp; Foundational</a>
</div>
<div>
    <a href="/learninghub/supervisors-and-managers/">Supervisors &amp; Managers</a>
</div>
<div>
    <a href="/learninghub/leadership/">Leadership in the BCPS</a>
</div>
</div>
<h4>Suggested Searches</h4>
<div style="background-color: #FFF; border-radius: 5px; padding: .5em;">
<div><a href="/learninghub/?s=flexibleBCPS">#flexibleBCPS</a></div>
<p>Flexible workplaces? Managing remote teams? The courses and resources you need.</p>
</div>
<div style="background-color: #FFF; border-radius: 5px; margin-top: 1em; padding: .5em;">
<div><a href="/learninghub/?s=BCPSBelonging">#BCPSBelonging</a></div>
<p>Great courses that cover equity, diversity and inclusion.</p>
</div>
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

    <h4 class="alignwide">Recent News</h4>
    <div style="background: #FFF; border-radius: 5px; padding: .5em;">
    <?php while ($news->have_posts()) : $news->the_post(); ?>
    <div>
        <a href="<?= the_permalink() ?>">
            <?= the_title() ?>
        </a>
    </div>
    <?php endwhile ?>
	</div>
    
<?php else: ?>
    <p>No news is bad news?</p>
<?php endif; ?>
<?php wp_reset_query($news); ?>

<!-- /wp:column -->

</div>
</div>
</div>
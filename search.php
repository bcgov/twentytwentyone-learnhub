<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();


	?>
	<header class="entry-header alignfull" style="background: #FFF; padding: 2em;">
		<div class="alignwide">
		<?php 
		$resultcount = (int) $wp_query->found_posts;
		$plural = 'course';
		if($resultcount > 0) $plural = 'courses';
		?>
		We found 
		<span style="background-color: #F1F1F1; border-radius: 10px; display: inline-block; font-weight: bold; padding: 0 .5em;">
			<?= $resultcount ?>
		</span> 
		<?= $plural ?> which match your search for 
		<?php
		printf(
			/* translators: %s: Search term. */
			esc_html__( '"%s"', 'twentytwentyone' ),
			'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
		);
		?>
		</div>
	</header><!-- .page-header -->
	
	<div class="alignwide">


<!-- wp:columns {"align":"full"} -->
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column" style="flex: 66%;">
<div class="">
	<?php if($resultcount > 0): ?>
<button id="expandcollapse" style="background: #FFF; border:0; border-radius: 5px; color: #333; font-size: 14px; float: right; padding: 0 1em;">
    Expand All
</button>
<?php endif ?>
<div style="clear: both"></div>
<?php if ( have_posts() ) { ?>
<?php
	// Start the Loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/course/single-course' );

	} // End the loop.
?>
 <?php

// If no content, include the "No posts found" template.
} else {
get_template_part( 'template-parts/content/content-none' );
}
?>
<script>
<?php if($resultcount <= 3): ?>
document.body.querySelectorAll('details').forEach((e) => {
	(e.hasAttribute('open')) ? e.removeAttribute('open') : e.setAttribute('open',true);
});
<?php endif ?>

let exco = document.getElementById('expandcollapse');
exco.addEventListener('click', (e) => { 
        e.preventDefault();
		if(exco.innerHTML == 'Collapse All') {
			exco.innerHTML = 'Expand All';
		} else {
			exco.innerHTML = 'Collapse All';
		}
		toggleAll();
});
function toggleAll() {
    let foo = document.body.querySelectorAll('details').forEach((e) => {
        (e.hasAttribute('open')) ? e.removeAttribute('open') : e.setAttribute('open',true);
    });
    return foo;
}
</script>
</div>
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
</div>


<?php 
	// Previous/next page navigation.
	//the_posts_navigation();?>
	<div class="alignfull" style="background: #FFF;">
		<!-- <div class="nav-next alignright"><?php next_posts_link( 'Next Courses' ); ?></div> -->
		<div class="alignwide">
			<?php echo the_posts_pagination() ?>
		</div>
		<!-- <div class="nav-previous"><?php previous_posts_link( 'Previous Courses' ); ?></div>	 -->
	</div>





<?php 
get_footer();

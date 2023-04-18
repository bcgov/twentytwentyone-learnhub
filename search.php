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

if ( have_posts() ) {
	?>
	<header class="entry-header alignfull" style="background: #FFF; padding: 2em;">
		<div class="alignwide">
		


		<?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					'We found %d course which match your search ',
					'We found %d courses which match your search ',
					(int) $wp_query->found_posts,
					'twentytwentyone-learninghub'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
					<?php
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'for "%s"', 'twentytwentyone' ),
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

<?php
	// Start the Loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/course/single-course' );

	} // End the loop.
?>
</div>
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column" style="flex: 29%; padding: 0 2%;">

<h4>Suggested Courses</h4>
<div style="background-color: #FFF; border-radius: 5px; padding: .5em;">
<div>
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/foundational-courses/">Mandatory &amp; Foundational</a>
</div>
<div>
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/supervisors-and-managers/">Supervisors &amp; Managers</a>
</div>
<div>
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/leadership/">Leadership in the BCPS</a>
</div>
</div>
<h4>Suggested Searches</h4>
<div style="background-color: #FFF; border-radius: 5px; padding: .5em;">
<div><a href="/learninghub/?s=flexiblebcps&post_type=courses">#flexibleBCPS</a></div>
<p>Flexible workplaces? Managing remote teams? The courses and resources you need.</p>
</div>
<div style="background-color: #FFF; border-radius: 5px; margin-top: 1em; padding: .5em;">
<div><a href="/learninghub/?s=flexiblebcps&post_type=courses">#BCPSBelonging</a></div>
<p>Great courses that cover equity, diversity and inclusion.</p>

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

	// If no content, include the "No posts found" template.
} else {
	get_template_part( 'template-parts/content/content-none' );
}

get_footer();

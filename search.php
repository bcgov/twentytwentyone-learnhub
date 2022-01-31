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
	<header class="entry-header alignfull" style="background: #FFF; padding: 2em 2em 3em 2em;">
		<div class="alignwide">
		<h1 class="page-title">
			<?php
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'Results for "%s"', 'twentytwentyone' ),
				'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</h1>


		<?php
		printf(
			esc_html(
				/* translators: %d: The number of search results. */
				_n(
					'We found %d course for your search.',
					'We found %d courses for your search.',
					(int) $wp_query->found_posts,
					'twentytwentyone-learninghub'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
	        </div>
	</header><!-- .page-header -->
	<div class="entry-content">
	<?php
	// Start the Loop.
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/course/single-course' );

	} // End the loop.
?></div><?php 
	// Previous/next page navigation.
	//the_posts_navigation();?>
	<div class="alignwide" style="background: #FFF; margin: 3em auto; padding: 2em;">
		<!-- <div class="nav-next alignright"><?php next_posts_link( 'Next Courses' ); ?></div> -->
		<div class="aligncenter">
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

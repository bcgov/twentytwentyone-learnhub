<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	//get_template_part( 'template-parts/content/content-single' );
?>


<div class="wp-block-cover alignfull has-background-dim-80 has-background-dim hero" 
	style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;background-color:#28537d;min-height:300px">
		
		<?php $thum = get_the_post_thumbnail_url(get_the_ID(),'full') ?>

			<img loading="lazy" 
					class="wp-block-cover__image-background wp-image-4447" 
					alt="" 
					src="<?= $thum ?>" 
					tyle="object-position:71% 18%" 
					data-object-fit="cover" 
					data-object-position="71% 18%" 
					sizes="(max-width: 1352px) 100vw, 1352px" 
					width="1352" 
					height="888">

	<div class="wp-block-cover__inner-container">
		<?php the_title( '<h1 class="alignfull has-text-align-center heroheader has-white-color has-text-color">', '</h1>' ); ?>
		<div style="text-align: center">
			<em>Posted on <?php the_date() ?></em>
		</div>
	</div>
</div>


<div class="entry-content">
<div style="background-color: #FFF; padding: 1em;">
<?php the_content() ?>
</div>
</div>
<div class="alignfull" style="background-color: #FFF; padding: 1em;">
<?php 
	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}

	// Previous/next post navigation.
	$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
	$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

	$twentytwentyone_next_label     = esc_html__( 'Next post', 'twentytwentyone' );
	$twentytwentyone_previous_label = esc_html__( 'Previous post', 'twentytwentyone' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
	?>
	</div>
	<?php
endwhile; // End of the loop.

get_footer();

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
?>
<?php 
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	the_content();
	//get_template_part( 'template-parts/content/content-page' );
endwhile; // End of the loop.
?>




<div class="alignfull" style="background-color: #c3d4e4;">
<div class="entry-content">
<div style="margin-top: 1em">
<?php
$args = array(
	'numberposts' => 10
);
?>
<?php $latest_posts = get_posts( $args ) ?>
<?php foreach($latest_posts as $post) : ?>
<?php setup_postdata( $post ) ?>
<div class="bg-white my-1">
	<div>
        <?php if($post->news_link): ?>
        <a href="<?php echo $post->news_link ?>" target="_blank" rel="noopener" title="<?php the_title() ?>">
            <?php twenty_twenty_one_post_thumbnail('medium', ['class' => '', 'title' => 'Feature image', 'alt' => 'Feature image']); ?>
		</a>
        <?php else: ?>
		<a href="<?php the_permalink() ?>"  title="<?= the_title() ?>">
            <?php twenty_twenty_one_post_thumbnail('medium', ['class' => '', 'title' => 'Feature image', 'alt' => 'Feature image']); ?>
		</a>
        <?php endif ?>
	</div>
	<div class="hubtitle">
        <?php if($post->news_link): ?>
        <h3>
            <a href="<?php echo $post->news_link ?>" target="_blank" rel="noopener" title="<?php the_title() ?>">
				<?php the_title() ?>
			</a>
		</h3>
        <?php else: ?>
        <h3>
			<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
				<?php the_title() ?>
			</a>
		</h3>
        <?php endif ?>

    </div>
	<div class="hubexcerpt flexible">
        <?php the_excerpt(); ?>
	</div>
    <div class="hublink">
        <?php if($post->news_link): ?>
            <a href="<?php echo $post->news_link ?>" target="_blank" rel="noopener">Read More</a> <small><em>(opens in new tab)</em></small>
        <?php else: ?>
            <a href="<?= the_permalink() ?>">Read More</a>
        <?php endif ?>
    </div>
</div>

<?php endforeach ?>

</div>
</div>
</div>






<?php get_footer() ?>
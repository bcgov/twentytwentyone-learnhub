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

<div class="wp-block-cover alignfull has-white-background-color has-background-dim" style="background-color: #FFF; min-height:100px">
<div class="wp-block-cover__inner-container">
<p class="has-text-align-center mb-1">Search the catalogue, or 
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/course/" data-type="page">see a list of all courses</a>.
</p>
<form role="search" 
        method="get" 
        action="https://learningcentre.gww.gov.bc.ca/learninghub/" 
        class="wp-block-search__button-inside wp-block-search__icon-button wp-block-search">
<div class="wp-block-search__inside-wrapper">

    <label for="wp-block-search__input-1" class="sr-only">Search</label>
    <input type="search" 
            id="wp-block-search__input-1" 
            class="wp-block-search__input" 
            name="s">

    <input type="hidden" name="post_type" value="courses">
    <button type="submit" class="wp-block-search__button" aria-label="Submit Search">
        Search
    </button>
</div>
</form>
</div>
</div>
<div class="has-text-align-center has-black-color has-text-color has-small-font-size" style="background-color: #FFF; margin:0; padding: 0 0 3em 0;">
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/foundational-courses/">Mandatory &amp; Foundational Courses</a> | 
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/supervisors-and-managers/">Supervisors &amp; Managers</a> | 
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/leadership/">Leadership in the BCPS</a>
</div>



<div class="alignfull" style="background-color: #c3d4e4; margin: 0;">
<div class="alignwide">
<div class="hubgrid">
<div class="hubgridinner">
<?php
$args = array(
	'numberposts' => 4
);
?>
<?php $latest_posts = get_posts( $args ) ?>
<?php $count = 1 ?>
<?php foreach($latest_posts as $post) : ?>
<?php setup_postdata( $post ) ?>
<div class="hubcard">
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
            <a href="<?php echo $post->news_link ?>" target="_blank" rel="noopener">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                    <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                </svg>
            </a>
        <?php else: ?>
            <a href="<?= the_permalink() ?>">Read More</a>
        <?php endif ?>
    </div>
</div>
<?php $count++ ?>
<?php if($count%2>0): ?>
</div>
<div class="hubgridinner">
<?php endif ?>
<?php endforeach ?>


</div>

</div>
</div>
<div class="alignwide" style="text-align: center">
<div class="newslink" style="padding: 1em 2em 2em 2em">
    <a class="wp-block-button__link has-background" style="background-color: #145693; border-radius: 3px; display: block; margin: 0 auto;" href="http://learningcentre.gww.gov.bc.ca/learninghub/news/">
        Read Past Articles
    </a>
</div>
</div>
</div>






<div class="alignfull" style="background-color: #FFF; margin: 0; padding: 4em 2em; text-align: center">
<h2>Learning is brought to you by&hellip;</h2>
<div class="alignfull" style="padding: 2em 0;">
<img src="https://learningcentre.gww.gov.bc.ca/learninghub/wp-content/uploads/sites/6/2021/10/partner-logos-small-greyscale.jpg" 
    alt="Learning Partner Logos"
    height="86"
    width="421">
</div>
<div>
    <a class="wp-block-button__link has-background" 
        style="background-color: #145693; border-radius: 3px; " 
        href="http://learningcentre.gww.gov.bc.ca/learninghub/corporate-learning-partners/">
            Meet the Partners
        </a>
</div>
</div>




<?php get_footer() ?>
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
<div class="wp-block-cover alignfull has-white-background-color has-background-dim" style="min-height:260px">
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
<p class="has-text-align-center mt-1">
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/foundational-courses/">Foundational Courses</a> | 
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/supervisors-and-managers/">Supervisors and Managers</a> | 
    <a href="https://learningcentre.gww.gov.bc.ca/learninghub/leadership/">Leadership</a>
</p>
</div>
</div>

<?php 
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	the_content();
	//get_template_part( 'template-parts/content/content-page' );
endwhile; // End of the loop.
?>
<?php
$args = array(
	'numberposts' => 4
);
?>

<div class="alignfull" style="background-color: #FFF; padding: 4em 2em; text-align: center">
<h2>Learning is brought to you by&hellip;</h2>
<div class="alignfull" style="padding: 2em 0;">
<?php
$terms = get_terms( array(
    'taxonomy' => 'learning_partner',
    'hide_empty' => true,
    'orderby'    => 'count',
    'number' => 5,
    'order'   => 'DESC',
    'exclude' => 408
) );
?>
<?php foreach( $terms as $category ) : ?>
    <?php
    $partnerlogo = '';
    $term_vals = get_term_meta($category->term_id);
    foreach($term_vals as $key=>$val) {
        if($key == 'category-image-id') {
            $partnerlogo = $val[0];
        }  
    } 
    ?>
    <?php if(!empty($partnerlogo)): ?>
    <?php $image_attributes = wp_get_attachment_image_src( $attachment_id = $partnerlogo, $size = 'small' ) ?>
    <?php if ( $image_attributes ) : ?>
    <!-- <a class="logolink" href="<?= esc_url( get_category_link( $category->term_id ) ) ?>"> -->
        <img alt="Partner Logo"
            height="25" 
            src="<?php echo $image_attributes[0]; ?>" 
            width="100"
			style="display: inline-block; filter: grayscale(1); margin: 0 1em;">
    <!-- </a> -->
    <?php endif; ?>
    <?php endif; ?>
<?php endforeach ?>

</div>
<div>
    <a class="wp-block-button__link has-background" 
        style="background-color: #145693; border-radius: 3px; " 
        href="/learninghub/corporate-learning-partners/">
            Meet the Partners
        </a>
</div>
</div>




<div class="alignwide">
<div class="hubgrid">
<div class="hubgridinner">
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
        <?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?>
	</div>
    <div class="hublink">
        <?php if($post->news_link): ?>
            <a href="<?php echo $post->news_link ?>" target="_blank" rel="noopener">Read More</a>
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




<?php get_footer() ?>
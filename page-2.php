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
	the_content();
	//get_template_part( 'template-parts/content/content-page' );
endwhile; // End of the loop.
?>
<?php
$args = array(
	'numberposts' => 4
);
?>

<div class="wp-block-columns alignwide">
<?php $latest_posts = get_posts( $args ) ?>
<?php foreach($latest_posts as $post) : ?>
<?php setup_postdata( $post ) ?>
<div class="wp-block-column" style="flex-basis:50%">
	<div style="margin: 0">
		<a href="<?php the_permalink() ?>">
			<?php twenty_twenty_one_post_thumbnail(); ?>
		</a>
	</div>
	<div class="" style="background-color:#FFF; margin: 0; padding: 1em;">
		<h3>
			<a href="<?php the_permalink() ?>">
				<?php the_title() ?>
			</a>
		</h3>
		<div>
			<?php the_excerpt() ?>
		</div>
	</div>
</div>
<?php endforeach ?>
</div>

<div class="alignfull" style="background-color: #FFF; padding: 1em; text-align: center">

<h2>Learning is brought to you by&hellip;</h2>

<?php
$terms = get_terms( array(
    'taxonomy' => 'learning_partner',
    'hide_empty' => false,
    'orderby'    => 'count',
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
    <?php $image_attributes = wp_get_attachment_image_src( $attachment_id = $partnerlogo, $size = 'thumbnail' ) ?>
    <?php if ( $image_attributes ) : ?>
    
    <img src="<?php echo $image_attributes[0]; ?>" 
            width="100"
			style="filter: grayscale(1);">

    <?php endif; ?>
    <?php endif; ?>

<?php endforeach ?>
<div><a class="wp-block-button__link has-background" style="background-color: #145693;" href="/portal/corporate-learning-partners/">Meet the learning partners</a></div>

</div>


<?php get_footer() ?>
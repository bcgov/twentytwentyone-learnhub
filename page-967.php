<?php
/**
 * The template for displaying all Learning Partners
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

?>
<div class="dark-wrap">
<div class="wp-block-columns alignwide" id="pagetop">
<div class="wp-block-column" style="flex-basis:33.33%">
	<?php twenty_twenty_one_post_thumbnail(); ?>
</div>
<div class="wp-block-column">
	<?php the_title( '<h1 class="pagehead">', '</h1>' ); ?>
</div>
</div>
</div>
<div class="entry-content">
    <?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	the_content();
endwhile; // End of the loop.
?>
<?php
$terms = get_terms( array(
    'taxonomy' => 'learning_partner',
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'   => 'DESC',
    'exclude' => 408
) );
?>
</div> <!-- /.entry-content -->
<div class="alignwide" style="display: flex; flex-direction: row; flex-wrap: wrap;">
<?php foreach( $terms as $category ) : ?>
    
    <?php
    $category_link = sprintf( 
        '<a href="%1$s" title="%2$s" class="partnerofferings">View courses offered by %3$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name )
    );
    $partnerurl = '';
    $partnerlogo = '';
    $term_vals = get_term_meta($category->term_id);
    foreach($term_vals as $key=>$val){
        //echo $val[0] . '<br>';
        if($key == 'partner-url') {
            $partnerurl = $val[0];
        }
        if($key == 'category-image-id') {
            $partnerlogo = $val[0];
        }
        
    } 

    ?>
    <div style="background-color: #FFF; flex-basis: 48%; margin: 1%; padding: 1em;">


    <?php if(!empty($partnerlogo)): ?>
    
    <?php $image_attributes = wp_get_attachment_image_src( $attachment_id = $partnerlogo, $size = 'large' ) ?>
    <?php if ( $image_attributes ) : ?>
    <img src="<?php echo $image_attributes[0]; ?>" 
            width="<?php echo $image_attributes[1]; ?>" 
            height="<?php echo $image_attributes[2]; ?>">
    <?php endif; ?>
    <?php endif; ?>

   <h3><?= esc_html( $category->name ) ?> </h3>
    <div><?= sprintf( esc_html__( '%s', 'textdomain' ), $category->description ) ?></div>
    <div><?= sprintf( esc_html__( '%s courses', 'textdomain' ), $category->count ) ?></div>
    <?php if($category->count > 0): ?>
    <?= sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) ?>
    <?php else: ?>
        <div><em>This partner does not currently have any courses listed in the Hub.</em></div>
    <?php endif ?>


    <?php if(!empty($partnerurl)): ?>
    <div>
        <a class="partner-url" 
            target="_blank" 
            rel="noopener" 
            href="<?= $partnerurl ?>">
                View Partner Website
        </a>
    </div>
    <?php endif ?>


</div>

<?php endforeach ?>
</div> <!-- /wp-block-columns -->


<?php get_footer() ?>

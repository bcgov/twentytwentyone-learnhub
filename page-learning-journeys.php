<?php
/**
 * The template for displaying Learning Journeys
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

?>

<div class="wp-block-cover alignfull has-background-dim-80 has-background-dim hero" 
	style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;background-color:#28537d;min-height:100px">
		
	<div class="wp-block-cover__inner-container">
		<?php the_title( '<h1 class="alignfull has-text-align-center heroheader has-white-color has-text-color">', '</h1>' ); ?>
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
    'taxonomy' => 'journey',
    'hide_empty' => false,
    'orderby'    => 'count',
    'order'   => 'DESC'
) ); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 
//'exclude' => [121,372,144]
?>
</div> <!-- /.entry-content -->



    <!-- <div class="entry-content searchbox" style="text-align: center">
        <input class="search form-control mb-3" placeholder="Type here to filter partners">
    </div> -->
	
<div class="alignwide">


<?php foreach( $terms as $category ) : ?>
<div> 
    <?php
    $pcount = $category->count . ' course';
    if($category->count > 1) $pcount = $category->count . ' courses';
    $category_link = sprintf( 
        '<a href="%1$s" title="%2$s" class="partnerofferings">View %3$s from this partner</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $pcount )
    );
    ?>
    <h3><?= esc_html( $category->name ) ?> </h3>

    <div class="">
    <?= sprintf( esc_html__( '%s', 'textdomain' ), $category->description ) ?>
    </div>
 
    
</div>

<?php endforeach ?>

</div>

<?php get_footer() ?>

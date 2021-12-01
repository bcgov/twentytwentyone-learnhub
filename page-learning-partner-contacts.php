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
    'exclude' => [372]
) ); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 
?>
</div> <!-- /.entry-content -->

<div id="partnerlist">

    <!-- <div class="entry-content searchbox" style="text-align: center">
        <input class="search form-control mb-3" placeholder="Type here to filter partners">
    </div> -->
	
<div class="entry-content"  id="partnerlist">
<div class="wp-block-cover has-white-background-color has-background-dim" style="margin-top: 1em; min-height:100px;">
    <div class="wp-block-cover__inner-container">
        <input class="search" placeholder="Search within this page&hellip;">
    </div>
</div>
<div class="list">
<?php foreach( $terms as $category ) : ?>
    
    <?php
    
    if($category->count > 1) $pcount = $category->count . ' courses';
    $category_link = sprintf( 
        '<a href="%1$s" title="%2$s" class="partnerofferings">%2$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( '%s', 'textdomain' ), $category->name ) )
        
    );
    $partnerurl = '';
    $partnercontact = '';
    $partnerlogo = '';
    $term_vals = get_term_meta($category->term_id);
    foreach($term_vals as $key=>$val){
        //echo $val[0] . '<br>';
        if($key == 'partner-url') {
            $partnerurl = $val[0];
        }
        if($key == 'partner-contact') {
            $partnercontact = $val[0];
        }
        if($key == 'category-image-id') {
            $partnerlogo = $val[0];
        }  
    } 
    ?>

    <div class="bg-white p-1 my-1">
      
    <div class="pname">
        <strong><?= sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) ?></strong>
    </div>

    <?php if(!empty($partnerurl)): ?>
    <div class="">
        <a target="_blank" 
            rel="noopener" 
            href="<?= $partnerurl ?>">
                Partner Website
        </a>
    </div>
    <?php endif ?>

    <?php if(!empty($partnercontact)): ?>
    <div class="partner-contact">
        <?= $partnercontact ?>
    </div>
    <?php endif ?>

    </div>

<?php endforeach ?>
</div>
</div> <!-- /.alignwide -->


<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>

var courseoptions = {
    valueNames: [ 'pname', 'partner-contact' ]
};
var partners = new List('partnerlist', courseoptions);


</script>
<?php get_footer() ?>

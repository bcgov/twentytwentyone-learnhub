<?php
/**
 * The template for displaying the course index page
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
while ( have_posts() ) : // Start the Loop
	the_post();
	the_content();
endwhile; // End of the loop.
?>

<!-- wp:columns {"align":"full"} -->
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column" style="padding: 1em;">
<div class="">
    List of courses: <a href="#">Newest to Oldest</a> <a href="#">Alphabetical List</a>
</div>

</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column" style="padding: 1em;">
<h3>#flexibleBCPS</h3>
<p>Flexible workplaces? Managing remote teams? The courses and resources you need.</p>
<details>
    <summary>Browse Courses</summary>
<?php
$keyargs = array(
    'post_type' => 'course',
    'order' => 'ASC',
	'numberposts' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'keywords',
			'field'    => 'slug',
			'terms'    => 'flexiblebcps'
		)
	)
);
$flexiblebcps = get_posts( $keyargs );
?>
<div class="flexiblebcps">
<?php foreach($flexiblebcps as $c) : ?>
    <details class="course">
    <summary class="coursename">
        <?= $c->post_title ?>
    </summary>
    <div class="delivery-method">
        <?php the_terms( $c->ID, 'delivery_method', '', ', ', ' ' ); ?>
    </div>
    <?= $c->post_content ?>

    <?php the_terms( $c->ID, 'learning_partner', 'Offered by: ', ', ', ' ' ); ?>

    <?php if(!empty($c->course_link)): ?>    
        <?php $exsys = get_the_terms( $c->ID, 'external_system', '', ', ', ' ' ) ?>
        <a class="outboundlink" 
            href="<?= $c->course_link ?>" 
            target="_blank" 
            rel="noopener">
            Launch <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/></svg>
        </a>

    <?php else: ?>

        <div>Oh no! There's something wrong with this course. Please <?php the_terms( $c->ID, 'learning_partner', 'contact', ', ', ' ' ); ?></div>

    <?php endif ?>
    <div class="coursecats mt-1" style="display:none;">
        <?php the_terms( $c->ID, 'course_category', 'Categories: ', ', ', ' ' ); ?>
    </div>

    </details> <!-- /.course -->

<?php endforeach ?>
</div>
</details>




<h3>#BCPSBelonging</h3>
<p>Great courses that cover equity, diversity and inclusion.</p>
<details>
    <summary>Browse Courses</summary>
<?php
$keyargs = array(
    'post_type' => 'course',
    'order' => 'ASC',
	'numberposts' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'keywords',
			'field'    => 'slug',
			'terms'    => 'bcpsbelonging'
		)
	)
);
$bcpsbelonging = get_posts( $keyargs );
?>
<div class="flexiblebcps">
<?php foreach($bcpsbelonging as $c) : ?>
    <details class="course">
    <summary class="coursename">
        <?= $c->post_title ?>
    </summary>
    <div class="delivery-method">
        <?php the_terms( $c->ID, 'delivery_method', '', ', ', ' ' ); ?>
    </div>
    <?= $c->post_content ?>

    <?php the_terms( $c->ID, 'learning_partner', 'Offered by: ', ', ', ' ' ); ?>

    <?php if(!empty($c->course_link)): ?>    
        <?php $exsys = get_the_terms( $c->ID, 'external_system', '', ', ', ' ' ) ?>
        <a class="outboundlink" 
            href="<?= $c->course_link ?>" 
            target="_blank" 
            rel="noopener">
            Launch <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/></svg>
        </a>

    <?php else: ?>

        <div>Oh no! There's something wrong with this course. Please <?php the_terms( $c->ID, 'learning_partner', 'contact', ', ', ' ' ); ?></div>

    <?php endif ?>
    <div class="coursecats mt-1" style="display:none;">
        <?php the_terms( $c->ID, 'course_category', 'Categories: ', ', ', ' ' ); ?>
    </div>

    </details> <!-- /.course -->

<?php endforeach ?>
</div>
</details>






</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column" style="padding: 1em;">
    
<!-- wp:heading {"align":"wide"} -->
<h3 class="alignwide">Pathways</h3>
<!-- /wp:heading -->
<!-- wp:buttons {"align":"wide"} -->
<div class="wp-block-buttons alignwide"><!-- wp:button {"style":{"color":{"background":"#003366"}}} -->
<a href="#" class="" style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;">Foundational/Mandatory</a> 
<!-- /wp:button -->

<!-- wp:button {"style":{"color":{"background":"#003366"}}} -->
<a href="#" class="" style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;">Supervisors and Managers</a>
<!-- /wp:button -->

<!-- wp:button {"style":{"color":{"background":"#003366"}}} -->
<a href="#" class="" style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;">People Leaders</a>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<h3 class="alignwide">Learning Partners</h3>
<?php 
$learningpartners = get_terms( array(
    'taxonomy' => 'learning_partner',
    'hide_empty' => false,
    'orderby'    => 'count',
    'number' => 5,
    'order'   => 'DESC',
    'exclude' => [121,372,144]
) ); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 

?>
<?php foreach($learningpartners as $p): ?>
<a style="background-color: #FFF; border-radius: 5px; display: inline-block; padding: .25em; margin: .1em; text-decoration: none;" href="/learning_partner/<?= $p->slug ?>"><?= $p->name ?></a> 
<?php endforeach ?>
&hellip;<br> <a style="background-color:#003366" class="wp-block-button__link has-white-color has-text-color has-background wp-element-button" href="/learning-hub/corporate-learning-partners">All Partners</a>
</div>
<!-- /wp:columns -->



<?php get_footer() ?>

<?php
/**
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

// WP_Query takes a "taxquery" an array argument that allows you to query by 
// taxonomy. Let's start building that array.
$taxquery = [];
// We go through each of the 4 taxonomies that we want to filter on:
// group, topic, audience, and delivery method
// If the array exists...
if(!empty($_GET['group'])) {
	$groupterm = $_GET['group'];
	// Wordpress automatically processes arrays passed to it
	$g = array (
		'taxonomy' => 'groups',
		'field' => 'slug',
		'terms' => $groupterm,
	);
	// Add the term(s) array to the query array
	array_push($taxquery, $g);
	// Now we need to look up the names of the terms from the slugs
	// so that we can show them back to the user in the "remove filter"
	// area.
	$gterms = [];
	// Loop through each of the slugs
	foreach($_GET['group'] as $g) {
		// Look up the term object for the slug
		$gterm = get_term_by( 'slug', $g, 'groups');
		// add the result to the array that we can now loop through below.
		array_push($gterms,$gterm);
	}
}


if(!empty($_GET['topic'])) {
	$topicterm = $_GET['topic'];
	$t = array (
		'taxonomy' => 'topics',
		'field' => 'slug',
		'terms' => $topicterm,
	);
	array_push($taxquery, $t);
		// Now we need to look up the names of the terms from the slugs
	// so that we can show them back to the user in the "remove filter"
	// area.
	$tterms = [];
	// Loop through each of the slugs
	foreach($_GET['topic'] as $t) {
		// Look up the term object for the slug
		$tterm = get_term_by( 'slug', $t, 'topics');
		// add the result to the array that we can now loop through below.
		array_push($tterms,$tterm);
	}
}


if(!empty($_GET['audience'])) {
	$audienceterm = $_GET['audience'];
	$a = array (
		'taxonomy' => 'audience',
		'field' => 'slug',
		'terms' => $audienceterm,
	);
	array_push($taxquery, $a);
	// $aterm = get_term_by( 'slug', get_query_var( 'audience' ), 'audience');
}

if(!empty($_GET['delivery_method'])) {
	$dmterm = $_GET['delivery_method'];

	$dm = array (
		'taxonomy' => 'delivery_method',
		'field' => 'slug',
		'terms' => $dmterm,
	);
	array_push($taxquery, $dm);
	// $dterm = get_term_by( 'slug', get_query_var( 'delivery_method' ), 'delivery_method');
}
// print_r($gterm);

$post_args = array(
    'post_type'                => 'course',
    'post_status'              => 'publish',
    'posts_per_page'           => -1,
    'ignore_sticky_posts'      => 0,
    'tax_query' 			   => $taxquery,
    'orderby'                  => array(
									'date' =>'DESC',
									'menu_order'=>'ASC'
								), 
    'order'                    => 'ASC',
    'hide_empty'               => 0,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'pad_counts'               => true, 
);
$post_my_query = null;
$post_my_query = new WP_Query($post_args);

// Setup URLs
$gr = ''; if($groupterm) $gr = 'groups/' . $groupterm . '/';
$to = ''; if($topicterm) $to = 'topics/' . $topicterm . '/';
$aud = ''; if($audienceterm) $aud = 'audience/' . $audienceterm . '/';
$dm = ''; if($dmterm) $dm = 'delivery_method/' . $dmterm . '/';
?>
<style>
input[type="checkbox"], input[type="radio"] {
	border: 1px solid #333;
	height: 20px;
	width: 20px;
}
</style>
<div class="wp-block-cover alignfull bg-gov-green" style="height:14vh;"><span aria-hidden="true" class="wp-block-cover__background"></span>
    <div class="wp-block-cover__inner-container">
        <h1 class="wp-block-heading alignwide has-white-color has-text-color">Course Catalog</h1>
        <!-- /wp:heading -->
    </div>
</div>
	<div class="wp-block-columns alignwide">
	<div class="wp-block-column menus" id="filters" style="background-color: #FFF; border-radius: .5em; flex: 29%; padding: 2%; margin-right: 1%;">

	<div><strong>Groups</strong></div>
	<form action="/learninghub/filter" method="GET">
	<?php if(!empty($_GET['topic'])): ?>
	<?php foreach($_GET['topic'] as $tid): ?>
	<input type="hidden" name="topic[]" value="<?= $tid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php if(!empty($_GET['audience'])): ?>
	<?php foreach($_GET['audience'] as $aid): ?>
	<input type="hidden" name="audience[]" value="<?= $aid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php if(!empty($_GET['delivery_method'])): ?>
	<?php foreach($_GET['delivery_method'] as $did): ?>
	<input type="hidden" name="delivery_method[]" value="<?= $did ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php 
	$groups = get_categories(
							array(
								'taxonomy' => 'groups',
								'orderby' => 'id',
								'order' => 'DESC',
								'hide_empty' => '0'
							));
	?>
	<?php foreach($groups as $g): ?>
		<?php $active = ''; if($g->slug == $groupterm) $active = 'active'; ?>
		<?php if(!empty($_GET['group']) && in_array($g->slug,$_GET['group'])) $active = 'checked' ?>
			<div>
				<label>
					<input onChange="this.form.submit()" type="checkbox" value="<?= $g->slug ?>" name="group[]" id="group<?= $g->id ?>" <?= $active ?>>
					<?= $g->name ?>
					(<?= $g->count ?>)
				</label>
			</div>
	<?php endforeach ?>
	<button class="btn btn-sm bg-success mt-2 applybutton">Apply</button>
	</form>

	<div><strong>Topics</strong></div>
	<form action="/learninghub/filter" method="GET">
	<?php if(!empty($_GET['group'])): ?>
	<?php foreach($_GET['group'] as $gid): ?>
	<input type="hidden" name="group[]" value="<?= $gid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php if(!empty($_GET['audience'])): ?>
	<?php foreach($_GET['audience'] as $aid): ?>
	<input type="hidden" name="audience[]" value="<?= $aid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php if(!empty($_GET['delivery_method'])): ?>
	<?php foreach($_GET['delivery_method'] as $did): ?>
	<input type="hidden" name="delivery_method[]" value="<?= $did ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php 
	$topics = get_categories(
							array(
								'taxonomy' => 'topics',
								'orderby' => 'name',
								'order' => 'ASC',
								'hide_empty' => '0'
							));
	?>
	<?php foreach($topics as $t): ?>
		<?php $active = ''; if($t->slug == $topicterm) $active = 'active'; ?>
		<?php if(!empty($_GET['topic']) && in_array($t->slug,$_GET['topic'])) $active = 'checked' ?>
			<div>
				<label class="<?php if($active == 'checked') echo 'fw-bold' ?>">
					<input onChange="this.form.submit()" type="checkbox" value="<?= $t->slug ?>" name="topic[]" id="topic<?= $t->id ?>" <?= $active ?>>
					<?= $t->name ?>
					(<?= $t->count ?>)
				</label>
			</div>
	<?php endforeach ?>


	<button class="btn btn-sm bg-success mt-2 applybutton">Apply</button>
	</form>

	<div><strong>Audience</strong></div>
	<form action="/learninghub/filter" method="GET">
	<?php if(!empty($_GET['group'])): ?>
	<?php foreach($_GET['group'] as $gid): ?>
	<input type="hidden" name="group[]" value="<?= $gid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php if(!empty($_GET['topic'])): ?>
	<?php foreach($_GET['topic'] as $tid): ?>
	<input type="hidden" name="topic[]" value="<?= $tid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php if(!empty($_GET['delivery_method'])): ?>
	<?php foreach($_GET['delivery_method'] as $did): ?>
	<input type="hidden" name="delivery_method[]" value="<?= $did ?>">
	<?php endforeach ?>
	<?php endif ?>
	
	<?php 
	$audiences = get_categories(
							array(
								'taxonomy' => 'audience',
								'orderby' => 'id',
								'order' => 'DESC',
								'hide_empty' => '0'
							));
	?>
	<?php foreach($audiences as $a): ?>
		<?php $active = ''; if($a->slug == $audienceterm) $active = 'active'; ?>
		<?php if(!empty($_GET['audience']) && in_array($a->slug,$_GET['audience'])) $active = 'checked' ?>
			<div>
				<label class="<?php if($active == 'checked') echo 'fw-bold' ?>">
					<input onChange="this.form.submit()" type="checkbox" value="<?= $a->slug ?>" name="audience[]" id="audience<?= $a->id ?>" <?= $active ?>>
					<?= $a->name ?>
					(<?= $a->count ?>)
				</label>
			</div>
	<?php endforeach ?>
	<button class="btn btn-sm bg-success mt-2 applybutton">Apply</button>
	</form>


	<div><strong>Delivery Method</strong></div>
	<form action="/learninghub/filter" method="GET">
	<?php if(!empty($_GET['group'])): ?>
	<?php foreach($_GET['group'] as $gid): ?>
	<input type="hidden" name="group[]" value="<?= $gid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php if(!empty($_GET['topic'])): ?>
	<?php foreach($_GET['topic'] as $tid): ?>
	<input type="hidden" name="topic[]" value="<?= $tid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php if(!empty($_GET['audience'])): ?>
	<?php foreach($_GET['audience'] as $auid): ?>
	<input type="hidden" name="audience[]" value="<?= $auid ?>">
	<?php endforeach ?>
	<?php endif ?>
	<?php 
	$dms = get_categories(
							array(
								'taxonomy' => 'delivery_method',
								'orderby' => 'id',
								'order' => 'DESC',
								'hide_empty' => '0',
								'include' => array(3,37,82,236,410)
							));
	?>
	<?php foreach($dms as $d): ?>
		<?php $active = ''; if($d->slug == $dmterm) $active = 'active'; ?>
		<?php if(!empty($_GET['delivery_method']) && in_array($d->slug,$_GET['delivery_method'])) $active = 'checked' ?>
			<div>
				<label class="<?php if($active == 'checked') echo 'fw-bold' ?>">
					<input onChange="this.form.submit()" type="checkbox" value="<?= $d->slug ?>" name="delivery_method[]" id="delivery_method<?= $d->id ?>" <?= $active ?>>
					<?= $d->name ?>
					(<?= $d->count ?>)
				</label>
			</div>
	<?php endforeach ?>
	<button class="btn btn-sm bg-success mt-2 applybutton">Apply</button>
	</form>


	</div>
	<div class="wp-block-column" style="flex: 66%;">
	<div id="courselist">
	<?php if(!empty($_GET['group']) || !empty($_GET['topic']) || !empty($_GET['audience']) || !empty($_GET['delivery_method'])): ?>
	<div style="background-color: #FFF; border-radius: .5em; magrin: 1em 0; padding: 1em;">
	<div class="">
		<div><strong>Filters:</strong></div>
		<div><a class="btn btn-sm btn-secondary" href="/learninghub/filter/">Clear Filters</a></div>
		<div class="d-flex">
		<?php if(!empty($gterms)): ?>
		<div class="p-2">
		<div>Group</div>
		<?php $linkwithout = '' ?>
		<?php foreach($gterms as $g): ?>
		<?php if($g->slug): ?>
		<div class="">
			<a href="<?= $linkwithout ?>" class="btn btn-sm btn-light">Remove</a> <?= $g->name ?>
		</div>
		<?php endif ?>
		<?php endforeach ?>
		</div>
		<?php endif ?>

		<?php if(!empty($tterms)): ?>
		<div class="p-2">
		<div>Topic</div>
		<?php foreach($tterms as $t): ?>
		<div class="">
			<a href="#" class="btn btn-sm btn-light">Remove</a> <?= $t->name ?>
		</div>
		<?php endforeach ?>
		</div>
		<?php endif ?>

		<?php if($audienceterm): ?>
		<div class="">
			<strong><?= $aterm->name ?></strong>
		</div>
		<?php endif ?>
		<?php if($dmterm): ?>
		<div class="">
			<strong><?= $dterm->name ?></strong>
		</div>
		<?php endif ?>
		</div>
		</div>
	</div>
	<?php endif ?>
	<div class="my-3 d-flex p-3 bg-white rounded-3">
    <div class="mr-3 pt-1 fw-bold" id="coursecount"><?= $post_my_query->found_posts ?> courses</div>
    <div class="dropdown px-2">
        <button class="btn btn-sm bg-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sort by
        </button>
        <div class="dropdown-menu">
            <li><a class="sort dropdown-item" data-sort="published" href="#">Most Recent</a></li>
            <li><a class="sort dropdown-item" data-sort="coursename" href="#">Alphabetical</a></li>
            <li><a class="sort dropdown-item" data-sort="dm" href="#">Delivery Method</a></li>
            <li><a class="sort dropdown-item" data-sort="group" href="#">Group</a></li>
            <li><a class="sort dropdown-item" data-sort="audience" href="#">Audience</a></li>
            <li><a class="sort dropdown-item" data-sort="topic" href="#">Topic</a></li>
        </div>
    </div>
	<div class="ml-4">
    	<button id="expall" class="btn btn-sm bg-secondary px-2 d-inline-block">Expand All</button>
    	<button id="collapseall" class="btn btn-sm bg-secondary px-2 d-inline-block">Collapse All</button>
	</div>
</div>
<div class="my-3 d-flex p-3 bg-white rounded-3">
	<input class="form-control search" placeholder="Keyword filter" value="<?php echo $_GET['new'] ?>">
</div>
	<div class="list">
	<?php if( $post_my_query->have_posts() ) : ?>

	<?php while ($post_my_query->have_posts()) : $post_my_query->the_post(); ?>

		<?php get_template_part( 'template-parts/course/single-course' ) ?>

	<?php endwhile; ?>
	<?php else : ?>

		<p>Sorry, but there are no courses that match your filters.</p>

	<?php endif; ?>
	</div>

</div>

</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script type="module">
var options = {
    valueNames: [ 'published', 'coursename', 'group', 'audience', 'topic', 'dm' ]
};

var courseList = new List('courselist', options);

courseList.on('searchComplete', function(){
	let ccount = document.getElementById('coursecount');
	let update = courseList.update().matchingItems.length + ' courses';
	ccount.innerHTML = update;
});

</script>
<script type="module">

// There is an onChange="this.form.submit()" on each of the checkboxes for UX
// reasons but if there is no javascript enabled then it would break the form.
// There is a submit button on each form that is useless with js enabled,
// but if there is no js then it becomes the only way to submit the form. Let's
// hide the button here (and not in CSS) for graceful degradation.
document.querySelectorAll('.applybutton').forEach(function(el) {
   el.style.display = 'none';
});

// 
// Details/Summary niceties
//
// By default, all the courses are hidden behind a details/summary
// and subsequently the description/launch links are as well.
// This supports allowing the learner to choose to "expand all" and 
// show everything on the page all at once, or "collapse all" and 
// hide everything. 
//

// Show everything all in once fell swoop.
let expall = document.getElementById('expall');
let steplist = document.getElementById('courselist');
let deets = steplist.querySelectorAll('details');
expall.addEventListener('click', (e) => {
    Array.from(deets).forEach(function(element) {
        element.setAttribute('open','open');
    });
});
// Conversley, "collapse all" hides everyting open in one fell swoop.
let collapseall = document.getElementById('collapseall');
collapseall.addEventListener('click', (e) => {
    Array.from(deets).forEach(function(element) {
        element.removeAttribute('open');
    });
});
</script>

<?php get_footer(); ?>

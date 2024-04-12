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


while (have_posts()) : // Start the Loop
    the_post();
    the_content();
endwhile; // End of the loop.
?>
<div class="wp-block-columns alignfull has-white-background-color has-background is-layout-flex wp-container-core-columns-layout-2 wp-block-columns-is-layout-flex" id="whatisthehub" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
    <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
        <div class="wp-block-columns alignwide is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">
            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                <h2 class="wp-block-heading has-extra-large-font-size">What is corporate learning?</h2>
                <p>In the B.C. Public Service, corporate learning is a shared space. The Learning Centre and its partners offer hundreds of courses, available to all BCPS employees. The Learning Hub is the place to see that full catalogue.</p>
                <p><a href="/learninghub/about">About the LearningHUB</a></p>
            </div>
            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)" id="homesearchbox">
                <form role="search" method="get" action="https://wordpress.virtuallearn.ca/learninghub/" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
                    <label class="wp-block-search__label" for="wp-block-search__input-1">Search the full catalogue</label>
                    <div class="wp-block-search__inside-wrapper ">
                        <input class="wp-block-search__input" id="wp-block-search__input-1" placeholder="" value="" type="search" name="s" required />
                        <button aria-label="Search" class="wp-block-search__button has-text-color has-white-color wp-element-button" type="submit">Search</button>
                    </div>
                </form>
                <div>Suggested: <a href="/learninghub/?s=flexibleBCPS">#flexibleBCPS</a> <a href="/learninghub/?s=BCPSBelonging">#BCPSBelonging</a></div>
            </div>
        </div>
    </div>
</div>
<div class="alignwide" style="margin-top: 1em;">
    <div class="has-white-background-color" style="padding: 1em;">
        <h3>How is learning organized?</h3>
        <p>Four types of categorization help you find exactly what you're looking for:
            group, audience, topic and delivery. </p>
        <p><small>Click on any category link for search results filtered by that term.</small></p>

        <div class="container my-3">
            <div class="row">
                <div class="col-lg-6 col-12 mb-2 mb-lg-0">
                    <div class="d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="mt-1 me-2 icon flex-grow-0 flex-shrink-0"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#007864" d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z" />
                        </svg>
                        <div>
                            <h4>Group: <small><span class="fw-normal text-dark">What type of learning is it?</span></small></h4>
                            <ul class="ps-4 mt-2">
                                <?php
                                $groups = get_terms(array(
                                    'taxonomy' => 'groups',
                                    'hide_empty' => false,
                                    'orderby'    => 'alpha',
                                    'order'   => 'DESC'
                                ));
                                ?>

                                <?php foreach ($groups as $g) : ?><li>
                                        <a href="/learninghub/groups/<?= $g->slug ?>"><?= $g->name ?>:</a> <?= $g->description ?>
                                    </li>
                                <?php endforeach ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-2 mb-lg-0">
                    <div class="d-flex">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="mt-1 me-2 icon flex-grow-0 flex-shrink-0"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#5F2167" d="M211.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM32 256c0 17.7 14.3 32 32 32h85.6c10.1-39.4 38.6-71.5 75.8-86.6c-9.7-6-21.2-9.4-33.4-9.4H96c-35.3 0-64 28.7-64 64zm461.6 32H576c17.7 0 32-14.3 32-32c0-35.3-28.7-64-64-64H448c-11.7 0-22.7 3.1-32.1 8.6c38.1 14.8 67.4 47.3 77.7 87.4zM391.2 226.4c-6.9-1.6-14.2-2.4-21.6-2.4h-96c-8.5 0-16.7 1.1-24.5 3.1c-30.8 8.1-55.6 31.1-66.1 60.9c-3.5 10-5.5 20.8-5.5 32c0 17.7 14.3 32 32 32h224c17.7 0 32-14.3 32-32c0-11.2-1.9-22-5.5-32c-10.8-30.7-36.8-54.2-68.9-61.6zM563.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM321.6 192a80 80 0 1 0 0-160 80 80 0 1 0 0 160zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32z" />
                        </svg>
                        <div>
                            <h4>Audience: <small><span class="fw-normal text-dark">Who is the learning for?</span></small></h4>
                            <ul class="ps-4">
                                <?php
                                $audiences = get_terms(array(
                                    'taxonomy' => 'audience',
                                    'hide_empty' => false,
                                    'orderby'    => 'count',
                                    'order'   => 'DESC'
                                )); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 

                                ?>

                                <?php foreach ($audiences as $a) : ?>
                                    <li>
                                        <a href="/learninghub/audience/<?= $a->slug ?>"><?= $a->name ?></a>:
                                        <?= $a->description ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-5">
                    <h4>Delivery Method: <small><span class="fw-normal text-dark">How is the learning offered?</span></small></h4>
                    <?php
                    $delivery = get_terms(array(
                        'taxonomy' => 'delivery_method',
                        'hide_empty' => false,
                        'orderby'    => 'count',
                        'order'   => 'DESC'
                    )); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 

                    ?>
                    <?php foreach ($delivery as $d) : ?>
                        <div class="" style="">
                            <div>
                                <a style="font-weight: bold;" href="/learninghub/delivery_method/<?= $d->slug ?>"><?= $d->name ?></a>:
                                <?= $d->description ?>
                            </div>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>


            <h4 class="mb-2">Topics <small><span class="fw-normal text-dark">What is the learning about?</span></small></h4>
            <div class="row">
                <?php
                $topics = get_terms(array(
                    'taxonomy' => 'topics',
                    'hide_empty' => false,
                    'orderby'    => 'alpha',
                    'order'   => 'ASC'
                )); // 121 = Office of Compt General, 372 = unknown, 144 = labour relations 

                ?>
                <?php foreach ($topics as $t) : ?>
                    <div class="col-lg-6 col-12">
                        <a href="/learninghub/topics/<?= $t->slug ?>" class="text-decoration-none">
                            <div class="border rounded p-2 shadow-sm m-1 "><?= $t->name ?></div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>


        <?php get_footer() ?>
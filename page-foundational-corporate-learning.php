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

<div class="wp-block-cover alignfull bg-gov-green" style="height:12vh;"><span aria-hidden="true" class="wp-block-cover__background"></span>
    <div class="wp-block-cover__inner-container">
        <h1 class="wp-block-heading alignfull has-text-align-center has-white-color has-text-color">Foundational Corporate Learning</h1>
        <!-- /wp:heading -->
    </div>
</div>
<!-- /wp:cover -->

<div class="bg-white mt-0 py-5">
    <div class="alignwide">
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h2 class="fs-1">Introduction to Corporate Learning </h2>
                <p>Foundational corporate learning refers to basic BC Public Service-specific knowledge and skills that all employees should have, regardless of role.</p>
                <p>Choose the list below that applies to you.</p>
            </div>
            <div class="col-lg-4">
                <div class="topic-card border-2 border rounded shadow-sm p-3 mt-4">
                    <div class="d-flex">
                        <div class="icon-square flex-shrink-0 mt-1 "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#007864" d="M64 32C64 14.3 49.7 0 32 0S0 14.3 0 32V64 368 480c0 17.7 14.3 32 32 32s32-14.3 32-32V352l64.3-16.1c41.1-10.3 84.6-5.5 122.5 13.4c44.2 22.1 95.5 24.8 141.7 7.4l34.7-13c12.5-4.7 20.8-16.6 20.8-30V66.1c0-23-24.2-38-44.8-27.7l-9.6 4.8c-46.3 23.2-100.8 23.2-147.1 0c-35.1-17.6-75.4-22-113.5-12.5L64 48V32z" />
                            </svg></div>
                        <div class="ms-3">
                            <h3 class="gov-green">Start here</h3>
                            <p>Wondering where to start? These learning journeys will guide you.</p>
                            <p class="mb-1"><strong>Learning journeys</strong></p>
                            <ul class="mb-2">
                                <li>All Employees</li>
                                <li>People Leaders</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="https://learningcentre.gww.gov.bc.ca/latww2023/">
            <div class="mt-4 border border-2 rounded-top">
                <img src="http://nori.virtuallearn.ca/learninghub/wp-content/uploads/2024/04/LWW_2023_subpage_header-280h.jpg" alt="">
            </div>
            <div class="bg-gov-blue px-3 py-2 rounded-bottom">
                <h3 class="text-white">Register today!</h3>
                <p class="text-white mb-0">Learn @ Work Week 2023 runs from September 18 to 22</p>
            </div>
        </a>

    </div>
</div>
<?php get_footer() ?>
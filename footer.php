<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<details id="feedback">
    <summary>Need help? </summary>
    <div class="ms-3">
        <p>Have a question about the LearningHUB? <a href="https://sfs7.gov.bc.ca/affwebservices/public/saml2sso?SPID=urn:ca:bc:gov:customerportal:prod">Submit an AskMyHR service request</a> using the category "Learning Centre".</p>
        <!-- <p><a href="https://survey.alchemer-ca.com/s3/50120510/8f3f4d590f25" target="_blank" rel="noopener">Give general feedback about the Learning Hub</a>.</p> -->
    </div>
</details>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->
<div id="bcgovfoot">

    <?php get_template_part('template-parts/footer/footer-widgets'); ?>

    <footer id="colophon" class="site-footer mt-0" role="contentinfo">

        <?php if (has_nav_menu('footer')) : ?>
            <nav aria-label="<?php esc_attr_e('Secondary menu', 'twentytwentyone'); ?>" class="footer-navigation">
                <ul class="footer-navigation-wrapper">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'items_wrap'     => '%3$s',
                            'container'      => false,
                            'depth'          => 1,
                            'link_before'    => '<span>',
                            'link_after'     => '</span>',
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </ul><!-- .footer-navigation-wrapper -->
            </nav><!-- .footer-navigation -->
        <?php endif; ?>

        <div class="site-info d-block">
            <div class="d-flex flex-column flex-lg-row justify-content-between">
                <div class="my-3 flex-grow-1">
                    The BC Public Service acknowledges the territories of First Nations around B.C. and is grateful to carry out our work on these lands. We acknowledge the rights, interests, priorities and concerns of all Indigenous Peoples (First Nations, Métis and Inuit), respecting and acknowledging their distinct cultures, histories, rights, laws and governments.
                </div>

                <img class="mx-auto mx-lg-0 mt-3 mb-2 mt-lg-auto" style="min-height: 50px; max-height: 100px;" src="https://learn.bcpublicservice.gov.bc.ca/common-components/where-ideas-work-whitetext.svg" height="100px" width="380px" alt="Where Ideas Work logo">
            </div>
            <div class="powered-by fs-6 d-block text-end border-top border-warning pt-1">
                <?php
                printf(
                    /* translators: %s: WordPress. */
                    esc_html__('Proudly powered by %s.', 'twentytwentyone'),
                    '<a href="' . esc_url(__('https://wordpress.org/', 'twentytwentyone')) . '">WordPress</a>'
                );
                ?>
            </div><!-- .powered-by -->

        </div><!-- .site-info -->
    </footer><!-- #colophon -->

</div><!-- #bcgovfoot -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
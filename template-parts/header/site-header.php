<?php

/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= (true === get_theme_mod('display_title_and_tagline', true)) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';
$blog_info    = get_bloginfo('name');
?>
<div id="bcgovmast" class="sticky-top">
    <header id="mainheader" role="banner">
        <nav class="navbar navbar-expand-lg px-3" data-bs-theme="dark" role="navigation" aria-label="<?php esc_attr_e('Primary menu', 'twentytwentyone'); ?>">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-white"></span>
                </button>
                
                <a href="<?php echo esc_url(home_url('/')); ?>" class="wordmark navbar-brand order-lg-first me-lg-3">
                    <?php //the_custom_logo(); 
                    ?>
                    Learning<span style="color: #ebba44; font-weight: bold;">HUB</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
                    <span class="search-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 order-1 order-lg-2">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/learninghub/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/learninghub/about/" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/learninghub/about/">About the LearningHUB</a></li>
                                <li><a class="dropdown-item" href="/learninghub/corporate-learning-partners/">Learning Partners</a></li>
                                <li><a class="dropdown-item" href="/learninghub/what-is-corp-learning-framework/">Corporate Learning Framework</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/learninghub/learning-systems/">
                                Learning Platforms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/learninghub/course/">All Courses</a>
                        </li>
                    </ul>
                </div>
                <form method="get" action="/learninghub/" class="collapse navbar-collapse mt-1 mt-lg-0" role="search" id="navbarSearch">
                    <label for="s" class="sr-only">Search</label>
                    <input type="search" id="s" class="s bg-white flex-grow-1 flex-shrink-1 me-1" name="s" placeholder="Find learning" required value="<?= esc_html(get_search_query()) ?>">
                    <button type="submit" class="searchsubmit" aria-label="Submit Search">
                        Search
                    </button>
                </form>
            </div>
        </nav>
    </header><!-- #masthead -->
</div>
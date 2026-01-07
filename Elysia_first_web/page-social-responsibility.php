<?php

/**
 * Template Name: 社会责任
 * Social Responsibility 页面模板（从 swforming/index-7.html 迁移）
 */

get_header();
?>

<?php get_template_part('template-parts/one_page/social-responsibility-assets'); ?>

<main id="main" class="site-main hfeed">
    <div class="ct-container-full" data-content="normal">
        <article id="post-461" class="post-461 page type-page status-publish hentry">
            <div class="blocksy-woo-messages-default woocommerce-notices-wrapper">
                <div class="woocommerce"></div>
            </div>

            <div class="entry-content is-layout-constrained">
                <div data-elementor-type="wp-page" data-elementor-id="461" class="elementor elementor-461" data-elementor-post-type="page">
                    <div class="elementor elementor-188">
                        <?php get_template_part('template-parts/components/page-hero-title'); ?>
                    </div>
                    <?php
                    get_template_part('template-parts/one_page/social-responsibility-intro-and-pillars');
                    get_template_part('template-parts/one_page/social-responsibility-employees');
                    get_template_part('template-parts/one_page/social-responsibility-client');
                    get_template_part('template-parts/one_page/social-responsibility-environment');
                    get_template_part('template-parts/one_page/social-responsibility-vision');
                    ?>
                </div>
            </div>
        </article>
    </div>
</main>

<?php
get_footer();
?>
<?php

/**
 * Template Name: 联系我们
 *
 * Contact 页面模板（从 swforming/index-15.html 迁移）
 */

get_header();
?>

<?php get_template_part('template-parts/one_page/contact-assets'); ?>

<main id="main" class="site-main hfeed">

    <div class="ct-container-full" data-content="normal">
        <article id="post-155" class="post-155 page type-page status-publish hentry">
            <div class="blocksy-woo-messages-default woocommerce-notices-wrapper">
                <div class="woocommerce"></div>
            </div>
            <div class="entry-content is-layout-constrained">
                <div data-elementor-type="wp-page" data-elementor-id="155" class="elementor elementor-155" data-elementor-post-type="page">
                    <?php
                    get_template_part('template-parts/one_page/contact-hero');
                    get_template_part('template-parts/one_page/contact-info-grid');
                    get_template_part('template-parts/one_page/contact-form-and-map');
                    ?>
                </div>
            </div>
        </article>
    </div>

</main>

<?php
get_footer();

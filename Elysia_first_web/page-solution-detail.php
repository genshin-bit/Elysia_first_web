<?php

/**
 * Template Name: 解决方案详情
 *
 * Solution 详情页模板（从 swforming/index-14.html 迁移）
 */

get_header();

$elysia_solution_post_id = 0;
if (get_query_var('post_id')) {
    $elysia_solution_post_id = (int) get_query_var('post_id');
}
if (!$elysia_solution_post_id && isset($_GET['post_id'])) {
    $elysia_solution_post_id = (int) $_GET['post_id'];
}
if ($elysia_solution_post_id <= 0) {
    $elysia_solution_post_id = get_the_ID();
}
$elysia_solution_post = null;
if ($elysia_solution_post_id > 0) {
    $elysia_solution_post = get_post($elysia_solution_post_id);
}
?>

<link rel='stylesheet' id='blocksy-dynamic-global-css' href='<?php echo get_template_directory_uri(); ?>/static/css/global.css' media='all' />
<link rel='stylesheet' id='wp-block-library-css' href='<?php echo get_template_directory_uri(); ?>/static/css/style.min.css' media='all' />
<link rel='stylesheet' id='ct-main-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/main.min.css' media='all' />
<link rel='stylesheet' id='ct-woocommerce-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/woocommerce.min.css' media='all' />
<link rel='stylesheet' id='ct-elementor-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/elementor-frontend.min.css' media='all' />
<link rel='stylesheet' id='ct-elementor-woocommerce-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/elementor-woocommerce-frontend.min.css' media='all' />
<link rel='stylesheet' id='widget-heading-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-heading.min.css' media='all' />
<link rel='stylesheet' id='widget-table-of-contents-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-table-of-contents.min.css' media='all' />
<link rel='stylesheet' id='widget-video-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-video.min.css' media='all' />
<link rel='stylesheet' id='widget-woocommerce-products-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-woocommerce-products.min.css' media='all' />
<link rel='stylesheet' id='widget-post-navigation-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-post-navigation.min.css' media='all' />
<link rel='stylesheet' id='widget-posts-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-posts.min.css' media='all' />
<link rel='stylesheet' id='e-popup-css' href='<?php echo get_template_directory_uri(); ?>/static/css/popup.min.css' media='all' />
<link rel='stylesheet' id='elementor-post-5-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-5.css' media='all' />
<link rel='stylesheet' id='elementor-post-442-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-442.css' media='all' />
<link rel='stylesheet' id='elementor-post-5183-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-5183.css' media='all' />
<link rel='stylesheet' id='elementor-post-2636-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-2636.css' media='all' />

<main id="main" class="site-main hfeed" itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
    <div data-elementor-type="single-post" data-elementor-id="5183" class="elementor elementor-5183 elementor-location-single">
        <?php
        if ($elysia_solution_post instanceof WP_Post) {
            global $post;
            $post = $elysia_solution_post;
            setup_postdata($post);
        }

        get_template_part('template-parts/solution_detail/solution-detail', 'hero');
        ?>

        <section class="elementor-section elementor-top-section elementor-element elementor-element-04e0370 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="04e0370" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-ca1627d elementor-hidden-mobile" data-id="ca1627d" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php get_template_part('template-parts/solution_detail/solution-detail', 'sidebar-share'); ?>
                    </div>
                </div>

                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-401a4a5" data-id="401a4a5" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php get_template_part('template-parts/components/toc'); ?>
                        <?php get_template_part('template-parts/solution_detail/solution-detail', 'content'); ?>
                    </div>
                </div>

                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-a92fb9f" data-id="a92fb9f" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php
                        get_template_part('template-parts/solution_detail/solution-detail', 'sidebar-video');
                        get_template_part('template-parts/solution/sidebar-feature-product');
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <?php
        get_template_part('template-parts/components/post-navigation');
        get_template_part('template-parts/solution_detail/solution-detail', 'related');

        if ($elysia_solution_post instanceof WP_Post) {
            wp_reset_postdata();
        }
        ?>
    </div>
</main>

<?php
get_footer();
?>
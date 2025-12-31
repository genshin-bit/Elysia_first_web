<?php

/**
 * Template Name: 文章详情
 *
 * Blog 详情页模板（从 swforming/index-12.html 迁移）
 */

get_header();

$elysia_detail_post_id = 0;
if (get_query_var('post_id')) {
    $elysia_detail_post_id = (int) get_query_var('post_id');
}
if (!$elysia_detail_post_id && isset($_GET['post_id'])) {
    $elysia_detail_post_id = (int) $_GET['post_id'];
}
if ($elysia_detail_post_id <= 0) {
    $elysia_detail_post_id = get_the_ID();
}
$elysia_detail_post = null;
if ($elysia_detail_post_id > 0) {
    $elysia_detail_post = get_post($elysia_detail_post_id);
}
?>

<link rel='stylesheet' id='widget-posts-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-posts.min.css' media='all' />
<link rel='stylesheet' id='widget-divider-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-divider.min.css' media='all' />
<link rel='stylesheet' id='widget-post-navigation-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-post-navigation.min.css' media='all' />
<link rel='stylesheet' id='widget-table-of-contents-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-table-of-contents.min.css' media='all' />
<link rel='stylesheet' id='elementor-post-1361-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-1361.css' media='all' />

<script>
    window.okkiConfigs = window.okkiConfigs || [];

    function okkiAdd() {
        okkiConfigs.push(arguments);
    }
    okkiAdd("analytics", {
        siteId: "39166-9223",
        gId: "UA-238156102-34"
    });
    document.addEventListener('DOMContentLoaded', function() {
        var links = document.querySelectorAll('.elementor-toc__list-wrapper a[href^="#"]');
        if (!links.length) {
            return;
        }
        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                var targetId = this.getAttribute('href').slice(1);
                var target = document.getElementById(targetId);
                if (!target) {
                    return;
                }
                e.preventDefault();
                var rect = target.getBoundingClientRect();
                var offsetTop = rect.top + window.pageYOffset - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
<script async src="<?php echo get_template_directory_uri(); ?>/static/js/analyze.js"></script>

<main id="main" class="site-main hfeed" itemscope="itemscope" itemtype="https://schema.org/CreativeWork">

    <div data-elementor-type="single-post" data-elementor-id="1361" class="elementor elementor-1361 elementor-location-single post-5707 post type-post status-publish format-standard hentry category-uncategorized" data-elementor-post-type="elementor_library">

        <?php
        if ($elysia_detail_post instanceof WP_Post) {
            global $post;
            $post = $elysia_detail_post;
            setup_postdata($post);
        }
        get_template_part('template-parts/blog_detail/blog-detail', 'hero');
        ?>

        <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-2d6a3b2 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2d6a3b2" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-70 elementor-top-column elementor-element elementor-element-2806ac2f" data-id="2806ac2f" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php get_template_part('template-parts/blog_detail/blog-detail', 'content'); ?>
                    </div>
                </div>
                <div class="elementor-column elementor-col-30 elementor-top-column elementor-element elementor-element-4cf90785" data-id="4cf90785" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php get_template_part('template-parts/components/toc'); ?>
                        <?php get_template_part('template-parts/components/share-buttons'); ?>
                        <?php get_template_part('template-parts/blog_detail/blog-detail', 'sidebar-latest'); ?>
                        <?php get_template_part('template-parts/blog_detail/blog-detail', 'sidebar-contact'); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if ($elysia_detail_post instanceof WP_Post) {
            wp_reset_postdata();
        }
        ?>
    </div>
</main>

<?php
get_footer();
?>

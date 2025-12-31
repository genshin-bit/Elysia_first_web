<?php

/**
 * Template Name: 文章列表
 *
 * Blog 页面模板（从 swforming/index-11.html 迁移）
 */

get_header();
?>

<link rel='stylesheet' id='elementor-post-1345-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-1345.css' media='all' />
<link rel='stylesheet' id='widget-posts-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-posts.min.css' media='all' />

<script>
    window.okkiConfigs = window.okkiConfigs || [];

    function okkiAdd() {
        okkiConfigs.push(arguments);
    };
    okkiAdd("analytics", {
        siteId: "39166-9223",
        gId: "UA-238156102-34"
    });
</script>
<script async src="<?php echo get_template_directory_uri(); ?>/static/js/analyze.js"></script>

<main id="main" class="site-main hfeed" itemscope="itemscope" itemtype="https://schema.org/CreativeWork">

    <div data-elementor-type="archive" data-elementor-id="1345" class="elementor elementor-1345 elementor-location-archive" data-elementor-post-type="elementor_library">
        <?php get_template_part('template-parts/blog/blog', 'hero'); ?>
        <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-55090a3e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="55090a3e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-69e526d6" data-id="69e526d6" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php get_template_part('template-parts/blog/blog', 'loop-recent-stories'); ?>
                        <?php get_template_part('template-parts/blog/blog', 'pagination'); ?>
                    </div>
                </div>
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-df250c0" data-id="df250c0" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <?php get_template_part('template-parts/blog/blog', 'sidebar-share'); ?>
                        <?php get_template_part('template-parts/blog/blog', 'sidebar-latest-headlines'); ?>
                        <?php get_template_part('template-parts/blog/blog', 'cta-start-business'); ?>
                    </div>
                </div>
            </div>
        </section>
        <?php get_template_part('template-parts/blog/blog', 'section-popular-stories'); ?>
    </div>
</main>

<?php
get_footer();
?>
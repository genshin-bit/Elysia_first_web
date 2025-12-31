<?php

/**
 * Template Name:产品列表
 *
 */
get_header();
?>

<main id="main" class="site-main hfeed" itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
    <div data-elementor-type="product-archive" data-elementor-id="1206" class="elementor elementor-1206 elementor-525 elementor-location-archive product" data-elementor-post-type="elementor_library">
        <?php
        get_template_part('template-parts/product/archive', 'hero-title');
        get_template_part('template-parts/product/archive', 'intro-cta-video');
        get_template_part('template-parts/product/archive', 'product-grid');
        get_template_part('template-parts/product/archive', 'c-purlin-faq');
        get_template_part('template-parts/product/archive', 'factory-gallery');
        get_template_part('template-parts/product/archive', 'why-sunway');
        get_template_part('template-parts/product/archive', 'contact-us-cta');
        ?>
    </div>
</main>

<?php
get_footer();

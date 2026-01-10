<?php

get_header();
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <main id="main" class="site-main hfeed" itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
            <div class="woocommerce-notices-wrapper"></div>

            <div data-elementor-type="product" data-elementor-id="598"
                class="elementor elementor-598 elementor-location-single product"
                data-elementor-post-type="elementor_library">

                <?php get_template_part('template-parts/components/breadcrumbs'); ?>

                <section data-particle_enable="false" data-particle-mobile-disabled="false"
                    class="elementor-section elementor-top-section elementor-element elementor-element-6c1ac67b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="6c1ac67b" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-308036dc"
                            data-id="308036dc" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-24e3263a yes elementor-widget elementor-widget-woocommerce-product-images"
                                    data-id="24e3263a" data-element_type="widget"
                                    data-widget_type="woocommerce-product-images.default">
                                    <div class="elementor-widget-container">
                                        <?php get_template_part('template-parts/woocommerce/product', 'gallery'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3b6f91ab"
                            data-id="3b6f91ab" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <?php get_template_part('template-parts/product_detail/product', 'hero-summary'); ?>
                                <?php get_template_part('template-parts/product_detail/product', 'usp-icons'); ?>
                                <?php get_template_part('template-parts/components/share-buttons'); ?>
                                <?php get_template_part('template-parts/product_detail/product', 'top-cta'); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <section data-particle_enable="false" data-particle-mobile-disabled="false"
                    class="elementor-section elementor-top-section elementor-element elementor-element-6ff59493 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="6ff59493" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3a57f46e"
                            data-id="3a57f46e" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated elysia-article-content">
                                <div class="elementor-element elementor-element-340a8577 elementor-widget elementor-widget-woocommerce-product-data-tabs"
                                    data-id="340a8577" data-element_type="widget"
                                    data-widget_type="woocommerce-product-data-tabs.default">
                                    <div class="elementor-widget-container">
                                        <?php get_template_part('template-parts/woocommerce/product', 'tabs'); ?>
                                    </div>
                                </div>

                                <?php get_template_part('template-parts/product_detail/product', 'faq'); ?>
                                <?php get_template_part('template-parts/product_detail/product', 'inquiry-section'); ?>
                            </div>
                        </div>

                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-68f97a9e"
                            data-id="68f97a9e" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <?php get_template_part('template-parts/components/toc'); ?>
                                <?php get_template_part('template-parts/product_detail/product', 'sidebar-categories'); ?>
                                <?php get_template_part('template-parts/product_detail/product', 'sidebar-inquiry-card'); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <?php get_template_part('template-parts/product_detail/product', 'related-products'); ?>

            </div>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php
get_template_part('template-parts/one_page/shared-contact-popup');
get_footer();

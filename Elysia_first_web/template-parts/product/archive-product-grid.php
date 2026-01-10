<!-- 电力与能源产品页：自定义 WooCommerce 产品网格列表模块 -->
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-5e963cbd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5e963cbd" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6c73cd7d" data-id="6c73cd7d" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-b4d0d9a elementor-product-loop-item--align-center elementor-grid-4 elementor-grid-tablet-3 elementor-grid-mobile-2 elementor-products-grid elementor-wc-products elementor-widget elementor-widget-wc-archive-products" data-id="b4d0d9a" data-element_type="widget" data-widget_type="wc-archive-products.default">
                    <div class="elementor-widget-container">
                        <div class="woocommerce columns-4 ">
                            <div class="woocommerce-notices-wrapper"></div>
                            <?php get_template_part('template-parts/product/archive', 'woo-result-count'); ?>
                            <ul class="products elementor-grid columns-4" data-products="type-1" data-hover="swap">
                                <?php
                                $elysia_paged = function_exists('elysia_get_product_list_paged') ? elysia_get_product_list_paged() : 1;
                                $elysia_query = function_exists('elysia_get_product_pages_query') ? elysia_get_product_pages_query($elysia_paged, 16) : null;

                                if ($elysia_query instanceof WP_Query) {
                                    $GLOBALS['elysia_product_pages_query'] = $elysia_query;
                                }

                                if ($elysia_query instanceof WP_Query && $elysia_query->have_posts()) {
                                    while ($elysia_query->have_posts()) {
                                        $elysia_query->the_post();
                                        $elysia_product_link = get_permalink();
                                        $elysia_product_title = get_the_title();
                                        $elysia_image_id = function_exists('elysia_get_product_card_image_id') ? elysia_get_product_card_image_id(get_the_ID()) : 0;
                                        $elysia_primary_image_url = $elysia_image_id ? wp_get_attachment_image_url($elysia_image_id, 'medium_large') : '';
                                ?>
                                        <li class="product type-product elementor-grid-item">
                                            <figure>
                                                <a class="ct-media-container has-hover-effect"
                                                    href="<?php echo esc_url($elysia_product_link); ?>"
                                                    aria-label="<?php echo esc_attr($elysia_product_title); ?>">
                                                    <?php if ($elysia_primary_image_url) { ?>
                                                        <img loading="lazy"
                                                            width="400"
                                                            height="400"
                                                            src="<?php echo esc_url($elysia_primary_image_url); ?>"
                                                            alt="<?php echo esc_attr($elysia_product_title); ?>"
                                                            class="wp-post-image"
                                                            style="aspect-ratio: 1/1;" />
                                                    <?php } ?>
                                                </a>
                                            </figure>
                                            <h2 class="woocommerce-loop-product__title">
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="<?php echo esc_url($elysia_product_link); ?>"
                                                    target="_self">
                                                    <?php echo esc_html($elysia_product_title); ?>
                                                </a>
                                            </h2>
                                            <div class="ct-woo-card-actions" data-add-to-cart="auto-hide" data-alignment="equal">
                                                <div class="woocommerce-loop-product__buttons">
                                                    <a href="<?php echo esc_url($elysia_product_link); ?>"
                                                        class="button product_type_simple">
                                                        <?php esc_html_e('Read more', 'elysia_first_web'); ?>
                                                    </a>
                                                </div>
                                                <span class="screen-reader-text"></span>
                                            </div>
                                        </li>
                                    <?php
                                    }
                                    wp_reset_postdata();
                                } else {
                                    ?>
                                    <li class="product no-results">
                                        <h2 class="woocommerce-loop-product__title">
                                            <?php esc_html_e('No products found', 'elysia_first_web'); ?>
                                        </h2>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <?php get_template_part('template-parts/components/pagination'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
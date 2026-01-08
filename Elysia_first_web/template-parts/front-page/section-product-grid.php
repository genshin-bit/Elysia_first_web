<?php

/**
 * Template part for displaying the Product Grid section on the front page
 */

// Retrieve ACF fields
$title = get_field('product_grid_title') ?: 'Feature products';
$selected_products = get_field('product_grid_ids');

// Normalize to array of IDs (supports ID or Post Object formats)
$product_ids = [];
if ($selected_products) {
    foreach ((array) $selected_products as $product) {
        if (is_object($product)) {
            $product_ids[] = (int) $product->ID;
        } else {
            $product_ids[] = (int) $product;
        }
    }
}

// Build product data for rendering
$products = [];
if ($product_ids) {
    foreach ($product_ids as $product_id) {
        $post_obj = get_post($product_id);
        if (!$post_obj) {
            continue;
        }

        $image_id = function_exists('elysia_get_product_card_image_id') ? elysia_get_product_card_image_id($product_id) : 0;

        $products[] = [
            'id'        => $product_id,
            'title'     => get_the_title($product_id),
            'link'      => get_permalink($product_id),
            'excerpt'   => get_the_excerpt($product_id),
            'thumb_id'  => $image_id,
        ];
    }
}

?>

<style>
    .elysia-products-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 30px;
    }

    @media (max-width: 1024px) {
        .elysia-products-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 767px) {
        .elysia-products-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
</style>

<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-top-section elementor-element elementor-element-4e9a588 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="4e9a588" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-09bb20d"
            data-id="09bb20d" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <!-- Title -->
                <div class="elementor-element elementor-element-cf436d7 elementor-widget elementor-widget-heading"
                    data-id="cf436d7" data-element_type="widget"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($title); ?>
                        </h2>
                    </div>
                </div>

                <!-- Divider -->
                <div class="elementor-element elementor-element-7ea9a57 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                    data-id="7ea9a57" data-element_type="widget"
                    data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator"></span>
                        </div>
                    </div>
                </div>

                <div class="elementor-element elementor-element-639581f elementor-product-loop-item--align-center elementor-grid-5 elementor-grid-tablet-3 elementor-grid-mobile-2 elementor-products-grid elementor-wc-products elementor-widget elementor-widget-woocommerce-products"
                    data-id="639581f" data-element_type="widget"
                    data-widget_type="woocommerce-products.default">
                    <div class="elementor-widget-container">
                        <?php if ($products): ?>
                            <ul class="products elementor-grid columns-5 elysia-products-grid" data-products="type-1" data-hover="swap">
                                <?php foreach ($products as $product): ?>
                                    <?php
                                    $elysia_product_link = $product['link'];
                                    $elysia_product_title = $product['title'];
                                    $elysia_primary_image_url = '';
                                    if (!empty($product['thumb_id'])) {
                                        $elysia_primary_image_url = wp_get_attachment_image_url($product['thumb_id'], 'medium_large');
                                    }
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
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p><?php esc_html_e('No featured products selected.', 'elysia_first_web'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
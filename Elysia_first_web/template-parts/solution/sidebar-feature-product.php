<?php

defined('ABSPATH') || exit;

$elysia_context_id = get_queried_object_id();
$elysia_featured_products = array();

if ($elysia_context_id && function_exists('get_field')) {
    $elysia_featured_products = get_field('solution_featured_products', $elysia_context_id);
}

if ((!is_array($elysia_featured_products) || empty($elysia_featured_products)) && function_exists('get_field')) {
    $elysia_featured_products = get_field('solution_default_featured_products', 'option');
}

if (!is_array($elysia_featured_products)) {
    $elysia_featured_products = array();
}
?>
<div class="elementor-element elementor-element-bbffb7e elementor-widget elementor-widget-heading" data-id="bbffb7e" data-element_type="widget" data-widget_type="heading.default">
    <div class="elementor-widget-container">
        <h2 class="elementor-heading-title elementor-size-default">Feature Product</h2>
    </div>
</div>
<div class="elementor-element elementor-element-2cdbbfe elementor-product-loop-item--align-center elementor-grid-2 elementor-grid-tablet-3 elementor-grid-mobile-2 elementor-products-grid elementor-wc-products elementor-widget elementor-widget-woocommerce-products" data-id="2cdbbfe" data-element_type="widget" data-widget_type="woocommerce-products.default">
    <div class="elementor-widget-container">
        <div class="woocommerce columns-2 ">
            <ul class="products elementor-grid columns-2" data-products="type-1" data-hover="swap">
                <?php
                if (!empty($elysia_featured_products)) {
                    $elysia_count = 0;
                    foreach ($elysia_featured_products as $elysia_product_post) {
                        if ($elysia_count >= 4) {
                            break;
                        }
                        $elysia_product_id = 0;
                        if ($elysia_product_post instanceof WP_Post) {
                            $elysia_product_id = (int) $elysia_product_post->ID;
                        } else {
                            $elysia_product_id = (int) $elysia_product_post;
                        }
                        if ($elysia_product_id <= 0) {
                            continue;
                        }
                        $elysia_product = get_post($elysia_product_id);
                        if (!$elysia_product || $elysia_product->post_status !== 'publish') {
                            continue;
                        }
                        $elysia_product_title = get_the_title($elysia_product_id);
                        $elysia_product_link = get_permalink($elysia_product_id);
                        $elysia_image_id = function_exists('elysia_get_product_card_image_id') ? elysia_get_product_card_image_id($elysia_product_id) : 0;
                        $elysia_product_image = '';
                        if ($elysia_image_id) {
                            $elysia_product_image = wp_get_attachment_image(
                                $elysia_image_id,
                                'medium',
                                false,
                                array(
                                    'loading' => 'lazy',
                                    'class' => 'ct-swap',
                                    'style' => 'aspect-ratio: 1/1;',
                                )
                            );
                        }
                ?>
                        <li <?php post_class('product', $elysia_product_id); ?>>
                            <figure>
                                <a class="ct-media-container has-hover-effect" href="<?php echo esc_url($elysia_product_link); ?>" aria-label="<?php echo esc_attr($elysia_product_title); ?>">
                                    <?php
                                    if ($elysia_product_image) {
                                        echo $elysia_product_image;
                                        echo $elysia_product_image;
                                    }
                                    ?>
                                </a>
                            </figure>
                            <div class="ct-woo-card-actions" data-add-to-cart="auto-hide" data-alignment="equal">
                                <div class="woocommerce-loop-product__buttons">
                                    <a href="<?php echo esc_url($elysia_product_link); ?>" class="button product_type_simple">
                                        <?php echo esc_html__('Read more', 'elysia_first_web'); ?>
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php
                        $elysia_count++;
                    }
                } else {
                    ?>
                    <li class="product no-products">
                        <?php echo esc_html__('No featured products selected.', 'elysia_first_web'); ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>

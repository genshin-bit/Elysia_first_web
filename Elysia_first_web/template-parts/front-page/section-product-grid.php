<?php
/**
 * Template part for displaying the Product Grid section on the front page
 */

// Retrieve ACF fields
$title = get_field('product_grid_title') ?: 'Feature products';
$selected_products = get_field('product_grid_products');

$product_ids = [];
if ($selected_products) {
    foreach ($selected_products as $product) {
        // Handle both ID and Post Object return formats
        if (is_object($product)) {
            $product_ids[] = $product->ID;
        } else {
            $product_ids[] = $product;
        }
    }
}
$ids_str = implode(',', $product_ids);

?>

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

                <!-- Product Grid -->
                <div class="elementor-element elementor-element-639581f elementor-product-loop-item--align-center elementor-grid-5 elementor-grid-tablet-3 elementor-grid-mobile-2 elementor-products-grid elementor-wc-products elementor-widget elementor-widget-woocommerce-products"
                    data-id="639581f" data-element_type="widget"
                    data-widget_type="woocommerce-products.default">
                    <div class="elementor-widget-container">
                        <?php 
                        if (!empty($ids_str)) {
                            // Display selected products
                            echo do_shortcode('[products ids="' . esc_attr($ids_str) . '" columns="5"]');
                        } else {
                            // Fallback to featured products if no specific products selected
                            echo do_shortcode('[products limit="5" columns="5" visibility="featured"]');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

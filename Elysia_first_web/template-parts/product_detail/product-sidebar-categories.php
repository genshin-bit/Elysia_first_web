<!-- 产品详情页：侧边产品分类模块模板 -->
<div class="elementor-element elementor-element-748b09b1 elementor-widget elementor-widget-wp-widget-woocommerce_product_categories"
    data-id="748b09b1" data-element_type="widget"
    data-widget_type="wp-widget-woocommerce_product_categories.default">
    <div class="elementor-widget-container">
        <?php
        $taxonomy = 'product_cat';
        $has_terms = false;
        if (taxonomy_exists($taxonomy)) {
            $test_terms = get_terms(
                array(
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => false,
                    'number'     => 1,
                )
            );
            if (!is_wp_error($test_terms) && !empty($test_terms)) {
                $has_terms = true;
            }
        }
        if ($has_terms) :
        ?>
            <div class="woocommerce widget_product_categories">
                <h5>Product categories</h5>
                <ul class="product-categories">
                    <?php
                    wp_list_categories(
                        array(
                            'taxonomy'   => $taxonomy,
                            'title_li'   => '',
                            'hide_empty' => false,
                        )
                    );
                    ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>

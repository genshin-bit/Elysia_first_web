<?php
// 产品详情页：顶部概要信息模块模板
$product_id = get_the_ID();
$product_title = get_the_title();
$product_subtitle = '';
$hero_short_description = '';
if (function_exists('get_field')) {
    $product_subtitle = get_field('product_subtitle', $product_id);
    $hero_short_description = get_field('hero_short_description', $product_id);
}
$short_description = '';
if ($hero_short_description) {
    $short_description = $hero_short_description;
} else {
    $short_description = get_the_excerpt($product_id);
}
$categories_html = '';
$terms = get_the_terms($product_id, 'category');
if (!is_wp_error($terms) && !empty($terms)) {
    $links = array();
    foreach ($terms as $term) {
        $links[] = '<a href="' . esc_url(get_term_link($term)) . '" rel="tag">' . esc_html($term->name) . '</a>';
    }
    if (!empty($links)) {
        $categories_html = implode(', ', $links);
    }
}
?>

<div class="elementor-element elementor-element-30371618 elementor-widget elementor-widget-woocommerce-product-title elementor-page-title elementor-widget-heading"
    data-id="30371618" data-element_type="widget"
    data-widget_type="woocommerce-product-title.default">
    <div class="elementor-widget-container">
        <h1 class="product_title entry-title elementor-heading-title elementor-size-default">
            <?php echo esc_html($product_title); ?>
        </h1>
        <?php if ($product_subtitle) : ?>
            <p class="product-subtitle">
                <?php echo esc_html($product_subtitle); ?>
            </p>
        <?php endif; ?>
    </div>
</div>

<?php if ($categories_html) : ?>
    <div class="elementor-element elementor-element-7f56f53 elementor-woo-meta--view-table elementor-widget elementor-widget-woocommerce-product-meta"
        data-id="7f56f53" data-element_type="widget"
        data-widget_type="woocommerce-product-meta.default">
        <div class="elementor-widget-container">
            <div class="product_meta">
                <span class="posted_in detail-container">
                    <span class="detail-label">Categories</span>
                    <span class="detail-content">
                        <?php echo wp_kses_post($categories_html); ?>
                    </span>
                </span>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($short_description) : ?>
    <div class="elementor-element elementor-element-7c13a617 elementor-widget elementor-widget-woocommerce-product-short-description"
        data-id="7c13a617" data-element_type="widget"
        data-widget_type="woocommerce-product-short-description.default">
        <div class="elementor-widget-container">
            <div class="woocommerce-product-details__short-description">
                <?php echo wp_kses_post(wpautop($short_description)); ?>
                <?php if (function_exists('have_rows') && have_rows('hero_highlight_list', $product_id)) : ?>
                    <ul class="hero-highlight-list">
                        <?php
                        while (have_rows('hero_highlight_list', $product_id)) :
                            the_row();
                            $label = get_sub_field('label');
                            $value = get_sub_field('value');
                            if (!$label && !$value) {
                                continue;
                            }
                        ?>
                            <li class="detail-container">
                                <?php if ($label) : ?>
                                    <span class="detail-label"><?php echo esc_html($label); ?></span>
                                <?php endif; ?>
                                <?php if ($value) : ?>
                                    <span class="detail-content"><?php echo esc_html($value); ?></span>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

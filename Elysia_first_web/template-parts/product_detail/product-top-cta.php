<?php
// 产品详情页：顶部 CTA 按钮模块模板
$product_top_cta_text = '';
$product_top_cta_link = '';
if (function_exists('get_field')) {
    $product_top_cta_text = get_field('product_top_cta_text');
    $product_top_cta_link = get_field('product_top_cta_link');
}
if (!$product_top_cta_text) {
    $product_top_cta_text = 'Inquiry Now';
}
$product_top_cta_default_link = '#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM0MyIsInRvZ2dsZSI6ZmFsc2V9';
if (!$product_top_cta_link) {
    $product_top_cta_link = $product_top_cta_default_link;
}
?>
<div class="elementor-element elementor-element-2fd175cd elementor-mobile-align-center elementor-widget elementor-widget-button"
    data-id="2fd175cd" data-element_type="widget" data-widget_type="button.default">
    <div class="elementor-widget-container">
        <div class="elementor-button-wrapper">
            <a class="elementor-button elementor-button-link elementor-size-md"
                href="<?php echo esc_url($product_top_cta_link); ?>">
                <span class="elementor-button-content-wrapper">
                    <span class="elementor-button-text">
                        <?php echo esc_html($product_top_cta_text); ?>
                    </span>
                </span>
            </a>
        </div>
    </div>
</div>

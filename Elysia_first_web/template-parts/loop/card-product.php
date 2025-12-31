<?php

defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li <?php wc_product_class('product', $product); ?>>
    <figure>
        <a class="ct-media-container has-hover-effect" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
            <?php woocommerce_show_product_sale_flash(); ?>
            <?php woocommerce_template_loop_product_thumbnail(); ?>
        </a>
    </figure>
    <h2 class="woocommerce-loop-product__title">
        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?></a>
    </h2>
    <div class="ct-woo-card-actions" data-add-to-cart="auto-hide" data-alignment="equal">
        <div class="woocommerce-loop-product__buttons">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
    </div>
</li>
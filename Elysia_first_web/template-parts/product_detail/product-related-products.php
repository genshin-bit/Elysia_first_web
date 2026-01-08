<?php
// 产品详情页：相关产品列表模块模板
$related_ids = array();
if (function_exists('get_field')) {
    $acf_related = get_field('related_products');
    if (is_array($acf_related) && !empty($acf_related)) {
        foreach ($acf_related as $rel) {
            if (is_object($rel) && isset($rel->ID)) {
                $related_ids[] = (int) $rel->ID;
            } elseif ($rel) {
                $related_ids[] = (int) $rel;
            }
        }
    }
}
$related_ids = array_values(array_unique(array_filter($related_ids)));
if (!empty($related_ids)) :
?>
    <section data-particle_enable="false" data-particle-mobile-disabled="false"
        class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default"
        data-element_type="section">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element"
                data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-product-loop-item--align-center elementor-grid-4 elementor-grid-tablet-3 elementor-grid-mobile-2 elementor-products-grid elementor-wc-products elementor-widget elementor-widget-woocommerce-product-related"
                        data-element_type="widget"
                        data-widget_type="woocommerce-product-related.default">
                        <div class="elementor-widget-container">
                            <section class="related products">
                                <h2 class="ct-module-title">Related products</h2>
                                <ul class="products elementor-grid columns-4" data-products="type-1"
                                    data-hover="swap">
                                    <?php
                                    $query_args = array(
                                        'post_type' => 'any',
                                        'post__in' => $related_ids,
                                        'orderby' => 'post__in',
                                        'posts_per_page' => count($related_ids),
                                    );
                                    $related_query = new WP_Query($query_args);
                                    if ($related_query->have_posts()) :
                                        while ($related_query->have_posts()) :
                                            $related_query->the_post();
                                            $title = get_the_title();
                                            $link = get_permalink();
                                            $image_id = function_exists('elysia_get_product_card_image_id') ? elysia_get_product_card_image_id(get_the_ID()) : 0;
                                            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium_large') : '';
                                    ?>
                                            <li class="product type-product elementor-grid-item">
                                                <figure>
                                                    <a class="ct-media-container has-hover-effect"
                                                        href="<?php echo esc_url($link); ?>"
                                                        aria-label="<?php echo esc_attr($title); ?>">
                                                        <?php if ($image_url) { ?>
                                                            <img loading="lazy" width="400" height="400"
                                                                src="<?php echo esc_url($image_url); ?>"
                                                                alt="<?php echo esc_attr($title); ?>"
                                                                class="wp-post-image" style="aspect-ratio: 1/1;" />
                                                        <?php } ?>
                                                    </a>
                                                </figure>
                                                <h2 class="woocommerce-loop-product__title">
                                                    <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                        href="<?php echo esc_url($link); ?>"
                                                        target="_self">
                                                        <?php echo esc_html($title); ?>
                                                    </a>
                                                </h2>
                                                <div class="ct-woo-card-actions" data-add-to-cart="auto-hide"
                                                    data-alignment="equal">
                                                    <div class="woocommerce-loop-product__buttons">
                                                        <a href="<?php echo esc_url($link); ?>" data-quantity="1"
                                                            class="button product_type_simple">
                                                            <?php esc_html_e('Read more', 'elysia_first_web'); ?>
                                                        </a>
                                                    </div>
                                                    <span class="screen-reader-text"></span>
                                                </div>
                                            </li>
                                    <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    return;
endif;
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-top-section elementor-element elementor-element-80d620e elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="80d620e" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-644d3104"
            data-id="644d3104" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-ff345ad elementor-product-loop-item--align-center elementor-grid-4 elementor-grid-tablet-3 elementor-grid-mobile-2 elementor-products-grid elementor-wc-products show-heading-yes elementor-widget elementor-widget-woocommerce-product-related"
                    data-id="ff345ad" data-element_type="widget"
                    data-widget_type="woocommerce-product-related.default">
                    <div class="elementor-widget-container">
                        <section class="related products">
                            <h2 class="ct-module-title">Related products</h2>
                            <ul class="products elementor-grid columns-4" data-products="type-1"
                                data-hover="swap">
                                <li
                                    class="product type-product post-1537 status-publish first instock product_cat-box-plate-roll-forming-machine product_cat-roll-former product_cat-racking-shelving has-post-thumbnail shipping-taxable product-type-simple ct-default-gallery ct-ajax-add-to-cart">
                                    <figure>
                                        <a class="ct-media-container has-hover-effect"
                                            href="<?php echo esc_url(home_url('/product/steel-box-plate-making-roll-forming-machine/')); ?>"
                                            aria-label="Steel Box Plate Making Roll Forming Machine">
                                            <img loading="lazy" width="400" height="400"
                                                src="<?php echo get_template_directory_uri(); ?>/static/image/Steel-Box-Plate-Making-Roll-Forming-Machine-02-400x400.webp"
                                                alt="" decoding="async"
                                                srcset="https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-02-400x400.webp 400w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-02-100x100.webp 100w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-02-600x600.webp 600w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-02-300x300.webp 300w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-02-150x150.webp 150w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-02-768x768.webp 768w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-02-12x12.webp 12w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-02.webp 800w"
                                                sizes="(max-width: 400px) 100vw, 400px" class="ct-swap"
                                                style="aspect-ratio: 1/1;" />
                                            <img loading="lazy" width="400" height="400"
                                                src="<?php echo get_template_directory_uri(); ?>/static/image/Steel-Box-Plate-Making-Roll-Forming-Machine-01-400x400.webp"
                                                alt="Steel box plate making roll forming machine"
                                                decoding="async"
                                                srcset="https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-01-400x400.webp 400w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-01-100x100.webp 100w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-01-600x600.webp 600w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-01-300x300.webp 300w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-01-150x150.webp 150w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-01-768x768.webp 768w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-01-12x12.webp 12w, https://swforming.com/wp-content/uploads/2022/11/Steel-Box-Plate-Making-Roll-Forming-Machine-01.webp 800w"
                                                sizes="auto, (max-width: 400px) 100vw, 400px"
                                                itemprop="image" class="wp-post-image"
                                                style="aspect-ratio: 1/1;"
                                                data-caption="Steel box plate making roll forming machine"
                                                title="Steel Box Plate Making Roll Forming Machine 01" />
                                        </a>
                                    </figure>
                                    <h2 class="woocommerce-loop-product__title">
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                            href="<?php echo esc_url(home_url('/product/steel-box-plate-making-roll-forming-machine/')); ?>"
                                            target="_self">
                                            Steel Box Plate Making Roll Forming Machine
                                        </a>
                                    </h2>
                                    <div class="ct-woo-card-actions" data-add-to-cart="auto-hide"
                                        data-alignment="equal">
                                        <div class="woocommerce-loop-product__buttons">
                                            <a href="<?php echo esc_url(home_url('/product/steel-box-plate-making-roll-forming-machine/')); ?>"
                                                data-quantity="1" class="button product_type_simple"
                                                data-product_id="1537" data-product_sku=""
                                                aria-label="Read more about &ldquo;Steel Box Plate Making Roll Forming Machine&rdquo;"
                                                rel="nofollow" data-success_message="">
                                                Read more
                                            </a>
                                        </div>
                                        <span class="screen-reader-text"></span>
                                    </div>
                                </li>
                                <li
                                    class="product type-product post-942 status-publish instock product_cat-roll-former product_cat-roof-tile-panel-roll-forming-machine product_cat-metal-wall-roofing has-post-thumbnail shipping-taxable product-type-simple ct-default-gallery ct-ajax-add-to-cart">
                                    <figure>
                                        <a class="ct-media-container has-hover-effect"
                                            href="<?php echo esc_url(home_url('/product/roof-tile-roll-forming-machine/')); ?>"
                                            aria-label="Roof Tile Roll Forming Machine">
                                            <img loading="lazy" width="400" height="400"
                                                src="<?php echo get_template_directory_uri(); ?>/static/image/IMG_0886-400x400.jpg"
                                                alt="Storage Rack Roll Forming Machines" decoding="async"
                                                srcset="https://swforming.com/wp-content/uploads/2022/09/IMG_0886-400x400.jpg 400w, https://swforming.com/wp-content/uploads/2022/09/IMG_0886-100x100.jpg 100w, https://swforming.com/wp-content/uploads/2022/09/IMG_0886-150x150.jpg 150w"
                                                sizes="(max-width: 400px) 100vw, 400px" class="ct-swap"
                                                style="aspect-ratio: 1/1;" />
                                            <img loading="lazy" width="400" height="400"
                                                src="<?php echo get_template_directory_uri(); ?>/static/image/Corrugate-Roll-Forming-Machine-1-400x400.jpg"
                                                alt="Logistics Equipment Roll Forming Machines"
                                                decoding="async"
                                                srcset="https://swforming.com/wp-content/uploads/2022/09/Corrugate-Roll-Forming-Machine-1-400x400.jpg 400w, https://swforming.com/wp-content/uploads/2022/09/Corrugate-Roll-Forming-Machine-1-100x100.jpg 100w, https://swforming.com/wp-content/uploads/2022/09/Corrugate-Roll-Forming-Machine-1-150x150.jpg 150w"
                                                sizes="auto, (max-width: 400px) 100vw, 400px"
                                                itemprop="image" class="wp-post-image"
                                                style="aspect-ratio: 1/1;"
                                                title="Corrugate Roll Forming Machine (1)" />
                                        </a>
                                    </figure>
                                    <h2 class="woocommerce-loop-product__title">
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                            href="<?php echo esc_url(home_url('/product/roof-tile-roll-forming-machine/')); ?>"
                                            target="_self">
                                            Roof Tile Roll Forming Machine
                                        </a>
                                    </h2>
                                    <div class="ct-woo-card-actions" data-add-to-cart="auto-hide"
                                        data-alignment="equal">
                                        <div class="woocommerce-loop-product__buttons">
                                            <a href="<?php echo esc_url(home_url('/product/roof-tile-roll-forming-machine/')); ?>"
                                                data-quantity="1" class="button product_type_simple"
                                                data-product_id="942" data-product_sku=""
                                                aria-label="Read more about &ldquo;Roof Tile Roll Forming Machine&rdquo;"
                                                rel="nofollow" data-success_message="">
                                                Read more
                                            </a>
                                        </div>
                                        <span class="screen-reader-text"></span>
                                    </div>
                                </li>
                                <li
                                    class="product type-product post-751 status-publish instock product_cat-cable-tray-roll-forming-machine product_cat-roll-former product_cat-electric-energy has-post-thumbnail featured shipping-taxable product-type-simple ct-default-gallery ct-ajax-add-to-cart">
                                    <figure>
                                        <a class="ct-media-container has-hover-effect"
                                            href="<?php echo esc_url(home_url('/product/cable-tray-roll-forming-machine/')); ?>"
                                            aria-label="Cable Tray Roll Forming Machine">
                                            <img loading="lazy" width="400" height="400"
                                                src="<?php echo get_template_directory_uri(); ?>/static/image/Cable-Tray-Roll-Forming-Machine-02-400x400.webp"
                                                alt="Sports Facility Roll Forming Machines" decoding="async"
                                                srcset="https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-02-400x400.webp 400w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-02-100x100.webp 100w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-02-600x600.webp 600w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-02-300x300.webp 300w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-02-150x150.webp 150w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-02-768x768.webp 768w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-02.webp 800w"
                                                sizes="(max-width: 400px) 100vw, 400px" class="ct-swap"
                                                style="aspect-ratio: 1/1;" />
                                            <img loading="lazy" width="400" height="400"
                                                src="<?php echo get_template_directory_uri(); ?>/static/image/Cable-Tray-Roll-Forming-Machine-01-400x400.webp"
                                                alt="Cable Tray Roll Forming Machine" decoding="async"
                                                srcset="https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-01-400x400.webp 400w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-01-100x100.webp 100w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-01-600x600.webp 600w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-01-300x300.webp 300w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-01-150x150.webp 150w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-01-768x768.webp 768w, https://swforming.com/wp-content/uploads/2022/09/Cable-Tray-Roll-Forming-Machine-01.webp 800w"
                                                sizes="auto, (max-width: 400px) 100vw, 400px"
                                                itemprop="image" class="wp-post-image"
                                                style="aspect-ratio: 1/1;"
                                                title="Cable Tray Roll Forming Machine 01" />
                                        </a>
                                    </figure>
                                    <h2 class="woocommerce-loop-product__title">
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                            href="<?php echo esc_url(home_url('/product/cable-tray-roll-forming-machine/')); ?>"
                                            target="_self">
                                            Cable Tray Roll Forming Machine
                                        </a>
                                    </h2>
                                    <div class="ct-woo-card-actions" data-add-to-cart="auto-hide"
                                        data-alignment="equal">
                                        <div class="woocommerce-loop-product__buttons">
                                            <a href="<?php echo esc_url(home_url('/product/cable-tray-roll-forming-machine/')); ?>"
                                                data-quantity="1" class="button product_type_simple"
                                                data-product_id="751" data-product_sku=""
                                                aria-label="Read more about &ldquo;Cable Tray Roll Forming Machine&rdquo;"
                                                rel="nofollow" data-success_message="">
                                                Read more
                                            </a>
                                        </div>
                                        <span class="screen-reader-text"></span>
                                    </div>
                                </li>
                                <li
                                    class="product type-product post-388 status-publish last instock product_cat-profile-roll-forming-machine product_cat-pv-mounting-bracket-cz-u-hat-profile-roll-forming-machine product_cat-electric-energy has-post-thumbnail shipping-taxable product-type-simple ct-default-gallery ct-ajax-add-to-cart">
                                    <figure>
                                        <a class="ct-media-container has-hover-effect"
                                            href="<?php echo esc_url(home_url('/product/omega-profile-roll-forming-machine/')); ?>"
                                            aria-label="PV Mounting Bracket Roll Forming Machine (HAT / Omega Profile)">
                                            <img loading="lazy" width="400" height="400"
                                                src="<?php echo get_template_directory_uri(); ?>/static/image/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-02-400x400.webp"
                                                alt="Omega Profile Roll Forming Machine" decoding="async"
                                                srcset="https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-02-400x400.webp 400w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-02-100x100.webp 100w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-02-600x600.webp 600w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-02-300x300.webp 300w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-02-150x150.webp 150w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-02-768x768.webp 768w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-02.webp 800w"
                                                sizes="(max-width: 400px) 100vw, 400px" class="ct-swap"
                                                style="aspect-ratio: 1/1;" />
                                            <img loading="lazy" width="400" height="400"
                                                src="<?php echo get_template_directory_uri(); ?>/static/image/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-01-400x400.webp"
                                                alt="Omega Profile Roll Forming Machine" decoding="async"
                                                srcset="https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-01-400x400.webp 400w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-01-100x100.webp 100w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-01-600x600.webp 600w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-01-300x300.webp 300w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-01-150x150.webp 150w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-01-768x768.webp 768w, https://swforming.com/wp-content/uploads/2022/09/PV-Mounting-Bracket-HAT-Omega-Profile-Roll-Forming-Machine-01.webp 800w"
                                                sizes="auto, (max-width: 400px) 100vw, 400px"
                                                itemprop="image" class="wp-post-image"
                                                style="aspect-ratio: 1/1;"
                                                title="PV Mounting Bracket HAT Omega Profile Roll Forming Machine 01" />
                                        </a>
                                    </figure>
                                    <h2 class="woocommerce-loop-product__title">
                                        <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                            href="<?php echo esc_url(home_url('/product/omega-profile-roll-forming-machine/')); ?>"
                                            target="_self">
                                            PV Mounting Bracket Roll Forming Machine (HAT / Omega Profile)
                                        </a>
                                    </h2>
                                    <div class="ct-woo-card-actions" data-add-to-cart="auto-hide"
                                        data-alignment="equal">
                                        <div class="woocommerce-loop-product__buttons">
                                            <a href="<?php echo esc_url(home_url('/product/omega-profile-roll-forming-machine/')); ?>"
                                                data-quantity="1" class="button product_type_simple"
                                                data-product_id="388" data-product_sku=""
                                                aria-label="Read more about &ldquo;PV Mounting Bracket Roll Forming Machine (HAT / Omega Profile)&rdquo;"
                                                rel="nofollow" data-success_message="">
                                                Read more
                                            </a>
                                        </div>
                                        <span class="screen-reader-text"></span>
                                    </div>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

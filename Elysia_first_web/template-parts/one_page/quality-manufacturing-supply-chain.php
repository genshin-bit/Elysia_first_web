<?php
$elysia_quality_supply_badge = '';
$elysia_quality_supply_title = '';
$elysia_quality_supply_1_order = '';
$elysia_quality_supply_1_title = '';
$elysia_quality_supply_1_text = '';
$elysia_quality_supply_1_image = null;
$elysia_quality_supply_2_order = '';
$elysia_quality_supply_2_title = '';
$elysia_quality_supply_2_text = '';
$elysia_quality_supply_2_image = null;

if (function_exists('get_field')) {
    $field_value = get_field('quality_supply_badge');
    if ($field_value) {
        $elysia_quality_supply_badge = $field_value;
    }

    $field_value = get_field('quality_supply_title');
    if ($field_value) {
        $elysia_quality_supply_title = $field_value;
    }

    $field_value = get_field('quality_supply_1_order');
    if ($field_value) {
        $elysia_quality_supply_1_order = $field_value;
    }

    $field_value = get_field('quality_supply_1_title');
    if ($field_value) {
        $elysia_quality_supply_1_title = $field_value;
    }

    $field_value = get_field('quality_supply_1_text');
    if ($field_value) {
        $elysia_quality_supply_1_text = $field_value;
    }

    $image_field = get_field('quality_supply_1_image');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $elysia_quality_supply_1_image = $image_field;
    }

    $field_value = get_field('quality_supply_2_order');
    if ($field_value) {
        $elysia_quality_supply_2_order = $field_value;
    }

    $field_value = get_field('quality_supply_2_title');
    if ($field_value) {
        $elysia_quality_supply_2_title = $field_value;
    }

    $field_value = get_field('quality_supply_2_text');
    if ($field_value) {
        $elysia_quality_supply_2_text = $field_value;
    }

    $image_field = get_field('quality_supply_2_image');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $elysia_quality_supply_2_image = $image_field;
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-3546e172 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3546e172" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6aefde30" data-id="6aefde30" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-9acc725 elementor-widget elementor-widget-heading" data-id="9acc725" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h5 class="elementor-heading-title elementor-size-default">
                            <?php echo $elysia_quality_supply_badge !== '' ? esc_html($elysia_quality_supply_badge) : 'Supply Chain Details'; ?>
                        </h5>
                    </div>
                </div>
                <div class="elementor-element elementor-element-54af5ad elementor-widget elementor-widget-heading" data-id="54af5ad" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo $elysia_quality_supply_title !== '' ? esc_html($elysia_quality_supply_title) : 'We Always Ready To Be Your Partner'; ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-2b173aac elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2b173aac" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-51447341" data-id="51447341" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4e8e893 elementor-widget elementor-widget-image" data-id="4e8e893" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_quality_supply_1_image && isset($elysia_quality_supply_1_image['url'])) : ?>
                            <img decoding="async" width="<?php echo isset($elysia_quality_supply_1_image['width']) ? esc_attr($elysia_quality_supply_1_image['width']) : 750; ?>" height="<?php echo isset($elysia_quality_supply_1_image['height']) ? esc_attr($elysia_quality_supply_1_image['height']) : 500; ?>" src="<?php echo esc_url($elysia_quality_supply_1_image['url']); ?>" class="attachment-large size-large" alt="<?php echo isset($elysia_quality_supply_1_image['alt']) ? esc_attr($elysia_quality_supply_1_image['alt']) : ''; ?>" title="<?php echo isset($elysia_quality_supply_1_image['title']) ? esc_attr($elysia_quality_supply_1_image['title']) : ''; ?>">
                        <?php else : ?>
                            <img decoding="async" width="750" height="500" src="<?php echo get_template_directory_uri(); ?>/static/image/932c8e30-ad2e-4fde-a6f8-c56eba31f573.jpg" class="attachment-large size-large wp-image-261" alt="932c8e30 ad2e 4fde a6f8 c56eba31f573" srcset="https://swforming.com/wp-content/uploads/2022/09/932c8e30-ad2e-4fde-a6f8-c56eba31f573.jpg 750w, https://swforming.com/wp-content/uploads/2022/09/932c8e30-ad2e-4fde-a6f8-c56eba31f573-600x400.jpg 600w, https://swforming.com/wp-content/uploads/2022/09/932c8e30-ad2e-4fde-a6f8-c56eba31f573-300x200.jpg 300w" sizes="(max-width: 750px) 100vw, 750px" title="Quality Manufacturing 2">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-68462cc8" data-id="68462cc8" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4ffe6d74 elementor-widget elementor-widget-text-editor" data-id="4ffe6d74" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p><?php echo $elysia_quality_supply_1_order !== '' ? esc_html($elysia_quality_supply_1_order) : '01.'; ?></p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-75044917 elementor-widget elementor-widget-heading" data-id="75044917" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h3 class="elementor-heading-title elementor-size-default">
                            <?php echo $elysia_quality_supply_1_title !== '' ? esc_html($elysia_quality_supply_1_title) : 'We Always Ready'; ?>
                        </h3>
                    </div>
                </div>
                <div class="elementor-element elementor-element-2be40a58 elementor-widget elementor-widget-text-editor" data-id="2be40a58" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_quality_supply_1_text !== '') : ?>
                            <?php echo function_exists('wp_kses_post') ? wp_kses_post($elysia_quality_supply_1_text) : esc_html($elysia_quality_supply_1_text); ?>
                        <?php else : ?>
                            <p>No matter the size of your business, Sunway is exactly what you need in a supply chain solution provider. Our team of professionals helps you set the standard in the marketplace. We recognize that poor quality cold roll forming machine in the marketplace can be fatal to your business.</p>
                            <p>Sunway’s supply chain is unique in that we can help you supply products in an affordable and timely manner and keep you informed of the hottest in-demand products on the market and the latest technology in the industry. We have large warehouses to stock every must-have product and are ready to ship products when our customers need them.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-59c90320 elementor-reverse-mobile elementor-reverse-tablet elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="59c90320" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7b4ae883" data-id="7b4ae883" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-1383579d elementor-widget elementor-widget-text-editor" data-id="1383579d" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p><?php echo $elysia_quality_supply_2_order !== '' ? esc_html($elysia_quality_supply_2_order) : '02.'; ?></p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-6aa74ab6 elementor-widget elementor-widget-heading" data-id="6aa74ab6" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h3 class="elementor-heading-title elementor-size-default">
                            <?php if ($elysia_quality_supply_2_title !== '') : ?>
                                <?php echo esc_html($elysia_quality_supply_2_title); ?>
                            <?php endif; ?>
                        </h3>
                    </div>
                </div>
                <div class="elementor-element elementor-element-10d20a07 elementor-widget elementor-widget-text-editor" data-id="10d20a07" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_quality_supply_2_text !== '') : ?>
                            <?php echo function_exists('wp_kses_post') ? wp_kses_post($elysia_quality_supply_2_text) : esc_html($elysia_quality_supply_2_text); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4643ab05" data-id="4643ab05" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-157bfa9 elementor-widget elementor-widget-image" data-id="157bfa9" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_quality_supply_2_image && isset($elysia_quality_supply_2_image['url'])) : ?>
                            <img decoding="async" width="<?php echo isset($elysia_quality_supply_2_image['width']) ? esc_attr($elysia_quality_supply_2_image['width']) : 750; ?>" height="<?php echo isset($elysia_quality_supply_2_image['height']) ? esc_attr($elysia_quality_supply_2_image['height']) : 500; ?>" src="<?php echo esc_url($elysia_quality_supply_2_image['url']); ?>" class="attachment-large size-large" alt="<?php echo isset($elysia_quality_supply_2_image['alt']) ? esc_attr($elysia_quality_supply_2_image['alt']) : ''; ?>" title="<?php echo isset($elysia_quality_supply_2_image['title']) ? esc_attr($elysia_quality_supply_2_image['title']) : ''; ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
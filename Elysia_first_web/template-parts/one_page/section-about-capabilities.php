<?php
$elysia_capabilities_badge = '';
$elysia_capabilities_title = '';
$elysia_capabilities_description = '';
$elysia_capabilities_cta_label = '';
$elysia_capabilities_cta_href = '#';
$elysia_capabilities_main_image = null;
$elysia_capabilities_secondary_image = null;
$elysia_capabilities_has_acf = false;

if (function_exists('get_field')) {
    $field_value = get_field('capabilities_badge');
    if ($field_value) {
        $elysia_capabilities_badge = $field_value;
        $elysia_capabilities_has_acf = true;
    }

    $field_value = get_field('capabilities_title');
    if ($field_value) {
        $elysia_capabilities_title = $field_value;
        $elysia_capabilities_has_acf = true;
    }

    $field_value = get_field('capabilities_description');
    if ($field_value) {
        $elysia_capabilities_description = $field_value;
        $elysia_capabilities_has_acf = true;
    }

    $field_value = get_field('capabilities_cta_label');
    if ($field_value) {
        $elysia_capabilities_cta_label = $field_value;
        $elysia_capabilities_has_acf = true;
    }

    $target_page = get_field('capabilities_cta_target');
    if ($target_page) {
        $target_id = $target_page;
        if (is_array($target_page) && isset($target_page['ID'])) {
            $target_id = $target_page['ID'];
        }
        $permalink = get_permalink($target_id);
        if ($permalink) {
            $elysia_capabilities_cta_href = $permalink;
            $elysia_capabilities_has_acf = true;
        }
    }

    $image_field = get_field('capabilities_main_image');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $elysia_capabilities_main_image = $image_field;
        $elysia_capabilities_has_acf = true;
    }

    $image_field = get_field('capabilities_secondary_image');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $elysia_capabilities_secondary_image = $image_field;
        $elysia_capabilities_has_acf = true;
    }
}

if (!$elysia_capabilities_has_acf) {
    return;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-37486ef4 ct-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="37486ef4" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6e43012d" data-id="6e43012d" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($elysia_capabilities_badge !== '') : ?>
                    <div class="elementor-element elementor-element-54f1adc elementor-widget elementor-widget-heading" data-id="54f1adc" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h5 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_capabilities_badge); ?></h5>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($elysia_capabilities_title !== '') : ?>
                    <div class="elementor-element elementor-element-40f83bcf elementor-widget elementor-widget-heading" data-id="40f83bcf" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_capabilities_title); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($elysia_capabilities_description) : ?>
                    <div class="elementor-element elementor-element-201f0d05 elementor-widget elementor-widget-text-editor" data-id="201f0d05" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <?php echo function_exists('wp_kses_post') ? wp_kses_post($elysia_capabilities_description) : esc_html($elysia_capabilities_description); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="elementor-element elementor-element-7713ab7 elementor-align-left elementor-mobile-align-center elementor-widget elementor-widget-button" data-id="7713ab7" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($elysia_capabilities_cta_href); ?>">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text"><?php echo esc_html($elysia_capabilities_cta_label); ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-b6db815" data-id="b6db815" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($elysia_capabilities_main_image && isset($elysia_capabilities_main_image['url'])) : ?>
                    <div class="elementor-element elementor-element-6bf40fa elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="6bf40fa" data-element_type="widget" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <img decoding="async" width="<?php echo isset($elysia_capabilities_main_image['width']) ? esc_attr($elysia_capabilities_main_image['width']) : 600; ?>" height="<?php echo isset($elysia_capabilities_main_image['height']) ? esc_attr($elysia_capabilities_main_image['height']) : 600; ?>" src="<?php echo esc_url($elysia_capabilities_main_image['url']); ?>" class="attachment-large size-large wp-image-<?php echo isset($elysia_capabilities_main_image['ID']) ? esc_attr($elysia_capabilities_main_image['ID']) : ''; ?>" alt="<?php echo isset($elysia_capabilities_main_image['alt']) ? esc_attr($elysia_capabilities_main_image['alt']) : ''; ?>" title="<?php echo isset($elysia_capabilities_main_image['title']) ? esc_attr($elysia_capabilities_main_image['title']) : ''; ?>">
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($elysia_capabilities_secondary_image && isset($elysia_capabilities_secondary_image['url'])) : ?>
                    <div class="elementor-element elementor-element-cc48102 elementor-absolute elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="cc48102" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <img decoding="async" width="<?php echo isset($elysia_capabilities_secondary_image['width']) ? esc_attr($elysia_capabilities_secondary_image['width']) : 400; ?>" height="<?php echo isset($elysia_capabilities_secondary_image['height']) ? esc_attr($elysia_capabilities_secondary_image['height']) : 400; ?>" src="<?php echo esc_url($elysia_capabilities_secondary_image['url']); ?>" class="attachment-large size-large wp-image-<?php echo isset($elysia_capabilities_secondary_image['ID']) ? esc_attr($elysia_capabilities_secondary_image['ID']) : ''; ?>" alt="<?php echo isset($elysia_capabilities_secondary_image['alt']) ? esc_attr($elysia_capabilities_secondary_image['alt']) : ''; ?>" title="<?php echo isset($elysia_capabilities_secondary_image['title']) ? esc_attr($elysia_capabilities_secondary_image['title']) : ''; ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

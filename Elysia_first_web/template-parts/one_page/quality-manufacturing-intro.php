<?php
$elysia_quality_intro_badge = '';
$elysia_quality_intro_title = '';
$elysia_quality_intro_text = '';
$elysia_quality_intro_image = null;
$elysia_quality_intro_button_text = '';
$elysia_quality_intro_popup_id = '';

if (function_exists('get_field')) {
    $field_value = get_field('quality_intro_badge');
    if ($field_value) {
        $elysia_quality_intro_badge = $field_value;
    }

    $field_value = get_field('quality_intro_title');
    if ($field_value) {
        $elysia_quality_intro_title = $field_value;
    }

    $field_value = get_field('quality_intro_text');
    if ($field_value) {
        $elysia_quality_intro_text = $field_value;
    }

    $image_field = get_field('quality_intro_image');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $elysia_quality_intro_image = $image_field;
    }

    $field_value = get_field('quality_intro_contact_button_text');
    if ($field_value) {
        $elysia_quality_intro_button_text = $field_value;
    }

    $field_value = get_field('quality_intro_contact_popup_id');
    if ($field_value) {
        $elysia_quality_intro_popup_id = $field_value;
    }
}

$elysia_quality_intro_button_has_popup = $elysia_quality_intro_button_text !== '' && $elysia_quality_intro_popup_id !== '';
$elysia_quality_intro_popup_href = '';

if ($elysia_quality_intro_button_has_popup) {
    $elysia_quality_intro_popup_settings = array(
        'id' => $elysia_quality_intro_popup_id,
        'toggle' => false,
    );

    $elysia_quality_intro_popup_href = '#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3D' . rawurlencode(base64_encode(wp_json_encode($elysia_quality_intro_popup_settings)));
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-681a35c1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="681a35c1" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6ceec239" data-id="6ceec239" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-2e84af6 elementor-widget elementor-widget-heading" data-id="2e84af6" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h5 class="elementor-heading-title elementor-size-default">
                            <?php if ($elysia_quality_intro_badge !== '') : ?>
                                <?php echo esc_html($elysia_quality_intro_badge); ?>
                            <?php endif; ?>
                        </h5>
                    </div>
                </div>
                <div class="elementor-element elementor-element-34a1087d elementor-widget elementor-widget-heading" data-id="34a1087d" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php if ($elysia_quality_intro_title !== '') : ?>
                                <?php echo esc_html($elysia_quality_intro_title); ?>
                            <?php endif; ?>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-5b0c5602 elementor-widget elementor-widget-text-editor" data-id="5b0c5602" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_quality_intro_text !== '') : ?>
                            <?php echo function_exists('wp_kses_post') ? wp_kses_post($elysia_quality_intro_text) : esc_html($elysia_quality_intro_text); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($elysia_quality_intro_button_has_popup) : ?>
                    <div class="elementor-element elementor-element-58d93fe elementor-mobile-align-center elementor-align-left elementor-widget elementor-widget-button" data-id="58d93fe" data-element_type="widget" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                                <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($elysia_quality_intro_popup_href); ?>">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text"><?php echo esc_html($elysia_quality_intro_button_text); ?></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1a1148f8" data-id="1a1148f8" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-1ae998c8 elementor-widget elementor-widget-image" data-id="1ae998c8" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_quality_intro_image && isset($elysia_quality_intro_image['url'])) : ?>
                            <img fetchpriority="high" decoding="async" width="<?php echo isset($elysia_quality_intro_image['width']) ? esc_attr($elysia_quality_intro_image['width']) : 500; ?>" height="<?php echo isset($elysia_quality_intro_image['height']) ? esc_attr($elysia_quality_intro_image['height']) : 375; ?>" src="<?php echo esc_url($elysia_quality_intro_image['url']); ?>" class="attachment-large size-large" alt="<?php echo isset($elysia_quality_intro_image['alt']) ? esc_attr($elysia_quality_intro_image['alt']) : ''; ?>" title="<?php echo isset($elysia_quality_intro_image['title']) ? esc_attr($elysia_quality_intro_image['title']) : ''; ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
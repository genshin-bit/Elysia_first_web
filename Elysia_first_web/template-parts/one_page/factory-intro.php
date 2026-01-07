<?php
$factory_intro_text = '';
$factory_intro_image = null;
$factory_intro_contact_button_text = '';
$factory_intro_contact_href = '';
$factory_intro_has_acf = false;

if (function_exists('get_field')) {
    $intro_text_value = get_field('factory_intro_text');
    if ($intro_text_value) {
        $factory_intro_text = $intro_text_value;
        $factory_intro_has_acf = true;
    }

    $intro_image_value = get_field('factory_intro_image');
    if (is_array($intro_image_value) && !empty($intro_image_value['url'])) {
        $factory_intro_image = $intro_image_value;
        $factory_intro_has_acf = true;
    }

    $button_text_value = get_field('factory_intro_contact_button_text');
    if ($button_text_value) {
        $factory_intro_contact_button_text = $button_text_value;
        $factory_intro_has_acf = true;
    }

    $contact_popup_id = get_field('factory_intro_contact_popup_id');
    if ($contact_popup_id) {
        $popup_id_value = (string) $contact_popup_id;
        $settings_array = array(
            'id' => $popup_id_value,
            'toggle' => false,
        );
        if (function_exists('wp_json_encode')) {
            $settings_json = wp_json_encode($settings_array);
        } else {
            $settings_json = json_encode($settings_array);
        }
        if ($settings_json) {
            $factory_intro_contact_href = '#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3D' . rawurlencode(base64_encode($settings_json));
            $factory_intro_has_acf = true;
        }
    }
}

if (!$factory_intro_has_acf) {
    return;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-8ad7d98 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8ad7d98" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ea58ef3" data-id="ea58ef3" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-6b57d6f elementor-widget elementor-widget-heading" data-id="6b57d6f" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h5 class="elementor-heading-title elementor-size-default">quality manufacturing</h5>
                    </div>
                </div>
                <div class="elementor-element elementor-element-6799cfc elementor-widget elementor-widget-heading" data-id="6799cfc" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">The Leading Roll forming machine Factory In China</h2>
                    </div>
                </div>
                <?php if ($factory_intro_text !== '') : ?>
                    <div class="elementor-element elementor-element-b435b37 elementor-widget elementor-widget-text-editor" data-id="b435b37" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <?php echo function_exists('wp_kses_post') ? wp_kses_post($factory_intro_text) : esc_html($factory_intro_text); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($factory_intro_contact_button_text !== '' && $factory_intro_contact_href !== '') : ?>
                    <div class="elementor-element elementor-element-cfe889e elementor-mobile-align-center elementor-align-left elementor-widget elementor-widget-button" data-id="cfe889e" data-element_type="widget" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                                <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($factory_intro_contact_href); ?>">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text"><?php echo esc_html($factory_intro_contact_button_text); ?></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-8e18fd6" data-id="8e18fd6" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($factory_intro_image && isset($factory_intro_image['url'])) : ?>
                    <div class="elementor-element elementor-element-4747ead elementor-widget elementor-widget-image" data-id="4747ead" data-element_type="widget" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <img fetchpriority="high" decoding="async" width="<?php echo isset($factory_intro_image['width']) ? esc_attr($factory_intro_image['width']) : 612; ?>" height="<?php echo isset($factory_intro_image['height']) ? esc_attr($factory_intro_image['height']) : 408; ?>" src="<?php echo esc_url($factory_intro_image['url']); ?>" class="attachment-large size-large wp-image-<?php echo isset($factory_intro_image['ID']) ? esc_attr($factory_intro_image['ID']) : ''; ?>" alt="<?php echo isset($factory_intro_image['alt']) ? esc_attr($factory_intro_image['alt']) : ''; ?>" title="<?php echo isset($factory_intro_image['title']) ? esc_attr($factory_intro_image['title']) : ''; ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

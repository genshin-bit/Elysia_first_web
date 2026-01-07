<?php
$why_intro_eyebrow = '';
$why_intro_title = '';
$why_intro_body = '';
$why_intro_cta_text = '';
$why_intro_cta_type = '';
$why_intro_cta_popup_id = null;
$why_intro_cta_page = null;
$why_intro_cta_custom_url = '';
$why_intro_image_main = null;
$why_intro_image_secondary = null;

if (function_exists('get_field')) {
    $field_value = get_field('why_intro_eyebrow');
    if ($field_value) {
        $why_intro_eyebrow = (string) $field_value;
    }

    $field_value = get_field('why_intro_title');
    if ($field_value) {
        $why_intro_title = (string) $field_value;
    }

    $field_value = get_field('why_intro_body');
    if ($field_value) {
        $why_intro_body = $field_value;
    }

    $field_value = get_field('why_intro_cta_text');
    if ($field_value) {
        $why_intro_cta_text = (string) $field_value;
    }

    $field_value = get_field('why_intro_cta_type');
    if ($field_value) {
        $why_intro_cta_type = (string) $field_value;
    }

    $field_value = get_field('why_intro_cta_popup_id');
    if ($field_value !== null && $field_value !== '') {
        $why_intro_cta_popup_id = (int) $field_value;
    }

    $field_value = get_field('why_intro_cta_page');
    if ($field_value) {
        $why_intro_cta_page = $field_value;
    }

    $field_value = get_field('why_intro_cta_custom_url');
    if ($field_value) {
        $why_intro_cta_custom_url = (string) $field_value;
    }

    $image_field = get_field('why_intro_image_main');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $why_intro_image_main = $image_field;
    }

    $image_field = get_field('why_intro_image_secondary');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $why_intro_image_secondary = $image_field;
    }
}

$has_left = $why_intro_eyebrow !== '' || $why_intro_title !== '' || $why_intro_body !== '' || $why_intro_cta_text !== '';
$has_right = (is_array($why_intro_image_main) && !empty($why_intro_image_main['url'])) || (is_array($why_intro_image_secondary) && !empty($why_intro_image_secondary['url']));

if (!$has_left && !$has_right) {
    return;
}

$why_intro_cta_href = '';

if ($why_intro_cta_type === 'popup' && $why_intro_cta_popup_id) {
    $popup_id_value = (string) $why_intro_cta_popup_id;
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
        $why_intro_cta_href = '#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3D' . rawurlencode(base64_encode($settings_json));
    }
} elseif ($why_intro_cta_type === 'contact_page' && $why_intro_cta_page) {
    if (function_exists('get_permalink')) {
        $why_intro_cta_href = get_permalink($why_intro_cta_page);
    }
} elseif ($why_intro_cta_type === 'custom_url' && $why_intro_cta_custom_url !== '') {
    $why_intro_cta_href = $why_intro_cta_custom_url;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-b0cbd04 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b0cbd04" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-e49f5b4" data-id="e49f5b4" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($why_intro_eyebrow !== '') : ?>
                    <div class="elementor-element elementor-element-3329fa9 elementor-widget elementor-widget-heading" data-id="3329fa9" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h5 class="elementor-heading-title elementor-size-default"><?php echo esc_html($why_intro_eyebrow); ?></h5>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($why_intro_title !== '') : ?>
                    <div class="elementor-element elementor-element-6787ca6 elementor-widget elementor-widget-heading" data-id="6787ca6" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($why_intro_title); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($why_intro_body !== '') : ?>
                    <div class="elementor-element elementor-element-dbc77cc elementor-widget elementor-widget-text-editor" data-id="dbc77cc" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <?php echo function_exists('wp_kses_post') ? wp_kses_post($why_intro_body) : $why_intro_body; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($why_intro_cta_text !== '' && $why_intro_cta_href !== '') : ?>
                    <div class="elementor-element elementor-element-3770395 elementor-align-left elementor-widget elementor-widget-button" data-id="3770395" data-element_type="widget" data-widget_type="button.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-button-wrapper">
                                <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($why_intro_cta_href); ?>">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text"><?php echo esc_html($why_intro_cta_text); ?></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3c62877d" data-id="3c62877d" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($why_intro_image_main && isset($why_intro_image_main['url'])) : ?>
                    <div class="elementor-element elementor-element-11cdaaef elementor-widget__width-initial elementor-absolute elementor-widget elementor-widget-image" data-id="11cdaaef" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <img fetchpriority="high" decoding="async" width="<?php echo isset($why_intro_image_main['width']) ? esc_attr($why_intro_image_main['width']) : 600; ?>" height="<?php echo isset($why_intro_image_main['height']) ? esc_attr($why_intro_image_main['height']) : 600; ?>" src="<?php echo esc_url($why_intro_image_main['url']); ?>" class="attachment-large size-large wp-image-<?php echo isset($why_intro_image_main['ID']) ? esc_attr($why_intro_image_main['ID']) : ''; ?>" alt="<?php echo isset($why_intro_image_main['alt']) ? esc_attr($why_intro_image_main['alt']) : ''; ?>" title="<?php echo isset($why_intro_image_main['title']) ? esc_attr($why_intro_image_main['title']) : ''; ?>">
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($why_intro_image_secondary && isset($why_intro_image_secondary['url'])) : ?>
                    <div class="elementor-element elementor-element-4ce6b85e elementor-widget__width-initial elementor-widget elementor-widget-image" data-id="4ce6b85e" data-element_type="widget" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <img decoding="async" width="<?php echo isset($why_intro_image_secondary['width']) ? esc_attr($why_intro_image_secondary['width']) : 600; ?>" height="<?php echo isset($why_intro_image_secondary['height']) ? esc_attr($why_intro_image_secondary['height']) : 600; ?>" src="<?php echo esc_url($why_intro_image_secondary['url']); ?>" class="attachment-large size-large wp-image-<?php echo isset($why_intro_image_secondary['ID']) ? esc_attr($why_intro_image_secondary['ID']) : ''; ?>" alt="<?php echo isset($why_intro_image_secondary['alt']) ? esc_attr($why_intro_image_secondary['alt']) : ''; ?>" title="<?php echo isset($why_intro_image_secondary['title']) ? esc_attr($why_intro_image_secondary['title']) : ''; ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

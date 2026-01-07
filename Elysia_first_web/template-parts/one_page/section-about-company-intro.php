<?php
$elysia_about_intro_badge = '';
$elysia_about_intro_title = '';
$elysia_about_intro_paragraphs = array();
$elysia_about_intro_image = null;
$elysia_about_intro_link_type = '';
$elysia_about_intro_popup_id = null;
$elysia_about_intro_cta_url = '';
$elysia_about_intro_cta_label = '';
$elysia_about_intro_has_acf = false;

if (function_exists('get_field')) {
    $field_value = get_field('about_intro_badge');
    if ($field_value) {
        $elysia_about_intro_badge = $field_value;
        $elysia_about_intro_has_acf = true;
    }

    $field_value = get_field('about_intro_title');
    if ($field_value) {
        $elysia_about_intro_title = $field_value;
        $elysia_about_intro_has_acf = true;
    }

    $paragraph_rows = get_field('about_intro_paragraphs');
    if (is_array($paragraph_rows) && count($paragraph_rows) > 0) {
        $elysia_about_intro_paragraphs = $paragraph_rows;
        $elysia_about_intro_has_acf = true;
    }

    $image_field = get_field('about_intro_image');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $elysia_about_intro_image = $image_field;
        $elysia_about_intro_has_acf = true;
    }

    $field_value = get_field('about_intro_link_type');
    if ($field_value) {
        $elysia_about_intro_link_type = $field_value;
        $elysia_about_intro_has_acf = true;
    }

    $field_value = get_field('about_intro_popup_id');
    if ($field_value !== null && $field_value !== '') {
        $elysia_about_intro_popup_id = (int) $field_value;
        $elysia_about_intro_has_acf = true;
    }

    $field_value = get_field('about_intro_cta_url');
    if ($field_value) {
        $elysia_about_intro_cta_url = $field_value;
        $elysia_about_intro_has_acf = true;
    }

    $field_value = get_field('about_intro_cta_label');
    if ($field_value) {
        $elysia_about_intro_cta_label = $field_value;
        $elysia_about_intro_has_acf = true;
    }
}

if (!$elysia_about_intro_has_acf) {
    return;
}

$elysia_about_intro_cta_href = '#';

if ($elysia_about_intro_link_type === 'popup' && $elysia_about_intro_popup_id) {
    $popup_id_value = (string) $elysia_about_intro_popup_id;
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
        $elysia_about_intro_cta_href = '#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3D' . rawurlencode(base64_encode($settings_json));
    }
} elseif ($elysia_about_intro_link_type === 'page' && $elysia_about_intro_cta_url) {
    $elysia_about_intro_cta_href = $elysia_about_intro_cta_url;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-3fd15dce elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3fd15dce" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-70af08bb" data-id="70af08bb" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-3129899 elementor-widget elementor-widget-image" data-id="3129899" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_about_intro_image && isset($elysia_about_intro_image['url'])) : ?>
                            <img fetchpriority="high" decoding="async" width="<?php echo isset($elysia_about_intro_image['width']) ? esc_attr($elysia_about_intro_image['width']) : 1024; ?>" height="<?php echo isset($elysia_about_intro_image['height']) ? esc_attr($elysia_about_intro_image['height']) : 576; ?>" src="<?php echo esc_url($elysia_about_intro_image['url']); ?>" class="attachment-large size-large wp-image-<?php echo isset($elysia_about_intro_image['ID']) ? esc_attr($elysia_about_intro_image['ID']) : ''; ?>" alt="<?php echo isset($elysia_about_intro_image['alt']) ? esc_attr($elysia_about_intro_image['alt']) : ''; ?>" title="<?php echo isset($elysia_about_intro_image['title']) ? esc_attr($elysia_about_intro_image['title']) : ''; ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4f2ee93f" data-id="4f2ee93f" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($elysia_about_intro_badge !== '') : ?>
                    <div class="elementor-element elementor-element-e6169ed elementor-widget elementor-widget-heading" data-id="e6169ed" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h5 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_about_intro_badge); ?></h5>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($elysia_about_intro_title !== '') : ?>
                    <div class="elementor-element elementor-element-fdffa23 elementor-widget elementor-widget-heading" data-id="fdffa23" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_about_intro_title); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (!empty($elysia_about_intro_paragraphs)) : ?>
                    <div class="elementor-element elementor-element-4d2c3393 elementor-widget elementor-widget-text-editor" data-id="4d2c3393" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <?php foreach ($elysia_about_intro_paragraphs as $paragraph_row) : ?>
                                <?php if (isset($paragraph_row['text']) && $paragraph_row['text'] !== '') : ?>
                                    <p><?php echo function_exists('wp_kses_post') ? wp_kses_post($paragraph_row['text']) : esc_html($paragraph_row['text']); ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="elementor-element elementor-element-242f56c elementor-mobile-align-center elementor-align-left elementor-widget elementor-widget-button" data-id="242f56c" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($elysia_about_intro_cta_href); ?>">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text"><?php echo esc_html($elysia_about_intro_cta_label); ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

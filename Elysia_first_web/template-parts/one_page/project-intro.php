<?php
$elysia_project_intro_badge = '';
$elysia_project_intro_title = '';
$elysia_project_intro_text = '';
$elysia_project_intro_image_main = null;
$elysia_project_intro_image_secondary = null;
$elysia_project_intro_has_acf = false;

if (function_exists('get_field')) {
    $field_value = get_field('project_intro_badge');
    if ($field_value) {
        $elysia_project_intro_badge = $field_value;
        $elysia_project_intro_has_acf = true;
    }

    $field_value = get_field('project_intro_title');
    if ($field_value) {
        $elysia_project_intro_title = $field_value;
        $elysia_project_intro_has_acf = true;
    }

    $field_value = get_field('project_intro_text');
    if ($field_value) {
        $elysia_project_intro_text = $field_value;
        $elysia_project_intro_has_acf = true;
    }

    $image_field = get_field('project_intro_image_main');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $elysia_project_intro_image_main = $image_field;
        $elysia_project_intro_has_acf = true;
    }

    $image_field = get_field('project_intro_image_secondary');
    if (is_array($image_field) && !empty($image_field['url'])) {
        $elysia_project_intro_image_secondary = $image_field;
        $elysia_project_intro_has_acf = true;
    }
}

if (!$elysia_project_intro_has_acf) {
    return;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-48a237c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48a237c" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-48ecf7e" data-id="48ecf7e" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($elysia_project_intro_badge !== '') : ?>
                    <div class="elementor-element elementor-element-ea9f8dd elementor-widget elementor-widget-heading" data-id="ea9f8dd" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h5 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_project_intro_badge); ?></h5>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($elysia_project_intro_title !== '') : ?>
                    <div class="elementor-element elementor-element-51ef91e elementor-widget elementor-widget-heading" data-id="51ef91e" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_project_intro_title); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($elysia_project_intro_text !== '') : ?>
                    <div class="elementor-element elementor-element-3fbda30 elementor-widget elementor-widget-text-editor" data-id="3fbda30" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <?php echo function_exists('wp_kses_post') ? wp_kses_post($elysia_project_intro_text) : esc_html($elysia_project_intro_text); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="elementor-element elementor-element-95409bf elementor-widget elementor-widget-button" data-id="95409bf" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <?php
                            $cta_btn_url  = get_option('elysia_footer_cta_button_url', home_url('/contact/'));
                            $cta_btn_text = get_option('elysia_footer_cta_button_text', __('INQUIRY NOW', 'elysia_first_web'));
                            ?>
                            <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($cta_btn_url); ?>">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text"><?php echo esc_html($cta_btn_text); ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-182a2b6" data-id="182a2b6" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($elysia_project_intro_image_main && isset($elysia_project_intro_image_main['url'])) : ?>
                    <div class="elementor-element elementor-element-4bc6238 elementor-widget elementor-widget-image" data-id="4bc6238" data-element_type="widget" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <img fetchpriority="high" decoding="async" width="<?php echo isset($elysia_project_intro_image_main['width']) ? esc_attr($elysia_project_intro_image_main['width']) : 353; ?>" height="<?php echo isset($elysia_project_intro_image_main['height']) ? esc_attr($elysia_project_intro_image_main['height']) : 353; ?>" src="<?php echo esc_url($elysia_project_intro_image_main['url']); ?>" class="attachment-large size-large wp-image-<?php echo isset($elysia_project_intro_image_main['ID']) ? esc_attr($elysia_project_intro_image_main['ID']) : ''; ?>" alt="<?php echo isset($elysia_project_intro_image_main['alt']) ? esc_attr($elysia_project_intro_image_main['alt']) : ''; ?>" title="<?php echo isset($elysia_project_intro_image_main['title']) ? esc_attr($elysia_project_intro_image_main['title']) : ''; ?>">
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($elysia_project_intro_image_secondary && isset($elysia_project_intro_image_secondary['url'])) : ?>
                    <div class="elementor-element elementor-element-d9dd351 elementor-absolute elementor-widget elementor-widget-image" data-id="d9dd351" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
                        <div class="elementor-widget-container">
                            <img decoding="async" width="<?php echo isset($elysia_project_intro_image_secondary['width']) ? esc_attr($elysia_project_intro_image_secondary['width']) : 203; ?>" height="<?php echo isset($elysia_project_intro_image_secondary['height']) ? esc_attr($elysia_project_intro_image_secondary['height']) : 203; ?>" src="<?php echo esc_url($elysia_project_intro_image_secondary['url']); ?>" class="attachment-large size-large wp-image-<?php echo isset($elysia_project_intro_image_secondary['ID']) ? esc_attr($elysia_project_intro_image_secondary['ID']) : ''; ?>" alt="<?php echo isset($elysia_project_intro_image_secondary['alt']) ? esc_attr($elysia_project_intro_image_secondary['alt']) : ''; ?>" title="<?php echo isset($elysia_project_intro_image_secondary['title']) ? esc_attr($elysia_project_intro_image_secondary['title']) : ''; ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
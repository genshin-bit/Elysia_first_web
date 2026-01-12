<?php
$inquiry_section_title = '';
$inquiry_section_intro = '';
if (function_exists('get_field')) {
    $inquiry_section_title = get_field('inquiry_section_title');
    $inquiry_section_intro = get_field('inquiry_section_intro');
}
if (!$inquiry_section_title) {
    $inquiry_section_title = 'Inquiry';
}
?>
<div class="elementor-element elementor-element-3473dc6a elementor-widget elementor-widget-heading"
    data-id="3473dc6a" data-element_type="widget" data-widget_type="heading.default">
    <div class="elementor-widget-container">
        <h2 class="elementor-heading-title elementor-size-default">
            <?php echo esc_html($inquiry_section_title); ?>
        </h2>
    </div>
</div>
<div class="elementor-element elementor-widget elementor-widget-text-editor">
    <div class="elementor-widget-container">
        <?php if ($inquiry_section_intro) : ?>
            <p>
                <?php echo wp_kses_post($inquiry_section_intro); ?>
            </p>
        <?php endif; ?>
        <?php get_template_part('template-parts/components/contact-form-zoho'); ?>
    </div>
</div>

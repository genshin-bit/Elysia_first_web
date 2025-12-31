<?php
// 产品详情页：中部 Inquiry 区块模块模板
$inquiry_section_title = '';
$inquiry_section_intro = '';
$inquiry_section_button_text = '';
$inquiry_section_button_link = '';
if (function_exists('get_field')) {
    $inquiry_section_title = get_field('inquiry_section_title');
    $inquiry_section_intro = get_field('inquiry_section_intro');
    $inquiry_section_button_text = get_field('inquiry_section_button_text');
    $inquiry_section_button_link = get_field('inquiry_section_button_link');
}
if (!$inquiry_section_title) {
    $inquiry_section_title = 'Inquiry';
}
if (!$inquiry_section_button_text) {
    $inquiry_section_button_text = 'Inquiry Now';
}
$default_link = '#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM0MyIsInRvZ2dsZSI6ZmFsc2V9';
if (!$inquiry_section_button_link) {
    $inquiry_section_button_link = $default_link;
}
?>
<div class="elementor-element elementor-element-3473dc6a elementor-widget elementor-widget-heading"
    data-id="3473dc6a" data-element_type="widget" data-widget_type="heading.default">
    <div class="elementor-widget-container">
        <h3 class="elementor-heading-title elementor-size-default">
            <?php echo esc_html($inquiry_section_title); ?>
        </h3>
    </div>
</div>
<?php if ($inquiry_section_intro || $inquiry_section_button_text) : ?>
    <div class="elementor-element elementor-widget elementor-widget-text-editor">
        <div class="elementor-widget-container">
            <?php if ($inquiry_section_intro) : ?>
                <p>
                    <?php echo wp_kses_post($inquiry_section_intro); ?>
                </p>
            <?php endif; ?>
            <?php if ($inquiry_section_button_text && $inquiry_section_button_link) : ?>
                <div class="elementor-element elementor-align-left elementor-widget elementor-widget-button">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-md"
                                href="<?php echo esc_url($inquiry_section_button_link); ?>">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text">
                                        <?php echo esc_html($inquiry_section_button_text); ?>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

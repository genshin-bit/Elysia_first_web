<?php
$elysia_sr_employees_image = null;
$elysia_sr_employees_eyebrow = '';
$elysia_sr_employees_title = '';
$elysia_sr_employees_body = '';
if (function_exists('get_field')) {
    $elysia_sr_employees_image = get_field('sr_employees_image');
    $elysia_sr_employees_eyebrow = (string) get_field('sr_employees_eyebrow');
    $elysia_sr_employees_title = (string) get_field('sr_employees_title');
    $elysia_sr_employees_body = (string) get_field('sr_employees_body');
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-5dd10705 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5dd10705" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7293d7ce" data-id="7293d7ce" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-fc8b139 elementor-widget elementor-widget-image" data-id="fc8b139" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_employees_image) {
                            $elysia_image_id = $elysia_sr_employees_image;
                            if (is_array($elysia_sr_employees_image) && isset($elysia_sr_employees_image['ID'])) {
                                $elysia_image_id = $elysia_sr_employees_image['ID'];
                            }
                            if (function_exists('wp_get_attachment_image')) {
                                echo wp_get_attachment_image($elysia_image_id, 'full', false, array('class' => 'attachment-full size-full wp-image-490'));
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-38518625" data-id="38518625" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-bccf46b elementor-widget elementor-widget-heading" data-id="bccf46b" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_employees_eyebrow !== '') : ?>
                            <h5 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_employees_eyebrow); ?>
                            </h5>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-4e8c1a0 elementor-widget elementor-widget-heading" data-id="4e8c1a0" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_employees_title !== '') : ?>
                            <h2 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_employees_title); ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-3f267a2d elementor-widget elementor-widget-text-editor" data-id="3f267a2d" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_employees_body !== '') {
                            echo $elysia_sr_employees_body;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
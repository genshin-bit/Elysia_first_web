<?php
$elysia_sr_vision_image = null;
$elysia_sr_vision_eyebrow = '';
$elysia_sr_vision_title = '';
$elysia_sr_vision_body = '';
if (function_exists('get_field')) {
    $elysia_sr_vision_image = get_field('sr_vision_image');
    $elysia_sr_vision_eyebrow = (string) get_field('sr_vision_eyebrow');
    $elysia_sr_vision_title = (string) get_field('sr_vision_title');
    $elysia_sr_vision_body = (string) get_field('sr_vision_body');
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-3a509b39 elementor-reverse-mobile elementor-reverse-tablet elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3a509b39" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-19fb9bc5" data-id="19fb9bc5" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-18cdc58 elementor-widget elementor-widget-heading" data-id="18cdc58" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_vision_eyebrow !== '') : ?>
                            <h5 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_vision_eyebrow); ?>
                            </h5>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-94dcd9c elementor-widget elementor-widget-heading" data-id="94dcd9c" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_vision_title !== '') : ?>
                            <h2 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_vision_title); ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-f0e9be3 elementor-widget elementor-widget-text-editor" data-id="f0e9be3" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_vision_body !== '') {
                            echo $elysia_sr_vision_body;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4bc3d71" data-id="4bc3d71" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4170897c elementor-widget elementor-widget-image" data-id="4170897c" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_vision_image) {
                            $elysia_image_id = $elysia_sr_vision_image;
                            if (is_array($elysia_sr_vision_image) && isset($elysia_sr_vision_image['ID'])) {
                                $elysia_image_id = $elysia_sr_vision_image['ID'];
                            }
                            if (function_exists('wp_get_attachment_image')) {
                                echo wp_get_attachment_image($elysia_image_id, 'large', false, array('class' => 'attachment-large size-large wp-image-492'));
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$elysia_sr_client_image = null;
$elysia_sr_client_eyebrow = '';
$elysia_sr_client_title = '';
$elysia_sr_client_body = '';
if (function_exists('get_field')) {
    $elysia_sr_client_image = get_field('sr_client_image');
    $elysia_sr_client_eyebrow = (string) get_field('sr_client_eyebrow');
    $elysia_sr_client_title = (string) get_field('sr_client_title');
    $elysia_sr_client_body = (string) get_field('sr_client_body');
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-79fe08ad elementor-reverse-mobile elementor-reverse-tablet elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="79fe08ad" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5dd13b29" data-id="5dd13b29" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-fc71215 elementor-widget elementor-widget-heading" data-id="fc71215" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_client_eyebrow !== '') : ?>
                            <h5 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_client_eyebrow); ?>
                            </h5>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-1686393e elementor-widget elementor-widget-heading" data-id="1686393e" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_client_title !== '') : ?>
                            <h2 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_client_title); ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-63a7e0c elementor-widget elementor-widget-text-editor" data-id="63a7e0c" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_client_body !== '') {
                            echo $elysia_sr_client_body;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4f34d8e8" data-id="4f34d8e8" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-776cefe4 elementor-widget elementor-widget-image" data-id="776cefe4" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_client_image) {
                            $elysia_image_id = $elysia_sr_client_image;
                            if (is_array($elysia_sr_client_image) && isset($elysia_sr_client_image['ID'])) {
                                $elysia_image_id = $elysia_sr_client_image['ID'];
                            }
                            if (function_exists('wp_get_attachment_image')) {
                                echo wp_get_attachment_image($elysia_image_id, 'large', false, array('class' => 'attachment-large size-large wp-image-491'));
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
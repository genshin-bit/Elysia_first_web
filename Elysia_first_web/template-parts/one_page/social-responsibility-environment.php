<?php
$elysia_sr_environment_image = null;
$elysia_sr_environment_eyebrow = '';
$elysia_sr_environment_title = '';
$elysia_sr_environment_body = '';
if (function_exists('get_field')) {
    $elysia_sr_environment_image = get_field('sr_environment_image');
    $elysia_sr_environment_eyebrow = (string) get_field('sr_environment_eyebrow');
    $elysia_sr_environment_title = (string) get_field('sr_environment_title');
    $elysia_sr_environment_body = (string) get_field('sr_environment_body');
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-a20813 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="a20813" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7495e703" data-id="7495e703" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-2355d471 elementor-widget elementor-widget-image" data-id="2355d471" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_environment_image) {
                            $elysia_image_id = $elysia_sr_environment_image;
                            if (is_array($elysia_sr_environment_image) && isset($elysia_sr_environment_image['ID'])) {
                                $elysia_image_id = $elysia_sr_environment_image['ID'];
                            }
                            if (function_exists('wp_get_attachment_image')) {
                                echo wp_get_attachment_image($elysia_image_id, 'large', false, array('class' => 'attachment-large size-large wp-image-471'));
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5f661585" data-id="5f661585" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-ab5148e elementor-widget elementor-widget-heading" data-id="ab5148e" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_environment_eyebrow !== '') : ?>
                            <h5 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_environment_eyebrow); ?>
                            </h5>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-f3c4c1a elementor-widget elementor-widget-heading" data-id="f3c4c1a" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_environment_title !== '') : ?>
                            <h2 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_environment_title); ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-45e11695 elementor-widget elementor-widget-text-editor" data-id="45e11695" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_environment_body !== '') {
                            echo $elysia_sr_environment_body;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
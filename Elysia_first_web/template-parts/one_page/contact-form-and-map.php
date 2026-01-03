<?php
$elysia_contact_intro_subtitle = 'get in touch';
$elysia_contact_intro_title = 'Get Quote &amp; <br>Leave us message';
$elysia_contact_intro_description = 'Have any questions, want to get the newest quote, or any other issue? Leave us a message, and we will reply within 12-48h.';
if (function_exists('get_field')) {
    $subtitle_field = get_field('contact_intro_subtitle');
    if ($subtitle_field) {
        $elysia_contact_intro_subtitle = $subtitle_field;
    }
    $title_field = get_field('contact_intro_title');
    if ($title_field) {
        $elysia_contact_intro_title = $title_field;
    }
    $description_field = get_field('contact_intro_description');
    if ($description_field) {
        $elysia_contact_intro_description = $description_field;
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-1229abea elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1229abea" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-419cbdca" data-id="419cbdca" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-8bb3fac elementor-widget elementor-widget-heading" data-id="8bb3fac" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h5 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_contact_intro_subtitle); ?></h5>
                    </div>
                </div>
                <div class="elementor-element elementor-element-23c73440 elementor-widget elementor-widget-heading" data-id="23c73440" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php
                            echo wp_kses_post($elysia_contact_intro_title);
                            ?>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-69695640 elementor-widget elementor-widget-text-editor" data-id="69695640" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p><?php echo esc_html($elysia_contact_intro_description); ?></p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-8b9d47a elementor-widget elementor-widget-html" data-id="8b9d47a" data-element_type="widget" data-widget_type="html.default">
                    <div class="elementor-widget-container">
                        <?php get_template_part('template-parts/components/contact-form-zoho'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

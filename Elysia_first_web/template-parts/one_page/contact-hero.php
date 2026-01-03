<?php
$elysia_contact_hero_title = 'Contact';
if (function_exists('get_field')) {
    $field_value = get_field('contact_hero_title');
    if ($field_value) {
        $elysia_contact_hero_title = $field_value;
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-b36e830 ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="b36e830" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2d9da42" data-id="2d9da42" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-64effff elementor-widget elementor-widget-heading" data-id="64effff" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_contact_hero_title); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

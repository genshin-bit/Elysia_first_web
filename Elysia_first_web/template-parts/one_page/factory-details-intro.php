<?php
$factory_details_intro_text = '';

if (function_exists('get_field')) {
    $details_intro_value = get_field('factory_details_intro');
    if ($details_intro_value) {
        if (function_exists('wp_strip_all_tags')) {
            $factory_details_intro_text = wp_strip_all_tags($details_intro_value);
        } else {
            $factory_details_intro_text = strip_tags($details_intro_value);
        }
    }
}

if ($factory_details_intro_text === '') {
    return;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-dfe3648 ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="dfe3648" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d86d2a4" data-id="d86d2a4" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-6a1e50a elementor-widget elementor-widget-heading" data-id="6a1e50a" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h5 class="elementor-heading-title elementor-size-default">SOME DETAILS OF OUR FACTORY</h5>
                    </div>
                </div>
                <?php if ($factory_details_intro_text !== '') : ?>
                    <div class="elementor-element elementor-element-6edaa29 elementor-widget elementor-widget-heading" data-id="6edaa29" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($factory_details_intro_text); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

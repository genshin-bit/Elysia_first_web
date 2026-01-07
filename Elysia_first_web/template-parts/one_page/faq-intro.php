<?php
$intro_title = '';
$intro_text = '';
$btn_text = '';
$btn_url = '';
$faq_intro_has_acf = false;

if (function_exists('get_field')) {
    $intro_title = get_field('faq_intro_title');
    if ($intro_title) {
        $faq_intro_has_acf = true;
    }

    $intro_text = get_field('faq_intro_text');
    if ($intro_text) {
        $faq_intro_has_acf = true;
    }

    $btn_text = get_field('faq_intro_button_text');
    if ($btn_text) {
        $faq_intro_has_acf = true;
    }

    $btn_page = get_field('faq_intro_button_page');
    if ($btn_page) {
        $btn_url = get_permalink($btn_page);
        if ($btn_url) {
            $faq_intro_has_acf = true;
        }
    } else {
        $btn_url = get_field('faq_intro_button_url');
        if ($btn_url) {
            $faq_intro_has_acf = true;
        }
    }
}

if (!$faq_intro_has_acf) {
    return;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-4ba54a32 ct-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4ba54a32" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6b370a5a" data-id="6b370a5a" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-2794ebff elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2794ebff" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_offset&quot;:100,&quot;sticky_parent&quot;:&quot;yes&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;],&quot;sticky_effects_offset&quot;:0,&quot;sticky_anchor_link_offset&quot;:0}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-209534fd" data-id="209534fd" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-6c9118bf elementor-widget elementor-widget-heading" data-id="6c9118bf" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h5 class="elementor-heading-title elementor-size-default"><?php echo esc_html($intro_title); ?></h5>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-35d3ab5f elementor-widget elementor-widget-text-editor" data-id="35d3ab5f" data-element_type="widget" data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                        <?php if ($intro_text !== '') : ?>
                                            <?php echo wp_kses_post($intro_text); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-7691cfb4 elementor-widget elementor-widget-button" data-id="7691cfb4" data-element_type="widget" data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                        <?php if ($btn_text !== '' && $btn_url !== '') : ?>
                                            <div class="elementor-button-wrapper">
                                                <a class="elementor-button elementor-button-link elementor-size-sm" href="<?php echo esc_url($btn_url); ?>" target="_blank" rel="noopener">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-text"><?php echo esc_html($btn_text); ?></span>
                                                    </span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2ab71414" data-id="2ab71414" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php get_template_part('template-parts/one_page/faq-accordion'); ?>
            </div>
        </div>
    </div>
</section>
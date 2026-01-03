<?php

defined('ABSPATH') || exit;

$elysia_share_title = 'Share';
if (function_exists('get_field')) {
    $field_value = get_field('solution_detail_share_title');
    if ($field_value !== null && $field_value !== '') {
        $elysia_share_title = (string) $field_value;
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-aa709fd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="aa709fd" data-element_type="section" data-settings="{&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;],&quot;sticky_offset&quot;:100,&quot;sticky_parent&quot;:&quot;yes&quot;,&quot;sticky_effects_offset&quot;:0,&quot;sticky_anchor_link_offset&quot;:0}">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-c7cb136" data-id="c7cb136" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-e8e9bae elementor-widget elementor-widget-text-editor" data-id="e8e9bae" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p><?php echo esc_html($elysia_share_title); ?></p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-c34fc84 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="c34fc84" data-element_type="widget" data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator"></span>
                        </div>
                    </div>
                </div>
                <?php get_template_part('template-parts/components/share-buttons'); ?>
            </div>
        </div>
    </div>
</section>

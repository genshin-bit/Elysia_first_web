<?php
$elysia_cta_divider = 'Strat Our Business Now';
$elysia_cta_title = 'Get In Touch With Sunway';
$elysia_cta_button_label = '';
$elysia_cta_button_link = '';
$elysia_blog_page_id = 0;
if (function_exists('elysia_get_blog_archive_page_id')) {
    $elysia_blog_page_id = elysia_get_blog_archive_page_id();
}
if ($elysia_blog_page_id && function_exists('get_field')) {
    $divider_field = get_field('blog_cta_divider_text', $elysia_blog_page_id);
    if ($divider_field) {
        $elysia_cta_divider = $divider_field;
    }
    $title_field = get_field('blog_cta_title', $elysia_blog_page_id);
    if ($title_field) {
        $elysia_cta_title = $title_field;
    }
    $btn_label_field = get_field('blog_cta_button_label', $elysia_blog_page_id);
    if ($btn_label_field) {
        $elysia_cta_button_label = $btn_label_field;
    }
    $btn_link_field = get_field('blog_cta_button_link', $elysia_blog_page_id);
    if ($btn_link_field) {
        $elysia_cta_button_link = $btn_link_field;
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-49dd545c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="49dd545c" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-284fbbf3" data-id="284fbbf3" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-a86b949 elementor-widget-divider--view-line_text elementor-widget-divider--element-align-right elementor-widget elementor-widget-divider" data-id="a86b949" data-element_type="widget" data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator">
                                <span class="elementor-divider__text elementor-divider__element">
                                    <?php echo esc_html($elysia_cta_divider); ?> </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-49f7f62e elementor-widget elementor-widget-heading" data-id="49f7f62e" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h3 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_cta_title); ?></h3>
                        <?php if ($elysia_cta_button_label && $elysia_cta_button_link) { ?>
                            <div class="elementor-button-wrapper">
                                <a href="<?php echo esc_url($elysia_cta_button_link); ?>" class="elementor-button-link elementor-button elementor-size-sm">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text"><?php echo esc_html($elysia_cta_button_label); ?></span>
                                    </span>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

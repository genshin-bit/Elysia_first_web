<!-- 产品列表页：Contact Us CTA 模块模板 -->
<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-top-section elementor-element elementor-element-f127fb3 elementor-section-height-min-height elementor-section-items-stretch elementor-section-boxed elementor-section-height-default"
    data-id="f127fb3" data-element_type="section"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1687367"
            data-id="1687367" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-ab45d48 elementor-widget elementor-widget-heading" data-id="ab45d48" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_contact_title = 'Contact Us Now';
                        if (function_exists('get_field')) {
                            $elysia_contact_title_field = get_field('elysia_product_archive_contact_title');
                            if (!$elysia_contact_title_field) {
                                $elysia_contact_title_field = get_field('elysia_product_archive_contact_title', 'option');
                            }
                            if ($elysia_contact_title_field) {
                                $elysia_contact_title = $elysia_contact_title_field;
                            }
                        }
                        ?>
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($elysia_contact_title); ?>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-9517402 elementor-widget elementor-widget-html"
                    data-id="9517402" data-element_type="widget" data-widget_type="html.default">
                    <div class="elementor-widget-container">
                        <?php get_template_part('template-parts/components/contact-form-zoho'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

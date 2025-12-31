<!-- 电力与能源产品归档页：Hero 标题模块 -->
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-985d0b5 ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="985d0b5" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f0a6771" data-id="f0a6771" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-7654af8 elementor-widget elementor-widget-theme-archive-title elementor-page-title elementor-widget-heading" data-id="7654af8" data-element_type="widget" data-widget_type="theme-archive-title.default">
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default">
                            <?php
                            $elysia_archive_title = '';
                            if (is_page()) {
                                $elysia_archive_title = get_the_title();
                            } else {
                                if (is_tax() || is_category() || is_tag()) {
                                    $elysia_archive_title = single_term_title('', false);
                                } elseif (is_post_type_archive()) {
                                    $elysia_archive_title = post_type_archive_title('', false);
                                }
                                if (!$elysia_archive_title && function_exists('get_the_archive_title')) {
                                    $elysia_archive_title = get_the_archive_title();
                                }
                                if (!$elysia_archive_title) {
                                    $elysia_archive_title = get_bloginfo('name');
                                }
                            }
                            echo esc_html($elysia_archive_title);
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

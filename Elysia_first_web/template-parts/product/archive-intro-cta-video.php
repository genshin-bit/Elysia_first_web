<!-- 电力与能源产品页：文字介绍 + CTA 按钮 + 视频模块 -->
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-e4efa6a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="e4efa6a" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-1875df7" data-id="1875df7" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-72a75d2 elementor-widget elementor-widget-theme-archive-title elementor-page-title elementor-widget-heading" data-id="72a75d2" data-element_type="widget" data-widget_type="theme-archive-title.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php
                            $elysia_subtitle = '';
                            if (function_exists('get_field')) {
                                $elysia_subtitle = get_field('elysia_product_archive_subtitle');
                                if (!$elysia_subtitle) {
                                    $elysia_subtitle = get_field('elysia_product_archive_subtitle', 'option');
                                }
                            }
                            if (!$elysia_subtitle && function_exists('get_the_archive_title')) {
                                $elysia_subtitle = get_the_archive_title();
                            }
                            if (!$elysia_subtitle) {
                                $elysia_subtitle = get_bloginfo('name');
                            }
                            echo esc_html($elysia_subtitle);
                            ?>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-e64da4f elementor-widget elementor-widget-text-editor" data-id="e64da4f" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_intro_1 = '';
                        $elysia_intro_2 = '';
                        if (function_exists('get_field')) {
                            $elysia_intro_1 = get_field('elysia_product_archive_intro_paragraph_1');
                            $elysia_intro_2 = get_field('elysia_product_archive_intro_paragraph_2');
                            if (!$elysia_intro_1 && !$elysia_intro_2) {
                                $elysia_intro_1 = get_field('elysia_product_archive_intro_paragraph_1', 'option');
                                $elysia_intro_2 = get_field('elysia_product_archive_intro_paragraph_2', 'option');
                            }
                        }
                        if ($elysia_intro_1 || $elysia_intro_2) {
                            if ($elysia_intro_1) {
                        ?>
                                <p><?php echo esc_html($elysia_intro_1); ?></p>
                            <?php
                            }
                            if ($elysia_intro_2) {
                            ?>
                                <p><?php echo esc_html($elysia_intro_2); ?></p>
                            <?php
                            }
                        } else {
                            ?>
                            <p>The electricity &amp; energy cold roll forming machine is suitable for the production of various shaped parts in the field of electricity and energy, such as solar energy brackets, wind energy flanges, and power distribution cabinets. It has high precision, fast speed, and good stability. The electricity &amp; energy cold roll forming machine is a type of machine that is used to create shapes out of cold rolled steel. This process is known as cold rolling. The machine consists of a series of rollers that gradually shape the steel into the desired shape.</p>
                            <p>The electricity &amp; energy cold roll forming machine is a type of machine that is used to create shapes out of metal. The machine works by passing a sheet of metal through a series of rollers, which form the metal into the desired shape.</p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-f90cfd5 elementor-mobile-align-center elementor-align-left elementor-widget__width-auto elementor-widget elementor-widget-button" data-id="f90cfd5" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_cta_label = 'CONTACT US';
                        $elysia_cta_href = '#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjMwNiIsInRvZ2dsZSI6ZmFsc2V9';
                        if (function_exists('get_field')) {
                            $elysia_label_field = get_field('elysia_product_archive_cta_label');
                            if (!$elysia_label_field) {
                                $elysia_label_field = get_field('elysia_product_archive_cta_label', 'option');
                            }
                            if ($elysia_label_field) {
                                $elysia_cta_label = $elysia_label_field;
                            }
                        }
                        ?>
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($elysia_cta_href); ?>">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text"><?php echo esc_html($elysia_cta_label); ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-9c037d2 elementor-mobile-align-left elementor-align-left elementor-widget__width-auto elementor-widget elementor-widget-button" data-id="9c037d2" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_catalog_url = 'https://swforming.com/wp-content/uploads/2022/10/Sunway-Product-Catalog.pdf';
                        $elysia_catalog_label = 'Download cataloge';
                        if (function_exists('get_field')) {
                            $elysia_catalog_file = get_field('elysia_product_archive_catalog_file');
                            $elysia_catalog_field_url = get_field('elysia_product_archive_catalog_url');
                            $elysia_catalog_label_field = get_field('elysia_product_archive_catalog_label');
                            if (!$elysia_catalog_file && !$elysia_catalog_field_url && !$elysia_catalog_label_field) {
                                $elysia_catalog_file = get_field('elysia_product_archive_catalog_file', 'option');
                                $elysia_catalog_field_url = get_field('elysia_product_archive_catalog_url', 'option');
                                $elysia_catalog_label_field = get_field('elysia_product_archive_catalog_label', 'option');
                            }
                            if ($elysia_catalog_file) {
                                if (is_array($elysia_catalog_file) && isset($elysia_catalog_file['url'])) {
                                    $elysia_catalog_url = $elysia_catalog_file['url'];
                                } else {
                                    $elysia_catalog_url = $elysia_catalog_file;
                                }
                            } elseif ($elysia_catalog_field_url) {
                                $elysia_catalog_url = $elysia_catalog_field_url;
                            }
                            if ($elysia_catalog_label_field) {
                                $elysia_catalog_label = $elysia_catalog_label_field;
                            }
                        }
                        ?>
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($elysia_catalog_url); ?>" target="_blank">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text"><?php echo esc_html($elysia_catalog_label); ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-f2b66b3" data-id="f2b66b3" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php
                $elysia_video_url = 'https://youtu.be/i6Svpp84G40';
                if (function_exists('get_field')) {
                    $elysia_video_field = get_field('elysia_product_archive_video_url');
                    if (!$elysia_video_field) {
                        $elysia_video_field = get_field('elysia_product_archive_video_url', 'option');
                    }
                    if ($elysia_video_field) {
                        $elysia_video_url = $elysia_video_field;
                    }
                }
                ?>
                <div class="elementor-element elementor-element-5dafbf5 elementor-widget elementor-widget-video" data-id="5dafbf5" data-element_type="widget" data-settings="{&quot;youtube_url&quot;:&quot;<?php echo esc_url($elysia_video_url); ?>&quot;,&quot;show_image_overlay&quot;:&quot;yes&quot;,&quot;image_overlay&quot;:[],&quot;video_type&quot;:&quot;youtube&quot;,&quot;controls&quot;:&quot;yes&quot;}" data-widget_type="video.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-wrapper elementor-open-inline">
                            <div class="elementor-video"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
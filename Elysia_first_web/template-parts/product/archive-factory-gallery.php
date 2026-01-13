<!-- 产品列表页：工厂图集模块模板 -->
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-3b27951c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3b27951c" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-44e00494" data-id="44e00494" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-5c0348d5 elementor-widget elementor-widget-heading" data-id="5c0348d5" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_factory_title = 'Our Factory';
                        if (function_exists('get_field')) {
                            $elysia_title_field = get_field('elysia_factory_gallery_title');
                            if (!$elysia_title_field) {
                                $elysia_title_field = get_field('elysia_factory_gallery_title', 'option');
                            }
                            if ($elysia_title_field) {
                                $elysia_factory_title = $elysia_title_field;
                            }
                        }
                        ?>
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($elysia_factory_title); ?>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-61bc0b9b gallery-spacing-custom elementor-widget elementor-widget-image-gallery" data-id="61bc0b9b" data-element_type="widget" data-widget_type="image-gallery.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-image-gallery">
                            <div id='gallery-1' class='gallery galleryid-826 gallery-columns-3 gallery-size-medium_large'>
                                <?php
                                $elysia_factory_gallery = array();
                                if (function_exists('get_field')) {
                                    $elysia_gallery_field = get_field('elysia_factory_gallery_images');
                                    if (!is_array($elysia_gallery_field) || !$elysia_gallery_field) {
                                        $elysia_gallery_field = get_field('elysia_factory_gallery_images', 'option');
                                    }
                                    if (is_array($elysia_gallery_field)) {
                                        $elysia_factory_gallery = $elysia_gallery_field;
                                    }
                                }
                                if ($elysia_factory_gallery) {
                                    foreach ($elysia_factory_gallery as $elysia_image) {
                                        $elysia_image_id = 0;
                                        $elysia_image_url = '';
                                        if (is_array($elysia_image)) {
                                            if (isset($elysia_image['ID'])) {
                                                $elysia_image_id = (int) $elysia_image['ID'];
                                            }
                                            if (isset($elysia_image['url'])) {
                                                $elysia_image_url = $elysia_image['url'];
                                            }
                                        } else {
                                            $elysia_image_id = (int) $elysia_image;
                                        }
                                        if ($elysia_image_id && !$elysia_image_url) {
                                            $elysia_full = wp_get_attachment_image_src($elysia_image_id, 'full');
                                            if ($elysia_full) {
                                                $elysia_image_url = $elysia_full[0];
                                            }
                                        }
                                        if ($elysia_image_id || $elysia_image_url) {
                                ?>
                                            <figure class='gallery-item'>
                                                <div class='gallery-icon landscape'>
                                                    <a data-elementor-open-lightbox="no" href='<?php echo esc_url($elysia_image_url); ?>'>
                                                        <?php
                                                        if ($elysia_image_id) {
                                                            echo wp_get_attachment_image($elysia_image_id, 'medium_large', false, array('class' => 'attachment-medium_large size-medium_large'));
                                                        } elseif ($elysia_image_url) {
                                                        ?>
                                                            <img loading="lazy" class="attachment-medium_large size-medium_large" src="<?php echo esc_url($elysia_image_url); ?>" alt="" />
                                                        <?php
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                            </figure>
                                    <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <figure class='gallery-item'>
                                        <div class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="no" href='<?php echo get_template_directory_uri(); ?>/static/image/factory-01.webp'>
                                                <img loading="lazy" width="600" height="350" src="<?php echo get_template_directory_uri(); ?>/static/image/factory-01.webp" class="attachment-medium_large size-medium_large" alt="" decoding="async" srcset="https://swforming.com/wp-content/uploads/2022/09/factory-01.webp 600w, https://swforming.com/wp-content/uploads/2022/09/factory-01-300x175.webp 300w" sizes="(max-width: 600px) 100vw, 600px" />
                                            </a>
                                        </div>
                                    </figure>
                                    <figure class='gallery-item'>
                                        <div class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="no" href='<?php echo get_template_directory_uri(); ?>/static/image/factory-02.webp'>
                                                <img loading="lazy" width="600" height="350" src="<?php echo get_template_directory_uri(); ?>/static/image/factory-02.webp" class="attachment-medium_large size-medium_large" alt="" decoding="async" srcset="https://swforming.com/wp-content/uploads/2022/09/factory-02.webp 600w, https://swforming.com/wp-content/uploads/2022/09/factory-02-300x175.webp 300w" sizes="(max-width: 600px) 100vw, 600px" />
                                            </a>
                                        </div>
                                    </figure>
                                    <figure class='gallery-item'>
                                        <div class='gallery-icon landscape'>
                                            <a data-elementor-open-lightbox="no" href='<?php echo get_template_directory_uri(); ?>/static/image/factory-03.webp'>
                                                <img loading="lazy" width="600" height="350" src="<?php echo get_template_directory_uri(); ?>/static/image/factory-03.webp" class="attachment-medium_large size-medium_large" alt="" decoding="async" srcset="https://swforming.com/wp-content/uploads/2022/09/factory-03.webp 600w, https://swforming.com/wp-content/uploads/2022/09/factory-03-300x175.webp 300w" sizes="(max-width: 600px) 100vw, 600px" />
                                            </a>
                                        </div>
                                    </figure>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
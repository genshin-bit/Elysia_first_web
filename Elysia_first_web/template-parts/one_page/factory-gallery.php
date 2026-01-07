<?php
$factory_gallery_images = array();

if (function_exists('get_field')) {
    $gallery_value = get_field('factory_gallery');
    if (is_array($gallery_value)) {
        $factory_gallery_images = $gallery_value;
    }
}

if (empty($factory_gallery_images)) {
    return;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-3f7bc04 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3f7bc04" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-49f3627" data-id="49f3627" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-39f1cfe elementor-widget elementor-widget-heading" data-id="39f1cfe" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h5 class="elementor-heading-title elementor-size-default">GALLERY</h5>
                    </div>
                </div>
                <div class="elementor-element elementor-element-ed5af52 elementor-widget elementor-widget-heading" data-id="ed5af52" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">Take A Look At Our Factory</h2>
                    </div>
                </div>
                <?php if (!empty($factory_gallery_images)) : ?>
                    <div class="elementor-element elementor-element-571a853 gallery-spacing-custom elementor-widget elementor-widget-image-gallery" data-id="571a853" data-element_type="widget" data-widget_type="image-gallery.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-image-gallery">
                                <div id='gallery-1' class='gallery galleryid-214 gallery-columns-4 gallery-size-full'>
                                    <?php foreach ($factory_gallery_images as $image) : ?>
                                        <?php
                                        $image_url = '';
                                        $image_id = 0;
                                        if (is_array($image)) {
                                            if (isset($image['url'])) {
                                                $image_url = $image['url'];
                                            }
                                            if (isset($image['ID'])) {
                                                $image_id = (int) $image['ID'];
                                            }
                                        } elseif (is_int($image) || ctype_digit((string) $image)) {
                                            $image_id = (int) $image;
                                            $src = wp_get_attachment_image_src($image_id, 'full');
                                            if ($src && isset($src[0])) {
                                                $image_url = $src[0];
                                            }
                                        }
                                        if (!$image_url && $image_id) {
                                            $src = wp_get_attachment_image_src($image_id, 'full');
                                            if ($src && isset($src[0])) {
                                                $image_url = $src[0];
                                            }
                                        }
                                        if (!$image_url) {
                                            continue;
                                        }
                                        ?>
                                        <figure class='gallery-item'>
                                            <div class='gallery-icon landscape'>
                                                <a data-elementor-open-lightbox="no" href='<?php echo esc_url($image_url); ?>'>
                                                    <?php
                                                    if ($image_id) {
                                                        echo wp_get_attachment_image($image_id, 'full');
                                                    } else {
                                                    ?>
                                                        <img src="<?php echo esc_url($image_url); ?>" class="attachment-full size-full" alt="">
                                                    <?php
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                        </figure>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

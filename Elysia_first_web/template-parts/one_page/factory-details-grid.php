<?php
$factory_details_boxes = array();

if (function_exists('get_field')) {
    $boxes_value = get_field('factory_details_boxes');
    if (is_array($boxes_value)) {
        $factory_details_boxes = $boxes_value;
    }
}

if (empty($factory_details_boxes)) {
    return;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-ab2c0d6 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ab2c0d6" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <?php if (!empty($factory_details_boxes)) : ?>
            <?php foreach ($factory_details_boxes as $index => $box) : ?>
                <?php
                $image = null;
                $title = '';
                $description = '';

                if (isset($box['image']) && is_array($box['image']) && !empty($box['image']['url'])) {
                    $image = $box['image'];
                }
                if (isset($box['title'])) {
                    $title = $box['title'];
                }
                if (isset($box['description'])) {
                    $description = $box['description'];
                }

                $column_id = '';
                $widget_id = '';

                if ($index === 0) {
                    $column_id = '6db54dd';
                    $widget_id = '04335d8';
                } elseif ($index === 1) {
                    $column_id = '05da81a';
                    $widget_id = '8a9f8b9';
                } elseif ($index === 2) {
                    $column_id = '3f8aae0';
                    $widget_id = '3e6fb64';
                } else {
                    $column_id = 'col_' . $index;
                    $widget_id = 'widget_' . $index;
                }
                ?>
                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-<?php echo esc_attr($column_id); ?>" data-id="<?php echo esc_attr($column_id); ?>" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-<?php echo esc_attr($widget_id); ?> elementor-position-top elementor-widget elementor-widget-image-box" data-id="<?php echo esc_attr($widget_id); ?>" data-element_type="widget" data-widget_type="image-box.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-image-box-wrapper">
                                    <?php if ($image && isset($image['url'])) : ?>
                                        <figure class="elementor-image-box-img">
                                            <img loading="lazy" decoding="async" width="<?php echo isset($image['width']) ? esc_attr($image['width']) : 500; ?>" height="<?php echo isset($image['height']) ? esc_attr($image['height']) : 375; ?>" src="<?php echo esc_url($image['url']); ?>" class="attachment-full size-full wp-image-<?php echo isset($image['ID']) ? esc_attr($image['ID']) : ''; ?>" alt="<?php echo isset($image['alt']) ? esc_attr($image['alt']) : ''; ?>" title="<?php echo isset($image['title']) ? esc_attr($image['title']) : ''; ?>">
                                        </figure>
                                    <?php endif; ?>
                                    <div class="elementor-image-box-content">
                                        <?php if ($title !== '') : ?>
                                            <h3 class="elementor-image-box-title"><?php echo esc_html($title); ?></h3>
                                        <?php endif; ?>
                                        <?php if ($description !== '') : ?>
                                            <p class="elementor-image-box-description">
                                                <?php echo function_exists('wp_kses_post') ? wp_kses_post($description) : esc_html($description); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

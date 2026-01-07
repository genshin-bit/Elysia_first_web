<?php
/**
 * Template part for displaying the Service Grid section on the front page
 */

// Retrieve ACF fields
$title = get_field('service_grid_title') ?: 'Check Out Our Service';
$items = get_field('service_grid_items');

?>

<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-top-section elementor-element elementor-element-b34dc8e ct-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="b34dc8e" data-element_type="section"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2717c6d"
            data-id="2717c6d" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <!-- Title -->
                <div class="elementor-element elementor-element-d75091e elementor-widget elementor-widget-heading"
                    data-id="d75091e" data-element_type="widget"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($title); ?>
                        </h2>
                    </div>
                </div>

                <!-- Divider -->
                <div class="elementor-element elementor-element-4fa277f elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                    data-id="4fa277f" data-element_type="widget"
                    data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator"></span>
                        </div>
                    </div>
                </div>

                <!-- Services Grid (Consolidated into one inner section for better dynamic handling) -->
                <section data-particle_enable="false" data-particle-mobile-disabled="false"
                    class="elementor-section elementor-inner-section elementor-element elementor-element-37caa2f elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="37caa2f" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default" style="flex-wrap: wrap;">
                        <?php if ($items): foreach ($items as $index => $item): 
                            $icon_id = $item['icon'];
                            $item_title = $item['title'];
                            $description = $item['description'];
                            // Generate unique ID for loop items
                            $col_id = 'service_col_' . $index;
                        ?>
                            <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-<?php echo esc_attr($col_id); ?> h-box1"
                                data-id="<?php echo esc_attr($col_id); ?>" data-element_type="column"
                                data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_iconbox elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                        data-id="<?php echo esc_attr($col_id); ?>_iconbox" data-element_type="widget"
                                        data-widget_type="icon-box.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-box-wrapper">
                                                <div class="elementor-icon-box-icon">
                                                    <span class="elementor-icon">
                                                        <?php 
                                                        if ($icon_id) {
                                                            $file_path = get_attached_file($icon_id);
                                                            $ext = pathinfo($file_path, PATHINFO_EXTENSION);
                                                            if (strtolower($ext) === 'svg') {
                                                                echo file_get_contents($file_path);
                                                            } else {
                                                                echo wp_get_attachment_image($icon_id, 'full', false, ['class' => 'icon']);
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                                <div class="elementor-icon-box-content">
                                                    <h3 class="elementor-icon-box-title">
                                                        <span><?php echo esc_html($item_title); ?></span>
                                                    </h3>
                                                    <p class="elementor-icon-box-description">
                                                        <?php echo wp_kses_post($description); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

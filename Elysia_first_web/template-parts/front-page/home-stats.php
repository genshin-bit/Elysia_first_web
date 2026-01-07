<?php
/**
 * Template Part: Home Stats Section
 * ACF Fields: field_tab_stats
 */

$title = get_field('stats_title') ?: '30+ years of undefeated success';
$desc = get_field('stats_desc') ?: 'Our R&D team provides expertise in developing roll forming machine. We constantly strive to develop new processes to improve the manufacturing efficiency.';
$btn_text = get_field('stats_btn_text') ?: 'WORK WITH US';
$btn_url = get_field('stats_btn_url') ?: '#';
$stats_items = get_field('stats_items'); // Repeater
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-top-section elementor-element elementor-element-4cf8d02 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="4cf8d02" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-001ac27"
            data-id="001ac27" data-element_type="column"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-background-overlay"></div>
                <div class="elementor-element elementor-element-32d855b elementor-widget elementor-widget-heading"
                    data-id="32d855b" data-element_type="widget"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($title); ?></h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-eb506d3 elementor-widget elementor-widget-text-editor"
                    data-id="eb506d3" data-element_type="widget"
                    data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p><?php echo wp_kses_post($desc); ?></p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-a42b0b6 elementor-align-left elementor-widget elementor-widget-button"
                    data-id="a42b0b6" data-element_type="widget"
                    data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-md"
                                href="<?php echo esc_url($btn_url); ?>">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text"><?php echo esc_html($btn_text); ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-79f8fb9"
            data-id="79f8fb9" data-element_type="column"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php 
                if ($stats_items) {
                    // 将数组分割为每2个一组，对应每一行 inner section
                    $chunks = array_chunk($stats_items, 2);
                    foreach ($chunks as $chunk_index => $chunk) {
                        // 动态 ID，尽量保持某种唯一性，或者复用原 ID
                        $section_id = ($chunk_index == 0) ? 'ff62a74' : '163b6aa'; 
                        ?>
                        <section data-particle_enable="false" data-particle-mobile-disabled="false"
                            class="elementor-section elementor-inner-section elementor-element elementor-element-<?php echo $section_id; ?> elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="<?php echo $section_id; ?>" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <?php foreach ($chunk as $item_index => $item) { 
                                    $icon_id = $item['icon'];
                                    $number = $item['number'];
                                    $label = $item['label'];
                                    // 简单的 ID 模拟
                                    $col_id = 'col-' . $chunk_index . '-' . $item_index;
                                    $widget_id = 'wid-' . $chunk_index . '-' . $item_index;
                                    ?>
                                    <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-<?php echo $col_id; ?>"
                                        data-id="<?php echo $col_id; ?>" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-<?php echo $widget_id; ?> elementor-position-left elementor-view-default elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                                data-id="<?php echo $widget_id; ?>" data-element_type="widget"
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
                                                                        echo wp_get_attachment_image($icon_id, 'full');
                                                                    }
                                                                }
                                                                ?>
                                                            </span>
                                                        </div>
                                                        <div class="elementor-icon-box-content">
                                                            <h3 class="elementor-icon-box-title">
                                                                <span><?php echo esc_html($number); ?></span>
                                                            </h3>
                                                            <p class="elementor-icon-box-description"><?php echo esc_html($label); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </section>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

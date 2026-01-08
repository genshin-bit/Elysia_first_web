<?php

/**
 * Template part for displaying the About Intro section on the front page
 */

// Retrieve ACF fields
$image_id = get_field('about_intro_image');
$title = get_field('about_intro_title') ?: 'who we are';
$description = get_field('about_intro_description');
$subtitle = get_field('about_intro_subtitle') ?: 'Providing Innovative Roll forming Machine Solution';

$features = get_field('about_intro_features');
$stats = get_field('about_intro_stats');

$highlight_icon = get_field('about_intro_highlight_icon');
$highlight_title = get_field('about_intro_highlight_title') ?: 'Lead By Professional Technicians';
$highlight_desc = get_field('about_intro_highlight_desc');

$button_text = get_field('about_intro_button_text') ?: 'read more';
$button_link = get_field('about_intro_button_link');

?>
<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-top-section elementor-element elementor-element-9d7334d elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="9d7334d" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <!-- Left Column: Image -->
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-4746586"
            data-id="4746586" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-484f8f2 elementor-widget elementor-widget-image"
                    data-id="484f8f2" data-element_type="widget"
                    data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php
                        $img_url = '';
                        $img_alt = 'About Image';

                        if ($image_id) {
                            if (is_array($image_id)) {
                                // Handle Image Object return format (ACF returning array)
                                $img_alt = !empty($image_id['alt']) ? $image_id['alt'] : $img_alt;
                                if (isset($image_id['sizes']['large'])) {
                                    $img_url = $image_id['sizes']['large'];
                                } elseif (isset($image_id['url'])) {
                                    $img_url = $image_id['url'];
                                }
                            } else {
                                // Handle Image ID return format
                                $image_src = wp_get_attachment_image_src($image_id, 'full');
                                if ($image_src) {
                                    $img_url = $image_src[0];
                                }
                            }
                        }

                        if ($img_url) {
                        ?>
                            <img src="<?php echo esc_url($img_url); ?>"
                                class="attachment-large size-large"
                                alt="<?php echo esc_attr($img_alt); ?>">
                        <?php
                        } else {
                            // Fallback
                        ?>
                            <img fetchpriority="high" decoding="async" width="1024" height="576"
                                src="<?php echo get_template_directory_uri(); ?>/static/image/240702111754-1-1024x576.jpg"
                                class="attachment-large size-large" alt="About Image">
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Content -->
        <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-beeed36"
            data-id="beeed36" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <!-- Title -->
                <div class="elementor-element elementor-element-f188030 elementor-widget elementor-widget-heading"
                    data-id="f188030" data-element_type="widget"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($title); ?></h2>
                    </div>
                </div>

                <!-- Divider -->
                <div class="elementor-element elementor-element-b1185a0 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                    data-id="b1185a0" data-element_type="widget"
                    data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator"></span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="elementor-element elementor-element-d32f01d elementor-widget elementor-widget-text-editor"
                    data-id="d32f01d" data-element_type="widget"
                    data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php if ($description): ?>
                            <?php echo $description; ?>
                        <?php else: ?>
                            <p>We are professional manufacturer and exporter that are concerned with the design, development and production of cold roll forming machines. All products comply with international quality standards and are greatly appreciated in a variety of different markets throughout the world.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Inner Section -->
                <section data-particle_enable="false" data-particle-mobile-disabled="false"
                    class="elementor-section elementor-inner-section elementor-element elementor-element-f817e9b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="f817e9b" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <!-- Inner Left Column -->
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-30586a3"
                            data-id="30586a3" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <!-- Subtitle -->
                                <div class="elementor-element elementor-element-a41246c elementor-widget elementor-widget-heading"
                                    data-id="a41246c" data-element_type="widget"
                                    data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h3 class="elementor-heading-title elementor-size-default"><?php echo esc_html($subtitle); ?></h3>
                                    </div>
                                </div>

                                <!-- Features List -->
                                <div class="elementor-element elementor-element-5d4e784 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                    data-id="5d4e784" data-element_type="widget"
                                    data-widget_type="icon-list.default">
                                    <div class="elementor-widget-container">
                                        <ul class="elementor-icon-list-items">
                                            <?php if ($features): ?>
                                                <?php foreach ($features as $item):
                                                    $icon_id = $item['icon'];
                                                ?>
                                                    <li class="elementor-icon-list-item">
                                                        <span class="elementor-icon-list-icon">
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
                                                        <span class="elementor-icon-list-text"><?php echo esc_html($item['text']); ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Stats Items -->
                                <?php if ($stats): ?>
                                    <?php foreach ($stats as $index => $stat):
                                        $icon_id = $stat['icon'] ?? '';
                                        // Use original IDs if possible to maintain exact styling if IDs were targeted, 
                                        // but Elementor usually targets classes.
                                        // We will reuse the original widget structure.
                                        $widget_id = ($index === 0) ? '38154e5' : 'ce8fd35';
                                    ?>
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
                                                                    echo wp_get_attachment_image($icon_id, 'full', false, ['class' => 'icon']);
                                                                }
                                                            }
                                                            ?>
                                                        </span>
                                                    </div>
                                                    <div class="elementor-icon-box-content">
                                                        <h3 class="elementor-icon-box-title">
                                                            <span><?php echo esc_html($stat['number']); ?></span>
                                                        </h3>
                                                        <p class="elementor-icon-box-description"><?php echo esc_html($stat['label']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Inner Right Column -->
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a189c6a"
                            data-id="a189c6a" data-element_type="column"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <!-- Highlight Icon Box -->
                                <div class="elementor-element elementor-element-eaedb90 elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
                                    data-id="eaedb90" data-element_type="widget"
                                    data-widget_type="icon-box.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <span class="elementor-icon">
                                                    <?php
                                                    if ($highlight_icon) {
                                                        $file_path = get_attached_file($highlight_icon);
                                                        $ext = pathinfo($file_path, PATHINFO_EXTENSION);
                                                        if (strtolower($ext) === 'svg') {
                                                            echo file_get_contents($file_path);
                                                        } else {
                                                            echo wp_get_attachment_image($highlight_icon, 'full', false, ['class' => 'icon']);
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <h3 class="elementor-icon-box-title">
                                                    <span><?php echo esc_html($highlight_title); ?></span>
                                                </h3>
                                                <p class="elementor-icon-box-description">
                                                    <?php if ($highlight_desc): ?>
                                                        <?php echo $highlight_desc; ?>
                                                    <?php else: ?>
                                                        Our machines feature beautiful appearance, long service life, good performance, simple operation, reasonable price, good quality and so on. Strong technical resources are the most stable guarantee for our products' quality.
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="elementor-element elementor-element-a6a59dd elementor-align-center elementor-mobile-align-center elementor-widget elementor-widget-button"
                                    data-id="a6a59dd" data-element_type="widget"
                                    data-widget_type="button.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-md"
                                                href="<?php echo esc_url($button_link['url'] ?? '#'); ?>"
                                                <?php if (!empty($button_link['target'])) echo 'target="' . esc_attr($button_link['target']) . '"'; ?>>
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text"><?php echo esc_html($button_text); ?></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
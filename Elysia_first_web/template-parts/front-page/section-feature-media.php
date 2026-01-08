<?php

/**
 * Template part for displaying the Feature Media section on the front page
 */

// Retrieve ACF fields
$title = get_field('feature_media_title') ?: 'Why You Choose Us';
$description = get_field('feature_media_description');
$features = get_field('feature_media_list');
$button_text = get_field('feature_media_button_text') ?: 'EXPLORE MORE';
$button_link = get_field('feature_media_button_link');
$image_id = get_field('feature_media_image');
$video_url = get_field('feature_media_video_url');

// Split features into two columns
$features_1 = [];
$features_2 = [];
if ($features) {
    $total = count($features);
    $mid = ceil($total / 2);
    $features_1 = array_slice($features, 0, $mid);
    $features_2 = array_slice($features, $mid);
}

// Generate Video Lightbox URL
$video_action_url = '#';
if ($video_url) {
    // Detect video type (simple check)
    $video_type = (strpos($video_url, 'youtube') !== false || strpos($video_url, 'youtu.be') !== false) ? 'youtube' : 'hosted';
    // Elementor Lightbox settings
    $settings = [
        'type' => 'video',
        'videoType' => $video_type,
        'url' => $video_url
    ];
    $video_action_url = '#elementor-action:action=lightbox&settings=' . base64_encode(json_encode($settings));
}
?>

<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-top-section elementor-element elementor-element-7901169 ct-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="7901169" data-element_type="section"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <!-- Left Column: Content -->
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a134a3f"
            data-id="a134a3f" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <!-- Title -->
                <div class="elementor-element elementor-element-6c6a6f2 elementor-widget elementor-widget-heading"
                    data-id="6c6a6f2" data-element_type="widget"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($title); ?>
                        </h2>
                    </div>
                </div>

                <!-- Divider -->
                <div class="elementor-element elementor-element-61406e6 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                    data-id="61406e6" data-element_type="widget"
                    data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator"></span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="elementor-element elementor-element-bea3653 elementor-widget elementor-widget-text-editor"
                    data-id="bea3653" data-element_type="widget"
                    data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php if ($description): ?>
                            <?php echo $description; ?>
                        <?php else: ?>
                            <p>Sunway could design different types of roll forming machine according to clients’ requirements. SUNWAY always adhere to Dedication, Unity, Innovation, Win-win situation, as spirit of enterprise. In accordance with High Quality Assurance and Valued Credibility, we provide customers high qualified and reliable products with complete after-sales service. Our company is looking forward to establishing successful and long-term business relationships with all clients around the world in the near future.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="elementor-element elementor-element-5a60440 elementor-widget__width-auto elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                    data-id="5a60440" data-element_type="widget"
                    data-widget_type="icon-list.default">
                    <div class="elementor-widget-container">
                        <ul class="elementor-icon-list-items">
                            <?php if ($features_1): foreach ($features_1 as $item): 
                                $icon_id = isset($item['icon']) ? $item['icon'] : 0;
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
                                    <span class="elementor-icon-list-text"><?php echo esc_html($item['description'] ?? ''); ?></span>
                                    </li>
                            <?php endforeach;
                            endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="elementor-element elementor-element-1b045b2 elementor-widget__width-auto elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                    data-id="1b045b2" data-element_type="widget"
                    data-widget_type="icon-list.default">
                    <div class="elementor-widget-container">
                        <ul class="elementor-icon-list-items">
                            <?php if ($features_2): foreach ($features_2 as $item): 
                                $icon_id = isset($item['icon']) ? $item['icon'] : 0;
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
                                    <span class="elementor-icon-list-text"><?php echo esc_html($item['description'] ?? ''); ?></span>
                                    </li>
                            <?php endforeach;
                            endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="elementor-element elementor-element-2599126 elementor-align-left elementor-widget elementor-widget-button"
                    data-id="2599126" data-element_type="widget"
                    data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <?php
                            $button_href = '#';
                            $button_target = '';
                            if ($button_link) {
                                if (is_array($button_link)) {
                                    if (!empty($button_link['url'])) {
                                        $button_href = $button_link['url'];
                                    }
                                    if (!empty($button_link['target'])) {
                                        $button_target = $button_link['target'];
                                    }
                                } else {
                                    $button_href = $button_link;
                                }
                            }
                            ?>
                            <a class="elementor-button elementor-button-link elementor-size-md"
                                href="<?php echo esc_url($button_href); ?>"
                                <?php if ($button_target) echo 'target="' . esc_attr($button_target) . '"'; ?>>
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text"><?php echo esc_html($button_text); ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Media -->
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5f2bb02"
            data-id="5f2bb02" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <!-- Image -->
                <div class="elementor-element elementor-element-b0447e2 elementor-widget__width-initial elementor-widget elementor-widget-image"
                    data-id="b0447e2" data-element_type="widget"
                    data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php if ($image_id): ?>
                            <?php echo wp_get_attachment_image($image_id, 'full'); ?>
                        <?php else: ?>
                            <img decoding="async"
                                src="<?php echo get_template_directory_uri(); ?>/static/image/f15e9f56-e802-41c0-a541-33339e5a6f9a-1.jpg"
                                title="Home 8" alt="Feature Image"
                                loading="lazy">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Video Button -->
                <div class="elementor-element elementor-element-e45a7c9 elementor-view-stacked elementor-absolute ripple-button elementor-shape-circle elementor-widget elementor-widget-icon"
                    data-id="e45a7c9" data-element_type="widget"
                    data-settings="{&quot;_position&quot;:&quot;absolute&quot;}"
                    data-widget_type="icon.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-icon-wrapper">
                            <a class="elementor-icon"
                                href="<?php echo esc_attr($video_action_url); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" class="icon"
                                    viewBox="0 0 1024 1024" width="200" height="200">
                                    <path
                                        d="M852.041143 463.389257L248.714971 59.274971a58.397257 58.397257 0 0 0-32.533942-9.903542c-9.450057 0-27.662629 2.282057-36.293486 6.904685-19.061029 10.166857-39.701943 30.017829-39.701943 51.6096v808.228572c0 21.6064 20.640914 41.442743 39.701943 51.6096 8.645486 4.608 22.484114 6.904686 31.919543 6.904685 11.395657 0 24.956343-3.335314 34.757485-9.903542l604.452572-404.114286c16.223086-10.8544 26.536229-29.096229 26.536228-48.610743s-9.289143-37.756343-25.512228-48.610743zM198.699886 916.114286V107.885714L802.0992 512 198.699886 916.114286z"
                                        fill=""></path>
                                    <path
                                        d="M685.992229 498.658743a14.687086 14.687086 0 0 0 20.319085-4.008229 14.6432 14.6432 0 0 0-4.022857-20.304457l-294.853486-197.485714a14.628571 14.628571 0 1 0-16.296228 24.312686l294.853486 197.485714zM340.743314 267.424914a14.613943 14.613943 0 0 0 20.304457-4.008228 14.657829 14.657829 0 0 0-4.008228-20.304457l-70.568229-47.250286a14.6432 14.6432 0 0 0-16.296228 24.312686l70.568228 47.250285z"
                                        fill=""></path>
                                </svg> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

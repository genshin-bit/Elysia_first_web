<?php
$elysia_quality_worth_badge = '';
$elysia_quality_worth_title = '';
$elysia_quality_worth_cards = array();

if (function_exists('get_field')) {
    $field_value = get_field('quality_worth_badge');
    if ($field_value) {
        $elysia_quality_worth_badge = $field_value;
    }

    $field_value = get_field('quality_worth_title');
    if ($field_value) {
        $elysia_quality_worth_title = $field_value;
    }

    $rows = get_field('quality_worth_cards');
    if (is_array($rows) && count($rows) > 0) {
        $elysia_quality_worth_cards = $rows;
    }
}

$elysia_quality_worth_get_card_value = function ($index, $key, $default = '') use ($elysia_quality_worth_cards) {
    if (isset($elysia_quality_worth_cards[$index]) && isset($elysia_quality_worth_cards[$index][$key]) && $elysia_quality_worth_cards[$index][$key] !== '') {
        return $elysia_quality_worth_cards[$index][$key];
    }
    return $default;
};
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-3225afaa elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3225afaa" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7a363ec3" data-id="7a363ec3" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-71d603a elementor-widget elementor-widget-heading" data-id="71d603a" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h5 class="elementor-heading-title elementor-size-default">
                            <?php if ($elysia_quality_worth_badge !== '') : ?>
                                <?php echo esc_html($elysia_quality_worth_badge); ?>
                            <?php endif; ?>
                        </h5>
                    </div>
                </div>
                <div class="elementor-element elementor-element-cd21634 elementor-widget elementor-widget-heading" data-id="cd21634" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_quality_worth_title !== '') : ?>
                            <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_quality_worth_title); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-4df2d271 elementor-section-height-min-height elementor-section-items-stretch elementor-section-boxed elementor-section-height-default" data-id="4df2d271" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-65eac535" data-id="65eac535" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-background-overlay"></div>
                <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-63dc345a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="63dc345a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-86029a2" data-id="86029a2" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-71bd91e elementor-view-default elementor-widget elementor-widget-icon" data-id="71bd91e" data-element_type="widget" data-widget_type="icon.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-wrapper">
                                            <div class="elementor-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1028 1024" width="64.25" height="64">
                                                    <path d="M1016.1 418.5c-9.9-34.5-38.1-60.6-73.3-67.8-72.3-14.9-97.9-59.3-74.7-129.3 11.3-34.1 2.8-71.5-22.1-97.3C804.7 81.2 742.1 45 684.2 30.6c-34.8-8.7-71.5 2.7-95.4 29.5-49 55.2-100.3 55.2-149.3 0-23.8-26.8-60.5-38.2-95.4-29.5-57.8 14.4-120.4 50.6-161.8 93.5-24.9 25.8-33.4 63.3-22.1 97.3 23.3 70.1-2.3 114.5-74.7 129.3C50.4 358 22.2 384 12.3 418.5c-16.4 57.3-16.4 129.6 0 187C22.2 640 50.4 666 85.5 673.3c72.3 14.9 97.9 59.3 74.7 129.3-11.3 34-2.8 71.5 22.1 97.3 41.4 42.9 104.1 79 161.9 93.5 34.8 8.7 71.5-2.7 95.4-29.5 49-55.2 100.3-55.2 149.3 0 23.8 26.8 60.5 38.2 95.4 29.5 57.8-14.4 120.5-50.6 161.9-93.5 24.9-25.8 33.4-63.3 22.1-97.3-23.3-70.1 2.3-114.5 74.7-129.3 35.2-7.2 63.4-33.3 73.3-67.8 16.3-57.3 16.3-129.7-0.2-187zM514.2 736c-123.7 0-224-100.3-224-224s100.3-224 224-224 224 100.3 224 224-100.3 224-224 224z" fill="#AD1C13"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-23a774c9 elementor-widget elementor-widget-heading" data-id="23a774c9" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h3 class="elementor-heading-title elementor-size-default">
                                            <?php echo esc_html($elysia_quality_worth_get_card_value(0, 'title', '')); ?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-2cfc9e83 hide-first animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="2cfc9e83" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                        <?php
                                        $card_0_desc = $elysia_quality_worth_get_card_value(0, 'description', '');
                                        if ($card_0_desc !== '') :
                                            echo function_exists('wp_kses_post') ? wp_kses_post($card_0_desc) : esc_html($card_0_desc);
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-758c2e1" data-id="758c2e1" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-background-overlay"></div>
                <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-bca67bf elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bca67bf" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-4310f3e3" data-id="4310f3e3" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-2708e10b elementor-view-default elementor-widget elementor-widget-icon" data-id="2708e10b" data-element_type="widget" data-widget_type="icon.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-wrapper">
                                            <div class="elementor-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                    <path d="M1024 0L575.859712 768.28672c-28.378112 48.64-98.741248 48.347136-126.681088-0.584704L219.440128 365.71136h73.141248l202.89536 202.897408c8.777728 8.776704 23.113728 7.752704 30.500864-2.121728L950.857728 0H1024zM913.248256 334.999552c23.991296 54.198272 37.595136 114.028544 37.595136 177.004544 0 241.954816-196.824064 438.853632-438.85056 438.853632-241.952768 0-438.85056-196.898816-438.85056-438.853632 0-242.028544 196.897792-438.854656 438.85056-438.854656 88.208384 0 170.201088 26.404864 239.100928 71.314432l44.10368-58.88C714.083328 31.604736 616.8064 0.008192 511.992832 0.008192 229.225472 0.007168 0 229.234688 0 512.003072 0 794.771456 229.226496 1024 511.992832 1024s511.992832-222.06 511.992832-511.995904c0-91.867136-24.503296-177.809408-66.779136-252.341248l-43.958272 75.33568z" fill="#AD1C13"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-6dfe01d8 elementor-widget elementor-widget-heading" data-id="6dfe01d8" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h3 class="elementor-heading-title elementor-size-default">
                                            <?php echo esc_html($elysia_quality_worth_get_card_value(1, 'title', '')); ?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-2f1e8724 hide-first animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="2f1e8724" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                        <?php
                                        $card_1_desc = $elysia_quality_worth_get_card_value(1, 'description', '');
                                        if ($card_1_desc !== '') :
                                            echo function_exists('wp_kses_post') ? wp_kses_post($card_1_desc) : esc_html($card_1_desc);
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-76bd63ac" data-id="76bd63ac" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-background-overlay"></div>
                <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-36e45d3a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="36e45d3a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-238821b5" data-id="238821b5" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-0487102 elementor-view-default elementor-widget elementor-widget-icon" data-id="0487102" data-element_type="widget" data-widget_type="icon.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-wrapper">
                                            <div class="elementor-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                    <path d="M626.1 197.48l33.14 99.4-181.18 181.18c-18.76 18.76-18.76 49.12 0 67.88 18.74 18.74 49.12 18.76 67.88 0l181.18-181.18 99.4 33.14c14.78 4.92 31.06 1.08 42.08-9.92l127.34-127.34c21.6-21.6 12.92-58.4-16.08-68.08l-111.32-37.1-37.1-111.3c-9.66-29-46.46-37.68-68.08-16.08L636.04 155.4a41.164 41.164 0 0 0-9.94 42.08z m-150.34 192.38l110.28-110.28-4.24-12.76c-22.34-6.34-45.44-10.82-69.8-10.82-141.38 0-256 114.62-256 256s114.62 256 256 256 256-114.62 256-256c0-24.36-4.48-47.46-10.84-69.78l-12.74-4.24-110.28 110.28C618.38 601.1 569.9 640 512 640c-70.58 0-128-57.42-128-128 0-57.9 38.9-106.38 91.76-122.14z m509.1-27.66l-71 71c-11 11-24.14 18.96-38.34 24.14 2.66 17.88 4.5 36.04 4.5 54.66 0 203.38-164.58 368-368 368-203.38 0-368-164.58-368-368 0-203.38 164.58-368 368-368 18.84 0 37.2 1.86 55.26 4.58 5.16-14.04 12.46-27.38 23.52-38.44l71-71A495.696 495.696 0 0 0 512 16C238.06 16 16 238.06 16 512s222.06 496 496 496 496-222.06 496-496c0-52.22-8.18-102.52-23.14-149.8z" fill="#AD1C13"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-3ddf2268 elementor-widget elementor-widget-heading" data-id="3ddf2268" data-element_type="widget" data-widget_type="heading.default">
                                    <div class="elementor-widget-container">
                                        <h3 class="elementor-heading-title elementor-size-default">
                                            <?php echo esc_html($elysia_quality_worth_get_card_value(2, 'title', '')); ?>
                                        </h3>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-1e96eb83 hide-first animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="1e96eb83" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-widget_type="text-editor.default">
                                    <div class="elementor-widget-container">
                                        <?php
                                        $card_2_desc = $elysia_quality_worth_get_card_value(2, 'description', '');
                                        if ($card_2_desc !== '') :
                                            echo function_exists('wp_kses_post') ? wp_kses_post($card_2_desc) : esc_html($card_2_desc);
                                        endif;
                                        ?>
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
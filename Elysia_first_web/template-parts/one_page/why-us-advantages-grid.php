<?php
$why_advantages_eyebrow = '';
$why_advantages_title = '';
$why_advantages_items = array();

if (function_exists('get_field')) {
    $field_value = get_field('why_advantages_eyebrow');
    if ($field_value) {
        $why_advantages_eyebrow = (string) $field_value;
    }

    $field_value = get_field('why_advantages_title');
    if ($field_value) {
        $why_advantages_title = (string) $field_value;
    }

    $items = get_field('why_advantages_items');
    if (is_array($items) && count($items) > 0) {
        $why_advantages_items = $items;
    }
}

if ($why_advantages_eyebrow === '' && $why_advantages_title === '' && empty($why_advantages_items)) {
    return;
}

function elysia_why_us_group_items_by_row($items, $row)
{
    $group = array();
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        if (!isset($item['why_advantage_layout_group'])) {
            continue;
        }
        if ((string) $item['why_advantage_layout_group'] !== (string) $row) {
            continue;
        }
        $group[] = $item;
    }
    return $group;
}

function elysia_why_us_render_advantage_icon($item)
{
    if (!isset($item['why_advantage_icon_style']) || empty($item['why_advantage_icon_style'])) {
        return;
    }

    $icon = $item['why_advantage_icon_style'];
    $icon_url = '';

    if (is_array($icon) && isset($icon['url'])) {
        $icon_url = (string) $icon['url'];
    } elseif ($icon && function_exists('wp_get_attachment_image_url')) {
        $icon_url = (string) wp_get_attachment_image_url($icon, 'full');
    }

    if ($icon_url === '') {
        return;
    }
?>
    <span class="elementor-icon">
        <img src="<?php echo esc_url($icon_url); ?>" alt="" />
    </span>
<?php
}

function elysia_why_us_get_advantage_link($item)
{
    $link_type = isset($item['why_advantage_link_type']) ? (string) $item['why_advantage_link_type'] : '';
    if ($link_type === 'page' && !empty($item['why_advantage_link_page']) && function_exists('get_permalink')) {
        return get_permalink($item['why_advantage_link_page']);
    }
    if ($link_type === 'custom' && !empty($item['why_advantage_custom_url'])) {
        return (string) $item['why_advantage_custom_url'];
    }
    return '';
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-595a10e5 ct-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="595a10e5" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4787ae8a" data-id="4787ae8a" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php if ($why_advantages_eyebrow !== '') : ?>
                    <div class="elementor-element elementor-element-28fea1b3 elementor-widget elementor-widget-text-editor" data-id="28fea1b3" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <p><?php echo esc_html($why_advantages_eyebrow); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($why_advantages_title !== '') : ?>
                    <div class="elementor-element elementor-element-4740d6f4 elementor-widget elementor-widget-heading" data-id="4740d6f4" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($why_advantages_title); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                $row1_items = elysia_why_us_group_items_by_row($why_advantages_items, 1);
                $row2_items = elysia_why_us_group_items_by_row($why_advantages_items, 2);
                $row3_items = elysia_why_us_group_items_by_row($why_advantages_items, 3);
                ?>
                <?php if (!empty($row1_items)) : ?>
                    <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-6ce3e53f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6ce3e53f" data-element_type="section" data-settings="{&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;motion_fx_translateX_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:51}},&quot;motion_fx_opacity_effect&quot;:&quot;yes&quot;,&quot;motion_fx_opacity_range&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:41}},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;tablet&quot;],&quot;motion_fx_opacity_direction&quot;:&quot;out-in&quot;,&quot;motion_fx_opacity_level&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}">
                        <div class="elementor-container elementor-column-gap-default">
                            <?php foreach ($row1_items as $index => $item) : ?>
                                <?php
                                $title = isset($item['why_advantage_title']) ? (string) $item['why_advantage_title'] : '';
                                $description = isset($item['why_advantage_description']) ? $item['why_advantage_description'] : '';
                                if ($title === '' && $description === '') {
                                    continue;
                                }
                                $link = elysia_why_us_get_advantage_link($item);
                                ?>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element <?php echo $index === 0 ? 'elementor-element-4eff89db' : 'elementor-element-59a9c074'; ?>" data-id="<?php echo $index === 0 ? '4eff89db' : '59a9c074'; ?>" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element <?php echo $index === 0 ? 'elementor-element-4f38a83b' : 'elementor-element-7352e65c'; ?> elementor-view-default elementor-position-top elementor-align-left elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="<?php echo $index === 0 ? '4f38a83b' : '7352e65c'; ?>" data-element_type="widget" data-widget_type="icon-box.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-icon-box-wrapper">
                                                    <div class="elementor-icon-box-icon">
                                                        <?php elysia_why_us_render_advantage_icon($item); ?>
                                                    </div>
                                                    <div class="elementor-icon-box-content">
                                                        <?php if ($title !== '') : ?>
                                                            <h4 class="elementor-icon-box-title">
                                                                <?php if ($link !== '') : ?>
                                                                    <a href="<?php echo esc_url($link); ?>"><span><?php echo esc_html($title); ?></span></a>
                                                                <?php else : ?>
                                                                    <span><?php echo esc_html($title); ?></span>
                                                                <?php endif; ?>
                                                            </h4>
                                                        <?php endif; ?>
                                                        <?php if ($description !== '') : ?>
                                                            <p class="elementor-icon-box-description">
                                                                <?php echo function_exists('wp_kses_post') ? wp_kses_post($description) : $description; ?>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>
                <?php if (!empty($row2_items)) : ?>
                    <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-52b23a84 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="52b23a84" data-element_type="section" data-settings="{&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:4,&quot;sizes&quot;:[]},&quot;motion_fx_translateX_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:3,&quot;end&quot;:52}},&quot;motion_fx_opacity_effect&quot;:&quot;yes&quot;,&quot;motion_fx_opacity_range&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:20,&quot;end&quot;:55}},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;tablet&quot;],&quot;motion_fx_opacity_direction&quot;:&quot;out-in&quot;,&quot;motion_fx_opacity_level&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:9.5,&quot;sizes&quot;:[]}}">
                        <div class="elementor-container elementor-column-gap-default">
                            <?php foreach ($row2_items as $index => $item) : ?>
                                <?php
                                $title = isset($item['why_advantage_title']) ? (string) $item['why_advantage_title'] : '';
                                $description = isset($item['why_advantage_description']) ? $item['why_advantage_description'] : '';
                                if ($title === '' && $description === '') {
                                    continue;
                                }
                                $link = elysia_why_us_get_advantage_link($item);
                                ?>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element <?php echo $index === 0 ? 'elementor-element-19079e62' : 'elementor-element-6c4474f7'; ?>" data-id="<?php echo $index === 0 ? '19079e62' : '6c4474f7'; ?>" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element <?php echo $index === 0 ? 'elementor-element-67c9aac6' : 'elementor-element-15705ad2'; ?> elementor-view-default elementor-position-top elementor-align-left elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="<?php echo $index === 0 ? '67c9aac6' : '15705ad2'; ?>" data-element_type="widget" data-widget_type="icon-box.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-icon-box-wrapper">
                                                    <div class="elementor-icon-box-icon">
                                                        <?php elysia_why_us_render_advantage_icon($item); ?>
                                                    </div>
                                                    <div class="elementor-icon-box-content">
                                                        <?php if ($title !== '') : ?>
                                                            <h4 class="elementor-icon-box-title">
                                                                <?php if ($link !== '') : ?>
                                                                    <a href="<?php echo esc_url($link); ?>"><span><?php echo esc_html($title); ?></span></a>
                                                                <?php else : ?>
                                                                    <span><?php echo esc_html($title); ?></span>
                                                                <?php endif; ?>
                                                            </h4>
                                                        <?php endif; ?>
                                                        <?php if ($description !== '') : ?>
                                                            <p class="elementor-icon-box-description">
                                                                <?php echo function_exists('wp_kses_post') ? wp_kses_post($description) : $description; ?>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>
                <?php if (!empty($row3_items)) : ?>
                    <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-5adfb02a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5adfb02a" data-element_type="section" data-settings="{&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateX_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;motion_fx_translateX_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:15,&quot;end&quot;:51}},&quot;motion_fx_opacity_effect&quot;:&quot;yes&quot;,&quot;motion_fx_opacity_level&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:8.4,&quot;sizes&quot;:[]},&quot;motion_fx_opacity_range&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:31,&quot;end&quot;:60}},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;tablet&quot;],&quot;motion_fx_opacity_direction&quot;:&quot;out-in&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <?php foreach ($row3_items as $index => $item) : ?>
                                <?php
                                $title = isset($item['why_advantage_title']) ? (string) $item['why_advantage_title'] : '';
                                $description = isset($item['why_advantage_description']) ? $item['why_advantage_description'] : '';
                                if ($title === '' && $description === '') {
                                    continue;
                                }
                                $link = elysia_why_us_get_advantage_link($item);
                                ?>
                                <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element <?php echo $index === 0 ? 'elementor-element-217129a2' : 'elementor-element-6209e7b7'; ?>" data-id="<?php echo $index === 0 ? '217129a2' : '6209e7b7'; ?>" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element <?php echo $index === 0 ? 'elementor-element-ffe51bb' : 'elementor-element-48219ce8'; ?> elementor-view-default elementor-position-top elementor-align-left elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="<?php echo $index === 0 ? 'ffe51bb' : '48219ce8'; ?>" data-element_type="widget" data-widget_type="icon-box.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-icon-box-wrapper">
                                                    <div class="elementor-icon-box-icon">
                                                        <?php elysia_why_us_render_advantage_icon($item); ?>
                                                    </div>
                                                    <div class="elementor-icon-box-content">
                                                        <?php if ($title !== '') : ?>
                                                            <h4 class="elementor-icon-box-title">
                                                                <?php if ($link !== '') : ?>
                                                                    <a href="<?php echo esc_url($link); ?>"><span><?php echo esc_html($title); ?></span></a>
                                                                <?php else : ?>
                                                                    <span><?php echo esc_html($title); ?></span>
                                                                <?php endif; ?>
                                                            </h4>
                                                        <?php endif; ?>
                                                        <?php if ($description !== '') : ?>
                                                            <p class="elementor-icon-box-description">
                                                                <?php echo function_exists('wp_kses_post') ? wp_kses_post($description) : $description; ?>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
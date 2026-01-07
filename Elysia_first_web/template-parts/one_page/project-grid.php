<?php
$elysia_project_grid_items = array();
$elysia_project_items_per_row = 4;

if (function_exists('get_field')) {
    $items = get_field('project_items');
    if (is_array($items) && !empty($items)) {
        $elysia_project_grid_items = array_values($items);
    }
}

if (empty($elysia_project_grid_items)) {
    return;
}

if (!function_exists('elysia_render_project_grid_card_1')) {
    function elysia_render_project_grid_card_1($items, $index, $column_image_classes, $image_element_id, $divider_element_id, $country_element_id, $title_element_id)
    {
        if (!is_array($items) || !isset($items[$index])) {
            return;
        }
        $item = $items[$index];
        $country = isset($item['country']) ? $item['country'] : '';
        $title = isset($item['title']) ? $item['title'] : '';
        $highlight_text = isset($item['highlight_text']) ? $item['highlight_text'] : '';
        $image = (isset($item['image']) && is_array($item['image'])) ? $item['image'] : null;
        $link_type = isset($item['link_type']) ? $item['link_type'] : '';
        $link_page = isset($item['link_page']) ? $item['link_page'] : '';
        $link_url = isset($item['link_url']) ? $item['link_url'] : '';

        $card_link = '';
        if ($link_type === 'internal' && $link_page) {
            $card_link = get_permalink($link_page);
        } elseif ($link_type === 'external' && $link_url) {
            $card_link = $link_url;
        }

        $display_title = $title;
        if ($display_title === '' && $highlight_text !== '') {
            $display_title = $highlight_text;
        }

        $image_url = '';
        $image_width = 600;
        $image_height = 600;
        $image_alt = '';
        $image_id = '';
        if ($image && isset($image['url'])) {
            $image_url = $image['url'];
            if (isset($image['width']) && $image['width']) {
                $image_width = (int) $image['width'];
            }
            if (isset($image['height']) && $image['height']) {
                $image_height = (int) $image['height'];
            }
            if (isset($image['alt'])) {
                $image_alt = $image['alt'];
            }
            if (isset($image['ID'])) {
                $image_id = $image['ID'];
            }
        }
?>
        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element <?php echo esc_attr($column_image_classes); ?>" data-id="<?php echo esc_attr($column_image_classes); ?>" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-<?php echo esc_attr($image_element_id); ?> elementor-widget elementor-widget-image" data-id="<?php echo esc_attr($image_element_id); ?>" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <?php if ($image_url !== '') : ?>
                            <?php if ($card_link) : ?>
                                <a href="<?php echo esc_url($card_link); ?>">
                                <?php endif; ?>
                                <img loading="lazy" decoding="async" width="<?php echo esc_attr($image_width); ?>" height="<?php echo esc_attr($image_height); ?>" src="<?php echo esc_url($image_url); ?>" class="attachment-large size-large wp-image-<?php echo esc_attr($image_id); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                <?php if ($card_link) : ?>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-<?php echo esc_attr($divider_element_id); ?> hidefirst animated-fast elementor-widget-divider--view-line elementor-invisible elementor-widget elementor-widget-divider" data-id="<?php echo esc_attr($divider_element_id); ?>" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}" data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator"></span>
                        </div>
                    </div>
                </div>
                <?php if ($country !== '') : ?>
                    <div class="elementor-element elementor-element-<?php echo esc_attr($country_element_id); ?> hidefirst animated-fast elementor-invisible elementor-widget elementor-widget-text-editor" data-id="<?php echo esc_attr($country_element_id); ?>" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:100}" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <p><?php echo esc_html($country); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($display_title !== '') : ?>
                    <div class="elementor-element elementor-element-<?php echo esc_attr($title_element_id); ?> hidefirst animated-fast elementor-invisible elementor-widget elementor-widget-heading" data-id="<?php echo esc_attr($title_element_id); ?>" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200}" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h4 class="elementor-heading-title elementor-size-default">
                                <?php if ($card_link) : ?>
                                    <a href="<?php echo esc_url($card_link); ?>">
                                        <?php echo esc_html($display_title); ?>
                                    </a>
                                <?php else : ?>
                                    <?php echo esc_html($display_title); ?>
                                <?php endif; ?>
                            </h4>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php
    }
}

// 原始 Elementor section 和 column/widget ID 映射（来自 project-grid-1/2/3.php）
$elysia_project_section_ids = array(
    0 => '9f60d45',
    1 => '35ca065',
    2 => 'cb9a52c',
);

$elysia_project_columns = array(
    0 => array(
        0 => array(
            'column'  => 'elementor-element-fcf8557',
            'image'   => 'd0e27b6',
            'divider' => 'e1ff559',
            'country' => '362e280',
            'title'   => '80e6fca',
        ),
        1 => array(
            'column'  => 'elementor-element-4d5e1df',
            'image'   => '75fa197',
            'divider' => 'aa5ae52',
            'country' => '2b23c7e',
            'title'   => '4738ad8',
        ),
        2 => array(
            'column'  => 'elementor-element-6cd5cc0',
            'image'   => '0ebf4a4',
            'divider' => 'e8a6af1',
            'country' => '39457fb',
            'title'   => '4a55b33',
        ),
        3 => array(
            'column'  => 'elementor-element-f4ece50',
            'image'   => 'd82658c',
            'divider' => '9fe4056',
            'country' => '22251ac',
            'title'   => '2c38f92',
        ),
    ),
    1 => array(
        0 => array(
            'column'  => 'elementor-element-e1fb61c',
            'image'   => '71cd5b4',
            'divider' => '034a172',
            'country' => 'f168cf0',
            'title'   => 'c6ca646',
        ),
        1 => array(
            'column'  => 'elementor-element-9d3cfc8',
            'image'   => '363d4d6',
            'divider' => '2170671',
            'country' => '808b392',
            'title'   => '5804cbf',
        ),
        2 => array(
            'column'  => 'elementor-element-67b3397',
            'image'   => '8f737b6',
            'divider' => '18d9bfe',
            'country' => '50bbf38',
            'title'   => '8415719',
        ),
        3 => array(
            'column'  => 'elementor-element-6d4c3b7',
            'image'   => '8caea4c',
            'divider' => '948ee8e',
            'country' => '91d5c51',
            'title'   => 'b58c496',
        ),
    ),
    2 => array(
        0 => array(
            'column'  => 'elementor-element-a4a3d57',
            'image'   => 'f3f9333',
            'divider' => 'c8ec473',
            'country' => 'b0e9c71',
            'title'   => 'e410a13',
        ),
        1 => array(
            'column'  => 'elementor-element-f78c714',
            'image'   => '61c654e',
            'divider' => '560a738',
            'country' => '8a1f877',
            'title'   => 'd66a381',
        ),
        2 => array(
            'column'  => 'elementor-element-f9b0d74',
            'image'   => 'e7eee59',
            'divider' => '9ae0c90',
            'country' => '096fece',
            'title'   => 'cf5b92b',
        ),
        3 => array(
            'column'  => 'elementor-element-6172314',
            'image'   => 'e2881e9',
            'divider' => '5f898db',
            'country' => '9db728d',
            'title'   => 'a6f4a8c',
        ),
    ),
);

$elysia_project_column_templates = array();
foreach ($elysia_project_columns as $row_config) {
    foreach ($row_config as $col_config) {
        $elysia_project_column_templates[] = $col_config;
    }
}
$elysia_project_column_templates_count = count($elysia_project_column_templates);

if (!empty($elysia_project_grid_items) && $elysia_project_items_per_row > 0) {
    $total_items = count($elysia_project_grid_items);
    $rows = (int) ceil($total_items / $elysia_project_items_per_row);
    for ($row_index = 0; $row_index < $rows; $row_index++) {
        $offset = $row_index * $elysia_project_items_per_row;
        $row_items = array_slice($elysia_project_grid_items, $offset, $elysia_project_items_per_row);
        if (empty($row_items)) {
            continue;
        }

        $section_element_id = isset($elysia_project_section_ids[$row_index]) ? $elysia_project_section_ids[$row_index] : '';
    ?>
        <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element<?php echo $section_element_id ? ' elementor-element-' . esc_attr($section_element_id) : ''; ?> elementor-section-boxed elementor-section-height-default elementor-section-height-default" <?php echo $section_element_id ? 'data-id="' . esc_attr($section_element_id) . '"' : ''; ?> data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
                <?php
                $max_columns = count($row_items);
                for ($i = 0; $i < $max_columns; $i++) {
                    $column_class = '';
                    $image_id = '';
                    $divider_id = '';
                    $country_id = '';
                    $title_id = '';

                    if ($elysia_project_column_templates_count > 0) {
                        $global_index = $row_index * $elysia_project_items_per_row + $i;
                        $config_index = $global_index % $elysia_project_column_templates_count;
                        $config = $elysia_project_column_templates[$config_index];
                        $column_class = $config['column'];
                        $image_id = $config['image'];
                        $divider_id = $config['divider'];
                        $country_id = $config['country'];
                        $title_id = $config['title'];
                    }

                    elysia_render_project_grid_card_1(
                        $row_items,
                        $i,
                        $column_class,
                        $image_id,
                        $divider_id,
                        $country_id,
                        $title_id
                    );
                }
                ?>
            </div>
        </section>
<?php
    }
}

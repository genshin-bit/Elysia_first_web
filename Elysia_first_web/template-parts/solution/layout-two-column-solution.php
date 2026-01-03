<?php

defined('ABSPATH') || exit;

$elysia_solution_query = null;
$elysia_paged = 1;

if (get_query_var('paged')) {
    $elysia_paged = (int) get_query_var('paged');
} elseif (get_query_var('page')) {
    $elysia_paged = (int) get_query_var('page');
}

$elysia_context_id = get_queried_object_id();
$elysia_items_per_page = 9;
$elysia_orderby = 'date';
$elysia_order = 'DESC';

if ($elysia_context_id && function_exists('get_field')) {
    $field_value = (int) get_field('solution_list_items_per_page', $elysia_context_id);
    if ($field_value > 0) {
        $elysia_items_per_page = $field_value;
    }

    $order_setting = (string) get_field('solution_list_default_order', $elysia_context_id);
    if ($order_setting === 'date_asc') {
        $elysia_orderby = 'date';
        $elysia_order = 'ASC';
    } elseif ($order_setting === 'menu_order') {
        $elysia_orderby = 'menu_order';
        $elysia_order = 'ASC';
    }
}

$elysia_solution_args = array(
    'post_type'      => 'solution',
    'post_status'    => 'publish',
    'posts_per_page' => $elysia_items_per_page,
    'paged'          => $elysia_paged,
    'orderby'        => $elysia_orderby,
    'order'          => $elysia_order,
);

$elysia_solution_cat = '';

if (isset($_GET['solution_cat'])) {
    $elysia_solution_cat = sanitize_text_field(wp_unslash($_GET['solution_cat']));
}

if ($elysia_solution_cat !== '') {
    $elysia_tax_query = array();
    if (taxonomy_exists('solution_category')) {
        $elysia_tax_query[] = array(
            'taxonomy' => 'solution_category',
            'field'    => 'slug',
            'terms'    => $elysia_solution_cat,
        );
    } elseif (taxonomy_exists('category')) {
        $elysia_tax_query[] = array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $elysia_solution_cat,
        );
    }

    if (!empty($elysia_tax_query)) {
        $elysia_solution_args['tax_query'] = $elysia_tax_query;
    }
}

$elysia_solution_query = new WP_Query($elysia_solution_args);
$GLOBALS['elysia_solution_query'] = $elysia_solution_query;
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-367246d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="367246d" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-0977e20" data-id="0977e20" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-7c0162e elementor-grid-1 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-widget elementor-widget-loop-grid" data-id="7c0162e" data-element_type="widget" data-settings="{&quot;template_id&quot;:5262,&quot;columns&quot;:1,&quot;pagination_type&quot;:&quot;numbers_and_prev_next&quot;,&quot;_skin&quot;:&quot;post&quot;,&quot;columns_tablet&quot;:&quot;2&quot;,&quot;columns_mobile&quot;:&quot;1&quot;,&quot;edit_handle_selector&quot;:&quot;[data-elementor-type=\&quot;loop-item\&quot;]&quot;,&quot;pagination_load_type&quot;:&quot;page_reload&quot;,&quot;row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="loop-grid.post">
                    <div class="elementor-widget-container">
                        <?php get_template_part('template-parts/loop/loop-solution-grid'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6a6b575" data-id="6a6b575" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php
                $elysia_sidebar_video_url = '';
                $elysia_sidebar_video_aspect_ratio = '';
                if ($elysia_context_id && function_exists('get_field')) {
                    $elysia_sidebar_video_url = (string) get_field('solution_sidebar_video_url', $elysia_context_id);
                    $elysia_sidebar_video_aspect_ratio = (string) get_field('solution_sidebar_video_aspect_ratio', $elysia_context_id);
                }
                if (!$elysia_sidebar_video_url && function_exists('get_field')) {
                    $default_url = (string) get_field('solution_default_sidebar_video_url', 'option');
                    $default_ratio = (string) get_field('solution_default_sidebar_video_aspect_ratio', 'option');
                    if ($default_url) {
                        $elysia_sidebar_video_url = $default_url;
                    }
                    if ($default_ratio) {
                        $elysia_sidebar_video_aspect_ratio = $default_ratio;
                    }
                }
                if (!$elysia_sidebar_video_aspect_ratio) {
                    $elysia_sidebar_video_aspect_ratio = '16/9';
                }
                $elysia_sidebar_embed_url = '';
                $elysia_sidebar_is_youtube = false;
                if ($elysia_sidebar_video_url) {
                    if (function_exists('elysia_get_youtube_embed_url')) {
                        $converted = elysia_get_youtube_embed_url($elysia_sidebar_video_url);
                        if ($converted !== $elysia_sidebar_video_url) {
                            $elysia_sidebar_embed_url = $converted;
                            $elysia_sidebar_is_youtube = true;
                        } else {
                            $elysia_sidebar_embed_url = $elysia_sidebar_video_url;
                        }
                    } else {
                        $elysia_sidebar_embed_url = $elysia_sidebar_video_url;
                    }
                }
                if ($elysia_sidebar_embed_url) :
                    $elysia_sidebar_settings = array(
                        'controls' => 'yes',
                    );
                    if ($elysia_sidebar_is_youtube) {
                        $elysia_sidebar_settings['youtube_url'] = $elysia_sidebar_video_url;
                        $elysia_sidebar_settings['video_type'] = 'youtube';
                    } else {
                        $elysia_sidebar_settings['video_type'] = 'hosted';
                    }
                ?>
                    <div class="elementor-element elementor-element-27f192e elementor-widget elementor-widget-video" data-id="27f192e" data-element_type="widget" data-settings="<?php echo esc_attr(wp_json_encode($elysia_sidebar_settings)); ?>" data-widget_type="video.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-wrapper elementor-open-inline" style="aspect-ratio: <?php echo esc_attr($elysia_sidebar_video_aspect_ratio); ?>;">
                                <div class="elementor-video">
                                    <?php if ($elysia_sidebar_is_youtube) : ?>
                                        <iframe src="<?php echo esc_url($elysia_sidebar_embed_url); ?>" frameborder="0" allowfullscreen></iframe>
                                    <?php else : ?>
                                        <iframe src="<?php echo esc_url($elysia_sidebar_embed_url); ?>" frameborder="0" allow="autoplay; encrypted-media" sandbox="allow-scripts allow-same-origin allow-popups" allowfullscreen></iframe>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php get_template_part('template-parts/solution/sidebar-feature-product'); ?>
            </div>
        </div>
    </div>
</section>
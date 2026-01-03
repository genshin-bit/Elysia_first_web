<?php

defined('ABSPATH') || exit;

$elysia_related_title = 'Related Solutions';
if (function_exists('get_field')) {
    $field_title = get_field('solution_detail_related_title');
    if ($field_title !== null && $field_title !== '') {
        $elysia_related_title = (string) $field_title;
    }
}

$elysia_related_posts = array();

if (function_exists('get_field')) {
    $mode = (string) get_field('solution_detail_related_mode');
    if ($mode === 'manual') {
        $manual_posts = get_field('solution_detail_related_manual');
        if (is_array($manual_posts) && !empty($manual_posts)) {
            $elysia_related_posts = $manual_posts;
        }
    }
}

if (empty($elysia_related_posts)) {
    $current_id = get_the_ID();
    if ($current_id) {
        $args = array(
            'post_type'      => 'solution',
            'post_status'    => 'publish',
            'posts_per_page' => 4,
            'post__not_in'   => array($current_id),
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        $tax_query = array();
        $solution_terms = wp_get_post_terms($current_id, 'solution_category', array('fields' => 'ids'));
        if (!is_wp_error($solution_terms) && !empty($solution_terms)) {
            $tax_query[] = array(
                'taxonomy' => 'solution_category',
                'field'    => 'term_id',
                'terms'    => array_map('intval', $solution_terms),
            );
        }
        if (!empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            $elysia_related_posts = $query->posts;
        }
        wp_reset_postdata();
    }
}

if (empty($elysia_related_posts)) {
    return;
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-48c1715 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48c1715" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f9ab7a4" data-id="f9ab7a4" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-420328d elementor-widget elementor-widget-heading" data-id="420328d" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h4 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_related_title); ?></h4>
                    </div>
                </div>
                <div class="elementor-element elementor-element-7d2043d elementor-grid-4 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-posts--thumbnail-top elementor-widget elementor-widget-posts" data-id="7d2043d" data-element_type="widget" data-settings="{&quot;classic_columns&quot;:&quot;4&quot;,&quot;classic_columns_tablet&quot;:&quot;2&quot;,&quot;classic_columns_mobile&quot;:&quot;1&quot;,&quot;classic_row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:35,&quot;sizes&quot;:[]},&quot;classic_row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;classic_row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="posts.classic">
                    <div class="elementor-widget-container">
                        <div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid" role="list">
                            <?php
                            foreach ($elysia_related_posts as $elysia_post) {
                                $post = $elysia_post;
                                setup_postdata($post);
                                ?>
                                <article class="elementor-post elementor-grid-item" role="listitem">
                                    <div class="elementor-post__text">
                                        <h4 class="elementor-post__title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>
                                        <div class="elementor-post__excerpt">
                                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 30)); ?></p>
                                        </div>
                                    </div>
                                </article>
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

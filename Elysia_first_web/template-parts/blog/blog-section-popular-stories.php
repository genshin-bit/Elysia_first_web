<?php
$elysia_popular_divider = 'On Trend';
$elysia_popular_title = 'Most Popular Stories';
$elysia_popular_posts = array();
$elysia_blog_page_id = 0;
if (function_exists('elysia_get_blog_archive_page_id')) {
    $elysia_blog_page_id = elysia_get_blog_archive_page_id();
}
if ($elysia_blog_page_id && function_exists('get_field')) {
    $divider_field = get_field('blog_popular_divider_text', $elysia_blog_page_id);
    if ($divider_field) {
        $elysia_popular_divider = $divider_field;
    }
    $title_field = get_field('blog_popular_title', $elysia_blog_page_id);
    if ($title_field) {
        $elysia_popular_title = $title_field;
    }
}
if (function_exists('elysia_get_blog_popular_posts')) {
    $elysia_popular_posts = elysia_get_blog_popular_posts();
} else {
    $elysia_popular_posts = get_posts(
        array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC',
        )
    );
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-3526778a elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3526778a" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5c49d72c" data-id="5c49d72c" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-105303ad elementor-widget-divider--view-line_text elementor-widget-divider--element-align-right elementor-widget elementor-widget-divider" data-id="105303ad" data-element_type="widget" data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator">
                                <span class="elementor-divider__text elementor-divider__element">
                                    <?php echo esc_html($elysia_popular_divider); ?> </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-421d7efd elementor-widget elementor-widget-heading" data-id="421d7efd" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_popular_title); ?></h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-2a5a14fa elementor-grid-4 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-posts--thumbnail-top elementor-widget elementor-widget-posts" data-id="2a5a14fa" data-element_type="widget" data-settings="{&quot;classic_columns&quot;:&quot;4&quot;,&quot;classic_row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;40&quot;,&quot;sizes&quot;:[]},&quot;classic_columns_tablet&quot;:&quot;2&quot;,&quot;classic_columns_mobile&quot;:&quot;1&quot;,&quot;classic_row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;classic_row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="posts.classic">
                    <div class="elementor-widget-container">
                        <div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid" role="list">
                            <?php
                            if (!empty($elysia_popular_posts)) {
                                foreach ($elysia_popular_posts as $elysia_post) {
                                    $elysia_post_id = is_object($elysia_post) ? $elysia_post->ID : (int) $elysia_post;
                                    $elysia_title = get_the_title($elysia_post_id);
                                    $elysia_link = get_permalink($elysia_post_id);
                                    $elysia_excerpt = get_the_excerpt($elysia_post_id);
                                    if (!$elysia_excerpt) {
                                        $elysia_excerpt = wp_trim_words(strip_shortcodes(get_post_field('post_content', $elysia_post_id)), 30);
                                    }
                                    $elysia_read_more_label = sprintf(__('Read more about %s', 'elysia_first_web'), $elysia_title);
                                    ?>
                                    <article <?php post_class('elementor-post elementor-grid-item', $elysia_post_id); ?> role="listitem">
                                        <div class="elementor-post__text">
                                            <h3 class="elementor-post__title">
                                                <a href="<?php echo esc_url($elysia_link); ?>">
                                                    <?php echo esc_html($elysia_title); ?>
                                                </a>
                                            </h3>
                                            <div class="elementor-post__excerpt">
                                                <p><?php echo esc_html($elysia_excerpt); ?></p>
                                            </div>
                                            <a class="elementor-post__read-more" href="<?php echo esc_url($elysia_link); ?>" aria-label="<?php echo esc_attr($elysia_read_more_label); ?>" tabindex="-1">
                                                Read More »
                                            </a>
                                        </div>
                                    </article>
                                    <?php
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

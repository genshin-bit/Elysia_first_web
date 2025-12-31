<div class="elementor-element elementor-element-55896f19 elementor-widget-divider--view-line_text elementor-widget-divider--element-align-right elementor-widget elementor-widget-divider" data-id="55896f19" data-element_type="widget" data-widget_type="divider.default">
    <div class="elementor-widget-container">
        <div class="elementor-divider">
            <span class="elementor-divider-separator">
                <span class="elementor-divider__text elementor-divider__element">
                    On Top </span>
            </span>
        </div>
    </div>
</div>
<div class="elementor-element elementor-element-6991da9 elementor-widget elementor-widget-heading" data-id="6991da9" data-element_type="widget" data-widget_type="heading.default">
    <div class="elementor-widget-container">
        <h2 class="elementor-heading-title elementor-size-default">Recent Stories</h2>
    </div>
</div>
<div class="elementor-element elementor-element-c35a416 elementor-grid-1 elementor-posts--thumbnail-left elementor-posts--align-left elementor-grid-tablet-1 elementor-grid-mobile-1 elementor-widget elementor-widget-posts" data-id="c35a416" data-element_type="widget" data-settings="{&quot;classic_columns&quot;:&quot;1&quot;,&quot;classic_row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;50&quot;,&quot;sizes&quot;:[]},&quot;classic_columns_tablet&quot;:&quot;1&quot;,&quot;pagination_type&quot;:&quot;numbers_and_prev_next&quot;,&quot;classic_columns_mobile&quot;:&quot;1&quot;,&quot;classic_row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;classic_row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="posts.classic">
    <div class="elementor-widget-container">
        <div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid" role="list">
            <?php
            $elysia_blog_query = null;
            if (function_exists('elysia_get_blog_main_query')) {
                $elysia_paged = 1;
                if (get_query_var('paged')) {
                    $elysia_paged = (int) get_query_var('paged');
                } elseif (get_query_var('page')) {
                    $elysia_paged = (int) get_query_var('page');
                }
                $elysia_blog_query = elysia_get_blog_main_query($elysia_paged);
            } else {
                global $wp_query;
                $elysia_blog_query = $wp_query;
            }
            $GLOBALS['elysia_blog_query'] = $elysia_blog_query;
            if ($elysia_blog_query && $elysia_blog_query->have_posts()) {
                while ($elysia_blog_query->have_posts()) {
                    $elysia_blog_query->the_post();
                    $elysia_post_id = get_the_ID();
                    $elysia_post_title = get_the_title();
                    $elysia_post_link = get_permalink();
                    $elysia_post_date = get_the_date();
                    $elysia_excerpt = get_the_excerpt();
                    if (!$elysia_excerpt) {
                        $elysia_excerpt = wp_trim_words(strip_shortcodes(get_the_content(null, false, $elysia_post_id)), 40);
                    }
                    $elysia_read_more_label = sprintf(__('Read more about %s', 'elysia_first_web'), $elysia_post_title);
            ?>
                    <article <?php post_class('elementor-post elementor-grid-item', $elysia_post_id); ?> role="listitem">
                        <div class="elementor-post__text">
                            <h3 class="elementor-post__title">
                                <a href="<?php echo esc_url($elysia_post_link); ?>">
                                    <?php echo esc_html($elysia_post_title); ?>
                                </a>
                            </h3>
                            <div class="elementor-post__meta-data">
                                <span class="elementor-post-date">
                                    <?php echo esc_html($elysia_post_date); ?>
                                </span>
                                <span class="elementor-post-avatar">
                                    <?php comments_number('No Comments', '1 Comment', '% Comments'); ?>
                                </span>
                            </div>
                            <div class="elementor-post__excerpt">
                                <p><?php echo esc_html($elysia_excerpt); ?></p>
                            </div>
                            <a class="elementor-post__read-more" href="<?php echo esc_url($elysia_post_link); ?>" aria-label="<?php echo esc_attr($elysia_read_more_label); ?>" tabindex="-1">
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

        <?php get_template_part('template-parts/blog/blog', 'pagination'); ?>

    </div>
</div>
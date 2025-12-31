<?php
$elysia_detail_latest_title = 'New Update';
if (function_exists('get_field')) {
    $elysia_global_title = get_field('blog_detail_sidebar_latest_title', 'option');
    if ($elysia_global_title) {
        $elysia_detail_latest_title = $elysia_global_title;
    }
}
$elysia_detail_latest_posts = array();
if (function_exists('elysia_get_blog_detail_latest_posts')) {
    $elysia_detail_latest_posts = elysia_get_blog_detail_latest_posts();
} elseif (function_exists('elysia_get_blog_latest_posts')) {
    $elysia_detail_latest_posts = elysia_get_blog_latest_posts();
} else {
    $elysia_detail_latest_posts = get_posts(
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
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-5dd542a7 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5dd542a7" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-663c4bbc" data-id="663c4bbc" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4b7e141d elementor-widget elementor-widget-heading" data-id="4b7e141d" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h4 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_detail_latest_title); ?></h4>
                    </div>
                </div>
                <div class="elementor-element elementor-element-25c6fc9a elementor-grid-1 elementor-posts--thumbnail-left elementor-posts--align-left elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-widget elementor-widget-posts" data-id="25c6fc9a" data-element_type="widget" data-settings="{&quot;classic_columns&quot;:&quot;1&quot;,&quot;classic_row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;30&quot;,&quot;sizes&quot;:[]},&quot;classic_columns_tablet&quot;:&quot;2&quot;,&quot;classic_columns_mobile&quot;:&quot;1&quot;,&quot;classic_row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;classic_row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="posts.classic">
                    <div class="elementor-widget-container">
                        <div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid" role="list">
                            <?php
                            if (!empty($elysia_detail_latest_posts)) {
                                foreach ($elysia_detail_latest_posts as $elysia_post_obj) {
                                    $elysia_post_id = $elysia_post_obj->ID;
                                    $elysia_post_title = get_the_title($elysia_post_id);
                                    $elysia_post_link = get_permalink($elysia_post_id);
                                    $elysia_post_date = get_the_date('', $elysia_post_id);
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
                                            </div>
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
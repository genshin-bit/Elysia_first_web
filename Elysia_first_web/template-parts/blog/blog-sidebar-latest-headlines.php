<?php
$elysia_latest_title = 'New Update';
$elysia_blog_page_id = 0;
if (function_exists('elysia_get_blog_archive_page_id')) {
    $elysia_blog_page_id = elysia_get_blog_archive_page_id();
}
if ($elysia_blog_page_id && function_exists('get_field')) {
    $field_value = get_field('blog_sidebar_latest_title', $elysia_blog_page_id);
    if ($field_value) {
        $elysia_latest_title = $field_value;
    }
}
$elysia_latest_posts = array();
if (function_exists('elysia_get_blog_latest_posts')) {
    $elysia_latest_posts = elysia_get_blog_latest_posts();
} else {
    $elysia_latest_posts = get_posts(
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
<div class="elementor-element elementor-element-57ca039 elementor-widget elementor-widget-heading" data-id="57ca039" data-element_type="widget" data-widget_type="heading.default">
    <div class="elementor-widget-container">
        <h4 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_latest_title); ?></h4>
    </div>
</div>
<div class="elementor-element elementor-element-73ac03da elementor-grid-1 elementor-posts--thumbnail-left elementor-posts--align-left elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-widget elementor-widget-posts" data-id="73ac03da" data-element_type="widget" data-settings="{&quot;classic_columns&quot;:&quot;1&quot;,&quot;classic_row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;30&quot;,&quot;sizes&quot;:[]},&quot;classic_columns_tablet&quot;:&quot;2&quot;,&quot;classic_columns_mobile&quot;:&quot;1&quot;,&quot;classic_row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;classic_row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="posts.classic">
    <div class="elementor-widget-container">
        <div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid" role="list">
            <?php
            if (!empty($elysia_latest_posts)) {
                foreach ($elysia_latest_posts as $elysia_post) {
                    $elysia_post_id = $elysia_post->ID;
                    $elysia_title = get_the_title($elysia_post_id);
                    $elysia_link = get_permalink($elysia_post_id);
                    $elysia_date = get_the_date('', $elysia_post_id);
                    ?>
                    <article <?php post_class('elementor-post elementor-grid-item', $elysia_post_id); ?> role="listitem">
                        <div class="elementor-post__text">
                            <h3 class="elementor-post__title">
                                <a href="<?php echo esc_url($elysia_link); ?>">
                                    <?php echo esc_html($elysia_title); ?>
                                </a>
                            </h3>
                            <div class="elementor-post__meta-data">
                                <span class="elementor-post-date">
                                    <?php echo esc_html($elysia_date); ?>
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

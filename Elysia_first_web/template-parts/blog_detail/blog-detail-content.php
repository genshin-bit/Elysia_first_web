<div class="elementor-element elementor-element-203c5bf4 elementor-widget elementor-widget-theme-post-content" data-id="203c5bf4" data-element_type="widget" data-widget_type="theme-post-content.default">
    <div class="elementor-widget-container elysia-article-content">
        <?php the_content(); ?>
    </div>
</div>

<?php
$elysia_share_title = '分享此文章：';
if (function_exists('get_field')) {
    $field_share = get_field('blog_detail_share_title', 'option');
    if ($field_share) {
        $elysia_share_title = $field_share;
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-elysia-share-section elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="elysia-share-section" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-elysia-share-column" data-id="elysia-share-column" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-elysia-share-heading elementor-widget elementor-widget-heading" data-id="elysia-share-heading" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h4 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($elysia_share_title); ?>
                        </h4>
                    </div>
                </div>
                <div class="elementor-element elementor-element-elysia-share-buttons elementor-share-buttons--view-icon elementor-share-buttons--skin-gradient elementor-share-buttons--shape-square elementor-grid-0 elementor-share-buttons--color-official elementor-widget elementor-widget-share-buttons" data-id="elysia-share-buttons" data-element_type="widget" data-widget_type="share-buttons.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-grid" role="list">
                            <div class="elementor-grid-item" role="listitem">
                                <a class="elementor-share-btn elementor-share-btn_facebook" href="#" role="button" tabindex="0" aria-label="Share on Facebook">
                                    <span class="elementor-share-btn__icon">
                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="elementor-grid-item" role="listitem">
                                <a class="elementor-share-btn elementor-share-btn_twitter" href="#" role="button" tabindex="0" aria-label="Share on Twitter">
                                    <span class="elementor-share-btn__icon">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="elementor-grid-item" role="listitem">
                                <a class="elementor-share-btn elementor-share-btn_linkedin" href="#" role="button" tabindex="0" aria-label="Share on LinkedIn">
                                    <span class="elementor-share-btn__icon">
                                        <i class="fab fa-linkedin" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="elementor-grid-item" role="listitem">
                                <a class="elementor-share-btn elementor-share-btn_whatsapp" href="#" role="button" tabindex="0" aria-label="Share on WhatsApp">
                                    <span class="elementor-share-btn__icon">
                                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="elementor-grid-item" role="listitem">
                                <a class="elementor-share-btn elementor-share-btn_email" href="#" role="button" tabindex="0" aria-label="Share by Email">
                                    <span class="elementor-share-btn__icon">
                                        <i class="fas fa-envelope" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$elysia_prev_label = 'Previous';
if (function_exists('get_field')) {
    $field_prev = get_field('blog_detail_prev_label', 'option');
    if ($field_prev) {
        $elysia_prev_label = $field_prev;
    }
}
$elysia_prev_post = get_previous_post();
if ($elysia_prev_post instanceof WP_Post) {
    $elysia_prev_link = get_permalink($elysia_prev_post);
    $elysia_prev_title = get_the_title($elysia_prev_post);
?>
    <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-74fb008 ignore-toc elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="74fb008" data-element_type="section">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-38a1d924" data-id="38a1d924" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-63b9e201 elementor-widget elementor-widget-post-navigation" data-id="63b9e201" data-element_type="widget" data-widget_type="post-navigation.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-post-navigation" role="navigation" aria-label="Post Navigation">
                                <div class="elementor-post-navigation__prev elementor-post-navigation__link">
                                    <a href="<?php echo esc_url($elysia_prev_link); ?>" rel="prev">
                                        <span class="post-navigation__arrow-wrapper post-navigation__arrow-prev">
                                            <i aria-hidden="true" class="fas fa-angle-left"></i>
                                            <span class="elementor-screen-only">Prev</span>
                                        </span>
                                        <span class="elementor-post-navigation__link__prev">
                                            <span class="post-navigation__prev--label">
                                                <?php echo esc_html($elysia_prev_label); ?>
                                            </span>
                                            <span class="post-navigation__prev--title">
                                                <?php echo esc_html($elysia_prev_title); ?>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="elementor-post-navigation__next elementor-post-navigation__link">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}

$elysia_related_badge = 'On Key';
$elysia_related_title = 'Related Posts';
if (function_exists('get_field')) {
    $field_badge = get_field('blog_detail_related_badge', 'option');
    if ($field_badge) {
        $elysia_related_badge = $field_badge;
    }
    $field_related_title = get_field('blog_detail_related_title', 'option');
    if ($field_related_title) {
        $elysia_related_title = $field_related_title;
    }
}
$elysia_related_posts = array();
if (function_exists('elysia_get_blog_detail_related_posts')) {
    $elysia_related_posts = elysia_get_blog_detail_related_posts();
}
if (!empty($elysia_related_posts)) {
?>
    <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-57349519 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="57349519" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3928b4e1" data-id="3928b4e1" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-2558ff2a elementor-widget-divider--view-line_text elementor-widget-divider--element-align-right elementor-widget elementor-widget-divider" data-id="2558ff2a" data-element_type="widget" data-widget_type="divider.default">
                        <div class="elementor-widget-container">
                            <div class="elementor-divider">
                                <span class="elementor-divider-separator">
                                    <span class="elementor-divider__text elementor-divider__element">
                                        <?php echo esc_html($elysia_related_badge); ?>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-126aa825 elementor-widget elementor-widget-heading" data-id="126aa825" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h4 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_related_title); ?>
                            </h4>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-c0915dd elementor-grid-4 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-posts--thumbnail-top elementor-widget elementor-widget-posts" data-id="c0915dd" data-element_type="widget" data-settings="{&quot;classic_columns&quot;:&quot;4&quot;,&quot;classic_columns_tablet&quot;:&quot;2&quot;,&quot;classic_columns_mobile&quot;:&quot;1&quot;,&quot;classic_row_gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:35,&quot;sizes&quot;:[]},&quot;classic_row_gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;classic_row_gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}">
                        <div class="elementor-widget-container">
                            <div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid" role="list">
                                <?php
                                foreach ($elysia_related_posts as $elysia_related_post) {
                                    $related_id = $elysia_related_post->ID;
                                    $related_title = get_the_title($related_id);
                                    $related_link = get_permalink($related_id);
                                    $related_excerpt = get_the_excerpt($related_id);
                                    if (!$related_excerpt) {
                                        $related_excerpt = wp_trim_words(strip_shortcodes(get_post_field('post_content', $related_id)), 40);
                                    }
                                ?>
                                    <article class="elementor-post elementor-grid-item <?php echo esc_attr(implode(' ', get_post_class('', $related_id))); ?>" role="listitem">
                                        <div class="elementor-post__text">
                                            <h4 class="elementor-post__title">
                                                <a href="<?php echo esc_url($related_link); ?>">
                                                    <?php echo esc_html($related_title); ?>
                                                </a>
                                            </h4>
                                            <div class="elementor-post__excerpt">
                                                <p><?php echo esc_html($related_excerpt); ?></p>
                                            </div>
                                        </div>
                                    </article>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}

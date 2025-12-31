<?php
$elysia_share_title = 'Share This Page';
$elysia_share_url = get_permalink();
$elysia_share_text = get_the_title();
$elysia_blog_page_id = 0;
if (function_exists('elysia_get_blog_archive_page_id')) {
    $elysia_blog_page_id = elysia_get_blog_archive_page_id();
}
if ($elysia_blog_page_id && function_exists('get_field')) {
    $field_value = get_field('blog_sidebar_share_title', $elysia_blog_page_id);
    if ($field_value) {
        $elysia_share_title = $field_value;
    } else {
        $global_title = get_field('blog_global_sidebar_share_title', 'option');
        if ($global_title) {
            $elysia_share_title = $global_title;
        }
    }
}
$elysia_encoded_url = rawurlencode($elysia_share_url);
$elysia_encoded_text = rawurlencode($elysia_share_text);
$elysia_facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $elysia_encoded_url;
$elysia_twitter_url = 'https://twitter.com/intent/tweet?url=' . $elysia_encoded_url . '&text=' . $elysia_encoded_text;
$elysia_linkedin_url = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $elysia_encoded_url . '&title=' . $elysia_encoded_text;
$elysia_whatsapp_url = 'https://api.whatsapp.com/send?text=' . $elysia_encoded_text . '%20' . $elysia_encoded_url;
$elysia_email_url = 'mailto:?subject=' . $elysia_encoded_text . '&body=' . $elysia_encoded_url;
?>
<div class="elementor-element elementor-element-6be9620a elementor-widget elementor-widget-heading" data-id="6be9620a" data-element_type="widget" data-widget_type="heading.default">
    <div class="elementor-widget-container">
        <h4 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_share_title); ?></h4>
    </div>
</div>
<div class="elementor-element elementor-element-9d4bb6d elementor-share-buttons--view-icon elementor-share-buttons--skin-gradient elementor-share-buttons--shape-square elementor-grid-0 elementor-share-buttons--color-official elementor-widget elementor-widget-share-buttons" data-id="9d4bb6d" data-element_type="widget" data-widget_type="share-buttons.default">
    <div class="elementor-widget-container">
        <div class="elementor-grid" role="list">
            <div class="elementor-grid-item" role="listitem">
                <a class="elementor-share-btn elementor-share-btn_facebook" href="<?php echo esc_url($elysia_facebook_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on facebook">
                    <span class="elementor-share-btn__icon">
                        <i class="fab fa-facebook" aria-hidden="true"></i> </span>
                </a>
            </div>
            <div class="elementor-grid-item" role="listitem">
                <a class="elementor-share-btn elementor-share-btn_twitter" href="<?php echo esc_url($elysia_twitter_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on twitter">
                    <span class="elementor-share-btn__icon">
                        <i class="fab fa-twitter" aria-hidden="true"></i> </span>
                </a>
            </div>
            <div class="elementor-grid-item" role="listitem">
                <a class="elementor-share-btn elementor-share-btn_linkedin" href="<?php echo esc_url($elysia_linkedin_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on linkedin">
                    <span class="elementor-share-btn__icon">
                        <i class="fab fa-linkedin" aria-hidden="true"></i> </span>
                </a>
            </div>
            <div class="elementor-grid-item" role="listitem">
                <a class="elementor-share-btn elementor-share-btn_whatsapp" href="<?php echo esc_url($elysia_whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on whatsapp">
                    <span class="elementor-share-btn__icon">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i> </span>
                </a>
            </div>
            <div class="elementor-grid-item" role="listitem">
                <a class="elementor-share-btn elementor-share-btn_email" href="<?php echo esc_url($elysia_email_url); ?>" aria-label="Share on email">
                    <span class="elementor-share-btn__icon">
                        <i class="fas fa-envelope" aria-hidden="true"></i> </span>
                </a>
            </div>
        </div>
    </div>
</div>

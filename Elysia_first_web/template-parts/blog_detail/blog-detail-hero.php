<?php
$elysia_post_id = get_the_ID();
$elysia_hero_title = get_the_title($elysia_post_id);
$elysia_hero_subtitle = '';
$elysia_hero_background = '';
if (function_exists('get_field')) {
    $field_title = get_field('blog_detail_custom_hero_title', $elysia_post_id);
    if ($field_title) {
        $elysia_hero_title = $field_title;
    }
    $field_subtitle = get_field('blog_detail_hero_subtitle', $elysia_post_id);
    if ($field_subtitle) {
        $elysia_hero_subtitle = $field_subtitle;
    }
    $field_bg = get_field('blog_detail_hero_background', $elysia_post_id);
    if (is_array($field_bg) && isset($field_bg['url'])) {
        $elysia_hero_background = $field_bg['url'];
    }
}
$elysia_date = get_the_date('', $elysia_post_id);
$elysia_year = get_the_date('Y', $elysia_post_id);
$elysia_month = get_the_date('m', $elysia_post_id);
$elysia_day = get_the_date('d', $elysia_post_id);
$elysia_date_link = get_day_link($elysia_year, $elysia_month, $elysia_day);
$elysia_section_style = '';
if ($elysia_hero_background) {
    $elysia_section_style = 'style="background-image:url(' . esc_url($elysia_hero_background) . ');"';
}
?>
<section <?php echo $elysia_section_style; ?> data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-41df9e55 ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="41df9e55" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9b0c3aa" data-id="9b0c3aa" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-9842c1e elementor-widget elementor-widget-theme-post-title elementor-page-title elementor-widget-heading" data-id="9842c1e" data-element_type="widget" data-widget_type="theme-post-title.default">
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_hero_title); ?></h1>
                        <?php if ($elysia_hero_subtitle) { ?>
                            <div class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_hero_subtitle); ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-a5cc1c6 elementor-widget elementor-widget-post-info" data-id="a5cc1c6" data-element_type="widget" data-widget_type="post-info.default">
                    <div class="elementor-widget-container">
                        <ul class="elementor-inline-items elementor-icon-list-items elementor-post-info">
                            <li class="elementor-icon-list-item elementor-repeater-item-5b276ce elementor-inline-item" itemprop="datePublished">
                                <a href="<?php echo esc_url($elysia_date_link); ?>">
                                    <span class="elementor-icon-list-text elementor-post-info__item elementor-post-info__item--type-date">
                                        <time><?php echo esc_html($elysia_date); ?></time> </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$elysia_blog_hero_title = '';
$elysia_blog_page_id = 0;
if (function_exists('elysia_get_blog_archive_page_id')) {
    $elysia_blog_page_id = elysia_get_blog_archive_page_id();
}
if ($elysia_blog_page_id) {
    if (function_exists('get_field')) {
        $field_value = get_field('blog_hero_title', $elysia_blog_page_id);
        if ($field_value) {
            $elysia_blog_hero_title = $field_value;
        } else {
            $elysia_blog_hero_title = get_the_title($elysia_blog_page_id);
        }
    } else {
        $elysia_blog_hero_title = get_the_title($elysia_blog_page_id);
    }
}
if (!$elysia_blog_hero_title) {
    if (function_exists('get_field')) {
        $global_title = get_field('blog_global_hero_title', 'option');
        if ($global_title) {
            $elysia_blog_hero_title = $global_title;
        }
    }
}
if (!$elysia_blog_hero_title) {
    $elysia_blog_hero_title = get_the_title();
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-e507724 ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="e507724" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7993079" data-id="7993079" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-b761e25 elementor-widget elementor-widget-heading" data-id="b761e25" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_blog_hero_title); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$page_hero_title = '';
$page_hero_subtitle = '';
$page_hero_bg_url = '';

if (function_exists('get_field')) {
    $hero_title = get_field('hero_title');
    $hero_title_global = get_field('hero_title', 'option');

    if ($hero_title) {
        $page_hero_title = $hero_title;
    } elseif ($hero_title_global) {
        $page_hero_title = $hero_title_global;
    }

    $hero_subtitle = get_field('hero_subtitle');
    $hero_subtitle_global = get_field('hero_subtitle', 'option');

    if ($hero_subtitle) {
        $page_hero_subtitle = $hero_subtitle;
    } elseif ($hero_subtitle_global) {
        $page_hero_subtitle = $hero_subtitle_global;
    }

    $hero_bg = get_field('hero_background_image');
    $hero_bg_global = get_field('hero_background_image', 'option');

    if (!$hero_bg && $hero_bg_global) {
        $hero_bg = $hero_bg_global;
    }

    if (is_array($hero_bg) && !empty($hero_bg['url'])) {
        $page_hero_bg_url = $hero_bg['url'];
    }
}

$section_style = '';

if ($page_hero_bg_url !== '') {
    $section_style = 'background-image:url(' . esc_url($page_hero_bg_url) . ');background-size:cover;background-position:center center;';
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-9b89ead ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="9b89ead" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" <?php echo $section_style !== '' ? ' style="' . esc_attr($section_style) . '"' : ''; ?>>
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-412c223" data-id="412c223" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-d57b546 elementor-widget elementor-widget-heading" data-id="d57b546" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default"><?php echo esc_html($page_hero_title); ?></h1>
                        <?php if ($page_hero_subtitle !== '') : ?>
                            <p class="elysia-page-hero-subtitle"><?php echo esc_html($page_hero_subtitle); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
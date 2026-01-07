<?php
$page_hero_title = '';
if (isset($args['title']) && $args['title'] !== '') {
    $page_hero_title = (string) $args['title'];
}
$page_hero_subtitle = '';
$page_hero_bg_url = '';

$is_factory_template = function_exists('is_page_template') && is_page_template('page-factory.php');
$is_quality_template = function_exists('is_page_template') && is_page_template('page-quality-manufacturing.php');
$is_about_template = function_exists('is_page_template') && is_page_template('page-about-us.php');
$is_project_template = function_exists('is_page_template') && is_page_template('page-project.php');
$is_faq_template = function_exists('is_page_template') && is_page_template('page-faq.php');

$disable_global_hero_options = $is_factory_template || $is_about_template || $is_project_template || $is_faq_template;
$has_page_hero_acf = false;

if (function_exists('get_field')) {
    if ($is_factory_template) {
        $factory_hero_title = get_field('factory_hero_title');
        if ($factory_hero_title) {
            $page_hero_title = $factory_hero_title;
            $has_page_hero_acf = true;
        }

        $factory_hero_subtitle = get_field('factory_hero_subtitle');
        if ($factory_hero_subtitle) {
            $page_hero_subtitle = $factory_hero_subtitle;
            $has_page_hero_acf = true;
        }
    } else {
        $hero_title = get_field('hero_title');
        if ($hero_title) {
            $page_hero_title = $hero_title;
            $has_page_hero_acf = true;
        } elseif (!$is_quality_template && !$disable_global_hero_options) {
            $hero_title_global = get_field('hero_title', 'option');
            if ($hero_title_global) {
                $page_hero_title = $hero_title_global;
            }
        }

        $hero_subtitle = get_field('hero_subtitle');
        if ($hero_subtitle) {
            $page_hero_subtitle = $hero_subtitle;
            $has_page_hero_acf = true;
        } elseif (!$is_quality_template && !$disable_global_hero_options) {
            $hero_subtitle_global = get_field('hero_subtitle', 'option');
            if ($hero_subtitle_global) {
                $page_hero_subtitle = $hero_subtitle_global;
            }
        }
    }

    $hero_bg = get_field('hero_background_image');
    if (is_array($hero_bg) && !empty($hero_bg['url'])) {
        $page_hero_bg_url = $hero_bg['url'];
        $has_page_hero_acf = true;
    } elseif (!$is_quality_template && !$disable_global_hero_options) {
        $hero_bg_global = get_field('hero_background_image', 'option');
        if (is_array($hero_bg_global) && !empty($hero_bg_global['url'])) {
            $page_hero_bg_url = $hero_bg_global['url'];
        }
    }
}

if ($disable_global_hero_options && !$has_page_hero_acf) {
    return;
}

if ($page_hero_title === '' && $is_factory_template && function_exists('get_the_title')) {
    $page_hero_title = get_the_title();
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
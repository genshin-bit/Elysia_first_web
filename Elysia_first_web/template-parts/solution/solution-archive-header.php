<?php

defined('ABSPATH') || exit;

$context_id = get_queried_object_id();
$elysia_solution_archive_title = '';
$elysia_solution_archive_banner = null;

if (function_exists('get_field') && $context_id) {
    $elysia_solution_archive_title = (string) get_field('solution_list_title', $context_id);
    $elysia_solution_archive_banner = get_field('solution_archive_banner_image', $context_id);
}

if (!$elysia_solution_archive_title && $context_id) {
    $elysia_solution_archive_title = get_the_title($context_id);
}

if (!$elysia_solution_archive_title) {
    $elysia_solution_archive_title = __('Solution', 'elysia_first_web');
}

$elysia_solution_archive_link = '';

if ($context_id) {
    $elysia_solution_archive_link = get_permalink($context_id);
}

if (!$elysia_solution_archive_link) {
    $elysia_solution_archive_link = home_url('/');
}

$elysia_solution_banner_style = '';

if (is_array($elysia_solution_archive_banner) && !empty($elysia_solution_archive_banner['url'])) {
    $elysia_solution_banner_style = ' style="background-image: url(' . esc_url($elysia_solution_archive_banner['url']) . ');"';
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-1628106 ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="1628106" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" <?php echo $elysia_solution_banner_style; ?>>
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6f82e37" data-id="6f82e37" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-a8047da elementor-widget elementor-widget-breadcrumbs" data-id="a8047da" data-element_type="widget" data-widget_type="breadcrumbs.default">
                    <div class="elementor-widget-container">
                        <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
                            <p>
                                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                                <span class="separator"> - </span>
                                <span class="last"><?php echo esc_html($elysia_solution_archive_title); ?></span>
                            </p>
                        </nav>
                    </div>
                </div>
                <div class="elementor-element elementor-element-b375a23 elementor-widget elementor-widget-heading" data-id="b375a23" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_solution_archive_title); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
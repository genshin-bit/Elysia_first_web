<?php

defined('ABSPATH') || exit;

$elysia_solution_id = get_the_ID();
$elysia_solution_title = get_the_title($elysia_solution_id);
$elysia_solution_date = get_the_date('', $elysia_solution_id);
$elysia_solution_year = get_the_date('Y', $elysia_solution_id);
$elysia_solution_month = get_the_date('m', $elysia_solution_id);
$elysia_solution_day = get_the_date('d', $elysia_solution_id);
$elysia_solution_date_link = get_day_link($elysia_solution_year, $elysia_solution_month, $elysia_solution_day);
$elysia_solution_archive_link = '';

if (function_exists('get_post_type_archive_link')) {
    $elysia_solution_archive_link = get_post_type_archive_link('solution');
}

if (!$elysia_solution_archive_link) {
    $elysia_solution_archive_link = home_url('/');
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-cc82e42 ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="cc82e42" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d3532cf" data-id="d3532cf" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4c2746a elementor-widget elementor-widget-breadcrumbs" data-id="4c2746a" data-element_type="widget" data-widget_type="breadcrumbs.default">
                    <div class="elementor-widget-container">
                        <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
                            <p>
                                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                                <span class="separator"> - </span>
                                <a href="<?php echo esc_url($elysia_solution_archive_link); ?>">Solution</a>
                                <span class="separator"> - </span>
                                <span class="last"><?php echo esc_html($elysia_solution_title); ?></span>
                            </p>
                        </nav>
                    </div>
                </div>
                <div class="elementor-element elementor-element-0e792d2 elementor-widget elementor-widget-theme-post-title elementor-page-title elementor-widget-heading" data-id="0e792d2" data-element_type="widget" data-widget_type="theme-post-title.default">
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default"><?php echo esc_html($elysia_solution_title); ?></h1>
                    </div>
                </div>
                <div class="elementor-element elementor-element-565c8c2 elementor-widget elementor-widget-post-info" data-id="565c8c2" data-element_type="widget" data-widget_type="post-info.default">
                    <div class="elementor-widget-container">
                        <ul class="elementor-inline-items elementor-icon-list-items elementor-post-info">
                            <li class="elementor-icon-list-item elementor-repeater-item-b1bb850 elementor-inline-item" itemprop="datePublished">
                                <a href="<?php echo esc_url($elysia_solution_date_link); ?>">
                                    <span class="elementor-icon-list-text elementor-post-info__item elementor-post-info__item--type-date">
                                        <time><?php echo esc_html($elysia_solution_date); ?></time>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


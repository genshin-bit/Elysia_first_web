<?php
$elysia_show_toc = true;
if (function_exists('get_field')) {
    if (is_singular('post')) {
        $elysia_toc_enabled = get_field('blog_detail_toc_enabled');
        if ($elysia_toc_enabled === false || $elysia_toc_enabled === '0' || $elysia_toc_enabled === 0) {
            $elysia_show_toc = false;
        }
    }
    if (is_singular('solution')) {
        $elysia_solution_toc_enabled = get_field('solution_detail_show_toc');
        if ($elysia_solution_toc_enabled === false || $elysia_solution_toc_enabled === '0' || $elysia_solution_toc_enabled === 0) {
            $elysia_show_toc = false;
        }
    }
}
if (!$elysia_show_toc) {
    return;
}
?>
<div class="elementor-element elementor-element-45da380f elementor-hidden-tablet elementor-hidden-mobile elementor-toc--minimized-on-tablet elementor-widget elementor-widget-table-of-contents"
    data-id="45da380f" data-element_type="widget"
    data-settings="{&quot;headings_by_tags&quot;:[&quot;h2&quot;,&quot;h3&quot;],&quot;container&quot;:&quot;.elysia-article-content&quot;,&quot;exclude_headings_by_selector&quot;:[],&quot;marker_view&quot;:&quot;numbers&quot;,&quot;no_headings_message&quot;:&quot;No se ha encontrado ning\u00fan encabezado en esta p\u00e1gina.&quot;,&quot;minimize_box&quot;:&quot;yes&quot;,&quot;minimized_on&quot;:&quot;tablet&quot;,&quot;hierarchical_view&quot;:&quot;yes&quot;,&quot;min_height&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;min_height_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;min_height_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}"
    data-widget_type="table-of-contents.default">
    <div class="elementor-widget-container">
        <div class="elementor-toc__header">
            <h4 class="elementor-toc__header-title">
                Table of Contents
            </h4>
            <div class="elementor-toc__toggle-button elementor-toc__toggle-button--expand"
                role="button" tabindex="0" aria-controls="elementor-toc__45da380f"
                aria-expanded="true" aria-label="Abrir tabla de contenido">
                <i aria-hidden="true" class="fas fa-chevron-down"></i>
            </div>
            <div class="elementor-toc__toggle-button elementor-toc__toggle-button--collapse"
                role="button" tabindex="0" aria-controls="elementor-toc__45da380f"
                aria-expanded="true" aria-label="Cerrar tabla de contenidos">
                <i aria-hidden="true" class="fas fa-chevron-up"></i>
            </div>
        </div>
        <div id="elementor-toc__45da380f" class="elementor-toc__body">
            <div class="elementor-toc__spinner-container">
                <i class="elementor-toc__spinner eicon-animation-spin eicon-loading"
                    aria-hidden="true"></i>
            </div>
        </div>
    </div>
</div>

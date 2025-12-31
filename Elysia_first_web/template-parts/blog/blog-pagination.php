<?php
$elysia_paged = 1;
if (get_query_var('paged')) {
    $elysia_paged = (int) get_query_var('paged');
} elseif (get_query_var('page')) {
    $elysia_paged = (int) get_query_var('page');
}
$elysia_query = null;
if (isset($GLOBALS['elysia_blog_query']) && $GLOBALS['elysia_blog_query'] instanceof WP_Query) {
    $elysia_query = $GLOBALS['elysia_blog_query'];
} else {
    global $wp_query;
    $elysia_query = $wp_query;
}
if (!$elysia_query || $elysia_query->max_num_pages < 2) {
    return;
}
$elysia_total = (int) $elysia_query->max_num_pages;
$elysia_next_page = $elysia_paged + 1;
if ($elysia_next_page > $elysia_total) {
    $elysia_next_page = $elysia_total;
}
$elysia_links = paginate_links(
    array(
        'base' => str_replace(999999, '%#%', esc_url(get_pagenum_link(999999))),
        'format' => '?paged=%#%',
        'current' => max(1, $elysia_paged),
        'total' => $elysia_total,
        'type' => 'array',
        'prev_text' => '&laquo; Previous',
        'next_text' => 'Next &raquo;',
    )
);
if (empty($elysia_links)) {
    return;
}
?>
<div class="e-load-more-anchor" data-page="<?php echo esc_attr($elysia_paged); ?>" data-max-page="<?php echo esc_attr($elysia_total); ?>" data-next-page="<?php echo esc_url(get_pagenum_link($elysia_next_page)); ?>"></div>
<nav class="elementor-pagination" aria-label="Pagination">
    <?php
    foreach ($elysia_links as $elysia_link) {
        echo $elysia_link;
    }
    ?>
</nav>

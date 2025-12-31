<!-- 产品列表页：结果统计信息模块模板 -->
<div class="woo-listing-top">
    <?php
    $elysia_total = 0;
    $elysia_from = 0;
    $elysia_to = 0;
    $elysia_per_page = 0;

    $elysia_paged = max(1, (int) get_query_var('paged', 1));
    if (function_exists('elysia_get_product_list_paged')) {
        $elysia_paged = (int) elysia_get_product_list_paged();
    }

    if (function_exists('elysia_get_product_pages_query')) {
        $elysia_query = elysia_get_product_pages_query($elysia_paged, 12);
        if ($elysia_query instanceof WP_Query) {
            $elysia_total = (int) $elysia_query->found_posts;
            $elysia_per_page = (int) $elysia_query->get('posts_per_page');
        }
    }

    if ($elysia_total <= 0) {
        global $wp_query;
        if (isset($wp_query)) {
            $elysia_total = (int) $wp_query->found_posts;
            $elysia_per_page = (int) $wp_query->get('posts_per_page');
        }
    }

    if ($elysia_total > 0 && $elysia_per_page > 0) {
        $elysia_from = ($elysia_per_page * ($elysia_paged - 1)) + 1;
        $elysia_to = min($elysia_total, $elysia_per_page * $elysia_paged);
    } else {
        $elysia_from = 0;
        $elysia_to = $elysia_total;
    }
    ?>
    <p class="woocommerce-result-count ct-hidden-sm" role="alert" aria-relevant="all">
        <?php if ($elysia_total > 0 && $elysia_from > 0 && $elysia_to > 0) { ?>
            Showing <?php echo (int) $elysia_from; ?>&ndash;<?php echo (int) $elysia_to; ?> of <?php echo (int) $elysia_total; ?> results
        <?php } else { ?>
            Showing 0 results
        <?php } ?>
    </p>
</div>
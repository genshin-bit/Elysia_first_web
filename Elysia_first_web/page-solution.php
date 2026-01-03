<?php

/**
 * Template Name: 解决方案列表
 *
 * Migrated from swforming/index-13.html
 */

get_header();
?>

<link rel='stylesheet' id='blocksy-dynamic-global-css' href='<?php echo get_template_directory_uri(); ?>/static/css/global.css' media='all' />
<link rel='stylesheet' id='wp-block-library-css' href='<?php echo get_template_directory_uri(); ?>/static/css/style.min.css' media='all' />
<style id='wp-img-auto-sizes-contain-inline-css'>
    img:is([sizes=auto i], [sizes^="auto," i]) {
        contain-intrinsic-size: 3000px 1500px
    }

    /*# sourceURL=wp-img-auto-sizes-contain-inline-css */
</style>
<style id='global-styles-inline-css'>
    :root {
        --wp--preset--aspect-ratio--square: 1;
        --wp--preset--aspect-ratio--4-3: 4/3;
        --wp--preset--aspect-ratio--3-4: 3/4;
        --wp--preset--aspect-ratio--3-2: 3/2;
        --wp--preset--aspect-ratio--2-3: 2/3;
        --wp--preset--aspect-ratio--16-9: 16/9;
        --wp--preset--aspect-ratio--9-16: 9/16;
    }

    /* truncated from original global styles; visual layout handled by loaded CSS files */
</style>
<style id='woocommerce-inline-inline-css'>
    .woocommerce form .form-row .required {
        visibility: visible;
    }

    /*# sourceURL=woocommerce-inline-inline-css */
</style>
<link rel='stylesheet' id='trp-language-switcher-style-css' href='<?php echo get_template_directory_uri(); ?>/static/css/trp-language-switcher.css' media='all' />
<link rel='stylesheet' id='brands-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/brands.css' media='all' />
<link rel='stylesheet' id='parent-style-css' href='<?php echo get_template_directory_uri(); ?>/static/css/style.css' media='all' />
<link rel='stylesheet' id='ct-main-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/main.min.css' media='all' />
<link rel='stylesheet' id='ct-woocommerce-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/woocommerce.min.css' media='all' />
<link rel='stylesheet' id='blocksy-fonts-font-source-google-css' href='<?php echo get_template_directory_uri(); ?>/static/css/css2.css' media='all' />
<link rel='stylesheet' id='ct-page-title-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/page-title.min.css' media='all' />
<link rel='stylesheet' id='ct-elementor-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/elementor-frontend.min.css' media='all' />
<link rel='stylesheet' id='ct-elementor-woocommerce-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/elementor-woocommerce-frontend.min.css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css' href='<?php echo get_template_directory_uri(); ?>/static/css/frontend.min.css' media='all' />
<link rel='stylesheet' id='widget-heading-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-heading.min.css' media='all' />
<link rel='stylesheet' id='widget-image-gallery-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-image-gallery.min.css' media='all' />
<link rel='stylesheet' id='widget-image-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-image.min.css' media='all' />
<link rel='stylesheet' id='widget-icon-list-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-icon-list.min.css' media='all' />
<link rel='stylesheet' id='widget-social-icons-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-social-icons.min.css' media='all' />
<link rel='stylesheet' id='e-apple-webkit-css' href='<?php echo get_template_directory_uri(); ?>/static/css/apple-webkit.min.css' media='all' />
<link rel='stylesheet' id='e-sticky-css' href='<?php echo get_template_directory_uri(); ?>/static/css/sticky.min.css' media='all' />
<link rel='stylesheet' id='widget-loop-common-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-loop-common.min.css' media='all' />
<link rel='stylesheet' id='widget-loop-grid-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-loop-grid.min.css' media='all' />
<link rel='stylesheet' id='widget-video-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-video.min.css' media='all' />
<link rel='stylesheet' id='widget-woocommerce-products-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-woocommerce-products.min.css' media='all' />
<link rel='stylesheet' id='e-popup-css' href='<?php echo get_template_directory_uri(); ?>/static/css/popup.min.css' media='all' />
<link rel='stylesheet' id='elementor-icons-css' href='<?php echo get_template_directory_uri(); ?>/static/css/elementor-icons.min.css' media='all' />
<link rel='stylesheet' id='elementor-post-5-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-5.css' media='all' />
<link rel='stylesheet' id='elementor-post-442-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-442.css' media='all' />
<link rel='stylesheet' id='elementor-post-5259-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-5259.css' media='all' />
<link rel='stylesheet' id='elementor-post-2636-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-2636.css' media='all' />
<link rel='stylesheet' id='eael-general-css' href='<?php echo get_template_directory_uri(); ?>/static/css/general.min.css' media='all' />
<link rel='stylesheet' id='elementor-gf-local-roboto-css' href='<?php echo get_template_directory_uri(); ?>/static/css/roboto.css' media='all' />
<link rel='stylesheet' id='elementor-gf-local-robotoslab-css' href='<?php echo get_template_directory_uri(); ?>/static/css/robotoslab.css' media='all' />
<link rel='stylesheet' id='elementor-icons-shared-0-css' href='<?php echo get_template_directory_uri(); ?>/static/css/fontawesome.min.css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-solid-css' href='<?php echo get_template_directory_uri(); ?>/static/css/solid.min.css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-brands-css' href='<?php echo get_template_directory_uri(); ?>/static/css/brands.min.css' media='all' />

<script src="<?php echo get_template_directory_uri(); ?>/static/js/jquery.min.js" id="jquery-core-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/jquery-migrate.min.js" id="jquery-migrate-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/jquery.blockUI.min.js" id="wc-jquery-blockui-js" defer data-wp-strategy="defer"></script>
<script id="wc-add-to-cart-js-extra">
    var wc_add_to_cart_params = {
        "ajax_url": "/wp-admin/admin-ajax.php",
        "wc_ajax_url": "/?wc-ajax=%%endpoint%%",
        "i18n_view_cart": "View cart",
        "cart_url": "index.html",
        "is_cart": "",
        "cart_redirect_after_add": "no"
    };
    //# sourceURL=wc-add-to-cart-js-extra
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/add-to-cart.min.js" id="wc-add-to-cart-js" defer data-wp-strategy="defer"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/js.cookie.min.js" id="wc-js-cookie-js" defer data-wp-strategy="defer"></script>
<script id="woocommerce-js-extra">
    var woocommerce_params = {
        "ajax_url": "/wp-admin/admin-ajax.php",
        "wc_ajax_url": "/?wc-ajax=%%endpoint%%",
        "i18n_password_show": "Show password",
        "i18n_password_hide": "Hide password"
    };
    //# sourceURL=woocommerce-js-extra
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/woocommerce.min.js" id="woocommerce-js" defer data-wp-strategy="defer"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/trp-frontend-compatibility.js" id="trp-frontend-compatibility-js"></script>

<main id="main" class="site-main hfeed" itemscope="itemscope" itemtype="https://schema.org/CreativeWork">

    <div data-elementor-type="archive" data-elementor-id="5259" class="elementor elementor-5259 elementor-location-archive" data-elementor-post-type="elementor_library">
        <?php get_template_part('template-parts/solution/solution-archive-header'); ?>
        <?php get_template_part('template-parts/solution/layout-two-column-solution'); ?>
    </div>

</main>

<?php
get_footer();

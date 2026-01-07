<?php

/**
 * Template Name: why us
 * Why Us 页面模板（从 swforming/index-5.html 迁移）
 */
get_header();
?>

<link rel='stylesheet' id='blocksy-dynamic-global-css' href='<?php echo get_template_directory_uri(); ?>/static/css/global.css' media='all' />
<link rel='stylesheet' id='wp-block-library-css' href='<?php echo get_template_directory_uri(); ?>/static/css/style.min.css' media='all' />
<style id='wp-img-auto-sizes-contain-inline-css'>
    img:is([sizes=auto i], [sizes^="auto," i]) {
        contain-intrinsic-size: 3000px 1500px
    }
</style>
<style id='global-styles-inline-css'>
    :root {
        --wp--preset--aspect-ratio--square: 1;
        --wp--preset--aspect-ratio--4-3: 4/3;
        --wp--preset--aspect-ratio--3-4: 3/4;
        --wp--preset--aspect-ratio--3-2: 3/2;
        --wp--preset--aspect-ratio--2-3: 2/3;
        --wp--preset--aspect-ratio--16-9: 16/9;
    }
</style>
<style id='woocommerce-inline-inline-css'>
    .woocommerce form .form-row .required {
        visibility: visible;
    }
</style>
<link rel='stylesheet' id='trp-language-switcher-style-css' href='<?php echo get_template_directory_uri(); ?>/static/css/trp-language-switcher.css' media='all' />
<link rel='stylesheet' id='brands-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/brands.css' media='all' />
<link rel='stylesheet' id='parent-style-css' href='<?php echo get_template_directory_uri(); ?>/static/css/style.css' media='all' />
<link rel='stylesheet' id='ct-main-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/main.min.css' media='all' />
<link rel='stylesheet' id='ct-woocommerce-styles-css' href='<?php echo get_template_directory_uri(); ?>/static/css/woocommerce.min.css' media='all' />
<link rel='stylesheet' id='blocksy-fonts-font-source-google-css' href='<?php echo get_template_directory_uri(); ?>/static/css/css2.css' media='all' />
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
<link rel='stylesheet' id='e-popup-css' href='<?php echo get_template_directory_uri(); ?>/static/css/popup.min.css' media='all' />
<link rel='stylesheet' id='elementor-icons-css' href='<?php echo get_template_directory_uri(); ?>/static/css/elementor-icons.min.css' media='all' />
<link rel='stylesheet' id='elementor-post-5-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-5.css' media='all' />
<link rel='stylesheet' id='widget-divider-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-divider.min.css' media='all' />
<link rel='stylesheet' id='elementor-gf-local-roboto-css' href='<?php echo get_template_directory_uri(); ?>/static/css/roboto.css' media='all' />
<link rel='stylesheet' id='elementor-gf-local-robotoslab-css' href='<?php echo get_template_directory_uri(); ?>/static/css/robotoslab.css' media='all' />
<link rel='stylesheet' id='elementor-icons-shared-0-css' href='<?php echo get_template_directory_uri(); ?>/static/css/fontawesome.min.css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-solid-css' href='<?php echo get_template_directory_uri(); ?>/static/css/solid.min.css' media='all' />
<link rel='stylesheet' id='elementor-icons-fa-brands-css' href='<?php echo get_template_directory_uri(); ?>/static/css/brands.min.css' media='all' />
<link rel='stylesheet' id='widget-icon-box-css' href='<?php echo get_template_directory_uri(); ?>/static/css/widget-icon-box.min.css' media='all' />
<link rel='stylesheet' id='e-motion-fx-css' href='<?php echo get_template_directory_uri(); ?>/static/css/motion-fx.min.css' media='all' />
<link rel='stylesheet' id='elementor-post-188-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-188.css' media='all' />
<link rel='stylesheet' id='elementor-post-268-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-268.css' media='all' />
<link rel='stylesheet' id='elementor-post-442-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-442.css' media='all' />
<link rel='stylesheet' id='elementor-post-2636-css' href='<?php echo get_template_directory_uri(); ?>/static/css/post-2636.css' media='all' />
<link rel='stylesheet' id='eael-general-css' href='<?php echo get_template_directory_uri(); ?>/static/css/general.min.css' media='all' />

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
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/woocommerce.min.js" id="woocommerce-js" defer data-wp-strategy="defer"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/trp-frontend-compatibility.js" id="trp-frontend-compatibility-js"></script>

<script>
    window.okkiConfigs = window.okkiConfigs || [];

    function okkiAdd() {
        okkiConfigs.push(arguments);
    };
    okkiAdd("analytics", {
        siteId: "39166-9223",
        gId: "UA-238156102-34"
    });
</script>
<script async src="<?php echo get_template_directory_uri(); ?>/static/js/analyze.js"></script>

<main id="main" class="site-main hfeed">
    <div class="ct-container-full" data-content="normal">
        <article id="post-268" class="post-268 page type-page status-publish hentry">
            <div class="blocksy-woo-messages-default woocommerce-notices-wrapper">
                <div class="woocommerce"></div>
            </div>
            <div class="entry-content is-layout-constrained">
                <div data-elementor-type="wp-page" data-elementor-id="268" class="elementor elementor-268" data-elementor-post-type="page">
                    <div class="elementor elementor-188">
                        <?php
                        $why_us_hero_title = '';
                        if (function_exists('get_field')) {
                            $field_value = get_field('why_us_hero_title');
                            if ($field_value) {
                                $why_us_hero_title = (string) $field_value;
                            }
                        }
                        if ($why_us_hero_title === '' && function_exists('get_the_title')) {
                            $why_us_hero_title = get_the_title();
                        }
                        get_template_part(
                            'template-parts/components/page-hero-title',
                            null,
                            array(
                                'title' => $why_us_hero_title,
                            )
                        );
                        ?>
                    </div>
                    <?php
                    get_template_part('template-parts/one_page/why-us-intro');
                    get_template_part('template-parts/one_page/why-us-advantages-grid');
                    ?>
                </div>
            </div>
        </article>
    </div>
</main>

<?php
get_template_part('template-parts/one_page/shared-contact-popup');
?>
<script>
    const lazyloadRunObserver = () => {
        const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
        const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    let lazyloadBackground = entry.target;
                    if (lazyloadBackground) {
                        lazyloadBackground.classList.add('e-lazyloaded');
                    }
                    lazyloadBackgroundObserver.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: '200px 0px 200px 0px'
        });
        lazyloadBackgrounds.forEach((lazyloadBackground) => {
            lazyloadBackgroundObserver.observe(lazyloadBackground);
        });
    };
    const events = [
        'DOMContentLoaded',
        'elementor/lazyload/observe',
    ];
    events.forEach((event) => {
        document.addEventListener(event, lazyloadRunObserver);
    });
</script>

<?php
get_footer();

<?php

/**
 * functions.php
 * 注册主题能力、菜单、侧边栏；挂载/替换 Woo Hooks（不写业务结构）
 */

// 根据是否启用 WooCommerce 预留调整挂钩的位置（当前未做具体处理）
function elysia_first_web_adjust_woocommerce_hooks()
{
    if (!class_exists('WooCommerce')) {
        return;
    }
}

add_action('wp', 'elysia_first_web_adjust_woocommerce_hooks', 20);
// 输出站点 LOGO，如果未设置自定义 LOGO 则使用主题内置图片
function elysia_first_web_site_logo()
{
    if (function_exists('the_custom_logo') && has_custom_logo()) {
        the_custom_logo();
        return;
    }

?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-container" rel="home" itemprop="url">
        <img
            loading="lazy"
            width="322"
            height="123"
            src="<?php echo esc_url(get_template_directory_uri() . '/static/image/SUNWAY.png'); ?>"
            class="default-logo"
            alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
            decoding="async"
            srcset="https://swforming.com/wp-content/uploads/2022/08/SUNWAY.png 322w, https://swforming.com/wp-content/uploads/2022/08/SUNWAY-300x115.png 300w"
            sizes="(max-width: 322px) 100vw, 322px" />
    </a>
    <?php
}
// 注册主题需要的导航菜单位置
function elysia_first_web_setup()
{
    add_theme_support('post-thumbnails');
    register_nav_menus(
        array(
            'primary'         => __('Primary Menu', 'elysia_first_web'),
            'footer_category' => __('Footer Category Menu', 'elysia_first_web'),
            'footer_company'  => __('Footer Company Menu', 'elysia_first_web'),
        )
    );
}

add_action('after_setup_theme', 'elysia_first_web_setup');

function elysia_first_web_register_product_post_type()
{
    $labels = array(
        'name'               => _x('Products', 'Post Type General Name', 'elysia_first_web'),
        'singular_name'      => _x('Product', 'Post Type Singular Name', 'elysia_first_web'),
        'menu_name'          => __('Products', 'elysia_first_web'),
        'name_admin_bar'     => __('Product', 'elysia_first_web'),
        'add_new'            => __('Add New', 'elysia_first_web'),
        'add_new_item'       => __('Add New Product', 'elysia_first_web'),
        'edit_item'          => __('Edit Product', 'elysia_first_web'),
        'new_item'           => __('New Product', 'elysia_first_web'),
        'view_item'          => __('View Product', 'elysia_first_web'),
        'search_items'       => __('Search Products', 'elysia_first_web'),
        'not_found'          => __('No products found', 'elysia_first_web'),
        'not_found_in_trash' => __('No products found in Trash', 'elysia_first_web'),
    );

    $args = array(
        'label'               => __('Product', 'elysia_first_web'),
        'labels'              => $labels,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-cart',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive'         => false,
        'rewrite'             => array(
            'slug'       => 'products',
            'with_front' => false,
        ),
        'show_in_rest'        => true,
    );

    register_post_type('site_product', $args);
}

add_action('init', 'elysia_first_web_register_product_post_type');

function elysia_first_web_register_product_category_taxonomy()
{
    $labels = array(
        'name'              => __('Product Categories', 'elysia_first_web'),
        'singular_name'     => __('Product Category', 'elysia_first_web'),
        'search_items'      => __('Search Product Categories', 'elysia_first_web'),
        'all_items'         => __('All Product Categories', 'elysia_first_web'),
        'parent_item'       => __('Parent Product Category', 'elysia_first_web'),
        'parent_item_colon' => __('Parent Product Category:', 'elysia_first_web'),
        'edit_item'         => __('Edit Product Category', 'elysia_first_web'),
        'update_item'       => __('Update Product Category', 'elysia_first_web'),
        'add_new_item'      => __('Add New Product Category', 'elysia_first_web'),
        'new_item_name'     => __('New Product Category Name', 'elysia_first_web'),
        'menu_name'         => __('Product Categories', 'elysia_first_web'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array(
            'slug'         => 'product-category',
            'hierarchical' => true,
        ),
        'show_in_rest'      => true,
    );

    register_taxonomy('product_category', array('site_product'), $args);
}

add_action('init', 'elysia_first_web_register_product_category_taxonomy');

function elysia_first_web_product_single_template($single)
{
    global $post;

    if ($post && $post->post_type === 'site_product') {
        $template = get_theme_file_path('woocommerce/single-product.php');
        if (file_exists($template)) {
            return $template;
        }
    }

    return $single;
}

add_filter('single_template', 'elysia_first_web_product_single_template');

// 获取社交媒体链接配置（若未配置则使用默认值）
function elysia_first_web_get_social_links()
{
    return array(
        'facebook'  => get_option('elysia_social_facebook', 'https://www.facebook.com/wuxisunway'),
        'youtube'   => get_option('elysia_social_youtube', 'https://www.youtube.com/@sunwayforming'),
        'instagram' => get_option('elysia_social_instagram', 'https://www.instagram.com/wuxisunway/'),
    );
}
// 获取页脚联系方式配置（电话、邮箱、地址）
function elysia_first_web_get_footer_contacts()
{
    return array(
        'phone'   => get_option('elysia_footer_phone', '+86-13616182007'),
        'email'   => get_option('elysia_footer_email', 'info@example.com'),
        'address' => get_option('elysia_footer_address', 'Wuxi, China'),
    );
}
// 输出页脚图标列表菜单（用于 Elementor 图标列表）
function elysia_first_web_render_footer_icon_menu($location)
{
    if (!has_nav_menu($location)) {
        return;
    }

    $locations = get_nav_menu_locations();

    if (empty($locations[$location])) {
        return;
    }

    $menu_id = $locations[$location];
    $items   = wp_get_nav_menu_items($menu_id);

    if (empty($items)) {
        return;
    }

    foreach ($items as $item) {
        if ((int) $item->menu_item_parent !== 0) {
            continue;
        }

        $url   = $item->url;
        $title = $item->title;

    ?>
        <li class="elementor-icon-list-item">
            <a href="<?php echo esc_url($url); ?>">
                <span class="elementor-icon-list-text"><?php echo esc_html($title); ?></span>
            </a>
        </li>
    <?php
    }
}

// 注册 ACF 的主题通用设置页（Options Page）
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' => 'Theme Options',
            'menu_title' => 'Theme Options',
            'menu_slug'  => 'acf-options',
            'capability' => 'edit_posts',
            'redirect'   => false,
        )
    );
    acf_add_options_page(
        array(
            'page_title' => 'Blog Detail Options',
            'menu_title' => 'Blog Detail Options',
            'menu_slug'  => 'acf-blog-detail-options',
            'capability' => 'edit_posts',
            'redirect'   => false,
        )
    );
}
// 注册所有依赖 ACF 的字段组（全局产品模块配置）
if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_product_archive_filter',
            'title' => 'Product Archive Filter',
            'fields' => array(
                array(
                    'key' => 'field_elysia_product_filter_main_category',
                    'label' => '产品大类',
                    'name' => 'elysia_product_filter_main_category',
                    'type' => 'select',
                    'choices' => array(),
                    'allow_null' => 1,
                    'multiple' => 0,
                    'ui' => 1,
                    'return_format' => 'value',
                    'wrapper' => array(
                        'width' => '50',
                    ),
                ),
                array(
                    'key' => 'field_elysia_product_filter_sub_category',
                    'label' => '产品小类',
                    'name' => 'elysia_product_filter_sub_category',
                    'type' => 'select',
                    'choices' => array(),
                    'allow_null' => 1,
                    'multiple' => 0,
                    'ui' => 1,
                    'return_format' => 'value',
                    'wrapper' => array(
                        'width' => '50',
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
                array(
                    array(
                        'param' => 'taxonomy',
                        'operator' => '==',
                        'value' => 'category',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_product_archive_intro_cta',
            'title' => 'Product Archive Intro & CTA',
            'fields' => array(
                array(
                    'key' => 'field_elysia_product_archive_subtitle',
                    'label' => '列表副标题',
                    'name' => 'elysia_product_archive_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_product_archive_intro_paragraph_1',
                    'label' => '介绍文案一',
                    'name' => 'elysia_product_archive_intro_paragraph_1',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_elysia_product_archive_intro_paragraph_2',
                    'label' => '介绍文案二',
                    'name' => 'elysia_product_archive_intro_paragraph_2',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_elysia_product_archive_cta_label',
                    'label' => '主按钮文字',
                    'name' => 'elysia_product_archive_cta_label',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_product_archive_cta_page',
                    'label' => '主按钮链接页面',
                    'name' => 'elysia_product_archive_cta_page',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                ),
                array(
                    'key' => 'field_elysia_product_archive_cta_action_url',
                    'label' => '主按钮自定义链接',
                    'name' => 'elysia_product_archive_cta_action_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_elysia_product_archive_catalog_file',
                    'label' => '目录 PDF 文件',
                    'name' => 'elysia_product_archive_catalog_file',
                    'type' => 'file',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_elysia_product_archive_catalog_url',
                    'label' => '目录链接地址',
                    'name' => 'elysia_product_archive_catalog_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_elysia_product_archive_catalog_label',
                    'label' => '目录按钮文字',
                    'name' => 'elysia_product_archive_catalog_label',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_product_archive_video_url',
                    'label' => '介绍视频地址',
                    'name' => 'elysia_product_archive_video_url',
                    'type' => 'url',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'woocommerce/archive-product.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_factory_gallery',
            'title' => 'Factory Gallery',
            'fields' => array(
                array(
                    'key' => 'field_elysia_factory_gallery_title',
                    'label' => '图集标题',
                    'name' => 'elysia_factory_gallery_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_factory_gallery_images',
                    'label' => '图集图片',
                    'name' => 'elysia_factory_gallery_images',
                    'type' => 'gallery',
                    'return_format' => 'array',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'woocommerce/archive-product.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_why_sunway',
            'title' => 'Why Sunway Section',
            'fields' => array(
                array(
                    'key' => 'field_elysia_why_sunway_title',
                    'label' => '区块标题',
                    'name' => 'elysia_why_sunway_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_why_sunway_subtitle',
                    'label' => '区块副标题',
                    'name' => 'elysia_why_sunway_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_why_sunway_intro',
                    'label' => '区块介绍文案',
                    'name' => 'elysia_why_sunway_intro',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_elysia_why_sunway_features',
                    'label' => '优势列表',
                    'name' => 'elysia_why_sunway_features',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => 'Add Feature',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_elysia_why_sunway_feature_text',
                            'label' => '优势文案',
                            'name' => 'elysia_why_sunway_feature_text',
                            'type' => 'text',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_elysia_why_sunway_stat_1_number',
                    'label' => '统计一数值',
                    'name' => 'elysia_why_sunway_stat_1_number',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_why_sunway_stat_1_label',
                    'label' => '统计一说明',
                    'name' => 'elysia_why_sunway_stat_1_label',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_why_sunway_stat_2_number',
                    'label' => '统计二数值',
                    'name' => 'elysia_why_sunway_stat_2_number',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_why_sunway_stat_2_label',
                    'label' => '统计二说明',
                    'name' => 'elysia_why_sunway_stat_2_label',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_why_sunway_button_url',
                    'label' => '按钮链接',
                    'name' => 'elysia_why_sunway_button_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_elysia_why_sunway_button_label',
                    'label' => '按钮文字',
                    'name' => 'elysia_why_sunway_button_label',
                    'type' => 'text',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'woocommerce/archive-product.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_contact_us_zoho',
            'title' => 'Contact Us Zoho Form',
            'fields' => array(
                array(
                    'key' => 'field_elysia_product_archive_contact_title',
                    'label' => '联系区块标题',
                    'name' => 'elysia_product_archive_contact_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_zoho_form_perma',
                    'label' => 'Zoho formperma',
                    'name' => 'elysia_zoho_form_perma',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_elysia_zoho_form_iframe_height',
                    'label' => 'Zoho iframe 高度',
                    'name' => 'elysia_zoho_form_iframe_height',
                    'type' => 'number',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'woocommerce/archive-product.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_c_purlin_faq',
            'title' => 'C Purlin FAQ',
            'fields' => array(
                array(
                    'key' => 'field_elysia_c_purlin_faq_items',
                    'label' => 'FAQ 列表',
                    'name' => 'elysia_c_purlin_faq_items',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => 'Add FAQ',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_elysia_c_purlin_faq_question',
                            'label' => '问题',
                            'name' => 'elysia_c_purlin_faq_question',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_elysia_c_purlin_faq_answer',
                            'label' => '回答',
                            'name' => 'elysia_c_purlin_faq_answer',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'woocommerce/archive-product.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_product_hero_summary',
            'title' => 'Product Hero Summary',
            'fields' => array(
                array(
                    'key' => 'field_product_subtitle',
                    'label' => '产品副标题',
                    'name' => 'product_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_hero_short_description',
                    'label' => '顶部简介',
                    'name' => 'hero_short_description',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_hero_highlight_list',
                    'label' => '关键参数列表',
                    'name' => 'hero_highlight_list',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => 'Add Item',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_hero_highlight_label',
                            'label' => '标签',
                            'name' => 'label',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_hero_highlight_value',
                            'label' => '内容',
                            'name' => 'value',
                            'type' => 'text',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'site_product',
                    ),
                ),
            ),
        )
    );

    function elysia_load_product_filter_main_category_field($field)
    {
        if (!isset($field['name']) || $field['name'] !== 'elysia_product_filter_main_category') {
            return $field;
        }

        $field['choices'] = array();

        $terms = get_terms(
            array(
                'taxonomy'   => 'product_category',
                'hide_empty' => false,
                'parent'     => 0,
                'orderby'    => 'name',
                'order'      => 'ASC',
            )
        );

        if (!is_wp_error($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                $field['choices'][$term->slug] = $term->name;
            }
        }

        return $field;
    }

    add_filter('acf/load_field/name=elysia_product_filter_main_category', 'elysia_load_product_filter_main_category_field');

    function elysia_load_product_filter_sub_category_field($field)
    {
        if (!isset($field['name']) || $field['name'] !== 'elysia_product_filter_sub_category') {
            return $field;
        }

        $field['choices'] = array();

        $current_post_id = 0;

        if (isset($_GET['post'])) {
            $current_post_id = (int) $_GET['post'];
        } elseif (isset($_POST['post_ID'])) {
            $current_post_id = (int) $_POST['post_ID'];
        } elseif (function_exists('get_the_ID')) {
            $current_post_id = (int) get_the_ID();
        }

        $parent_slug = '';

        if ($current_post_id && function_exists('get_field')) {
            $main_category_value = get_field('elysia_product_filter_main_category', $current_post_id);
            if ($main_category_value) {
                $parent_slug = $main_category_value;

                $legacy_main_category_map = array(
                    'electric_energy'             => 'electric-energy',
                    'racking_shelving'            => 'racking-shelving',
                    'steel_structure'             => 'steel-structure',
                    'metal_wall_roofing'          => 'metal-wall-roofing',
                    'highway_engineering_vehicle' => 'highway-engineering-vehicle',
                    'door_windows'                => 'door-windows',
                    'other'                       => 'other',
                );

                if (isset($legacy_main_category_map[$main_category_value])) {
                    $parent_slug = $legacy_main_category_map[$main_category_value];
                }
            }
        }

        if (!$parent_slug) {
            return $field;
        }

        $parent_term = get_term_by('slug', $parent_slug, 'product_category');
        if (!$parent_term || is_wp_error($parent_term)) {
            return $field;
        }

        $terms = get_terms(
            array(
                'taxonomy'   => 'product_category',
                'hide_empty' => false,
                'parent'     => (int) $parent_term->term_id,
                'orderby'    => 'name',
                'order'      => 'ASC',
            )
        );

        if (!is_wp_error($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                $field['choices'][$term->slug] = $term->name;
            }
        }

        return $field;
    }

    add_filter('acf/load_field/name=elysia_product_filter_sub_category', 'elysia_load_product_filter_sub_category_field');

    acf_add_local_field_group(
        array(
            'key' => 'group_product_usp_icons',
            'title' => 'Product USP Icons',
            'fields' => array(
                array(
                    'key' => 'field_usp_icons',
                    'label' => 'USP 图标列表',
                    'name' => 'usp_icons',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => 'Add USP',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_usp_icon_type',
                            'label' => '图标类型',
                            'name' => 'icon_type',
                            'type' => 'select',
                            'choices' => array(
                                'svg' => 'SVG',
                                'image' => 'Image',
                                'icon_class' => 'Icon Class',
                            ),
                            'allow_null' => 1,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value',
                        ),
                        array(
                            'key' => 'field_usp_icon_svg',
                            'label' => 'SVG 代码',
                            'name' => 'icon_svg',
                            'type' => 'textarea',
                            'rows' => 5,
                        ),
                        array(
                            'key' => 'field_usp_icon_image',
                            'label' => '图标图片',
                            'name' => 'icon_image',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                        ),
                        array(
                            'key' => 'field_usp_icon_class',
                            'label' => '图标 Class',
                            'name' => 'icon_class',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_usp_icon_title',
                            'label' => '标题',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_usp_icon_description',
                            'label' => '描述',
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 3,
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'site_product',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_product_faqs',
            'title' => 'Product FAQs',
            'fields' => array(
                array(
                    'key' => 'field_product_faq_title',
                    'label' => 'FAQ 标题',
                    'name' => 'faq_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_product_faq_items',
                    'label' => 'FAQ 列表',
                    'name' => 'faq_items',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => 'Add FAQ',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_product_faq_question',
                            'label' => '问题',
                            'name' => 'question',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_product_faq_answer',
                            'label' => '回答',
                            'name' => 'answer',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'site_product',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_product_inquiry_section',
            'title' => 'Product Inquiry Section',
            'fields' => array(
                array(
                    'key' => 'field_inquiry_section_title',
                    'label' => 'Inquiry 标题',
                    'name' => 'inquiry_section_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_inquiry_section_intro',
                    'label' => 'Inquiry 说明',
                    'name' => 'inquiry_section_intro',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ),
                array(
                    'key' => 'field_inquiry_section_button_text',
                    'label' => '按钮文字',
                    'name' => 'inquiry_section_button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_inquiry_section_button_link',
                    'label' => '按钮链接',
                    'name' => 'inquiry_section_button_link',
                    'type' => 'text',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'site_product',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_product_sidebar_inquiry_card',
            'title' => 'Product Sidebar Inquiry Card',
            'fields' => array(
                array(
                    'key' => 'field_sidebar_inquiry_title',
                    'label' => '侧边 Inquiry 标题',
                    'name' => 'sidebar_inquiry_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sidebar_inquiry_text',
                    'label' => '侧边 Inquiry 文案',
                    'name' => 'sidebar_inquiry_text',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_sidebar_inquiry_button_text',
                    'label' => '侧边按钮文字',
                    'name' => 'sidebar_inquiry_button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sidebar_inquiry_button_link',
                    'label' => '侧边按钮链接',
                    'name' => 'sidebar_inquiry_button_link',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sidebar_inquiry_icon_svg',
                    'label' => '侧边图标 SVG',
                    'name' => 'sidebar_inquiry_icon_svg',
                    'type' => 'textarea',
                    'rows' => 6,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'site_product',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_product_related_products',
            'title' => 'Product Related Products',
            'fields' => array(
                array(
                    'key' => 'field_related_products',
                    'label' => '相关产品',
                    'name' => 'related_products',
                    'type' => 'relationship',
                    'post_type' => array('site_product', 'page', 'post'),
                    'filters' => array('search', 'post_type', 'taxonomy'),
                    'return_format' => 'object',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'site_product',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_product_detail_content',
            'title' => 'Product Detail Content',
            'fields' => array(
                array(
                    'key' => 'field_product_tabs_content',
                    'label' => '详情内容',
                    'name' => 'product_tabs_content',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_elysia_product_gallery',
                    'label' => '产品画廊',
                    'name' => 'elysia_product_gallery',
                    'type' => 'gallery',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'site_product',
                    ),
                ),
            ),
        )
    );

    /**
     * 获取使用“产品详情”模板的页面查询，用于产品列表页统一读取产品数据。
     *
     * @param int $paged
     * @param int $per_page
     *
     * @return WP_Query
     */
    function elysia_get_product_pages_query($paged = 1, $per_page = 12)
    {
        $paged = max(1, (int) $paged);
        $per_page = max(1, (int) $per_page);

        $args = array(
            'post_type'      => 'site_product',
            'post_status'    => 'publish',
            'posts_per_page' => $per_page,
            'paged'          => $paged,
        );

        $current_page_id = get_queried_object_id();
        if ($current_page_id && function_exists('get_field')) {
            $sub_category_value = get_field('elysia_product_filter_sub_category', $current_page_id);
            $main_category_value = get_field('elysia_product_filter_main_category', $current_page_id);

            $legacy_main_category_map = array(
                'electric_energy'             => 'electric-energy',
                'racking_shelving'            => 'racking-shelving',
                'steel_structure'             => 'steel-structure',
                'metal_wall_roofing'          => 'metal-wall-roofing',
                'highway_engineering_vehicle' => 'highway-engineering-vehicle',
                'door_windows'                => 'door-windows',
                'other'                       => 'other',
            );

            $category_slug = '';

            if ($sub_category_value) {
                $category_slug = $sub_category_value;

                if (isset($legacy_main_category_map[$sub_category_value])) {
                    $category_slug = $legacy_main_category_map[$sub_category_value];
                }
            } elseif ($main_category_value) {
                $category_slug = $main_category_value;

                if (isset($legacy_main_category_map[$main_category_value])) {
                    $category_slug = $legacy_main_category_map[$main_category_value];
                }
            }

            if ($category_slug) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_category',
                        'field'    => 'slug',
                        'terms'    => $category_slug,
                    ),
                );
            }
        }

        return new WP_Query($args);
    }

    /**
     * 根据当前查询环境获取产品列表用的分页页码。
     *
     * @return int
     */
    function elysia_get_product_list_paged()
    {
        if (get_query_var('paged')) {
            return (int) get_query_var('paged');
        }
        if (get_query_var('page')) {
            return (int) get_query_var('page');
        }
        return 1;
    }

    function elysia_get_product_subcategories_ajax()
    {
        if (!current_user_can('edit_posts')) {
            wp_send_json_error();
        }

        $parent_slug = isset($_POST['parent_slug']) ? sanitize_text_field(wp_unslash($_POST['parent_slug'])) : '';

        if (!$parent_slug) {
            wp_send_json_success(array());
        }

        $legacy_main_category_map = array(
            'electric_energy'             => 'electric-energy',
            'racking_shelving'            => 'racking-shelving',
            'steel_structure'             => 'steel-structure',
            'metal_wall_roofing'          => 'metal-wall-roofing',
            'highway_engineering_vehicle' => 'highway-engineering-vehicle',
            'door_windows'                => 'door-windows',
            'other'                       => 'other',
        );

        if (isset($legacy_main_category_map[$parent_slug])) {
            $parent_slug = $legacy_main_category_map[$parent_slug];
        }

        $parent_term = get_term_by('slug', $parent_slug, 'product_category');

        if (!$parent_term || is_wp_error($parent_term)) {
            wp_send_json_success(array());
        }

        $terms = get_terms(
            array(
                'taxonomy'   => 'product_category',
                'hide_empty' => false,
                'parent'     => (int) $parent_term->term_id,
                'orderby'    => 'name',
                'order'      => 'ASC',
            )
        );

        $result = array();

        if (!is_wp_error($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                $result[$term->slug] = $term->name;
            }
        }

        wp_send_json_success($result);
    }

    add_action('wp_ajax_elysia_get_product_subcategories', 'elysia_get_product_subcategories_ajax');

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_blog_archive_settings',
            'title' => 'Blog Archive Settings',
            'fields' => array(
                array(
                    'key' => 'field_blog_hero_title',
                    'label' => 'Hero 标题',
                    'name' => 'blog_hero_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_blog_hero_subtitle',
                    'label' => 'Hero 副标题',
                    'name' => 'blog_hero_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_blog_hero_background_image',
                    'label' => 'Hero 背景图',
                    'name' => 'blog_hero_background_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_blog_main_query_posts_per_page',
                    'label' => '每页文章数',
                    'name' => 'blog_main_query_posts_per_page',
                    'type' => 'number',
                    'default_value' => 10,
                    'min' => 1,
                ),
                array(
                    'key' => 'field_blog_main_query_category',
                    'label' => '主列表分类筛选',
                    'name' => 'blog_main_query_category',
                    'type' => 'taxonomy',
                    'taxonomy' => 'category',
                    'field_type' => 'multi_select',
                    'allow_null' => 1,
                    'add_term' => 0,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'return_format' => 'id',
                ),
                array(
                    'key' => 'field_blog_sidebar_latest_title',
                    'label' => '侧边最新文章标题',
                    'name' => 'blog_sidebar_latest_title',
                    'type' => 'text',
                    'default_value' => 'New Update',
                ),
                array(
                    'key' => 'field_blog_sidebar_latest_posts_count',
                    'label' => '侧边最新文章数量',
                    'name' => 'blog_sidebar_latest_posts_count',
                    'type' => 'number',
                    'default_value' => 4,
                    'min' => 1,
                ),
                array(
                    'key' => 'field_blog_sidebar_latest_category',
                    'label' => '侧边最新文章分类',
                    'name' => 'blog_sidebar_latest_category',
                    'type' => 'taxonomy',
                    'taxonomy' => 'category',
                    'field_type' => 'multi_select',
                    'allow_null' => 1,
                    'add_term' => 0,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'return_format' => 'id',
                ),
                array(
                    'key' => 'field_blog_sidebar_share_title',
                    'label' => '侧边分享标题',
                    'name' => 'blog_sidebar_share_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_blog_cta_divider_text',
                    'label' => 'CTA 分割线文字',
                    'name' => 'blog_cta_divider_text',
                    'type' => 'text',
                    'default_value' => 'Start Our Business Now',
                ),
                array(
                    'key' => 'field_blog_cta_title',
                    'label' => 'CTA 标题',
                    'name' => 'blog_cta_title',
                    'type' => 'text',
                    'default_value' => 'Get In Touch With Sunway',
                ),
                array(
                    'key' => 'field_blog_cta_button_label',
                    'label' => 'CTA 按钮文字',
                    'name' => 'blog_cta_button_label',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_blog_cta_button_link',
                    'label' => 'CTA 按钮链接',
                    'name' => 'blog_cta_button_link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_blog_popular_divider_text',
                    'label' => '热门文章分割线文字',
                    'name' => 'blog_popular_divider_text',
                    'type' => 'text',
                    'default_value' => 'On Trend',
                ),
                array(
                    'key' => 'field_blog_popular_title',
                    'label' => '热门文章标题',
                    'name' => 'blog_popular_title',
                    'type' => 'text',
                    'default_value' => 'Most Popular Stories',
                ),
                array(
                    'key' => 'field_blog_popular_posts',
                    'label' => '热门文章',
                    'name' => 'blog_popular_posts',
                    'type' => 'relationship',
                    'post_type' => array('post'),
                    'filters' => array('search', 'taxonomy'),
                    'return_format' => 'object',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-blog.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_blog_global_options',
            'title' => 'Blog Global Options',
            'fields' => array(
                array(
                    'key' => 'field_blog_global_hero_title',
                    'label' => '全局 Hero 标题',
                    'name' => 'blog_global_hero_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_blog_global_sidebar_share_title',
                    'label' => '全局分享标题',
                    'name' => 'blog_global_sidebar_share_title',
                    'type' => 'text',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_blog_detail_post_fields',
            'title' => 'Blog Detail Settings',
            'fields' => array(
                array(
                    'key' => 'field_blog_detail_custom_hero_title',
                    'label' => '自定义 Hero 标题',
                    'name' => 'blog_detail_custom_hero_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_blog_detail_hero_subtitle',
                    'label' => 'Hero 副标题',
                    'name' => 'blog_detail_hero_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_blog_detail_hero_background',
                    'label' => 'Hero 背景图',
                    'name' => 'blog_detail_hero_background',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_blog_detail_toc_enabled',
                    'label' => '启用目录',
                    'name' => 'blog_detail_toc_enabled',
                    'type' => 'true_false',
                    'ui' => 1,
                    'default_value' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_blog_detail_global_options',
            'title' => 'Blog Detail Global Options',
            'fields' => array(
                array(
                    'key' => 'field_blog_detail_sidebar_latest_title',
                    'label' => '侧边最新文章标题',
                    'name' => 'blog_detail_sidebar_latest_title',
                    'type' => 'text',
                    'default_value' => 'New Update',
                ),
                array(
                    'key' => 'field_blog_detail_sidebar_latest_count',
                    'label' => '侧边最新文章数量',
                    'name' => 'blog_detail_sidebar_latest_count',
                    'type' => 'number',
                    'default_value' => 4,
                    'min' => 1,
                ),
                array(
                    'key' => 'field_blog_detail_sidebar_latest_category',
                    'label' => '侧边最新文章分类',
                    'name' => 'blog_detail_sidebar_latest_category',
                    'type' => 'taxonomy',
                    'taxonomy' => 'category',
                    'field_type' => 'multi_select',
                    'allow_null' => 1,
                    'add_term' => 0,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'return_format' => 'id',
                ),
                array(
                    'key' => 'field_blog_detail_contact_divider_text',
                    'label' => '联系区分割线文字',
                    'name' => 'blog_detail_contact_divider_text',
                    'type' => 'text',
                    'default_value' => 'Strat Our Business Now',
                ),
                array(
                    'key' => 'field_blog_detail_contact_title',
                    'label' => '联系区标题',
                    'name' => 'blog_detail_contact_title',
                    'type' => 'text',
                    'default_value' => 'Get In Touch With Sunway',
                ),
                array(
                    'key' => 'field_blog_detail_contact_form_embed',
                    'label' => '联系表单嵌入代码',
                    'name' => 'blog_detail_contact_form_embed',
                    'type' => 'textarea',
                    'rows' => 6,
                ),
                array(
                    'key' => 'field_blog_detail_share_title',
                    'label' => '分享模块标题',
                    'name' => 'blog_detail_share_title',
                    'type' => 'text',
                    'default_value' => '分享此文章：',
                ),
                array(
                    'key' => 'field_blog_detail_prev_label',
                    'label' => '上一篇标签文案',
                    'name' => 'blog_detail_prev_label',
                    'type' => 'text',
                    'default_value' => 'Previous',
                ),
                array(
                    'key' => 'field_blog_detail_related_badge',
                    'label' => '相关文章分割线文字',
                    'name' => 'blog_detail_related_badge',
                    'type' => 'text',
                    'default_value' => 'On Key',
                ),
                array(
                    'key' => 'field_blog_detail_related_title',
                    'label' => '相关文章标题',
                    'name' => 'blog_detail_related_title',
                    'type' => 'text',
                    'default_value' => 'Related Posts',
                ),
                array(
                    'key' => 'field_blog_detail_related_count',
                    'label' => '相关文章数量',
                    'name' => 'blog_detail_related_count',
                    'type' => 'number',
                    'default_value' => 4,
                    'min' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-blog-detail-options',
                    ),
                ),
            ),
        )
    );
}

function elysia_get_blog_detail_latest_posts($limit = 0)
{
    if ($limit <= 0 && function_exists('get_field')) {
        $count_field = get_field('blog_detail_sidebar_latest_count', 'option');
        if ($count_field) {
            $limit = (int) $count_field;
        }
    }
    if ($limit <= 0) {
        $limit = 4;
    }
    $category_ids = array();
    if (function_exists('get_field')) {
        $categories_field = get_field('blog_detail_sidebar_latest_category', 'option');
        if (is_array($categories_field) && !empty($categories_field)) {
            $category_ids = array_map('intval', $categories_field);
        }
    }
    $cache_key_parts = array('elysia_blog_detail_latest', $limit);
    if (!empty($category_ids)) {
        $cache_key_parts[] = implode('_', $category_ids);
    }
    $cache_key = implode('_', $cache_key_parts);
    $cached = wp_cache_get($cache_key, 'theme_cache');
    if ($cached !== false) {
        return $cached;
    }
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $limit,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    if (!empty($category_ids)) {
        $args['category__in'] = $category_ids;
    }
    $posts = get_posts($args);
    wp_cache_set($cache_key, $posts, 'theme_cache', HOUR_IN_SECONDS);
    return $posts;
}

function elysia_get_blog_detail_contact_texts()
{
    $divider = 'Strat Our Business Now';
    $title = 'Get In Touch With Sunway';
    $embed = '';
    if (function_exists('get_field')) {
        $divider_field = get_field('blog_detail_contact_divider_text', 'option');
        if ($divider_field) {
            $divider = $divider_field;
        }
        $title_field = get_field('blog_detail_contact_title', 'option');
        if ($title_field) {
            $title = $title_field;
        }
        $embed_field = get_field('blog_detail_contact_form_embed', 'option');
        if ($embed_field) {
            $embed = $embed_field;
        }
    }
    return array(
        'divider' => $divider,
        'title' => $title,
        'embed' => $embed,
    );
}

function elysia_get_blog_detail_related_posts($post_id = 0, $limit = 0)
{
    $post_id = (int) $post_id;
    if ($post_id <= 0) {
        $post_id = get_the_ID();
    }
    if ($post_id <= 0) {
        return array();
    }
    if ($limit <= 0 && function_exists('get_field')) {
        $count_field = get_field('blog_detail_related_count', 'option');
        if ($count_field) {
            $limit = (int) $count_field;
        }
    }
    if ($limit <= 0) {
        $limit = 4;
    }
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $limit,
        'post__not_in' => array($post_id),
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $category_ids = wp_get_post_terms($post_id, 'category', array('fields' => 'ids'));
    if (!is_wp_error($category_ids) && !empty($category_ids)) {
        $args['category__in'] = array_map('intval', $category_ids);
    }
    $related = get_posts($args);
    if (empty($related)) {
        $related = get_posts(
            array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $limit,
                'post__not_in' => array($post_id),
                'orderby' => 'date',
                'order' => 'DESC',
            )
        );
    }
    return $related;
}

function elysia_register_article_admin_menu()
{
    add_menu_page(
        __('Article Management', 'elysia_first_web'),
        __('文章管理', 'elysia_first_web'),
        'edit_posts',
        'elysia-article-management',
        'elysia_render_article_management_page',
        'dashicons-admin-post',
        5
    );
    add_submenu_page(
        'elysia-article-management',
        __('Add New Article', 'elysia_first_web'),
        __('添加新文章', 'elysia_first_web'),
        'edit_posts',
        'post-new.php'
    );
    add_submenu_page(
        'elysia-article-management',
        __('All Articles', 'elysia_first_web'),
        __('所有文章', 'elysia_first_web'),
        'edit_posts',
        'edit.php'
    );
}

add_action('admin_menu', 'elysia_register_article_admin_menu');

function elysia_render_article_management_page()
{
    if (!current_user_can('edit_posts')) {
        return;
    }
    $add_new_url = admin_url('post-new.php');
    $list_url = admin_url('edit.php');
    echo '<div class="wrap">';
    echo '<h1>' . esc_html__('文章管理', 'elysia_first_web') . '</h1>';
    echo '<p><a href="' . esc_url($add_new_url) . '" class="page-title-action">' . esc_html__('添加新文章', 'elysia_first_web') . '</a></p>';
    echo '<p><a href="' . esc_url($list_url) . '" class="page-title-action">' . esc_html__('查看所有文章', 'elysia_first_web') . '</a></p>';
    echo '</div>';
}

function elysia_acf_product_filter_script()
{
    $screen = get_current_screen();

    if (!$screen || $screen->post_type !== 'page') {
        return;
    }
    ?>
    <script type="text/javascript">
        (function($) {
            function elysiaRefreshSubCategories(parentSlug) {
                if (typeof acf === 'undefined') {
                    return;
                }
                var subField = acf.getField('field_elysia_product_filter_sub_category');
                if (!subField) {
                    return;
                }
                var $select = subField.$input();
                if (!$select || !$select.length) {
                    return;
                }
                $select.empty();
                $select.append($('<option>').val('').text(''));
                if (!parentSlug) {
                    $select.trigger('change');
                    return;
                }
                $.post(ajaxurl, {
                    action: 'elysia_get_product_subcategories',
                    parent_slug: parentSlug
                }, function(response) {
                    if (!response || !response.success || !response.data) {
                        $select.trigger('change');
                        return;
                    }
                    $.each(response.data, function(value, label) {
                        $select.append($('<option>').val(value).text(label));
                    });
                    $select.trigger('change');
                });
            }

            if (typeof acf !== 'undefined') {
                acf.add_action('ready', function() {
                    var mainField = acf.getField('field_elysia_product_filter_main_category');
                    if (!mainField) {
                        return;
                    }
                    var $mainInput = mainField.$input();
                    var initialValue = $mainInput.val();
                    elysiaRefreshSubCategories(initialValue);
                    $mainInput.on('change', function() {
                        elysiaRefreshSubCategories($(this).val());
                    });
                });
            }
        })(jQuery);
    </script>
<?php
}

add_action('acf/input/admin_footer', 'elysia_acf_product_filter_script');

function elysia_get_blog_archive_page_id()
{
    $page_id = get_queried_object_id();
    if ($page_id && get_post_type($page_id) === 'page') {
        $template = get_page_template_slug($page_id);
        if ($template === 'page-blog.php') {
            return (int) $page_id;
        }
    }
    $pages = get_posts(
        array(
            'post_type' => 'page',
            'posts_per_page' => 1,
            'fields' => 'ids',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-blog.php',
        )
    );
    if (!empty($pages)) {
        return (int) $pages[0];
    }
    return 0;
}

function elysia_get_blog_list_paged()
{
    if (get_query_var('paged')) {
        return (int) get_query_var('paged');
    }
    if (get_query_var('page')) {
        return (int) get_query_var('page');
    }
    return 1;
}

function elysia_get_blog_main_query($paged = 1)
{
    $paged = max(1, (int) $paged);
    $posts_per_page = 10;
    $category_ids = array();
    if (function_exists('get_field')) {
        $page_id = elysia_get_blog_archive_page_id();
        if ($page_id) {
            $per_page_field = get_field('blog_main_query_posts_per_page', $page_id);
            if ($per_page_field) {
                $posts_per_page = (int) $per_page_field;
            }
            $categories_field = get_field('blog_main_query_category', $page_id);
            if (is_array($categories_field) && !empty($categories_field)) {
                $category_ids = array_map('intval', $categories_field);
            }
        }
    }
    if ($posts_per_page < 1) {
        $posts_per_page = 10;
    }
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
    );
    if (!empty($category_ids)) {
        $args['category__in'] = $category_ids;
    }
    return new WP_Query($args);
}

function elysia_get_blog_latest_posts($limit = 4, $category_ids = array())
{
    $limit = max(1, (int) $limit);
    if (empty($category_ids) && function_exists('get_field')) {
        $page_id = elysia_get_blog_archive_page_id();
        if ($page_id) {
            $count_field = get_field('blog_sidebar_latest_posts_count', $page_id);
            if ($count_field) {
                $limit = (int) $count_field;
            }
            $categories_field = get_field('blog_sidebar_latest_category', $page_id);
            if (is_array($categories_field) && !empty($categories_field)) {
                $category_ids = array_map('intval', $categories_field);
            }
        }
    }
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $limit,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    if (!empty($category_ids)) {
        $args['category__in'] = $category_ids;
    }
    return get_posts($args);
}

function elysia_get_blog_popular_posts()
{
    $posts = array();
    if (function_exists('get_field')) {
        $page_id = elysia_get_blog_archive_page_id();
        if ($page_id) {
            $selected = get_field('blog_popular_posts', $page_id);
            if (is_array($selected) && !empty($selected)) {
                $posts = $selected;
            }
        }
    }
    if (empty($posts)) {
        $posts = elysia_get_blog_latest_posts(4);
    }
    return $posts;
}

function elysia_single_template_blog_detail($template)
{
    if (is_singular('post')) {
        $blog_detail_template = get_template_directory() . '/page-blog-detail.php';
        if (file_exists($blog_detail_template)) {
            return $blog_detail_template;
        }
    }
    return $template;
}

add_filter('single_template', 'elysia_single_template_blog_detail');

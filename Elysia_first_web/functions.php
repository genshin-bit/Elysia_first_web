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

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_global_faq_settings',
            'title' => 'Global - FAQ 全局设置',
            'fields' => array(
                array(
                    'key' => 'field_faq_page_ref',
                    'label' => 'FAQ 页面引用',
                    'name' => 'faq_page_ref',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_faq_intro_title_default',
                    'label' => '默认 FAQ Intro 标题',
                    'name' => 'faq_intro_title_default',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_faq_intro_text_default',
                    'label' => '默认 FAQ Intro 文本',
                    'name' => 'faq_intro_text_default',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_faq_intro_button_text_default',
                    'label' => '默认 FAQ Intro 按钮文案',
                    'name' => 'faq_intro_button_text_default',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_faq_intro_button_page_default',
                    'label' => '默认 FAQ Intro 按钮链接页面',
                    'name' => 'faq_intro_button_page_default',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_faq_intro_button_url_default',
                    'label' => '默认 FAQ Intro 按钮链接地址',
                    'name' => 'faq_intro_button_url_default',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_faq_items_default',
                    'label' => '默认 FAQ 列表',
                    'name' => 'faq_items_default',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加 FAQ',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_faq_items_default_question',
                            'label' => '问题',
                            'name' => 'question',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_faq_items_default_answer',
                            'label' => '回答',
                            'name' => 'answer',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                        array(
                            'key' => 'field_faq_items_default_slug',
                            'label' => '锚点 ID',
                            'name' => 'slug',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_faq_items_default_is_default_open',
                            'label' => '默认展开',
                            'name' => 'is_default_open',
                            'type' => 'true_false',
                            'ui' => 1,
                            'default_value' => 0,
                        ),
                    ),
                ),
                array(
                    'key' => 'field_faq_items_per_page_default',
                    'label' => 'FAQ 显示条数默认值',
                    'name' => 'faq_items_per_page_default',
                    'type' => 'number',
                    'min' => 1,
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
            'key' => 'group_elysia_faq_page_settings',
            'title' => 'FAQ 页面设置',
            'fields' => array(
                array(
                    'key' => 'field_faq_intro_title',
                    'label' => 'FAQ Intro 标题',
                    'name' => 'faq_intro_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_faq_intro_text',
                    'label' => 'FAQ Intro 文本',
                    'name' => 'faq_intro_text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_faq_intro_button_text',
                    'label' => 'FAQ Intro 按钮文案',
                    'name' => 'faq_intro_button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_faq_intro_button_page',
                    'label' => 'FAQ Intro 按钮链接页面',
                    'name' => 'faq_intro_button_page',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_faq_intro_button_url',
                    'label' => 'FAQ Intro 按钮链接地址',
                    'name' => 'faq_intro_button_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_faq_items',
                    'label' => 'FAQ 列表',
                    'name' => 'faq_items',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加 FAQ',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_faq_items_question',
                            'label' => '问题',
                            'name' => 'question',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_faq_items_answer',
                            'label' => '回答',
                            'name' => 'answer',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                        array(
                            'key' => 'field_faq_items_slug',
                            'label' => '锚点 ID',
                            'name' => 'slug',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_faq_items_is_default_open',
                            'label' => '默认展开',
                            'name' => 'is_default_open',
                            'type' => 'true_false',
                            'ui' => 1,
                            'default_value' => 0,
                        ),
                    ),
                ),
                array(
                    'key' => 'field_faq_related_pages',
                    'label' => 'FAQ 关联页面',
                    'name' => 'faq_related_pages',
                    'type' => 'relationship',
                    'post_type' => array('page'),
                    'filters' => array('search', 'post_type'),
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
                        'value' => 'page-faq.php',
                    ),
                ),
            ),
        )
    );
}

add_filter('nav_menu_link_attributes', 'elysia_first_web_add_ct_menu_link_class', 10, 3);

function elysia_first_web_add_ct_menu_link_class($atts, $item, $args)
{
    if (isset($args->theme_location) && $args->theme_location === 'primary') {
        $existing_class = isset($atts['class']) ? $atts['class'] : '';
        $classes = preg_split('/\s+/', $existing_class, -1, PREG_SPLIT_NO_EMPTY);
        if (!in_array('ct-menu-link', $classes, true)) {
            $classes[] = 'ct-menu-link';
        }
        $atts['class'] = implode(' ', $classes);
    }

    return $atts;
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

function elysia_first_web_register_solution_post_type()
{
    $labels = array(
        'name'               => _x('Solutions', 'Post Type General Name', 'elysia_first_web'),
        'singular_name'      => _x('Solution', 'Post Type Singular Name', 'elysia_first_web'),
        'menu_name'          => __('Solutions', 'elysia_first_web'),
        'name_admin_bar'     => __('Solution', 'elysia_first_web'),
        'add_new'            => __('Add New', 'elysia_first_web'),
        'add_new_item'       => __('Add New Solution', 'elysia_first_web'),
        'edit_item'          => __('Edit Solution', 'elysia_first_web'),
        'new_item'           => __('New Solution', 'elysia_first_web'),
        'view_item'          => __('View Solution', 'elysia_first_web'),
        'search_items'       => __('Search Solutions', 'elysia_first_web'),
        'not_found'          => __('No solutions found', 'elysia_first_web'),
        'not_found_in_trash' => __('No solutions found in Trash', 'elysia_first_web'),
    );

    $args = array(
        'label'               => __('Solution', 'elysia_first_web'),
        'labels'              => $labels,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 21,
        'menu_icon'           => 'dashicons-lightbulb',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive'         => false,
        'rewrite'             => array(
            'slug'       => 'solution',
            'with_front' => false,
        ),
        'show_in_rest'        => true,
    );

    register_post_type('solution', $args);
}

add_action('init', 'elysia_first_web_register_solution_post_type');

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

function elysia_first_web_register_solution_category_taxonomy()
{
    $labels = array(
        'name'              => __('Solution Categories', 'elysia_first_web'),
        'singular_name'     => __('Solution Category', 'elysia_first_web'),
        'search_items'      => __('Search Solution Categories', 'elysia_first_web'),
        'all_items'         => __('All Solution Categories', 'elysia_first_web'),
        'parent_item'       => __('Parent Solution Category', 'elysia_first_web'),
        'parent_item_colon' => __('Parent Solution Category:', 'elysia_first_web'),
        'edit_item'         => __('Edit Solution Category', 'elysia_first_web'),
        'update_item'       => __('Update Solution Category', 'elysia_first_web'),
        'add_new_item'      => __('Add New Solution Category', 'elysia_first_web'),
        'new_item_name'     => __('New Solution Category Name', 'elysia_first_web'),
        'menu_name'         => __('Solution Categories', 'elysia_first_web'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array(
            'slug'         => 'solution-category',
            'hierarchical' => true,
        ),
        'show_in_rest'      => true,
    );

    register_taxonomy('solution_category', array('solution'), $args);
}

add_action('init', 'elysia_first_web_register_solution_category_taxonomy');

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

function elysia_first_web_solution_single_template($single)
{
    global $post;

    if ($post && $post->post_type === 'solution') {
        $template = get_theme_file_path('page-solution-detail.php');
        if (file_exists($template)) {
            return $template;
        }
    }

    return $single;
}

add_filter('single_template', 'elysia_first_web_solution_single_template');

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
    $phone   = get_option('elysia_footer_phone', '+86-13616182007');
    $email   = get_option('elysia_footer_email', 'info@example.com');
    $address = get_option('elysia_footer_address', 'Wuxi, China');

    if (function_exists('get_field')) {
        $acf_phone = get_field('global_tel_number', 'option');
        if ($acf_phone) {
            $phone = $acf_phone;
        }

        $acf_email = get_field('global_email_address', 'option');
        if ($acf_email) {
            $email = $acf_email;
        }

        $acf_address = get_field('global_address_text', 'option');
        if ($acf_address) {
            $address = $acf_address;
        }
    }

    return array(
        'phone'   => $phone,
        'email'   => $email,
        'address' => $address,
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

function elysia_get_youtube_embed_url($url)
{
    $url = trim((string) $url);
    if ($url === '') {
        return '';
    }
    $parsed = wp_parse_url($url);
    if (!$parsed || empty($parsed['host'])) {
        return $url;
    }
    $host = strtolower($parsed['host']);
    $path = isset($parsed['path']) ? trim($parsed['path'], '/') : '';
    $video_id = '';
    if ($host === 'youtu.be') {
        $video_id = $path;
    } elseif (strpos($host, 'youtube.com') !== false) {
        if (strpos($path, 'watch') === 0 && !empty($parsed['query'])) {
            parse_str($parsed['query'], $query);
            if (!empty($query['v'])) {
                $video_id = $query['v'];
            }
        } elseif (strpos($path, 'shorts/') === 0) {
            $video_id = substr($path, strlen('shorts/'));
        } elseif (strpos($path, 'embed/') === 0) {
            $video_id = substr($path, strlen('embed/'));
        }
    }
    if ($video_id === '') {
        return $url;
    }
    return 'https://www.youtube.com/embed/' . rawurlencode($video_id);
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
    acf_add_options_page(
        array(
            'page_title' => 'Solution Options',
            'menu_title' => 'Solution Options',
            'menu_slug'  => 'acf-solution-options',
            'capability' => 'edit_posts',
            'redirect'   => false,
        )
    );
}
// 注册所有依赖 ACF 的字段组（全局产品模块配置）
if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_faq_page_settings',
            'title' => 'FAQ 页面设置',
            'fields' => array(
                array(
                    'key' => 'field_faq_intro_title',
                    'label' => 'FAQ Intro 标题',
                    'name' => 'faq_intro_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_faq_intro_text',
                    'label' => 'FAQ Intro 文本',
                    'name' => 'faq_intro_text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_faq_intro_button_text',
                    'label' => 'FAQ Intro 按钮文案',
                    'name' => 'faq_intro_button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_faq_intro_button_page',
                    'label' => 'FAQ Intro 按钮链接页面',
                    'name' => 'faq_intro_button_page',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_faq_intro_button_url',
                    'label' => 'FAQ Intro 按钮链接地址',
                    'name' => 'faq_intro_button_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_faq_items',
                    'label' => 'FAQ 列表',
                    'name' => 'faq_items',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加 FAQ',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_faq_items_question',
                            'label' => '问题',
                            'name' => 'question',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_faq_items_answer',
                            'label' => '回答',
                            'name' => 'answer',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                        array(
                            'key' => 'field_faq_items_slug',
                            'label' => '锚点 ID',
                            'name' => 'slug',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_faq_items_is_default_open',
                            'label' => '默认展开',
                            'name' => 'is_default_open',
                            'type' => 'true_false',
                            'ui' => 1,
                            'default_value' => 0,
                        ),
                    ),
                ),
                array(
                    'key' => 'field_faq_related_pages',
                    'label' => 'FAQ 关联页面',
                    'name' => 'faq_related_pages',
                    'type' => 'relationship',
                    'post_type' => array('page'),
                    'filters' => array('search', 'post_type'),
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
                        'value' => 'page-faq.php',
                    ),
                ),
            ),
        )
    );

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
            'key' => 'group_elysia_product_archive_cta_page_override',
            'title' => 'Product Archive CTA（页面覆盖）',
            'fields' => array(
                array(
                    'key' => 'field_elysia_product_archive_cta_label_page',
                    'label' => '主按钮文字',
                    'name' => 'elysia_product_archive_cta_label',
                    'type' => 'text',
                ),
            ),
            'location' => array(
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
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_global_contact_info',
            'title' => 'Global Contact Info',
            'fields' => array(
                array(
                    'key' => 'field_global_tel_label',
                    'label' => '电话标签',
                    'name' => 'global_tel_label',
                    'type' => 'text',
                    'default_value' => 'Tel',
                ),
                array(
                    'key' => 'field_global_tel_number',
                    'label' => '电话号码',
                    'name' => 'global_tel_number',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_global_email_label',
                    'label' => '邮箱标签',
                    'name' => 'global_email_label',
                    'type' => 'text',
                    'default_value' => 'Email',
                ),
                array(
                    'key' => 'field_global_email_address',
                    'label' => '邮箱地址',
                    'name' => 'global_email_address',
                    'type' => 'email',
                ),
                array(
                    'key' => 'field_global_whatsapp_label',
                    'label' => 'WhatsApp 标签',
                    'name' => 'global_whatsapp_label',
                    'type' => 'text',
                    'default_value' => 'WhatsApp',
                ),
                array(
                    'key' => 'field_global_whatsapp_number',
                    'label' => 'WhatsApp 号码',
                    'name' => 'global_whatsapp_number',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_global_address_label',
                    'label' => '地址标签',
                    'name' => 'global_address_label',
                    'type' => 'text',
                    'default_value' => 'Address',
                ),
                array(
                    'key' => 'field_global_address_text',
                    'label' => '地址内容',
                    'name' => 'global_address_text',
                    'type' => 'textarea',
                    'rows' => 3,
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
            'key' => 'group_elysia_contact_page_settings',
            'title' => 'Contact Page Settings',
            'fields' => array(
                array(
                    'key' => 'field_contact_hero_title',
                    'label' => '页面主标题',
                    'name' => 'contact_hero_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_contact_intro_subtitle',
                    'label' => '表单区副标题',
                    'name' => 'contact_intro_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_contact_intro_title',
                    'label' => '表单区主标题',
                    'name' => 'contact_intro_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_contact_intro_description',
                    'label' => '表单区说明文案',
                    'name' => 'contact_intro_description',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_contact_cards',
                    'label' => '联系方式卡片',
                    'name' => 'contact_cards',
                    'type' => 'repeater',
                    'min' => 4,
                    'max' => 4,
                    'layout' => 'row',
                    'button_label' => '添加联系方式',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_contact_cards_label',
                            'label' => '展示名称',
                            'name' => 'label',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_contact_cards_value',
                            'label' => '内容',
                            'name' => 'value',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_contact_cards_link',
                            'label' => '链接',
                            'name' => 'link',
                            'type' => 'url',
                        ),
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
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-contact.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_page_hero_settings',
            'title' => 'Page Hero 通用配置',
            'fields' => array(
                array(
                    'key' => 'field_hero_title',
                    'label' => 'Hero 标题',
                    'name' => 'hero_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_hero_subtitle',
                    'label' => 'Hero 副标题',
                    'name' => 'hero_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_hero_background_image',
                    'label' => 'Hero 背景图',
                    'name' => 'hero_background_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
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
            'key' => 'group_elysia_factory_page_settings',
            'title' => 'Factory 页面设置',
            'fields' => array(
                array(
                    'key' => 'field_factory_hero_title',
                    'label' => 'Hero 标题覆盖',
                    'name' => 'factory_hero_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_factory_hero_subtitle',
                    'label' => 'Hero 副标题覆盖',
                    'name' => 'factory_hero_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_factory_hero_breadcrumb_extra',
                    'label' => '面包屑附加文案',
                    'name' => 'factory_hero_breadcrumb_extra',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_factory_intro_text',
                    'label' => '工厂简介文案',
                    'name' => 'factory_intro_text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_factory_intro_image',
                    'label' => '工厂简介图片',
                    'name' => 'factory_intro_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_factory_intro_contact_button_text',
                    'label' => '工厂简介按钮文案',
                    'name' => 'factory_intro_contact_button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_factory_gallery',
                    'label' => '工厂图库',
                    'name' => 'factory_gallery',
                    'type' => 'gallery',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_factory_details_intro',
                    'label' => '工厂详情主文案',
                    'name' => 'factory_details_intro',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_factory_details_boxes',
                    'label' => '工厂详情三列图文',
                    'name' => 'factory_details_boxes',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加详情卡片',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_factory_details_box_title',
                            'label' => '标题',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_factory_details_box_description',
                            'label' => '说明',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                        array(
                            'key' => 'field_factory_details_box_image',
                            'label' => '图片',
                            'name' => 'image',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'large',
                            'library' => 'all',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_factory_related_pages',
                    'label' => '相关页面',
                    'name' => 'factory_related_pages',
                    'type' => 'relationship',
                    'post_type' => array('page'),
                    'filters' => array('search', 'post_type'),
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
                        'value' => 'page-factory.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_quality_page_settings',
            'title' => '质量制造页面设置',
            'fields' => array(
                array(
                    'key' => 'field_quality_intro_badge',
                    'label' => 'Intro 小标题',
                    'name' => 'quality_intro_badge',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_intro_title',
                    'label' => 'Intro 主标题',
                    'name' => 'quality_intro_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_intro_text',
                    'label' => 'Intro 正文',
                    'name' => 'quality_intro_text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_quality_intro_image',
                    'label' => 'Intro 图片',
                    'name' => 'quality_intro_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_quality_intro_contact_button_text',
                    'label' => 'Intro 按钮文案',
                    'name' => 'quality_intro_contact_button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_worth_badge',
                    'label' => 'Worthy Invest 小标题',
                    'name' => 'quality_worth_badge',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_worth_title',
                    'label' => 'Worthy Invest 主标题',
                    'name' => 'quality_worth_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_worth_cards',
                    'label' => '价值主张卡片',
                    'name' => 'quality_worth_cards',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加价值卡片',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_quality_worth_card_icon_svg',
                            'label' => '图标 SVG',
                            'name' => 'icon_svg',
                            'type' => 'textarea',
                        ),
                        array(
                            'key' => 'field_quality_worth_card_title',
                            'label' => '标题',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_quality_worth_card_description',
                            'label' => '描述',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                    ),
                ),
                array(
                    'key' => 'field_quality_supply_badge',
                    'label' => '供应链模块小标题',
                    'name' => 'quality_supply_badge',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_supply_title',
                    'label' => '供应链模块主标题',
                    'name' => 'quality_supply_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_supply_1_order',
                    'label' => '段落1序号',
                    'name' => 'quality_supply_1_order',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_supply_1_title',
                    'label' => '段落1标题',
                    'name' => 'quality_supply_1_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_supply_1_text',
                    'label' => '段落1正文',
                    'name' => 'quality_supply_1_text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_quality_supply_1_image',
                    'label' => '段落1图片',
                    'name' => 'quality_supply_1_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_quality_supply_2_order',
                    'label' => '段落2序号',
                    'name' => 'quality_supply_2_order',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_supply_2_title',
                    'label' => '段落2标题',
                    'name' => 'quality_supply_2_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_supply_2_text',
                    'label' => '段落2正文',
                    'name' => 'quality_supply_2_text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_quality_supply_2_image',
                    'label' => '段落2图片',
                    'name' => 'quality_supply_2_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
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
                        'value' => 'page-quality-manufacturing.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_why_us_hero',
            'title' => 'Why Us 页面 - 基础与首屏',
            'fields' => array(
                array(
                    'key' => 'field_why_us_hero_title',
                    'label' => 'Hero 标题',
                    'name' => 'why_us_hero_title',
                    'type' => 'text',
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
                        'value' => 'page-why-us.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_why_us_intro',
            'title' => 'Why Us 页面 - 导语模块',
            'fields' => array(
                array(
                    'key' => 'field_why_intro_eyebrow',
                    'label' => '导语上方小标题',
                    'name' => 'why_intro_eyebrow',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_why_intro_title',
                    'label' => '导语主标题',
                    'name' => 'why_intro_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_why_intro_body',
                    'label' => '导语正文',
                    'name' => 'why_intro_body',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_why_intro_cta_text',
                    'label' => '按钮文案',
                    'name' => 'why_intro_cta_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_why_intro_image_main',
                    'label' => '主图',
                    'name' => 'why_intro_image_main',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_why_intro_image_secondary',
                    'label' => '副图',
                    'name' => 'why_intro_image_secondary',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
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
                        'value' => 'page-why-us.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_why_us_advantages',
            'title' => 'Why Us 页面 - 优势栅格',
            'fields' => array(
                array(
                    'key' => 'field_why_advantages_eyebrow',
                    'label' => '优势区上方文案',
                    'name' => 'why_advantages_eyebrow',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_why_advantages_title',
                    'label' => '优势区主标题',
                    'name' => 'why_advantages_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_why_advantages_items',
                    'label' => '优势列表',
                    'name' => 'why_advantages_items',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加优势',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_why_advantage_title',
                            'label' => '优势标题',
                            'name' => 'why_advantage_title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_why_advantage_description',
                            'label' => '优势描述',
                            'name' => 'why_advantage_description',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                        array(
                            'key' => 'field_why_advantage_layout_group',
                            'label' => '所属行',
                            'name' => 'why_advantage_layout_group',
                            'type' => 'select',
                            'choices' => array(
                                '1' => '第一行',
                                '2' => '第二行',
                                '3' => '第三行',
                            ),
                            'allow_null' => 1,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value',
                        ),
                        array(
                            'key' => 'field_why_advantage_icon_style',
                            'label' => '图标 SVG 图片',
                            'name' => 'why_advantage_icon_style',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                        ),
                        array(
                            'key' => 'field_why_advantage_link_type',
                            'label' => '链接类型',
                            'name' => 'why_advantage_link_type',
                            'type' => 'select',
                            'choices' => array(
                                'none' => '无链接',
                                'page' => '页面链接',
                                'custom' => '自定义链接',
                            ),
                            'allow_null' => 1,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value',
                        ),
                        array(
                            'key' => 'field_why_advantage_link_page',
                            'label' => '目标页面',
                            'name' => 'why_advantage_link_page',
                            'type' => 'post_object',
                            'post_type' => array('page'),
                            'return_format' => 'id',
                            'allow_null' => 1,
                            'multiple' => 0,
                        ),
                        array(
                            'key' => 'field_why_advantage_custom_url',
                            'label' => '自定义链接地址',
                            'name' => 'why_advantage_custom_url',
                            'type' => 'url',
                        ),
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
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-why-us.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_about_company_intro',
            'title' => 'About - 公司介绍',
            'fields' => array(
                array(
                    'key' => 'field_about_intro_badge',
                    'label' => '副标题徽标',
                    'name' => 'about_intro_badge',
                    'type' => 'text',
                    'default_value' => 'About SUNWAY',
                ),
                array(
                    'key' => 'field_about_intro_title',
                    'label' => '主标题',
                    'name' => 'about_intro_title',
                    'type' => 'text',
                    'default_value' => 'Professional manufacturer and exporter of cold-forming machinery',
                ),
                array(
                    'key' => 'field_about_intro_paragraphs',
                    'label' => '介绍段落',
                    'name' => 'about_intro_paragraphs',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加段落',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_about_intro_paragraph_text',
                            'label' => '段落内容',
                            'name' => 'text',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                    ),
                ),
                array(
                    'key' => 'field_about_intro_image',
                    'label' => '左侧图片',
                    'name' => 'about_intro_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_about_intro_cta_label',
                    'label' => '按钮文字',
                    'name' => 'about_intro_cta_label',
                    'type' => 'text',
                    'default_value' => 'CONTACT US',
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
                        'value' => 'page-about-us.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_about_capabilities',
            'title' => 'About - 能力与工厂 CTA',
            'fields' => array(
                array(
                    'key' => 'field_capabilities_badge',
                    'label' => '能力区副标题',
                    'name' => 'capabilities_badge',
                    'type' => 'text',
                    'default_value' => 'Our Capabilities',
                ),
                array(
                    'key' => 'field_capabilities_title',
                    'label' => '能力区主标题',
                    'name' => 'capabilities_title',
                    'type' => 'text',
                    'default_value' => 'We Meet timeliness and quality requirements',
                ),
                array(
                    'key' => 'field_capabilities_description',
                    'label' => '能力区说明',
                    'name' => 'capabilities_description',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_capabilities_cta_label',
                    'label' => '按钮文字',
                    'name' => 'capabilities_cta_label',
                    'type' => 'text',
                    'default_value' => 'Step into our factory',
                ),
                array(
                    'key' => 'field_capabilities_cta_target',
                    'label' => '工厂页面',
                    'name' => 'capabilities_cta_target',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_capabilities_main_image',
                    'label' => '主图片',
                    'name' => 'capabilities_main_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_capabilities_secondary_image',
                    'label' => '叠加图片',
                    'name' => 'capabilities_secondary_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
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
                        'value' => 'page-about-us.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_global_brand_mission',
            'title' => 'Global - 品牌使命 / 目标 / 研发',
            'fields' => array(
                array(
                    'key' => 'field_mission_background_slides',
                    'label' => '背景幻灯片',
                    'name' => 'mission_background_slides',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加背景图',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_mission_background_image',
                            'label' => '图片',
                            'name' => 'image',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'large',
                            'library' => 'all',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_mission_items',
                    'label' => '使命条目',
                    'name' => 'mission_items',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加条目',
                    'min' => 3,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_mission_item_index',
                            'label' => '序号',
                            'name' => 'index',
                            'type' => 'text',
                            'default_value' => '01',
                        ),
                        array(
                            'key' => 'field_mission_item_title',
                            'label' => '标题',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_mission_item_description',
                            'label' => '描述',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                        array(
                            'key' => 'field_mission_item_animation',
                            'label' => '动画效果',
                            'name' => 'animation',
                            'type' => 'select',
                            'choices' => array(
                                'zoomIn' => 'zoomIn',
                                'none' => 'none',
                            ),
                            'default_value' => 'zoomIn',
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value',
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
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_about_mission_override',
            'title' => 'About - 使命区覆盖',
            'fields' => array(
                array(
                    'key' => 'field_about_mission_background_slides',
                    'label' => '本页背景幻灯片',
                    'name' => 'about_mission_background_slides',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加背景图',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_about_mission_background_image',
                            'label' => '图片',
                            'name' => 'image',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'large',
                            'library' => 'all',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_about_mission_items',
                    'label' => '本页使命条目',
                    'name' => 'about_mission_items',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加条目',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_about_mission_item_index',
                            'label' => '序号',
                            'name' => 'index',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_about_mission_item_title',
                            'label' => '标题',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_about_mission_item_description',
                            'label' => '描述',
                            'name' => 'description',
                            'type' => 'wysiwyg',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1,
                        ),
                        array(
                            'key' => 'field_about_mission_item_animation',
                            'label' => '动画效果',
                            'name' => 'animation',
                            'type' => 'select',
                            'choices' => array(
                                'zoomIn' => 'zoomIn',
                                'none' => 'none',
                            ),
                            'default_value' => 'zoomIn',
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value',
                        ),
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
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-about-us.php',
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
            'key' => 'group_elysia_solution_sidebar_defaults',
            'title' => 'Solution Sidebar Defaults',
            'fields' => array(
                array(
                    'key' => 'field_solution_default_sidebar_video_url',
                    'label' => '默认侧边视频地址',
                    'name' => 'solution_default_sidebar_video_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_solution_default_sidebar_video_aspect_ratio',
                    'label' => '默认侧边视频宽高比',
                    'name' => 'solution_default_sidebar_video_aspect_ratio',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_solution_default_featured_products',
                    'label' => '默认推荐产品',
                    'name' => 'solution_default_featured_products',
                    'type' => 'relationship',
                    'post_type' => array('site_product'),
                    'filters' => array('search', 'post_type', 'taxonomy'),
                    'return_format' => 'object',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-solution-options',
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
                    'key' => 'field_sidebar_inquiry_form_text',
                    'label' => '表单上方说明文字',
                    'name' => 'sidebar_inquiry_form_text',
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

    function elysia_get_product_card_image_id($post_id)
    {
        $post_id = (int) $post_id;
        if (!$post_id) {
            return 0;
        }
        $image_id = 0;
        if (function_exists('get_field')) {
            $gallery = get_field('elysia_product_gallery', $post_id);
            if (is_array($gallery) && !empty($gallery)) {
                $first = reset($gallery);
                if (is_array($first) && isset($first['ID'])) {
                    $image_id = (int) $first['ID'];
                } elseif ($first) {
                    $image_id = (int) $first;
                }
            }
        }
        return $image_id;
    }

    /**
     * 获取使用“产品详情”模板的页面查询，用于产品列表页统一读取产品数据。
     *
     * @param int $paged
     * @param int $per_page
     *
     * @return WP_Query
     */
    function elysia_get_product_pages_query($paged = 1, $per_page = 16)
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
            'key' => 'group_elysia_solution_archive_settings',
            'title' => 'Solution Archive Settings',
            'fields' => array(
                array(
                    'key' => 'field_solution_list_title',
                    'label' => '列表主标题',
                    'name' => 'solution_list_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_solution_list_subtitle',
                    'label' => '列表副标题',
                    'name' => 'solution_list_subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_solution_list_intro',
                    'label' => '列表说明',
                    'name' => 'solution_list_intro',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_solution_archive_banner_image',
                    'label' => '列表页 Banner 图',
                    'name' => 'solution_archive_banner_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_solution_archive_banner_desc',
                    'label' => 'Banner 描述文案',
                    'name' => 'solution_archive_banner_desc',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_solution_list_items_per_page',
                    'label' => '每页解决方案数量',
                    'name' => 'solution_list_items_per_page',
                    'type' => 'number',
                    'default_value' => 9,
                    'min' => 1,
                ),
                array(
                    'key' => 'field_solution_list_default_order',
                    'label' => '默认排序规则',
                    'name' => 'solution_list_default_order',
                    'type' => 'select',
                    'choices' => array(
                        'date_desc' => '按发布时间（新到旧）',
                        'date_asc' => '按发布时间（旧到新）',
                        'menu_order' => '自定义排序',
                    ),
                    'default_value' => 'date_desc',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'return_format' => 'value',
                ),
                array(
                    'key' => 'field_solution_list_featured_ids',
                    'label' => '推荐解决方案',
                    'name' => 'solution_list_featured_ids',
                    'type' => 'relationship',
                    'post_type' => array('solution'),
                    'filters' => array('search', 'taxonomy'),
                    'return_format' => 'object',
                ),
                array(
                    'key' => 'field_solution_featured_products',
                    'label' => '推荐产品（Feature Product）',
                    'name' => 'solution_featured_products',
                    'type' => 'relationship',
                    'post_type' => array('site_product'),
                    'filters' => array('search', 'taxonomy'),
                    'return_format' => 'object',
                    'max' => 4,
                ),
                array(
                    'key' => 'field_solution_sidebar_video_url',
                    'label' => '侧边视频地址（YouTube URL）',
                    'name' => 'solution_sidebar_video_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_solution_sidebar_video_aspect_ratio',
                    'label' => '侧边视频宽高比（可选）',
                    'name' => 'solution_sidebar_video_aspect_ratio',
                    'type' => 'text',
                    'default_value' => '16/9',
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
                        'value' => 'page-solution.php',
                    ),
                ),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-solution-detail.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_solution_detail_settings',
            'title' => 'Solution Detail Settings',
            'fields' => array(
                array(
                    'key' => 'field_solution_detail_show_toc',
                    'label' => '是否显示目录（TOC）',
                    'name' => 'solution_detail_show_toc',
                    'type' => 'true_false',
                    'ui' => 1,
                    'default_value' => 1,
                ),
                array(
                    'key' => 'field_solution_detail_share_title',
                    'label' => '侧边分享标题',
                    'name' => 'solution_detail_share_title',
                    'type' => 'text',
                    'default_value' => 'Share',
                ),
                array(
                    'key' => 'field_solution_detail_sidebar_video_url',
                    'label' => '详情页侧边视频地址（YouTube URL）',
                    'name' => 'solution_detail_sidebar_video_url',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_solution_detail_sidebar_video_aspect_ratio',
                    'label' => '详情页侧边视频宽高比',
                    'name' => 'solution_detail_sidebar_video_aspect_ratio',
                    'type' => 'text',
                    'default_value' => '16/9',
                ),
                array(
                    'key' => 'field_solution_detail_related_mode',
                    'label' => '相关解决方案模式',
                    'name' => 'solution_detail_related_mode',
                    'type' => 'select',
                    'choices' => array(
                        'auto_category' => '按分类自动推荐',
                        'manual'        => '手动选择',
                    ),
                    'default_value' => 'auto_category',
                    'ui' => 1,
                    'return_format' => 'value',
                ),
                array(
                    'key' => 'field_solution_detail_related_manual',
                    'label' => '手动选择的相关解决方案',
                    'name' => 'solution_detail_related_manual',
                    'type' => 'relationship',
                    'post_type' => array('solution'),
                    'filters' => array('search', 'taxonomy'),
                    'return_format' => 'object',
                ),
                array(
                    'key' => 'field_solution_detail_related_title',
                    'label' => '相关解决方案标题',
                    'name' => 'solution_detail_related_title',
                    'type' => 'text',
                    'default_value' => 'Related Solutions',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'solution',
                    ),
                ),
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

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_project_page_settings',
            'title' => '项目案例页面设置',
            'fields' => array(
                array(
                    'key' => 'field_project_intro_badge',
                    'label' => '项目简介小标题',
                    'name' => 'project_intro_badge',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_project_intro_title',
                    'label' => '项目简介主标题',
                    'name' => 'project_intro_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_project_intro_text',
                    'label' => '项目简介正文',
                    'name' => 'project_intro_text',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_project_intro_image_main',
                    'label' => '项目简介右侧大图',
                    'name' => 'project_intro_image_main',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_project_intro_image_secondary',
                    'label' => '项目简介右侧小图',
                    'name' => 'project_intro_image_secondary',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_project_items',
                    'label' => '项目列表',
                    'name' => 'project_items',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加项目',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_project_items_title',
                            'label' => '项目标题',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_project_items_country',
                            'label' => '国家/地区',
                            'name' => 'country',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_project_items_image',
                            'label' => '项目图片',
                            'name' => 'image',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'large',
                            'library' => 'all',
                        ),
                        array(
                            'key' => 'field_project_items_highlight_text',
                            'label' => '高亮文案',
                            'name' => 'highlight_text',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_project_items_link_type',
                            'label' => '链接类型',
                            'name' => 'link_type',
                            'type' => 'select',
                            'choices' => array(
                                'none' => '无',
                                'internal' => '站内链接',
                                'external' => '站外链接',
                            ),
                            'default_value' => 'none',
                            'allow_null' => 1,
                        ),
                        array(
                            'key' => 'field_project_items_link_page',
                            'label' => '站内链接页面',
                            'name' => 'link_page',
                            'type' => 'post_object',
                            'post_type' => array('page', 'site_product', 'solution'),
                            'return_format' => 'id',
                            'allow_null' => 1,
                            'multiple' => 0,
                        ),
                        array(
                            'key' => 'field_project_items_link_url',
                            'label' => '站外链接地址',
                            'name' => 'link_url',
                            'type' => 'url',
                        ),
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
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-project.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_social_responsibility_base_hero',
            'title' => '社会责任页面 - 基础与首屏',
            'fields' => array(
                array(
                    'key' => 'field_social_responsibility_hero_title',
                    'label' => 'Hero 标题',
                    'name' => 'social_responsibility_hero_title',
                    'type' => 'text',
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
                        'value' => 'page-social-responsibility.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_social_responsibility_intro_pillars',
            'title' => '社会责任页面 - 导语与支柱',
            'fields' => array(
                array(
                    'key' => 'field_sr_intro_eyebrow',
                    'label' => '导语小标题',
                    'name' => 'sr_intro_eyebrow',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_intro_title',
                    'label' => '导语主标题',
                    'name' => 'sr_intro_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_intro_body_main',
                    'label' => '导语正文主段',
                    'name' => 'sr_intro_body_main',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_sr_intro_body_sub',
                    'label' => '导语正文次段',
                    'name' => 'sr_intro_body_sub',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_sr_intro_cta_text',
                    'label' => '导语按钮文案',
                    'name' => 'sr_intro_cta_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_pillars',
                    'label' => '社会责任支柱卡片',
                    'name' => 'sr_pillars',
                    'type' => 'repeater',
                    'layout' => 'row',
                    'button_label' => '添加支柱卡片',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_sr_pillar_key',
                            'label' => '内部标识',
                            'name' => 'sr_pillar_key',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_sr_pillar_title',
                            'label' => '标题',
                            'name' => 'sr_pillar_title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_sr_pillar_description',
                            'label' => '描述',
                            'name' => 'sr_pillar_description',
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
                        'value' => 'page',
                    ),
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-social-responsibility.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_social_responsibility_employees',
            'title' => '社会责任页面 - 员工责任模块',
            'fields' => array(
                array(
                    'key' => 'field_sr_employees_image',
                    'label' => '员工责任图片',
                    'name' => 'sr_employees_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_sr_employees_eyebrow',
                    'label' => '员工责任小标题',
                    'name' => 'sr_employees_eyebrow',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_employees_title',
                    'label' => '员工责任主标题',
                    'name' => 'sr_employees_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_employees_body',
                    'label' => '员工责任正文',
                    'name' => 'sr_employees_body',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
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
                        'value' => 'page-social-responsibility.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_social_responsibility_client',
            'title' => '社会责任页面 - 客户责任模块',
            'fields' => array(
                array(
                    'key' => 'field_sr_client_image',
                    'label' => '客户责任图片',
                    'name' => 'sr_client_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_sr_client_eyebrow',
                    'label' => '客户责任小标题',
                    'name' => 'sr_client_eyebrow',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_client_title',
                    'label' => '客户责任主标题',
                    'name' => 'sr_client_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_client_body',
                    'label' => '客户责任正文',
                    'name' => 'sr_client_body',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
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
                        'value' => 'page-social-responsibility.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_social_responsibility_environment',
            'title' => '社会责任页面 - 环境责任模块',
            'fields' => array(
                array(
                    'key' => 'field_sr_environment_image',
                    'label' => '环境责任图片',
                    'name' => 'sr_environment_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_sr_environment_eyebrow',
                    'label' => '环境责任小标题',
                    'name' => 'sr_environment_eyebrow',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_environment_title',
                    'label' => '环境责任主标题',
                    'name' => 'sr_environment_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_environment_body',
                    'label' => '环境责任正文',
                    'name' => 'sr_environment_body',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
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
                        'value' => 'page-social-responsibility.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_social_responsibility_vision',
            'title' => '社会责任页面 - 愿景模块',
            'fields' => array(
                array(
                    'key' => 'field_sr_vision_image',
                    'label' => '愿景图片',
                    'name' => 'sr_vision_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'large',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_sr_vision_eyebrow',
                    'label' => '愿景小标题',
                    'name' => 'sr_vision_eyebrow',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_vision_title',
                    'label' => '愿景主标题',
                    'name' => 'sr_vision_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_sr_vision_body',
                    'label' => '愿景正文',
                    'name' => 'sr_vision_body',
                    'type' => 'wysiwyg',
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
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
                        'value' => 'page-social-responsibility.php',
                    ),
                ),
            ),
        )
    );

    acf_add_local_field_group(
        array(
            'key' => 'group_elysia_global_page_references',
            'title' => 'Global - 关键页面引用',
            'fields' => array(
                array(
                    'key' => 'field_global_page_contact',
                    'label' => '联系页面',
                    'name' => 'global_page_contact',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_global_page_factory',
                    'label' => '工厂页面',
                    'name' => 'global_page_factory',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_global_page_project',
                    'label' => '项目案例页面',
                    'name' => 'global_page_project',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_global_page_quality_manufacturing',
                    'label' => '质量制造页面',
                    'name' => 'global_page_quality_manufacturing',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_global_page_social_responsibility',
                    'label' => '社会责任页面',
                    'name' => 'global_page_social_responsibility',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
                ),
                array(
                    'key' => 'field_global_page_faq',
                    'label' => 'FAQ 页面',
                    'name' => 'global_page_faq',
                    'type' => 'post_object',
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'allow_null' => 1,
                    'multiple' => 0,
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

// 引入首页 ACF 字段定义
require_once get_template_directory() . '/inc/acf-front-page.php';

// 允许 SVG 上传
function elysia_first_web_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'elysia_first_web_mime_types');

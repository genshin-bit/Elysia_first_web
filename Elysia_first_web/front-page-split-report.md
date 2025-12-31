# 首页模块拆分核对报告

**文件对象**：`wp-content/themes/Elysia_first_web/front-page.php`
**拆分目标**：将 Elementor 静态 HTML 结构解耦为 WordPress 标准模块 (`template-parts/`)

## 1. 拆分清单表格

| 建议文件名 (template-parts/) | 功能描述 | HTML 标识/锚点 (Section Data-ID) | 重用性评估 |
| :--- | :--- | :--- | :--- |
| **`layout/site-header.php`** | **全站页头** (Logo, 导航, 搜索, 抽屉触发) | `<header id="header">` ... `<div data-id="logo">` | **全站通用** (移出 front-page，由 `header.php` 调用) |
| **`components/overlay-search-modal.php`** | **搜索弹层** (全屏搜索框) | `<div id="search-modal" class="ct-panel">` | **全站通用** (组件) |
| **`components/panel-offcanvas-menu.php`** | **侧滑抽屉** (移动端菜单/扩展) | `<div id="offcanvas" class="ct-panel">` | **全站通用** (组件) |
| **`front-page/home-hero.php`** | **首屏 Hero** (视频背景, Slogan) | `data-id="0c2b206"` (含 `<video class="elementor-background-video-hosted">`) | 首页私有 |
| **`front-page/home-stats.php`** | **数据统计** (30+ Years, 1350+ Customers) | `data-id="4cf8d02"` (含 `30+ years`) | 首页私有 |
| **`front-page/section-about-intro.php`** | **企业简介** (Who We Are, 图文混排) | `data-id="9d7334d"` (含 `who we are`) | 首页私有 |
| **`front-page/section-category-grid.php`** | **产品分类入口** (Solar, Racking, Door&Window) | `data-id="c574375"` (标题) + `data-id="454207d"` (Grid) | 首页私有 |
| **`front-page/section-industry-grid.php`** | **行业应用入口** (Steel Structure, Highway) | `data-id="400003d"` (Grid Continuation) | 首页私有 (可与上方合并，建议分开维护) |
| **`front-page/section-feature-media.php`** | **核心优势/视频** (Why Choose Us, Video Popup) | `data-id="7901169"` (含 `Why You Choose Us`) | 首页私有 |
| **`front-page/section-product-grid.php`** | **推荐产品** (WooCommerce Products Loop) | `data-id="4e9a588"` (含 `elementor-widget-woocommerce-products`) | 首页私有 (逻辑可复用，但布局首页特有) |
| **`front-page/section-service-grid.php`** | **服务体系** (Design, Installation, Training) | `data-id="b34dc8e"` (含 `Check Out Our Service`) | 首页私有 |
| **`front-page/section-project-grid.php`** | **项目案例** (地图/国家分布, Gallery) | `data-id="8a2279e"` (含 `Our Projects`) | 首页私有 |
| **`layout/site-footer.php`** | **全站页脚** (Contact, Copyright, Catalog Popup) | `<footer data-elementor-type="footer">` | **全站通用** (移出 front-page，由 `footer.php` 调用) |
| **`components/popup-catalog-download.php`** | **图册下载弹窗** (通常挂载在页脚) | (需确认 Footer 内的具体 ID，通常为 Hidden Popup) | **全站通用** (组件) |

## 2. 拆分后的 front-page.php 结构预览

拆分后，主文件将非常清爽，仅负责结构编排。

```php
<?php
/**
 * The template for displaying the front page.
 *
 * @package Elysia_First_Web
 */

get_header(); // 包含 layout/site-header.php, components/overlay-search-modal.php 等
?>

<main id="main" class="site-main hfeed">
    <div class="ct-container-full" data-content="normal">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <div class="entry-content is-layout-constrained">
                <div class="elementor elementor-<?php the_ID(); ?>">
                    
                    <?php 
                    // 1. Hero Section
                    get_template_part( 'template-parts/front-page/home-hero' ); 

                    // 2. Stats Section
                    get_template_part( 'template-parts/front-page/home-stats' );

                    // 3. About Intro
                    get_template_part( 'template-parts/front-page/section-about-intro' );

                    // 4. Product Categories
                    get_template_part( 'template-parts/front-page/section-category-grid' );
                    get_template_part( 'template-parts/front-page/section-industry-grid' ); // 可选：如果拆分了行业区块

                    // 5. Why Choose Us (Video Feature)
                    get_template_part( 'template-parts/front-page/section-feature-media' );

                    // 6. Featured Products (WooCommerce Loop)
                    get_template_part( 'template-parts/front-page/section-product-grid' );

                    // 7. Services
                    get_template_part( 'template-parts/front-page/section-service-grid' );

                    // 8. Projects
                    get_template_part( 'template-parts/front-page/section-project-grid' );
                    ?>

                </div>
            </div>

        </article>
    </div>
</main>

<?php
get_footer(); // 包含 layout/site-footer.php, components/popup-catalog-download.php 等
?>
```

## 3. 核心注意项

在执行拆分操作时，请务必注意以下技术细节：

1.  **全局变量保留**：
    *   在 `section-product-grid.php` 中，WooCommerce 的产品循环（Loop）可能依赖全局 `$product` 对象。确保在 `get_template_part` 内部正确设置 Query，或者在主模板设置好 Query 传入（推荐在模板部分内部新建 `WP_Query` 以保持主循环干净）。
    *   `front-page.php` 原文件中的 `the_content()` 标准循环可能被 Elementor 覆盖。拆分后，我们实际上是在手动构建页面结构，这符合定制主题的最佳实践。

2.  **CSS 类名与 ID 兼容性**：
    *   Elementor 生成的代码依赖大量的 `data-id` 和 `elementor-element-xxxx` 类名来应用样式。**拆分时必须完整保留最外层的 Section 容器及其 Class/ID**（如表格中“HTML 标识”列所示），否则会导致样式崩坏。
    *   例如：Hero 模块必须包含 `<section class="elementor-section ... elementor-element-0c2b206 ...">` 这一层。

3.  **图片路径修正**：
    *   原 HTML 中存在大量硬编码的图片路径（如 `src="..."`）。拆分到 PHP 文件时，必须全部替换为动态路径：
        ```php
        <!-- 修改前 -->
        <img src=".../static/image/SUNWAY.png">
        
        <!-- 修改后 -->
        <img src="<?php echo get_template_directory_uri(); ?>/static/image/SUNWAY.png">
        ```

4.  **Header 与 Footer 的处理**：
    *   原 `front-page.php` 包含了 `<!DOCTYPE html>` 到 `</html>` 的完整代码。
    *   **必须**将 `<!DOCTYPE html>` 到 `<main>` 之前的内容提取到 `header.php`。
    *   **必须**将 `</main>` 之后的内容提取到 `footer.php`。
    *   确保在 `header.php` 关闭 `</head>` 前调用 `wp_head()`，在 `footer.php` 关闭 `</body>` 前调用 `wp_footer()`，这是插件（如 WooCommerce, Elementor）生效的关键。

5.  **WooCommerce Hooks**：
    *   虽然是静态拆分，但为了未来扩展性，建议在 `section-product-grid.php` 的产品列表容器前后添加自定义 Hook，例如 `do_action('swforming_before_product_grid')`，以便未来插入广告位预留。

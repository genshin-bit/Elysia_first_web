# Why Us 模块拆分核对报告

**文件对象**：`wp-content/themes/Elysia_first_web/page-why-us.php`  
**拆分目标**：将 Elementor 导出的 Why Us 页面静态 HTML，拆分为可维护的 WordPress 模块（`template-parts/one_page/` + 全站组件），同时保持现有样式与动效完全不变。

---

## 1. 拆分清单表格

| 建议文件名（template-parts/） | 功能描述 | HTML 标识/锚点 | 重用性评估 |
| :--- | :--- | :--- | :--- |
| **`one_page/why-us-hero.php`** | 页面首屏标题区，仅包含「Why Us」主标题及背景 Overlay。 | `section.elementor-top-section[data-id="68e9ab1"]`，内部 `h1.elementor-heading-title` 文本为 `Why Us`。 | **跨页面可复用**：结构符合《全站模块分析》中 `page-hero-title` 定义，后续可考虑统一收敛为 `components/page-hero-title.php`，暂在 `one_page` 目录中单独维护。 |
| **`one_page/why-us-intro.php`** | 左文右图的 Why Us 简介区块，包含「WE ARE WORTH YOUR TRUST」「We pay attention to every detail」两级标题、说明文案及右侧两张形象图片与「CONTACT US」按钮。 | `section.elementor-top-section[data-id="b0cbd04"]`，内部列 `data-id="e49f5b4"`（文案列）与 `data-id="3c62877d"`（图片列）。 | **单页私有**：文案与配图高度与 Why Us 内容绑定，目前仅此页使用，可作为 Why Us 私有模块维护。 |
| **`one_page/why-us-advantages-grid.php`** | 「Some Of Our main Advantages」优势栅格区块，包含三组内嵌 `inner-section`（6ce3e53f / 52b23a84 / 5adfb02a），每组内含 2 个 Icon Box（共 6 个优势点：We Own Factory / Fair Price / Flexible / One-Stop / Customer Support / Serve All Customer）。 | 外层 `section.elementor-top-section[data-id="595a10e5"]`，内部三段 `section.elementor-inner-section`：`data-id="6ce3e53f"`, `data-id="52b23a84"`, `data-id="5adfb02a"`。 | **单页私有（可复用候选）**：逻辑上属于 Why Us 场景，但结构上也适合在其它介绍页面复用（如 About / Factory）。当前按页面模块落位在 `one_page/`，后续若出现同构区块可抽象为通用组件。 |
| **`one_page/why-us-contact-popup.php`** | 「Get in touch with sunway」联系弹窗，承载 Zoho Contact Form iframe，由按钮（例如 Factory/其它页面内部 `#elementor-action:action=popup:open&id=306`）触发。 | `<div data-elementor-type="popup" data-elementor-id="306" class="elementor elementor-306 elementor-location-popup">`，内部 `h1` 文案为 `Get in touch with sunway`，`iframe[aria-label="Sunway Contact Form"]`。 | **跨单页可复用**：目前在多个内容页中有潜在复用价值，但尚未在《全站模块分析》中单独命名。建议先作为单页模块落在 `one_page/`，后续若确认多页共用可抽象为 `components/popup-contact.php`。 |
| **`components/popup-catalog-download.php`** | 「Latest Price & Catalog」全站级营销弹窗，承载 Zoho Catalog Download Contact Form iframe，按配置在页面加载后延时弹出。 | `<div data-elementor-type="popup" data-elementor-id="2636" class="elementor elementor-2636 elementor-location-popup">`，内部 `h3.elementor-heading-title` 文案为 `Latest Price &amp; Catalog`，`iframe[aria-label*="Catalog Download Contact Form"]`。 | **全站通用组件**：与《全站模块分析》中「全站营销弹窗（Catalog Download，popup-catalog-download）」完全对齐，应抽离至 `template-parts/components/popup-catalog-download.php`，并由 `footer.php` 统一调用，避免在各页面模板中保留重复静态 HTML。 |

> 说明：  
> - 本报告聚焦于 Why Us 页面自身的内容模块，不再重复记录 `layout/site-header.php` 与 `layout/site-footer.php` 等全站骨架模块，这些已在《模块 → 主题结构映射》和《首页模块拆分核对报告》中约定。  
> - 上表中 `one_page/` 下的文件命名，统一使用「页面语义 + 功能」的方式，方便与其它单页（如 Factory / Quality Manufacturing）保持一致。

---

## 2. 拆分后的 page-why-us.php 结构预览

拆分后，`page-why-us.php` 仅负责：
- 引入必要的 CSS/JS（与当前版本完全一致）；
- 维持 `<main>` / `<article>` / `.entry-content` 这些结构性容器；
- 通过 `get_template_part()` 调用具体模块。

示例结构如下（仅展示与模块拆分相关的关键部分）：

```php
<?php
/**
 * Template Name: why us
 * Why Us 页面模板（从 swforming/index-5.html 迁移）
 */

get_header();
?>

<?php // 样式与 JS 引入：保持与当前文件完全一致，仅略去无关行 ?>
<link rel='stylesheet' id='blocksy-dynamic-global-css' href='<?php echo get_template_directory_uri(); ?>/static/css/global.css' media='all' />
<link rel='stylesheet' id='wp-block-library-css' href='<?php echo get_template_directory_uri(); ?>/static/css/style.min.css' media='all' />
<!-- 其余 CSS / 内联样式 / Woo JS / okkiConfigs 脚本保持不变 -->

<main id="main" class="site-main hfeed">
    <div class="ct-container-full" data-content="normal">
        <article id="post-268" <?php post_class('page type-page status-publish hentry'); ?>>
            <div class="blocksy-woo-messages-default woocommerce-notices-wrapper">
                <div class="woocommerce"></div>
            </div>

            <div class="entry-content is-layout-constrained">
                <div data-elementor-type="wp-page" data-elementor-id="268" class="elementor elementor-268" data-elementor-post-type="page">

                    <?php
                    // 1. Why Us 首屏标题（建议与 page-hero-title 规范对齐）
                    get_template_part( 'template-parts/one_page/why-us-hero' );

                    // 2. Why Us 简介 + 双图 + 按钮
                    get_template_part( 'template-parts/one_page/why-us-intro' );

                    // 3. 优势栅格（Some Of Our main Advantages）
                    get_template_part( 'template-parts/one_page/why-us-advantages-grid' );
                    ?>

                </div>
            </div>
        </article>
    </div>
</main>

<?php
// 4. 联系我们弹窗（页面级或跨单页弹窗）
get_template_part( 'template-parts/one_page/why-us-contact-popup' );

// 注意：全站 Catalog 下载弹窗应由 footer.php 统一调用
// footer.php 内：get_template_part( 'template-parts/components/popup-catalog-download' );

get_footer();
?>
```

> 提示：`why-us-contact-popup.php` 模板内应包含原 `<div data-elementor-type="popup" data-elementor-id="306">...</div>` 结构及其内部 iframe；而 `popup-catalog-download.php` 模板则对应 `<div data-elementor-id="2636">`，并挂载到 `footer.php`。二者不要混用 ID/内容。

---

## 3. 核心注意项

在执行上述拆分时，建议重点关注以下技术细节，以避免打破现有样式与交互：

1. **保持 Elementor Section 外层容器完整**
   - 所有以 `section.elementor-top-section` / `section.elementor-inner-section` 开头的区块，必须在对应的 `template-parts/one_page/*.php` 中完整保留：包括 `data-id`、`data-element_type`、`data-settings` 以及所有 `elementor-element-xxxx` 类名。
   - 如 `why-us-advantages-grid.php` 中的三层 inner-section（6ce3e53f / 52b23a84 / 5adfb02a），需要连同内部的 Icon Box 组件整体拷贝，以确保动画（`motion_fx_*` 配置）和布局不受影响。

2. **脚本与全局对象（Woo / okkiConfigs）**
   - 顶部的 WooCommerce 相关脚本块：
     - `wc_add_to_cart_params`（`wc-add-to-cart-js-extra`）
     - `woocommerce_params`（`woocommerce-js-extra`）
     以及对应的 `add-to-cart.min.js`、`woocommerce.min.js` 引用，均应保持在 `page-why-us.php` 中统一输出，不要拆散到各个 `template-parts` 中，以避免重复注入或执行顺序异常。
   - `window.okkiConfigs` 与 `okkiAdd("analytics", {...})` 这一段统计脚本同样保持在主模板头部区域，避免在子模板中重复定义全局函数。

3. **懒加载脚本的唯一性**
   - 末尾的背景懒加载脚本：
     ```js
     const lazyloadRunObserver = () => {
         const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
         const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
             // ...
         }, {
             rootMargin: '200px 0px 200px 0px'
         });
         lazyloadBackgrounds.forEach((lazyloadBackground) => {
             lazyloadBackgroundObserver.observe(lazyloadBackground);
         });
     };
     ['DOMContentLoaded', 'elementor/lazyload/observe'].forEach((event) => {
         document.addEventListener(event, lazyloadRunObserver);
     });
     ```
   - 建议继续保留在 `page-why-us.php` 主文件中（或后续整理到统一的脚本片段中），**不要**在多个 `template-parts` 中重复此逻辑，以防止多次注册监听器导致性能问题或行为异常。

4. **全站营销弹窗（Catalog Download）抽象策略**
   - `<div data-elementor-id="2636">` 对应的结构已经在《全站模块分析》中被认定为「全站营销弹窗（popup-catalog-download）」：
     - 推荐文件：`template-parts/components/popup-catalog-download.php`
     - 推荐挂载位置：`footer.php` 内，通过 `get_template_part('template-parts/components/popup-catalog-download')` 调用。
   - 在 Why Us 页面拆分时，应：
     - 将该片段从 `page-why-us.php` 中剥离，放入上述组件文件；
     - 确保其它页面（如首页 / 产品页）不再保留额外副本，避免多处维护；
     - 在 `footer.php` 中统一引入，实现全站一致的弹窗行为（如延时、展示次数等）。

5. **模板职责边界与循环安全**
   - `template-parts/one_page/*.php` 文件内不应调用 `get_header()`、`get_footer()` 或 `the_content()`，只负责输出对应区块 HTML。
   - Why Us 页面当前不存在自定义 `WP_Query` 或 `$product` 相关 Loop，拆分过程中只要不新增自定义查询，便不会影响全局主循环。
   - 若未来在优势区块内加入产品推荐或动态内容，建议在对应的 `template-parts` 内部自行构造查询并在结束时使用 `wp_reset_postdata()`，保持页面其它部分逻辑独立。

6. **组件复用与命名一致性**
   - 首屏标题区块建议在视觉与结构上逐步与其它单页（About / Factory / Quality Manufacturing 等）统一，最终可以用 `components/page-hero-title.php` 这一通用组件替换各单页专用 Hero。
   - 所有新建文件的命名应遵守《模块映射》中推荐的语义化命名方式，避免出现难以理解的拼写或仅以数字命名的文件。

---

本报告生成后，可作为拆分 `page-why-us.php` 的操作清单与验收标准：  
- 是否所有 Section 块都已落到对应的 `template-parts/one_page/*.php` 中；  
- 是否 `popup-catalog-download` 已从页面模板中剥离并由 `footer.php` 统一挂载；  
- 是否未破坏现有样式、动画与弹窗逻辑。


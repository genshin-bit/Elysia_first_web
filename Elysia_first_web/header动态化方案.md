# header 动态化方案（header.php）

本文档基于当前主题的 [`header.php`](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/header.php)，并参考
[`模块映射.md`](file:///e:/phpstudy_pro/WWW/wp-content/themes/swforming/模块映射.md)
与整体页面拆分方案，对页头区域的“动态化”进行规划。

目标是在**不破坏从 swforming 导入的 CSS/JS 与 Elementor 结构**的前提下：

- 让标题、描述、canonical、OG 等 SEO 元信息按页面类型自动变化
- 让 JSON-LD Schema 优先使用 WordPress 数据，而不是写死为首页
- 让站点 favicon/logo 等来自 WordPress 配置或主题选项
- 为后续将静态资源迁移到 `functions.php` 的 `wp_enqueue_*` 做好结构铺垫

---

## 一、当前结构与约束概览

- 基础框架
  - `<!doctype html>` 与 `<html lang="en-US" prefix="og: https://ogp.me/ns#">` 写死为英文站
  - `<head>` 内包含 charset、viewport、profile 以及大量从 Blocksy / Elementor 导出的 CSS 变量样式
- SEO 与 Schema
  - `<title>`、`description`、`robots`、`canonical`、OG/Twitter Meta 均写死为首页文案
  - `application/ld+json` 中包含 `Corporation`、`WebSite`、`WebPage`、`Person`、`Article` 等多段 Schema，全部写死为首页 URL、标题和发布时间
- 资源加载
  - 多个 `<link rel="stylesheet">` 和 `<script>` 直接写在 `header.php` 中，路径统一使用 `get_template_directory_uri()` 指向 `static/css`、`static/js`
  - WooCommerce 相关 JS 配置（如 `wc_add_to_cart_params`、`woocommerce_params`）也以内联形式写在 `header.php`
  - favicon 和 Apple Touch Icon 直接指向 `https://swforming.com/wp-content/uploads/...`
- `<body>` 与全站模块
  - `<body <?php body_class(); ?> data-link="type-2" data-prefix="...">`，其中 `data-prefix` 根据 `is_product()` 切换 `product` 与 `single_page`
  - `is_product()` 时输出 Okki 分析埋点脚本，`siteId` 与 `gId` 写死
  - 通过 `get_template_part` 调用
    - `template-parts/components/overlay-search-modal`
    - `template-parts/components/panel-offcanvas-menu`
    - `template-parts/layout/site-header`
  - 以上 3 个模块与 [`模块映射.md`](file:///e:/phpstudy_pro/WWW/wp-content/themes/swforming/模块映射.md#L76-L98) 定义完全一致，属于全站公共模块，优先保持调用方式不变

---

## 二、动态化目标清单

> 说明：本节更关注“应该如何动态化”和“放在哪里实现”，实际落地可分阶段推进。

| 序号 | 要素                           | 现状（header.php）                                                                                               | 动态化目标                                                                                       | 实现要点                                                                                         |
| ---- | ------------------------------ | ----------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ |
| 1    | `<html>` 语言与属性           | `<html lang="en-US" prefix="og: https://ogp.me/ns#">` 写死                                                       | 使用 `language_attributes()` 输出语言和 dir，保留 OG prefix                                      | 将 `<html>` 改为 `<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns#">`       |
| 2    | 标题 `<title>`                | 写死为 “China roll forming machine manufacturer - SUNWAY Machine”                                                | 使用 WordPress 标题体系（前台可由 SEO 插件接管）                                                | 在主题启用 `add_theme_support('title-tag')`，移除硬编码 `<title>`，交给 `wp_head()`/插件输出   |
| 3    | Meta Description               | 始终输出首页描述，文章详情 / 分类等页面不变                                                                      | 首页用 `bloginfo('description')`，单篇内容用 `get_the_excerpt()` 或 SEO 插件输出                 | 没有 SEO 插件时，可在 `wp_head` 钩子里按 `is_front_page()` / `is_singular()` 分支输出           |
| 4    | Robots 与索引策略             | `<meta name="robots" content="follow, index, ...">` 全站通用                                                     | 根据页面类型与环境（生产/测试）灵活控制                                                         | 通过 `wp_head` 钩子或 SEO 插件配置 robots，必要时对 noindex 页面单独分支                       |
| 5    | Canonical                      | `<link rel="canonical" href="index.html" />` 写死                                                                | 每个 URL 输出自己的 canonical                                                                    | 优先交给 SEO 插件；无插件时在 `wp_head` 钩子中输出 `get_permalink()` 或 `home_url()`           |
| 6    | OG / Twitter Cards             | OG/Twitter 标题、描述、URL 均写死为首页                                                                         | 标题、描述、URL、图片随当前页面变化                                                             | 建议交给 Rank Math / Yoast 等插件；自实现时使用 `get_the_title()`、`get_the_excerpt()` 等       |
| 7    | JSON-LD Schema                 | Rank Math 导出的多段 JSON-LD，全字段写死为首页 URL、标题、时间                                                  | 基于当前页面动态生成 Schema，优先使用插件原生输出                                               | 推荐：删除这段静态 JSON-LD，让 Rank Math 自行输出；如需保留，自行替换为使用 WP 函数的 JSON-LD |
| 8    | Favicon / Site Icon            | 直接引用 `https://swforming.com/wp-content/uploads/...`                                                          | 使用 WordPress 站点图标配置                                                                      | 有 `has_site_icon()` 时调用 `wp_site_icon()`，无站点图标时保留 swforming 图标作为兜底          |
| 9    | 样式与脚本加载（CSS/JS）      | 大量 `<link>` / `<script>` 写在 `header.php`，模拟 swforming 导出的资源结构                                      | 短期保持现状以避免样式丢失；中长期迁移到 `functions.php` 中统一 `wp_enqueue_style/script`       | 新增样式或脚本时优先通过 enqueue；迁移时严格遵守当前加载顺序和依赖关系                         |
| 10   | WooCommerce 相关脚本与参数    | `wc_add_to_cart_params`、`woocommerce_params` 以硬编码 JSON 写在 `<script>` 中                                  | 交由 WooCommerce 自己的 `wp_localize_script()` 输出                                              | 检查迁移后是否存在重复参数注入，避免脚本执行两次                                               |
| 11   | `<body>` data-* 属性           | `data-prefix` 已根据 `is_product()` 在产品页使用 `product`，其他页面为 `single_page`                            | 保持该行为；如后续有更多页面类型需要细分，可扩展                                                 | 可将数据前缀逻辑抽到辅助函数，例如 `elysia_get_body_prefix()`                                  |
| 12   | Okki Analytics 埋点           | 仅在 `is_product()` 时输出 JS，`siteId`、`gId` 写死在 `header.php`                                               | 通过主题选项或常量配置 Okki 参数，避免写死；根据页面类型控制是否输出                             | 在 `wp_head` 或 `wp_footer` 中挂载输出函数，从 options 中读取 siteId/gId                        |
| 13   | 全站公共模块调用               | `overlay-search-modal`、`panel-offcanvas-menu`、`site-header` 通过 `get_template_part` 固定位置输出            | 保持调用方式与位置不变；后续仅在模块内部做动态化（登录状态、菜单、购物车数量等）               | 严格遵守 [`模块映射.md`](file:///e:/phpstudy_pro/WWW/wp-content/themes/swforming/模块映射.md#L76-L98) 的命名与路径 |
| 14   | WordPress 钩子兼容             | 当前未显式调用 `wp_head()`、`wp_body_open()`                                                                     | 在 `<head>` 末尾、`<body>` 开头加入对应钩子，兼容插件与小工具                                    | 添加钩子时保持现有脚本顺序不变，尤其是 Woo 与 Okki 埋点                                       |

---

## 三、header.php 动态化结构示例（伪代码）

> 以下示例用于说明改造方向，并非最终代码实现；实际代码需要在保持现有 CSS/JS 顺序的前提下逐步迁移。

```php
<!doctype html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, viewport-fit=cover">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php
    if (!current_theme_supports('title-tag')) {
        ?>
        <title><?php echo wp_get_document_title(); ?></title>
        <?php
    }

    if (!function_exists('rank_math') && !function_exists('yoast_seo')) {
        if (is_front_page() || is_home()) {
            ?>
            <meta name="description" content="<?php bloginfo('description'); ?>">
            <?php
        } elseif (is_singular()) {
            ?>
            <meta name="description" content="<?php echo esc_attr(wp_strip_all_tags(get_the_excerpt())); ?>">
            <?php
        }

        if (is_singular()) {
            ?>
            <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>">
            <?php
        } elseif (is_front_page() || is_home()) {
            ?>
            <link rel="canonical" href="<?php echo esc_url(home_url('/')); ?>">
            <?php
        }
    }

    if (function_exists('has_site_icon') && has_site_icon()) {
        wp_site_icon();
    } else {
        ?>
        <link rel="icon" href="https://swforming.com/wp-content/uploads/2022/09/sunway-100x100.png" sizes="32x32">
        <link rel="icon" href="https://swforming.com/wp-content/uploads/2022/09/sunway.png" sizes="192x192">
        <link rel="apple-touch-icon" href="https://swforming.com/wp-content/uploads/2022/09/sunway.png">
        <meta name="msapplication-TileImage" content="https://swforming.com/wp-content/uploads/2022/09/sunway.png">
        <?php
    }

    wp_head();
    ?>
</head>

<body <?php body_class(); ?> data-link="type-2" data-prefix="<?php echo (function_exists('is_product') && is_product()) ? 'product' : 'single_page'; ?>" data-header="type-1:sticky" data-footer="type-1" itemscope="itemscope" itemtype="https://schema.org/WebPage">
<?php
wp_body_open();

if (function_exists('is_product') && is_product()) {
    $okki_site_id = get_option('elysia_okki_site_id', '39166-9223');
    $okki_gid     = get_option('elysia_okki_gid', 'UA-238156102-34');
    ?>
    <script>
        window.okkiConfigs = window.okkiConfigs || [];
        function okkiAdd() {
            okkiConfigs.push(arguments);
        }
        okkiAdd("analytics", {
            siteId: "<?php echo esc_js($okki_site_id); ?>",
            gId: "<?php echo esc_js($okki_gid); ?>"
        });
    </script>
    <script async src="<?php echo get_template_directory_uri(); ?>/static/js/analyze.js"></script>
    <?php
}
?>

<a class="skip-link screen-reader-text" href="#main">Skip to content</a>
<div class="ct-drawer-canvas" data-location="start">
    <?php get_template_part('template-parts/components/overlay-search-modal'); ?>
    <?php get_template_part('template-parts/components/panel-offcanvas-menu'); ?>
</div>
<div id="main-container">
    <?php get_template_part('template-parts/layout/site-header'); ?>
```

> 实际改造时，可保持所有 CSS/JS `<link>` 与 `<script>` 在 `wp_head()` 调用之前按现有顺序存在，然后逐步迁移到 `functions.php`，确保任何阶段页面样式和功能不受影响。

---

## 四、实施步骤建议

为降低风险，建议将 header 动态化拆分为以下几个阶段实施：

1. 注入 WordPress 钩子，确保插件兼容
   - 在 `<head>` 末尾插入 `wp_head()`
   - 在 `<body>` 打开标签后插入 `wp_body_open()`
   - 这一步可以与现有 CSS/JS 共存，不改变任何资源加载
2. 处理 favicon / Site Icon
   - 优先使用 `has_site_icon()` + `wp_site_icon()` 输出站点图标
   - 无站点图标时保留 swforming 图标作为兜底，保证品牌展示不丢失
3. 动态化标题与描述
   - 在主题中启用 `add_theme_support('title-tag')`，移除硬编码 `<title>`
   - 没有 SEO 插件时，在 `wp_head` 钩子中按页面类型输出 `<meta name="description">`
   - 一旦启用 Rank Math/Yoast，应避免重复输出 description 与 canonical
4. 优化 canonical 与 OG/Twitter
   - 使用 `get_permalink()` 或 `home_url()` 输出 canonical
   - 推荐交由 SEO 插件统一生成 OG/Twitter Meta，避免与插件输出冲突
5. 处理 JSON-LD Schema
   - 若站点使用 Rank Math，建议删除现有静态 JSON-LD，让插件自动输出
   - 若要自定义 Schema，则在单独 PHP 函数中使用 `get_bloginfo()`、`get_the_title()`、`get_the_time()` 等拼装 JSON，避免写死为首页
6. 渐进式迁移 CSS/JS
   - 新增样式与脚本时不再直接写在 `header.php`，而是在 `functions.php` 中通过 `wp_enqueue_style()` / `wp_enqueue_script()` 注册
   - 对已有静态资源按模块分批迁移，例如：
     - 通用前端样式/脚本：挂到 `wp_enqueue_scripts`
     - WooCommerce 相关脚本：挂到 `wp_enqueue_scripts` 并加 `is_woocommerce()` / `is_product()` 条件
   - 每迁移一批资源后，进行页面回归测试，验证样式与交互是否正常
7. 抽象 Okki Analytics 配置
   - 在主题或插件中提供设置项（如 `elysia_okki_site_id`、`elysia_okki_gid`）
   - 埋点脚本从这些设置中读取配置，而不是写死在 `header.php`
   - 长期来看，可考虑将 Okki 脚本统一挂载到 `wp_footer`，减轻首屏阻塞

---

## 五、核心注意项

- 与全站模块拆分的关系
  - `overlay-search-modal`、`panel-offcanvas-menu`、`site-header` 已按照 [`模块映射.md`](file:///e:/phpstudy_pro/WWW/wp-content/themes/swforming/模块映射.md#L76-L98) 抽象为全站公共模块，header 动态化时**不要改变它们的调用路径与位置**，仅在模块内部做进一步动态化（如菜单、登录状态、小购物车等）。
- 与 Elementor / swforming 样式的兼容
  - header 中大量 CSS 与 JS 来自 swforming 导出的结构，例如 `elementor-frontend.min.css`、`widget-*` 系列样式。
  - 在迁移到 `wp_enqueue_*` 之前，务必保证：
    - 所有 Elementor `data-id`、类名等结构在页面中保持不变
    - 资源加载顺序不被打乱（特别是依赖 jQuery、Swiper 的脚本）
- 与 SEO 插件的职责边界
  - 若站点已经或计划使用 Rank Math / Yoast 等 SEO 插件，应让插件优先接管：
    - `<title>`
    - description
    - canonical
    - OG / Twitter Meta
    - JSON-LD Schema
  - header 动态化方案主要负责“兜底逻辑”，避免在没有插件时完全没有 SEO 信息，同时防止与插件重复输出。
- 与 WooCommerce 的兼容
  - WooCommerce 自带的脚本和参数注入已经通过 `wp_enqueue_script()` 与 `wp_localize_script()` 实现。
  - 对当前 header 中硬编码的 Woo 脚本，在迁移前需要确认是否会与插件自身输出重复，避免导致事件绑定两次或 JS 错误。
- 与性能与缓存
  - 在 `wp_head` 中动态输出的内容应尽量简短，避免复杂计算。
  - Okki、Swiper 等第三方或大体积脚本，可考虑放到页尾或使用 `defer`/`async`，但需要逐步验证不会影响现有交互。

通过以上步骤，`header.php` 可以在保持现有视觉与交互不变的前提下逐步完成动态化，为日后统一 SEO 管理、资源优化和全站模块复用打下基础。


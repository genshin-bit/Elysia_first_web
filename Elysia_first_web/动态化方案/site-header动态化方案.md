# site-header 动态化方案（site-header.php）

本文档基于当前主题的 [`template-parts/layout/site-header.php`](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/layout/site-header.php)，并参考
[`模块映射.md`](file:///e:/phpstudy_pro/WWW/wp-content/themes/swforming/模块映射.md)
与整体模块拆分策略，对 **站点页头（site-header）** 的动态化改造进行规划。

目标是在**不破坏从 swforming 导入的 Elementor/Blocksy 结构和样式**的前提下：

- 让导航菜单、链接、Logo 等从 WordPress 数据自动生成，而不是写死为 swforming 的 HTML
- 在桌面端与移动端保持一致的站点信息与菜单结构
- 提供良好的多语言兼容能力（为后续接入翻译/多语言插件做准备）
- 保证现有 `overlay-search-modal` / `panel-offcanvas-menu` / `site-header` 三大公共模块联动正常

---

## 一、当前结构与约束概览

### 1.1 结构概览

`site-header.php` 当前整体结构：

- 根元素：`<header id="header" class="ct-header" data-id="type-1" itemscope itemtype="https://schema.org/WPHeader">`
- 内部分为两套布局：
  - 桌面端：`<div data-device="desktop" data-transparent="">`
    - 顶部 row：`data-row="top"`，包含社交图标（Facebook / YouTube / Instagram）
    - 中部 row：`data-row="middle"`，为 sticky 容器
      - 左列 `data-column="start"`：站点 Logo（指向首页）
      - 右列 `data-column="end"`：主导航菜单 + 搜索按钮
  - 移动端：`<div data-device="mobile" data-transparent="">`
    - sticky row：左侧 Logo，右侧汉堡菜单按钮（控制 `#offcanvas`）

### 1.2 主要内容与现有问题

1. **Header 顶部社交图标**
   - Facebook / YouTube / Instagram 链接全部写死为 swforming 的社交账号 URL
   - SVG 图标与类名（`ct-header-socials`、`ct-social-box`、`ct-label` 等）来自 Blocksy，样式依赖现有 CSS
2. **Logo 区域（桌面+移动）**
   - 链接 href 写死为 `index.html`，而非 `home_url('/')`
   - Logo 图片 `src` 使用 `get_template_directory_uri() . '/static/image/SUNWAY.png'`，但 `srcset` 和大小信息仍引用 `https://swforming.com/wp-content/...`
   - `alt="SUNWAY Machine"`，且缺少与 WordPress “站点标题”联动
3. **主导航菜单（桌面端）**
   - 完整菜单结构直接从 swforming 导入为纯 HTML：
     - 顶级菜单：Home / Product / About Us / Blog / Solution / More Machines / Contact
     - 多级子菜单全部写死为 `https://swforming.com/...` 的分类链接或页面地址
   - 没有使用 WordPress 的 `wp_nav_menu()`，无法在后台通过“外观 -> 菜单”进行管理
   - 菜单相关类名（`ct-menu-link`、`animated-submenu-inline` 等）依赖现有 CSS 和 JS 行为
4. **搜索按钮**
   - 搜索按钮是一个 `<button class="ct-header-search ct-toggle">`，通过 `data-toggle-panel="#search-modal"` 调用 `overlay-search-modal` 模块
   - 文案、结构已满足需求，行为依赖 header 外部的 `overlay-search-modal` 模块，不需要在本文件里动态生成数据
5. **移动端 Header**
   - 移动端 Logo 区与桌面端完全重复（同样写死 `index.html` 和 swforming 链接）
   - 菜单按钮为 `<button class="ct-header-trigger ct-toggle" data-toggle-panel="#offcanvas">`，行为依赖 `panel-offcanvas-menu` 模块
   - Label 文案写死为 `"Menu"`，对多语言支持较弱

---

## 二、动态化目标清单

> 本节重点描述“site-header 应当如何从 WordPress 数据动态生成”，实现时需要兼顾 Blocksy/Elementor 结构与现有 CSS。

| 序号 | 区块/要素                     | 现状（site-header.php）                                                                                                       | 动态化目标                                                                                              | 实现要点                                                                                                  |
| ---- | ------------------------------ | ----------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------- |
| 1    | 顶部社交图标（desktop top row） | Facebook / YouTube / Instagram 链接写死为 swforming 账号 URL，文案写死，结构为纯 HTML                                        | 从主题选项或自定义字段读取社交 URL 和是否展示，支持增减平台                                            | 保持 `.ct-header-socials` / `.ct-social-box` / SVG 结构不变，仅替换 href、aria-label、可见文案            |
| 2    | Logo 链接（desktop + mobile）   | `href="index.html"` 写死为静态 HTML                                                                                           | 使用 `home_url('/')` 或 `get_bloginfo('url')` 作为首页链接                                             | 统一改为 `href="<?php echo esc_url(home_url('/')); ?>"`                                                   |
| 3    | Logo 图片源                     | `src` 指向主题内 `static/image/SUNWAY.png`，`srcset` 和尺寸信息仍指向 swforming 媒体库 URL                                   | 优先使用 WordPress 自定义 Logo（`get_custom_logo()`），无自定义 Logo 时继续使用当前静态资源作为兜底     | 将 Logo 输出封装为一个小函数：优先 `get_custom_logo()`，否则输出当前 `<img>` 结构                        |
| 4    | Logo 文案与 SEO 属性           | `alt="SUNWAY Machine"` 写死                                                                                                   | alt 文案至少默认使用 `get_bloginfo('name')`，更符合站点品牌                                             | 保持类名和尺寸不变，仅替换 alt 内容；在兜底静态图片时 alt 使用站点名称                                   |
| 5    | 主导航菜单（desktop）           | 完整菜单结构写死为 HTML，所有链接直接写为 swforming URL                                                                       | 使用 `wp_nav_menu()` 输出菜单项，通过 `theme_location` 关联到后台的“主菜单”                            | 使用自定义 Walker 或 `nav_menu_link_attributes` 等过滤器，为 `<a>` 和 `<li>` 补充 Blocksy 所需类与属性    |
| 6    | 菜单激活状态                   | 通过 `current-menu-item`、`current_page_item` 等类名写死在 HTML                                                               | 利用 `wp_nav_menu()` 输出的当前项类名自动处理激活状态                                                   | 在 `wp_nav_menu()` 的 `container_class` / `menu_class` 中保留 `.menu` 和 `header-menu-1` 等容器类         |
| 7    | Product Mega Menu 结构         | 多级 `<ul class="sub-menu">` 全写死为 swforming 的 product_cat 分类链接                                                       | 后台通过菜单管理产品分类项，site-header 只负责渲染结构                                                  | 若需要“自动列出某分类下所有产品分类”，可以在菜单 Walker 内根据菜单项 type 实现特殊渲染                   |
| 8    | Search 按钮                     | `<button class="ct-header-search ct-toggle" data-toggle-panel="#search-modal">` 写死结构                                     | 保持结构不变，仅在必要时将按钮文案 `Search` 抽到翻译函数                                                | 文案用 `esc_html_e('Search', 'elysia-first-web');`，即兼容多语言，同时不动数据属性                       |
| 9    | 移动端 Logo + Trigger           | 移动端 Logo 重复桌面端逻辑，href、alt、图片同样写死；菜单按钮文案写死为 `Menu`                                               | 与桌面端统一使用同一 Logo 输出逻辑；菜单按钮文案支持多语言                                             | 移动端 logo 调用同一函数；按钮文案用 `esc_html_e('Menu', 'elysia-first-web');`                            |
| 10   | Schema/SEO 元信息              | `<header>` 已包含 `itemscope="" itemtype="https://schema.org/WPHeader"`，但内部元素没有与 Schema 有更深层联动                | 保持当前 Schema 标记，必要时可为 Logo 链接元素添加 `itemprop="url"`，为 `<img>` 添加 `itemprop="logo"` | 不改变现有 `itemscope` / `itemtype`，只在 HTML 属性层面微调                                              |
| 11   | 多语言支持                      | 所有文案（Home / Product / About Us / Menu / Search 等）写死为英文                                                            | 通过 `wp_nav_menu()` 输出菜单项（可由多语言插件接管），按钮文案用 `__()` / `_e()` 函数                 | 确保 site-header 不直接写死任何可翻译文案，全部经过翻译函数                                              |
| 12   | 与 overlay-search / offcanvas 联动 | search 按钮和 mobile trigger 通过 `data-toggle-panel="#search-modal"`/`#offcanvas`，与其他组件协同                            | 结构与属性保持不变，site-header 内部不改变这两个 data 属性                                              | `overlay-search-modal` 与 `panel-offcanvas-menu` 的调用在 `header.php` 内保持现状                        |

---

## 三、site-header 动态化结构示例（伪代码）

> 以下示例展示的是“改造方向”，不要求一次性全部落地。重点是用 WordPress 数据替代写死的 HTML，同时保持类名和 data-* 不变。

### 3.1 Logo 输出函数示例

建议在 `functions.php` 中新增一个专用函数，用于统一输出 Logo：

```php
function elysia_first_web_site_logo() {
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
        />
    </a>
    <?php
}
```

site-header 中原来写死的 `<a href="index.html">...</a>` 改为：

```php
<div class="site-branding" data-id="logo" itemscope="itemscope" itemtype="https://schema.org/Organization">
    <?php elysia_first_web_site_logo(); ?>
</div>
```

> 注意：若有必要保留 `srcset` 和 `sizes`，可以在兜底 `<img>` 中继续使用同一套 `srcset` 值；对于 `the_custom_logo()` 输出的图片，WordPress 会自动注入 `srcset` 属性。

### 3.2 主导航菜单输出示例

在 `functions.php` 中注册菜单位置（如果尚未注册）：

```php
function elysia_first_web_setup() {
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'elysia-first-web'),
        )
    );
}
add_action('after_setup_theme', 'elysia_first_web_setup');
```

然后将原来整段 `<nav id="header-menu-1" ...><ul>...</ul></nav>` HTML 替换为：

```php
<nav
    id="header-menu-1"
    class="header-menu-1 menu-container"
    data-id="menu"
    data-interaction="hover"
    data-menu="type-2:default"
    data-dropdown="type-1:simple"
    data-stretch
    data-responsive="no"
    itemscope="itemscope"
    itemtype="https://schema.org/SiteNavigationElement"
    aria-label="<?php esc_attr_e('Main Menu', 'elysia-first-web'); ?>"
>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'primary',
            'container'      => '',
            'menu_id'        => 'menu-main-menu',
            'menu_class'     => 'menu',
            'fallback_cb'    => false,
        )
    );
    ?>
</nav>
```

> 若要保持 `ct-menu-link`、`animated-submenu-inline` 等自定义类名，可以通过：
>
> - 自定义 Walker（继承 `Walker_Nav_Menu`）
> - 或 `nav_menu_link_attributes` / `nav_menu_css_class` / `nav_menu_submenu_css_class` 等过滤器
>
> 来补充这些类名和 data 属性。这样既能使用后台菜单管理，又能维持 Blocksy/Elementor 的样式和交互行为。

### 3.3 社交图标动态化示例

在 `functions.php` 中定义一个简单配置获取函数（可后续替换为主题选项）：

```php
function elysia_first_web_get_social_links() {
    return array(
        'facebook'  => get_option('elysia_social_facebook', 'https://www.facebook.com/wuxisunway'),
        'youtube'   => get_option('elysia_social_youtube', 'https://www.youtube.com/@sunwayforming'),
        'instagram' => get_option('elysia_social_instagram', 'https://www.instagram.com/wuxisunway/'),
    );
}
```

site-header 顶部社交区域可改为：

```php
<?php $social_links = elysia_first_web_get_social_links(); ?>
<div class="ct-header-socials" data-id="socials">
    <div class="ct-social-box" data-color="custom" data-icon-size="custom" data-icons-type="simple">
        <?php if (!empty($social_links['facebook'])) : ?>
            <a href="<?php echo esc_url($social_links['facebook']); ?>" data-network="facebook" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                <span class="ct-icon-container">
                    <!-- 原有 SVG 保留 -->
                </span>
                <span class="ct-label ct-hidden-sm ct-hidden-md" aria-hidden="true">Facebook</span>
            </a>
        <?php endif; ?>
        <!-- YouTube / Instagram 按同样模式输出 -->
    </div>
</div>
```

> SVG 代码与类名全部保持不变，确保样式完全一致；仅链接数据来自 options。

### 3.4 移动端 Header 动态化

移动端 header 中的 Logo 调用同一 `elysia_first_web_site_logo()` 函数，菜单按钮保留现有结构，仅文案改为可翻译：

```php
<div class="site-branding" data-id="logo">
    <?php elysia_first_web_site_logo(); ?>
</div>

<button
    class="ct-header-trigger ct-toggle"
    data-toggle-panel="#offcanvas"
    aria-controls="offcanvas"
    data-design="simple"
    data-label="right"
    aria-label="<?php esc_attr_e('Menu', 'elysia-first-web'); ?>"
    data-id="trigger"
>
    <span class="ct-label ct-hidden-sm ct-hidden-md ct-hidden-lg" aria-hidden="true">
        <?php esc_html_e('Menu', 'elysia-first-web'); ?>
    </span>
    <!-- 原有 SVG 保留 -->
</button>
```

---

## 四、实施步骤建议

为降低对线上样式/交互的影响，建议按以下顺序逐步落地：

1. **Logo 动态化**
   - 在 `functions.php` 中添加 `elysia_first_web_site_logo()` 辅助函数。
   - 替换桌面端与移动端 Header 内的 Logo `<a>` 结构为 PHP 函数调用。
   - 测试首页与内页，确保：
     - href 指向当前站点首页
     - 自定义 Logo 正常显示（如无自定义 Logo，则显示静态 SUNWAY 图片）
2. **注册并切换主菜单到 `wp_nav_menu()`**
   - 在 `functions.php` 中注册 `primary` 菜单位置。
   - 后台创建“主菜单”，并分配到 `primary` 位置。
   - 用 `wp_nav_menu()` 替换原有 `<ul id="menu-main-menu"...>` 结构。
   - 首先只保证功能可用（不追求完全一致的类名），确认菜单跳转正确。
3. **补齐菜单类名与样式细节**
   - 根据实际效果，使用：
     - 自定义 Walker
     - `nav_menu_css_class` / `nav_menu_link_attributes` / `nav_menu_submenu_css_class` 过滤器
   - 逐步为菜单项补回：
     - `ct-menu-link`
     - `menu-item-has-children`、`animated-submenu-inline` 等类
     - `data-toggle-dropdown-desktop` 等交互所需属性
   - 每调整一批类名后，用浏览器检查 hover、下拉、sticky 行为是否正常。
4. **动态化顶部社交图标**
   - 在 `functions.php` 中定义 `elysia_first_web_get_social_links()`，从 options 读取 URL。
   - 替换顶部社交 HTML，将 href 改为从配置中读取；保留 SVG 和类名。
   - 后续可以在后台添加简单设置页，让用户在 UI 中配置社交账号链接。
5. **多语言文案处理**
   - 将按钮文案（Search / Menu 等）全部包裹在翻译函数中（`__()` / `_e()`）。
   - 确保 site-header 内不再出现硬编码的英文文案。
6. **回归测试**
   - 在桌面与移动设备上分别测试：
     - 首页与多个内页的 header 显示
     - 主菜单 hover / 展开子菜单行为
     - 移动端 offcanvas 菜单触发
     - 顶部社交链接跳转、Search 弹层是否正常

---

## 五、核心注意项

- **与全站公共模块的协同**
  - site-header 与 `overlay-search-modal`、`panel-offcanvas-menu` 共同构成全站页头体验。
  - 改造过程中**不要修改**：
    - search 按钮上的 `data-toggle-panel="#search-modal"`
    - mobile trigger 上的 `data-toggle-panel="#offcanvas"`
  - 仅在 menu / logo / social 链接内部进行动态化。

- **保持 Blocksy/Elementor 结构不变**
  - 不要删除或随意重命名：
    - `ct-header` / `ct-container` / `ct-header-socials` / `header-menu-1` / `ct-menu-link` 等类
    - `data-row` / `data-column` / `data-device` 等 data 属性
  - 尽量在“标签内部”做替换（href、alt、文案），而不是重写整个 DOM 结构。

- **与 WooCommerce / 产品结构的解耦**
  - 原有菜单中产品分类链接全部写死为 swforming 的 URL。
  - 用 `wp_nav_menu()` 动态化后，产品分类菜单由后台管理，不再依赖 site-header 模板。
  - 若需要自动示意（例如自动列出某个 product_cat 下所有分类），建议通过：
    - 自定义 Walker 里判断菜单项类型
    - 或在菜单项自定义字段中增加配置，避免在模板内硬编码分类列表。

- **SEO 与 Schema**
  - 站点页头已经有 `itemtype="https://schema.org/WPHeader"`，不建议大幅修改。
  - Logo 区域如使用 `get_custom_logo()`，WordPress 会自动输出合理的 `itemprop` 属性，不必强行覆盖。

通过以上步骤，`site-header.php` 可以从当前的“完全静态 HTML”演进为“结构保持不变、数据完全来自 WordPress”的动态页头，实现菜单、Logo、社交信息的后台可配置，同时为多语言与 SEO 友好输出打下基础。


# site-footer 动态化方案（site-footer.php）

本文档基于当前主题的 [`template-parts/layout/site-footer.php`](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/layout/site-footer.php)，并参考整体模块拆分策略，对 **站点页脚（site-footer）** 的动态化改造进行规划。

目标是在 **不破坏从 swforming 导入的 Elementor 结构和样式** 的前提下：

- 让 Footer 中的链接、Logo、版权信息等从 WordPress 数据或配置自动生成，而不是写死为 swforming 的 HTML
- 尽量将“业务数据”（分类列表、公司信息、联系方式、社交账号）从模板中抽离，便于后台配置和后期维护
- 为后续多语言、换站点品牌等需求打好基础

---

## 一、当前结构与约束概览

### 1.1 结构概览

`site-footer.php` 当前整体结构：

- 根元素：`<footer data-elementor-type="footer" data-elementor-id="442" class="elementor elementor-442 elementor-location-footer" ...>`
- 内部分为三个主要 section（均为 Elementor section/column/widget 结构）：
  1. **顶部 CTA 区块**
     - 左侧文字：
       - 标题：`Contact Us To Get The Newest Quotation`
       - 正文：一段英文描述性文案
       - 按钮：文本 `CONTACT SUNWAY`，链接 `href="http://contact"`
     - 右侧图片画廊：
       - 两张证书类图片，实际 `src` 指向当前主题内的静态图片（`/static/image/...`），而 `srcset` 指向 swforming 站点的远程 URL
  2. **中部四列信息区**
     - 第 1 列：Logo + 公司简介
       - Logo：`<img src="<?php echo get_template_directory_uri(); ?>/static/image/SUNWAY.png" ...>`
       - Logo 链接：`<a href="index.html">`
       - 简介：一段英文公司介绍
     - 第 2 列：Category 列表（产品分类入口）
       - 标题：`Category`
       - 列表项：Electric & Energy / Racking & Shelving / Steel Structure / Metal Wall & Roofing / Highway Engineering & Vehicle / Door & Windows
       - 多数链接写死为 `https://swforming.com/product-category/...`，其中 Electric & Energy 使用的是 `index-2.html`
     - 第 3 列：Company 链接列表（公司相关页面）
       - 标题：`Company`
       - 列表项：About Us / Why Us / Our Factory / Social Responsibility / Sunway Manufacturing / Wuxi Sunway
       - 链接为 `index-4.html`、`index-5.html` 等本地静态 HTML，及 `http://wuxisunway.com/` 外链
     - 第 4 列：Contact + Follow Us
       - 标题：`Contact`
       - 联系方式列表：
         - 电话：`+86-13616182007`
         - 邮件：Cloudflare 邮件保护链接，指向 `https://swforming.com/cdn-cgi/l/email-protection`，并包含 `data-cfemail`
         - 地址：`Wuxi, China`
       - 标题：`follow US`
       - 社交图标：Facebook / Youtube / Instagram，链接写死为 swforming 的账号
  3. **底部版权声明区**
     - 文本：`Copyright © 2025 Wuxi Sunway Machinery Co., Ltd`
     - 固定年份 2025，固定公司名称

### 1.2 主要问题与约束

1. **Logo 与链接品牌强绑定 swforming**
   - Footer 中 Logo 图片与 Header 一致，使用 SUNWAY 静态图，链接 `href="index.html"` 为静态 HTML。
   - alt 为空，未与站点标题联动。
2. **分类链接与产品结构写死**
   - Category 列表使用 swforming 站点的 product-category URL，未与当前站点的产品分类结构（或自定义文章类型）绑定。
   - 单个分类 `Electric & Energy` 使用 `index-2.html` 而非分类链接。
3. **公司链接写死为静态页面 URL**
   - About Us、Why Us 等链接均为 `index-X.html`，与当前 WordPress 页面 ID/slug 无任何关联。
4. **联系方式与社交账号写死**
   - 电话、邮箱、地址、社交链接等全部硬编码在模板中，难以在后台维护。
   - 邮箱通过 Cloudflare `__cf_email__` 方案渲染，当前域名为 swforming.com。
5. **版权信息固定年份和公司名**
   - 年份写死为 `2025`，未来需要手工改。
   - 公司名写死为 `Wuxi Sunway Machinery Co., Ltd`，无法适配其它品牌站点。
6. **Elementor 结构与样式依赖**
   - 整个 Footer 结构高度依赖 Elementor 的类名（`elementor-section` / `elementor-column` / `elementor-widget` 等）。
   - 为保持样式，需要尽量在标签内部做“内容替换”，避免改动 class 和 DOM 层级。

---

## 二、动态化目标清单

> 本节重点描述“site-footer 应当如何从 WordPress 数据或配置动态生成”，实现时需兼顾 Elementor 结构与现有 CSS。

| 序号 | 区块/要素                | 现状（site-footer.php）                                                                                                 | 动态化目标                                                                                     | 实现要点                                                                                           |
| ---- | ------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ---------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| 1    | 顶部 CTA 标题与正文      | 标题、正文英文文案全部写死                                                                                               | 从主题选项或页面内容读取，可支持中英文或多语言                                                | 提供简单 options 或使用某个“联系我们”页面的自定义字段；Footer 模板只负责输出                      |
| 2    | 顶部 CTA 按钮           | 按钮文本 `CONTACT SUNWAY`，链接 `http://contact` 写死                                                                    | 按钮文本可翻译；链接可在后台配置或指向“联系”页面                                             | 使用 `__()`/`_e()` 包裹按钮文本；链接可使用 `get_permalink()` 或从 option 中读取                   |
| 3    | 顶部证书图片画廊         | 两张图片的 `src` 来自本主题静态资源，`srcset` 来自 swforming CDN                                                        | 优先使用当前站点媒体库中的证书图片，可从选项或 attachment ID 列表读取                         | 若未配置，保留现有静态图作为兜底；结构、类名保持不变                                             |
| 4    | Footer Logo 链接与图片   | `<a href="index.html"><img src=".../SUNWAY.png" ...></a>`，alt 为空，srcset 指向 swforming                              | 统一复用 Header 的 Logo 输出逻辑，链接指向 `home_url('/')`，alt 至少使用站点名称              | 建议直接调用 `elysia_first_web_site_logo()` 或类似函数，保证 Header/Footer Logo 一致              |
| 5    | 公司简介文案             | 一段英文介绍写死                                                                                                         | 允许从站点描述或自定义选项中读取，可支持多语言                                               | 可以默认使用 `get_bloginfo('description')`，必要时使用主题选项覆盖                               |
| 6    | Category 列表            | 链接指向 swforming 的产品分类 URL 或本地 index-X.html，文案写死                                                         | 使用当前站点的产品分类（或指定 taxonomy）动态生成，或通过菜单/选项配置列表                   | 避免在模板硬编码 URL；可以使用菜单（theme_location）或选项数组，保持 `.elementor-icon-list-items` 结构 |
| 7    | Company 链接列表         | 链接为本地 index-X.html 和外链，完全写死                                                                               | 使用 WordPress 菜单（如 `footer_company` 位置）管理；支持多语言和可视化排序                  | 保持 `<ul class="elementor-icon-list-items">` 结构不变，内部 `<li><a>` 由 `wp_nav_menu()` 渲染     |
| 8    | 联系电话 / 邮件 / 地址   | 电话、邮件（Cloudflare 保护）、地址写死为 swforming 公司的信息                                                          | 从主题选项读取联系方式；邮件使用标准 mailto 链接                                               | 提供 `elysia_first_web_get_footer_contacts()` 类似函数，从 options 中集中读取                    |
| 9    | Footer 社交图标          | Facebook / Youtube / Instagram 链接写死为 swforming 的账号                                                              | 复用或共用 Header 的社交链接配置（如 `elysia_first_web_get_social_links()`）                  | 保留 `.elementor-social-icon` 结构，只替换 href 和可见文本，便于与 Header 配置保持一致          |
| 10   | 版权年份与公司名         | 文本写死为 `Copyright © 2025 Wuxi Sunway Machinery Co., Ltd`                                                             | 年份自动使用 `date('Y')`；公司名从站点名称或自定义选项读取                                    | 模板中组合：`date('Y')` + `get_bloginfo('name')` 或自定义公司名称选项                             |
| 11   | 多语言支持               | 所有可见英文文案（标题、按钮、列表文本等）写死                                                                          | 使用 `__()` / `_e()` 包裹所有硬编码字符串，菜单/分类文本交给多语言插件处理                    | 确保 Footer 里不再直接输出硬编码英文，而是通过翻译函数或从数据源获取                             |
| 12   | Elementor 结构与样式约束 | 所有 section/column/widget 的 class、data-* 均依赖 Elementor，改动 DOM 结构可能导致样式错乱                             | 尽量保持 DOM 结构和类名不变，仅替换内部内容                                                   | 不删除 `elementor-section` / `elementor-column` 等 class；在 `<a>`、`<span>` 内部做内容替换       |

---

## 三、site-footer 动态化结构示例（伪代码）

> 以下示例展示的是“改造方向”，不要求一次性全部落地。重点是用 WordPress 数据或选项替代写死的 HTML，同时保持类名和 data-* 不变。

### 3.1 Footer Logo 与公司简介

建议复用 Header 中的 Logo 输出函数 `elysia_first_web_site_logo()`，并在 Footer 中包装一层，保持 Elementor 结构：

```php
<div class="elementor-element elementor-element-3e5a83c elementor-widget elementor-widget-theme-site-logo elementor-widget-image">
    <div class="elementor-widget-container">
        <?php if (function_exists('elysia_first_web_site_logo')) : ?>
            <?php elysia_first_web_site_logo(); ?>
        <?php endif; ?>
    </div>
</div>
```

公司简介可从站点描述或自定义选项读取：

```php
<?php
$footer_company_intro = get_option('elysia_footer_company_intro');
if (!$footer_company_intro) {
    $footer_company_intro = get_bloginfo('description');
}
?>
<div class="elementor-widget-container">
    <p><?php echo esc_html($footer_company_intro); ?></p>
</div>
```

### 3.2 Category 列表动态化

可以使用 **菜单** 或 **选项数组** 来驱动 Category 列表，避免直接依赖产品分类结构。示例以菜单为例：

在 `functions.php` 中注册一个新的菜单位置：

```php
function elysia_first_web_register_footer_menus() {
    register_nav_menus(
        array(
            'footer_category' => __('Footer Category Menu', 'elysia_first_web'),
        )
    );
}
add_action('after_setup_theme', 'elysia_first_web_register_footer_menus');
```

然后在 Footer 模板中，用 `wp_nav_menu()` 输出 `<li><a>` 结构，同时保留 `.elementor-icon-list-items` 容器：

```php
<div class="elementor-widget-container">
    <ul class="elementor-icon-list-items">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer_category',
                'container'      => '',
                'items_wrap'     => '%3$s',
                'fallback_cb'    => false,
            )
        );
        ?>
    </ul>
</div>
```

> 如需保留 `elementor-icon-list-item` 等类，可以通过菜单项 CSS 类或自定义 Walker 补齐。

### 3.3 Company 链接列表动态化

同样推荐使用菜单管理 Company 链接：

```php
function elysia_first_web_register_footer_company_menu() {
    register_nav_menus(
        array(
            'footer_company' => __('Footer Company Menu', 'elysia_first_web'),
        )
    );
}
// 可与上文 footer_category 注册合并在同一个函数里
```

模板中：

```php
<div class="elementor-widget-container">
    <ul class="elementor-icon-list-items">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer_company',
                'container'      => '',
                'items_wrap'     => '%3$s',
                'fallback_cb'    => false,
            )
        );
        ?>
    </ul>
</div>
```

### 3.4 联系方式与社交图标

在 `functions.php` 中集中管理 Footer 联系方式和社交链接：

```php
function elysia_first_web_get_footer_contacts() {
    return array(
        'phone'   => get_option('elysia_footer_phone', '+86-13616182007'),
        'email'   => get_option('elysia_footer_email', 'info@example.com'),
        'address' => get_option('elysia_footer_address', 'Wuxi, China'),
    );
}
```

模板中渲染：

```php
<?php $contacts = elysia_first_web_get_footer_contacts(); ?>
<ul class="elementor-icon-list-items">
    <?php if (!empty($contacts['phone'])) : ?>
        <li class="elementor-icon-list-item">
            <span class="elementor-icon-list-icon">
                <i aria-hidden="true" class="fas fa-phone"></i>
            </span>
            <span class="elementor-icon-list-text">
                <?php echo esc_html($contacts['phone']); ?>
            </span>
        </li>
    <?php endif; ?>

    <?php if (!empty($contacts['email'])) : ?>
        <li class="elementor-icon-list-item">
            <span class="elementor-icon-list-icon">
                <i aria-hidden="true" class="fas fa-envelope"></i>
            </span>
            <span class="elementor-icon-list-text">
                <a href="mailto:<?php echo antispambot($contacts['email']); ?>">
                    <?php echo antispambot($contacts['email']); ?>
                </a>
            </span>
        </li>
    <?php endif; ?>

    <?php if (!empty($contacts['address'])) : ?>
        <li class="elementor-icon-list-item">
            <span class="elementor-icon-list-icon">
                <i aria-hidden="true" class="fas fa-map-marker-alt"></i>
            </span>
            <span class="elementor-icon-list-text">
                <?php echo esc_html($contacts['address']); ?>
            </span>
        </li>
    <?php endif; ?>
</ul>
```

社交图标可直接复用 Header 的社交配置函数 `elysia_first_web_get_social_links()`，但保持 Elementor 的 DOM 结构：

```php
<?php $social_links = function_exists('elysia_first_web_get_social_links') ? elysia_first_web_get_social_links() : array(); ?>
<div class="elementor-social-icons-wrapper elementor-grid" role="list">
    <?php if (!empty($social_links['facebook'])) : ?>
        <span class="elementor-grid-item" role="listitem">
            <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-f3a94ec"
               href="<?php echo esc_url($social_links['facebook']); ?>" target="_blank" rel="noopener noreferrer">
                <span class="elementor-screen-only">Facebook</span>
                <i aria-hidden="true" class="fab fa-facebook"></i>
            </a>
        </span>
    <?php endif; ?>
    <!-- Youtube / Instagram 按相同模式输出 -->
</div>
```

### 3.5 顶部 CTA 区动态化

顶部 CTA 今后可能会随着站点语言或运营需求调整，推荐从选项或某个特定页面的自定义字段读取：

```php
$cta_title    = get_option('elysia_footer_cta_title', __('Contact Us To Get The Newest Quotation', 'elysia_first_web'));
$cta_content  = get_option('elysia_footer_cta_content', __('Contact us to get the newest quotation...', 'elysia_first_web'));
$cta_btn_text = get_option('elysia_footer_cta_button_text', __('CONTACT SUNWAY', 'elysia_first_web'));
$cta_btn_url  = get_option('elysia_footer_cta_button_url', home_url('/contact/'));
```

模板中：

```php
<h3 class="elementor-heading-title elementor-size-default">
    <?php echo esc_html($cta_title); ?>
</h3>
<p><?php echo esc_html($cta_content); ?></p>
<a class="elementor-button elementor-button-link elementor-size-md"
   href="<?php echo esc_url($cta_btn_url); ?>">
    <span class="elementor-button-content-wrapper">
        <span class="elementor-button-text">
            <?php echo esc_html($cta_btn_text); ?>
        </span>
    </span>
</a>
```

### 3.6 底部版权信息

将固定文本改为基于当前年份和站点名称（或选项）的组合：

```php
$footer_company_name = get_option('elysia_footer_company_name', get_bloginfo('name'));
?>
<div class="elementor-widget-container">
    <?php
    printf(
        'Copyright © %1$s %2$s',
        esc_html(date('Y')),
        esc_html($footer_company_name)
    );
    ?>
</div>
```

---

## 四、实施步骤建议

为了降低风险，建议按照以下步骤逐步落地：

1. **版权信息与年份动态化**
   - 先将 Footer 最底部版权文本替换为 `date('Y')` + 站点名称/选项。
   - 验证各页面 Footer 显示正常。
2. **Logo 与公司简介动态化**
   - 将 Footer Logo 改为调用 `elysia_first_web_site_logo()`。
   - 将公司简介改为从 `get_bloginfo('description')` 或选项中读取。
   - 在中英文环境下验证显示效果。
3. **联系方式与社交链接抽离**
   - 在 `functions.php` 中实现 `elysia_first_web_get_footer_contacts()`。
   - 使用该函数重构 Contact 列表；改用 `mailto:` 显示邮箱，避免依赖 swforming 的 Cloudflare 保护。
   - 社交链接复用 `elysia_first_web_get_social_links()`，与 Header 保持一致。
4. **Category / Company 列表改为菜单驱动**
   - 注册 `footer_category` 与 `footer_company` 菜单位置。
   - 后台创建对应菜单，并分配位置。
   - 使用 `wp_nav_menu()` 渲染两个列表，保留 `.elementor-icon-list-items` 容器。
   - 根据需要，在菜单项的 CSS 类中补充 Elementor 所需类名。
5. **顶部 CTA 区块抽象为配置**
   - 在 `functions.php` 中定义读取 Footer CTA 文案与链接的函数（读取 options）。
   - 在 Footer 模板中用该函数输出 CTA 文本和按钮。
6. **证书图片画廊的媒体化**
   - 预留一个选项（例如存储两个 attachment ID 或两个 URL）。
   - 如果未设置，继续使用当前静态图片；设置后优先使用媒体库图片。
7. **全面多语言处理**
   - 使用 `__()` / `_e()` 包裹所有仍然硬编码的英文字符串。
   - 确认所有“数据型内容”（标题、简介、CTA 文案、联系方式、公司名等）都来自选项或 WordPress 实体，方便多语言插件接管。

---

## 五、核心注意事项

- **保持 Elementor DOM 结构与类名**
  - 不要删除或重命名 `elementor-section` / `elementor-column` / `elementor-widget` 等类。
  - 不改动数据属性（如 `data-element_type`、`data-id` 等），仅在内部替换文本与链接。
- **与 Header 配置复用**
  - Footer 中的 Logo 与社交链接应尽量复用 Header 中的函数与选项，避免两处配置不一致。
  - 建议将品牌类信息（公司名、Logo、社交链接）统一由一组函数管理。
- **SEO 与可访问性**
  - Logo 图片 alt 至少与站点名称一致。
  - 社交链接和按钮保持合适的 `aria-label` 与可见文本。
- **可回滚性**
  - 动态化过程中每一步尽量只替换一小块内容，随时保持可以回滚到上一版本。

通过上述方案，`site-footer.php` 将从当前的“完全静态 HTML”演进为“结构保持不变、内容由 WordPress 数据和配置驱动”的动态页脚，实现链接、联系方式、版权信息等的后台可配置化，并为多语言和品牌扩展打下基础。


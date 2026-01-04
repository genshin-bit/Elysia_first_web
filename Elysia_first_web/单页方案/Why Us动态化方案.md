# Why Us 页面动态化方案（ACF + WordPress 原生）

仅依赖 ACF 插件和 WordPress 原生能力，不引入其他插件。在保持现有模块拆分和样式完全不变的前提下，通过 ACF 字段驱动 Why Us 页面内容动态化，并兼顾组件复用与跨页面联动。

关联文件：

- 页面模板：[page-why-us.php](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/page-why-us.php)
- 相关模块：
  - [template-parts/components/page-hero-title.php](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/components/page-hero-title.php)
  - [template-parts/one_page/why-us-hero.php](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/one_page/why-us-hero.php)
  - [template-parts/one_page/why-us-intro.php](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/one_page/why-us-intro.php)
  - [template-parts/one_page/why-us-advantages-grid.php](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/one_page/why-us-advantages-grid.php)
  - [template-parts/one_page/shared-contact-popup.php](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/one_page/shared-contact-popup.php)

参考文档：

- [Why Us模块拆分核对报告.md](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/单页方案/Why%20Us模块拆分核对报告.md)

---

## 一、整体思路

- 保持当前页面骨架和模块拆分不变：
  - `page-why-us.php` 内只负责 `<main>/<article>/.entry-content/.elementor` 骨架以及模块编排：

    ```php
    <div data-elementor-type="wp-page" data-elementor-id="268" class="elementor elementor-268" data-elementor-post-type="page">
        <?php
        get_template_part('template-parts/one_page/why-us-hero');
        get_template_part('template-parts/one_page/why-us-intro');
        get_template_part('template-parts/one_page/why-us-advantages-grid');
        ?>
    </div>
    ```

  - 顶部 CSS/JS 引入以及底部懒加载脚本保持在 `page-why-us.php` 中统一输出，不拆到模块内。

- 渐进式动态化原则：
  - 所有文本与图片改造都通过 ACF 字段驱动；
  - 每个字段都有静态 fallback：字段为空时继续使用当前模板硬编码内容；
  - 引入一个总开关字段控制整页是否启用 ACF 动态化。

- 字段分层：
  - 页面级字段：Why Us 自身的文案、图片、优势列表、Hero 标题；
  - Options 级字段：跨页面联动所需的全局页面引用（联系页、工厂页、项目案例页等）。

- 组件复用与联动：
  - Hero 区块统一收敛到 `page-hero-title.php` 组件（与 About / Factory / Project / Quality / Social Responsibility 等页面共用）；
  - 联系弹窗复用 `shared-contact-popup.php` 中定义的 Elementor Popup；
  - 优势栅格字段结构按未来可抽象为全站通用「优势列表组件」的方式设计。

---

## 二、总开关与 Hero 动态化

### 1. 字段组：Why Us 页面基础与 Hero

字段组：`Why Us 页面 - 基础与首屏`

- 位置规则：
  - Post Type = Page
  - Page Template = why us（或指定 Page ID = 268）

字段列表：

- `why_us_use_acf`（True/False）
  - 说明：整页动态化开关；
  - 为假时，各模块不读取 ACF，完全输出当前静态 HTML。

- `why_us_hero_title`（Text）
  - 用途：覆盖 Hero 标题；
  - 默认值：为空时使用 `get_the_title()` 或当前文案 `Why Us`。

### 2. Hero 与 page-hero-title 组件对齐

当前 `why-us-hero.php` 是硬编码的 `<section><h1>Why Us</h1></section>`。建议逐步改为使用全站通用组件：

- 在 `page-why-us.php` 中，将：

  ```php
  get_template_part('template-parts/one_page/why-us-hero');
  ```

  替换为：

  ```php
  get_template_part(
      'template-parts/components/page-hero-title',
      null,
      array(
          'title' => get_field('why_us_hero_title') ?: get_the_title()
      )
  );
  ```

- `page-hero-title.php` 内继续负责输出统一的 Section 结构与 CSS class，Why Us 只通过字段控制标题文本；
- 其他单页（About / Factory / Project / Quality / Social Responsibility 等）也可复用同一组件，实现首屏标题区统一样式。

---

## 三、Why Us Intro 模块动态化

模板文件：[why-us-intro.php](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/one_page/why-us-intro.php)

结构概览：

- 左列：
  - H5：`WE ARE WORTH YOUR TRUST`
  - H2：`We pay attention to every detail`
  - 一段长文案
  - `CONTACT US` 按钮（当前链接为 `index-15.html`）
- 右列：
  - 两张形象图片（本地 `static/image/*.jpg`）

### 1. 字段组：Why Us - 导语模块

字段组：`Why Us 页面 - 导语模块`

- 位置规则：Page Template = why us

字段列表：

- 文案相关：
  - `why_intro_eyebrow`（Text）
    - 默认：`WE ARE WORTH YOUR TRUST`
  - `why_intro_title`（Text）
    - 默认：`We pay attention to every detail`
  - `why_intro_body`（Wysiwyg）
    - 默认：当前 `<p>` 中长文案内容。

- CTA 相关：
  - `why_intro_cta_text`（Text）
    - 默认：`CONTACT US`
  - `why_intro_cta_type`（Select）
    - 选项示例：
      - `popup`：打开联系弹窗（推荐默认）
      - `contact_page`：跳转到联系页面
      - `custom_url`：自定义链接
  - `why_intro_cta_custom_url`（URL）
    - 当 `cta_type = custom_url` 时使用。

- 图片相关：
  - `why_intro_image_main`（Image）
    - 替代当前主图 `istockphoto-1417731259-612x612-1.jpg`；
  - `why_intro_image_secondary`（Image）
    - 替代当前副图 `1dcddec0-66f5-4503-b3c9-0deb0192f307.jpg`。

### 2. 模板改造思路

- 在模块开头统一读取总开关：
  - 若 `why_us_use_acf` 为假：直接输出现有静态 HTML，不调用任何 `get_field()`；
  - 若为真：所有文案和图片优先读字段，字段为空时 fallback 到原有硬编码内容。

- 文案处理示意：

  - H5：
    - `get_field('why_intro_eyebrow') ?: 'WE ARE WORTH YOUR TRUST'`
  - H2：
    - `get_field('why_intro_title') ?: 'We pay attention to every detail'`
  - 正文：
    - 若 `why_intro_body` 有值，使用 `the_field('why_intro_body')` 输出；
    - 否则保留当前 `<p>` 文本。

- 图片处理示意：

  - 若 `why_intro_image_main` 有值，使用 `wp_get_attachment_image()` 输出；
  - 否则保留原 `<img src="<?php echo get_template_directory_uri(); ?>/static/image/...">`；
  - 副图同理。

- CTA 链接逻辑：

  - 当 `why_intro_cta_type = popup`：
    - 输出与 `shared-contact-popup.php` 对应的 Elementor Popup 链接（例如 `#elementor-action:action=popup:open&id=306`），保持和工厂/质量制造等页面一致；
  - 当 `why_intro_cta_type = contact_page`：
    - 从全局 Options 字段（例如 `global_page_contact`）中读取联系页面链接，使用 `get_permalink()` 生成 URL；
  - 当 `why_intro_cta_type = custom_url` 且 `why_intro_cta_custom_url` 不为空：
    - 直接使用该自定义 URL；
  - 若以上条件都不满足，则 fallback 为当前硬编码 `index-15.html`。

---

## 四、优势栅格模块动态化

模板文件：[why-us-advantages-grid.php](file:///e:/phpstudy_pro/WWW/wp-content/themes/Elysia_first_web/template-parts/one_page/why-us-advantages-grid.php)

结构概览：

- 顶部导语：
  - 文本：`We are worth your trust`
  - 标题：`Some Of Our main Advantages`
- 下方三组 inner-section，共 6 个优势点（Icon Box）：
  - We Own Factory
  - Fair Price
  - Flexible
  - We Own Factory（带圆形背景图标版本）
  - Customer Support
  - Serve All Customer

### 1. 字段组：Why Us - 优势栅格

字段组：`Why Us 页面 - 优势栅格`

- 位置规则：Page Template = why us

字段列表：

- 顶部文案：
  - `why_advantages_eyebrow`（Text）
    - 默认：`We are worth your trust`
  - `why_advantages_title`（Text）
    - 默认：`Some Of Our main Advantages`

- 优势列表（Repeater）：
  - 字段名：`why_advantages_items`（Repeater）
  - 说明：用来管理 6 个优势点，同时为未来抽象为通用组件做准备。

  Repeater 子字段：

  - `why_advantage_title`（Text）
    - 示例值：`We Own Factory`、`Fair Price`、`Flexible`、`Customer Support`、`Serve All Customer` 等。
  - `why_advantage_description`（Textarea 或 Wysiwyg）
  - `why_advantage_layout_group`（Select）
    - 用于标记该优势属于哪一行（1、2、3），与当前三个 inner-section 对应；
  - `why_advantage_icon_style`（Select）
    - 示例值：`none` / `simple` / `circle`；
    - 用于区分普通 Icon Box 和带圆形背景的版本；
  - （可选）`why_advantage_link_type`（Select）
    - 示例值：`none` / `factory` / `project` / `quality` / `contact` / `custom`；
  - （可选）`why_advantage_custom_url`（URL）
    - 当 `link_type = custom` 时使用。

### 2. 模板改造思路

- 同样先判断总开关 `why_us_use_acf`：
  - 为假时，完全输出现有静态 HTML（包含 motion_fx 设置与内部 6 个 Icon Box）；
  - 为真时：
    - 顶部导语使用 `why_advantages_eyebrow` 和 `why_advantages_title`，为空则用原文；
    - 根据 `why_advantages_items` Repeater 数据重建 6 个 Icon Box 的标题与描述；
    - 若 Repeater 为空或条目不足 6 个，可使用静态默认数据补齐，保证布局不破。

- 链接联动（可选）：
  - 若某个优势项的 `link_type` 设置为 `factory`，则从全局字段 `global_page_factory` 中读取页面链接；
  - `project` → `global_page_project`
  - `quality` → `global_page_quality_manufacturing`
  - `contact` → `global_page_contact`
  - `custom` → 使用 `why_advantage_custom_url`
  - `none` → 不包裹链接，仅展示文案。

这样可以在优势列表中嵌入指向工厂页、项目案例页、质量制造页、联系页的深度链接，形成 Why Us 与其他单页之间的内容联动。

---

## 五、跨页面联动与全局字段

为了与其他单页（About / Factory / Project / Quality / Social Responsibility / Contact）保持一致，建议在 Options Page 中配置一组全局页面引用字段，统一管理跨页跳转：

字段组示例：`Global - 关键页面引用`

- 位置规则：Options Page（例如 Theme Settings）

字段示例：

- `global_page_contact`（Post Object，类型 Page）
- `global_page_factory`（Post Object）
- `global_page_project`（Post Object）
- `global_page_quality_manufacturing`（Post Object）
- `global_page_social_responsibility`（Post Object）
- `global_page_faq`（Post Object）

在 Why Us 页面中，这些字段用于：

- Intro 模块的 CTA 按钮：
  - 当 `cta_type = contact_page` 时，使用 `global_page_contact` 生成链接；
- 优势栅格模块：
  - 根据优势项的 `link_type` 选择跳转到工厂/项目/质量/联系等页面；
- 其他页面也可以使用这些字段跳转回 Why Us 页面，实现全站统一的导航关系管理。

示意读取方式：

```php
$contact_page = get_field('global_page_contact', 'option');
if ($contact_page) {
    $contact_url = get_permalink($contact_page);
}
```

---

## 六、实施步骤与验证建议

1. 在 ACF 后台创建字段组：
   - `Why Us 页面 - 基础与首屏`
   - `Why Us 页面 - 导语模块`
   - `Why Us 页面 - 优势栅格`
   - 全局 Options 页面中的 `Global - 关键页面引用`（若尚未建立，可与其他单页方案共用）。

2. 在测试环境中：
   - 为 Why Us 页面填充与当前文案和图片相同的字段值；
   - 打开 `why_us_use_acf` 开关；
   - 逐个模块对比改造前后 HTML 输出（尤其是 Elementor 的 `data-id`、class 和 motion_fx 设置）是否保持一致。

3. 确认 Hero 已成功切换为 `page-hero-title` 组件后，对比其它单页的首屏样式，确保标题区风格统一。

4. 验证 CTA 按钮和优势项链接能正确跳转到联系页、工厂页、项目案例页等对应页面，且 `shared-contact-popup` 弹窗在 Why Us 页面仍能正常触发。

5. 在生产环境按以下顺序平滑上线：
   - 先创建字段并填充内容；
   - 再打开 `why_us_use_acf` 开关；
   - 最后将 Hero 调整为组件调用，并调整 CTA 链接到全局字段。

通过以上方案，可以在不改变现有前端结构和视觉效果的前提下，为 Why Us 页面引入可维护、可扩展的动态化能力，同时与 About / Factory / Project / Quality / Social Responsibility 等单页在 Hero 组件和跨页面联动逻辑上保持统一。


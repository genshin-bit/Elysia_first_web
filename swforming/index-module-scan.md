# `index.html` 整体模块扫描与初步复用分析

说明：

- 不关注具体文案内容，仅关注 HTML 结构与视觉区块
- 按从上到下拆分模块，粒度为“完整功能区块”
- 复用判断为初步判断（不确定则按“中”）

## 1. 全站搜索弹层（Search Modal）

- 所在区域：全站
- 模块功能：弹层搜索表单 + 结果容器（用于站内搜索入口）
- 是否可能复用：高
- 复用理由：典型全站能力模块，多页面可共用同一套交互与结构

## 2. 侧滑抽屉（Offcanvas / Mobile Menu）

- 所在区域：全站
- 模块功能：右侧抽屉面板，承载移动端导航（含多级展开）
- 是否可能复用：高
- 复用理由：响应式导航的通用形态，几乎所有页面共享

## 3. 站点页头（Header：社媒 + Logo + 主导航）

- 所在区域：全站
- 模块功能：顶部社媒入口、品牌区、主导航（桌面多级下拉）
- 是否可能复用：高
- 复用理由：明显是全站导航骨架，属于主题级通用布局

## 4. 首屏 Hero（视频背景 Banner + CTA）

- 所在区域：首页
- 模块功能：大面积视觉首屏：视频背景/遮罩层/标题区/双按钮 CTA
- 是否可能复用：中
- 复用理由：结构是通用 Hero 模板，但媒体形式与内容通常因页面而异

## 5. 企业背书与数据（成就/统计 + CTA）

- 所在区域：首页
- 模块功能：左侧背书文案+按钮，右侧（或下方）数据卡片矩阵
- 是否可能复用：中
- 复用理由：“数据背书”是可复用版式，但数据项/呈现常随页面变化

## 6. 公司简介（Who We Are：图文 + 要点列表）

- 所在区域：首页
- 模块功能：典型图文混排 + 列表要点（用于品牌/能力介绍）
- 是否可能复用：中
- 复用理由：About/品牌页、解决方案页都可能复用同结构，内容替换即可

## 7. 产品分类入口（Category Grid）

- 所在区域：首页
- 模块功能：分类卡片栅格：图片 + 标题/描述 + Read More 链接
- 是否可能复用：中
- 复用理由：结构适合作为多页面“分类导航区”，但卡片数量/分类层级可能变化

## 8. 优势说明（Why Choose Us：双栏 + 视频灯箱）

- 所在区域：首页
- 模块功能：左文右图（或相反）+ 要点列表 + 视频弹层入口
- 是否可能复用：中
- 复用理由：是通用“卖点/优势”版式，可复用到 Why Us/解决方案页

## 9. 精选产品展示（WooCommerce 产品网格）

- 所在区域：首页
- 模块功能：商品列表栅格（基于 WooCommerce `ul.products`）
- 是否可能复用：中
- 复用理由：商品网格是可复用结构，但通常按页面策略（类目/规则）不同而变化

## 10. 服务能力展示（Services Grid）

- 所在区域：首页
- 模块功能：服务卡片矩阵（icon-box 风格）：多服务入口汇总
- 是否可能复用：中
- 复用理由：服务页/支持页可复用同版式，主要替换服务项与跳转

## 11. 项目案例展示（Projects Grid）

- 所在区域：首页
- 模块功能：案例卡片列表：地区/项目类型 + 入口按钮
- 是否可能复用：中
- 复用理由：案例结构在多页常用，但首页与案例页的密度/筛选可能不同

## 12. 页脚顶部 CTA 横幅（Footer CTA）

- 所在区域：全站
- 模块功能：页脚前的强 CTA：标题文案 + 按钮（引导询盘/报价）
- 是否可能复用：高
- 复用理由：属于全站转化组件，放在多页底部复用价值高

## 13. 页脚证书/图片画廊（Gallery/Certificates）

- 所在区域：全站
- 模块功能：图片画廊区块（用于资质/背书展示）
- 是否可能复用：中
- 复用理由：可在多页复用，但是否展示、展示数量常因页面策略变化

## 14. 页脚信息区（四列：简介/分类/公司/联系+社媒）

- 所在区域：全站
- 模块功能：标准 Footer 信息架构：导航集合 + 联系方式 + 社媒
- 是否可能复用：高
- 复用理由：典型主题级全站模块，信息结构稳定，复用确定性高

## 15. 版权栏（Copyright Bar）

- 所在区域：全站
- 模块功能：底部细条版权信息
- 是否可能复用：高
- 复用理由：全站固定底部模块，复用确定性高

## 16. 全站营销弹窗（Popup：表单/Lead Magnet）

- 所在区域：全站
- 模块功能：定时触发弹窗：标题 + 表单 iframe（收集线索）
- 是否可能复用：高
- 复用理由：独立于页面内容的转化模块，可在多页面复用同一规则/结构

---

# 可复用模块深化分析（面向主题工程化抽象）

## 判断标准（用于“必须 / 建议 / 暂不抽象”的决策）

- 多页面出现：预计会在 ≥2 页面出现的结构，优先抽象（减少重复 HTML）
- 结构稳定：布局/DOM 层级稳定、主要变化是内容或数据，适合抽象（模板更干净）
- 站点级能力：导航、全站搜索、转化弹层、Footer 等应集中维护（避免多处改动）
- 维护收益：抽象后能显著降低后续维护成本（尤其是导航、Footer、全局弹层/面板）

## 模块结论清单（可直接转为开发任务）

### 1) 全站搜索弹层（Search Modal）

- 结论：必须抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`overlay-search-modal`
- 判定要点：站点级能力；多页面共用；结构稳定

### 2) 侧滑抽屉（Offcanvas / Mobile Menu）

- 结论：必须抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`panel-offcanvas-menu`
- 判定要点：站点级能力；多页面共用；结构稳定

### 3) 站点页头（Header：社媒 + Logo + 主导航）

- 结论：必须抽象为公共模块
- 推荐抽象层级：主题级模块（header）
- 推荐命名（语义化）：`site-header`
- 判定要点：全站骨架；高频维护点；改动影响面大

### 4) 首屏 Hero（视频背景 Banner + CTA）

- 结论：建议抽象为公共模块
- 推荐抽象层级：页面模块（仅首页）
- 推荐命名（语义化）：`home-hero`
- 判定要点：首页独占概率高；但分离后利于维护首页结构

### 5) 企业背书与数据（成就/统计 + CTA）

- 结论：建议抽象为公共模块
- 推荐抽象层级：页面模块（仅首页）
- 推荐命名（语义化）：`home-stats`
- 判定要点：结构相对稳定；可独立迭代；后续可能复用到 About/Why Us

### 6) 公司简介（Who We Are：图文 + 要点列表）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`section-about-intro`
- 判定要点：常见于 About/品牌页；结构稳定，内容替换即可

### 7) 产品分类入口（Category Grid）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`section-category-grid`
- 判定要点：多页面可用的“分类导航区”形态；结构可复用

### 8) 优势说明（Why Choose Us：双栏 + 视频灯箱）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`section-feature-media`
- 判定要点：常见于 Why Us/解决方案；结构可复用，内容差异化

### 9) 精选产品展示（WooCommerce 产品网格）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`section-product-grid`
- 判定要点：多页面可能需要产品栅格；结构稳定但数据源/筛选策略会变化

### 10) 服务能力展示（Services Grid）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`section-service-grid`
- 判定要点：服务页/支持页常用；结构稳定，服务项内容可替换

### 11) 项目案例展示（Projects Grid）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`section-project-grid`
- 判定要点：案例模块常跨页面出现；结构相对稳定但数量/筛选可能变化

### 12) 页脚顶部 CTA 横幅（Footer CTA）

- 结论：必须抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`footer-cta`
- 判定要点：站点级转化入口；多页面复用；维护收益高

### 13) 页脚证书/图片画廊（Gallery/Certificates）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`footer-certificates-gallery`
- 判定要点：有复用潜力但展示策略可能变动；独立组件便于开关/替换

### 14) 页脚信息区（四列：简介/分类/公司/联系+社媒）

- 结论：必须抽象为公共模块
- 推荐抽象层级：主题级模块（footer）
- 推荐命名（语义化）：`site-footer`
- 判定要点：全站骨架；结构稳定；高维护收益

### 15) 版权栏（Copyright Bar）

- 结论：必须抽象为公共模块
- 推荐抽象层级：主题级模块（footer）
- 推荐命名（语义化）：`footer-copyright`
- 判定要点：全站固定；结构高度稳定；应集中维护

### 16) 全站营销弹窗（Popup：表单/Lead Magnet）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`popup-lead-capture`
- 判定要点：站点级转化能力；可能按页面/活动开关；抽象便于统一控制

## 暂不抽象的判定说明

本页当前没有“必须保持页面私有、且抽象收益明显不足”的模块。原因是：首页模块即使仅首页使用，也建议以“页面模块（仅首页）”方式拆分，方便后续进行 HTML 重复结构定位（STEP 3）与模块替换，而不必把所有结构堆在同一个模板文件中。

---

# 全站级模块分析（基于 `index*.html` 16 个页面）

## 页面类型归类（用于后续定位重复结构）

- 首页（Home / 单页）
  - `index.html`（`data-prefix="single_page"`，title：China roll forming machine manufacturer）
- WooCommerce：产品归档（Product Archive / 类目归档）
  - `index-1.html`（`data-prefix="woo_categories"`，title：Product）
  - `index-2.html`（`data-prefix="woo_categories"`，title：Electric & Energy）
- WooCommerce：产品详情（Single Product）
  - `index-3.html`（`data-prefix="product"`，title：cable tray roll forming machine）
- Blog：文章列表（Blog Index）
  - `index-11.html`（`data-prefix="blog"`，title：Blog）
- Blog：文章详情（Single Post）
  - `index-12.html`（`data-prefix="single_blog_post"`，title：Roll Forming Machine Case Studies）
- Solution：列表归档（Solution Archive）
  - `index-13.html`（`data-prefix="solution_archive"`，title：Solution Archive）
- Solution：详情（Single Solution）
  - `index-14.html`（`data-prefix="solution_single"`，title：Stage Frame Roll Forming Machines）
- 普通单页（Single Page：内容页）
  - `index-4.html`（`data-prefix="single_page"`，title：About Us）
  - `index-5.html`（`data-prefix="single_page"`，title：Why Us）
  - `index-6.html`（`data-prefix="single_page"`，title：Factory）
  - `index-7.html`（`data-prefix="single_page"`，title：Social Responsibility）
  - `index-8.html`（`data-prefix="single_page"`，title：Quality Manufacturing）
  - `index-9.html`（`data-prefix="single_page"`，title：Roll forming machine projects）
  - `index-10.html`（`data-prefix="single_page"`，title：FAQ）
  - `index-15.html`（`data-prefix="single_page"`，title：Contact）

## 模块清单（可直接转为开发任务）

说明：

- “出现页面”按上面页面类型列出；需要精确文件时再展开到具体文件名
- “结构锚点”用于 STEP 3 做 HTML 重复区块定位（用关键 selector/特征串定位）
- “出现次数”以页面维度为主（每页 1 次）；列表类再补充条目数

### A. 全站公共模块（必须抽象）

#### 1) 站点页头（Header：社媒 + Logo + 主导航 + 搜索/菜单触发）

- 结论：必须抽象为公共模块
- 推荐抽象层级：主题级模块（header）
- 推荐命名（语义化）：`site-header`
- 出现页面：全部（16/16）
- 结构锚点：`header#header.ct-header`
- 出现次数：16（每页 1 次）
- 抽象收益：导航/Logo/入口统一维护；移动端触发器与透明/吸顶状态集中配置

#### 2) 全站搜索弹层（Search Modal）

- 结论：必须抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`overlay-search-modal`
- 出现页面：全部（16/16）
- 结构锚点：`#search-modal.ct-panel[data-behaviour="modal"]` + `.ct-search-form`
- 出现次数：16（每页 1 次）
- 抽象收益：站点级能力；结构稳定；避免多页重复维护 nonce/字段/样式

#### 3) 侧滑抽屉（Offcanvas / Mobile Menu）

- 结论：必须抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`panel-offcanvas-menu`
- 出现页面：全部（16/16）
- 结构锚点：`#offcanvas.ct-panel` + `.ct-header-trigger[data-toggle-panel="#offcanvas"]`
- 出现次数：16（每页 1 次）
- 抽象收益：移动端导航与交互强关联；多页一致；维护收益高

#### 4) 全站营销弹窗（Popup：Catalog Download）

- 结论：必须抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`popup-catalog-download`
- 出现页面：全部（16/16）
- 结构锚点：`div[data-elementor-type="popup"][data-elementor-id="2636"]` + `iframe[aria-label*="Catalog"]`
- 出现次数：16（每页 1 次）
- 抽象收益：统一触发策略（延迟/次数）与表单承载；避免多处改动

#### 5) 站点页脚（Footer：CTA + 证书画廊 + 信息四列 + 版权）

- 结论：必须抽象为公共模块
- 推荐抽象层级：主题级模块（footer）
- 推荐命名（语义化）：`site-footer`
- 出现页面：全部（16/16）
- 结构锚点：`footer[data-elementor-type="footer"][data-elementor-id="442"]`
- 出现次数：16（每页 1 次）
- 抽象收益：站点级转化与信息架构；高度稳定；改动影响全站

### B. 跨页面可复用模块（建议抽象）

#### 6) WooCommerce 产品卡片（Product Card / Loop Item）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`card-product`
- 出现页面：
  - Woo 产品归档：`index-1.html`、`index-2.html`
  - 首页精选产品：`index.html`
  - Solution 单篇内相关产品：`index-14.html`
  - Solution 归档页内推荐产品：`index-13.html`
  - 产品详情页相关产品：`index-3.html`
- 结构锚点：`li.product.type-product`（Woo 标准结构，类目/库存等类名随内容变化）
- 出现次数（条目级）：
  - `index-1.html`：16
  - `index-2.html`：9
  - `index.html`：5
  - `index-14.html`：5
  - `index-13.html`：4
  - `index-3.html`：4
- 抽象收益：跨多模板复用；统一卡片信息密度与 hover/按钮策略

#### 7) 列表分页（Pagination：数字页码 + prev/next）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`pagination`
- 出现页面：
  - Blog 列表：`index-11.html`（Elementor 分页）
  - Solution 归档：`index-13.html`（Elementor 分页）
  - 产品归档：`index-1.html`、`index-2.html`（页码结构为 `page-numbers`）
- 结构锚点：
  - Elementor：`.elementor-pagination` + `.page-numbers`
  - Woo：`.page-numbers`（容器结构随主题略有差异）
- 出现次数（页面级）：4（每页 1 次）
- 抽象收益：统一页码样式与可访问性；减少分页结构分散

#### 8) Breadcrumbs（面包屑导航）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`breadcrumbs`
- 出现页面：
  - Woo 产品详情：`index-3.html`（Woo breadcrumbs）
  - Solution 列表/详情：`index-13.html`、`index-14.html`（主题 breadcrumbs）
- 结构锚点：
  - Woo：`nav.woocommerce-breadcrumb`
  - Solution：`ct-breadcrumbs` / `breadcrumbs` 相关结构
- 出现次数（页面级）：3（每页 1 次）
- 抽象收益：统一层级路径呈现；适合集中维护 schema/样式

#### 9) 内容页首屏标题区（Page Hero / Page Title Section）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`page-hero-title`
- 出现页面：普通单页（8/8），以及部分归档/详情页（实现方式可能不同）
- 结构锚点（普通单页常见）：`section.elementor-top-section.ct-section-stretched` + `h1.elementor-heading-title`
- 出现次数：普通单页每页 1 次
- 抽象收益：统一标题区高度/背景 overlay/面包屑挂载位置；减少多页重复调整

### C. 页面类型公共模块（建议抽象为“类型组件/模板片段”）

#### 10) Blog 列表：文章卡片（Post Card / Archive Item）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`card-post`
- 出现页面：Blog 列表（`index-11.html`），并在文章详情页内作为“相关/推荐”列表复用（`index-12.html`）
- 结构锚点：`article.elementor-post`（含标题、meta、摘要、缩略图）
- 出现次数（条目级）：
  - `index-11.html`：23
  - `index-12.html`：8
- 抽象收益：统一文章卡片信息结构；列表/推荐区块可共享同一组件

#### 11) Blog/内容详情：文章目录（Table of Contents）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`toc`
- 出现页面：`index-12.html`（Blog 详情）、`index-14.html`（Solution 详情）、`index-3.html`（产品详情）
- 结构锚点：`.elementor-widget-table-of-contents`
- 出现次数（页面级）：3（每页 1 次）
- 抽象收益：统一目录样式与滚动行为；可作为可选组件挂载到多模板

#### 12) Blog/Solution 详情：上一篇/下一篇导航（Post Navigation）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`post-navigation`
- 出现页面：`index-12.html`、`index-14.html`
- 结构锚点：`.elementor-widget-post-navigation`
- 出现次数（页面级）：2（每页 1 次）
- 抽象收益：统一跳转结构与文案；细节改动不再分散

#### 13) 内容详情：分享按钮（Share Buttons）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`share-buttons`
- 出现页面：`index-11.html`、`index-12.html`、`index-14.html`、`index-3.html`
- 结构锚点：`.elementor-widget-share-buttons`
- 出现次数（页面级）：4（每页 1 次；`index-12.html` 出现 2 次）
- 抽象收益：统一社媒平台配置与 UI；便于后续扩展/替换

#### 14) Solution 归档：Loop Grid（列表容器 + 条目卡片）

- 结论：建议抽象为公共模块
- 推荐抽象层级：template-parts（组件）
- 推荐命名（语义化）：`loop-solution-grid`
- 出现页面：`index-13.html`
- 结构锚点：`.elementor-loop-container` + `div[data-elementor-type="loop-item"][data-elementor-id="5262"]`
- 出现次数（条目级）：8
- 抽象收益：Solution 列表页结构高度稳定；条目卡片可复用到“推荐解决方案”等区块

### D. 页面私有模块（暂不抽象，仅做页面模块拆分）

#### 15) Woo 产品归档：结果统计（Result Count）

- 结论：暂不抽象，作为页面私有模块
- 原因：仅在产品归档页出现，且内容受商品总数与过滤影响，结构与位置依赖归档模板布局
- 推荐抽象层级：页面类型模块（Woo 归档）
- 推荐命名（语义化）：`woo-archive-result-count`
- 出现页面：`index-1.html`、`index-2.html`
- 结构锚点：`p.woocommerce-result-count`
- 出现次数：2（每页 1 次）

#### 16) Woo 产品详情：产品图片画廊（Product Gallery）

- 结论：暂不抽象，作为页面私有模块
- 原因：目前仅产品详情页出现，且结构与 Woo/Elementor 组件耦合较强（图库列数/缩略图/灯箱）
- 推荐抽象层级：页面类型模块（Single Product）
- 推荐命名（语义化）：`product-gallery`
- 出现页面：`index-3.html`
- 结构锚点：`.woocommerce-product-gallery` + `.woocommerce-product-gallery__wrapper`
- 出现次数：1

#### 17) Woo 产品详情：产品 Tabs（描述/参数等）

- 结论：暂不抽象，作为页面私有模块
- 原因：仅产品详情页出现，内容结构与 Woo 商品字段强绑定（后续字段策略确定后再考虑抽象）
- 推荐抽象层级：页面类型模块（Single Product）
- 推荐命名（语义化）：`product-tabs`
- 出现页面：`index-3.html`
- 结构锚点：`.woocommerce-tabs.wc-tabs-wrapper`
- 出现次数：1

#### 18) 产品/类目专用询盘弹窗（Popup：Get Inquiry）

- 结论：暂不抽象，作为页面私有模块
- 原因：仅在产品相关页面出现且内容与当前产品/类目强绑定（iframe 文案与来源不同）
- 推荐抽象层级：页面类型模块（Woo）
- 推荐命名（语义化）：`popup-product-inquiry`
- 出现页面：`index-1.html`、`index-2.html`、`index-3.html`
- 结构锚点：`div[data-elementor-type="popup"][data-elementor-id="343"]` + `iframe[aria-label*="Contact Form"]`
- 出现次数：3（每页 1 次）

#### 19) 首页内容区块（Hero/统计/关于/分类/优势/服务/案例等）

- 结论：暂不抽象，作为页面私有模块
- 原因：首页为高度定制的视觉组合；各区块虽可能复用，但需要在确认其它页面是否存在同构后再决定抽象粒度
- 推荐抽象层级：页面模块（仅首页）
- 推荐命名（语义化）：沿用首页模块命名（如 `home-hero` / `home-stats` / `section-category-grid` 等）
- 出现页面：`index.html`
- 结构锚点：以首页各 `section.elementor-section` 为单位定位
- 出现次数：1（页面级）

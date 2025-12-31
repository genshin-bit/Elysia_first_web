<?php

/**
 * Template Name: Front Page
 *
 * 首页模板（只负责“模块编排”，各区块拆到 template-parts）
 */
get_header();
?>
<main id="main" class="site-main hfeed">
	<div class="ct-container-full" data-content="normal">
		<article id="post-4217" class="post-4217 page type-page status-publish hentry">
			<div class="blocksy-woo-messages-default woocommerce-notices-wrapper">
				<div class="woocommerce"></div>
			</div>
			<div class="entry-content is-layout-constrained">
				<div data-elementor-type="wp-page" data-elementor-id="4217" class="elementor elementor-4217"
					data-elementor-post-type="page">
					<?php get_template_part('template-parts/front-page/home-hero'); ?>
					<?php get_template_part('template-parts/front-page/home-stats'); ?>
					<?php get_template_part('template-parts/front-page/section-about-intro'); ?>
					<?php get_template_part('template-parts/front-page/section-category-grid'); ?>
					<?php get_template_part('template-parts/front-page/section-feature-media'); ?>
					<?php get_template_part('template-parts/front-page/section-product-grid'); ?>
					<?php get_template_part('template-parts/front-page/section-service-grid'); ?>
					<?php get_template_part('template-parts/front-page/section-project-grid'); ?>
				</div>
			</div>
		</article>
	</div>
</main>
<?php
get_footer();
?>
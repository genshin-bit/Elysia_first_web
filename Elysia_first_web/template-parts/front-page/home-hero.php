<?php

/**
 * Template Part: Home Hero Section
 * ACF Fields: field_tab_hero
 */

// 获取 ACF 字段（优先使用首页 Hero 首屏区域字段）
$bg_type = get_field('home_hero_bg_type');
if (!$bg_type) {
	$bg_type = get_field('hero_bg_type') ?: 'video';
}

$video_url = get_field('home_hero_video_url');
if (!$video_url) {
	$video_url = get_field('hero_video');
}

$image_id = get_field('home_hero_bg_image');
if (!$image_id) {
	$image_id = get_field('hero_image');
}

$subtitle = get_field('hero_subtitle') ?: 'LEaD BY PASSIONATE Technicians';

$title = get_field('home_hero_title');
if (!$title) {
	$title = get_field('hero_title') ?: 'The leading of<br> roll forming machine industry';
}

$desc = get_field('home_hero_description');
if (!$desc) {
	$desc = get_field('hero_desc') ?: 'WUXI SUNWAY MACHINERY CO.,LTD is a professional manufacturer...';
}

$btn1_text = get_field('home_hero_primary_btn_text');
if (!$btn1_text) {
	$btn1_text = get_field('hero_btn1_text') ?: 'Explore Product';
}

$btn1_url = get_field('home_hero_primary_btn_url');
if (!$btn1_url) {
	$btn1_url = get_field('hero_btn1_url') ?: '#';
}

$btn2_text = get_field('home_hero_secondary_btn_text');
if (!$btn2_text) {
	$btn2_text = get_field('hero_btn2_text') ?: 'ABOUT US';
}

$btn2_url = get_field('home_hero_secondary_btn_url');
if (!$btn2_url) {
	$btn2_url = get_field('hero_btn2_url') ?: '#';
}

// 构建 Section 的 data-settings
$section_settings = [
	"background_background" => $bg_type === 'video' ? 'video' : 'classic',
	"background_privacy_mode" => "yes",
];

if ($bg_type === 'video' && $video_url) {
	$section_settings['background_video_link'] = $video_url;
}

// 如果是图片背景，获取图片 URL 并准备内联样式
$section_style = '';
if ($bg_type === 'image' && $image_id) {
	$image_url = wp_get_attachment_image_url($image_id, 'full');
	if ($image_url) {
		$section_style = 'style="background-image: url(' . esc_url($image_url) . '); background-size: cover; background-position: center;"';
	}
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false"
	class="elementor-section elementor-top-section elementor-element elementor-element-0c2b206 ct-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
	data-id="0c2b206" data-element_type="section"
	data-settings="<?php echo esc_attr(json_encode($section_settings)); ?>"
	<?php echo $section_style; ?>>

	<?php if ($bg_type === 'video' && $video_url): ?>
		<div class="elementor-background-video-container elementor-hidden-mobile" aria-hidden="true">
			<video class="elementor-background-video-hosted" autoplay muted playsinline loop src="<?php echo esc_url($video_url); ?>"></video>
		</div>
	<?php endif; ?>

	<div class="elementor-background-overlay"></div>
	<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e76281f"
			data-id="e76281f" data-element_type="column"
			data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-widget-wrap elementor-element-populated">
				<div class="elementor-element elementor-element-1f61fde elementor-widget elementor-widget-text-editor"
					data-id="1f61fde" data-element_type="widget"
					data-widget_type="text-editor.default">
					<div class="elementor-widget-container">
						<p><?php echo esc_html($subtitle); ?></p>
					</div>
				</div>
				<div class="elementor-element elementor-element-8391d68 elementor-widget elementor-widget-heading"
					data-id="8391d68" data-element_type="widget"
					data-widget_type="heading.default">
					<div class="elementor-widget-container">
						<h2 class="elementor-heading-title elementor-size-default"><?php echo wp_kses_post($title); ?></h2>
					</div>
				</div>
				<div class="elementor-element elementor-element-ca88dbd elementor-widget elementor-widget-text-editor"
					data-id="ca88dbd" data-element_type="widget"
					data-widget_type="text-editor.default">
					<div class="elementor-widget-container">
						<p><?php echo wp_kses_post($desc); ?></p>
					</div>
				</div>
				<section data-particle_enable="false" data-particle-mobile-disabled="false"
					class="elementor-section elementor-inner-section elementor-element elementor-element-be5f4e9 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
					data-id="be5f4e9" data-element_type="section">
					<div class="elementor-container elementor-column-gap-default">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-06a2dee"
							data-id="06a2dee" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-3de8b50 elementor-mobile-align-center elementor-widget__width-auto elementor-widget-mobile__width-inherit elementor-widget elementor-widget-button"
									data-id="3de8b50" data-element_type="widget"
									data-widget_type="button.default">
									<div class="elementor-widget-container">
										<div class="elementor-button-wrapper">
											<a class="elementor-button elementor-button-link elementor-size-md"
												href="<?php echo esc_url($btn1_url); ?>">
												<span class="elementor-button-content-wrapper">
													<span class="elementor-button-text"><?php echo esc_html($btn1_text); ?></span>
												</span>
											</a>
										</div>
									</div>
								</div>
								<div class="elementor-element elementor-element-af40792 elementor-widget__width-auto elementor-mobile-align-center elementor-widget-mobile__width-inherit elementor-align-center elementor-widget elementor-widget-button"
									data-id="af40792" data-element_type="widget"
									data-widget_type="button.default">
									<div class="elementor-widget-container">
										<div class="elementor-button-wrapper">
											<a class="elementor-button elementor-button-link elementor-size-md"
												href="<?php echo esc_url($btn2_url); ?>">
												<span class="elementor-button-content-wrapper">
													<span class="elementor-button-text"><?php echo esc_html($btn2_text); ?></span>
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>

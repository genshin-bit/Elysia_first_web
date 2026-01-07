<?php
$intro_title = get_field('project_intro_title') ?: 'Our Projects';
$intro_desc = get_field('project_intro_desc');
$btn_text = get_field('project_intro_btn_text') ?: 'OUR PROJECT';
$btn_url = get_field('project_intro_btn_url');
$img1_id = get_field('project_intro_image_1');
$img2_id = get_field('project_intro_image_2');
$items = get_field('project_grid_items');

// Fallback if no items
if (!$items) {
	$items = [
		['location' => 'The U.S', 'title' => 'Door Machine', 'image' => ''],
		['location' => 'Bengal', 'title' => 'Roof Machine', 'image' => ''],
		['location' => 'Mexico', 'title' => 'Rack Machine', 'image' => ''],
		['location' => 'Vietnam', 'title' => 'Steel Structure Machine', 'image' => ''],
	];
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false"
	class="elementor-section elementor-top-section elementor-element elementor-element-8a2279e ct-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
	data-id="8a2279e" data-element_type="section"
	data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_top&quot;:&quot;triangle-asymmetrical&quot;}">
	<div class="elementor-background-overlay"></div>
	<div class="elementor-shape elementor-shape-top" aria-hidden="true"
		data-negative="false">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"
			preserveAspectRatio="none">
			<path class="elementor-shape-fill" d="M738,99l262-93V0H0v5.6L738,99z" />
		</svg>
	</div>
	<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-22df80b"
			data-id="22df80b" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
				<section data-particle_enable="false" data-particle-mobile-disabled="false"
					class="elementor-section elementor-inner-section elementor-element elementor-element-148ec4c elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
					data-id="148ec4c" data-element_type="section">
					<div class="elementor-container elementor-column-gap-default">
						<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-e714ae0"
							data-id="e714ae0" data-element_type="column">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-2f29ed8 elementor-widget elementor-widget-heading"
									data-id="2f29ed8" data-element_type="widget"
									data-widget_type="heading.default">
									<div class="elementor-widget-container">
										<h2
											class="elementor-heading-title elementor-size-default">
											<?php echo esc_html($intro_title); ?></h2>
									</div>
								</div>
								<div class="elementor-element elementor-element-a1e9028 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
									data-id="a1e9028" data-element_type="widget"
									data-widget_type="divider.default">
									<div class="elementor-widget-container">
										<div class="elementor-divider">
											<span class="elementor-divider-separator">
											</span>
										</div>
									</div>
								</div>
								<div class="elementor-element elementor-element-05116d6 elementor-widget elementor-widget-text-editor"
									data-id="05116d6" data-element_type="widget"
									data-widget_type="text-editor.default">
									<div class="elementor-widget-container">
										<?php if ($intro_desc) : ?>
											<?php echo wp_kses_post($intro_desc); ?>
										<?php else : ?>
											<p>Through our forming machine solutions, Sunway has
												helped support thousands of customers worldwide
												in meeting their machinery system needs. We do
												our best to help our customers exceed
												expectations and ultimately make them happy!</p>
										<?php endif; ?>
									</div>
								</div>
								<div class="elementor-element elementor-element-b68d377 elementor-align-left elementor-widget elementor-widget-button"
									data-id="b68d377" data-element_type="widget"
									data-widget_type="button.default">
									<div class="elementor-widget-container">
										<div class="elementor-button-wrapper">
											<a class="elementor-button elementor-button-link elementor-size-md"
												href="<?php echo esc_url($btn_url); ?>">
												<span
													class="elementor-button-content-wrapper">
													<span class="elementor-button-text"><?php echo esc_html($btn_text); ?></span>
												</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1c0dd99"
							data-id="1c0dd99" data-element_type="column"
							data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-528d78d elementor-widget elementor-widget-image"
									data-id="528d78d" data-element_type="widget"
									data-widget_type="image.default">
									<div class="elementor-widget-container">
										<?php if ($img1_id) : ?>
											<?php echo wp_get_attachment_image($img1_id, 'large', false, ['class' => 'attachment-large size-large']); ?>
										<?php else : ?>
											<img loading="lazy" decoding="async"
												width="353" height="353"
												src="<?php echo get_template_directory_uri(); ?>/static/image/about-1-1.png"
												class="attachment-large size-large wp-image-50"
												alt="about 1 1">
										<?php endif; ?>
									</div>
								</div>
								<div class="elementor-element elementor-element-5a8df82 elementor-absolute elementor-widget elementor-widget-image"
									data-id="5a8df82" data-element_type="widget"
									data-settings="{&quot;_position&quot;:&quot;absolute&quot;}"
									data-widget_type="image.default">
									<div class="elementor-widget-container">
										<?php if ($img2_id) : ?>
											<?php echo wp_get_attachment_image($img2_id, 'large', false, ['class' => 'attachment-large size-large']); ?>
										<?php else : ?>
											<img loading="lazy" decoding="async"
												width="203" height="203"
												src="<?php echo get_template_directory_uri(); ?>/static/image/about-1-2.png"
												class="attachment-large size-large wp-image-51"
												alt="about 1 2">
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section data-particle_enable="false" data-particle-mobile-disabled="false"
					class="elementor-section elementor-inner-section elementor-element elementor-element-147af16 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
					data-id="147af16" data-element_type="section">
					<div class="elementor-container elementor-column-gap-default">
						<?php if ($items) : foreach ($items as $index => $item) :
								$image_id = $item['image'];
								$location = $item['location'];
								$title = $item['title'];
								$col_id = 'project_col_' . $index;
						?>
								<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-<?php echo esc_attr($col_id); ?>"
									data-id="<?php echo esc_attr($col_id); ?>" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_img img-hover-zoom  elementor-widget elementor-widget-image"
											data-id="<?php echo esc_attr($col_id); ?>_img" data-element_type="widget"
											data-widget_type="image.default">
											<div class="elementor-widget-container">
												<?php if ($image_id) : ?>
													<?php echo wp_get_attachment_image($image_id, 'large', false, ['class' => 'attachment-large size-large']); ?>
												<?php else : ?>
													<img loading="lazy" decoding="async"
														width="600" height="600"
														src="<?php echo get_template_directory_uri(); ?>/static/image/sunway-project-02.jpg"
														class="attachment-large size-large"
														alt="project">
												<?php endif; ?>
											</div>
										</div>
										<div class="elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_loc elementor-widget elementor-widget-text-editor"
											data-id="<?php echo esc_attr($col_id); ?>_loc" data-element_type="widget"
											data-widget_type="text-editor.default">
											<div class="elementor-widget-container">
												<p><?php echo esc_html($location); ?></p>
											</div>
										</div>
										<div class="elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_title elementor-widget elementor-widget-heading"
											data-id="<?php echo esc_attr($col_id); ?>_title" data-element_type="widget"
											data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<h3
													class="elementor-heading-title elementor-size-default">
													<?php echo esc_html($title); ?></h3>
											</div>
										</div>
									</div>
								</div>
						<?php endforeach;
						endif; ?>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
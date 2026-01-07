<?php

/**
 * Template part for displaying the Category Grid section on the front page
 */

// Retrieve ACF fields
$title = get_field('cat_grid_title') ?: 'Product Category We Provide';
$items = get_field('cat_grid_items');

?>

<section data-particle_enable="false" data-particle-mobile-disabled="false"
	class="elementor-section elementor-top-section elementor-element elementor-element-c574375 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
	data-id="c574375" data-element_type="section">
	<div class="elementor-container elementor-column-gap-default">
		<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-49891b4"
			data-id="49891b4" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
				<div class="elementor-element elementor-element-f4e2646 elementor-widget elementor-widget-heading"
					data-id="f4e2646" data-element_type="widget"
					data-widget_type="heading.default">
					<div class="elementor-widget-container">
						<h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html($title); ?></h2>
					</div>
				</div>
				<div class="elementor-element elementor-element-8f964b3 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
					data-id="8f964b3" data-element_type="widget"
					data-widget_type="divider.default">
					<div class="elementor-widget-container">
						<div class="elementor-divider">
							<span class="elementor-divider-separator"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php if ($items):
	$chunks = array_chunk($items, 3);
	foreach ($chunks as $chunk_index => $chunk):
		// Use original IDs for the first two rows if possible to keep some semblance of original structure,
		// though we are dynamically generating them.
		$section_id = ($chunk_index === 0) ? '454207d' : (($chunk_index === 1) ? '400003d' : 'cat_row_' . $chunk_index);
?>
		<section data-particle_enable="false" data-particle-mobile-disabled="false"
			class="elementor-section elementor-top-section elementor-element elementor-element-<?php echo esc_attr($section_id); ?> elementor-section-boxed elementor-section-height-default elementor-section-height-default"
			data-id="<?php echo esc_attr($section_id); ?>" data-element_type="section">
			<div class="elementor-container elementor-column-gap-custom">
				<?php foreach ($chunk as $item_index => $item):
					$image_id = $item['image'];
					$link = $item['link'];
					$icon_id = $item['icon'];
					$item_title = $item['title'];
					$description = $item['description'];
					$button_text = $item['button_text'] ?: 'READ MORE';

					// Generate a semi-unique ID for the column to avoid conflicts
					$col_id = 'cat_col_' . $chunk_index . '_' . $item_index;
				?>
					<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-<?php echo esc_attr($col_id); ?> h-box"
						data-id="<?php echo esc_attr($col_id); ?>" data-element_type="column">
						<div class="elementor-widget-wrap elementor-element-populated">
							<!-- Image Widget -->
							<div class="elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_img elementor-widget elementor-widget-image"
								data-id="<?php echo esc_attr($col_id); ?>_img" data-element_type="widget"
								data-widget_type="image.default">
								<div class="elementor-widget-container">
									<a href="<?php echo esc_url($link); ?>">
										<?php if ($image_id): ?>
											<?php echo wp_get_attachment_image($image_id, 'large', false, ['class' => 'attachment-large size-large']); ?>
										<?php else: ?>
											<!-- Placeholder or empty -->
										<?php endif; ?>
									</a>
								</div>
							</div>

							<!-- Inner Section (Content) -->
							<section data-particle_enable="false" data-particle-mobile-disabled="false"
								class="elementor-section elementor-inner-section elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_inner h-innerbox elementor-section-boxed elementor-section-height-default elementor-section-height-default"
								data-id="<?php echo esc_attr($col_id); ?>_inner" data-element_type="section">
								<div class="elementor-container elementor-column-gap-default">
									<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_inner_col"
										data-id="<?php echo esc_attr($col_id); ?>_inner_col" data-element_type="column"
										data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
										<div class="elementor-widget-wrap elementor-element-populated">
											<!-- Icon Box -->
											<div class="elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_iconbox elementor-view-default elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box"
												data-id="<?php echo esc_attr($col_id); ?>_iconbox" data-element_type="widget"
												data-widget_type="icon-box.default">
												<div class="elementor-widget-container">
													<div class="elementor-icon-box-wrapper">
														<div class="elementor-icon-box-icon">
															<span class="elementor-icon">
																<?php
																if ($icon_id) {
																	$file_path = get_attached_file($icon_id);
																	$ext = pathinfo($file_path, PATHINFO_EXTENSION);
																	if (strtolower($ext) === 'svg') {
																		echo file_get_contents($file_path);
																	} else {
																		echo wp_get_attachment_image($icon_id, 'full', false, ['class' => 'icon']);
																	}
																}
																?>
															</span>
														</div>
														<div class="elementor-icon-box-content">
															<h3 class="elementor-icon-box-title">
																<span><?php echo esc_html($item_title); ?></span>
															</h3>
															<p class="elementor-icon-box-description">
																<?php echo wp_kses_post($description); ?>
															</p>
														</div>
													</div>
												</div>
											</div>
											<!-- Button -->
											<div class="elementor-element elementor-element-<?php echo esc_attr($col_id); ?>_btn elementor-align-center h-btn elementor-widget elementor-widget-button"
												data-id="<?php echo esc_attr($col_id); ?>_btn" data-element_type="widget"
												data-widget_type="button.default">
												<div class="elementor-widget-container">
													<div class="elementor-button-wrapper">
														<a class="elementor-button elementor-button-link elementor-size-sm"
															href="<?php echo esc_url($link); ?>">
															<span class="elementor-button-content-wrapper">
																<span class="elementor-button-text"><?php echo esc_html($button_text); ?></span>
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
				<?php endforeach; ?>
			</div>
		</section>
	<?php endforeach;
else: ?>
	<!-- Fallback Content (Static) could go here if desired, but omitting for cleaner dynamic file -->
<?php endif; ?>
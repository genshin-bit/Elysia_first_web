		<header id="header" class="ct-header" data-id="type-1" itemscope="" itemtype="https://schema.org/WPHeader">
			<div data-device="desktop" data-transparent="">
				<div data-row="top" data-column-set="1" data-transparent-row="yes">
					<div class="ct-container">
						<div data-column="middle">
							<div data-items="">
								<div class="ct-header-socials " data-id="socials">
									<?php $social_links = function_exists('elysia_first_web_get_social_links') ? elysia_first_web_get_social_links() : array(); ?>
									<div class="ct-social-box" data-color="custom" data-icon-size="custom"
										data-icons-type="simple">
										<?php if (!empty($social_links['facebook'])) : ?>
											<a href="<?php echo esc_url($social_links['facebook']); ?>" data-network="facebook"
												aria-label="Facebook" target="_blank" rel="noopener noreferrer">
												<span class="ct-icon-container">
													<svg width="20px" height="20px" viewBox="0 0 20 20" aria-hidden="true">
														<path
															d="M20,10.1c0-5.5-4.5-10-10-10S0,4.5,0,10.1c0,5,3.7,9.1,8.4,9.9v-7H5.9v-2.9h2.5V7.9C8.4,5.4,9.9,4,12.2,4c1.1,0,2.2,0.2,2.2,0.2v2.5h-1.3c-1.2,0-1.6,0.8-1.6,1.6v1.9h2.8L13.9,13h-2.3v7C16.3,19.2,20,15.1,20,10.1z" />
													</svg>
												</span><span class="ct-label ct-hidden-sm ct-hidden-md"
													aria-hidden="true">Facebook</span> </a>
										<?php endif; ?>
										<?php if (!empty($social_links['youtube'])) : ?>
											<a href="<?php echo esc_url($social_links['youtube']); ?>" data-network="youtube"
												aria-label="YouTube" target="_blank" rel="noopener noreferrer">
												<span class="ct-icon-container">
													<svg width="20" height="20" viewbox="0 0 20 20" aria-hidden="true">
														<path
															d="M15,0H5C2.2,0,0,2.2,0,5v10c0,2.8,2.2,5,5,5h10c2.8,0,5-2.2,5-5V5C20,2.2,17.8,0,15,0z M14.5,10.9l-6.8,3.8c-0.1,0.1-0.3,0.1-0.5,0.1c-0.5,0-1-0.4-1-1l0,0V6.2c0-0.5,0.4-1,1-1c0.2,0,0.3,0,0.5,0.1l6.8,3.8c0.5,0.3,0.7,0.8,0.4,1.3C14.8,10.6,14.6,10.8,14.5,10.9z" />
													</svg>
												</span><span class="ct-label ct-hidden-sm ct-hidden-md"
													aria-hidden="true">YouTube</span> </a>
										<?php endif; ?>
										<?php if (!empty($social_links['instagram'])) : ?>
											<a href="<?php echo esc_url($social_links['instagram']); ?>" data-network="instagram"
												aria-label="Instagram" target="_blank" rel="noopener noreferrer">
												<span class="ct-icon-container">
													<svg width="20" height="20" viewBox="0 0 20 20" aria-hidden="true">
														<circle cx="10" cy="10" r="3.3" />
														<path
															d="M14.2,0H5.8C2.6,0,0,2.6,0,5.8v8.3C0,17.4,2.6,20,5.8,20h8.3c3.2,0,5.8-2.6,5.8-5.8V5.8C20,2.6,17.4,0,14.2,0zM10,15c-2.8,0-5-2.2-5-5s2.2-5,5-5s5,2.2,5,5S12.8,15,10,15z M15.8,5C15.4,5,15,4.6,15,4.2s0.4-0.8,0.8-0.8s0.8,0.4,0.8,0.8S16.3,5,15.8,5z" />
													</svg>
												</span><span class="ct-label ct-hidden-sm ct-hidden-md"
													aria-hidden="true">Instagram</span> </a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="ct-sticky-container">
					<div data-sticky="shrink">
						<div data-row="middle" data-column-set="2" data-transparent-row="yes">
							<div class="ct-container">
								<div data-column="start" data-placements="1">
									<div data-items="primary">
										<div class="site-branding" data-id="logo" itemscope="itemscope"
											itemtype="https://schema.org/Organization">
											<?php if (function_exists('elysia_first_web_site_logo')) {
												elysia_first_web_site_logo();
											} ?>
										</div>

									</div>
								</div>
								<div data-column="end" data-placements="1">
									<div data-items="primary">
										<nav id="header-menu-1" class="header-menu-1 menu-container" data-id="menu"
											data-interaction="hover" data-menu="type-2:default"
											data-dropdown="type-1:simple" data-stretch data-responsive="no" itemscope=""
											itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e('Main Menu', 'elysia_first_web'); ?>">
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


										<button class="ct-header-search ct-toggle " data-toggle-panel="#search-modal"
											aria-controls="search-modal" aria-label="<?php esc_attr_e('Search', 'elysia_first_web'); ?>" data-label="left"
											data-id="search">

											<span class="ct-label ct-hidden-sm ct-hidden-md ct-hidden-lg"
												aria-hidden="true"><?php esc_html_e('Search', 'elysia_first_web'); ?></span>

											<svg class="ct-icon" aria-hidden="true" width="15" height="15"
												viewBox="0 0 15 15">
												<path
													d="M14.8,13.7L12,11c0.9-1.2,1.5-2.6,1.5-4.2c0-3.7-3-6.8-6.8-6.8S0,3,0,6.8s3,6.8,6.8,6.8c1.6,0,3.1-0.6,4.2-1.5l2.8,2.8c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2C15.1,14.5,15.1,14,14.8,13.7z M1.5,6.8c0-2.9,2.4-5.2,5.2-5.2S12,3.9,12,6.8S9.6,12,6.8,12S1.5,9.6,1.5,6.8z" />
											</svg></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div data-device="mobile" data-transparent="">
				<div class="ct-sticky-container">
					<div data-sticky="shrink">
						<div data-row="middle" data-column-set="2" data-transparent-row="yes">
							<div class="ct-container">
								<div data-column="start" data-placements="1">
									<div data-items="primary">
										<div class="site-branding" data-id="logo">
											<?php if (function_exists('elysia_first_web_site_logo')) {
												elysia_first_web_site_logo();
											} ?>
										</div>

									</div>
								</div>
								<div data-column="end" data-placements="1">
									<div data-items="primary">
										<button class="ct-header-trigger ct-toggle " data-toggle-panel="#offcanvas"
											aria-controls="offcanvas" data-design="simple" data-label="right"
											aria-label="<?php esc_attr_e('Menu', 'elysia_first_web'); ?>" data-id="trigger">

											<span class="ct-label ct-hidden-sm ct-hidden-md ct-hidden-lg"
												aria-hidden="true"><?php esc_html_e('Menu', 'elysia_first_web'); ?></span>

											<svg class="ct-icon" width="18" height="14" viewBox="0 0 18 14"
												data-type="type-2" aria-hidden="true">
												<rect y="0.00" width="18" height="1.7" rx="1" />
												<rect y="6.15" width="18" height="1.7" rx="1" />
												<rect y="12.3" width="18" height="1.7" rx="1" />
											</svg></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
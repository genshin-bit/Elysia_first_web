<?php get_template_part('template-parts/layout/site-footer'); ?>
</div>

<template id="tp-language" data-tp-language="en_US"></template>
<script data-cfasync="false" src="<?php echo get_template_directory_uri(); ?>/static/js/email-decode.min.js"></script>
<?php get_template_part('template-parts/components/popup-catalog-download'); ?>
<?php get_template_part('template-parts/components/popup-product-inquiry'); ?>
<script>
	const lazyloadRunObserver = () => {
		const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
		const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					let lazyloadBackground = entry.target;
					if (lazyloadBackground) {
						lazyloadBackground.classList.add('e-lazyloaded');
					}
					lazyloadBackgroundObserver.unobserve(entry.target);
				}
			});
		}, {
			rootMargin: '200px 0px 200px 0px'
		});
		lazyloadBackgrounds.forEach((lazyloadBackground) => {
			lazyloadBackgroundObserver.observe(lazyloadBackground);
		});
	};
	const events = [
		'DOMContentLoaded',
		'elementor/lazyload/observe',
	];
	events.forEach((event) => {
		document.addEventListener(event, lazyloadRunObserver);
	});
</script>
<script>
	(function() {
		var c = document.body.className;
		c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
		document.body.className = c;
	})();
</script>
<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
	<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p role="alert">Sorry, this product is unavailable. Please choose a different combination.</p>
</script>
<link rel='stylesheet' id='wc-blocks-style-css' href='<?php echo get_template_directory_uri(); ?>/static/css/wc-blocks.css' media='all' />
<script id="ct-scripts-js-extra">
	var ct_localizations = {
		"ajax_url": "https://swforming.com/wp-admin/admin-ajax.php",
		"public_url": "https://swforming.com/wp-content/themes/blocksy/static/bundle/",
		"rest_url": "https://swforming.com/wp-json/",
		"search_url": "https://swforming.com/search/QUERY_STRING/",
		"show_more_text": "Show more",
		"more_text": "More",
		"search_live_results": "Search results",
		"search_live_no_results": "No results",
		"search_live_no_result": "No results",
		"search_live_one_result": "You got %s result. Please press Tab to select it.",
		"search_live_many_results": "You got %s results. Please press Tab to select one.",
		"search_live_stock_status_texts": {
			"instock": "In stock",
			"outofstock": "Out of stock"
		},
		"clipboard_copied": "Copied!",
		"clipboard_failed": "Failed to Copy",
		"expand_submenu": "Expand dropdown menu",
		"collapse_submenu": "Collapse dropdown menu",
		"dynamic_js_chunks": [{
			"id": "blocksy_pro_micro_popups",
			"selector": ".ct-popup",
			"url": "https://swforming.com/wp-content/plugins/blocksy-companion-pro/framework/premium/static/bundle/micro-popups.js?ver=2.1.22"
		}, {
			"id": "blocksy_sticky_header",
			"selector": "header [data-sticky]",
			"url": "https://swforming.com/wp-content/plugins/blocksy-companion-pro/static/bundle/sticky.js?ver=2.1.22"
		}],
		"dynamic_styles": {
			"lazy_load": "https://swforming.com/wp-content/themes/blocksy/static/bundle/non-critical-styles.min.css?ver=2.1.22",
			"search_lazy": "https://swforming.com/wp-content/themes/blocksy/static/bundle/non-critical-search-styles.min.css?ver=2.1.22",
			"back_to_top": "https://swforming.com/wp-content/themes/blocksy/static/bundle/back-to-top.min.css?ver=2.1.22",
			"cookie_notification": "https://swforming.com/wp-content/plugins/blocksy-companion-pro/framework/extensions/cookies-consent/static/bundle/main.min.css"
		},
		"dynamic_styles_selectors": [{
			"selector": ".ct-header-cart, #woo-cart-panel",
			"url": "https://swforming.com/wp-content/themes/blocksy/static/bundle/cart-header-element-lazy.min.css?ver=2.1.22"
		}, {
			"selector": ".flexy",
			"url": "https://swforming.com/wp-content/themes/blocksy/static/bundle/flexy.min.css?ver=2.1.22"
		}, {
			"selector": ".ct-media-container[data-media-id], .ct-dynamic-media[data-media-id]",
			"url": "https://swforming.com/wp-content/plugins/blocksy-companion-pro/framework/premium/static/bundle/video-lazy.min.css?ver=2.1.22"
		}, {
			"selector": "#account-modal",
			"url": "https://swforming.com/wp-content/plugins/blocksy-companion-pro/static/bundle/header-account-modal-lazy.min.css?ver=2.1.22"
		}, {
			"selector": ".ct-header-account",
			"url": "https://swforming.com/wp-content/plugins/blocksy-companion-pro/static/bundle/header-account-dropdown-lazy.min.css?ver=2.1.22"
		}]
	};
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/main.js" id="ct-scripts-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/webpack.runtime.min.js" id="elementor-webpack-runtime-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/frontend-modules.min.js" id="elementor-frontend-modules-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/core.min.js" id="jquery-ui-core-js"></script>
<script id="elementor-frontend-js-extra">
	var EAELImageMaskingConfig = {
		"svg_dir_url": "https://swforming.com/wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/img/image-masking/svg-shapes/"
	};
</script>
<script id="elementor-frontend-js-before">
	var elementorFrontendConfig = {
		"environmentMode": {
			"edit": false,
			"wpPreview": false,
			"isScriptDebug": false
		},
		"i18n": {
			"shareOnFacebook": "Share on Facebook",
			"shareOnTwitter": "Share on Twitter",
			"pinIt": "Pin it",
			"download": "Download",
			"downloadImage": "Download image",
			"fullscreen": "Fullscreen",
			"zoom": "Zoom",
			"share": "Share",
			"playVideo": "Play Video",
			"previous": "Previous",
			"next": "Next",
			"close": "Close",
			"a11yCarouselPrevSlideMessage": "Previous slide",
			"a11yCarouselNextSlideMessage": "Next slide",
			"a11yCarouselFirstSlideMessage": "This is the first slide",
			"a11yCarouselLastSlideMessage": "This is the last slide",
			"a11yCarouselPaginationBulletMessage": "Go to slide"
		},
		"is_rtl": false,
		"breakpoints": {
			"xs": 0,
			"sm": 480,
			"md": 768,
			"lg": 1025,
			"xl": 1440,
			"xxl": 1600
		},
		"responsive": {
			"breakpoints": {
				"mobile": {
					"label": "Mobile Portrait",
					"value": 767,
					"default_value": 767,
					"direction": "max",
					"is_enabled": true
				},
				"mobile_extra": {
					"label": "Mobile Landscape",
					"value": 880,
					"default_value": 880,
					"direction": "max",
					"is_enabled": false
				},
				"tablet": {
					"label": "Tablet Portrait",
					"value": 1024,
					"default_value": 1024,
					"direction": "max",
					"is_enabled": true
				},
				"tablet_extra": {
					"label": "Tablet Landscape",
					"value": 1200,
					"default_value": 1200,
					"direction": "max",
					"is_enabled": false
				},
				"laptop": {
					"label": "Laptop",
					"value": 1366,
					"default_value": 1366,
					"direction": "max",
					"is_enabled": false
				},
				"widescreen": {
					"label": "Widescreen",
					"value": 2400,
					"default_value": 2400,
					"direction": "min",
					"is_enabled": false
				}
			},
			"hasCustomBreakpoints": false
		},
		"version": "3.33.4",
		"is_static": false,
		"experimentalFeatures": {
			"additional_custom_breakpoints": true,
			"theme_builder_v2": true,
			"home_screen": true,
			"global_classes_should_enforce_capabilities": true,
			"e_variables": true,
			"cloud-library": true,
			"e_opt_in_v4_page": true,
			"import-export-customization": true,
			"e_pro_variables": true
		},
		"urls": {
			"assets": "https:\/\/swforming.com\/wp-content\/plugins\/elementor\/assets\/",
			"ajaxurl": "https:\/\/swforming.com\/wp-admin\/admin-ajax.php",
			"uploadUrl": "https:\/\/swforming.com\/wp-content\/uploads"
		},
		"nonces": {
			"floatingButtonsClickTracking": "2eaca8aae2"
		},
		"swiperClass": "swiper",
		"settings": {
			"page": [],
			"editorPreferences": []
		},
		"kit": {
			"active_breakpoints": ["viewport_mobile", "viewport_tablet"],
			"global_image_lightbox": "yes",
			"lightbox_enable_counter": "yes",
			"lightbox_enable_fullscreen": "yes",
			"lightbox_enable_zoom": "yes",
			"lightbox_enable_share": "yes",
			"lightbox_title_src": "title",
			"lightbox_description_src": "description",
			"woocommerce_notices_elements": []
		},
		"post": {
			"id": 4217,
			"title": "China%20roll%20forming%20machine%20manufacturer%20-%20SUNWAY%20Machine",
			"excerpt": "",
			"featuredImage": false
		}
	};
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/frontend.min.js" id="elementor-frontend-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/jquery.sticky.min.js" id="e-sticky-js"></script>
<script async src="<?php echo get_template_directory_uri(); ?>/static/js/main-1.js" id="blocksy-ext-cookies-consent-scripts-js"></script>
<script id="eael-general-js-extra">
	var localize = {
		"ajaxurl": "https://swforming.com/wp-admin/admin-ajax.php",
		"nonce": "735f5a4668",
		"i18n": {
			"added": "Added ",
			"compare": "Compare",
			"loading": "Loading..."
		},
		"eael_translate_text": {
			"required_text": "is a required field",
			"invalid_text": "Invalid",
			"billing_text": "Billing",
			"shipping_text": "Shipping",
			"fg_mfp_counter_text": "of"
		},
		"page_permalink": "index.html",
		"cart_redirectition": "no",
		"cart_page_url": "index.html",
		"el_breakpoints": {
			"mobile": {
				"label": "Mobile Portrait",
				"value": 767,
				"default_value": 767,
				"direction": "max",
				"is_enabled": true
			},
			"mobile_extra": {
				"label": "Mobile Landscape",
				"value": 880,
				"default_value": 880,
				"direction": "max",
				"is_enabled": false
			},
			"tablet": {
				"label": "Tablet Portrait",
				"value": 1024,
				"default_value": 1024,
				"direction": "max",
				"is_enabled": true
			},
			"tablet_extra": {
				"label": "Tablet Landscape",
				"value": 1200,
				"default_value": 1200,
				"direction": "max",
				"is_enabled": false
			},
			"laptop": {
				"label": "Laptop",
				"value": 1366,
				"default_value": 1366,
				"direction": "max",
				"is_enabled": false
			},
			"widescreen": {
				"label": "Widescreen",
				"value": 2400,
				"default_value": 2400,
				"direction": "min",
				"is_enabled": false
			}
		},
		"ParticleThemesData": {
			"default": "{\"particles\":{\"number\":{\"value\":160,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":false,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":true,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":6,\"direction\":\"none\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"repulse\"},\"onclick\":{\"enable\":true,\"mode\":\"push\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}",
			"nasa": "{\"particles\":{\"number\":{\"value\":250,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":1,\"random\":true,\"anim\":{\"enable\":true,\"speed\":1,\"opacity_min\":0,\"sync\":false}},\"size\":{\"value\":3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":4,\"size_min\":0.3,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":1,\"direction\":\"none\",\"random\":true,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":600}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"bubble\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":250,\"size\":0,\"duration\":2,\"opacity\":0,\"speed\":3},\"repulse\":{\"distance\":400,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}",
			"bubble": "{\"particles\":{\"number\":{\"value\":15,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#1b1e34\"},\"shape\":{\"type\":\"polygon\",\"stroke\":{\"width\":0,\"color\":\"#000\"},\"polygon\":{\"nb_sides\":6},\"image\":{\"src\":\"img/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.3,\"random\":true,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":50,\"random\":false,\"anim\":{\"enable\":true,\"speed\":10,\"size_min\":40,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":200,\"color\":\"#ffffff\",\"opacity\":1,\"width\":2},\"move\":{\"enable\":true,\"speed\":8,\"direction\":\"none\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":false,\"mode\":\"grab\"},\"onclick\":{\"enable\":false,\"mode\":\"push\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}",
			"snow": "{\"particles\":{\"number\":{\"value\":450,\"density\":{\"enable\":true,\"value_area\":800}},\"color\":{\"value\":\"#fff\"},\"shape\":{\"type\":\"circle\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"img/github.svg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":true,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":5,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":500,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":2},\"move\":{\"enable\":true,\"speed\":6,\"direction\":\"bottom\",\"random\":false,\"straight\":false,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":true,\"mode\":\"bubble\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":400,\"line_linked\":{\"opacity\":0.5}},\"bubble\":{\"distance\":400,\"size\":4,\"duration\":0.3,\"opacity\":1,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}",
			"nyan_cat": "{\"particles\":{\"number\":{\"value\":150,\"density\":{\"enable\":false,\"value_area\":800}},\"color\":{\"value\":\"#ffffff\"},\"shape\":{\"type\":\"star\",\"stroke\":{\"width\":0,\"color\":\"#000000\"},\"polygon\":{\"nb_sides\":5},\"image\":{\"src\":\"http://wiki.lexisnexis.com/academic/images/f/fb/Itunes_podcast_icon_300.jpg\",\"width\":100,\"height\":100}},\"opacity\":{\"value\":0.5,\"random\":false,\"anim\":{\"enable\":false,\"speed\":1,\"opacity_min\":0.1,\"sync\":false}},\"size\":{\"value\":4,\"random\":true,\"anim\":{\"enable\":false,\"speed\":40,\"size_min\":0.1,\"sync\":false}},\"line_linked\":{\"enable\":false,\"distance\":150,\"color\":\"#ffffff\",\"opacity\":0.4,\"width\":1},\"move\":{\"enable\":true,\"speed\":14,\"direction\":\"left\",\"random\":false,\"straight\":true,\"out_mode\":\"out\",\"bounce\":false,\"attract\":{\"enable\":false,\"rotateX\":600,\"rotateY\":1200}}},\"interactivity\":{\"detect_on\":\"canvas\",\"events\":{\"onhover\":{\"enable\":false,\"mode\":\"grab\"},\"onclick\":{\"enable\":true,\"mode\":\"repulse\"},\"resize\":true},\"modes\":{\"grab\":{\"distance\":200,\"line_linked\":{\"opacity\":1}},\"bubble\":{\"distance\":400,\"size\":40,\"duration\":2,\"opacity\":8,\"speed\":3},\"repulse\":{\"distance\":200,\"duration\":0.4},\"push\":{\"particles_nb\":4},\"remove\":{\"particles_nb\":2}}},\"retina_detect\":true}"
		},
		"eael_login_nonce": "9c78c7d461",
		"eael_register_nonce": "a103828538",
		"eael_lostpassword_nonce": "a6788b64e0",
		"eael_resetpassword_nonce": "205b4544fb"
	};
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/general.min.js" id="eael-general-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/eael-294.js" id="eael-294-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/eael-1206.js" id="eael-1206-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/webpack-pro.runtime.min.js" id="elementor-pro-webpack-runtime-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/hooks.min.js" id="wp-hooks-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/i18n.min.js" id="wp-i18n-js"></script>
<script id="wp-i18n-js-after">
	wp.i18n.setLocaleData({
		'text direction\u0004ltr': ['ltr']
	});
</script>
<script id="elementor-pro-frontend-js-before">
	var ElementorProFrontendConfig = {
		"ajaxurl": "https:\/\/swforming.com\/wp-admin\/admin-ajax.php",
		"nonce": "fd7a51cec7",
		"urls": {
			"assets": "https:\/\/swforming.com\/wp-content\/plugins\/elementor-pro\/assets\/",
			"rest": "https:\/\/swforming.com\/wp-json\/"
		},
		"settings": {
			"lazy_load_background_images": true
		},
		"popup": {
			"hasPopUps": true
		},
		"shareButtonsNetworks": {
			"facebook": {
				"title": "Facebook",
				"has_counter": true
			},
			"twitter": {
				"title": "Twitter"
			},
			"linkedin": {
				"title": "LinkedIn",
				"has_counter": true
			},
			"pinterest": {
				"title": "Pinterest",
				"has_counter": true
			},
			"reddit": {
				"title": "Reddit",
				"has_counter": true
			},
			"vk": {
				"title": "VK",
				"has_counter": true
			},
			"odnoklassniki": {
				"title": "OK",
				"has_counter": true
			},
			"tumblr": {
				"title": "Tumblr"
			},
			"digg": {
				"title": "Digg"
			},
			"skype": {
				"title": "Skype"
			},
			"stumbleupon": {
				"title": "StumbleUpon",
				"has_counter": true
			},
			"mix": {
				"title": "Mix"
			},
			"telegram": {
				"title": "Telegram"
			},
			"pocket": {
				"title": "Pocket",
				"has_counter": true
			},
			"xing": {
				"title": "XING",
				"has_counter": true
			},
			"whatsapp": {
				"title": "WhatsApp"
			},
			"email": {
				"title": "Email"
			},
			"print": {
				"title": "Print"
			},
			"x-twitter": {
				"title": "X"
			},
			"threads": {
				"title": "Threads"
			}
		},
		"woocommerce": {
			"menu_cart": {
				"cart_page_url": "https:\/\/swforming.com",
				"checkout_page_url": "https:\/\/swforming.com",
				"fragments_nonce": "83775d6929"
			}
		},
		"facebook_sdk": {
			"lang": "en_US",
			"app_id": ""
		},
		"lottie": {
			"defaultAnimationUrl": "https:\/\/swforming.com\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"
		}
	};
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/frontend.min-1.js" id="elementor-pro-frontend-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/elements-handlers.min.js" id="pro-elements-handlers-js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/jquery.zoom.min.js" id="wc-zoom-js" defer data-wp-strategy="defer"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/underscore.min.js" id="underscore-js"></script>
<script id="wp-util-js-extra">
	var _wpUtilSettings = {
		"ajax": {
			"url": "/wp-admin/admin-ajax.php"
		}
	};
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/wp-util.min.js" id="wp-util-js"></script>
<script id="wc-add-to-cart-variation-js-extra">
	var wc_add_to_cart_variation_params = {
		"wc_ajax_url": "/?wc-ajax=%%endpoint%%",
		"i18n_no_matching_variations_text": "Sorry, no products matched your selection. Please choose a different combination.",
		"i18n_make_a_selection_text": "Please select some product options before adding this product to your cart.",
		"i18n_unavailable_text": "Sorry, this product is unavailable. Please choose a different combination.",
		"i18n_reset_alert_text": "Your selection has been reset. Please select some product options before adding this product to your cart."
	};
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/add-to-cart-variation.min.js" id="wc-add-to-cart-variation-js" defer
	data-wp-strategy="defer"></script>
<script id="wc-single-product-js-extra">
	var wc_single_product_params = {
		"i18n_required_rating_text": "Please select a rating",
		"i18n_rating_options": ["1 of 5 stars", "2 of 5 stars", "3 of 5 stars", "4 of 5 stars", "5 of 5 stars"],
		"i18n_product_gallery_trigger_text": "View full-screen image gallery",
		"review_rating_required": "yes",
		"flexslider": {
			"rtl": false,
			"animation": "slide",
			"smoothHeight": true,
			"directionNav": false,
			"controlNav": "thumbnails",
			"slideshow": false,
			"animationSpeed": 500,
			"animationLoop": false,
			"allowOneSlide": false
		},
		"zoom_enabled": "1",
		"zoom_options": [],
		"photoswipe_enabled": "",
		"photoswipe_options": {
			"shareEl": false,
			"closeOnScroll": false,
			"history": false,
			"hideAnimationDuration": 0,
			"showAnimationDuration": 0
		},
		"flexslider_enabled": "1"
	};
</script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/jquery.flexslider.min.js" id="wc-flexslider-js" defer data-wp-strategy="defer"></script>
<script src="<?php echo get_template_directory_uri(); ?>/static/js/single-product.min.js" id="wc-single-product-js" defer data-wp-strategy="defer"></script>


<?php wp_footer(); ?>
</body>

</html>

</html>
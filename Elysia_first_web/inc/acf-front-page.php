<?php

if (function_exists('acf_add_local_field_group')) {

	acf_add_local_field_group(array(
		'key' => 'group_front_page_settings',
		'title' => '首页设置',
		'fields' => array(
			// Tab: Hero Section
			array(
				'key' => 'field_tab_hero',
				'label' => 'Hero 首屏区域',
				'type' => 'tab',
			),
			array(
				'key' => 'field_home_hero_bg_type',
				'label' => '背景类型',
				'name' => 'home_hero_bg_type',
				'type' => 'select',
				'choices' => array(
					'image' => '图片',
					'video' => '视频',
				),
				'default_value' => 'image',
			),
			array(
				'key' => 'field_home_hero_bg_image',
				'label' => '背景图片',
				'name' => 'home_hero_bg_image',
				'type' => 'image',
				'return_format' => 'id',
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_home_hero_bg_type',
							'operator' => '==',
							'value' => 'image',
						),
					),
				),
			),
			array(
				'key' => 'field_home_hero_video_url',
				'label' => '背景视频链接',
				'name' => 'home_hero_video_url',
				'type' => 'url',
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_home_hero_bg_type',
							'operator' => '==',
							'value' => 'video',
						),
					),
				),
			),
			array(
				'key' => 'field_home_hero_title',
				'label' => '标题',
				'name' => 'home_hero_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_home_hero_subtitle',
				'label' => '副标题 / 描述',
				'name' => 'home_hero_description',
				'type' => 'textarea',
				'rows' => 3,
			),
			array(
				'key' => 'field_home_hero_primary_btn_text',
				'label' => '主按钮文字',
				'name' => 'home_hero_primary_btn_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_home_hero_primary_btn_url',
				'label' => '主按钮链接',
				'name' => 'home_hero_primary_btn_url',
				'type' => 'url',
			),
			array(
				'key' => 'field_home_hero_secondary_btn_text',
				'label' => '次按钮文字',
				'name' => 'home_hero_secondary_btn_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_home_hero_secondary_btn_url',
				'label' => '次按钮链接',
				'name' => 'home_hero_secondary_btn_url',
				'type' => 'url',
			),

			// Tab: Stats Section
			array(
				'key' => 'field_tab_stats',
				'label' => '数据统计区域',
				'type' => 'tab',
			),
			array(
				'key' => 'field_stats_title',
				'label' => '标题',
				'name' => 'stats_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_stats_desc',
				'label' => '描述',
				'name' => 'stats_desc',
				'type' => 'textarea',
				'rows' => 3,
			),
			array(
				'key' => 'field_stats_btn_text',
				'label' => '按钮文字',
				'name' => 'stats_btn_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_stats_btn_url',
				'label' => '按钮链接',
				'name' => 'stats_btn_url',
				'type' => 'url',
			),
			array(
				'key' => 'field_stats_items',
				'label' => '统计数据列表',
				'name' => 'stats_items',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_stats_item_icon',
						'label' => '图标',
						'name' => 'icon',
						'type' => 'image',
						'return_format' => 'id',
					),
					array(
						'key' => 'field_stats_item_number',
						'label' => '数值',
						'name' => 'number',
						'type' => 'text',
					),
					array(
						'key' => 'field_stats_item_label',
						'label' => '标签/说明',
						'name' => 'label',
						'type' => 'text',
					),
				),
			),

			// Tab: About Intro
			array(
				'key' => 'field_tab_about_intro',
				'label' => '关于我们简介',
				'type' => 'tab',
			),
			array(
				'key' => 'field_about_intro_image',
				'label' => '图片',
				'name' => 'about_intro_image',
				'type' => 'image',
				'return_format' => 'id',
			),
			array(
				'key' => 'field_about_intro_title',
				'label' => '标题',
				'name' => 'about_intro_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_about_intro_features',
				'label' => '特性列表',
				'name' => 'about_intro_features',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_about_intro_feature_text',
						'label' => '特性文本',
						'name' => 'text',
						'type' => 'text',
					),
				),
			),
			array(
				'key' => 'field_about_intro_stats',
				'label' => '统计列表',
				'name' => 'about_intro_stats',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_about_intro_stat_icon',
						'label' => '统计图标',
						'name' => 'icon',
						'type' => 'image',
						'return_format' => 'id',
					),
					array(
						'key' => 'field_about_intro_stat_number',
						'label' => '数值',
						'name' => 'number',
						'type' => 'text',
					),
					array(
						'key' => 'field_about_intro_stat_label',
						'label' => '标签',
						'name' => 'label',
						'type' => 'text',
					),
				),
			),
			array(
				'key' => 'field_about_intro_btn_text',
				'label' => '按钮文字',
				'name' => 'about_intro_btn_text',
				'type' => 'text',
			),
			array(
				'key' => 'field_about_intro_btn_url',
				'label' => '按钮链接',
				'name' => 'about_intro_btn_url',
				'type' => 'url',
			),

			// Tab: Category Grid
			array(
				'key' => 'field_tab_category_grid',
				'label' => '产品分类网格',
				'type' => 'tab',
			),
			array(
				'key' => 'field_category_grid_title',
				'label' => '区域标题',
				'name' => 'category_grid_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_category_grid_items',
				'label' => '分类卡片列表',
				'name' => 'category_grid_items',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_category_grid_item_image',
						'label' => '顶部图片',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'id',
					),
					array(
						'key' => 'field_category_grid_item_icon',
						'label' => '图标/SVG',
						'name' => 'icon',
						'type' => 'image',
						'return_format' => 'id',
					),
					array(
						'key' => 'field_category_grid_item_title',
						'label' => '标题',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_category_grid_item_description',
						'label' => '描述',
						'name' => 'description',
						'type' => 'textarea',
					),
					array(
						'key' => 'field_category_grid_item_category',
						'label' => '绑定产品分类',
						'name' => 'category',
						'type' => 'taxonomy',
						'taxonomy' => 'product_category',
						'field_type' => 'select',
						'return_format' => 'id',
					),
				),
			),

			// Tab: Industry Grid
			array(
				'key' => 'field_tab_industry_grid',
				'label' => '应用行业网格',
				'type' => 'tab',
			),
			array(
				'key' => 'field_industry_items',
				'label' => '行业列表',
				'name' => 'industry_items',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_industry_image',
						'label' => '图片',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'id',
					),
					array(
						'key' => 'field_industry_title',
						'label' => '标题',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_industry_link',
						'label' => '链接',
						'name' => 'link',
						'type' => 'url',
					),
				),
			),

			// Tab: Feature Media
			array(
				'key' => 'field_tab_feature_media',
				'label' => '特性媒体区域',
				'type' => 'tab',
			),
			array(
				'key' => 'field_feature_media_title',
				'label' => '标题',
				'name' => 'feature_media_title',
				'type' => 'text',
				'default_value' => 'Why You Choose Us',
			),
			array(
				'key' => 'field_feature_media_description',
				'label' => '描述',
				'name' => 'feature_media_description',
				'type' => 'textarea',
			),
			array(
				'key' => 'field_feature_media_button_text',
				'label' => '按钮文字',
				'name' => 'feature_media_button_text',
				'type' => 'text',
				'default_value' => 'EXPLORE MORE',
			),
			array(
				'key' => 'field_feature_media_button_link',
				'label' => '按钮链接',
				'name' => 'feature_media_button_link',
				'type' => 'url',
			),
			array(
				'key' => 'field_feature_media_image',
				'label' => '封面图片',
				'name' => 'feature_media_image',
				'type' => 'image',
				'return_format' => 'id',
			),
			array(
				'key' => 'field_feature_media_video_url',
				'label' => '视频链接',
				'name' => 'feature_media_video_url',
				'type' => 'url',
			),
			array(
				'key' => 'field_feature_media_list',
				'label' => '特性列表',
				'name' => 'feature_media_list',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_feature_media_item_desc',
						'label' => '描述',
						'name' => 'description',
						'type' => 'textarea',
					),
				),
			),

			// Tab: Product Grid
			array(
				'key' => 'field_tab_product_grid',
				'label' => '产品网格',
				'type' => 'tab',
			),
			array(
				'key' => 'field_product_grid_title',
				'label' => '区域标题',
				'name' => 'product_grid_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_product_grid_ids',
				'label' => '选择产品',
				'name' => 'product_grid_ids',
				'type' => 'relationship',
				'post_type' => array('product', 'site_product'),
				'return_format' => 'id',
			),

			// Tab: Service Grid
			array(
				'key' => 'field_tab_service_grid',
				'label' => '服务网格',
				'type' => 'tab',
			),
			array(
				'key' => 'field_service_items',
				'label' => '服务列表',
				'name' => 'service_items',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_service_icon',
						'label' => '图标',
						'name' => 'icon',
						'type' => 'image',
						'return_format' => 'id',
					),
					array(
						'key' => 'field_service_title',
						'label' => '标题',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_service_description',
						'label' => '描述',
						'name' => 'description',
						'type' => 'textarea',
					),
				),
			),

			// Tab: Project Grid
			array(
				'key' => 'field_tab_project_grid',
				'label' => '项目案例网格',
				'type' => 'tab',
			),
			array(
				'key' => 'field_project_intro_title',
				'label' => '简介标题',
				'name' => 'project_intro_title',
				'type' => 'text',
				'default_value' => 'Our Projects',
			),
			array(
				'key' => 'field_project_intro_desc',
				'label' => '简介描述',
				'name' => 'project_intro_desc',
				'type' => 'textarea',
			),
			array(
				'key' => 'field_project_intro_btn_text',
				'label' => '简介按钮文字',
				'name' => 'project_intro_btn_text',
				'type' => 'text',
				'default_value' => 'OUR PROJECT',
			),
			array(
				'key' => 'field_project_intro_btn_url',
				'label' => '简介按钮链接',
				'name' => 'project_intro_btn_url',
				'type' => 'url',
			),
			array(
				'key' => 'field_project_intro_image_1',
				'label' => '简介图片 1 (大)',
				'name' => 'project_intro_image_1',
				'type' => 'image',
				'return_format' => 'id',
			),
			array(
				'key' => 'field_project_intro_image_2',
				'label' => '简介图片 2 (小)',
				'name' => 'project_intro_image_2',
				'type' => 'image',
				'return_format' => 'id',
			),
			array(
				'key' => 'field_project_grid_items',
				'label' => '项目列表',
				'name' => 'project_grid_items',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_project_item_image',
						'label' => '图片',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'id',
					),
					array(
						'key' => 'field_project_item_location',
						'label' => '地点',
						'name' => 'location',
						'type' => 'text',
					),
					array(
						'key' => 'field_project_item_title',
						'label' => '标题',
						'name' => 'title',
						'type' => 'text',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
				),
			),
			// Fallback: If front-page.php is not selected but it's the home page
			array(
				array(
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
				),
			),
		),
	));
}

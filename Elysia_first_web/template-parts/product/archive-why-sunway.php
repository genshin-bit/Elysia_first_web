<!-- 产品列表页：Why Sunway 模块模板 -->
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-79b255e0 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="79b255e0" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-dc0534f" data-id="dc0534f" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-3eafa115 elementor-widget elementor-widget-heading" data-id="3eafa115" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_why_title = 'Why Sunway';
                        if (function_exists('get_field')) {
                            $elysia_why_title_field = get_field('elysia_why_sunway_title');
                            if (!$elysia_why_title_field) {
                                $elysia_why_title_field = get_field('elysia_why_sunway_title', 'option');
                            }
                            if ($elysia_why_title_field) {
                                $elysia_why_title = $elysia_why_title_field;
                            }
                        }
                        ?>
                        <h5 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($elysia_why_title); ?>
                        </h5>
                    </div>
                </div>
                <div class="elementor-element elementor-element-482c52b8 elementor-widget elementor-widget-heading" data-id="482c52b8" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_why_subtitle = 'The Global Leader In Roll forming Industry';
                        if (function_exists('get_field')) {
                            $elysia_why_subtitle_field = get_field('elysia_why_sunway_subtitle');
                            if (!$elysia_why_subtitle_field) {
                                $elysia_why_subtitle_field = get_field('elysia_why_sunway_subtitle', 'option');
                            }
                            if ($elysia_why_subtitle_field) {
                                $elysia_why_subtitle = $elysia_why_subtitle_field;
                            }
                        }
                        ?>
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($elysia_why_subtitle); ?>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-5fcaadb6 elementor-widget elementor-widget-text-editor" data-id="5fcaadb6" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_why_intro = '';
                        if (function_exists('get_field')) {
                            $elysia_why_intro = get_field('elysia_why_sunway_intro');
                            if (!$elysia_why_intro) {
                                $elysia_why_intro = get_field('elysia_why_sunway_intro', 'option');
                            }
                        }
                        if ($elysia_why_intro) {
                            echo wp_kses_post($elysia_why_intro);
                        } else {
                        ?>
                            <p>We pay meticulous attention to each detail from raw material to delivery. It is throughout our constantly effort that our customers get the consistently high level quality products they have to look for. We always make efforts to cut the cost at the same time improve the technological content of products in order to enhance the market competitiveness of the products. In the related diversification development, we increase investment and enhance development of key products and key projects continuously make breakthroughs in technology and product function, to rank at the advanced level in the market.</p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-1b0fce5d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1b0fce5d" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-d308e51" data-id="d308e51" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-62c5a81e elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="62c5a81e" data-element_type="widget" data-widget_type="icon-list.default">
                                    <div class="elementor-widget-container">
                                        <?php
                                        $elysia_has_features = false;
                                        $elysia_features_source = '';
                                        if (function_exists('have_rows') && function_exists('get_sub_field')) {
                                            if (have_rows('elysia_why_sunway_features')) {
                                                $elysia_has_features = true;
                                                $elysia_features_source = '';
                                            } elseif (have_rows('elysia_why_sunway_features', 'option')) {
                                                $elysia_has_features = true;
                                                $elysia_features_source = 'option';
                                            }
                                        }
                                        if ($elysia_has_features) {
                                        ?>
                                            <ul class="elementor-icon-list-items">
                                                <?php
                                                while (have_rows('elysia_why_sunway_features', $elysia_features_source)) {
                                                    the_row();
                                                    $elysia_feature_text = get_sub_field('elysia_why_sunway_feature_text');
                                                    if (!$elysia_feature_text) {
                                                        continue;
                                                    }
                                                ?>
                                                    <li class="elementor-icon-list-item">
                                                        <span class="elementor-icon-list-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                                <path d="M896.969659 16.576036 119.702341 16.576036c-61.317329 0-111.038333 49.665189-111.038333 111.038333l0 777.265288c0 61.265573 49.721004 111.039348 111.038333 111.039348l777.266302 0c61.314284 0 111.036304-49.773775 111.036304-111.039348L1008.004947 127.614369C1008.005962 66.241225 958.283943 16.576036 896.969659 16.576036zM877.124894 340.796156 443.975232 773.888988c-11.680554 11.736369-26.883542 17.734958-42.168729 18.026211-15.069031 1.231989-30.562257-3.90096-42.085514-15.423203L133.583021 550.406799c-20.767234-20.820005-20.767234-54.548493 0-75.368498 20.820005-20.81899 54.59416-20.81899 75.414165 0L389.301916 655.385655l401.179853-401.337149c23.964925-23.853295 62.727926-23.853295 86.643125 0C901.092864 278.126075 901.092864 316.834275 877.124894 340.796156z" fill="#AD1C13"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="elementor-icon-list-text">
                                                            <?php echo esc_html($elysia_feature_text); ?>
                                                        </span>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        <?php
                                        } else {
                                        ?>
                                            <ul class="elementor-icon-list-items">
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                            <path d="M896.969659 16.576036 119.702341 16.576036c-61.317329 0-111.038333 49.665189-111.038333 111.038333l0 777.265288c0 61.265573 49.721004 111.039348 111.038333 111.039348l777.266302 0c61.314284 0 111.036304-49.773775 111.036304-111.039348L1008.004947 127.614369C1008.005962 66.241225 958.283943 16.576036 896.969659 16.576036zM877.124894 340.796156 443.975232 773.888988c-11.680554 11.736369-26.883542 17.734958-42.168729 18.026211-15.069031 1.231989-30.562257-3.90096-42.085514-15.423203L133.583021 550.406799c-20.767234-20.820005-20.767234-54.548493 0-75.368498 20.820005-20.81899 54.59416-20.81899 75.414165 0L389.301916 655.385655l401.179853-401.337149c23.964925-23.853295 62.727926-23.853295 86.643125 0C901.092864 278.126075 901.092864 316.834275 877.124894 340.796156z" fill="#AD1C13"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-icon-list-text">We Use Advance Manufacturing Process</span>
                                                </li>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                            <path d="M896.969659 16.576036 119.702341 16.576036c-61.317329 0-111.038333 49.665189-111.038333 111.038333l0 777.265288c0 61.265573 49.721004 111.039348 111.038333 111.039348l777.266302 0c61.314284 0 111.036304-49.773775 111.036304-111.039348L1008.004947 127.614369C1008.005962 66.241225 958.283943 16.576036 896.969659 16.576036zM877.124894 340.796156 443.975232 773.888988c-11.680554 11.736369-26.883542 17.734958-42.168729 18.026211-15.069031 1.231989-30.562257-3.90096-42.085514-15.423203L133.583021 550.406799c-20.767234-20.820005-20.767234-54.548493 0-75.368498 20.820005-20.81899 54.59416-20.81899 75.414165 0L389.301916 655.385655l401.179853-401.337149c23.964925-23.853295 62.727926-23.853295 86.643125 0C901.092864 278.126075 901.092864 316.834275 877.124894 340.796156z" fill="#AD1C13"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-icon-list-text">Provide Unique Technology</span>
                                                </li>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                            <path d="M896.969659 16.576036 119.702341 16.576036c-61.317329 0-111.038333 49.665189-111.038333 111.038333l0 777.265288c0 61.265573 49.721004 111.039348 111.038333 111.039348l777.266302 0c61.314284 0 111.036304-49.773775 111.036304-111.039348L1008.004947 127.614369C1008.005962 66.241225 958.283943 16.576036 896.969659 16.576036zM877.124894 340.796156 443.975232 773.888988c-11.680554 11.736369-26.883542 17.734958-42.168729 18.026211-15.069031 1.231989-30.562257-3.90096-42.085514-15.423203L133.583021 550.406799c-20.767234-20.820005-20.767234-54.548493 0-75.368498 20.820005-20.81899 54.59416-20.81899 75.414165 0L389.301916 655.385655l401.179853-401.337149c23.964925-23.853295 62.727926-23.853295 86.643125 0C901.092864 278.126075 901.092864 316.834275 877.124894 340.796156z" fill="#AD1C13"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-icon-list-text">Group Of Certified &amp; Experienced Team</span>
                                                </li>
                                                <li class="elementor-icon-list-item">
                                                    <span class="elementor-icon-list-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                            <path d="M896.969659 16.576036 119.702341 16.576036c-61.317329 0-111.038333 49.665189-111.038333 111.038333l0 777.265288c0 61.265573 49.721004 111.039348 111.038333 111.039348l777.266302 0c61.314284 0 111.036304-49.773775 111.036304-111.039348L1008.004947 127.614369C1008.005962 66.241225 958.283943 16.576036 896.969659 16.576036zM877.124894 340.796156 443.975232 773.888988c-11.680554 11.736369-26.883542 17.734958-42.168729 18.026211-15.069031 1.231989-30.562257-3.90096-42.085514-15.423203L133.583021 550.406799c-20.767234-20.820005-20.767234-54.548493 0-75.368498 20.820005-20.81899 54.59416-20.81899 75.414165 0L389.301916 655.385655l401.179853-401.337149c23.964925-23.853295 62.727926-23.853295 86.643125 0C901.092864 278.126075 901.092864 316.834275 877.124894 340.796156z" fill="#AD1C13"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-icon-list-text">The Best Services For Multiple Industries</span>
                                                </li>
                                            </ul>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1b794471" data-id="1b794471" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-3a630d04 elementor-position-left elementor-view-default elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="3a630d04" data-element_type="widget" data-widget_type="icon-box.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <span class="elementor-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                        <path d="M529.066667 375.466667h44.373333c-13.653333-20.48-27.306667-40.96-44.373333-64.853334V375.466667zM494.933333 648.533333h-170.666666c3.413333 61.44 10.24 119.466667 23.893333 170.666667h146.773333v-170.666667zM494.933333 375.466667V252.586667c-6.826667-10.24-10.24-20.48-13.653333-30.72 0-3.413333-3.413333-3.413333-3.413333-6.826667-47.786667 20.48-88.746667 78.506667-116.053334 163.84h133.12zM494.933333 1024v-170.666667h-136.533333c34.133333 95.573333 81.92 157.013333 136.533333 170.666667zM290.133333 648.533333H105.813333c6.826667 61.44 23.893333 119.466667 54.613334 170.666667h157.013333c-17.066667-51.2-23.893333-109.226667-27.306667-170.666667zM733.866667 648.533333c-3.413333 61.44-10.24 119.466667-23.893334 170.666667h157.013334c30.72-51.2 47.786667-109.226667 54.613333-170.666667h-187.733333zM494.933333 409.6h-146.773333c-17.066667 61.44-23.893333 129.706667-23.893333 204.8h170.666666v-204.8zM529.066667 614.4h170.666666c0-68.266667-6.826667-126.293333-23.893333-180.906667-20.48 13.653333-54.613333 10.24-68.266667-10.24-3.413333-3.413333-6.826667-10.24-10.24-13.653333h-68.266666v204.8zM706.56 409.6c20.48 61.44 27.306667 126.293333 27.306667 204.8H921.6c0-71.68-20.48-143.36-54.613333-204.8h-160.426667zM314.026667 409.6H157.013333c-34.133333 61.44-54.613333 129.706667-54.613333 204.8h187.733333c0-75.093333 10.24-143.36 23.893334-204.8zM529.066667 853.333333v170.666667c54.613333-10.24 105.813333-75.093333 136.533333-167.253333h-136.533333zM699.733333 853.333333c-20.48 68.266667-51.2 122.88-88.746666 157.013334 95.573333-23.893333 177.493333-81.92 232.106666-157.013334h-143.36zM324.266667 853.333333H180.906667c54.613333 78.506667 136.533333 133.12 232.106666 157.013334-37.546667-34.133333-68.266667-88.746667-88.746666-157.013334zM324.266667 375.466667c20.48-68.266667 51.2-122.88 85.333333-157.013334-92.16 23.893333-174.08 81.92-228.693333 157.013334h143.36zM529.066667 648.533333v170.666667h146.7"></path>
                                                        <path d="M648.533333 0c-85.333333 0-153.6 64.853333-153.6 146.773333 0 75.093333 126.293333 238.933333 139.946667 259.413334 3.413333 3.413333 6.826667 3.413333 13.653333 3.413333s10.24-3.413333 13.653334-6.826667c13.653333-17.066667 139.946667-184.32 139.946666-259.413333 0-78.506667-68.266667-143.36-153.6-143.36z m0 119.466667c20.48 0 34.133333 13.653333 34.133334 34.133333s-13.653333 34.133333-34.133334 34.133333-34.133333-13.653333-34.133333-34.133333 13.653333-34.133333 34.133333-34.133333z" fill="#AD1C13"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <?php
                                                $elysia_stat_1_number = '100+';
                                                $elysia_stat_1_label = 'Destination Countries';
                                                if (function_exists('get_field')) {
                                                    $elysia_stat_1_number_field = get_field('elysia_why_sunway_stat_1_number');
                                                    $elysia_stat_1_label_field = get_field('elysia_why_sunway_stat_1_label');
                                                    if (!$elysia_stat_1_number_field && !$elysia_stat_1_label_field) {
                                                        $elysia_stat_1_number_field = get_field('elysia_why_sunway_stat_1_number', 'option');
                                                        $elysia_stat_1_label_field = get_field('elysia_why_sunway_stat_1_label', 'option');
                                                    }
                                                    if ($elysia_stat_1_number_field || $elysia_stat_1_number_field === '0' || $elysia_stat_1_number_field === 0) {
                                                        $elysia_stat_1_number = $elysia_stat_1_number_field;
                                                    }
                                                    if ($elysia_stat_1_label_field) {
                                                        $elysia_stat_1_label = $elysia_stat_1_label_field;
                                                    }
                                                }
                                                ?>
                                                <h3 class="elementor-icon-box-title">
                                                    <span><?php echo esc_html($elysia_stat_1_number); ?> </span>
                                                </h3>
                                                <p class="elementor-icon-box-description"><?php echo esc_html($elysia_stat_1_label); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-30bd3ab elementor-position-left elementor-view-default elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="30bd3ab" data-element_type="widget" data-widget_type="icon-box.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <span class="elementor-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                        <path d="M379.904 561.664v37.376h53.248v-53.248h-53.248z m209.92 36.864h53.248V545.28h-53.248z" fill="#AD1C13"></path>
                                                        <path d="M984.064 552.96c1.536-26.112 1.536-53.76-0.512-81.408l37.376-53.248c-4.608-26.624-12.288-53.248-21.504-79.36l-58.88-27.648c-11.264-25.088-25.6-48.128-41.472-71.168l5.12-64.512c-8.704-10.24-17.92-20.992-28.16-30.208-10.24-10.24-19.968-18.944-30.72-27.648l-65.024 5.12c-23.04-15.872-47.104-29.696-71.68-40.96L680.96 23.552C654.848 14.336 627.712 7.68 600.576 2.56l-53.76 36.864c-8.704-0.512-58.88-0.512-68.608 0L423.424 3.072C396.8 7.68 370.176 14.848 343.04 23.552L315.392 81.92c-25.088 11.264-49.152 25.6-71.68 40.96l-65.024-5.12a393.989 393.989 0 0 0-30.72 27.648c-10.24 9.216-18.944 19.968-28.16 30.208l5.12 64.512c-15.872 23.04-30.208 46.592-41.472 71.168l-59.392 27.648c-9.216 26.112-15.872 52.224-21.504 79.36l37.376 52.736c-2.048 27.648-2.048 55.296 0 81.92L3.072 606.208c4.608 26.624 12.288 53.248 21.504 79.36l58.88 27.648c11.264 25.088 25.6 48.128 41.472 71.168l-5.12 64.512c8.704 10.24 17.92 20.992 28.16 30.208 10.24 10.24 19.968 18.944 30.72 27.648l65.024-5.12c23.04 15.872 47.104 29.696 71.68 40.96l27.648 58.368c26.112 9.216 53.248 15.872 80.384 20.992l53.76-36.864c8.704 0.512 58.88 0.512 68.608 0l53.76 36.864c27.648-4.608 53.76-12.288 80.384-20.992l27.648-58.368c25.088-11.264 49.152-25.6 71.68-40.96l65.024 5.12a393.989 393.989 0 0 0 30.72-27.648c10.24-9.216 18.944-19.968 28.16-30.208l-5.12-64.512c15.872-23.04 30.208-46.592 41.472-71.168l58.88-27.648c9.216-26.112 15.872-52.224 21.504-79.36l-35.84-53.248zM511.488 873.472c-199.68 0-360.448-161.28-360.448-360.448s161.792-360.448 360.448-360.448c198.656 0 360.448 161.28 360.448 360.448S711.168 873.472 511.488 873.472z" fill="#AD1C13"></path>
                                                        <path d="M484.864 545.792h53.248v53.248h-53.248z" fill="#AD1C13"></path>
                                                        <path d="M511.488 180.736c-183.296 0-331.776 148.48-331.776 331.776s148.48 331.776 331.776 331.776 331.776-148.48 331.776-331.776-148.48-331.776-331.776-331.776z m187.904 493.568H322.56V417.792l98.816 56.832v-56.832l96.768 57.856v-57.856l96.768 57.344V351.232h83.968v323.072z" fill="#AD1C13"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <?php
                                                $elysia_stat_2_number = '500+';
                                                $elysia_stat_2_label = 'Finished Project';
                                                if (function_exists('get_field')) {
                                                    $elysia_stat_2_number_field = get_field('elysia_why_sunway_stat_2_number');
                                                    $elysia_stat_2_label_field = get_field('elysia_why_sunway_stat_2_label');
                                                    if (!$elysia_stat_2_number_field && !$elysia_stat_2_label_field) {
                                                        $elysia_stat_2_number_field = get_field('elysia_why_sunway_stat_2_number', 'option');
                                                        $elysia_stat_2_label_field = get_field('elysia_why_sunway_stat_2_label', 'option');
                                                    }
                                                    if ($elysia_stat_2_number_field || $elysia_stat_2_number_field === '0' || $elysia_stat_2_number_field === 0) {
                                                        $elysia_stat_2_number = $elysia_stat_2_number_field;
                                                    }
                                                    if ($elysia_stat_2_label_field) {
                                                        $elysia_stat_2_label = $elysia_stat_2_label_field;
                                                    }
                                                }
                                                ?>
                                                <h3 class="elementor-icon-box-title">
                                                    <span><?php echo esc_html($elysia_stat_2_number); ?> </span>
                                                </h3>
                                                <p class="elementor-icon-box-description"><?php echo esc_html($elysia_stat_2_label); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="elementor-element elementor-element-92ab000 elementor-align-left elementor-mobile-align-center elementor-widget elementor-widget-button" data-id="92ab000" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <?php
                            $elysia_why_button_url = 'index-5.html';
                            $elysia_why_button_label = 'read more';
                            if (function_exists('get_field')) {
                                $elysia_why_button_url_field = get_field('elysia_why_sunway_button_url');
                                $elysia_why_button_label_field = get_field('elysia_why_sunway_button_label');
                                if (!$elysia_why_button_url_field && !$elysia_why_button_label_field) {
                                    $elysia_why_button_url_field = get_field('elysia_why_sunway_button_url', 'option');
                                    $elysia_why_button_label_field = get_field('elysia_why_sunway_button_label', 'option');
                                }
                                if ($elysia_why_button_url_field) {
                                    $elysia_why_button_url = $elysia_why_button_url_field;
                                }
                                if ($elysia_why_button_label_field) {
                                    $elysia_why_button_label = $elysia_why_button_label_field;
                                }
                            }
                            ?>
                            <a class="elementor-button elementor-button-link elementor-size-md" href="<?php echo esc_url($elysia_why_button_url); ?>">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text"><?php echo esc_html($elysia_why_button_label); ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-8e36f27" data-id="8e36f27" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-79c31cf3 elementor-widget elementor-widget-image" data-id="79c31cf3" data-element_type="widget" data-widget_type="image.default">
                    <div class="elementor-widget-container">
                        <img loading="lazy" width="600" height="450" src="<?php echo get_template_directory_uri(); ?>/static/image/sunway.jpg" class="attachment-large size-large wp-image-105" alt="roll forming machine manufacturer" srcset="https://swforming.com/wp-content/uploads/2022/08/sunway.jpg 600w, https://swforming.com/wp-content/uploads/2022/08/sunway-300x225.jpg 300w" sizes="(max-width: 600px) 100vw, 600px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

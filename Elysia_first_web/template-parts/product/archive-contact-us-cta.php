<!-- 产品列表页：Contact Us CTA 模块模板 -->
<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-top-section elementor-element elementor-element-f127fb3 elementor-section-height-min-height elementor-section-items-stretch elementor-section-boxed elementor-section-height-default"
    data-id="f127fb3" data-element_type="section"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-background-overlay"></div>
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1687367"
            data-id="1687367" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-ab45d48 elementor-widget elementor-widget-heading" data-id="ab45d48" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_contact_title = 'Contact Us Now';
                        if (function_exists('get_field')) {
                            $elysia_contact_title_field = get_field('elysia_product_archive_contact_title');
                            if (!$elysia_contact_title_field) {
                                $elysia_contact_title_field = get_field('elysia_product_archive_contact_title', 'option');
                            }
                            if ($elysia_contact_title_field) {
                                $elysia_contact_title = $elysia_contact_title_field;
                            }
                        }
                        ?>
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($elysia_contact_title); ?>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-9517402 elementor-widget elementor-widget-html"
                    data-id="9517402" data-element_type="widget" data-widget_type="html.default">
                    <div class="elementor-widget-container">
                        <?php
                        $elysia_zoho_form_perma = 'pzNRX0a0vTLnd9POzzlI5FD2DQm4WX5_ZfrCo5BuWow';
                        $elysia_zoho_iframe_height = 442;
                        if (function_exists('get_field')) {
                            $elysia_perma_field = get_field('elysia_zoho_form_perma');
                            $elysia_height_field = get_field('elysia_zoho_form_iframe_height');
                            if (!$elysia_perma_field && !$elysia_height_field) {
                                $elysia_perma_field = get_field('elysia_zoho_form_perma', 'option');
                                $elysia_height_field = get_field('elysia_zoho_form_iframe_height', 'option');
                            }
                            if ($elysia_perma_field) {
                                $elysia_zoho_form_perma = $elysia_perma_field;
                            }
                            if ($elysia_height_field || $elysia_height_field === '0' || $elysia_height_field === 0) {
                                $elysia_zoho_iframe_height = (int) $elysia_height_field;
                            }
                        }
                        $elysia_zoho_div_id = 'zf_div_' . $elysia_zoho_form_perma;
                        $elysia_zoho_iframe_src = 'https://formscn.zohopublic.com.cn/easyceotech/form/SunwayContactForm/formperma/' . $elysia_zoho_form_perma . '?zf_rszfm=1';
                        ?>
                        <div id="<?php echo esc_attr($elysia_zoho_div_id); ?>"></div>
                        <script type="text/javascript">
                            (function () {
                                try {
                                    var f = document.createElement("iframe");
                                    f.src = '<?php echo esc_js($elysia_zoho_iframe_src); ?>';
                                    f.style.border = "none";
                                    f.style.height = "<?php echo (int) $elysia_zoho_iframe_height; ?>px";
                                    f.style.width = "90%";
                                    f.style.transition = "all 0.5s ease";
                                    f.setAttribute("aria-label", 'Sunway\x20Contact\x20Form');

                                    var d = document.getElementById("<?php echo esc_js($elysia_zoho_div_id); ?>");
                                    d.appendChild(f);
                                    window.addEventListener('message', function () {
                                        var evntData = event.data;
                                        if (evntData && evntData.constructor == String) {
                                            var zf_ifrm_data = evntData.split("|");
                                            if (zf_ifrm_data.length == 2 || zf_ifrm_data.length == 3) {
                                                var zf_perma = zf_ifrm_data[0];
                                                var zf_ifrm_ht_nw = (parseInt(zf_ifrm_data[1], 10) + 15) + "px";
                                                var iframe = document.getElementById("<?php echo esc_js($elysia_zoho_div_id); ?>").getElementsByTagName("iframe")[0];
                                                if ((iframe.src).indexOf('formperma') > 0 && (iframe.src).indexOf(zf_perma) > 0) {
                                                    var prevIframeHeight = iframe.style.height;
                                                    var zf_tout = false;
                                                    if (zf_ifrm_data.length == 3) {
                                                        iframe.scrollIntoView();
                                                        zf_tout = true;
                                                    }
                                                    if (prevIframeHeight != zf_ifrm_ht_nw) {
                                                        if (zf_tout) {
                                                            setTimeout(function () {
                                                                iframe.style.height = zf_ifrm_ht_nw;
                                                            }, 500);
                                                        } else {
                                                            iframe.style.height = zf_ifrm_ht_nw;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }, false);
                                } catch (e) { }
                            })();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$elysia_contact_divider = 'Strat Our Business Now';
$elysia_contact_title = 'Get In Touch With Sunway';
$elysia_contact_embed = '';
if (function_exists('elysia_get_blog_detail_contact_texts')) {
    $elysia_contact_texts = elysia_get_blog_detail_contact_texts();
    if (isset($elysia_contact_texts['divider']) && $elysia_contact_texts['divider']) {
        $elysia_contact_divider = $elysia_contact_texts['divider'];
    }
    if (isset($elysia_contact_texts['title']) && $elysia_contact_texts['title']) {
        $elysia_contact_title = $elysia_contact_texts['title'];
    }
    if (isset($elysia_contact_texts['embed']) && $elysia_contact_texts['embed']) {
        $elysia_contact_embed = $elysia_contact_texts['embed'];
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-243f0e4 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="243f0e4" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-4aa094c" data-id="4aa094c" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-6e2de20 elementor-widget-divider--view-line_text elementor-widget-divider--element-align-right elementor-widget elementor-widget-divider" data-id="6e2de20" data-element_type="widget" data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator">
                                <span class="elementor-divider__text elementor-divider__element">
                                    <?php echo esc_html($elysia_contact_divider); ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-2358080 elementor-widget elementor-widget-heading" data-id="2358080" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h4 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($elysia_contact_title); ?>
                        </h4>
                    </div>
                </div>
                <div class="elementor-element elementor-element-dc0980e elementor-widget elementor-widget-html" data-id="dc0980e" data-element_type="widget" data-widget_type="html.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_contact_embed) { ?>
                            <?php echo $elysia_contact_embed; ?>
                        <?php } else { ?>
                            <div id="zf_div_pzNRX0a0vTLnd9POzzlI5FD2DQm4WX5_ZfrCo5BuWow">
                            </div>
                            <script type="text/javascript">
                                (function() {
                                    try {
                                        var f = document.createElement("iframe");
                                        f.src = 'https://formscn.zohopublic.com.cn/easyceotech/form/SunwayContactForm/formperma/pzNRX0a0vTLnd9POzzlI5FD2DQm4WX5_ZfrCo5BuWow?zf_rszfm=1';
                                        f.style.border = "none";
                                        f.style.height = "442px";
                                        f.style.width = "100%";
                                        f.style.transition = "all 0.5s ease";
                                        f.setAttribute("aria-label", 'Sunway\x20Contact\x20Form');
                                        f.setAttribute("allow", "geolocation;");
                                        var d = document.getElementById("zf_div_pzNRX0a0vTLnd9POzzlI5FD2DQm4WX5_ZfrCo5BuWow");
                                        d.appendChild(f);
                                        window.addEventListener('message', function() {
                                            var evntData = event.data;
                                            if (evntData && evntData.constructor == String) {
                                                var zf_ifrm_data = evntData.split("|");
                                                if (zf_ifrm_data.length == 2 || zf_ifrm_data.length == 3) {
                                                    var zf_perma = zf_ifrm_data[0];
                                                    var zf_ifrm_ht_nw = (parseInt(zf_ifrm_data[1], 10) + 15) + "px";
                                                    var iframe = document.getElementById("zf_div_pzNRX0a0vTLnd9POzzlI5FD2DQm4WX5_ZfrCo5BuWow").getElementsByTagName("iframe")[0];
                                                    if ((iframe.src).indexOf('formperma') > 0 && (iframe.src).indexOf(zf_perma) > 0) {
                                                        var prevIframeHeight = iframe.style.height;
                                                        var zf_tout = false;
                                                        if (zf_ifrm_data.length == 3) {
                                                            iframe.scrollIntoView();
                                                            zf_tout = true;
                                                        }
                                                        if (prevIframeHeight != zf_ifrm_ht_nw) {
                                                            if (zf_tout) {
                                                                setTimeout(function() {
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
                                    } catch (e) {}
                                })();
                            </script>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

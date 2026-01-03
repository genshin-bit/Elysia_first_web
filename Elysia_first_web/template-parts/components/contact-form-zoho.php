<?php
$elysia_zoho_form_perma = 'pzNRX0a0vTLnd9POzzlI5FD2DQm4WX5_ZfrCo5BuWow';
$elysia_zoho_iframe_height = 500;

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

$elysia_zoho_instance_id = uniqid();
$elysia_zoho_div_id = 'zf_div_' . $elysia_zoho_form_perma . '_' . $elysia_zoho_instance_id;
$elysia_zoho_iframe_src = 'https://formscn.zohopublic.com.cn/easyceotech/form/SunwayContactForm/formperma/' . $elysia_zoho_form_perma . '?zf_rszfm=1';
?>
<div id="<?php echo esc_attr($elysia_zoho_div_id); ?>"></div>
<script type="text/javascript">
    (function() {
        try {
            var f = document.createElement("iframe");
            f.src = '<?php echo esc_js($elysia_zoho_iframe_src); ?>';
            f.style.border = "none";
            f.style.height = "<?php echo (int) $elysia_zoho_iframe_height; ?>px";
            f.style.width = "100%";
            f.style.transition = "all 0.5s ease";
            f.setAttribute("aria-label", 'Sunway\x20Contact\x20Form');
            f.setAttribute("allow", "geolocation;");

            var d = document.getElementById("<?php echo esc_js($elysia_zoho_div_id); ?>");
            d.appendChild(f);
            window.addEventListener('message', function() {
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
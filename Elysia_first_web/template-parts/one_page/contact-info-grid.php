<?php
$elysia_contact_cards = array(
    'tel' => array(
        'label' => 'Tel',
        'value' => '+86-13616182007',
        'link'  => '',
    ),
    'email' => array(
        'label' => 'Email',
        'value' => '',
        'link'  => '',
    ),
    'whatsapp' => array(
        'label' => 'WhatsApp',
        'value' => '+86-13616182007',
        'link'  => '',
    ),
    'address' => array(
        'label' => 'Address',
        'value' => 'Wuxi City, Jiangsu Province, China',
        'link'  => '',
    ),
);

if (function_exists('get_field')) {
    $global_tel_label = get_field('global_tel_label', 'option');
    $global_tel_number = get_field('global_tel_number', 'option');
    $global_email_label = get_field('global_email_label', 'option');
    $global_email_address = get_field('global_email_address', 'option');
    $global_whatsapp_label = get_field('global_whatsapp_label', 'option');
    $global_whatsapp_number = get_field('global_whatsapp_number', 'option');
    $global_address_label = get_field('global_address_label', 'option');
    $global_address_text = get_field('global_address_text', 'option');

    if ($global_tel_label) {
        $elysia_contact_cards['tel']['label'] = $global_tel_label;
    }
    if ($global_tel_number) {
        $elysia_contact_cards['tel']['value'] = $global_tel_number;
    }
    if ($global_email_label) {
        $elysia_contact_cards['email']['label'] = $global_email_label;
    }
    if ($global_email_address) {
        $elysia_contact_cards['email']['value'] = $global_email_address;
    }
    if ($global_whatsapp_label) {
        $elysia_contact_cards['whatsapp']['label'] = $global_whatsapp_label;
    }
    if ($global_whatsapp_number) {
        $elysia_contact_cards['whatsapp']['value'] = $global_whatsapp_number;
    }
    if ($global_address_label) {
        $elysia_contact_cards['address']['label'] = $global_address_label;
    }
    if ($global_address_text) {
        $elysia_contact_cards['address']['value'] = $global_address_text;
    }

    $page_cards = get_field('contact_cards');
    if (is_array($page_cards) && count($page_cards) >= 4) {
        $page_tel = $page_cards[0];
        if (!empty($page_tel['label'])) {
            $elysia_contact_cards['tel']['label'] = $page_tel['label'];
        }
        if (!empty($page_tel['value'])) {
            $elysia_contact_cards['tel']['value'] = $page_tel['value'];
        }

        $page_email = $page_cards[1];
        if (!empty($page_email['label'])) {
            $elysia_contact_cards['email']['label'] = $page_email['label'];
        }
        if (!empty($page_email['value'])) {
            $elysia_contact_cards['email']['value'] = $page_email['value'];
        }
        if (!empty($page_email['link'])) {
            $elysia_contact_cards['email']['link'] = $page_email['link'];
        }

        $page_whatsapp = $page_cards[2];
        if (!empty($page_whatsapp['label'])) {
            $elysia_contact_cards['whatsapp']['label'] = $page_whatsapp['label'];
        }
        if (!empty($page_whatsapp['value'])) {
            $elysia_contact_cards['whatsapp']['value'] = $page_whatsapp['value'];
        }

        $page_address = $page_cards[3];
        if (!empty($page_address['label'])) {
            $elysia_contact_cards['address']['label'] = $page_address['label'];
        }
        if (!empty($page_address['value'])) {
            $elysia_contact_cards['address']['value'] = $page_address['value'];
        }
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-12252aaf ct-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="12252aaf" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-50f351f7" data-id="50f351f7" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-28f2505c elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="28f2505c" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-icon-box-wrapper">
                            <div class="elementor-icon-box-icon">
                                <span class="elementor-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1034 1024" width="64.625" height="64">
                                        <path d="M10.343434 0h992.969697v992.969697H10.343434z" fill="#ffffff" fill-opacity="0"></path>
                                        <path d="M583.369697 146.876768h-6.206061c-16.549495 0-33.09899 10.343434-37.236363 26.892929-2.068687 8.274747 0 16.549495 4.137373 24.824242 6.206061 8.274747 12.412121 12.412121 22.755556 14.480808 74.472727 14.480808 140.670707 53.785859 182.044444 113.777778 41.373737 59.991919 57.923232 130.327273 41.373738 198.59394-2.068687 8.274747 0 16.549495 4.137374 24.824242 6.206061 8.274747 12.412121 12.412121 22.755555 14.480808h6.206061c8.274747 0 14.480808-2.068687 20.686868-6.20606 8.274747-4.137374 14.480808-12.412121 14.480809-20.686869 43.442424-177.907071-80.678788-353.745455-275.135354-390.981818z m76.541414 531.652525c2.068687 0 51.717172 22.755556 93.090909 51.717172 14.480808 10.343434 41.373737 28.961616 43.442424 55.854545 2.068687 16.549495-6.206061 35.167677-24.824242 55.854546-4.137374 6.206061-45.511111 51.717172-122.052525 59.991919-20.686869 2.068687-41.373737 2.068687-64.129293-2.068687s-47.579798-10.343434-70.335354-20.686869c-93.090909-37.236364-167.563636-88.953535-244.10505-171.70101C142.739394 568.888889 124.121212 436.492929 122.052525 411.668687c-14.480808-115.846465 84.816162-173.769697 95.159596-179.975758 14.480808-8.274747 28.961616-14.480808 43.442424-16.549495h18.618182c12.412121 2.068687 28.961616 8.274747 41.373738 28.961617 18.618182 26.892929 37.236364 66.19798 51.717171 109.640404 14.480808 43.442424-10.343434 59.991919-35.167676 76.541414h-2.068687s-45.511111 24.824242-51.717172 28.961616c-8.274747 4.137374-10.343434 12.412121-6.206061 20.686869 24.824242 49.648485 62.060606 101.365657 103.434344 148.945454 41.373737 45.511111 88.953535 86.884848 136.533333 117.915152 4.137374 2.068687 8.274747 4.137374 12.412121 2.068686h2.068687c4.137374 0 8.274747-4.137374 10.343435-8.274747 6.206061-8.274747 16.549495-22.755556 22.755555-33.09899 4.137374-6.206061 4.137374-14.480808 0-22.755555-2.068687-2.068687-6.206061-12.412121-8.274747-16.549495-6.206061-8.274747-16.549495-10.343434-26.892929-6.206061-4.137374 2.068687-49.648485 26.892929-49.648485 26.892929-33.09899 18.618182-76.541414 8.274747-109.640404-22.755556C332.999192 459.248485 317.518384 434.424242 303.037576 407.6c-37.236364-70.335354-55.854545-132.39596-57.923232-151.014141-2.068687-12.412121 6.206061-32.030303 35.167677-47.579798L322.655758 288.693333C334.000808 282.487273 338.138182 268.006465 333. ..." />
                                    </svg>
                                </span>
                            </div>
                            <div class="elementor-icon-box-content">
                                <h3 class="elementor-icon-box-title">
                                    <span><strong><?php echo esc_html($elysia_contact_cards['tel']['label']); ?></strong></span>
                                </h3>
                                <p class="elementor-icon-box-description">
                                    <?php echo esc_html($elysia_contact_cards['tel']['value']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-7472dc88" data-id="7472dc88" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-20e25936 elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="20e25936" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-icon-box-wrapper">
                            <div class="elementor-icon-box-icon">
                                <a href="https://swforming.com/cdn-cgi/l/email-protection#ea998b868f99aa9d9f9283999f849d8b93c4898587" class="elementor-icon" tabindex="-1" aria-label="Email">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="48" height="48">
                                        <defs>
                                            <style type="text/css">
                                                @font-face {
                                                    font-family: feedback-iconfont;
                                                    src: url("static/font/font_1031158_u69w8yhxdu.woff2") format("woff2"), url("static/font/font_1031158_u69w8yhxdu.woff") format("woff"), url("static/font/font_1031158_u69w8yhxdu.ttf") format("truetype");
                                                }
                                            </style>
                                        </defs>
                                        <path d="M513 583.8l448.5-448.5c-11.6-4.7-24.3-7.3-37.5-7.3H100c-12.7 0-24.9 2.4-36.1 6.7L513 583.8z" fill="#ffffff"></path>
                                        <path d="M513 674.3L14.6 175.9C5.3 191.1 0 208.9 0 228v568c0 55.2 44.8 100 100 100h824c55.2 0 100-44.8 100-100V228c0-18.5-5.1-35.9-13.9-50.8L513 674.3z" fill="#ffffff"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="elementor-icon-box-content">
                                <h3 class="elementor-icon-box-title">
                                    <?php
                                    $elysia_email_href = '';
                                    if (!empty($elysia_contact_cards['email']['link'])) {
                                        $elysia_email_href = $elysia_contact_cards['email']['link'];
                                    } elseif (!empty($elysia_contact_cards['email']['value'])) {
                                        $elysia_email_href = 'mailto:' . $elysia_contact_cards['email']['value'];
                                    }
                                    if ($elysia_email_href) {
                                    ?>
                                        <a href="<?php echo esc_url($elysia_email_href); ?>">
                                            <strong><?php echo esc_html($elysia_contact_cards['email']['label']); ?></strong>
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <span><strong><?php echo esc_html($elysia_contact_cards['email']['label']); ?></strong></span>
                                    <?php
                                    }
                                    ?>
                                </h3>
                                <p class="elementor-icon-box-description">
                                    <?php echo esc_html($elysia_contact_cards['email']['value']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-99cb971" data-id="99cb971" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4e884454 elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="4e884454" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-icon-box-wrapper">
                            <div class="elementor-icon-box-icon">
                                <span class="elementor-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="48" height="48">
                                        <defs>
                                            <style type="text/css">
                                                @font-face {
                                                    font-family: feedback-iconfont;
                                                    src: url("static/font/font_1031158_u69w8yhxdu.woff2") format("woff2"), url("static/font/font_1031158_u69w8yhxdu.woff") format("woff"), url("static/font/font_1031158_u69w8yhxdu.ttf") format("truetype");
                                                }
                                            </style>
                                        </defs>
                                        <path d="M938.666667 279.466667a538.026667 538.026667 0 0 0-4.266667-55.04 183.04 183.04 0 0 0-15.786667-46.08 156.16 156.16 0 0 0-30.293333-42.666667 166.826667 166.826667 0 0 0-42.666667-30.293333 182.613333 182.613333 0 0 0-46.08-15.36A435.626667 435.626667 0 0 0 744.96 85.333333H279.466667a538.026667 538.026667 0 0 0-55.04 4.266667 183.04 183.04 0 0 0-46.08 15.786667 156.16 156.16 0 0 0-42.666667 30.293333 166.826667 166.826667 0 0 0-30.293333 42.666667 182.613333 182.613333 0 0 0-15.36 46.08A435.626667 435.626667 0 0 0 85.333333 279.04V744.533333a538.026667 538.026667 0 0 0 4.266667 55.04 183.04 183.04 0 0 0 15.786667 46.08 156.16 156.16 0 0 0 30.293333 42.666667 166.826667 166.826667 0 0 0 42.666667 30.293333 182.613333 182.613333 0 0 0 46.08 15.36 435.626667 435.626667 0 0 0 54.613333 4.693334h465.493333a538.026667 538.026667 0 0 0 55.04-4.266667 183.04 183.04 0 0 0 46.08-15.786667 156.16 156.16 0 0 0 42.666667-30.293333 166.826667 166.826667 0 0 0 30.293333-42.666667 182.613333 182.613333 0 0 0 15.36-46.08 435.626667 435.626667 0 0 0 4.693334-54.613333V302.08v-22.613333zM521.813333 810.666667a303.786667 303.786667 0 0 1-146.346666-38.4l-162.133334 42.666666 42.666667-158.72a303.36 303.36 0 0 1-42.666667-152.746666 306.346667 306.346667 0 1 1 308.48 307.2z m0-560.213334A256 256 0 0 0 306.346667 640l5.973333 9.813333-25.6 93.44L384 716.8l9.386667 5.546667a256 256 0 0 0 128 35.413333 256 256 0 0 0 256-256 256 256 0 0 0-256-256z m149.333334 363.52a77.653333 77.653333 0 0 1-51.626667 36.266667 99.413333 99.413333 0 0 1-47.786667-2.901333 12.8 12.8 0 0 1-7.893333-8.362667l-11.690667-35.925333a13.909333 13.909333 0 0 1 8.32-17.792 29.653333 29.653333 0 0 0 14.421333-11.690667 19.413333 19.413333 0 0 0 1.748667-16.938667c-7.338667-18.773333-24.021333-25.514667-34.944-25.514666a83.541333 83.541333 0 0 0-32.554667 6.250666A63.658667 63.658667 0 0 0 505.344 624.981333a70.272 70.272 0 0 0-1.365333 22.186667 8.7 ..." />
                                    </svg>
                                </span>
                            </div>
                            <div class="elementor-icon-box-content">
                                <h3 class="elementor-icon-box-title">
                                    <span><strong><?php echo esc_html($elysia_contact_cards['whatsapp']['label']); ?></strong></span>
                                </h3>
                                <p class="elementor-icon-box-description">
                                    <?php echo esc_html($elysia_contact_cards['whatsapp']['value']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-6364daa2" data-id="6364daa2" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-179cef8f elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="179cef8f" data-element_type="widget" data-widget_type="icon-box.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-icon-box-wrapper">
                            <div class="elementor-icon-box-icon">
                                <span class="elementor-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="48" height="48">
                                        <defs>
                                            <style type="text/css">
                                                @font-face {
                                                    font-family: feedback-iconfont;
                                                    src: url("static/font/font_1031158_u69w8yhxdu.woff2") format("woff2"), url("static/font/font_1031158_u69w8yhxdu.woff") format("woff"), url("static/font/font_1031158_u69w8yhxdu.ttf") format("truetype");
                                                }
                                            </style>
                                        </defs>
                                        <path d="M497.117867 0C279.074133 0 102.4 177.152 102.4 395.605333 102.4 697.344 421.888 1024 498.346667 1024c76.526933 0 393.4208-326.724267 393.4208-628.394667C891.767467 177.152 714.9568 0 497.117867 0zm0 578.9696a181.6576 181.6576 0 0 1-181.521067-181.8624 181.6576 181.6576 0 0 1 181.521067-181.930667A181.6576 181.6576 0 0 1 678.570667 397.1072 181.6576 181.6576 0 0 1 497.117867 578.901333z" fill="#ffffff"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="elementor-icon-box-content">
                                <h3 class="elementor-icon-box-title">
                                    <span><strong><?php echo esc_html($elysia_contact_cards['address']['label']); ?></strong></span>
                                </h3>
                                <p class="elementor-icon-box-description">
                                    <?php echo esc_html($elysia_contact_cards['address']['value']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
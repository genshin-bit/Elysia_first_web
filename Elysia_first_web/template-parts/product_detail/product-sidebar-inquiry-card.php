<!-- 产品详情页：侧边 Inquiry 卡片模块模板 -->
<section data-particle_enable="false" data-particle-mobile-disabled="false"
    class="elementor-section elementor-inner-section elementor-element elementor-element-50344f32 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="50344f32" data-element_type="section"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;sticky&quot;:&quot;top&quot;,&quot;sticky_offset&quot;:75,&quot;sticky_parent&quot;:&quot;yes&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;],&quot;sticky_effects_offset&quot;:0,&quot;sticky_anchor_link_offset&quot;:0}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-3a561de2"
            data-id="3a561de2" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <?php
                $sidebar_inquiry_title = '';
                $sidebar_inquiry_text = '';
                $sidebar_inquiry_form_text = '';
                $sidebar_inquiry_button_text = '';
                $sidebar_inquiry_button_link = '';
                $sidebar_inquiry_icon_svg = '';
                if (function_exists('get_field')) {
                    $sidebar_inquiry_title = get_field('sidebar_inquiry_title');
                    $sidebar_inquiry_text = get_field('sidebar_inquiry_text');
                    $sidebar_inquiry_form_text = get_field('sidebar_inquiry_form_text');
                    $sidebar_inquiry_button_text = get_field('sidebar_inquiry_button_text');
                    $sidebar_inquiry_button_link = get_field('sidebar_inquiry_button_link');
                    $sidebar_inquiry_icon_svg = get_field('sidebar_inquiry_icon_svg');
                }
                if (!$sidebar_inquiry_title) {
                    $sidebar_inquiry_title = 'Inquiry Now';
                }
                if (!$sidebar_inquiry_button_text) {
                    $sidebar_inquiry_button_text = 'Inquiry Now';
                }
                $default_inquiry_link = '#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjM0MyIsInRvZ2dsZSI6ZmFsc2V9';
                if (!$sidebar_inquiry_button_link) {
                    $sidebar_inquiry_button_link = $default_inquiry_link;
                }
                $sidebar_inquiry_modal_id = 'elysia-sidebar-inquiry-modal-' . get_the_ID();
                $sidebar_inquiry_button_id = 'elysia-sidebar-inquiry-button-' . get_the_ID();
                ?>
                <div class="elementor-element elementor-element-5d95fd79 elementor-widget elementor-widget-heading"
                    data-id="5d95fd79" data-element_type="widget"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            <?php echo esc_html($sidebar_inquiry_title); ?>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-2ecac36b elementor-view-default elementor-widget elementor-widget-icon"
                    data-id="2ecac36b" data-element_type="widget"
                    data-widget_type="icon.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-icon-wrapper">
                            <div class="elementor-icon">
                                <?php if ($sidebar_inquiry_icon_svg) : ?>
                                    <?php echo $sidebar_inquiry_icon_svg; ?>
                                <?php else : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="63"
                                        height="70">
                                        <path
                                            d="M46.565 54.14a1.367 1.367 0 1 0 1.37 1.367 1.369 1.369 0 0 0-1.37-1.367Zm3.372-4.421-6.51-2.166-2.337-4.666a14.963 14.963 0 0 0 4.06-7.922l.291-1.744h2.492a4.11 4.11 0 0 0 4.109-4.1v-8.613a20.543 20.543 0 0 0-41.087 0v8.613a4.109 4.109 0 0 0 2.745 3.867v1.6a4.11 4.11 0 0 0 4.109 4.1h1.2a14.829 14.829 0 0 0 2.3 3.551c.194.223.4.438.6.648l-2.336 4.663-6.51 2.166C5.494 52.239 0 60.193 0 68.632A1.368 1.368 0 0 0 1.37 70h60.26A1.368 1.368 0 0 0 63 68.632c0-8.439-5.493-16.393-13.063-18.913ZM49.3 29.121a1.37 1.37 0 0 1-1.37 1.367h-2.09a89.4 89.4 0 0 0 .674-8.378c0-.08 0-.157.007-.236H49.3v7.246Zm-34.235 1.367a1.37 1.37 0 0 1-1.365-1.367v-7.246h2.78c0 .143.009.286.015.43v.015c.1 2.744.325 5.534.665 8.167h-2.095Zm2.735 5.469a1.37 1.37 0 0 1-1.37-1.367v-1.367h1.123l.291 1.744c.056.331.124.662.2.99H17.8Zm-1.363-16.816h-2.689a17.807 17.807 0 0 1 35.5 0h-2.685A13.86 13.86 0 0 0 32.726 5.468h-2.452a13.86 13.86 0 0 0-13.837 13.673ZM30.274 8.2h2.452a11.127 11.127 0 0 1 11.1 11.13c0 .431 0 .805-.011 1.146v.014l-1.715-.242a22.018 22.018 0 0 1-12.373-6.176 1.371 1.371 0 0 0-.968-.4 12.4 12.4 0 0 0-9.526 4.5A11.126 11.126 0 0 1 30.274 8.2Zm-9.383 27.757a78.013 78.013 0 0 1-1.643-13.269l1.843-2.453a9.646 9.646 0 0 1 7.128-3.813 24.787 24.787 0 0 0 13.5 6.533l2.016.288a85.495 85.495 0 0 1-.8 8.356c-.126.848-.224 1.392-.477 2.915a11.619 11.619 0 0 1-8.257 9.34 10.784 10.784 0 0 1-12.1-5.165h2.792a4.115 4.115 0 0 0 3.873 2.735H31.5a4.1 4.1 0 1 0 0-8.2h-2.739a4.11 4.11 0 0 0-3.875 2.734h-3.995Zm7.754 10.667a13.743 13.743 0 0 0 5.094.114l-2.42 2.555Zm.791 4.657-4.344 4.586a52.049 52.049 0 0 1-3.066-7.1l1.631-3.257Zm9.673-6.232 1.863 3.72a52.005 52.005 0 0 1-3.067 7.1l-4.649-4.641Zm-11.718-7.725a1.369 1.369 0 0 1 1.37-1.367H31.5a1.367 1.367 0 1 1 0 2.735h-2.739a1.37 1.37 0 0 1-1.37-1.368ZM2.794 67.265c.543-6.773 5.058-12.929 11.135-14.952l5.765-1.913a54.77 54.77 0 0 0 3.9 8.441l.006.009a54.81 54.81 0 0 0 3.749 5.715l1.685 2.7H[... 162 chars omitted ...]
                                    <path
                                        d=" M719.142 50.23c-0.9 0-1.816 0.063-2.719 0.195l-15.076 2.232c-0.892 0.144-1.293 0.306-2.021 0.473-13.114 3.063-24.626 10.522-32.88 21.288l-34.431 45.439c-4.814 6.403-4.211 15.558 1.375 21.144l12.868 12.86c5.602 5.584 14.76 6.206 21.155 1.386l31.286-23.568c0.959-0.718 1.88-1.413 2.759-2.116-2.369 8.181-5.053 17.856-7.858 27.693l-0.898 3.189c-2.296 8.155 2.443 16.674 10.589 18.979l3.197 0.892c9.912 2.812 19.588 5.496 27.772 7.862-0.699-0.879-1.396-1.799-2.112-2.76l-23.571-31.296c-4.817-6.389-4.192-15.551 1.396-21.143l12.863-12.868c5.6-5.596 14.752-6.192 21.145-1.379l45.434 34.416c10.776 8.266 18.224 19.789 21.28 32.883 0.177 0.763 0.337 1.161 0.495 2.043l2.224 15.072c0.492 3.292 1.82 12.129 11.61 16.183 1.676 0.678 3.413 1.009 5.12 1.009 5.664 0 9.66-3.302 11.292-4.935l16.15-16.152c3.498-3.474 5.07-8.452 4.183-13.348-0.883-4.896-4.09-8.909-8.58-11.002-20.787-9.7-38.385-23.912-53.173-44.416-11.424-15.995-18.772-31.118-24.65-45.357-2.271-0.955-4.918-2.449-7.904-4.526-4.123-2.833-8.053-4.257-12.2-4.257z"
                                            style="fill:#fff;fill-rule:evenodd"></path>
                                    </svg>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-7642eb76 elementor-widget elementor-widget-text-editor"
                    data-id="7642eb76" data-element_type="widget"
                    data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p>
                            <?php
                            if ($sidebar_inquiry_text) {
                                echo wp_kses_post($sidebar_inquiry_text);
                            } else {
                            ?>
                                Any questions? Send us message now! We’ll serve your request
                                with a whole team after receiving your message.
                            <?php
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="elementor-element elementor-element-14bb6049 elementor-align-center elementor-widget elementor-widget-button"
                    data-id="14bb6049" data-element_type="widget"
                    data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-md"
                                href="#"
                                id="<?php echo esc_attr($sidebar_inquiry_button_id); ?>"
                                data-elysia-modal-target="<?php echo esc_attr($sidebar_inquiry_modal_id); ?>">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-text">
                                        <?php echo esc_html($sidebar_inquiry_button_text); ?>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="<?php echo esc_attr($sidebar_inquiry_modal_id); ?>" class="elysia-sidebar-inquiry-modal">
    <div class="elysia-sidebar-inquiry-modal__overlay"></div>
    <div class="elysia-sidebar-inquiry-modal__content">
        <button type="button" class="elysia-sidebar-inquiry-modal__close" aria-label="Close">×</button>
        <?php if ($sidebar_inquiry_form_text) : ?>
            <p>
                <?php echo wp_kses_post($sidebar_inquiry_form_text); ?>
            </p>
        <?php endif; ?>
        <?php get_template_part('template-parts/components/contact-form-zoho'); ?>
    </div>
</div>
<script type="text/javascript">
    (function() {
        var modalId = '<?php echo esc_js($sidebar_inquiry_modal_id); ?>';
        var buttonId = '<?php echo esc_js($sidebar_inquiry_button_id); ?>';
        var modal = document.getElementById(modalId);
        var button = document.getElementById(buttonId);
        if (!modal || !button) {
            return;
        }
        var overlay = modal.querySelector('.elysia-sidebar-inquiry-modal__overlay');
        var closeBtn = modal.querySelector('.elysia-sidebar-inquiry-modal__close');

        function openModal(e) {
            if (e) {
                e.preventDefault();
            }
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(e) {
            if (e) {
                e.preventDefault();
            }
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
        button.addEventListener('click', openModal);
        if (overlay) {
            overlay.addEventListener('click', closeModal);
        }
        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal);
        }
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' || e.keyCode === 27) {
                if (modal.style.display === 'block') {
                    closeModal();
                }
            }
        });
    })();
</script>
<style>
    .elysia-sidebar-inquiry-modal {
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: none;
    }

    .elysia-sidebar-inquiry-modal__overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
    }

    .elysia-sidebar-inquiry-modal__content {
        position: relative;
        max-width: 480px;
        margin: 40px auto;
        background: #151530;
        padding: 24px;
        border-radius: 8px;
        color: #ffffff;
    }

    .elysia-sidebar-inquiry-modal__close {
        position: absolute;
        top: 8px;
        right: 8px;
        border: 0;
        background: transparent;
        color: #ffffff;
        font-size: 24px;
        line-height: 1;
        cursor: pointer;
    }
</style>
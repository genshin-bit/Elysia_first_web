<?php
// 产品详情页：FAQ 模块模板
$faq_title = '';
if (function_exists('get_field')) {
    $faq_title = get_field('faq_title');
}
if (!$faq_title) {
    $faq_title = 'FAQ';
}
if (function_exists('have_rows') && have_rows('faq_items')) :
    $faq_index = 0;
    $post_id_for_faq = get_the_ID();
?>
    <div class="elementor-element elementor-element-76057593 elementor-widget elementor-widget-heading"
        data-id="76057593" data-element_type="widget" data-widget_type="heading.default">
        <div class="elementor-widget-container">
            <h2 class="elementor-heading-title elementor-size-default">
                <?php echo esc_html($faq_title); ?>
            </h2>
        </div>
    </div>
    <div class="elementor-element elementor-element-15560985 elementor-widget elementor-widget-eael-adv-accordion"
        data-id="15560985" data-element_type="widget"
        data-widget_type="eael-adv-accordion.default">
        <div class="elementor-widget-container">
            <div class="eael-adv-accordion" id="eael-adv-accordion-15560985"
                data-scroll-on-click="no" data-scroll-speed="300" data-accordion-id="15560985"
                data-accordion-type="accordion" data-toogle-speed="300">
                <?php while (have_rows('faq_items')) :
                    the_row();
                    $faq_index++;
                    $question = function_exists('get_sub_field') ? get_sub_field('question') : '';
                    $answer = function_exists('get_sub_field') ? get_sub_field('answer') : '';
                    if (!$question && !$answer) {
                        continue;
                    }
                    $header_id = 'product-faq-' . $post_id_for_faq . '-' . $faq_index;
                    $content_id = 'product-faq-content-' . $post_id_for_faq . '-' . $faq_index;
                ?>
                    <div class="eael-accordion-list">
                        <div id="<?php echo esc_attr($header_id); ?>"
                            class="elementor-tab-title eael-accordion-header<?php echo $faq_index === 1 ? ' active-default' : ''; ?>"
                            tabindex="0" data-tab="<?php echo esc_attr($faq_index); ?>"
                            aria-controls="<?php echo esc_attr($content_id); ?>">
                            <span class="eael-accordion-tab-title">
                                <?php echo esc_html($question); ?>
                            </span><i aria-hidden="true"
                                class="fa-toggle fas fa-angle-right"></i>
                        </div>
                        <div id="<?php echo esc_attr($content_id); ?>"
                            class="eael-accordion-content clearfix<?php echo $faq_index === 1 ? ' active-default' : ''; ?>"
                            data-tab="<?php echo esc_attr($faq_index); ?>"
                            aria-labelledby="<?php echo esc_attr($header_id); ?>">
                            <p class="hover-element">
                                <?php echo wp_kses_post($answer); ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php
endif;

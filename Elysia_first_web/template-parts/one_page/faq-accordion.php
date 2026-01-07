<?php
$faq_items = array();

if (function_exists('get_field')) {
    $faq_items = get_field('faq_items');
}

if (!is_array($faq_items)) {
    $faq_items = array();
}
?>
<div class="elementor-element elementor-element-77ed1560 elementor-widget elementor-widget-eael-adv-accordion" data-id="77ed1560" data-element_type="widget" data-widget_type="eael-adv-accordion.default">
    <div class="elementor-widget-container">
        <div class="eael-adv-accordion" id="eael-adv-accordion-77ed1560" data-scroll-on-click="no" data-scroll-speed="300" data-accordion-id="77ed1560" data-accordion-type="accordion" data-toogle-speed="300">
            <?php if (!empty($faq_items)) : ?>
                <?php
                $index = 0;
                foreach ($faq_items as $item) :
                    $index++;
                    $question = isset($item['question']) ? $item['question'] : '';
                    $answer = isset($item['answer']) ? $item['answer'] : '';
                    $slug = '';
                    if (isset($item['slug']) && $item['slug'] !== '') {
                        $slug = sanitize_title($item['slug']);
                    }
                    if ($slug === '') {
                        $slug = 'faq-item-' . $index;
                    }
                    $title_id = $slug;
                    $content_id = 'elementor-tab-content-faq-' . $index;
                    $is_open = !empty($item['is_default_open']);
                    $title_classes = 'elementor-tab-title eael-accordion-header';
                    $content_classes = 'eael-accordion-content clearfix';
                    if ($is_open) {
                        $title_classes .= ' active-default';
                        $content_classes .= ' active-default';
                    }
                ?>
                    <div class="eael-accordion-list">
                        <div id="<?php echo esc_attr($title_id); ?>" class="<?php echo esc_attr($title_classes); ?>" tabindex="0" data-tab="<?php echo esc_attr((string) $index); ?>" aria-controls="<?php echo esc_attr($content_id); ?>">
                            <span class="eael-accordion-tab-title"><?php echo esc_html($question); ?></span><i aria-hidden="true" class="fa-toggle fas fa-angle-right"></i>
                        </div>
                        <div id="<?php echo esc_attr($content_id); ?>" class="<?php echo esc_attr($content_classes); ?>" data-tab="<?php echo esc_attr((string) $index); ?>" aria-labelledby="<?php echo esc_attr($title_id); ?>">
                            <?php if ($answer !== '') : ?>
                                <?php echo wp_kses_post($answer); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

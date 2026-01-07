<?php
$elysia_sr_intro_eyebrow = '';
$elysia_sr_intro_title = '';
$elysia_sr_intro_body_main = '';
$elysia_sr_intro_body_sub = '';
$elysia_sr_intro_cta_text = '';
$elysia_sr_pillars = array();
if (function_exists('get_field')) {
    $elysia_sr_intro_eyebrow = (string) get_field('sr_intro_eyebrow');
    $elysia_sr_intro_title = (string) get_field('sr_intro_title');
    $elysia_sr_intro_body_main = (string) get_field('sr_intro_body_main');
    $elysia_sr_intro_body_sub = (string) get_field('sr_intro_body_sub');
    $elysia_sr_intro_cta_text = (string) get_field('sr_intro_cta_text');
    $elysia_sr_pillars_field = get_field('sr_pillars');
    if (is_array($elysia_sr_pillars_field)) {
        $elysia_sr_pillars = $elysia_sr_pillars_field;
    }
}
?>
<section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-top-section elementor-element elementor-element-117b1b23 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="117b1b23" data-element_type="section">
    <div class="elementor-container elementor-column-gap-custom">
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-412efd38" data-id="412efd38" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-edb1371 elementor-widget elementor-widget-heading" data-id="edb1371" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_intro_eyebrow !== '') : ?>
                            <h5 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_intro_eyebrow); ?>
                            </h5>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-24fb3a4 elementor-widget elementor-widget-heading" data-id="24fb3a4" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_intro_title !== '') : ?>
                            <h2 class="elementor-heading-title elementor-size-default">
                                <?php echo esc_html($elysia_sr_intro_title); ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-42bafcb4 elementor-widget elementor-widget-text-editor" data-id="42bafcb4" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <?php
                        if ($elysia_sr_intro_body_main !== '') {
                            echo $elysia_sr_intro_body_main;
                        }
                        if ($elysia_sr_intro_body_sub !== '') {
                            echo $elysia_sr_intro_body_sub;
                        }
                        ?>
                    </div>
                </div>
                <div class="elementor-element elementor-element-989b382 elementor-mobile-align-center elementor-align-left elementor-widget elementor-widget-button" data-id="989b382" data-element_type="widget" data-widget_type="button.default">
                    <div class="elementor-widget-container">
                        <?php if ($elysia_sr_intro_cta_text !== '') : ?>
                            <div class="elementor-button-wrapper">
                                <a class="elementor-button elementor-button-link elementor-size-md" href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjMwNiIsInRvZ2dsZSI6ZmFsc2V9">
                                    <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text">
                                            <?php echo esc_html($elysia_sr_intro_cta_text); ?>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-796fed39" data-id="796fed39" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-69c743de elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="69c743de" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-b9f060c" data-id="b9f060c" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-46b31df3 elementor-position-left elementor-view-default elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="46b31df3" data-element_type="widget" data-widget_type="icon-box.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <span class="elementor-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                        <path d="M467.08712158 854.4263794c-28.77912598 0-57.12220459 2.18023682-85.4652832-0.43604736-64.0989624-6.10466309-128.63397217-13.95351563-192.29688721-22.67446289-26.59888916-3.48837891-30.52331543-9.15699463-34.88378906-35.75588379-5.23256836-31.39541016-3.05233154-62.35477295 3.48837891-93.31413574 6.10466309-28.34307861 27.47098389-44.04078369 53.19777832-53.19777832 23.11051025-8.72094727 47.5291626-14.38956299 71.07572021-23.11051025 13.95351563-4.796521 27.03493652-11.77327881 39.68031006-19.18608399 25.72679443-15.26165771 36.62797852-38.37216797 33.13959961-68.45943603-1.74418945-13.95351563-5.66861572-27.03493652-17.44189453-35.31983643-22.23841553-15.69770508-34.4477417-37.50007324-41.86054688-63.22686768-1.30814209-3.92442627-4.36047363-8.2848999-7.84885254-10.46513671-25.72679443-17.44189453-34.01169434-53.63382568-18.31398925-81.10480958 3.48837891-6.10466309 5.23256836-13.95351563 6.10466308-20.93027343 3.92442627-28.34307861 5.23256836-57.55825195 11.33723145-85.02923584 17.44189453-75.00014648 76.30828857-121.22116699 153.48867187-122.96535645 32.70355225-0.87209473 63.66291504 5.66861572 93.75018311 19.18608399 41.86054687 18.31398926 68.8954834 50.14544678 80.6687622 93.7501831 6.10466309 23.11051025 10.02908936 47.09311523 13.51746827 70.63967285 2.61628418 18.31398926 1.74418945 36.19193115 11.7732788 54.50592041 13.0814209 23.54655762 0 56.68615723-22.23841552 72.81990967-6.10466309 4.36047363-8.72094727 13.51746826-11.33723145 20.93027344-2.61628418 7.41280518-6.10466309 12.64537354-13.95351562 16.13375244-143.02353516 66.27919922-201.8899292 235.90162354-130.81420899 376.30887451 2.18023682 3.92442627 3.92442627 8.2848999 5.23256836 10.90118408z" fill="#AD1C13"></path>
                                                        <path d="M483.65692139 697.44932862c0-108.13974609 88.95366211-197.0934082 196.65736084-197.0934082 108.13974609 0 196.22131348 88.51761475 196.22131347 196.65736084 0 109.01184082-87.64552002 196.65736084-196.22131347 196.65736084-108.13974609 0.43604736-196.65736084-87.64552002-196.65736084-196.22131348z m195.34921875-57.99429931c-0.87209473-0.87209473-1.74418945-2.18023682-3.05233155-3.05233155-18.31398926-17.87794189-40.11635742-24.41865234-64.97105713-16.13375244-42.7326416 14.38956299-54.06987305 68.45943604-33.57564697 100.72694092 8.2848999 13.0814209 19.18608398 23.54655762 30.52331543 33.57564697 20.93027344 19.18608398 44.04078369 35.75588379 67.58734131 51.88963623 5.23256836 3.48837891 6.10466309 3.48837891 11.33723145 0 26.59888916-18.75003662 51.88963623-39.2442627 75.00014648-62.35477295 9.15699463-9.15699463 17.87794189-18.75003662 23.11051025-30.52331543 10.46513672-23.11051025 9.15699463-45.78497314-3.92442627-67.5873413-18.75003662-31.83145752-59.30244141-40.11635742-88.9536621-18.75003663-3.92442627 3.48837891-8.2848999 7.84885254-13.0814209 12.20932618 0.43604736 0 0.43604736 0 0 0z" fill="#AD1C13"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <?php
                                                $elysia_title = '';
                                                if (isset($elysia_sr_pillars[0]) && is_array($elysia_sr_pillars[0]) && isset($elysia_sr_pillars[0]['sr_pillar_title'])) {
                                                    $elysia_title = (string) $elysia_sr_pillars[0]['sr_pillar_title'];
                                                }
                                                if ($elysia_title !== '') :
                                                ?>
                                                    <h4 class="elementor-icon-box-title">
                                                        <span>
                                                            <?php echo esc_html($elysia_title); ?>
                                                        </span>
                                                    </h4>
                                                <?php endif; ?>
                                                <?php
                                                $elysia_desc = '';
                                                if (isset($elysia_sr_pillars[0]) && is_array($elysia_sr_pillars[0]) && isset($elysia_sr_pillars[0]['sr_pillar_description'])) {
                                                    $elysia_desc = (string) $elysia_sr_pillars[0]['sr_pillar_description'];
                                                }
                                                if ($elysia_desc !== '') :
                                                ?>
                                                    <p class="elementor-icon-box-description">
                                                        <?php echo esc_html($elysia_desc); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2b5500d" data-id="2b5500d" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-1aa863f7 elementor-position-left elementor-view-default elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="1aa863f7" data-element_type="widget" data-widget_type="icon-box.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <span class="elementor-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                        <path d="M626.1 197.48l33.14 99.4-181.18 181.18c-18.76 18.76-18.76 49.12 0 67.88 18.74 18.74 49.12 18.76 67.88 0l181.18-181.18 99.4 33.14c14.78 4.92 31.06 1.08 42.08-9.92l127.34-127.34c21.6-21.6 12.92-58.4-16.08-68.08l-111.32-37.1-37.1-111.3c-9.66-29-46.46-37.68-68.08-16.08L636.04 155.4a41.164 41.164 0 0 0-9.94 42.08z m-150.34 192.38l110.28-110.28-4.24-12.76c-22.34-6.34-45.44-10.82-69.8-10.82-141.38 0-256 114.62-256 256s114.62 256 256 256 256-114.62 256-256c0-24.36-4.48-47.46-10.84-69.78l-12.74-4.24-110.28 110.28C618.38 601.1 569.9 640 512 640c-70.58 0-128-57.42-128-128 0-57.9 38.9-106.38 91.76-122.14z m509.1-27.66l-71 71c-11 11-24.14 18.96-38.34 24.14 2.66 17.88 4.5 36.04 4.5 54.66 0 203.38-164.58 368-368 368-203.38 0-368-164.58-368-368 0-203.38 164.58-368 368-368 18.84 0 37.2 1.86 55.26 4.58 5.16-14.04 12.46-27.38 23.52-38.44l71-71A495.696 495.696 0 0 0 512 16C238.06 16 16 238.06 16 512s222.06 496 496 496 496-222.06 496-496c0-52.22-8.18-102.52-23.14-149.8z" fill="#AD1C13"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <?php
                                                $elysia_title = '';
                                                if (isset($elysia_sr_pillars[1]) && is_array($elysia_sr_pillars[1]) && isset($elysia_sr_pillars[1]['sr_pillar_title'])) {
                                                    $elysia_title = (string) $elysia_sr_pillars[1]['sr_pillar_title'];
                                                }
                                                if ($elysia_title !== '') :
                                                ?>
                                                    <h4 class="elementor-icon-box-title">
                                                        <span>
                                                            <?php echo esc_html($elysia_title); ?>
                                                        </span>
                                                    </h4>
                                                <?php endif; ?>
                                                <?php
                                                $elysia_desc = '';
                                                if (isset($elysia_sr_pillars[1]) && is_array($elysia_sr_pillars[1]) && isset($elysia_sr_pillars[1]['sr_pillar_description'])) {
                                                    $elysia_desc = (string) $elysia_sr_pillars[1]['sr_pillar_description'];
                                                }
                                                if ($elysia_desc !== '') :
                                                ?>
                                                    <p class="elementor-icon-box-description">
                                                        <?php echo esc_html($elysia_desc); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section data-particle_enable="false" data-particle-mobile-disabled="false" class="elementor-section elementor-inner-section elementor-element elementor-element-1bb869f0 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1bb869f0" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-40b9c1a2" data-id="40b9c1a2" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-39354560 elementor-position-left elementor-view-default elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="39354560" data-element_type="widget" data-widget_type="icon-box.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <span class="elementor-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                        <path d="M328.42 362.16c-4.3 0-8.63-1.38-12.28-4.22-3.88-3.02-7.75-6.11-11.52-9.17-8.57-6.97-9.86-19.57-2.89-28.14 6.97-8.57 19.57-9.86 28.14-2.89 3.55 2.88 7.2 5.79 10.86 8.64 8.71 6.79 10.27 19.36 3.48 28.07-3.94 5.07-9.83 7.71-15.79 7.71z" fill="#AD1C13"></path>
                                                        <path d="M220.43 709.92c-6.85 0-13.7-2.61-18.93-7.86-7.8-7.85-32.23-34.61-64.05-74.72-6.87-8.56-5.48-21.13 3.09-27.98 8.57-6.87 21.13-5.48 27.98 3.09 29.57 36.82 52.54 61.7 60.2 69.38 7.81 7.83 7.82 20.51 0 28.32-3.91 3.91-9.03 5.77-14.19 5.77zM141.25 558.36c-0.86 0-1.75-0.06-2.63-0.17-10.98-1.44-18.7-11.57-17.26-22.55 7.63-58.04 28.17-114.09 60.26-163.36 57.44-87.26 145.41-147.03 246.65-168.36 11-2.3 21.83 4.8 24.16 15.83 2.33 11.03-4.81 21.83-15.83 24.16-88.09 18.63-165.37 71.79-215.79 148.57-27.55 41.87-45.51 88.77-52.41 137.99-1.32 10.17-10.02 17.89-20.15 17.89z" fill="#AD1C13"></path>
                                                        <path d="M556.13 869.33c-79.68 0-159.34-21.53-230.95-64.54-9.45-5.75-12.46-18.05-6.71-27.5 5.75-9.47 18.07-12.46 27.5-6.71 66.13 40.24 142.41 57.57 218.56 50.2 11.2-1.1 21.13 6.96 22.29 18.05 1.16 11.09-6.96 21.13-18.05 22.29-4.19 0.43-8.39 0.78-12.6 1.06-6.73 0.47-13.47 0.7-20.2 0.7zM774.39 786.63c-3.34 0-6.73-0.7-9.95-2.18-10.06-4.53-14.56-16.39-10.03-26.45 16.24-36.14 26.36-74.6 29.37-114.32 7.41-98.43-27.6-196.31-96.05-267.59-7.77-8.04-7.56-20.81 0.48-28.6 8.06-7.79 20.81-7.55 28.6 0.48 77.19 79.83 117.25 189.55 108.88 301.35-3.38 44.88-14.81 88.25-33.97 129.87-3.33 7.39-10.65 11.44-17.33 11.44z" fill="#AD1C13"></path>
                                                        <path d="M681.1 889.99c-7.17 0-14.12-3.73-17.94-10.47-5.57-9.9-2.07-22.42 7.82-28 124.37-69.99 198.38-201.55 193.35-343.92-0.4-11.16 8.33-20.54 19.47-20.95 10.8-0.5 20.54 8.33 20.95 19.47 5.61 155.87-76.31 300.9-214.85 378.9-3.22 1.81-6.73 2.67-10.2 2.67z" fill="#AD1C13"></path>
                                                        <path d="M504.58 381.13c-21.68 0-42.26-8.16-58.07-22.98-12.85-12.85-20.62-29.41-22.41-47.3-0.62-6.13 1.23-12.28 5.15-17.05 12.76-15.98 33.41-24.6 56.33-23.43 32.26 1.7 61.36 22.03 73.65 51.86 4.35 10.55-0.72 22.61-11.27 26.96-10.56 4.34-22.61-0.72-26.96-11.27-5.11-12.38-17.27-21.01-30.86-21.72-5.73-0.35-10.94 1.06-14.57 3.42 3.43 8.74 9.88 16.26 18.12 20.5 10.01 5.09 13.99 17.24 8.9 27.26-3.55 6.98-10.6 11-17.94 11z" fill="#AD1C13"></path>
                                                        <path d="M591.91 616.41H443.39c-11.23 0-20.32-9.1-20.32-20.32 0-11.23 9.1-20.32 20.32-20.32h148.51c11.23 0 20.32 9.1 20.32 20.32 0.01 11.23-9.09 20.32-20.31 20.32z" fill="#AD1C13"></path>
                                                        <path d="M517.65 699.07c-23.2 0-42.06-18.86-42.06-42.06v-82.66c0-23.2 18.86-42.06 42.06-42.06 23.2 0 42.06 18.86 42.06 42.06v82.66c0 23.2-18.86 42.06-42.06 42.06z m0-126.13c-0.39 0-0.71 0.32-0.71 0.71v82.66c0 0.39 0.32 0.71 0.71 0.71 0.39 0 0.71-0.32 0.71-0.71v-82.66c0.01-0.39-0.32-0.71-0.71-0.71z" fill="#AD1C13"></path>
                                                        <path d="M371.29 868.01c-89.52 0-173.84-37.32-249.13-110.96-8.12-7.73-8.45-20.49-0.72-28.62 7.71-8.12 20.49-8.45 28.6-0.72 112.45 107.06 239.03 132.07 366.8 72.37 10.24-4.76 22.45-0.36 27.2 9.88 4.75 10.22 0.36 22.45-9.88 27.2-53.07 24.65-107.06 36.85-162.87 36.85zM147.81 698.76c-8.48 0-16.34-5.31-19.18-13.79-3.7-11.26 2.52-23.35 13.78-27.05 10.9-3.6 22.88 2.35 26.86 13.16 3.97 10.89-1.91 23.34-12.8 27.31-2.23 0.82-4.52 1.18-6.86 1.18zM230.09 368.22c-5.38 0-10.79-2.11-14.8-6.31-7.84-8.17-7.63-21.14 0.54-28.96 1.85-1.77 3.71-3.54 5.6-5.29 8.22-7.64 21.16-7.24 28.87 0.98 7.71 8.22 7.24 21.16-0.98 28.87-1.71 1.6-3.4 3.21-5.08 4.84-3.97 3.82-9.1 5.87-14.15 5.87z" fill="#AD1C13"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <?php
                                                $elysia_title = '';
                                                if (isset($elysia_sr_pillars[2]) && is_array($elysia_sr_pillars[2]) && isset($elysia_sr_pillars[2]['sr_pillar_title'])) {
                                                    $elysia_title = (string) $elysia_sr_pillars[2]['sr_pillar_title'];
                                                }
                                                if ($elysia_title !== '') :
                                                ?>
                                                    <h4 class="elementor-icon-box-title">
                                                        <span>
                                                            <?php echo esc_html($elysia_title); ?>
                                                        </span>
                                                    </h4>
                                                <?php endif; ?>
                                                <?php
                                                $elysia_desc = '';
                                                if (isset($elysia_sr_pillars[2]) && is_array($elysia_sr_pillars[2]) && isset($elysia_sr_pillars[2]['sr_pillar_description'])) {
                                                    $elysia_desc = (string) $elysia_sr_pillars[2]['sr_pillar_description'];
                                                }
                                                if ($elysia_desc !== '') :
                                                ?>
                                                    <p class="elementor-icon-box-description">
                                                        <?php echo esc_html($elysia_desc); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6e452560" data-id="6e452560" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-563ec0fc elementor-position-left elementor-view-default elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="563ec0fc" data-element_type="widget" data-widget_type="icon-box.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-icon-box-wrapper">
                                            <div class="elementor-icon-box-icon">
                                                <span class="elementor-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                                                        <path d="M697.81 997.38h-330.8c-125.5 0-227.6-102.1-227.6-227.6V611.74c0-11.32 9.17-20.49 20.49-20.49 11.32 0 20.49 9.17 20.49 20.49v158.04c0 102.13 83.14 185.27 185.27 185.27h330.8c11.32 0 20.49 9.17 20.49 20.49s-9.17 20.88-20.49 20.88z" fill="#AD1C13"></path>
                                                        <path d="M878.72 741.86c-11.32 0-20.49-9.17-20.49-20.49 0-88.33-71.84-160.17-160.17-160.17h-67.25c-11.32 0-20.49-9.17-20.49-20.49s9.17-20.49 20.49-20.49h67.25c110.93 0 201.16 90.22 201.16 201.16-0.01 11.32-9.18 20.48-20.49 20.48zM369.51 389.45c-11.32 0-20.49-9.17-20.49-20.49V227.89C349.02 100.59 452.4-2.8 579.7-2.8s230.68 103.39 230.68 230.68v140.36c0 11.32-9.17 20.49-20.49 20.49-11.32 0-20.49-9.17-20.49-20.49V227.89c0-88.33-71.84-160.17-160.17-160.17-88.33 0-160.17 71.84-160.17 160.17v141.07c0 11.32-9.17 20.49-20.49 20.49z" fill="#AD1C13"></path>
                                                        <path d="M173.76 633.35c-11.32 0-20.49-9.17-20.49-20.49v-144.8C153.27 259.63 255.86 157.04 380.3 157.04c11.32 0 20.49 9.17 20.49 20.49s-9.17 20.49-20.49 20.49c-102.13 0-185.27 83.14-185.27 185.27v144.8c0.01 11.32-9.16 20.26-21.27 20.26zM218.26 902.67c-11.32 0-20.49-9.17-20.49-20.49 0-88.33 71.84-160.17 160.17-160.17h345.37c11.32 0 20.49 9.17 20.49 20.49 0 11.32-9.17 20.49-20.49 20.49H357.94c-66.11 0-119.79 53.68-119.79 119.79-0.01 11.55-9.17 20.89-19.89 20.89z" fill="#AD1C13"></path>
                                                        <path d="M597.69 432.63v217.78c0 44.91-48.03 94.57-54.69 101.26-3.61 3.61-8.13 5.42-12.9 5.42-4.52 0-9.3-1.81-12.9-5.42-6.66-6.69-54.69-56.35-54.69-101.26V432.63c0-38.84 31.74-70.58 70.58-70.58 38.84 0 70.6 31.74 70.6 70.58z" fill="#AD1C13"></path>
                                                        <path d="M740.93 425.11c0 22.99-9.43 43.78-24.58 58.94s-35.95 24.58-58.94 24.58c-46.1 0-83.53-37.41-83.53-83.53 0-10.42 1.89-20.41 5.3-29.67 11.65-32.3 42.67-55.58 78.23-55.58 46.1-0.01 83.52 37.41 83.52 83.26z" fill="#AD1C13"></path>
                                                        <path d="M534.5 832.5c-41.25 0-77.49-21.04-98.53-52.89-12.39-18.83-19.6-41.43-19.6-65.71 0-81.23 116.4-230.8 121.34-237.01 4-4.95 10.04-7.84 16.41-7.84 6.3 0 12.27 2.89 16.27 7.84 5.02 6.21 121.48 155.79 121.48 237.01 0 24.28-7.22 46.88-19.64 65.71-21.09 31.86-57.36 52.89-98.73 52.89zM534.24 527.59c-33.53 47.23-92.1 137.74-92.1 186.31 0 14.04 4.04 28.82 11.44 40.3 14.33 22.09 39.19 36.19 67.27 36.19 27.93 0 52.93-14.1 67.32-36.19 7.44-11.48 11.39-26.26 11.39-40.3-0.01-49.62-58.86-139.22-92.32-186.31z" fill="#AD1C13"></path>
                                                        <path d="M517.04 453.15c0 28.56-11.57 54.41-30.25 72.76-2.01 1.99-4.06 3.9-6.24 5.73-1.21 1.1-2.46 2.11-3.72 3.13-2.2 1.72-4.47 3.27-6.78 4.78-15.51 9.88-33.91 15.59-53.67 15.59-55.63 0-100.82-45.19-100.82-100.82 0-55.6 45.19-100.82 100.82-100.82 19.76 0 38.29 5.71 53.67 15.59 2.29 1.46 4.54 3.05 6.78 4.73 1.3 1.02 2.55 2.04 3.76 3.13 2.14 1.83 4.19 3.74 6.2 5.69 18.69 18.36 30.25 44.22 30.25 72.78z" fill="#AD1C13"></path>
                                                        <path d="M363.15 613.53c38.2 0 66.36-22.02 66.36-52.01 0-3.04-0.3-5.92-0.82-8.68-17.72-3.79-36.03-7.84-52.25-6.62-32.1 2.41-60.99 19.33-79.76 45.08 9.03 13.9 19.63 22.23 32.46 25.11 9.40 2.09 22.98-2.88 34.01-2.88z" fill="#AD1C13"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="elementor-icon-box-content">
                                                <?php
                                                $elysia_title = '';
                                                if (isset($elysia_sr_pillars[3]) && is_array($elysia_sr_pillars[3]) && isset($elysia_sr_pillars[3]['sr_pillar_title'])) {
                                                    $elysia_title = (string) $elysia_sr_pillars[3]['sr_pillar_title'];
                                                }
                                                if ($elysia_title !== '') :
                                                ?>
                                                    <h4 class="elementor-icon-box-title">
                                                        <span>
                                                            <?php echo esc_html($elysia_title); ?>
                                                        </span>
                                                    </h4>
                                                <?php endif; ?>
                                                <?php
                                                $elysia_desc = '';
                                                if (isset($elysia_sr_pillars[3]) && is_array($elysia_sr_pillars[3]) && isset($elysia_sr_pillars[3]['sr_pillar_description'])) {
                                                    $elysia_desc = (string) $elysia_sr_pillars[3]['sr_pillar_description'];
                                                }
                                                if ($elysia_desc !== '') :
                                                ?>
                                                    <p class="elementor-icon-box-description">
                                                        <?php echo esc_html($elysia_desc); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
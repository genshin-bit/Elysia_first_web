<?php

defined('ABSPATH') || exit;

$elysia_video_url = '';
$elysia_video_aspect_ratio = '';

if (function_exists('get_field')) {
    $elysia_video_url = (string) get_field('solution_detail_sidebar_video_url');
    $elysia_video_aspect_ratio = (string) get_field('solution_detail_sidebar_video_aspect_ratio');
}

if (!$elysia_video_url) {
    $elysia_context_id = get_queried_object_id();
    if ($elysia_context_id && function_exists('get_field')) {
        $fallback_url = (string) get_field('solution_sidebar_video_url', $elysia_context_id);
        $fallback_ratio = (string) get_field('solution_sidebar_video_aspect_ratio', $elysia_context_id);
        if ($fallback_url) {
            $elysia_video_url = $fallback_url;
        }
        if ($fallback_ratio) {
            $elysia_video_aspect_ratio = $fallback_ratio;
        }
    }
}

if (!$elysia_video_url && function_exists('get_field')) {
    $default_url = (string) get_field('solution_default_sidebar_video_url', 'option');
    $default_ratio = (string) get_field('solution_default_sidebar_video_aspect_ratio', 'option');
    if ($default_url) {
        $elysia_video_url = $default_url;
    }
    if ($default_ratio) {
        $elysia_video_aspect_ratio = $default_ratio;
    }
}

if (!$elysia_video_aspect_ratio) {
    $elysia_video_aspect_ratio = '16/9';
}

$elysia_video_embed_url = '';
$elysia_video_is_youtube = false;
if ($elysia_video_url) {
    if (function_exists('elysia_get_youtube_embed_url')) {
        $converted = elysia_get_youtube_embed_url($elysia_video_url);
        if ($converted !== $elysia_video_url) {
            $elysia_video_embed_url = $converted;
            $elysia_video_is_youtube = true;
        } else {
            $elysia_video_embed_url = $elysia_video_url;
        }
    } else {
        $elysia_video_embed_url = $elysia_video_url;
    }
}

if ($elysia_video_embed_url) :
    $elysia_video_settings = array(
        'controls' => 'yes',
    );
    if ($elysia_video_is_youtube) {
        $elysia_video_settings['youtube_url'] = $elysia_video_url;
        $elysia_video_settings['video_type'] = 'youtube';
    } else {
        $elysia_video_settings['video_type'] = 'hosted';
    }
?>
    <div class="elementor-element elementor-element-faebde6 elementor-widget elementor-widget-video" data-id="faebde6" data-element_type="widget" data-settings="<?php echo esc_attr(wp_json_encode($elysia_video_settings)); ?>" data-widget_type="video.default">
        <div class="elementor-widget-container">
            <div class="elementor-wrapper elementor-open-inline" style="aspect-ratio: <?php echo esc_attr($elysia_video_aspect_ratio); ?>;">
                <div class="elementor-video">
                    <?php if ($elysia_video_is_youtube) : ?>
                        <iframe src="<?php echo esc_url($elysia_video_embed_url); ?>" frameborder="0" allowfullscreen></iframe>
                    <?php else : ?>
                        <iframe src="<?php echo esc_url($elysia_video_embed_url); ?>" frameborder="0" allow="autoplay; encrypted-media" sandbox="allow-scripts allow-same-origin allow-popups" allowfullscreen></iframe>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php
endif;

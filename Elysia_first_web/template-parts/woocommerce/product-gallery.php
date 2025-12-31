<?php

$elysia_gallery_images = array();

if (function_exists('get_field')) {
    $elysia_gallery = get_field('elysia_product_gallery', get_the_ID());
    if (is_array($elysia_gallery) && !empty($elysia_gallery)) {
        foreach ($elysia_gallery as $gallery_item) {
            if (is_array($gallery_item) && isset($gallery_item['ID'])) {
                $elysia_gallery_images[] = (int) $gallery_item['ID'];
            } elseif ($gallery_item) {
                $elysia_gallery_images[] = (int) $gallery_item;
            }
        }
    }
}

$main_image_id = get_post_thumbnail_id();
$gallery_ids = $elysia_gallery_images;

$images = array();

if ($main_image_id) {
    $images[] = $main_image_id;
}

if (!empty($gallery_ids)) {
    foreach ($gallery_ids as $gid) {
        $gid = (int) $gid;
        if ($gid && $gid !== $main_image_id && !in_array($gid, $images, true)) {
            $images[] = $gid;
        }
    }
}

if (empty($images) && !empty($gallery_ids)) {
    $fallback = (int) reset($gallery_ids);
    if ($fallback) {
        $images[] = $fallback;
    }
}

if (empty($images)) {
    return;
}
?>

<div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
    data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
    <div class="woocommerce-product-gallery__wrapper">
        <?php foreach ($images as $image_id) :
            $full_image = wp_get_attachment_image_src($image_id, 'full');
            $thumb_image = wp_get_attachment_image_src($image_id, 'thumbnail');
            $display_image = wp_get_attachment_image_src($image_id, 'large');
            $full_url = $full_image ? $full_image[0] : '';
            $thumb_url = $thumb_image ? $thumb_image[0] : $full_url;
            $display_url = $display_image ? $display_image[0] : $full_url;
            $full_width = $full_image ? $full_image[1] : '';
            $full_height = $full_image ? $full_image[2] : '';
            $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            if (!$alt) {
                $alt = get_the_title($image_id);
            }
        ?>
            <div class="woocommerce-product-gallery__image"
                <?php if ($thumb_url) { ?>
                data-thumb="<?php echo esc_url($thumb_url); ?>"
                <?php } ?>>
                <a href="<?php echo esc_url($full_url); ?>">
                    <img loading="lazy"
                        src="<?php echo esc_url($display_url); ?>"
                        class="wp-post-image" alt="<?php echo esc_attr($alt); ?>"
                        data-src="<?php echo esc_url($full_url); ?>"
                        data-large_image="<?php echo esc_url($full_url); ?>"
                        <?php if ($full_width && $full_height) { ?>
                        data-large_image_width="<?php echo esc_attr($full_width); ?>"
                        data-large_image_height="<?php echo esc_attr($full_height); ?>"
                        <?php } ?>
                        decoding="async" />
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php

/**
 * Title: Album
 * Slug: samotel/album
 * Categories: text
 * Description: photo album
 * Keywords: album, photos
 * Block Types: core/image
 *
 * @package samotel
 * @since 1.0.0
 */
?>

<!-- wp:group -->
<span>
    <?php
    $args = array(
        'post_type' => 'attachment',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => [
            [
                'taxonomy' => 'category',
                'field'    => 'name',
                'terms'    => 'album',
            ],
        ],
    );

    $wp_query = new WP_Query($args);
    wp_reset_postdata();
    if ($wp_query->have_posts()) : ?>
        <script type="text/javascript">
            const media_file = <?= json_encode(array_map(function ($item) {
                                    $img["img"] = the_attachment_link($item->ID, false);
                                    return $img;
                                }, $wp_query->posts)); ?>;
            console.log(media_file);
        </script>
    <?php endif; ?>
</span>
<!-- /wp:group -->
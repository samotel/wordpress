<?php

/**
 * Title: Logo image
 * Slug: samotel/logo-image
 * Categories: media
 * Description: Logo image
 * Keywords: image, responsive, logo
 * Block Types: core/image
 *
 * @package inable
 * @since 1.0.0
 */
?>

<!-- wp:image {"className":"wp-block-image"} -->
<figure class="wp-block-image mx-auto rounded-circle"><img src="<?php echo esc_url(get_theme_file_uri('assets/img/samotel.webp')); ?>" alt="Samotel logo" class="img-fluid" /></figure>
<!-- /wp:image -->
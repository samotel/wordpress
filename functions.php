<?php

// if (!function_exists('samotel_theme_setup')) :
//     /**
//      * Sets up theme defaults and registers support for various WordPress features.
//      *
//      * Note that this function is hooked into the after_setup_theme hook, which runs
//      * before the init hook.
//      */
//     function samotel_theme_setup()
//     {


//     }
// endif; // samotel_theme_setup
// add_action('after_setup_theme', 'samotel_theme_setup');

if (!function_exists('samotel_scripts_styles')) :
    function samotel_scripts_styles()
    {
        wp_enqueue_style(
            'fontawesome',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        );
        wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

        wp_enqueue_style('samotel_theme', get_template_directory_uri() . '/assets/css/samotel.css');
        wp_enqueue_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
        wp_enqueue_script('jquery', 'hhttps://code.jquery.com/jquery-3.6.4.slim.min.js');
        wp_enqueue_script('samoteljs', get_template_directory_uri() . '/assets/js/samotel.js');

        $photo_dump = [];

        $wp_query1 = new WP_Query([
            'posts_per_page' => 1,
            'post_type' => 'post',
            'category_name' => 'album'
        ]);

        while ($wp_query1->have_posts()) {
            $wp_query1->the_post();
            $wp_query1_id = $wp_query1->post->ID;
        }

        wp_reset_postdata();

        if (!empty($wp_query1_id)) {
            $wp_query = new WP_Query(
                [
                    'posts_per_page' => 100,
                    'post_type' => 'attachment',
                    'post_status' => 'inherit',
                    'post_parent' => $wp_query1_id,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ]
            );

            if ($wp_query->have_posts()) {
                $photo_dump = array_map(function ($item) {
                    return [
                        'img' => $item->guid,
                        'alt' => $item->post_title,
                        'cat' => wp_get_attachment_caption($item->ID)
                    ];
                }, $wp_query->posts);
            }

            wp_reset_postdata();
            wp_localize_script(
                'samoteljs',
                'photo_dump',
                $photo_dump
            );
        }
    }
endif;

add_action('wp_enqueue_scripts', 'samotel_scripts_styles');

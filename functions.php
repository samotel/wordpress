<?php

// if (!function_exists('samotel_setup')) :
//     /**
//      * Sets up theme defaults and registers support for various WordPress features.
//      *
//      * Note that this function is hooked into the after_setup_theme hook, which runs
//      * before the init hook.
//      */
//     function myfirsttheme_setup()
//     {


//     }
// endif; // myfirsttheme_setup
// add_action('after_setup_theme', 'samotel_setup');

if (!function_exists('samotel_scripts_styles')) :
    function samotel_scripts_styles()
    {
        wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        );
        wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

        wp_enqueue_style('samotel_theme', get_template_directory_uri() . '/assets/css/samotel.css');
        wp_enqueue_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
    }
endif;

add_action('wp_enqueue_scripts', 'samotel_scripts_styles');
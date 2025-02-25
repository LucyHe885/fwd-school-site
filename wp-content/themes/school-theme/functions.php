<?php
function school_enqueues() {
    wp_enqueue_style(
        'school-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version'),
        'all'
    );

    wp_enqueue_style(
        'school-normalize',
        get_theme_file_uri('assets/css/normalize.css'),
        array(),
        '12.1.0'
    );

    wp_enqueue_style(
        'aos-css',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
        array(),
        '2.3.4'
    );

    wp_enqueue_script(
        'aos-js',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
        array(),
        '2.3.4',
        true
    );

    wp_enqueue_script(
        'aos-init',
        get_theme_file_uri('assets/js/aos-init.js'),
        array('aos-js'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'school_enqueues');

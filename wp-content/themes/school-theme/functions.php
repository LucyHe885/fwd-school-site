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

    //animate
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

//lightgallery
function enqueue_lightgallery_scripts() {
    if (is_front_page()) { 
        // lightGallery CSS
        wp_enqueue_style(
            'lightgallery-css', 
            'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/css/lightgallery-bundle.min.css', 
            array(), 
            '2.8.2'
        );

        // lightGallery JS 
        wp_enqueue_script(
            'lightgallery-js', 
            'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/lightgallery.umd.min.js', 
            array('jquery'), 
            '2.8.2', 
            true
        );

        wp_enqueue_script(
            'lg-thumbnail', 
            'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/plugins/thumbnail/lg-thumbnail.umd.min.js', 
            array('lightgallery-js'), 
            '2.8.2', 
            true
        );

        wp_enqueue_script(
            'lg-zoom', 
            'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/plugins/zoom/lg-zoom.umd.min.js', 
            array('lightgallery-js'), 
            '2.8.2', 
            true
        );

        wp_enqueue_script(
            'lightgallery-init', 
            get_template_directory_uri() . '/assets/js/lightgallery-init.js', 
            array('lightgallery-js', 'lg-thumbnail', 'lg-zoom'), 
            '1.0.0', 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_lightgallery_scripts');

//staff shortcode
function staff_list_shortcode() {
    $query = new WP_Query( array(
        'post_type'      => 'staff',
        'posts_per_page' => -1
    ));

    if ($query->have_posts()) {
        $output = '<div class="staff-list">';
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<div class="staff-member">';
            if ( has_post_thumbnail() ) {
                $output .= '<div class="staff-image">' . get_the_post_thumbnail( get_the_ID(), 'medium' ) . '</div>';
            }
            $output .= '<h3>' . get_the_title() . '</h3>';
            $output .= '<div class="staff-content">' . get_the_content() . '</div>';
            $output .= '</div>';
        }
        wp_reset_postdata();
        $output .= '</div>';
        return $output;
    } else {
        return '<p>No staff members found.</p>';
    }
}
add_shortcode('staff_list', 'staff_list_shortcode');


//image sise
function custom_theme_setup() {
    add_image_size('student-thumbnail', 300, 300, true); 
    add_image_size('student-large', 600, 600, true); 
}
add_action('after_setup_theme', 'custom_theme_setup');

function custom_image_size_names($sizes) {
    return array_merge($sizes, array(
        'student-thumbnail' => __('Student Thumbnail'),
        'student-large' => __('Student Large'),
    ));
}
add_filter('image_size_names_choose', 'custom_image_size_names');



//load our custom block
require get_theme_file_path() . '/aos-block/aos-block.php';

/**
* Custom Post Types & Custom Taxonomies
*/
require get_template_directory() . '/inc/post-types-taxonomies.php';




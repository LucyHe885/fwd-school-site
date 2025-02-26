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


function enqueue_lightgallery_scripts() {
    if (is_front_page()) { 
        // lightGallery CSS
        wp_enqueue_style('lightgallery-css', 'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/css/lightgallery-bundle.min.css', array(), '2.8.2');

        // lightGallery JS 
        wp_enqueue_script('lightgallery-js', 'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/lightgallery.umd.min.js', array('jquery'), '2.8.2', true);

        wp_enqueue_script('lg-thumbnail', 'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/plugins/thumbnail/lg-thumbnail.umd.min.js', array('lightgallery-js'), '2.8.2', true);
        wp_enqueue_script('lg-zoom', 'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/plugins/zoom/lg-zoom.umd.min.js', array('lightgallery-js'), '2.8.2', true);

        wp_enqueue_script('lightgallery-init', get_template_directory_uri() . '/assets/js/lightgallery-init.js', array('lightgallery-js', 'lg-thumbnail', 'lg-zoom'), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_lightgallery_scripts');


function display_staff_members() {
    ob_start();

    $args = array(
        'post_type'      => 'staff',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $staff_query = new WP_Query($args);

    if ($staff_query->have_posts()) :
        echo '<div class="staff-list">';
        while ($staff_query->have_posts()) : $staff_query->the_post();
            echo '<div class="staff-member">';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<div class="staff-category">' . get_the_term_list(get_the_ID(), 'staff-category', '', ', ') . '</div>';
            echo '<div class="staff-content">' . get_the_excerpt() . '</div>';
            echo '</div>';
        endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo '<p>No staff members found.</p>';
    endif;

    return ob_get_clean();
}
add_shortcode('staff_members', 'display_staff_members');



//load our custom block
require get_theme_file_path() . '/aos-block/aos-block.php';

/**
* Custom Post Types & Custom Taxonomies
*/
require get_template_directory() . '/inc/post-types-taxonomies.php';
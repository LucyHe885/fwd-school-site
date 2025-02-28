<?php
// Register Staff Custom Post Type
function school_register_staff_custom_post_type() {
    $labels = array(
        'name'               => _x( 'Staff Members', 'post type general name', 'school-theme' ),
        'singular_name'      => _x( 'Staff Member', 'post type singular name', 'school-theme' ),
        'add_new'            => __( 'Add New', 'school-theme' ),
        'add_new_item'       => __( 'Add New Staff Member', 'school-theme' ),
        'edit_item'          => __( 'Edit Staff Member', 'school-theme' ),
        'new_item'           => __( 'New Staff Member', 'school-theme' ),
        'view_item'          => __( 'View Staff Member', 'school-theme' ),
        'search_items'       => __( 'Search Staff Members', 'school-theme' ),
        'not_found'          => __( 'No staff members found.', 'school-theme' ),
        'not_found_in_trash' => __( 'No staff members found in Trash.', 'school-theme' ),
        'all_items'          => __( 'All Staff Members', 'school-theme' ),
        'menu_name'          => __( 'Staff', 'school-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true, 
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail' ), 
        'template'           => array(
            array( 'core/paragraph', array(
                'placeholder' => 'Enter job title here...'
            )),
            array( 'core/paragraph', array(
                'placeholder' => 'Enter email address here...'
            )),
        ),
        'template_lock'      => 'all',
    );

    register_post_type( 'staff', $args );
}
add_action( 'init', 'school_register_staff_custom_post_type' );

// Change Title Placeholder for Staff CPT
function change_staff_title_placeholder( $title, $post ) {
    if ( $post->post_type == 'staff' ) {
        return 'Add staff name';
    }
    return $title;
}
add_filter( 'enter_title_here', 'change_staff_title_placeholder', 10, 2 );

// Register Staff Category Taxonomy
function school_register_staff_taxonomy() {
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name', 'school-theme' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name', 'school-theme' ),
        'search_items'      => __( 'Search Staff Categories', 'school-theme' ),
        'all_items'         => __( 'All Staff Categories', 'school-theme' ),
        'edit_item'         => __( 'Edit Staff Category', 'school-theme' ),
        'update_item'       => __( 'Update Staff Category', 'school-theme' ),
        'add_new_item'      => __( 'Add New Staff Category', 'school-theme' ),
        'new_item_name'     => __( 'New Staff Category Name', 'school-theme' ),
        'menu_name'         => __( 'Categories', 'school-theme' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true, 
        'show_admin_column' => true, 
        'query_var'         => true,
        'show_in_rest'      => true, 
        'rewrite'           => array( 'slug' => 'staff-category' ),
        'capabilities'      => array(
            'assign_terms' => 'edit_posts',
            'edit_terms'   => 'do_not_allow',
            'delete_terms' => 'do_not_allow',
        ),
    );

    register_taxonomy( 'staff_category', 'staff', $args ); 
}
add_action('init', 'school_register_staff_taxonomy');

//student custom post type
function create_student_post_type() {
    register_post_type('student',
        array(
            'labels' => array(
                'name' => __('Students'),
                'singular_name' => __('Student'),
                'add_new' => __('Add New Student'),
                'add_new_item' => __('Add New Student'),
                'edit_item' => __('Edit Student'),
                'new_item' => __('New Student'),
                'view_item' => __('View Student'),
                'search_items' => __('Search Students'),
                'not_found' => __('No students found'),
                'not_found_in_trash' => __('No students found in Trash')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'), 
            'show_in_rest' => true,
            'template' => array( 
                array('core/paragraph', array(
                    'placeholder' => 'Add a short biography here...',
                )),
                array('core/button', array(
                    'text' => 'View Portfolio',
                    'url' => '#',
                )),
            ),
            'template_lock' => 'all', 
        )
    );
}
add_action('init', 'create_student_post_type');


function change_student_title_placeholder($title) {
    $screen = get_current_screen();
    if ($screen->post_type == 'student') {
        $title = 'Add student name';
    }
    return $title;
}
add_filter('enter_title_here', 'change_student_title_placeholder');

// student taxonomy
function create_student_taxonomy() {
    register_taxonomy(
        'student_category', 
        'student',
        array(
            'label' => __('Student Categories'),
            'rewrite' => array('slug' => 'student-category'),
            'hierarchical' => true, 
            'show_in_rest' => true, 
        )
    );
}
add_action('init', 'create_student_taxonomy');


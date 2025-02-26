<?php
function school_register_staff_custom_post_type() {
    $labels = array(
        'name'                     => _x( 'Staff Members', 'post type general name', 'school-theme' ),
        'singular_name'            => _x( 'Staff Member', 'post type singular name', 'school-theme' ),
        'add_new'                  => _x( 'Add New', 'staff', 'school-theme' ),
        'add_new_item'             => __( 'Add New Staff Member', 'school-theme' ),
        'edit_item'                => __( 'Edit Staff Member', 'school-theme' ),
        'new_item'                 => __( 'New Staff Member', 'school-theme' ),
        'view_item'                => __( 'View Staff Member', 'school-theme' ),
        'view_items'               => __( 'View Staff Members', 'school-theme' ),
        'search_items'             => __( 'Search Staff Members', 'school-theme' ),
        'not_found'                => __( 'No staff members found.', 'school-theme' ),
        'not_found_in_trash'       => __( 'No staff members found in Trash.', 'school-theme' ),
        'parent_item_colon'        => __( 'Parent Staff Members:', 'school-theme' ),
        'all_items'                => __( 'All Staff Members', 'school-theme' ),
        'archives'                 => __( 'Staff Member Archives', 'school-theme' ),
        'attributes'               => __( 'Staff Member Attributes', 'school-theme' ),
        'insert_into_item'         => __( 'Insert into staff member', 'school-theme' ),
        'uploaded_to_this_item'    => __( 'Uploaded to this staff member', 'school-theme' ),
        'featured_image'           => __( 'Staff Member featured image', 'school-theme' ),
        'set_featured_image'       => __( 'Set staff member featured image', 'school-theme' ),
        'remove_featured_image'    => __( 'Remove staff member featured image', 'school-theme' ),
        'use_featured_image'       => __( 'Use as featured image', 'school-theme' ),
        'menu_name'                => _x( 'Staff Members', 'admin menu', 'school-theme' ),
        'filter_items_list'        => __( 'Filter staff members list', 'school-theme' ),
        'items_list_navigation'    => __( 'Staff Members list navigation', 'school-theme' ),
        'items_list'               => __( 'Staff Members list', 'school-theme' ),
        'item_published'           => __( 'Staff Member published.', 'school-theme' ),
        'item_published_privately' => __( 'Staff Member published privately.', 'school-theme' ),
        'item_reverted_to_draft'   => __( 'Staff Member reverted to draft.', 'school-theme' ),
        'item_trashed'             => __( 'Staff Member trashed.', 'school-theme' ),
        'item_scheduled'           => __( 'Staff Member scheduled.', 'school-theme' ),
        'item_updated'             => __( 'Staff Member updated.', 'school-theme' ),
        'item_link'                => __( 'Staff Member link.', 'school-theme' ),
        'item_link_description'    => __( 'A link to a staff member.', 'school-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'template'           => array(
            array('core/paragraph', array(
                'placeholder' => 'Enter job title here...'
            )),
            array('core/paragraph', array(
                'placeholder' => 'Enter email address here...'
            ))
        ),
        'template_lock'      => 'all'
    );

    register_post_type( 'staff', $args );
}
add_action('init', 'school_register_staff_custom_post_type');


function change_staff_title_placeholder($title, $post) {
    if ($post->post_type == 'staff') { 
        return 'Add staff name';
    }
    return $title;
}
add_filter('enter_title_here', 'change_staff_title_placeholder', 10, 2);



// Register staff custom taxonomy
function school_register_staff_taxonomy() {
    $labels = array(
        'name'              => _x( 'Staff Categories', 'taxonomy general name', 'school-theme' ),
        'singular_name'     => _x( 'Staff Category', 'taxonomy singular name', 'school-theme' ),
        'search_items'      => __( 'Search Staff Categories', 'school-theme' ),
        'all_items'         => __( 'All Staff Categories', 'school-theme' ),
        'parent_item'       => __( 'Parent Staff Category', 'school-theme' ),
        'edit_item'         => __( 'Edit Staff Category', 'school-theme' ),
        'view_item'         => __( 'View Staff Category', 'school-theme' ),
        'update_item'       => __( 'Update Staff Category', 'school-theme' ),
        'add_new_item'      => __( 'Add New Staff Category', 'school-theme' ),
        'new_item_name'     => __( 'New Staff Category Name', 'school-theme' ),
        'menu_name'         => __( 'Staff Category', 'school-theme' ),
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
            'manage_terms' => 'edit_posts',
            'edit_terms'   => 'edit_posts', 
            'delete_terms' => 'do_not_allow', 
            'assign_terms' => 'edit_posts', 
        ),
    );

    register_taxonomy('staff-category',  array( 'staff' ), $args);

    //Featured
function school_register_featured_taxonomy() {
    $labels = array(
        'name'                  => _x( 'Featured', 'taxonomy general name', 'school-theme' ),
        'singular_name'         => _x( 'Featured', 'taxonomy singular name', 'school-theme' ),
        'search_items'          => __( 'Search Featured', 'school-theme' ),
        'all_items'             => __( 'All Featured', 'school-theme' ),
        'parent_item'           => __( 'Parent Featured', 'school-theme' ),
        'parent_item_colon'     => __( 'Parent Featured:', 'school-theme' ),
        'edit_item'             => __( 'Edit Featured', 'school-theme' ),
        'view_item'             => __( 'View Featured', 'school-theme' ),
        'update_item'           => __( 'Update Featured', 'school-theme' ),
        'add_new_item'          => __( 'Add New Featured', 'school-theme' ),
        'new_item_name'         => __( 'New Work Featured', 'school-theme' ),
        'menu_name'             => __( 'Featured', 'school-theme' ),
        'not_found'             => __( 'No featured found.', 'school-theme' ),
        'no_terms'              => __( 'No featured', 'school-theme' ),
        'items_list_navigation' => __( 'Featured list navigation', 'school-theme' ),
        'items_list'            => __( 'Featured list', 'school-theme' ),
        'item_link'             => __( 'Featured Link', 'school-theme' ),
        'item_link_description' => __( 'A link to a featured.', 'school-theme' ),
    );

    $args = array(
        'hierarchical'      => true, 
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'featured' ),
        'capabilities'      => array(
            'manage_terms' => 'do_not_allow', 
            'edit_terms'   => 'do_not_allow', 
            'delete_terms' => 'do_not_allow', 
            'assign_terms' => 'edit_posts',    
        ),
    );

    register_taxonomy( 'school-featured', array( 'staff' ), $args );
}


}
add_action('init', 'school_register_staff_taxonomy');

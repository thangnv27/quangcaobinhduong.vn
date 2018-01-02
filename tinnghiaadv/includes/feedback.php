<?php
/* ----------------------------------------------------------------------------------- */
# Create post_type
/* ----------------------------------------------------------------------------------- */
add_action('init', 'create_feedback_post_type');

function create_feedback_post_type(){
    register_post_type('feedback', array(
        'labels' => array(
            'name' => __('ý kiến khách hàng'),
            'singular_name' => __('Feedbacks'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new Feedback'),
            'new_item' => __('New Feedback'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Feedback'),
            'view' => __('View Feedback'),
            'view_item' => __('View Feedback'),
            'search_items' => __('Search Feedbacks'),
            'not_found' => __('No Feedback found'),
            'not_found_in_trash' => __('No Feedback found in trash'),
        ),
        'public' => true,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title', 'editor', 'author', 'thumbnail',
            //'custom-fields', 'excerpt', 'comments',
        ),
        'rewrite' => array('slug' => 'feedback', 'with_front' => false),
        'can_export' => true,
        'description' => __('Feedback description here.'),
        //'taxonomies' => array('post_tag'),
    ));
}
/* ----------------------------------------------------------------------------------- */
# Create taxonomy
/* ----------------------------------------------------------------------------------- */
//add_action('init', 'create_feedback_taxonomies');
//
//function create_feedback_taxonomies(){
//    register_taxonomy('feedback_category', 'feedback', array(
//        'hierarchical' => true,
//        'public' => true,
//        'show_ui' => true,
//        'query_var' => true,
//        'labels' => array(
//            'name' => __('Danh mục dự án'),
//            'singular_name' => __('Feedback Categories'),
//            'add_new' => __('Add New'),
//            'add_new_item' => __('Add New Category'),
//            'new_item' => __('New Category'),
//            'search_items' => __('Search Categories'),
//        ),
//    ));
//}



/* ----------------------------------------------------------------------------------- */
# Meta box
/* ----------------------------------------------------------------------------------- */
$feedback_meta_box = array(
    'id' => 'feedback-meta-box',
    'title' => '',
    'page' => 'feedback',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        

));

// Add feedback meta box
if(is_admin()){
    add_action('admin_menu', 'feedback_add_box');
    add_action('save_post', 'feedback_add_box');
    add_action('save_post', 'feedback_save_data');
}

function feedback_add_box(){
    global $feedback_meta_box;
    add_meta_box($feedback_meta_box['id'], $feedback_meta_box['title'], 'feedback_show_box', $feedback_meta_box['page'], $feedback_meta_box['context'], $feedback_meta_box['priority']);
}
/**
 * Callback function to show fields in feedback meta box
 * @global array $feedback_meta_box
 * @global Object $post
 * @global array $area_fields
 */
function feedback_show_box() {
    global $feedback_meta_box, $post;
    custom_output_meta_box($feedback_meta_box, $post);   
}
/**
 * Save data from feedback meta box
 * @global array $feedback_meta_box
 * @global array $area_fields
 * @param Object $post_id
 * @return 
 */
function feedback_save_data($post_id) {
    global $feedback_meta_box, $area_fields;
    custom_save_meta_box($feedback_meta_box, $post_id); 
    return $post_id;
}
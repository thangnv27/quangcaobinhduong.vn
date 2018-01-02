<?php
/* ----------------------------------------------------------------------------------- */
# Create post_type
/* ----------------------------------------------------------------------------------- */
add_action('init', 'create_project_post_type');

function create_project_post_type(){
    register_post_type('project', array(
        'labels' => array(
            'name' => __('Dự án'),
            'singular_name' => __('Projects'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new Project'),
            'new_item' => __('New Project'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Project'),
            'view' => __('View Project'),
            'view_item' => __('View Project'),
            'search_items' => __('Search Projects'),
            'not_found' => __('No Project found'),
            'not_found_in_trash' => __('No Project found in trash'),
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
        'rewrite' => array('slug' => 'project', 'with_front' => false),
        'can_export' => true,
        'description' => __('Project description here.'),
        //'taxonomies' => array('post_tag'),
    ));
}
/* ----------------------------------------------------------------------------------- */
# Create taxonomy
/* ----------------------------------------------------------------------------------- */
//add_action('init', 'create_project_taxonomies');
//
//function create_project_taxonomies(){
//    register_taxonomy('project_category', 'project', array(
//        'hierarchical' => true,
//        'public' => true,
//        'show_ui' => true,
//        'query_var' => true,
//        'labels' => array(
//            'name' => __('Danh mục dự án'),
//            'singular_name' => __('Project Categories'),
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
$project_meta_box = array(
    'id' => 'project-meta-box',
    'title' => 'Tình trạng dự án',
    'page' => 'project',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' =>'Mới',
            'desc' => '',
            'id' => 'is_new',
            'type' => 'radio',
            'std' => '',
            'options' => array(
                '1' => 'Yes',
                '0' => 'No'
            )
        ),
        array(
            'name' => 'Đang thực hiện',
            'desc' => '',
            'id' => 'is_work',
            'type' => 'radio',
            'std' => '',
            'options' => array(
                '1' => 'Yes',
                '0' => 'No'
            )
        ),
        array(
            'name' => 'Đã thực hiện',
            'desc' => '',
            'id' => 'is_finish',
            'type' => 'radio',
            'std' => '',
            'options' => array(
                '1' => 'Yes',
                '0' => 'No'
            )
        ),
));

// Add project meta box
if(is_admin()){
    add_action('admin_menu', 'project_add_box');
    add_action('save_post', 'project_add_box');
    add_action('save_post', 'project_save_data');
}

function project_add_box(){
    global $project_meta_box;
    add_meta_box($project_meta_box['id'], $project_meta_box['title'], 'project_show_box', $project_meta_box['page'], $project_meta_box['context'], $project_meta_box['priority']);
}
/**
 * Callback function to show fields in project meta box
 * @global array $project_meta_box
 * @global Object $post
 * @global array $area_fields
 */
function project_show_box() {
    global $project_meta_box, $post;
    custom_output_meta_box($project_meta_box, $post);   
}
/**
 * Save data from project meta box
 * @global array $project_meta_box
 * @global array $area_fields
 * @param Object $post_id
 * @return 
 */
function project_save_data($post_id) {
    global $project_meta_box;
    custom_save_meta_box($project_meta_box, $post_id); 
    return $post_id;
}
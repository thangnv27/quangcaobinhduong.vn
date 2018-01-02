<?php

# Custom post type
add_action('init', 'create_brand_post_type');

function create_brand_post_type(){
    register_post_type('brand', array(
        'labels' => array(
            'name' => __('Đối tác'),
            'singular_name' => __('Đối tác'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new Brand'),
            'new_item' => __('New Brand'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Brand'),
            'view' => __('View Brand'),
            'view_item' => __('View Brand'),
            'search_items' => __('Search Brands'),
            'not_found' => __('No Brand found'),
            'not_found_in_trash' => __('No Brand found in trash'),
        ),
        'public' => true,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 
            //'comments', 'author', 'custom-fields', 'excerpt',
        ),
        'rewrite' => array('slug' => 'brand', 'with_front' => false),
        'can_export' => true,
        'description' => __('Brand description here.')
    ));
}

function brand_change_default_title($title) {
    $screen = get_current_screen();

    if ('brand' == $screen->post_type) {
        $title = 'Nhập tên đối tác';
    }

    return $title;
}

add_filter('enter_title_here', 'brand_change_default_title');

# Custom Taxonomies
//add_action('init', 'create_brand_taxonomies', 0);
//
//function create_brand_taxonomies(){
//    register_taxonomy('brand_category', array('brand'), array(
//        'hierarchical' => true,
//        'labels' => array(
//            'name' => __('Loại đối tác'),
//            'singular_name' => __('Brand Categories'),
//            'all_items' => __('All Brand Categories'),
//            'add_new' => __('Add New'),
//            'add_new_item' => __('Thêm mới loại'),
//            'new_item' => __('New Category'),
//            'new_item_name' => __('New Category Name'),
//            'edit_item' => __('Edit Category'),
//            'update_item' => __('Update Category'),
//            'view_item' => __('View Category'),
//            'parent_item' => __('Parent Category'),
//            'parent_item_colon' => __('Parent Category:'),
//            'popular_items' => __('Popular Category'),
//            'search_items' => __('Search Categories'),
//            'separate_items_with_commas' => __('Separate brands with commas'),
//            'add_or_remove_items' => __('Add or remove brands'),
//            'choose_from_most_used' => __('Choose from the most used brands'),
//            'not_found' => __('No brands found.'),
//        ),
//    ));
//}

# Meta box
$brand_meta_box = array(
    'id' => 'brand-meta-box',
    'title' => 'Thông tin',
    'page' => 'brand',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Địa chỉ',
            'desc' => '',
            'id' => 'address',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Tỉnh/Thành phố',
            'desc' => '',
            'id' => 'city',
            'type' => 'select',
            'std' => '',
            'options' => vn_city_list(),
        ),
        array(
            'name' => 'Điện thoại',
            'desc' => '',
            'id' => 'tel',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Di động',
            'desc' => '',
            'id' => 'mobile',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Email',
            'desc' => '',
            'id' => 'email',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Website',
            'desc' => '',
            'id' => 'website',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Chứng chỉ xác nhận',
            'desc' => '',
            'id' => 'certificate',
            'type' => 'radio',
            'std' => '',
            'options' => array(
                'no' => 'Không',
                'yes' => 'Có',
            ),
        ),
));

// Add brand meta box
if(is_admin()){
    add_action('admin_menu', 'brand_add_box');
    add_action('save_post', 'brand_add_box');
    add_action('save_post', 'brand_save_data');
}

function brand_add_box(){
    global $brand_meta_box;
    add_meta_box($brand_meta_box['id'], $brand_meta_box['title'], 'brand_show_box', $brand_meta_box['page'], $brand_meta_box['context'], $brand_meta_box['priority']);
}

// Callback function to show fields in brand meta box
function brand_show_box() {
    // Use nonce for verification
    global $brand_meta_box, $post;
    custom_output_meta_box($brand_meta_box, $post);
}

// Save data from brand meta box
function brand_save_data($post_id) {
    global $brand_meta_box;
    custom_save_meta_box($brand_meta_box, $post_id);
}
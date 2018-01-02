<?php
/* ----------------------------------------------------------------------------------- */
# Create post_type
/* ----------------------------------------------------------------------------------- */
add_action('init', 'create_service_post_type');

function create_service_post_type(){
    register_post_type('service', array(
        'labels' => array(
            'name' => __('Dịch vụ'),
            'singular_name' => __('Services'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new Service'),
            'new_item' => __('New Service'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit Service'),
            'view' => __('View Service'),
            'view_item' => __('View Service'),
            'search_items' => __('Search Services'),
            'not_found' => __('No Service found'),
            'not_found_in_trash' => __('No Service found in trash'),
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
        'rewrite' => array('slug' => 'service', 'with_front' => false),
        'can_export' => true,
        'description' => __('Service description here.'),
        //'taxonomies' => array('post_tag'),
    ));
}
/* ----------------------------------------------------------------------------------- */
# Create taxonomy
/* ----------------------------------------------------------------------------------- */
add_action('init', 'create_service_taxonomies');

function create_service_taxonomies(){
    register_taxonomy('service_category', array('service', 'project'), array(
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'labels' => array(
            'name' => __('Danh mục'),
            'singular_name' => __('Service Categories'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Category'),
            'new_item' => __('New Category'),
            'search_items' => __('Search Categories'),
        ),
    ));
}



/* ----------------------------------------------------------------------------------- */
# Meta box
/* ----------------------------------------------------------------------------------- */
$service_meta_box = array(
    'id' => 'service-meta-box',
    'title' => '',
    'page' => 'service',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
));

// Add service meta box
if(is_admin()){
//    add_action('admin_menu', 'service_add_box');
//    add_action('save_post', 'service_add_box');
//    add_action('save_post', 'service_save_data');
}

function service_add_box(){
    global $service_meta_box;
    add_meta_box($service_meta_box['id'], $service_meta_box['title'], 'service_show_box', $service_meta_box['page'], $service_meta_box['context'], $service_meta_box['priority']);
}
/**
 * Callback function to show fields in service meta box
 * @global array $service_meta_box
 * @global Object $post
 * @global array $area_fields
 */
function service_show_box() {
    global $service_meta_box, $post;
    custom_output_meta_box($service_meta_box, $post);   
}
/**
 * Save data from service meta box
 * @global array $service_meta_box
 * @global array $area_fields
 * @param Object $post_id
 * @return 
 */
function service_save_data($post_id) {
    global $service_meta_box;
    custom_save_meta_box($service_meta_box, $post_id); 
    return $post_id;
}
//////////////////
//add extra fields to tag edit form hook
//add_action('edit_tag_form_fields', 'extra_tag_fields');
add_action('service_category_edit_form_fields', 'service_extra_tag_fields');
add_action('service_category_add_form_fields', 'add_service_extra_tag_fields');

//add extra fields to category edit form callback function
function service_extra_tag_fields($tag) {    //check for existing featured ID
    $term_id = $tag->term_id;
    $tag_meta = get_option("cat_$term_id");
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_meta_thumbnail"><?php _e('Ảnh đại diện'); ?></label></th>
        <td>
            <input type="text" name="cat_meta[thumbnail]" id="cat_meta_thumbnail" style="width:80%;" value="<?php echo $tag_meta['thumbnail'] ? $tag_meta['thumbnail'] : ''; ?>"/>
            <button type="button" onclick="uploadByField('cat_meta_thumbnail')" class="button button-upload" id="upload_cat_meta_thumbnail_button" />Upload</button><br />
        <span class="description">Kích cỡ: 250 x 250.</span>
    </td>
    </tr>
   <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_meta_img"><?php _e('Ảnh nền'); ?></label></th>
        <td>
            <input type="text" name="cat_meta[img]" id="cat_meta_img" style="width:80%;" value="<?php echo $tag_meta['img'] ? $tag_meta['img'] : ''; ?>"/>
            <button type="button" onclick="uploadByField('cat_meta_img')" class="button button-upload" id="upload_cat_meta_img_button" />Upload</button><br />
        <span class="description">Size: 1349 x 247.</span>
    </td>
    </tr>
    
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_meta_ad_cat1"><?php _e('Content'); ?></label></th>
        <td>
            <?php
            $ad_cat1 = stripslashes($tag_meta['ad_cat1']);
            wp_editor($ad_cat1, "cat_meta_ad_cat1", array(
                'textarea_name' => "cat_meta[ad_cat1]",
                'textarea_rows' => 20,
            ));
            ?>
        </td>
    </tr>
    <?php
}
function add_service_extra_tag_fields($tag) {    //check for existing featured ID
    $term_id = $tag->term_id;
    $tag_meta = get_option("cat_$term_id");
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_meta_thumbnail"><?php _e('Ảnh đại diện'); ?></label></th>
        <td>
            <input type="text" name="cat_meta[thumbnail]" id="cat_meta_thumbnail" style="width:80%;" value="<?php echo $tag_meta['thumbnail'] ? $tag_meta['thumbnail'] : ''; ?>"/>
            <button type="button" onclick="uploadByField('cat_meta_thumbnail')" class="button button-upload" id="upload_cat_meta_thumbnail_button" />Upload</button><br />
        <span class="description">Kích cỡ: 250 x 250.</span>
    </td>
    </tr>
   <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_meta_img"><?php _e('Ảnh nền'); ?></label></th>
        <td>
            <input type="text" name="cat_meta[img]" id="cat_meta_img" style="width:80%;" value="<?php echo $tag_meta['img'] ? $tag_meta['img'] : ''; ?>"/>
            <button type="button" onclick="uploadByField('cat_meta_img')" class="button button-upload" id="upload_cat_meta_img_button" />Upload</button><br />
        <span class="description">Size: 1349 x 247.</span>
    </td>
    </tr>
    <?php
}
// save extra category extra fields hook
add_action('edited_terms', 'service_save_extra_tag_fileds');
add_action('create_term','service_save_extra_tag_fileds');
//add_action('create_terms','service_save_extra_tag_fileds');

// save extra category extra fields callback function
function service_save_extra_tag_fileds($term_id) {
    if (isset($_POST['cat_meta'])) {
        $tag_meta = get_option("cat_$term_id");
        $tag_keys = array_keys($_POST['cat_meta']);
        foreach ($tag_keys as $key) {
            if (isset($_POST['cat_meta'][$key])) {
                $tag_meta[$key] = stripslashes_deep($_POST['cat_meta'][$key]);
            }
        }
        //save the option array
        update_option("cat_$term_id", $tag_meta);
    }
}
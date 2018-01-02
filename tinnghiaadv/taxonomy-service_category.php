<?php 
get_header(); 

$term = get_queried_object();
$tax_meta = get_option("cat_{$term->term_id}");
?>
<section id="wcn_banner">
    <ul id="wcn_slide_top">
	<li>
            <a title="Banner LED" target="_blank"><img width="100%" src="<?php echo $tax_meta["img"]; ?>"></a>
        </li>
    </ul>		
</section>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-content">
                <div class="page-content-left">
                     <?php
                        $taxonomy_name = 'service_category';
                        $termchildren = get_term_children($term->term_id,$taxonomy_name);
                        echo '<ul class="left_menu">';
                        foreach ( $termchildren as $child) {
                            $term_child = get_term_by( 'id', $child, $taxonomy_name );
                            echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term_child->name . '</a></li>';
                        }
                        echo '</ul>';
                     ?>
                    <div id="typical-projects">
                        <h2 class="title">CÔNG TRÌNH TIÊU BIỂU</h2>
                        <?php if($term->parent == 0): ?>
                        <ul class="typical-projects-list-item">
                            <?php
                            $count = 1;
                            while (have_posts()) : the_post(); 
                            if($count == 1) echo "<li>";
                            ?>					
                                <div class="typical-projects-item<?php echo ($count % 4 == 0) ? '-last' : ''; ?>">
                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                    <img src="<?php get_image_url(); ?>" alt="<?php the_title(); ?>" class="img" width="27" height="34" />
                                </a>
                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                </div>
                            <?php 
                                if($count % 4 == 0) echo "</li><li>";
                                $count++;
                            endwhile;
                            wp_reset_query();
                            if($count > 1) echo "</li>";
                            ?>
                        </ul>
                        <?php else: ?>
                        <ul class="typical-projects-list-item">
                            <?php
                            $loop = new WP_Query(array(
                                'post_type' => array('service', 'project'),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'service_category',
                                        'field'    => 'id',
                                        'terms'    => $term->parent,
                                    ),
                                ),
                                'posts_per_page' => -1
                            ));
                            $count = 1;
                            while ($loop->have_posts()) : $loop->the_post(); 
                            if($count == 1) echo "<li>";
                            ?>					
                                <div class="typical-projects-item<?php echo ($count % 4 == 0) ? '-last' : ''; ?>">
                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                    <img src="<?php get_image_url(); ?>" alt="<?php the_title(); ?>" class="img" width="27" height="34" />
                                </a>
                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                </div>
                            <?php 
                                if($count % 4 == 0) echo "</li><li>";
                                $count++;
                            endwhile;
                            wp_reset_query();
                            if($count > 1) echo "</li>";
                            ?>
                        </ul>
                        <?php endif; ?>
                        <div class="projects-bottom">
                        <div class="projects-controls">
                        <div class="pro-prev1" style="display: block;">
                                <a href="#">&lt;&lt;</a>
                        </div>
                        <div class="pro-next1" style="display: block;">
                                <a href="#">&gt;&gt;</a>
                        </div>
                        </div>
                        </div>
                    </div>
                </div><!--end content-left-->
                <div class="page-content-right">
                    <?php echo $tax_meta["ad_cat1"]; ?>
                </div><!--end content-right-->
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
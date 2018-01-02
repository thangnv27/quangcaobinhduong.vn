<?php
/**
 * Template Name: Dự án mới
 */
get_header(); ?>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-content">
                <!-- Dự án mới-->
                <div class="projects-list-header">
                    <h2 class="news-head"><strong>Dự án mới</strong></h2>
                </div>
                <div class="projects_list">
                    <?php
                        $count = 1;
                        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                        $loop = new WP_Query(array(
                            'post_type' => 'project',
                            'posts_per_page' => 16,
                            'paged' => $paged,
                            'meta_query' => array(
                                array(
                                    'key' => 'is_new',
                                    'value' => '0',
                                    'compare' => '!='
                                ),
                            ),
                        ));
                        while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <div class="projects-item<?php echo ( $count % 4 == 0) ? '-last' : ''; ?>">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                            <img border="0" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" src="<?php get_image_url(); ?>" class="">
                        </a>
                        <h3><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                    </div>
                    <?php 
                        $count++;
                        endwhile;
                        wp_reset_query();
                    ?>
                </div>
                <?php getpagenavi(array('query' => $loop)); ?>
                <div class="projects-list-bottom">
                    <a class="viewdetail" href="#">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
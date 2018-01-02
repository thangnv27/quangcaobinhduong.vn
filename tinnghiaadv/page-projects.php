<?php
/**
 * Template Name: Dự án
 */
get_header(); ?>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-content">
                <div class="projects_list">
                    <div class="projects-list-header">
                        <h2 class="news-head"><strong>Dự án đang thực hiện</strong></h2>
                    </div>
                    <?php
                        $count = 1;
                        $loop = new WP_Query(array(
                            'post_type' => 'project',
                            'posts_per_page' => 16,
                            'meta_query' => array(
                                array(
                                    'key' => 'is_work',
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
                <div class="projects-list-bottom">
                    <a class="viewdetail" href="<?php echo get_page_link(get_option(SHORT_NAME . "_page_work"));?>">Xem thêm</a>
                </div>
                
                <!-- Dự án đã thực hiện-->
                <div class="projects_list">
                    <div class="projects-list-header">
                        <h2 class="news-head"><strong>Dự án đã thực hiện</strong></h2>
                    </div>
                    <?php
                        $count = 1;
                        $loop = new WP_Query(array(
                            'post_type' => 'project',
                            'meta_query' => array(
                                array(
                                    'key' => 'is_finish',
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
                <div class="projects-list-bottom">
                    <a class="viewdetail" href="<?php echo get_page_link(get_option(SHORT_NAME . "_page_finish"));?>">Xem thêm</a>
                </div>
                <!-- Dự án mới-->
                <div class="projects_list">
                    <div class="projects-list-header">
                        <h2 class="news-head"><strong>Dự án mới</strong></h2>
                    </div>
                    <?php
                        $count = 1;
                        $loop = new WP_Query(array(
                            'post_type' => 'project',
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
                <div class="projects-list-bottom">
                    <a class="viewdetail" href="<?php echo get_page_link(get_option(SHORT_NAME . "_page_new"));?>">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
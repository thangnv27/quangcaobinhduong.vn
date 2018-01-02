<?php
/**
 * Template Name: Dự án đang thực hiện
 */
get_header(); ?>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-content">
                <div class="projects-list-header">
                    <h2 class="news-head"><strong>Dự án đang thực hiện</strong></h2>
                </div>
                <div class="projects_list">
                    <?php
                        $count = 1;
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $loop = new WP_Query(array(
                            'post_type' => 'project',
                            'posts_per_page' => 16,
                            'paged' => $paged,
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
                <?php getpagenavi(array('query' => $loop)); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
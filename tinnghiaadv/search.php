<?php 
get_header();
get_template_part('template', 'slider'); ?>
<section id="wcn_main">
<div class="main-content">
    <div class="container">
        <div class="page-content">  
            <div class="home-tintuc-news">
                <div class="home-tintuc-news-header">
                    <h2 class="news-head">
                        <strong>
                            <?php if (is_category()) { ?>
                                <?php single_cat_title(); ?>
                            <?php } elseif (is_tag()) { ?> 
                                <?php single_tag_title(); ?>
                            <?php } elseif (is_search()) { ?> 
                                <?php _e("Kết quả tìm kiếm: "); ?> <?php the_search_query(); ?>
                            <?php } elseif (is_author()) { ?>
                                <?php _e("Bài viết của tác giả"); ?>
                            <?php } elseif (is_day()) { ?>
                                <?php _e("Bài viết ngày: "); ?><?php the_time('l, F j, Y'); ?>
                            <?php } elseif (is_month()) { ?>
                                <?php _e("Bài viết tháng: "); ?><?php the_time('F Y'); ?>
                            <?php } elseif (is_year()) { ?>
                                <?php _e("Bài viết năm"); ?><?php the_time('Y'); ?>
                            <?php } ?>
                        </strong>
                    </h2>
                </div>
                <ul class="list-tintuc-news">
                    <?php while (have_posts()) : the_post(); ?>
                    <li>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                            <img width="96" height="80" border="0" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" src="<?php get_image_url(); ?>" class="img">
                        </a>
                        <h3><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-date"><?php the_time('d-m-Y'); ?></div>
                        <p><?php echo get_short_content(get_the_excerpt(), 300) ?></p>
                    </li>
                    <?php endwhile;?>
                </ul>
                <?php getpagenavi(); ?>
            </div>
            
        </div>
    </div>
</div>
</section>

<?php get_footer(); ?>
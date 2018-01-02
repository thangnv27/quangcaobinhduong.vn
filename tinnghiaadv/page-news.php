<?php
/**
 * Template Name: Trang Tin tức
 */
get_header(); 
get_template_part('template', 'slider'); ?>
<section id="wcn_main">
<div class="main-content">
    <div class="container">
        <div class="page-content">  
            <?php
            $categories = get_categories(array(
                'exclude' => '1'
            ));
            foreach ($categories as $category) :   
            ?>
            <div class="home-tintuc-news">
                <div class="home-tintuc-news-header">
                    <h2 class="news-head">
                        <strong>
                            <?php echo $category->name;?>
                        </strong>
                    </h2>
                </div>
                <ul class="list-tintuc-news">
                    <?php 
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'cat' => $category->cat_ID
                    ));
                    while ($query->have_posts()) : $query->the_post ();
                    ?>
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
                <div class="home-tintuc-news-bottom"><a class="viewdetail" href="<?php echo get_category_link( $category->cat_ID ); ?>">Xem thêm</a></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</section>

<?php get_footer(); ?>
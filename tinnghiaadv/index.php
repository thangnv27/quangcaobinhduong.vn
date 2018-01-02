<?php 
get_header();
get_template_part('template', 'slider');?>
<section id="wcn_main">
    <div class="main-dichvu">
	<div class="container">
            <div class="main-dichvu-content">
                <div class="main-dichvu-content-left left">
                    <?php  
                        $count=1;
                        $categories = get_terms('service_category', array(
                            'hide_empty' => 0,
                            'parent' => 0 ,
                        ));
                        foreach ($categories as $category):
                            $tax_meta = get_option("cat_{$category->term_id}");
                        ?>
                    <div class="dichvu-item-<?php echo $count;?>">
                    <a title="<?php echo $category->name ;?>" href="<?php echo get_category_link($category);?>">
                        <img width="215" height="215" src="<?php echo $tax_meta["thumbnail"];?>">
                        <div class="dichvu-item-title"><h2><?php echo $category->name ;?></h2></div>
                    </a>
                    </div>
                    <?php
                        $count++;
                        endforeach;
                    ?>
                    <div class="dichvu-item-6">
                            <a title="Liên Hệ" href="<?php echo get_page_link(get_option(SHORT_NAME . "_page_lienhe"));?>">
                                    <img width="215" height="215" src="<?php bloginfo('stylesheet_directory'); ?>/images/bg-lienhe.gif">
                                    <div class="dichvu-item-title"><h2>Liên Hệ</h2></div>
                            </a>
                    </div>
                </div>
                <div class="main-dichvu-content-right right">
                    <a title="Liên Hệ" href=""><img alt="Banner Ben Phai" src="<?php echo stripslashes(get_option("banner")); ?>"></a>
                </div>
            </div>
	</div>
    </div><!--end dichvu-->
    <div class="main-duan">	
        <div class="main-duan-content">
            <div class="container">					
                <div class="main-duan-content-title"><h2><strong>TÍN NGHĨA</strong> đã thực hiện</h2>
                    <div class="duan-controls">
                    <div class="pro-prev1">
                            <a href="#"><<</a>
                    </div>
                    <div class="pro-next1">
                            <a href="#">>></a>
                    </div>
                    </div>
                </div>
                <div class="duan-list-content">
                    <ul class="duan-list-item">
                        <?php
                        $count = 0;
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
                            if($count === 0) echo "<li>";
                            elseif($count % 8 === 0) echo "</li><li>";
                        ?>
                        <div class="duan-item<?php echo ( $count % 4 == 0) ? '-last' : ''; ?>">
                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                <img border="0" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" src="<?php get_image_url(); ?>" class="">
                            </a>
                            <h2><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
                        </div>
                        <?php
                            $count++;
                            endwhile;
                            wp_reset_query();
                            if($count > 0){ echo "</li>";}
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- end duan-->
    <div class="main-tintuc">
        <div class="container">
            <div class="main-tintuc-content">
                <div class="hot-video">			
                    <div class="hot-video-title"><h2>Video nổi bật</h2></div>
                    <div class="hot-video-content">
                        <ul class="video-item">
                            <?php 
                                $count = 1;
                                $query = new WP_Query(array(
                                        'post_type'=> 'post',
                                        'posts_per_page' => 4,
                                        'order' => 'DESC',
                                        'tax_query' => array(
                                          array(
                                              'taxonomy' => 'post_format',
                                              'field' => 'slug',
                                              'terms' => array( 'post-format-video' )
                                          )
                                      )
                                ));
                            ?>
                            <?php 
                            while ($query->have_posts()) : $query->the_post();
                            if ($count == 1):
                            ?>
                            <li class="video">
                                <?php the_content();?>
                            </li>
                            <li><h2><a title="<?php the_title();?>" href="<?php the_permalink();?>"> &gt;&gt; <?php the_title();?></a></h2></li>
                            <?php else : ?>
                            <li><h2><a title="<?php the_title();?>" href="<?php the_permalink();?>"> &gt;&gt; <?php the_title();?></a></h2></li>
                             <?php 
                                endif;
                                $count++;
                                endwhile;
                            ?>	
                        </ul>
                    </div>
		</div><!--end .hot-video-->
                <div class="hotnews">
                    <div class="hotnews-title">
                        <h2>Thông tin chuyên nghành</h2>
                    </div>
                    <div class="hotnews-content">
                        <ul class="hotnews-item">
                            <?php
                            $count = 0;
                            $ncat = get_option(SHORT_NAME . '_chuyennganhID'); 
                            $loop = new WP_Query(array(
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'category',
                                                'field' => 'id',
                                                'terms' => $ncat,
                                            )
                                        ),
                                        'posts_per_page' => 4,
                                    ));
                            while ($loop->have_posts()) : $loop->the_post();
                            if($count === 0) echo "<li>";
                            elseif($count % 2 === 0) echo "</li><li>";
                            ?>	
                            <div class="newitems">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img class="" src="<?php get_image_url(); ?>" alt="<?php the_title(); ?>" width="96" height="80" border="0" title="<?php the_title(); ?>"/>
                                </a>
                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <?php 
                            $count++;
                            endwhile;
                            wp_reset_query();
                            if($count > 0){ echo "</li>";}
                            ?>
                        </ul>
                        <div class="hotnews-bottom">
                            <div class="news-prev1" style="display: block;">
                                    <a href="#">&lt;&lt;</a>
                            </div>
                            <div class="news-next1" style="display: block;">
                                    <a href="#">&gt;&gt;</a>
                            </div>
                        </div>
                    </div>
                </div><!--end hotnews-->
                <div class="hotcus">
                    <div class="hotcus-title">
                        <h2>Khách hàng nói gì về TÍN NGHĨA</h2>
                    </div>
                    <div class="hotcus-content">
                        <ul class="hotcus-item">
                            <?php
                            $loop = new WP_Query(array(
                                'post_type' => 'feedback',
                            ));
                            while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <li>
				<div class="thumb">							
                                    <img alt="<?php the_title(); ?>" src="<?php get_image_url(); ?>">				
                                    <div class="avatar"></div>
				</div>
				<div class="area">
				<h2><strong><?php the_title(); ?></strong></h2>
				<p><?php the_content(); ?></p>
				</div>
                            </li>
                           <?php 
                                endwhile;
                                wp_reset_query();
                            ?>
                        </ul>
                    </div>
                </div><!-- end khachhang-->
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
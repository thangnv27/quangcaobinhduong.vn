<?php
    $loop = new WP_Query(array(
            'post_type' => array('slider'),
            'orderby' => 'id',
            'order'   => 'ASC',
            'posts_per_page' => 6,
        ));
    if ($loop->post_count > 0) :
?>
<section id="wcn_slide">									
    <ul id="wcn_slide_top"> 
        <?php 
            while ($loop->have_posts()) : $loop->the_post(); 
            $slide = get_post(get_post_meta(get_the_ID(), "post_id", true));
            $title = get_the_title($slide);
        ?> 
        <li>
            <a title="Banner Slide 1" target="_blank" href="<?php //echo get_permalink($slide); ?>">
                <img height="309" width="1349" src="<?php echo get_post_meta(get_the_ID(), "slide_img", true); ?>">
            </a>
        </li>
        <?php endwhile; ?>
    </ul>																							
    <div id="wcn_slide_bottom">
            <div class="slide-top-nav container">
                <div class="nav-left left"></div>
                <div class="nav-right right">
                    <a href="<?php echo get_page_link(get_option(SHORT_NAME . "_page_baogia"));?>" id="contact-email" title="ĐỀ NGHỊ BÁO GIÁ">ĐỀ NGHỊ BÁO GIÁ</a>
                    <a href="<?php echo get_page_link(get_option(SHORT_NAME . "_page_thanhtoan"));?>" id="order-payment" title="ĐẶT HÀNG & THANH TOÁN">ĐẶT HÀNG & THANH TOÁN</a>
                    <a href="<?php echo get_page_link(get_option(SHORT_NAME . "_page_lienhe"));?>" id="support-customer" title="HỖ TRỢ KHÁCH HÀNG">HỖ TRỢ KHÁCH HÀNG</a>
                </div>
            </div>
            <div class="slide-bottom-nav container">						
                    <div class="slide-bottom-nav-content">
                        Với vai trò là chuyên gia trong ngành <strong>THIẾT KẾ - THI CÔNG QUẢNG - IN ẤN VÀ SÁNG TẠO THƯƠNG HIỆU</strong><br/><h1><strong>CÔNG TY QUẢNG CÁO TÍN NGHĨA</strong> có thể giúp bạn:</h1>
                                                                                                                                                                                    </div>
            </div>
    </div>
</section>
<?php endif;wp_reset_query(); ?>

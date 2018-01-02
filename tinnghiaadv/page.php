<?php get_header(); ?>
<section id="wcn_slide">
<?php echo do_shortcode(stripslashes(get_option(SHORT_NAME . "_sliderpageCode"))); ?>
<div id="wcn_slide_bottom">
    <div class="slide-top-nav container">
        <div class="nav-left left"></div>
        <div class="nav-right right">
            <a href="http://tinnghiaadv.com/de-nghi-bao-gia.html" id="contact-email" title="ĐỀ NGHỊ BÁO GIÁ">ĐỀ NGHỊ BÁO GIÁ</a>
            <a href="http://tinnghiaadv.com/quy-trinh-dat-hang-thanh-toan.html" id="order-payment" title="ĐẶT HÀNG & THANH TOÁN">ĐẶT HÀNG & THANH TOÁN</a>
            <a href="http://tinnghiaadv.com/ho-tro-khach-hang.html" id="support-customer" title="HỖ TRỢ KHÁCH HÀNG">HỖ TRỢ KHÁCH HÀNG</a>
        </div>
    </div>
    <div class="slide-bottom-nav container">						
        <div class="slide-bottom-nav-content">
            <h1 style="padding:10px 0 0 0">GIỚI THIỆU CÔNG TY <strong>TÍN NGHĨA</strong></h1>
        </div>
    </div>
</section>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-content"><?php the_content();?></div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
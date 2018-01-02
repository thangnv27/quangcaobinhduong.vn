<footer id="wcn_footer">
    <div class="container">
        <div class="footer-main">
            <div class="footer-main-top">
                <div class="footer-top-item border">
                    <h2><?php echo get_option('unit_owner'); ?></h2>
                    <div class="footer-top-content">
                        <p><span>Địa chỉ:</span> <?php echo get_option('info_address'); ?></p>
                        <p><span>Văn phòng:</span> <?php echo get_option("info_tel"); ?></p>
                        <p><span>Điện thoại:</span> <?php echo get_option(SHORT_NAME . "_hotline"); ?></p>		
                    </div>
                </div>
                <div class="footer-top-item">
                    <h2>Liên hệ với TÍN NGHĨA</h2>
                    <div class="footer-top-content">
                            <div class="support-email"><?php echo get_option('info_email'); ?></div>
                            <div class="support-skype"><?php echo get_option('info_skype'); ?></div>
                            <div class="support-yahoo"><?php echo get_option('info_yahoo'); ?></div>
                    </div>
                </div>
                <div class="footer-top-item">
                    <h2>Liên kết với TÍN NGHĨA</h2>
                    <div id="footer_social">
                        <?php if(get_option(SHORT_NAME . "_fbURL") != ""): ?>
                        <a href="<?php echo get_option(SHORT_NAME . "_fbURL"); ?>" target="_blank" title="Follow on Facebook" class="ico-facebook" rel="nofollow"></a>
                        <img alt="Facebook" src="<?php bloginfo('stylesheet_directory'); ?>/images/face.jpg">
                        <?php endif; ?>
                        <?php if(get_option(SHORT_NAME . "_googlePlusURL") != ""): ?>
                        <a href="<?php echo get_option(SHORT_NAME . "_googlePlusURL"); ?>" target="_blank" title="Follow on Google+" class="ico-gplus" rel="nofollow"></a>
                        <img alt="Google+" src="<?php bloginfo('stylesheet_directory'); ?>/images/gplus-icon.png">
                        <?php endif; ?>
                        <?php if(get_option(SHORT_NAME . "_youtubeURL") != ""): ?>
                        <a href="<?php echo get_option(SHORT_NAME . "_youtubeURL"); ?>" target="_blank" title="Follow on Youtube" class="ico-youtube" rel="nofollow"></a>
                        <img alt="youtube" src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube-icon.png">
                        <?php endif; ?>
                        <?php if(get_option(SHORT_NAME . "_twitterURL") != ""): ?>
                        <a href="<?php echo get_option(SHORT_NAME . "_twitterURL"); ?>" target="_blank" title="Follow on Twitter" class="ico-twitter" rel="nofollow"></a>
                        <img alt="Twitter" src="<?php bloginfo('stylesheet_directory'); ?>/images/tweeter-icon.png">
                        <?php endif; ?>
                        <?php if(get_option(SHORT_NAME . "_linkedInURL") != ""): ?>
                        <a href="<?php echo get_option(SHORT_NAME . "_linkedInURL"); ?>" target="_blank" title="Follow on Linked In" class="ico-linkin" rel="nofollow"></a>
                        <img alt="in" src="<?php bloginfo('stylesheet_directory'); ?>/images/in-icon.png">
                        <?php endif; ?>
                    </div>	
                </div>
                <div class="footer-top-item-last">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footersidebar') ) : ?><?php endif; ?>
                </div>
            </div><!--end .footer-main-top-->
            <div class="footer-main-mid">
                <div class="footer-main-mid-title">
                    <h2>
                    <strong>KHÁCH HÀNG</strong>
                    Tiêu biểu
                    </h2>
                </div>
                <div class="list-khachhang">
                    <?php
                        $loop = new WP_Query(array(
                            'post_type' => 'brand',
                        ));
                        while ($loop->have_posts()) : $loop->the_post();
                    ?>
                    <a href="@#" target="_blank">
                        <img src="<?php get_image_url(); ?>">
                    </a>
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                </div>
            </div><!--end .footer-main-mid-->
            <div class="footer-main-bottom">
                <div class="footer-main-bottom-content">
                    <div id="logo2"><a href="#"><img width="120" src="<?php echo stripslashes(get_option("footerlogo")); ?>"></a></div>
                    <div class="copyright">Copyright &copy; <?php echo date('Y'); ?> thuộc về <?php echo get_option('unit_owner'); ?></div>
                    <div class="menu-bottom">
                        <?php
                            wp_nav_menu(array(
                                //'container' => '',
                                'theme_location' => 'footermenu',
                                'menu_id' =>'nav_bottom'
                            ));
                        ?>
                    </div>
                    <div class="backtotop"><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/top-icon.png"></a></div>
                </div>
            </div><!--end .footer-main-bottom-->
        </div><!--end .footer-main-->
    </div>
</footer>
</div><!-- end .wcn_wrapper-->

<!-- script references -->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.bpopup.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/slippry.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/carouFredSel.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/app.js"></script>

<?php wp_footer(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
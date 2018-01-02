<?php
/**
 * Template Name: Bao gia
 */
get_header(); ?>
<?php echo do_shortcode(stripslashes(get_option(SHORT_NAME . "_sliderpagecontactCode"))); ?>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-contact">
                <div class="page-contact-left">
                    <?php the_content();?>
                </div>
                <div class="page-contact-right">
                    <p>
                    <strong>Quý khách có thể yêu cầu chúng tôi báo giá bằng cách điền thông tin vào mẫu bên dưới. Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất. </strong>
                    </p>
                    <div class="contact-content">
                        <div class="contact-title">Vui lòng để lại thông tin</div>
                        <div class="contact-form">
                            <?php echo do_shortcode(stripslashes(get_option(SHORT_NAME . "_priceformCode"))); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
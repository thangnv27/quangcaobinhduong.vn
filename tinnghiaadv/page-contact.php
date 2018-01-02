<?php
/**
 * Template Name: Lien he
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
                    <div class="maps">
                        <?php echo stripslashes(get_option(SHORT_NAME . "_gmaps")); ?>
                    </div>
                    <div class="contact-content">
                        <div class="contact-title">Vui lòng để lại thông tin</div>
                        <div class="contact-form">
                            <?php echo do_shortcode(stripslashes(get_option(SHORT_NAME . "_contactformCode"))); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
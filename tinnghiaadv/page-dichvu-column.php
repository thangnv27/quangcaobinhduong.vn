<?php
/**
 * Template Name: dich vu 2 cot
 */
get_header(); ?>
<?php echo do_shortcode(stripslashes(get_option(SHORT_NAME . "_sliderpagecontactCode"))); ?>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-content">
                <div class="page-content-left">
                    <?php the_content();?>
                </div>
                <div class="page-content-right"> 
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
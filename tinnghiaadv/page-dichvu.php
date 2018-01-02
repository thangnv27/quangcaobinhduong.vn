<?php
/**
 * Template Name: dich vu
 */
get_header(); ?>
<?php echo do_shortcode(stripslashes(get_option(SHORT_NAME . "_sliderpagecontactCode"))); ?>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-content">
                <?php the_content();?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
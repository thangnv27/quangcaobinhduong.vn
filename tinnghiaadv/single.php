<?php get_header();?>
<section id="wcn_main">
    <div class="main-content">
        <div class="container">
            <div class="page-content">
                <div class="page-deatails-header">
                    <h1 class="title-head">
                        <strong><?php the_title();?></strong>
                    </h1>
                </div>
                <?php the_content();?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
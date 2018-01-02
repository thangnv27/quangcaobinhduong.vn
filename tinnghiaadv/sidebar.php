<div id="sidebar">
    <?php
    get_template_part("template/widget-addpost-button");

    if (function_exists('dynamic_sidebar')) {
        dynamic_sidebar('sidebar');
    }
    ?>
</div>
<!--END COLUMN SIDEBAR-->
<div class="clearfix"></div>
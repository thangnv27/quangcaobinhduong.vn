<?php //include_once 'libs/bbit-compress.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta http-equiv="Cache-control" content="no-store; no-cache"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="author" content="ppo.vn" />
    <meta name="robots" content="index, follow" /> 
    <meta name="googlebot" content="index, follow" />
    <meta name="bingbot" content="index, follow" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.position" content="14.058324;108.277199" />
    <meta name="ICBM" content="14.058324, 108.277199" />
    <meta property="fb:app_id" content="<?php echo get_option(SHORT_NAME . "_appFBID"); ?>" />

    <!--<meta name="viewport" content="initial-scale=1.0" />-->

    <meta name="keywords" content="<?php echo get_option('keywords_meta') ?>" />
    
    <link rel="publisher" href="https://plus.google.com/+ThịnhNgô"/>

    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />        
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/common.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/start/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/slippry.css" />
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        var siteUrl = "<?php bloginfo('siteurl'); ?>";
        var themeUrl = "<?php bloginfo('stylesheet_directory'); ?>";
        var no_image_src = themeUrl + "/images/no_image_available.jpg";
        var is_home = <?php echo is_home() ? 'true' : 'false'; ?>;
        var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';
    </script>

    <?php
    if (is_singular())
            wp_enqueue_script('comment-reply');

        wp_head();
    ?>
</head>
<body>
    <div id="wcn_wrapper">
        <header id="wcn_header">
            <div class="container">
                <div class="header-left left">
                    <div class="logo">
                        <a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo("name"); ?> - <?php bloginfo("description"); ?>">
                            <img alt="<?php bloginfo("name"); ?>" src="<?php echo stripslashes(get_option("sitelogo")); ?>" />
                        </a>
                    </div>
                    <nav id="wcn_menu" class="right">
                        <?php
                            wp_nav_menu(array(
                                //'container' => '',
                                'theme_location' => 'primary',
                                'menu_class' => 'right',
                                'menu_id' =>'nav'
                            ));
                        ?>
                    </nav>
                </div>
                <div class="header-right right">
                    <form id="frm_search" action="<?php bloginfo('siteurl'); ?>" method="get" name="form-search">
                            <input type="text" placeholder="Tìm kiếm" name="s" class="txt-search">
                            <input type="submit" value="Tìm" class="btn-search">
                    </form>		
		</div>
            </div>
        </header>
        
    
    
jQuery.noConflict();
var Dialog = {
    show: function (elm) {
        jQuery(elm).bPopup({
            easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideDown'
        });
    },
    showHelp: function () {
        jQuery('#help').bPopup({
            easing: 'easeOutBack', //uses jQuery easing plugin
            speed: 450,
            transition: 'slideDown'
        });
    },
    notify: function (data) {
        var message = '<div style="z-index:1000;background:#F6F7F8;padding:15px;position:fixed;bottom:10%;left:20px; max-width:200px;border-radius:5px;display:none;border:solid 1px #C50A01;" id="notify">\
                    <div style="position:relative;"><span class="close_notify" style="position: absolute; cursor: pointer; top: -15px; padding: 0px 5px; right: -15px;">x</span>\
                    <div class="msg_notify">' + data + '</div></div></div>';
        if (jQuery("#notify").length == 0) {
            jQuery("body").append(message);
        } else {
            jQuery(".msg_notify").html(data);
        }
        jQuery("#notify").slideDown(400).fadeTo(400, 100);
        jQuery("span.close_notify").click(function () {
            jQuery(this).parent().parent().fadeTo(400, 0).slideUp(400).remove();
        });
    }
};
function displayAjaxLoading(n) {
    n ? jQuery(".ajax-loading-block-window").show() : jQuery(".ajax-loading-block-window").hide("slow");
}
jQuery(document).ready(function ($) {
    //slider
    $(function() {
        var wcn_slide_top = $("#wcn_slide_top").slippry({
                transition: 'fade',
                useCSS: true,
                speed: 1000,
                pause: 3000,
                auto: true,
                preload: 'visible'
        });

        $('.stop').click(function () {
                wcn_slide_top.stopAuto();
        });

        $('.start').click(function () {
                wcn_slide_top.startAuto();
        });

        $('.prev').click(function () {
                wcn_slide_top.goToPrevSlide();
                return false;
        });
        $('.next').click(function () {
                wcn_slide_top.goToNextSlide();
                return false;
        });
        $('.reset').click(function () {
                wcn_slide_top.destroySlider();
                return false;
        });
        $('.reload').click(function () {
                wcn_slide_top.reloadSlider();
                return false;
        });
        $('.init').click(function () {
                demo1 = $("#demo1").slippry();
                return false;
        });
    });
    //back top
    jQuery('.backtotop').click(function () {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 1200);
        return false;
    });

    if ($('.duan-list-content').length) {
        $('.duan-list-content ul').carouFredSel({
            items: 1,
            scroll: {
                items: 1,
                duration: 500
            },
            auto: 4000,
            next: ".pro-next1",
            prev: ".pro-prev1",
            width: 960
        });
    }
    ;
    if ($('.hotnews-content').length) {
        $('.hotnews-content ul').carouFredSel({
            items: 1,
            scroll: {
                items: 1,
                duration: 500
            },
            auto: 4000,
            next: ".pro-next1",
            prev: ".pro-prev1"
        });
    }
    ;
    if ($('#typical-projects').length) {
        $('#typical-projects ul').carouFredSel({
            items: 1,
            scroll: {
                items: 1,
                duration: 500
            },
            auto: 4000,
            next: ".news-next1",
            prev: ".news-prev1"
        });
    }
    ;
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#toTop').fadeIn();
        } else if ($(this).width() >= 1200) {
            $('#toTop').fadeOut();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $("#toTop").click(function () {
        scrollToElement("#header");
    });

    // Top menu
//    $(".top-menu .menu, .top-menu .menutop").click(function() {
//        if ($(".bookmarks").is(":hidden")) {
//            $(".bookmarks").slideDown(400).fadeTo(400, 100);
//        } else {
//            $(".bookmarks").fadeTo(400, 0).slideUp(400);
//        }
//    });

    // Search box
    $(".search-title").each(function () {
        $(this).click(function () {
            $(".search-title").removeClass('active');
            $(this).addClass('active');
            // active form
            $("#search-box form").hide();
            $("form[id=" + $(this).attr("rel") + "]").show();
        });
    });
    if ($.getUrlVar("post_type") === 'brand') {
        $(".search-title").removeClass('active');
        $(".search-title[rel=frmSearchBrand]").addClass('active');
        $("#search-box form").hide();
        $("form#frmSearchBrand").show();
    }


    //Add new post
    $("#btnNextStep2").click(function () {
        tinyMCE.triggerSave();
//        $(".step1").hide("slide", { direction: "left" }, 1000);
        $(".step1").css('display', 'none');
        $(".step2").show("slide", {direction: "right"}, 1000);
        scrollToElement(".post-header");
    });
    $("#btnBackStep1").click(function () {
        $(".step2").hide("slide", {direction: "right"}, 1000);
//        $(".step1").show("slide", { direction: "left" }, 1000);
        $(".step1").css('display', 'block');
        scrollToElement(".post-header");
    });
    $("#btnNextStep3").click(function () {
        $(".step2").hide("slide", {direction: "left"}, 'normal');
        $(".step3").show("slide", {direction: "right"}, 1000);
        scrollToElement(".post-header");
    });
    $("#btnBackStep2").click(function () {
        $(".step3").hide("slide", {direction: "right"}, 1000);
        $(".step2").show("slide", {direction: "left"}, 1000);
        scrollToElement(".post-header");
    });
    $("#btnNextStep4").click(function () {
        $.ajax({
            url: ajaxurl, type: "POST", dataType: "json", cache: false,
            data: $("#frmAddnew").serialize(),
            success: function (response, textStatus, XMLHttpRequest) {
                if (response && response.status == 'success') {
                    $(".step3").hide("slide", {direction: "left"}, 1000);
                    $(".step4").show("slide", {direction: "right"}, 1000);
                    scrollToElement(".post-header");
                } else if (response.status == 'error') {

                }
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            },
            complete: function () {
                displayAjaxLoading(false);
            }
        });
    });
    $("#btnGoHome").click(function () {
        setLocation(siteUrl);
    });
    $("#btnRepost").click(function () {
        setLocation(addPostUrl);
    });

    // Auto suggest brands
    var brands = [];
    $("#brand_name").autocomplete({
        minLength: 3,
        source: function (request, response) {
            $.ajax({
                url: ajaxurl, type: "POST", dataType: "json", cache: false,
                data: {
                    s: request.term,
                    action: 'suggest_brands'
                },
                success: function (data) {
                    brands = response(data);
                }
            });
        },
        focus: function (event, ui) {
            $("#brand_name").val(ui.item.name);
            return false;
        },
        select: function (event, ui) {
            $("#brand_name").val(ui.item.name);
            $("#brand_id").val(ui.item.id);

            return false;
        }
    }).autocomplete("instance")._renderItem = function (ul, item) {
        return $("<li>").append("<a>" + item.name + "</a>").appendTo(ul);
    };

    // Share via email
    $("form#frmShareMail #btnSend").click(function () {
        $.ajax({
            url: ajaxurl, type: "POST", dataType: "json", cache: false,
            data: $("form#frmShareMail").serialize(),
            success: function (data) {
                alert(data.message);
                $("form#frmShareMail input[name=email]").val('');
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });
});
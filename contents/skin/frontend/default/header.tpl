<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{title}</title>
    <link rel="stylesheet" type="text/css" href="./contents/skin/frontend/default/css/style_002.css">
    <link rel="stylesheet" type="text/css" href="./contents/skin/frontend/default/css/audio-player.css">
    <script src="./contents/skin/frontend/default/js/atrk.js" async="" type="text/javascript"></script>
    <script src="./contents/skin/frontend/default/js/loader.js" async="" type="text/javascript"></script>
    <script src="./contents/skin/frontend/default/js/jquery_005.js" type="text/javascript"></script>
    <script src="./contents/skin/frontend/default/js/jquery_004.js" type="text/javascript"></script>
    <script src="./contents/skin/frontend/default/js/jquery_006.js" type="text/javascript"></script>
    <script src="./contents/skin/frontend/default/js/modernizr.js" type="text/javascript"></script>

    <!-- sticky -->
    <script type="text/javascript">
        var $jqsticky = jQuery.noConflict();
        var $stickyHeight = 540;
        var $padding = 32;
        //var $topOffset = 411;
        var $footerHeight = 140;//236;
        function scrollSticky() {
            if ($jqsticky(window).height() >= $stickyHeight) {
                var aOffset = $jqsticky('#sticky').offset();
                //if  ($(window).scrollTop() > $(".smartBannerIdentifier").offset({ scroll: false }).top){
                var $topOffset = $jqsticky(".smartBannerIdentifier").offset().top;
                //alert($topOffset);
                if ($jqsticky(document).height() - $footerHeight - $padding < $jqsticky(window).scrollTop() + $stickyHeight) {
                    var $top = $jqsticky(document).height() - $stickyHeight - $footerHeight - $padding - 43;
                    $jqsticky('#sticky').attr('style', 'position:absolute; top:' + $top + 'px;');

                } else if ($jqsticky(window).scrollTop() + $padding > $topOffset) {
                    $jqsticky('#sticky').attr('style', 'position:fixed; top:' + $padding + 'px;');

                } else {
                    $jqsticky('#sticky').attr('style', 'position:relative;');
                }
            }
        }

        $jqsticky(window).scroll(function () {
            scrollSticky();
        });
    </script>
    <script>
        var jaudio = jQuery.noConflict();
        jaudio(document).ready(function () {
            $(".header ul li").hover(function () {
                $(this).find("ul:first").css({display: "none"}).slideDown(300);
            }, function () {
                $(this).find("ul:first").fadeOut(300);
            });
            jaudio("#scroller").simplyScroll();
            $(window).scroll(function () {
                if ($(this).scrollTop() != 0) {
                    $('#bttop').fadeIn();
                } else {
                    $('#bttop').fadeOut();
                }
            });
            $('#bttop').click(function () {
                $('body,html').animate({scrollTop:0}, 800);
            });
        });
    </script>
    <style>
        #sticky {
            position: relative;
        }
    </style>
    <!-- end sticky -->
    <link rel="stylesheet" id="jQuery_notice-css" href="./contents/skin/frontend/default/css/jquery.css" type="text/css" media="all">
    <link rel="stylesheet" id="wpuf-css-css" href="./contents/skin/frontend/default/css/frontend-forms.css" type="text/css" media="all">
    <script type="text/javascript" src="./contents/skin/frontend/default/js/jquery_007.js"></script>
    <script type="text/javascript" src="./contents/skin/frontend/default/js/jquery-migrate.js"></script>
    <script type="text/javascript" src="./contents/skin/frontend/default/js/jquery_003.js"></script>
    <script type="text/javascript" src="./contents/skin/frontend/default/js/jwplayer.js"></script>
    <script type="text/javascript" src="./contents/skin/frontend/default/js/frontend-form.js"></script>
    <link rel="stylesheet" id="wsl_css-css" href="./contents/skin/frontend/default/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" id="wsl_css-css" href="./contents/skin/frontend/default/css/custom.css" type="text/css" media="all">
    <meta name="description" content="{description}">
    <meta name="keywords" content="{keywords}">
    <link rel="canonical" href="{link_xem}">
    <meta property="og:title" content="{title}">
    <meta property="og:type" content="blog">
    <meta property="og:url" content="{link_xem}">
    <meta property="og:image" content="{minhhoa_facebook}">
    <meta property="og:site_name" content="{title}">
    <meta property="og:description" content="{description}">
    <meta name="twitter:card" value="summary">
    <meta name="twitter:description" value="{description}">
    <!-- /all in one seo pack pro -->

    <!-- Responsive Select CSS
    ================================================================ -->
    <style type="text/css" id="responsive-select-css">
        .responsiveSelectContainer select.responsiveMenuSelect, select.responsiveMenuSelect {
            display: none;
        }

        @media (max-width: 600px) {
            .responsiveSelectContainer {
                border: none !important;
                background: none !important;
                box-shadow: none !important;
            }

            .responsiveSelectContainer ul, ul.responsiveSelectFullMenu, #megaMenu ul.megaMenu.responsiveSelectFullMenu {
                display: none !important;
            }

            .responsiveSelectContainer select.responsiveMenuSelect, select.responsiveMenuSelect {
                display: inline-block;
                width: 100%;
            }
        }
    </style>
    <!-- end Responsive Select CSS -->

    <!-- Responsive Select JS
    ================================================================ -->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.responsiveMenuSelect').change(function () {
                var loc = $(this).find('option:selected').val();
                if (loc !== '' && loc !== '#') window.location = loc;
            });
            //$( '.responsiveMenuSelect' ).val('');
        });
    </script>
    <!-- end Responsive Select JS -->

    <script src="./contents/skin/frontend/default/js/jquery_005.js"></script>
    <script src="./contents/skin/frontend/default/js/jquery_004.js"></script>
    <script src="./contents/skin/frontend/default/js/mediaelement-and-player.js"></script>
    <script src="./contents/skin/frontend/default/js/jquery.js"></script>
    <script src="./contents/skin/frontend/default/js/script.js"></script>
    <script>
        var $jslider = jQuery.noConflict();
        $jslider(document).ready(function () {
            $jslider('#jslidernews2').lofJSidernews({
                interval: 4000,
                easing: 'easeInOutQuad',
                duration: 1200,
                auto: true,
                mainWidth: 380,
                mainHeight: 396,
                navigatorHeight: 55,
                navigatorWidth: 245,
                maxItemDisplay: 6,
            });
            $jslider('#audio-player, #audio-player-2').mediaelementplayer({
                alwaysShowControls: true,
                features: ['playpause', 'volume', 'progress'],
                audioVolume: 'horizontal',
                success: function (media, node, player) {

                    media.addEventListener('play', function (e) {
                        setTimeout(function () {
                            $('.button-control').removeClass("pause").addClass("play"), 1000
                        });
                    });
                    media.addEventListener('pause', function (e) {
                        $('.button-control').removeClass("play").addClass("pause");
                    });
                }
            });
        });
    </script>
    <script src="./contents/skin/frontend/default/js/j.js" type="text/javascript"></script>
    <script src="./contents/skin/frontend/default/js/underscore-1.js" type="text/javascript"></script>
    <script type="text/javascript" src="./contents/js/lib/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="./contents/skin/frontend/default/css/theme.css" type="text/css">
</head>
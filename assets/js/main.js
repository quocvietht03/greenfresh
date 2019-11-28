!(function ($) {
    "use strict";

    /* Show menu desktop/mobile */
    function GreenfreshShowMenuType() {
        var screen_width = $(window).width();

        if (screen_width <= option_ob.enable_mobile) {
            $('.bt-header .bt-header-desktop, .bt-header .bt-header-stick').hide();
            $('.bt-header .bt-header-mobile').show();
        } else {
            $('.bt-header .bt-header-desktop, .bt-header .bt-header-stick').show();
            $('.bt-header .bt-header-mobile').hide();
        }
    }

    /* Toggle menu mobile */
    function GreenfreshToggleMenuMobile() {
        $('.bt-header .bt-header-mobile .bt-menu-toggle').on('click', function () {
            $(this).toggleClass('active');
            $('.bt-header .bt-menu-mobile').toggle('slow');
        });
    }

    /* Toggle sub menu vertical */
    function GreenfreshToggleSubMenuVertical() {
        var hasChildren = $('.bt-header .bt-header-mobile ul li.menu-item-has-children, .bt-header-vertical .bt-vertical-menu-wrap ul li.menu-item-has-children');

        hasChildren.each(function () {
            var $btnToggle = $('<div class="menu-toggle"></div>');
            $(this).append($btnToggle);
            $btnToggle.on('click', function (e) {
                e.preventDefault();
                $(this).toggleClass('active');
                $(this).parent().children('ul').toggle('slow');
                $(this).parent().children('div.mega-menu').toggle('slow');
            });
        });
    }

    /* Header Stick */
    function GreenfreshHeaderStick() {
        if ($('.bt-header').hasClass('bt-stick')) {
            var h_menu = $('.bt-header .bt-header-desktop .bt-subheader.bt-bottom'),
                h_menu_info = {top: h_menu.offset().top, height: h_menu.innerHeight()};

            if ($(window).scrollTop() > (h_menu_info.top + h_menu_info.height)) {
                $('.bt-header .bt-header-stick').addClass('active');
            }
            if ($(window).scrollTop() < (h_menu_info.top + h_menu_info.height + 90)) {
                $('.bt-header .bt-header-stick').removeClass('active');
            }
        }
    }

    /* Header Vertical */
    function GreenfreshHeaderVertical() {
        var w_screen = parseInt(window.innerWidth) - 17,
            w_main,
            e_hvertical = $('.header-vertical .bt-header-vertical'),
            e_main = $('.header-vertical .bt-titlebar, .header-vertical .bt-main-content, .header-vertical .bt-footer'),
            h_screen = parseInt(window.innerHeight),
            h_menu,
            e_menu = $('.bt-header-vertical .bt-header-inner .bt-vertical-menu-wrap');

        /* width header */
        if (w_screen > option_ob.enable_mobile) {
            if (w_screen > option_ob.hvertical_width) {
                w_main = w_screen - parseInt(option_ob.hvertical_width);
                e_hvertical.css("width", option_ob.hvertical_width);
                e_main.css("width", w_main);
            } else {
                w_main = w_screen - 320;
                e_hvertical.css("width", "320px");
                e_main.css("width", w_main);
            }
        }

        /* height menu */
        if (option_ob.hvertical_full_height) {
            if (h_screen > 900) {
                h_menu = parseInt(option_ob.hvertical_menu_height) + (h_screen - 900);
                e_menu.css("height", h_menu);
            } else {
                h_menu = parseInt(option_ob.hvertical_menu_height) - (900 - h_screen);
                e_menu.css("height", h_menu);
            }
        }
    }

    /* Toggle Header Vertical Mobile */
    function GreenfreshToggleHeaderVerticalMobile() {
        $('.header-vertical .bt-menu-toggle').on('click', function () {
            $('.header-vertical  .bt-header-vertical').toggleClass('active');
            $(this).toggleClass('active');
        });
    }

    /* Header Mini Vertical */
    function GreenfreshHeaderMiniVertical() {
        $('.header-minivertical .bt-header-minivertical .bt-header-desktop .bt-menu-toggle').on('click', function () {
            $('.header-minivertical .bt-header-minivertical').toggleClass('active');
            $(this).toggleClass('active');
        });
    }

    /* Mega Menu Auto Align */
    function GreenfreshMegaMenuAutoAlign() {
        $('.bt-header .bt-menu-desktop > ul > li.menu-item-has-mega-menu').on('hover', function () {
            var w_screen = parseInt(window.innerWidth),
                sub_mega = $(this).children('div.mega-menu'),
                pos_mega = sub_mega.offset(),
                l_mega = pos_mega.left,
                r_mega = w_screen - (l_mega + parseInt(sub_mega.outerWidth()));

            if (l_mega < 0) {
                sub_mega.css("margin-left", l_mega * (-1) + 'px');
            }

            if (r_mega < 0) {
                sub_mega.css("margin-left", r_mega + 'px');
            }

        });
    }

    /* Menu Canvas */
    function GreenfreshMenuCanvas() {
        $('.bt-header .bt-menu-canvas-toggle').on('click', function () {
            $('#bt_menu_canvas').toggleClass('active');
        });
        $('#bt_menu_canvas').on('click', function () {
            $('#bt_menu_canvas').toggleClass('active');
        });
    }

    /* Open the hide mini search */
    function GreenfreshOpenMiniSearchSidebar() {
        $('.bt-mini-search > a').on('click', function (e) {
            e.preventDefault();
            if ($('.bt-mini-cart .bt-cart-content, .bt-mini-cart > a').hasClass('active')) {
                $('.bt-mini-cart .bt-cart-content, .bt-mini-cart > a').removeClass('active');
            }
            if ($('.bt-mini-search').hasClass('mini')) {
                $(this).toggleClass('active');
                $('.bt-mini-search .bt-search-form').toggleClass('active');
            } else {
                $('#bt_search_popup').toggleClass('active');
            }
        });
        $('#bt_search_popup > a.bt-close').on('click', function (e) {
            e.preventDefault();
            $('#bt_search_popup').removeClass('active');
        });
    }

    /* Open the hide mini cart */
    function GreenfreshOpenMiniCartSidebar() {
        $('.bt-mini-cart > a').on('click', function (e) {
            e.preventDefault();
            if ($('.bt-mini-search .bt-search-form, .bt-mini-search > a').hasClass('active')) {
                $('.bt-mini-search .bt-search-form, .bt-mini-search > a').removeClass('active');
            }
            $(this).toggleClass('active');
            $('.bt-mini-cart .bt-cart-content').toggleClass('active');
        });
    }

    /* Open the hide menu canvas */
    function GreenfreshOpenMenuSidebar() {
        $('.bt-menu-sidebar > a').on('click', function () {
            $('body').toggleClass('bt-menu-canvas-open');
        });
        $('.bt-menu-canvas-overlay').on('click', function () {
            $('body').toggleClass('bt-menu-canvas-open');
        });
    }

    /* Easy Scroll */
    function GreenfreshEasingScroll() {
        var $root = $('html, body');
        $('.header-onepage .bt-header .bt-header-desktop .bt-bottom ul.menu > li > a,.header-onepage .bt-header .bt-header-stick .bt-menu-desktop ul.menu > li > a, .bt-header-onepage .bt-header-mobile .bt-menu-mobile-wrap .bt-menu-mobile ul.menu > li > a, .bt-header-onepage .bt-menu-list ul > li > a').on('click', function () {
            var href = $.attr(this, 'href');
            $root.animate({
                scrollTop: $(href).offset().top
            }, 700, function () {
                window.location.hash = href;
            });
            return false;
        });
    }

    /* Active Menu Item Scroll  */
    function GreenfreshActiveMenuItemScroll() {
        var scroll_pos = $(window).scrollTop() + 1;
        var sec_attr = [];

        $('.header-onepage .vc_section, .header-onepagescroll .vc_section').each(function () {
            sec_attr.push([$(this).attr('id'), $(this).offset().top]);
        });

        $.each(sec_attr, function (index, value) {
            if (scroll_pos >= value[1] && scroll_pos < value[1] + $('#' + value[0]).innerHeight()) {
                $('.header-onepage .bt-header .bt-header-desktop .bt-bottom ul.menu > li, .header-onepage .bt-header .bt-header-stick .bt-menu-desktop ul.menu > li, .bt-header-onepage .bt-menu-list ul > li').removeClass('current-menu-item');
                $('.header-onepage .bt-header .bt-header-desktop .bt-bottom ul.menu > li > a[href="#' + value[0] + '"], .header-onepage .bt-header .bt-header-stick .bt-menu-desktop ul.menu > li > a[href="#' + value[0] + '"], .bt-header-onepage .bt-menu-list ul > li > a[href="#' + value[0] + '"]').parent().addClass('current-menu-item');
            }
        });
    }

    /* Footer Stick */
    function GreenfreshFooterStick() {
        if ($('.bt-footer').hasClass('bt-stick')) {
            var f_height = parseInt($('.bt-footer').innerHeight()),
                f_space = parseInt($('.bt-footer').data('space'));

            $('#bt-main .bt-header').css({"position": "relative", "z-index": "999"});
            $('#bt-main .bt-titlebar').css({"position": "relative", "z-index": "3"});
            $('#bt-main .bt-main-content').css({
                "position": "relative",
                "background": "#ffffff",
                "z-index": "3",
                "margin-bottom": f_height + f_space
            });
        }
    }

    /* Nice Scroll Bar */
    function GreenfreshNiceScrollBar() {
        if (option_ob.nice_scroll_bar && option_ob.nice_scroll_bar_element) {
            $(option_ob.nice_scroll_bar_element).niceScroll({
                cursorcolor: "#4d4d4d",
                cursorborder: "0px",
                cursorwidth: "7px",
            });
        }
    }

    /* Masonry */
    function GreenfreshMasonry() {
        if ($('.bt-grid-masonry').length > 0) {
            $('.bt-grid-masonry .row').isotope({
                // options
            });
        }
    }

    /*CountDown*/
    function GreenfreshCountDownClock() {
        $('.bt-countdown-clock').each(function () {
            var countdownTime = $(this).attr('data-countdown');
            var countdownFormat = $(this).attr('data-format');
            var countdownLabels = $(this).attr('data-labels').split(',');
            var countdownLabels1 = $(this).attr('data-labels1').split(',');
            $(this).countdown({
                until: countdownTime,
                format: countdownFormat,
                labels: countdownLabels,
                labels1: countdownLabels1,
                padZeroes: true
            });
        });
    }

    function GreenfreshSidebarSticky() {
        var winW = document.documentElement.offsetWidth;
        var btHeader = $('#bt_header');
        var wpadminbar = $('#wpadminbar');
        var btHeaderStickyH = $('.bt-header-stick').outerHeight(true);
        var wpadminbarH = (wpadminbar.length) ? wpadminbar.height() : 0;
        var topSpace = (btHeader.hasClass('bt-stick')) ? parseFloat(btHeaderStickyH) + 30 + parseFloat(wpadminbarH) : 30;

        if ($('.bt-main-content .bt-sidebar').length && $('body').hasClass('is-sticky-sidebar') && !(winW <= parseInt(option_ob.enable_mobile))) {
            var sidebar = new StickySidebar('.bt-sidebar', {
                topSpacing: topSpace,
                bottomSpacing: 20,
                containerSelector: '.bt-main-content',
                innerWrapperSelector: '.bt-sidebar__inner',
                minWidth: parseInt(option_ob.enable_mobile)
            });
            $('.bt-sidebar')[0].addEventListener('affixed.container-bottom.stickySidebar', function (event) {
                $(this).css({
                    'bottom': '50px'
                })
            });
        }
    }

    jQuery(document).ready(function ($) {
        GreenfreshShowMenuType();
        GreenfreshToggleMenuMobile();
        GreenfreshToggleSubMenuVertical();
        GreenfreshHeaderStick();
        GreenfreshHeaderVertical();
        GreenfreshToggleHeaderVerticalMobile();
        GreenfreshHeaderMiniVertical();
        GreenfreshMegaMenuAutoAlign();
        GreenfreshMenuCanvas();
        GreenfreshOpenMiniSearchSidebar();
        GreenfreshOpenMiniCartSidebar();
        GreenfreshOpenMenuSidebar();
        GreenfreshEasingScroll();
        GreenfreshActiveMenuItemScroll();
        GreenfreshFooterStick();
        GreenfreshNiceScrollBar();
        GreenfreshMasonry();
        GreenfreshCountDownClock();


        if ($('.bt-counter-element .bt-number').length > 0) {
            $('.bt-counter-element .bt-number').counterUp({
                delay: 10,
                time: 1000
            });
        }

        /* Plus Qty */
        $(document).on('click', '.qty-plus', function () {
            var parent = $(this).parent();
            $('input.qty', parent).val(parseInt($('input.qty', parent).val()) + 1);
            $('input.qty', parent).trigger('change');
        });
        /* Minus Qty */
        $(document).on('click', '.qty-minus', function () {
            var parent = $(this).parent();
            if (parseInt($('input.qty', parent).val()) > 1) {
                $('input.qty', parent).val(parseInt($('input.qty', parent).val()) - 1);
                $('input.qty', parent).trigger('change');
            }
        });
    });

    jQuery(window).on('resize', function () {
        GreenfreshShowMenuType();
        GreenfreshActiveMenuItemScroll();
        GreenfreshMasonry();
        GreenfreshHeaderVertical();
        GreenfreshMegaMenuAutoAlign();

        // GreenfreshSidebarSticky();
    });

    jQuery(window).on('scroll', function () {
        GreenfreshHeaderStick();
        GreenfreshActiveMenuItemScroll();
        GreenfreshMasonry();

    });

    jQuery(window).load(function () {
        var $animateEl = jQuery('[data-animate]');
        $animateEl.each(function () {
            var $el = jQuery(this),
                $name = $el.data('animate'),
                $duration = $el.data('duration'),
                $delay = $el.data('delay');

            $duration = typeof $duration === 'undefined' ? '0.6' : $duration;
            $delay = typeof $delay === 'undefined' ? '0' : $delay;

            $el.waypoint(function () {
                $el.addClass('animated ' + $name)
                    .css({
                        'animation-duration': $duration + 's',
                        'animation-delay': $delay + 's'
                    });
            }, {offset: '98%'});
        });


        GreenfreshSidebarSticky();
    });

})(jQuery);

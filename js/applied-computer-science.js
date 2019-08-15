jQuery(window).on("load", function () {
    jQuery(window).scroll(function () {
        jQuery('div.logo-menu-wrapper').toggleClass("scrolling", (jQuery(window).scrollTop() > 100));

        if (window.innerWidth > 767) {
            jQuery('div.logo-menu-wrapper').toggleClass("show-logo", (jQuery(window).scrollTop() > 200));
            jQuery('main').find('header:first').toggleClass("scrolling", (jQuery(window).scrollTop() > 200));
        }
    });
});

jQuery(document).ready(function () {

    jQuery('div.menu-toggler').on("click", function () {
        jQuery('div.sidebar-menu').addClass('open');
    });

    jQuery('div.sidebar-menu>div.menu-toggler').on("click", function () {
        jQuery('div.sidebar-menu').removeClass('open');
    });

    jQuery('ul>li.menu-item-has-children').on("click", function (event) {
        jQuery(this).children('ul.sub-menu:first').slideToggle();
        event.stopPropagation();
    });
});
jQuery(window).on("load", function () {
    jQuery(window).scroll(function () {
        jQuery('div.logo-menu-wrapper').toggleClass("scrolling", (jQuery(window).scrollTop() > 100));
    });
});
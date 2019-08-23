jQuery(window).on("load", function () {
    jQuery(window).scroll(function () {
        jQuery('div.logo-menu-wrapper').toggleClass("scrolling", (jQuery(window).scrollTop() > 100));

        jQuery('div.logo-menu-wrapper').toggleClass("show-logo", (jQuery(window).scrollTop() > 200));
        jQuery('main').find('header:first').toggleClass("scrolling", (jQuery(window).scrollTop() > 200));
        jQuery('main').find('header:first span.blog-name').toggleClass("visible", (jQuery(window).scrollTop() > 200));
    });
});

jQuery(document).ready(function () {

    jQuery('div.logo-menu-wrapper>div.menu-toggler').on("click", function () {
        jQuery('div.sidebar').addClass('open');

        setTimeout(function() {
            jQuery('#content').css('overflow', 'hidden'); // disable scroll
        }, 300)
    });

    jQuery('div.sidebar>div.menu-toggler').on("click", function () {
        jQuery('div.sidebar').removeClass('open');
        jQuery('#content').css('overflow', 'inherit'); // enable scroll
    });

    jQuery('ul>li.menu-item-has-children').on("click", function (event) {
        jQuery(this).children('ul.sub-menu:first').slideToggle();
        event.stopPropagation();
    });
});
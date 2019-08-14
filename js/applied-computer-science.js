jQuery(window).on("load", function () {
    jQuery(window).scroll(function () {
        jQuery('div.logo-menu-wrapper').toggleClass("scrolling", (jQuery(window).scrollTop() > 100));
    });
});

jQuery(document).ready(function () {

    jQuery('div.menu-toggler').on("click", function () {
        jQuery('div.sidebar-menu').addClass('open');
    });

    jQuery('div.sidebar-menu>div.menu-toggler').on("click", function () {
        jQuery('div.sidebar-menu').removeClass('open');
    });

    jQuery('ul>li.menu-item-has-children').on("click", function () {
        console.log('passo');
        jQuery(this).find('ul.sub-menu').slideToggle();
    });
});
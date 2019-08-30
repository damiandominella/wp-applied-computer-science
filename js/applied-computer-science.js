jQuery(window).on("load", function () {
    jQuery(window).scroll(function () {
        jQuery('div.logo-menu-wrapper').toggleClass("scrolling", (jQuery(window).scrollTop() > 100));

        // jQuery('div.logo-menu-wrapper').toggleClass("show-logo", (jQuery(window).scrollTop() > 200));
        // jQuery('main').find('header:first').toggleClass("scrolling", (jQuery(window).scrollTop() > 200));
        // jQuery('main').find('header:first span.blog-name').toggleClass("visible", (jQuery(window).scrollTop() > 200));
    });
});

jQuery(document).ready(function () {

    jQuery('div.logo-menu-wrapper>div.menu-toggler').on("click", function () {
        jQuery('div.sidebar').addClass('open');

        setTimeout(function () {
            jQuery('#content').css('overflow', 'hidden'); // disable scroll
        }, 300)
    });

    jQuery('div.sidebar>div.menu-toggler').on("click", function () {
        jQuery('div.sidebar').removeClass('open');
        jQuery('#content').css('overflow', 'inherit'); // enable scroll
    });

    // first level
    jQuery('ul:not(.sub-menu)>li.menu-item-has-children').on("click", function (event) {
        jQuery(this).toggleClass('hover');
        jQuery('ul:not(.sub-menu)>li.menu-item-has-children').not(this).removeClass('hover');
        jQuery('ul.sub-menu').not(jQuery(this).children()).fadeOut('fast');
        jQuery(this).children('ul.sub-menu:first').fadeToggle('fast');
        event.stopPropagation();
    });

    // sub levels
    jQuery('ul.sub-menu>li.menu-item-has-children').on("click", function (event) {
        jQuery(this).children('ul.sub-menu:first').fadeToggle('fast');
        event.stopPropagation();
    });

    jQuery(document).on("click", function () {
        jQuery('ul.sub-menu').fadeOut('hide');
        jQuery('li.menu-item-has-children').removeClass('hover');
    });

    if (jQuery('table.lectures').length > 0) {
        jQuery('table.lectures').wrap('<div class="table-wrapper"></div>');
    }
});
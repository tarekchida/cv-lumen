var cv = {
    init: function () {
    },
    navigation: function () {
        // Desktop menu
        $('.pt-trigger').click(function () {
            var pageNum = $(this).attr('data-goto');

            $('.pt-page').hide(50);
            $('.pt-page-' + pageNum).slideDown(500);
            $('.site-nav').toggleClass('mobile-menu-hide');

        });
        // Mobile menu
        $('.menu-toggle').click(function () {
            $('.site-nav').toggleClass('mobile-menu-hide');
        });
    },
};
$(document).ready(function () {
    cv.init();
    cv.navigation();

});

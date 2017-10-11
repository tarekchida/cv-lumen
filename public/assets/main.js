var cv = {
    init: function () {
    },
    navigation: function () {
        $('.pt-trigger').click(function () {
            var pageNum = $(this).attr('data-goto');

            $('.pt-page').hide(50);
            $('.pt-page-' + pageNum).slideDown(500);

        });
    },
};
$(document).ready(function () {
    cv.init();
    cv.navigation();
});

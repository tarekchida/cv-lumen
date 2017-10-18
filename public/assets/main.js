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
    contact: function () {
        $('#contact-form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/contact",
                data: $(this).serialize(),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (data, status, jqXHR) {
                    if (data.status) {
                        $('.success').show();
                        setTimeout(function () {
                            $('.success').hide();
                        }, 5000);
                    } else {
                        $('.errors').show();
                        setTimeout(function () {
                            $('.errors').hide();
                        }, 5000);
                    }
                },
                error: function (jqXHR, status) {
                    console.log(jqXHR);
                }
            });
        });
    }
};
$(document).ready(function () {
    cv.init();
    cv.navigation();
    cv.contact();
});

var cv = {
    init: function () {
    },
    /**
     * Menu Navigation
     * @returns {undefined}
     */
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
    /**
     * Contact Captcha validation
     * @returns {undefined}
     */
    contact: function () {
        $('#contact-form').submit(function (e) {
            e.preventDefault();

            var contactForm = new FormData($(this)[0]);
            var gData = new Object();
            gData.response = $('.g-recaptcha-response').val();
            $.ajax({
                type: "POST",
                url: "/recapthca",
                data: JSON.stringify(gData),
                Accept: 'application/json',
                contentType: "application/json; charset=utf-8",
                crossDomain: true,
                dataType: "json",
                success: function (data, status, jqXHR) {
                    cv.sendMail(contactForm);
                },
                error: function (jqXHR, status) {
                    $('.errors').show();
                    setTimeout(function () {
                        $('.errors').hide();
                    }, 5000);
                }
            });

        });
    },
    /**
     * Contact mail sender
     * @param {type} contactForm
     * @returns {undefined}
     */
    sendMail: function (contactForm) {
        $.ajax({
            type: "POST",
            url: "/contact",
            data: contactForm,
            processData: false,
            contentType: false,
            cache: false,
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
                $('.errors').show();
                setTimeout(function () {
                    $('.errors').hide();
                }, 5000);
            }
        });
    }
};
$(document).ready(function () {
    cv.init();
    cv.navigation();
    cv.contact();
});

(function ($) {
    "use strict";

    // manual carousel controls
    $('.next').click(function () {
        $('.carousel').carousel('next');
        return false;
    });
    $('.prev').click(function () {
        $('.carousel').c6arousel('prev');
        return false;
    });

})(jQuery);

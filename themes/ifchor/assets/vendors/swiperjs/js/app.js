;(function ($) {
    $(document).ready(function () {
        $('.burger-menu').on('click', function (event) {
            event.preventDefault();

            $('#side-panel').addClass('active');
            // $('body').addClass('no-scroll');
            $('.site').addClass('pusher');
            $('.site-header').addClass('pusher');
        });

        $('#side-panel').on('click', '.close-btn', function (event) {
            event.preventDefault();

            $('#side-panel').removeClass('active');
            $('body').removeClass('no-scroll');
            $('.site').removeClass('pusher');
            $('.site-header').removeClass('pusher');
        });
    });
})(jQuery);
$(function () {
    $('.collapse-arrow').on('click', function () {
        $('.feedback-block .collapsable').slideToggle();
    });

    $('#open-error-form').on('click', function () {
        $('#error-form').bPopup();
    });

    $('#open-feedback-form').on('click', function () {
        $('#error-form').bPopup();
    });

    $('body').on('submit', '#feedback-form', function () {
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (data) {
                console.log(data);
            }
        });
        return false; // belangrijk
    });
});
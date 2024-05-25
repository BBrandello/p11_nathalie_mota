jQuery(document).ready(function ($) {
    $('#charger-plus-content-home').on('click', function () {
        var button = $(this);
        var page = button.data('page');
        var newPage = page + 1;
        var nonce = ajax_object.load_more_nonce;

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: newPage,
                nonce: nonce
            },
            beforeSend: function () {
                button.text('Chargement...');
            },
            success: function (response) {
                if (response) {
                    $('.photos-home-header').append(response);
                    button.data('page', newPage);
                    if ($(response).find('.article').length < 9) {
                        button.hide();
                    } else {
                        button.show();
                    }
                    button.text('Charger plus');
                }
            },
            error: function () {
                button.text('Erreur lors du chargement.');
            }
        });
    });
});



jQuery(document).ready(function ($) {
    $('#charger-plus-content-home').on('click', function () {
        var button = $(this);
        var page = button.data('page');
        var newPage = page + 1;
        var nonce = ajax_object.load_more_nonce;
        var categorie = $('#filtre-categories').val();
        var format = $('#filtre-formats').val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: newPage,
                nonce: nonce,
                categorie: categorie,
                format: format
            },
            beforeSend: function () {
                button.text('Chargement...');
            },
            success: function (response) {
                if (response) {
                    $('.photos-home-header').append(response);
                    button.data('page', newPage);
                    button.text('Charger plus');
                } else {
                    button.hide();
                }
            },
            error: function () {
                button.text('Erreur lors du chargement.');
            }
        });
    });
});
jQuery(document).ready(function ($) {
    $('#charger-plus-content-home').on('click', function () {
        var button = $(this);
        var page = button.data('page');
        var newPage = page + 1;
        var nonce = ajax_object.load_more_nonce;
        var category = $('#filtre-categories').val();
        var format = $('#filtre-formats').val();
        var date = $('#filtre-dates').val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: newPage,
                nonce: nonce,
                category: category,
                format: format,
                date: date
            },
            success: function (response) {
                if (response.trim() != '') {
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

    // Réinitialise le bouton lorsque la catégorie, le format ou la date est modifié
    $('#filtre-categories, #filtre-formats, #filtre-dates').on('change', function () {
        $('#charger-plus-content-home').show();
        $('#charger-plus-content-home').data('page', 1);
    });
});
/*jQuery(document).ready(function ($) {
    function fetchFilteredPosts() {
        var category = $('#filtre-categories').val();
        var format = $('#filtre-formats').val();
        var date = $('#filtre-dates').val();
        var nonce = ajax_object.filter_nonce;

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_posts',
                category: category,
                format: format,
                date: date,
                nonce: nonce
            },
            success: function (response) {
                $('.photos-home-header').html(response);
                $('#charger-plus-content-home').data('page', 1);
            },
            error: function (error) {
                console.log('Erreur:', error);
            }
        });
    }

    $('#filtre-categories, #filtre-formats, #filtre-dates').change(function () {
        fetchFilteredPosts();
    });

    // Initialiser Select2
    jQuery(document).ready(function ($) {
        $('#filtre-categories, #filtre-formats, #filtre-dates').select2({
            minimumResultsForSearch: Infinity, // Désactiver la fonction de recherche
            dropdownCssClass: 'custom-dropdown',
        });
    });
});*/

jQuery(document).ready(function ($) {
    // Initialiser Select2
    $('#filtre-categories, #filtre-formats, #filtre-dates').select2({
        dropdownCssClass: 'custom-dropdown',
    });

    // Fonction pour récupérer les posts filtrés
    function fetchFilteredPosts() {
        var category = $('#filtre-categories').val();
        var format = $('#filtre-formats').val();
        var date = $('#filtre-dates').val();
        var nonce = ajax_object.filter_nonce;

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_posts',
                category: category,
                format: format,
                date: date,
                nonce: nonce
            },
            success: function (response) {
                $('.photos-home-header').html(response);
                $('#charger-plus-content-home').data('page', 1);
            },
            error: function (error) {
                console.log('Erreur:', error);
            }
        });
    }

    // Gérer le changement d'options dans Select2
    $('#filtre-categories, #filtre-formats, #filtre-dates').on('change', function () {
        fetchFilteredPosts();
    });
});
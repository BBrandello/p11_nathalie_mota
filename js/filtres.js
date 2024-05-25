jQuery(document).ready(function ($) {
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
                $('#charger-plus-content-home').data('page', 1); // Reset the page number
            },
            error: function (error) {
                console.log('Erreur:', error);
            }
        });
    }

    $('#filtre-categories, #filtre-formats, #filtre-dates').change(function () {
        fetchFilteredPosts();
    });

    // Fetch posts initially on page load
    fetchFilteredPosts();
});
jQuery(document).ready(function ($) {
    function fetchFilteredPosts() {
        var category = $('#filtre-categories').val();
        var format = $('#filtre-formats').val();
        var date = $('#filtre-dates').val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_posts',
                category: category,
                format: format,
                date: date,
                nonce: ajax_object.nonce
            },
            success: function (response) {
                $('.photos-home-header').html(response);
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
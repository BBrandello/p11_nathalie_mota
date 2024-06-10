jQuery(document).ready(function ($) {
    var images = []; // Variable pour stocker les informations sur les images
    var currentIndex = 0;

    // Fonction pour ouvrir la lightbox
    function openLightbox(index) {
        currentIndex = index;
        var $image = $('#lightbox-images');
        $image.attr('src', images[index].src);
        $image.removeClass('portrait landscape').addClass(images[index].orientation);
        $('#image-lightbox-infos').html(images[index].infos);
        $('#lightbox').fadeIn();
    }

    // Récupérer les informations sur les images au chargement de la page
    $('.photos-home-header a').each(function () {
        var imageSrc = $(this).find('img').attr('src');
        var imageInfos = $(this).find('.ref-cat-hover-single-photo').html();
        var isPortrait = $(this).find('img').height() > $(this).find('img').width();
        var orientation = isPortrait ? 'portrait' : 'landscape';
        images.push({ src: imageSrc, infos: imageInfos, orientation: orientation });
    });

    // Ouvrir la lightbox au clic sur l'icône fa-expand (délégation d'événements)
    $(document).on('click', '.photos-home-header .fa-expand', function (e) {
        e.preventDefault();
        var index = $(this).closest('a').index('.photos-home-header a');
        openLightbox(index);
    });

    // Fermer la lightbox
    $(document).on('click', '.close-lightbox', function () {
        $('#lightbox').fadeOut();
    });

    // Navigation entre les images
    $(document).on('click', '.btn-text-prec-lightbox', function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        openLightbox(currentIndex);
    });

    $(document).on('click', '.btn-text-suiv-lightbox', function () {
        currentIndex = (currentIndex + 1) % images.length;
        openLightbox(currentIndex);
    });
});
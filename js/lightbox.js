jQuery(document).ready(function ($) {
    var images = []; // Variable pour stocker les informations sur les images
    var currentIndex = 0;

    // Fonction pour ouvrir la lightbox
    function openLightbox(imageSrc, imageInfos, orientation) {
        var $image = $('#lightbox-images');
        $image.attr('src', imageSrc);
        $image.removeClass('portrait landscape').addClass(orientation);
        $('#image-lightbox-infos').html(imageInfos);
        $('#lightbox').fadeIn();
    }

    // Récupérer les informations sur les images au chargement de la page
    $('.photos-home-header a').each(function () {
        var imageSrc = $(this).find('img').attr('src');
        var imageInfos = $(this).find('.titre-cat-hover-single-photo').html();
        var isPortrait = $(this).find('img').height() > $(this).find('img').width();
        var orientation = isPortrait ? 'portrait' : 'landscape';
        images.push({ src: imageSrc, infos: imageInfos, orientation: orientation });
    });

    // Ouvrir la lightbox au clic sur l'icône fa-expand (délégation d'événements)
    $(document).on('click', '.photos-home-header .fa-expand', function (e) {
        e.preventDefault();
        var $parent = $(this).closest('a');
        var imageSrc = $parent.find('img').attr('src');
        var imageInfos = $parent.find('.titre-cat-hover-single-photo').html();
        var isPortrait = $parent.find('img').height() > $parent.find('img').width();
        var orientation = isPortrait ? 'portrait' : 'landscape';
        openLightbox(imageSrc, imageInfos, orientation);
    });

    // Fermer la lightbox
    $(document).on('click', '.close-lightbox', function () {
        $('#lightbox').fadeOut();
    });

    // Navigation entre les images
    $(document).on('click', '.btn-text-prec-lightbox', function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        var { src, infos, orientation } = images[currentIndex];
        openLightbox(src, infos, orientation);
    });

    $(document).on('click', '.btn-text-suiv-lightbox', function () {
        currentIndex = (currentIndex + 1) % images.length;
        var { src, infos, orientation } = images[currentIndex];
        openLightbox(src, infos, orientation);
    });
});
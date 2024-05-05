//Menu burger header (format mobile)
/*document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.menu-burger-header').addEventListener('click', function () {
        document.body.classList.toggle('menu-burger-header-placement-open');
    });
});*/
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.menu-burger-header').addEventListener('click', function () {
        document.querySelector('.menu-burger-header-content').classList.toggle('menu-burger-header-content-open');
    });
});




// Modal de contact
document.addEventListener('DOMContentLoaded', (event) => {
    const linkToModal = document.querySelector('#menu-item-18 a');
    const modal = document.getElementById('contactModal');
    const overlayModale = document.querySelector('.fond-sombre-modale');

    linkToModal.addEventListener('click', function (event) {
        event.preventDefault();
        modal.classList.add('modal-ouverte');
        overlayModale.style.display = 'block'; // Affiche l'overlay sombre
    });

    document.addEventListener('click', function (event) {
        if (!modal.contains(event.target) && !linkToModal.contains(event.target)) {
            modal.classList.remove('modal-ouverte');
            overlayModale.style.display = 'none'; // Masque l'overlay sombre
        }
    });
});

// Ouvrir la popup au clic sur le bouton Contact
/*jQuery(document).ready(function ($) {
    $('#contact-button').click(function () {
        $('.popup').show();
    });
});*/
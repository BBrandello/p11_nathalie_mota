document.addEventListener('DOMContentLoaded', function () {
    // Gestion du menu burger (version mobile)
    var menuBurger = document.querySelector('.menu-burger-header');
    var menuContent = document.querySelector('.menu-burger-header-content');

    menuBurger.addEventListener('click', function () {
        // Toggle de la classe pour ouvrir/fermer le menu
        menuContent.classList.toggle('menu-burger-header-content-open');

        // Toggle de la classe pour afficher/cacher la croix
        menuBurger.classList.toggle('menu-burger-header-open');
    });

    // Gestion de la modale de contact
    const modal = document.getElementById('contactModal');
    const overlayModale = document.querySelector('.fond-sombre-modale');
    const btnContact = document.querySelector('.btn-contact-single-photo');
    const refPhotoInput = document.querySelector('.ref-photo-single-photo input');

    // Fonction pour ouvrir la modale
    function openModal(referenceValue) {
        modal.classList.add('modal-ouverte');
        overlayModale.style.display = 'block';
        // Préremplir le champ "RÉF. PHOTO" avec la valeur de la référence dans le formulaire Contact Form 7
        refPhotoInput.value = referenceValue;

        // Fermer le menu burger si modale ouverte
        menuContent.classList.remove('menu-burger-header-content-open');
        menuBurger.classList.remove('menu-burger-header-open');
    }

    // Fonction pour fermer la modale
    function closeModal() {
        modal.classList.remove('modal-ouverte');
        overlayModale.style.display = 'none';
    }

    overlayModale.addEventListener('click', function () {
        closeModal();
    });

    // Écouteur d'événements pour ouvrir la modale lorsque le lien de menu est cliqué
    const linkToModal = Array.from(document.querySelectorAll('.menu-item-118 a'));
    linkToModal.forEach(el => {
        el.addEventListener('click', function (event) {
            event.preventDefault();
            openModal(""); // Aucune référence spécifique pour le menu
        });
    });

    // Écouteur d'événements pour ouvrir la modale lorsque le bouton "Contact" est cliqué
    if (btnContact) {
        btnContact.addEventListener('click', function (event) {
            event.preventDefault();
            const refValue = this.getAttribute('data-reference') || "";
            openModal(refValue);
        });
    }
});
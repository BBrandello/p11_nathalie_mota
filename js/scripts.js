document.addEventListener('DOMContentLoaded', function () {
    // Gestion du menu burger (version mobile)
    document.querySelector('.menu-burger-header').addEventListener('click', function () {
        document.querySelector('.menu-burger-header-content').classList.toggle('menu-burger-header-content-open');
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
        // Prérempli le champ "RÉF. PHOTO" avec la valeur de la référence dans le formulaire Contact Form 7
        refPhotoInput.value = referenceValue;
    }

    // Fonction pour fermer la modale
    function closeModal() {
        modal.classList.remove('modal-ouverte');
        overlayModale.style.display = 'none';
    }

    overlayModale.addEventListener('click', function (event) {
        closeModal();
    });

    // Écouteur d'événements pour ouvrir la modale lorsque le lien de menu est cliqué
    const linkToModal = document.querySelector('#menu-item-18 a');
    if (linkToModal) {
        linkToModal.addEventListener('click', function (event) {
            event.preventDefault();
            openModal(""); // Aucune référence spécifique pour le menu
        });
    }

    // Écouteur d'événements pour ouvrir la modale lorsque le bouton "Contact" est cliqué
    if (btnContact) {
        btnContact.addEventListener('click', function (event) {
            event.preventDefault();
            if (this === btnContact) { // Vérifie si le clic provient du bouton de l'article
                // Récupère la référence spécifique à cet article
                const refValue = this.getAttribute('data-reference');
                openModal(refValue);
            } else {
                openModal(""); // Ouvre la modal sans préremplir la référence
            }
        });
    }

    // Écouteur d'événements pour fermer la modale lorsqu'on clique en dehors de celle-ci
    document.addEventListener('click', function (event) {
        if (!modal.contains(event.target) && event.target !== linkToModal && event.target !== btnContact) {
            closeModal();
        }
    });
});
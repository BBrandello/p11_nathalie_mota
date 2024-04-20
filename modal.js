document.addEventListener('DOMContentLoaded', (event) => {
    const linkToModal = document.querySelector('#menu-item-18 a');

    // Ajoute un écouteur d'événements au clic sur le lien
    linkToModal.addEventListener('click', function (event) {
        // Empêche le lien de suivre son URL par défaut
        event.preventDefault();

        // Ouvre la modal en ajoutant la classe modal-ouverte
        document.getElementById('contactModal').classList.add('modal-ouverte');
    });
});
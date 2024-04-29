// Modal de contact
document.addEventListener('DOMContentLoaded', (event) => {
    const linkToModal = document.querySelector('#menu-item-18 a');
    const modal = document.getElementById('contactModal');

    // Ajoute un écouteur d'événements au clic sur le lien
    linkToModal.addEventListener('click', function (event) {
        // Empêche le lien de suivre son URL par défaut
        event.preventDefault();

        // Ouvre la modal en ajoutant la classe modal-ouverte
        modal.classList.add('modal-ouverte');
    });

    // Ajoute un écouteur d'événements au clic sur le document
    document.addEventListener('click', function (event) {
        // Vérifie si le clic est en dehors de la modal
        if (!modal.contains(event.target) && !linkToModal.contains(event.target)) {
            // Ferme la modal en supprimant la classe modal-ouverte
            modal.classList.remove('modal-ouverte');
        }
    });
});
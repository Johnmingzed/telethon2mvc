//Jordan

function modal() {

  // On récupère l'élément HTML du bouton de suppression
  let deleteButton = document.getElementById('deleteButton');

  // Utilisée pour récupérer l'élément <body> du document HTML
  let body = document.getElementsByTagName('body')[0];

  // Événement clic sur 'deleteButton'
  deleteButton.addEventListener('click', function () {

    // Crée les éléments HTML de la modale
    let modalDiv = document.createElement('div');
    modalDiv.id = 'modal';
    modalDiv.classList.add('modal');

    // Crée le conteneur de la modal
    let modalContainer = document.createElement('div');
    modalContainer.classList.add('modal-container');

    //  Crée une div regroupant le contenue
    let modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    // Crée l'élément HTML <p> qui contiendra le message de confirmation
    let message = document.createElement('p');
    message.textContent = 'Voulez-vous vraiment faire cela ?';

    // Crée l'élément la div regroupant les boutons
    let modalButtons = document.createElement('div');
    modalButtons.classList.add('modal-buttons');

    // Crée le bouton de confirmation
    let confirmButton = document.createElement('button');
    confirmButton.id = 'confirmButton';
    confirmButton.textContent = 'Oui';

    // Crée le bouton d'annulation'
    let cancelButton = document.createElement('button');
    cancelButton.id = 'cancelButton';
    cancelButton.textContent = 'Annuler';

    // Ajoute le bouton de confirmation à la div modal-buttons
    modalButtons.appendChild(confirmButton);

    // Ajoute le bouton d'annulation à la div modal-buttons
    modalButtons.appendChild(cancelButton);

    // Ajoute le message de confirmation de la modale à la div modal-content
    modalContent.appendChild(message);

    // Ajoute la div des boutons à la div modal-content
    modalContent.appendChild(modalButtons);

    // Ajoute la div modalContent à la div modal-container
    modalContainer.appendChild(modalContent);

    // Ajoute la div modalContainer à la div avec l'ID modal et la class modal
    modalDiv.appendChild(modalContainer);

    // Ajoute la modale au body
    body.appendChild(modalDiv);

    console.log('Modale créée:', modalDiv);

    // Récupère l'élément HTML de la modale
    let modal = document.getElementById('modal');

    // Événement clic sur 'confirmButton'
    confirmButton.addEventListener('click', function () {

      // Supprime
      modal.style.display = 'none'; // Fait disparaître la modale en changeant la propriété display avec 'none'

      // Supprime la div avec l'ID modal et la class modal
      body.removeChild(modalDiv);

    });

    // Événement clic sur 'cancelButton'
    cancelButton.addEventListener('click', function () {

      modal.style.display = 'none'; // Fait disparaître la modale en changeant la propriété display avec 'none'

      // Supprime les éléments HTML de la modale
      body.removeChild(modalDiv);

    });
  });
}

// Appel de la fonction
modal();

// a faire : Prevent default (Que le bouton supprime fasse son action apre le oui)
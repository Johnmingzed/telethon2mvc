function modal() {
    console.log('Initialisation de la modale');
  
    // On récupére les éléments HTML
    let deleteButton = document.getElementById('deleteButton');
    let modal = document.getElementById('modal');
    let confirmButton = document.getElementById('confirmButton');
    let cancelButton = document.getElementById('cancelButton');
  
    console.log('Bouton de suppression:', deleteButton);
    console.log('Modale:', modal);
    console.log('Bouton de confirmation:', confirmButton);
    console.log('Bouton d\'annulation:', cancelButton);
  
    // Evénement clic sur 'deleteButton'
    deleteButton.addEventListener('click', function() {
      console.log('Clic sur le bouton de suppression');
      modal.style.display = 'flex'; // Fait apparaitre la modale en changeant la propriété display avec 'flex'
    });
  
    // Evénement clic sur 'confirmButton'
    confirmButton.addEventListener('click', function() {
      console.log('Clic sur le bouton de confirmation');
      console.log('Suppression effectuée');
      // Effectue la suppression
      modal.style.display = 'none'; // Fait dispparaitre la modale en changeant la propriété display avec 'flex'
    });
  
    // Evénement clic sur 'cancelButton'
    cancelButton.addEventListener('click', function() {
      console.log('Clic sur le bouton d\'annulation');
      modal.style.display = 'none'; // Fait dispparaitre la modale en changeant la propriété display avec 'flex'
    });
  }
  
  // Appel de la fonction
  modal();


  //faire que le script creer la modal(inject du code)
  //faire que confirm valide suppresion(prevent_action)
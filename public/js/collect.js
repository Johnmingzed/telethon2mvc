// ==========================
// Fichier créer par Jonathan 2
// ==========================
// Espace modification
//
// ==========================
const radioCollectStand = document.querySelector('#stand');
const radioCollectPartner = document.querySelector('#partner');
const field = document.querySelectorAll('.field');

field[2].style.display = "none";
field[3].style.display = "none";

radioCollectStand.addEventListener('focus', function(e){
    field[2].style.display = "block";
    field[3].style.display = "none";
})

radioCollectPartner.addEventListener('focus', function(e){
    field[3].style.display = "block";
    field[2].style.display = "none";
})


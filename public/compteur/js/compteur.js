/**
 * Jonathan PAIN-CHAMMING'S travaille là-dessus, demander avant d'essayer de le modifier
 */

let oldSum = 0;

import { FetchTelethon } from "./FetchTelethon.js";

// syntaxe de décomposition d'objet pour assigner directement une valeur à la variable
let { somme: sumToDisplay } = await FetchTelethon.sum();
let { partenaires: partners } = await FetchTelethon.partners();

console.log({ sumToDisplay, partners });

const partners_slide = document.querySelector('div.partners_slide');
const counter = document.querySelector('div.counter');

// Affichage de la liste des partenaires
partners_slide.replaceChildren();
partners.forEach(partner => {
    let balise = document.createElement('a');
    balise.textContent = partner;
    balise.setAttribute('class', 'partners');
    balise.setAttribute('href', '');
    partners_slide.appendChild(balise);
});

// Affichage de la somme dans le compteur
function displaySum() {
    let arrayedSum = sumToDisplay.toString().padStart(5, '0').split('');
    let arrayedOldSum = oldSum.toString().padStart(5, '0').split('');
    console.log({ arrayedOldSum, arrayedSum })
    arrayedSum.forEach(function (digit, index) {
        let selector = '.number_' + (index + 1);
        let number = document.querySelector(selector);
        let oldNumber = arrayedOldSum[index];
        animateNumber(number, oldNumber, digit);
        number.textContent = digit;
        //number.style.backgroundPositionY = digit + '0%';
    });
}

// Animation du compteur
function animateNumber(target, from, to) {
    let nIntervId;
    // console.log('animation appelée avec les paramêtres', { target, from, to });
    let counter = from;
    function updateNumber() {
        target.style.backgroundPositionY = counter + '0%';
        // console.log(counter, target.style.backgroundPositionY);
        counter++;
        if (counter > to) {
            clearInterval(nIntervId);
            nIntervId = null;
            //console.log('sortie de la boucle pour number_' + target);
        }
    }
    nIntervId = setInterval(updateNumber, 200);
}

// Défilement des partenaires
function partnersSlide() {
    let viewportWidth = window.innerWidth;
    let partners_slideWidth = partners_slide.clientWidth;
    console.log({ viewportWidth, partners_slideWidth });
    let slideTranslateStart = (viewportWidth - partners_slideWidth) / 2 + partners_slideWidth;
    let slideTranslateEnd = ((viewportWidth - partners_slideWidth) / 2 + partners_slideWidth) * -1;
    let slideSpeed = partners.length * 4;
    document.documentElement.style.setProperty('--slideTranslateStart', 'translateX(' + slideTranslateStart + 'px)');
    document.documentElement.style.setProperty('--slideTranslateEnd', 'translateX(' + slideTranslateEnd + 'px)');
    document.documentElement.style.setProperty('--slideSpeed', slideSpeed + 's');
    console.log({ slideTranslateEnd, slideTranslateStart, slideSpeed });
}

let slider = setInterval(partnersSlide(), 3000);
let animatedCounter = setInterval(displaySum(),3000);

/* let testNumber = document.querySelector('.number_5');
let testAnimation = animateNumber(testNumber, 0, 9); */

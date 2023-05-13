/**
 * Jonathan PAIN-CHAMMING'S travaille là-dessus, demander avant d'essayer de le modifier
 *
 * Revoir les fonctions d'affichage des partenaires qui fait un peu n'importe quoi
 */

import { FetchTelethon } from "./FetchTelethon.js";

// Fonction d'appel de l'API pour récupérer la somme
function callSum() {
    FetchTelethon.sum().then(function (sumData) {
        sumToDisplay = sumData.somme;
    }).catch(function (error) {
        console.error(error); // Gérer les erreurs éventuelles
    });
}

// Fonction d'affichage de la somme dans le compteur
function displaySum() {
    try {
        let arrayedSum = sumToDisplay.toString().padStart(5, '0').split('');
        let arrayedOldSum = oldSum.toString().padStart(5, '0').split('');
        console.log({ oldSum, sumToDisplay })
        arrayedSum.forEach(function (digit, index) {
            let selector = '.number_' + (index + 1);
            let number = document.querySelector(selector);
            let oldNumber = arrayedOldSum[index];
            if (digit > oldNumber) {
                animateNumber(number, oldNumber, digit);
            } else if (digit < oldNumber) {
                // console.log('on va à 10');
                animateNumber(number, oldNumber, 10);
                let wait = (10 - oldNumber) * 200;
                setTimeout(() => {
                    //console.log('on va à', digit);
                    animateNumber(number, 0, digit);
                }, wait);
                // console.log('Waited :', wait);
            }
            number.textContent = digit;
        });
        oldSum = sumToDisplay;
        callSum();
    } catch (error) {
        console.error(error);
    }
}

// Fonction d'animation du compteur
function animateNumber(target, from, to) {
    let nIntervId;
    // console.log('animation appelée avec les paramêtres', { target, from, to });
    let counter = from;
    function updateNumber() {
        target.style.backgroundPositionY = counter + '0%';
        counter++;
        if (counter > to) {
            clearInterval(nIntervId);
            nIntervId = null;
        }
    }
    nIntervId = setInterval(updateNumber, 200);
}

// Fonction d'appel de l'API pour récupérer les partenaires
function callPartners() {
    FetchTelethon.partners().then(function (partnersData) {
        partners = partnersData.partenaires;
        partnersDisplay();
    }).catch(function (error) {
        console.error(error); // Gérer les erreurs éventuelles
    });
}

// Fonction d'affichage de la liste des partenaires
function partnersDisplay() {
    try {
        partners_slide.replaceChildren();
        partners.forEach(partner => {
            let balise = document.createElement('a');
            balise.textContent = partner;
            balise.setAttribute('class', 'partners');
            balise.setAttribute('href', '');
            partners_slide.appendChild(balise);
        });
    } catch (error) {
        console.error(error);
    }
}

// Fonction de défilement des partenaires
function partnersSlide() {
    try {
        let viewportWidth = window.innerWidth;
        let partners_slideWidth = partners_slide.clientWidth;
        console.log({ viewportWidth, partners_slideWidth });
        let slideTranslateStart = (partners_slideWidth + viewportWidth) / 2;
        let slideTranslateEnd = slideTranslateStart * -1;
        let slideSpeed = partners.length * 1;
        document.documentElement.style.setProperty('--slideTranslateStart', 'translateX(' + slideTranslateStart + 'px)');
        document.documentElement.style.setProperty('--slideTranslateEnd', 'translateX(' + slideTranslateEnd + 'px)');
        document.documentElement.style.setProperty('--slideSpeed', slideSpeed + 's');
        console.log({ partners, slideTranslateEnd, slideTranslateStart, slideSpeed });
        setTimeout(callPartners, slideSpeed * 1000);
        setTimeout(partnersSlide, slideSpeed * 1000);
    } catch (error) {
        console.error(error);
    }
}

/**
 * Début du programme
*/

let oldSum = 0;
let sumToDisplay;
callSum();

// syntaxe de décomposition d'objet pour assigner directement une valeur à la variable
let { partenaires: partners } = await FetchTelethon.partners();

console.log({ sumToDisplay, partners });

const partners_slide = document.querySelector('div.partners_slide');
//const counter = document.querySelector('div.counter');


// Premier affichage de la somme à partir de 0
let animatedCounter = displaySum();
let slider = partnersSlide();
animatedCounter = setInterval(displaySum, 10000);
console.log({ slider, animatedCounter }, 'Ensemble du code initialisé');

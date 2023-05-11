/**
 * Jonathan PAIN-CHAMMING'S travaille là-dessus, demander avant d'essayer de le modifier
 */

import { FetchTelethon } from "./FetchTelethon.js";

/* let sumData = await FetchTelethon.sum();
let sum = sumData.somme; */

// syntaxe de décomposition d'objet pour assigner directement une valeur à la variable
let { somme: sum } = await FetchTelethon.sum();
let { partenaires: partners } = await FetchTelethon.partners();

console.log({ sum, partners });

const partners_slide = document.querySelector('div.partners_slide');
const counter = document.querySelector('div.counter');

console.log({ partners_slide, counter });

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
let arrayedSum = sum.toString().padStart(5, '0').split('');
console.log({ arrayedSum });
arrayedSum.forEach(function callback(digit, index) {
    let selector = '.number_' + (index + 1);
    let number = document.querySelector(selector);
    number.textContent = digit;
    number.style.backgroundPositionY = digit + '0%';
});

// Défilement des partenaires
let viewportWidth = window.innerWidth;
let partners_slideWidth = partners_slide.clientWidth;
console.log({ viewportWidth, partners_slideWidth });
let slideTranslateStart = (viewportWidth - partners_slideWidth) / 2 + partners_slideWidth;
let slideTranslateEnd = (viewportWidth - partners_slideWidth) / 2 + partners_slideWidth;
let slideSpeed;


/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

let menuTrigger = document.querySelector('#menu-trigger');
let menu = document.querySelector('#menu-wrapper');
menuTrigger.addEventListener('click',
    (trigger) =>
        menu.classList.toggle('show-menu')
);

/** toggle card hide **/
const showCards = document.querySelectorAll('.show-toggler');
showCards.forEach(showCard => showCard.addEventListener('click', () => {
        const cardShown = showCard.parentNode.parentNode;
        // const childContent = cardShown.querySelector('.content');
        cardShown.classList.toggle('showCard');
    })
);

/* */
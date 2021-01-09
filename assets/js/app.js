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

/*let menuTrigger = document.querySelector('#menu-trigger');
let menu = document.querySelector('#menu-wrapper');
menuTrigger.addEventListener('click',
    (trigger) =>
        menu.classList.toggle('show-menu')
);
*/
/** toggle card hide **/
const showCards = document.querySelectorAll('.show-toggler');
showCards.forEach(showCard => showCard.addEventListener('click', () => {
        const cardShown = showCard.parentNode.parentNode;
        // const childContent = cardShown.querySelector('.content');
        cardShown.classList.toggle('showCard');
    })
);

/* groups */

let rows = document.querySelectorAll('.form-row')
let current = null
rows.forEach(row => {
    //console.log(row.firstElementChild.nextElementSibling.dataset.group)
    if (row.firstElementChild.nextElementSibling.dataset.group !== current) {
        current = row.firstElementChild.nextElementSibling.dataset.group
        parent = row.parentNode

        let groupParent = document.createElement('div')
        groupParent.classList.add('form-group-header')

        // checkbox
        let checkbox = document.createElement("input")
        checkbox.setAttribute('type', 'checkbox')
        checkbox.setAttribute('id', current)
        groupParent.append(checkbox)

        // label for checkbox
        let ckLabel = document.createElement('label')
        ckLabel.innerHTML = current
        ckLabel.setAttribute('for', current)
        groupParent.insertBefore(ckLabel, checkbox)
        parent.insertBefore(groupParent, row)
    }
    /*else {
        parent = row.parentNode
        // checkbox
        let checkbox = document.createElement("input")
        checkbox.setAttribute('type', 'checkbox')
        checkbox.setAttribute('id', row.firstElementChild.nextElementSibling.id)
        checkbox.classList.add('form-group')
        parent.append(checkbox)
        //parent.insertBefore(checkbox, row)

        // label for checkbox
        let ckLabel = document.createElement('label')
        ckLabel.innerHTML = row.firstElementChild.nextElementSibling.dataset.group
        ckLabel.setAttribute('for', row.firstElementChild.nextElementSibling.id)
        parent.insertBefore(ckLabel, checkbox)
        //parent.insertBefore(groupParent, row)
    }*/

})
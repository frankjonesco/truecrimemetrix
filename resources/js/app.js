import './bootstrap';




/**************************************/
/* SHOW/HIDE MAIN MENU AND SEARCH BAR */
/**************************************/


// CONSTANTS

const openMainMenuIcon = document.querySelector('#openMainMenuIcon');
const closeMainMenuIcon = document.querySelector('#closeMainMenuIcon');
const mainMenu = document.querySelector('#mainMenu');


// ICON CLICKS

openMainMenuIcon.onclick = function(e) {
    e.preventDefault();
    console.log('open slide menu');
    mainMenu.classList.replace('-translate-x-full', 'translate-x-0');
}

closeMainMenuIcon.onclick = function(e) {
    e.preventDefault();
    mainMenu.classList.replace('translate-x-0', '-translate-x-full');
}
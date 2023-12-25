import './bootstrap';




/**************************************/
/* SHOW/HIDE MAIN MENU AND SEARCH BAR */
/**************************************/


// CONSTANTS

const openMainMenuIcon = document.querySelector('#openMainMenuIcon');
const closeMainMenuIcon = document.querySelector('#closeMainMenuIcon');
const toggleSearchBar = document.querySelector('#toggleSearchBar');

const blackout = document.querySelector('#blackout');
const mainMenu = document.querySelector('#mainMenu');
const navSearchBar = document.querySelector('#navSearchBar');
const navSearchInput = document.querySelector('#navSearchInput');


// ICON CLICKS

openMainMenuIcon.onclick = function(e) {
    e.preventDefault();
    mainMenu.classList.replace('-translate-x-full', 'translate-x-0');

    if(navSearchBar.classList.contains('translate-y-20')){
        navSearchBar.classList.toggle('translate-y-20');
    }
}

closeMainMenuIcon.onclick = function(e) {
    e.preventDefault();
    mainMenu.classList.replace('translate-x-0', '-translate-x-full');
    blackout.classList.add('hidden');
}


toggleSearchBar.onclick = function(e) {
    e.preventDefault();
    blackout.classList.toggle('hidden');
    navSearchBar.classList.toggle('translate-y-20');
    navSearchInput.focus();
}

blackout.onclick = function(e) {
    e.preventDefault();
    navSearchBar.classList.remove('translate-y-20')
    blackout.classList.add('hidden');
}
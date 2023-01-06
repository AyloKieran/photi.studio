// function _setVH() {
//     let vh = window.innerHeight;
//     document.documentElement.style.setProperty('--vh', `${vh}px`);
// }

// _setVH();

// window.addEventListener('resize', _setVH);

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Fix apple hover issue? // TO DO: Test this on a few apple devices
document.addEventListener("touchstart", function () { }, false);

window.navigate = function (path) { // TO DO: better way to do this?
    window.location.href = path;
}

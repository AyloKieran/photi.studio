import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Fix apple hover issue? // TO DO: Test this on a few apple devices
document.addEventListener("touchstart", function () { }, false);

window.navigate = function (path) { // TO DO: better way to do this?
    document.getElementById("loader").classList.add("loader--shown");
    window.location.href = path;
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("loader").classList.remove("loader--shown");
});

window.onbeforeunload = function () {
    document.getElementById("loader").classList.add("loader--shown");
};

// let url = new URL(window.location.href),
//     isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

// isMobile && !window.matchMedia('(display-mode: standalone)').matches ?
//     url.pathname == "/install" ?
//         null
//         : window.location.replace(url.origin + "/install")
//     : null;

// window.isMobile = isMobile;

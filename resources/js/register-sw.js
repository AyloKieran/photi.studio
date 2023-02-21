if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        // Cache busting
        let url = new URL('/sw.js', location.origin);
        url.searchParams.append('v', __APP_VERSION__);

        navigator.serviceWorker.register(url.href).then(
            function (registration) {
                console.log('Service worker registration successful');
            },
            function (err) {
                console.log('Service worker registration failed', err);
            });
    });
}

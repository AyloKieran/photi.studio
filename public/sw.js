const VERSION = '1.0.1',
    CACHE_NAME = 'photi-v' + VERSION,
    CACHE_URLS = [
        '/offline',
        '/build/assets/main.css',
        '/build/assets/app.js',
        '/livewire/livewire.js',
        '/build/assets/Now-Black.ttf',
        '/build/assets/Now-Bold.ttf',
        '/build/assets/Now-Light.ttf',
        '/build/assets/Now-Medium.ttf',
        '/build/assets/Now-Regular.ttf',
        '/build/assets/Now-Thin.ttf',
        '/build/assets/Inter-Black.ttf',
        '/build/assets/Inter-Bold.ttf',
        '/build/assets/Inter-ExtraBold.ttf',
        '/build/assets/Inter-ExtraLight.ttf',
        '/build/assets/Inter-Light.ttf',
        '/build/assets/Inter-Medium.ttf',
        '/build/assets/Inter-Regular.ttf',
        '/build/assets/Inter-SemiBold.ttf',
        '/build/assets/Inter-Thin.ttf',
        '/build/assets/fa-brands-400.ttf',
        '/build/assets/fa-brands-400.woff2',
        '/build/assets/fa-solid-900.ttf',
        '/build/assets/fa-solid-900.woff2',
        '/favicon.png'
    ];

self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(CACHE_URLS);
            })
    )
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("photi-")))
                    .filter(cacheName => (cacheName !== CACHE_NAME))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    // console.log('Cache:', event.request.url);
                    return response;
                }

                // console.log('Fetch:', event.request.url);
                return fetch(event.request);
            })
            .catch(() => {
                return caches.match('/offline');
            })
    )
});

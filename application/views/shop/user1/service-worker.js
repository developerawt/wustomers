
const cacheVersion = 'v1';
const urlsToPrefetch = [
  '/application/views/shop/user1/',
  'https://unpkg.com/@material/toolbar@0.35.0/dist/mdc.toolbar.min.css',
  'https://unpkg.com/@material/elevation@0.35.0/dist/mdc.elevation.min.css',
  'https://unpkg.com/@material/list@0.35.0/dist/mdc.list.min.css',
  'https://unpkg.com/@material/button@0.35.0/dist/mdc.button.min.css',
];

this.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(cacheVersion).then(function(cache) {
      return cache.addAll(urlsToPrefetch);
    })
  );
});


this.addEventListener('fetch', event => {
  let responsePromise = caches.match(event.request).then(response => {
    return response || fetch(event.request)
  });

  event.respondWith(responsePromise);
})
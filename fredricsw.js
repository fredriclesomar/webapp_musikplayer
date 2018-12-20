
'use strict';

var cacheVersion = 1;
var currentCache = {
  offline: 'overwatchoffline' + cacheVersion
};
const offlineUrl = 'overwatch.html';

this.addEventListener('install', event => {
  event.waitUntil(
    caches.open(currentCache.offline).then(function(cache) {
      return cache.addAll([
          '.',
          'index.php',
          'script.js',
          '/css/h1.css',
          '/css/main.css',
          '/css/mules.css',
          '/css/normalize.css',
          '/js/main.js',
          '/js/jquery.min.js',
          'img',
          'vst.php',
          '/library/',
          'player.js',
          'player.css',
          'playlist.php',
          offlineUrl
      ]);
    })
  );
});


// Menambahkan pengembalian offline ke online

this.addEventListener('fetch', event => {
  if (event.request.mode === 'navigate' || (event.request.method === 'GET' && event.request.headers.get('accept').includes('text/html'))) {
        event.respondWith(
          fetch(event.request.url).catch(error => {
              // Kembali ke halaman offline 
              return caches.match(offlineUrl);
          })
    );
  }
  else{
        // melakukan respon terhadap apa saja yang dilakukan
        event.respondWith(caches.match(event.request)
                        .then(function (response) {
                        return response || fetch(event.request);
                    })
            );
      }
});

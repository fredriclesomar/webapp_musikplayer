const CACHE_NAME = "proto_overwatchoffline2";
const FILE_NAME = './';

// DOM elements
const status = document.getElementById("js-status");
const cacheButton = document.getElementById("js-cache-btn");
const removeCacheButton = document.getElementById("js-remove-cache-btn");

// Hook up event listeners
cacheButton.addEventListener('click', addToCache);
removeCacheButton.addEventListener('click', removeFromCache);

(function main(){
  updateStatus();
})();

function updateStatus() {
  isCached().then(value => {
    status.innerText = '' + value;
  });
}

function isCached() {
  return window.caches.open(CACHE_NAME)
    .then(cache => cache.match(FILE_NAME))
    .then(Boolean);
}

function addToCache() {
  window.caches.open(CACHE_NAME)
    .then(cache => cache.add(FILE_NAME))
    .then(() => console.log('cached file musik'))
    .catch(e => console.error('gagal cache file musik', e))
    .finally(updateStatus);
}

function removeFromCache() {
  window.caches.open(CACHE_NAME)
    .then(cache => cache.delete(FILE_NAME))
    .then(() => console.log('hapus cache file musik'))
    .catch(e => console.error('gagal menghapus cache file musik', e))
    .finally(updateStatus); 
}

  
  
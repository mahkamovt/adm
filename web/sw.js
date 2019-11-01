
// Указываем тип кеширования

var CURRENT_CACHES = {
    font: 'font-cache-v7',
    css:'css-cache-v7',
    js:'js-cache-v7',
    site: 'site-cache-v7',
    image: 'image-cache-v7'
};

function fetchAndCache(request) {
    return fetch(request)
        .then(function(response) {

            // Проверяем, что страница существует т.е отдает 200 ок
            if (!response.ok) {
                return response;

                // Иначе показываем ошибку Error(response.statusText);
            }

            var url = new URL(request.url);

            //Указываем страницы, которые не надо кешировать, например админку, страницу авторизации, корзину и т.д.;
            if (response.status < 400 &&
                response.type === 'basic' &&
                url.search.indexOf("mode=nocache") == -1 &&
                url.search.indexOf("bitrix") == -1 &&
                url.search.indexOf("admin") == -1 &&
                url.search.indexOf("login") == -1 &&
                url.search.indexOf("logout") == -1 &&
                url.search.indexOf("account") == -1

            ) {

                //Задаем условия для кеширования скриптов, стилей, картинок и html документов.;
                var cur_cache;
                if (response.headers.get('content-type') &&
                    response.headers.get('content-type').indexOf("application/javascript") >= 0) {
                    cur_cache = CURRENT_CACHES.js;
                } else if (response.headers.get('content-type') &&
                    response.headers.get('content-type').indexOf("text/css") >= 0) {
                    cur_cache = CURRENT_CACHES.css;
                } else if (response.headers.get('content-type') &&
                    response.headers.get('content-type').indexOf("font") >= 0) {
                    cur_cache = CURRENT_CACHES.font;
                } else if (response.headers.get('content-type') &&
                    response.headers.get('content-type').indexOf("image") >= 0) {
                    cur_cache = CURRENT_CACHES.image;
                }else if (response.headers.get('content-type') &&
                    response.headers.get('content-type').indexOf("text") >= 0) {
                    cur_cache = CURRENT_CACHES.site;
                }
                if (cur_cache) {
                    console.log('\tCaching the response to', request.url);
                    return caches.open(cur_cache).then(function(cache) {
                        cache.put(request, response.clone());
                        return response;
                    });
                }
            }
            return response;
        })
        .catch(function(error) {
            console.log('Request failed for: ' + request.url, error);
            throw error;
        });
}
// Установка service worker
self.addEventListener('install', (event) => {
    self.skipWaiting();
    console.log('Service Worker has been installed');
});

self.addEventListener('activate', (event) => {
    var expectedCacheNames = Object.keys(CURRENT_CACHES).map(function(key) {
        return CURRENT_CACHES[key];
    });

    // Удаляем устаревший кэш
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {
                    if (expectedCacheNames.indexOf(cacheName) == -1) {
                        console.log('Deleting out of date cache:', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );

    console.log('Service Worker has been activated');
});

//Получаем инорфмацию из кеша, если кеша нет, то загружаем как обычную страинцу
self.addEventListener('fetch', function(event) {
    console.log('Fetching:', event.request.url);
    event.respondWith(async function() {
        const cachedResponse = await caches.match(event.request);
        if (cachedResponse) {
            console.log("\tCached version found: " + event.request.url);
            return cachedResponse;
        } else {
            console.log("\tGetting from the Internet:" + event.request.url);
            return await fetchAndCache(event.request);
        }
    }());

});

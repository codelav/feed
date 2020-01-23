# Installation

1. Clone repository
2. Run **composer install** (make sure the `public` folder is writable for composer)
3. Run **npm install**
4. Run **cp .env.example .env**
5. Fill database settings in .env
6. Run **php artisan migrate**
7. Run **npm run prod**
8. Run **php artisan key:generate**
9. Make sure the `storage` folder is writable
10. Set up web-server host

# A-League Live Ladder
Application that presents a "live" league ladder which can present changes in "real time" from a data store. Running the app locally:
1. Extract the zip file.
2. Copy .env.sample to .env and configure your local database and url variables.
3. Install all dependencies -- `composer install && npm install`
4. Generate a new application key - `php artisan key:generate`
5. Migrate the database tables and seed the database -- `php artisan migrate --seed`
6. Run using your local web server, or PHP's built-in option - `php artisan serve`
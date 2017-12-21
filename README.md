# A-League Live Ladder
Running the app locally:
1. Clone this repository.
2. Copy .env.sample to .env and configure your local variables (database and url).
3. Install all dependencies -- `composer install && npm install`
4. Generate a new application key - `php artisan key:generate`
5. Migrate the database tables and seed the database -- `php artisan migrate --seed`
6. Run using your local web server, or PHP's built-in option - `php artisan serve`

How to use the app:
1. Go to https://ladder.jorgemartins.org and register.
2. Login with your credentials.
3. Click on the *ladder* link in the bottom of the page to open the realtime ladder on a new tab.
4. Keep both tabs side by side. Update the team's position and see the ladder updating in real time.

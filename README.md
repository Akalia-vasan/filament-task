1. clone the repo
git clone https://github.com/Akalia-vasan/filament-task.git

2. go into the repo
cd l_repo

3. install require packages
composer install

4. generate the laravel project key
php artisan key:generate

5. migrate and seed at the same time
php artisan migrate:fresh --seed

6A. convert ".env.example" to ".env"

6B. change the 'database name' & 'username' & 'password'
DB_HOST=localhost
DB_DATABASE=own_databse_name
DB_USERNAME=root
DB_PASSWORD=


7. start the server
php artisan serve
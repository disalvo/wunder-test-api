Wunder API Test
==================

## Installation
* I used Lumen Framework (see the requiments [https://lumen.laravel.com/docs/6.x])
    * PHP >= 7.2
    * OpenSSL PHP Extension
    * PDO PHP Extension
    * Mbstring PHP Extension
* `git clone <repository-url>` this repository
* Change into the new directory
* Copy `.env.example` to `.env`
* Edit file `.env` and configure the database connection (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
* `composer install`
* `php artisan migrate` (To create a database structure)
    * Or execute the .sql script `<path>database/dump.sql`
* Run into your webserver
    * I prefer the built-in web server `php -S localhost:8080 -t ./public`
    * Or configure your Nginx webserver (see [https://gist.github.com/psgganesh/8d1790dd0c16ab5a4cde])

### 1. Describe possible performance optimizations for your Code.
* Normalize the database structure, creating table for address and payment information
* Security improvement: Add SSL to Nginx (or other webserver)

### 2. Which things could be done better, than you’ve done it?
* Write unit tests
* Create a interface to comunicate with API Payment
* Make an Auth middleware
* Validate if the user is already registered into database

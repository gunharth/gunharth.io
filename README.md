# gunharth.io
My personal Website


## wip

- uses Laravel, Mix, tailwindcss, turbolinks
- markdown only (no database)
- integration of a git submodule for music articles


## Installation

Clone the repository 
```
git clone git@github.com:gunharth/gunharth.io.git
```
cd into the directory and copy the env file
```
cd gunharth.io

cp .env.example .env
```
Edit the .env file - for dev set RESPONSE_CACHE_ENABLED to false

Run
````
composer install && npm install
````

Generate the laravel application key:
````
php artisan key:generate
````

As I'm using a git submodule for the music theory article initiate it by running
````
git submodule update --init --remote
````
The project ist now complete and can be loaded with eg.: Laravel Valet

# Dev

- notes on browsersync

For dev builds run
```
npm run dev
````

# Production

- notes on tailwindcss extractor
- notes on versioning

For production run
````
npm run production
````

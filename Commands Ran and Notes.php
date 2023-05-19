<?php

# Laravel and JWT Token AUthentication:

# composer create-project laravel/laravel="8.0" laravel-auth

# php artisan make:controller AuthController

# php artisan migrate

# please create collections on Postman Software. on each collection, please make sure that change the request type
# to the relevant operation

# please run the command:
# composer require paragonie/random_compat:2.*

# removed line from composer file : "guzzlehttp/guzzle": "^7.0.1",
# run command: composer require guzzlehttp/guzzle "^6.5.0" --with-all-dependencies
# run command: composer require guzzlehttp/guzzle "^6.5.0" --with-all-dependencies
# run command: composer require laravel/passport
# from composer lock: "version": "7.5.1", /* line 698 */
# run command: composer require laravel/passport:^9.0 --with-all-dependencies
# then press: Ctrl + S in order to save the request inside Postman

# NB: please always replace the % with | inside the token to get proper authentication

# uses registered so far:



/*
    {
        "name" : "Makgabo Emmanuel Mathekga",
        "email" : "gudlukmme@gmail.com",
        "password" : "delta_meta##"
    }


    {
    "name" : "Makgabo Emmanuel Mathekga",
    "email" : "saintsopts@gmail.com",
    "password" : "santa_melta##"
}

 # composer require laravel sanctum
 # composer require laravel/sanctum

 # php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# specify which file to migrate - thanks
# ran migration successfully with the commands below
# php artisan migrate --path=/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php


*/

# adding versioning to the API:

# php artisan make:controller API/v1/AuthController

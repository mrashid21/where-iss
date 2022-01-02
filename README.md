# Minimum Requirement
 - PHP 7.4.x
 - Laravel 7.x

## Installation Guide

Enter to your webroot folder and run 
 - composer install

### Environment Configuration
 - cp .env.example .env
 - php artisan key:generate
 - Edit .env file and change database configuration username, password and database name
 - No need db coz we dont use one

## Serve Application
 - php artisan serve

## Dump autoload
Untuk load helper customization
 - composer dump-autoload
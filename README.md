<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# OKANAMI TEST

> ### Okanami Test

This repo is still on progress!

---

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

Clone the repository

git clone https://github.com/okanemo/Bahri-Bahri.git
Switch to the repo folder

cd bahri-bahri
Install all the dependencies using composer

composer install
Copy the example env file and make the required configuration changes in the .env file

cp .env.example .env
Generate a new application key

php artisan key:generate
Run the database migrations (**Set the database connection in .env before migrating**)

php artisan migrate
Start the local development server

php artisan serve
You can now access the server at http://localhost:8000

**TL;DR command list**

git clone https://github.com/okanemo/Bahri-Bahri.git
cd cazh-core-banking
composer install
cp .env.example .env
php artisan key:generate
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

php artisan migrate
php artisan serve
## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Run the database seeder and you're done

php artisan db:seed
**_Note_** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

php artisan migrate:fresh
---

# Code overview

## Dependencies

- [livewire-livewire](https://github.com/livewire/livewire) - For building dynamic interfaces simple

## Folders

- `app/Models` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the controllers
- `app/Http/Requests` - Contains all the form requests
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the routes defined in api.php and web.php file

## Environment variables

- `.env` - Environment variables can be set in this file

**_Note_** : You can quickly set the database information and other variables in this file and have the application fully working.

Default User :

email : admin@okanemo.com
password : okanemo2023

---
